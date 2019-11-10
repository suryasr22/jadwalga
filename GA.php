<?php
	//Libraries
	//Koneksi
	include("koneksi.php");

	//Fungsi2
	include("functions.php");

	//Session checker
	include("session_check.php");

	//Kosongkan table
	$conn->query("TRUNCATE TABLE jadwal");
	//INISIALISASI==================================================
	//1. Makul diload pertama, terus disimpen di array dimensi 2,
	//$array_makul[jml_makul][0] = id makul
	//$array_makul[jml_makul][1] = sks
	$array_makul = array();
	$result_makul = $conn->query("SELECT id, sks FROM matakuliah");
	while($makul = $result_makul->fetch_assoc()){
		$arrMakul = array();
		array_push($arrMakul, $makul['id']);
		array_push($arrMakul, $makul['sks']);
		array_push($array_makul, $arrMakul);
	}
	$len_makul = sizeof($array_makul);

	//2. Ruangan diload kedua, terus disimpen di array dimensi 2,
	//$array_ruang[0] = id_ruangan
	$array_ruang = array();
	$result_ruang = $conn->query("SELECT id FROM ruangan");
	while($ruang = $result_ruang->fetch_assoc()){
		array_push($array_ruang, $ruang['id']);
	}
	$len_ruang = sizeof($array_ruang);

	//3. Inisialisasi array jadwal
	//$array_jadwal[jml_makul][0] = id_ruang
	//$array_jadwal[jml_makul][1] = jam
	//push makul
	$array_jadwal = array();
	for($i = 0; $i < $len_makul; $i++){
		array_push($array_jadwal, array());
	}

	//push ruang
	for($i = 0; $i < $len_makul; $i++){
		array_push($array_jadwal[$i], 0, 0);
	}
	
	//4. Load constraint
	//- Constraint jam -> makul -> dosen_makul -> dosen -> dosen_jam
	//- Constraint ruangan -> makul -> dosen_makul -> dosen -> dosen_ruang
	//$array_jam[jml_makul][cnt_jam] = id_jam
	//$array_ruang[jml_makul][cnt_rng] = id_ruang

	//Constraint Jam
	$array_cstr_jam = array();	

	for($i = 0; $i < $len_makul; $i++){
		array_push($array_cstr_jam, array());
		$id_makul = $array_makul[$i][0];
		$result_dosen_jam = $conn->query("SELECT dosen_jam.id_jam FROM matakuliah, dosen_makul, dosen_jam WHERE matakuliah.id = dosen_makul.id_makul AND dosen_makul.id_dosen = dosen_jam.id_dosen AND matakuliah.id = $id_makul");
		while ($dosen_jam = $result_dosen_jam->fetch_assoc()) {
			array_push($array_cstr_jam[$i], $dosen_jam['id_jam']);
		}
	}

	//Constraint Ruangan
	$array_cstr_ruang = array();

	for($i = 0; $i < $len_makul; $i++){
		array_push($array_cstr_ruang, array());
		$id_makul = $array_makul[$i][0];
		$result_dosen_ruang = $conn->query("SELECT dosen_ruang.id_ruang FROM matakuliah, dosen_makul, dosen_ruang WHERE matakuliah.id = dosen_makul.id_makul AND dosen_makul.id_dosen = dosen_ruang.id_dosen AND matakuliah.id = $id_makul");
		while ($dosen_ruang = $result_dosen_ruang->fetch_assoc()) {
			array_push($array_cstr_ruang[$i], $dosen_ruang['id_ruang']);
		}
	}

	//Tutup koneksi
	$conn->close();

	//Start GA=====================================================================================================================================================
	//jumlah populasi
	$len_pop = 100;
	//kapasitas elite_size pemilihan parent
	$elite_size = 19;
	//probabilitas crossover (%)
	$pc = 100;
	//probabilitas mutasi (%)
	$pm = 100;
	//max iteration
	$max_generations = 500;
	
	//max fitness
	$max_fitness = 0;
	//iterator
	$iter = 0;

	//Inisialisasi generasi
	$array_pop = generatePopulation($len_pop, $array_jadwal, $array_makul, $array_ruang);

	//Hitung fitness
	$array_fitness = countFitness($array_pop, $array_makul, $array_ruang, $array_cstr_ruang, $array_cstr_jam);

	//Copy nilai $array_fitness kedalam array baru ($ranked_fitness)
	//Array $ranked_fitness akan berfungsi menyortir fitness dan menentukan individu2 terbaik
	$ranked_fitness = $array_fitness;
	sort($ranked_fitness);

	//Perulangan utama algoritma GA
	//Akan berhenti ketika salah satu kondisi berikut terpenuhi
	//1. Ditemukan solusi optimum
	//2. Generasi telah mencapai maksimum yang telah ditentukan
	while(!hasFoundOptimum($max_fitness, $iter, $len_makul) && !hasReachedMaxIter($iter, $max_generations)){

		$iter++;

		//Inisialisasi array keperluan GA
		//1. $newborn untuk individu baru
		//2. $array_pool untuk mating pool
		$newborn = array();
		$array_pool = array();

		//Ambil ukuran dari array $ranked_fitness untuk operasi elitisme
		$len_fitness = sizeof($ranked_fitness);

		//Masukkan seluruh n-individu dengan fitness terbaik kedalam mating pool
		$bound = $len_fitness - $elite_size;
		for($i = $len_fitness-1; $i >= $bound; $i--){
			array_push($array_pool, $ranked_fitness[$i]);
		}

		//Roulette satu individu diluar dari jumlah elit untuk masuk ke mating pool
		$idx = selection($ranked_fitness, $elite_size);
		array_push($array_pool, $ranked_fitness[$idx]);

		//Lakukan undian crossover
		if(rollCrossover($pc)){
			//Jika dinyatakan crossover

			//Ambil ukuran dari array mating pool untuk operasi crossover
			$len_pool = sizeof($array_pool);

			//Lakukan crossover setiap 2 individu pada mating pool
			for($i = 0; $i < $len_pool-1; $i+=2){
				$idx_a = $array_pool[$i][1];
				$idx_b = $array_pool[$i+1][1];

				//Masukkan keturunan crossover ke dalam array $newborn
				$newborn = crossover($newborn, $idx_a, $idx_b, $array_pop, $array_makul, $array_ruang);
			}

			//Ambil ukuran dari array newborn untuk operasi mutasi
			$len_newborn = sizeof($newborn);

			//Lakukan undian mutasi untuk setiap keturunan pada array $newborn
			for($i = 0; $i < $len_newborn; $i++){
				if(rollMutation($pm)){
					//Jika dinyatakan mutasi
					$newborn[$i] = mutate($newborn[$i], $array_makul, $array_ruang, $array_cstr_ruang, $array_cstr_jam);
				}					
			}

			//Refresh ukuran dari array newborn
			$len_newborn = sizeof($newborn);

			//Hitung fitness masing2 keturunan, kemudian masukkan ke $array_fitness
			//Masukkan juga masing2 keturunan ke dalam array populasi ($array_pop)
			for($i = 0; $i < $len_newborn; $i++){
				$new_fitness = countFitnessIdv($newborn[$i], $array_makul, $array_ruang, $array_cstr_ruang, $array_cstr_jam);
				array_push($array_pop, $newborn[$i]);
				$len_pop = sizeof($array_pop);
				array_push($array_fitness, array($new_fitness, $len_pop-1));
			}
		}
		//Simpan data fitness maksimum untuk dicek pada perulangan
		//apakah telah menemukan solusi optimum atau tidak
		$len_fitness = sizeof($ranked_fitness);
		$max_fitness = $ranked_fitness[$len_fitness - 1][0];

		//Lakukan penyortiran fitness untuk dicek apakah menemui solusi optimum
		$ranked_fitness = $array_fitness;
		sort($ranked_fitness);
	}

	//Telah menemukan solusi optimum / mencapai generasi maksimum

	//Ambil nilai fitness maximum dan index array dari nilai fitness maximum
	$len_fitness = sizeof($ranked_fitness);
	$max_fitness = $ranked_fitness[$len_fitness - 1][0];
	$idx_max_fitness = $ranked_fitness[$len_fitness - 1][1];

	//Copy individu pada populasi dengan fitness maximum ke array baru ($real_jadwal)
	$real_jadwal = $array_pop[$idx_max_fitness];

	//Lakukan ekstraksi informasi dari array $real_jadwal dan update data pada database
	extractJadwal($real_jadwal, $array_makul, $array_ruang);
	//debugFitness($real_jadwal, $array_makul, $array_ruang, $array_cstr_ruang, $array_cstr_jam);

	//Functions=========================================================================================================

	//Fungsi untuk generasi populasi baru
	function generatePopulation($len_pop, $array_jadwal, $array_makul, $array_ruang){
		$array_pop = array();
		$len_makul = sizeof($array_makul);
		$len_ruang = sizeof($array_ruang);

		//Generasi populasi dengan cara:
		//- Lakukan iterasi sesuai jumlah populasi
		//- Untuk tiap makulnya, randomisasi nilai jam dengan ketentuan
		//  tidak melebihi atau kurang dari jam setiap harinya
		for($i = 0; $i < $len_pop; $i++){

			array_push($array_pop, $array_jadwal);

			for($j = 0; $j < $len_makul; $j++){

				//Randomisasi nilai ruangan
				$idxRuang = rand(0, $len_ruang-1);

				//Ambil referensi id ruang
				$id_ruang = $array_ruang[$idxRuang];

				//Randomisasi hari
				$idxHari = rand(1, 5);

				//Tentukan batas bawah sesuai dengan nilai hari hasil random
				$limBawahJam = (($idxHari - 1) * 11) + 1;

				//Tentukan batas atas dari nilai hari hasil random
				//Dalam hal ini, batas atas = jam maksimum per hari - sks mata kuliah
				$limAtasJam = ($idxHari * 11) - $array_makul[$j][1] + 1;

				//Randomisasi jam mata kuliah sesuai dengan batas atas dan batas bawah
				$idxJam = rand($limBawahJam, $limAtasJam);

				//Isi nilai jam sesuai dan ruangannya pada jadwal
				$array_pop[$i][$j][0] = $id_ruang;
				$array_pop[$i][$j][1] = $idxJam;
			}
		}

		return $array_pop;
	}

	//Fungsi untuk menghitung fitness populasi
	function countFitness($array_pop, $array_makul, $array_ruang, $array_cstr_ruang, $array_cstr_jam){
		$len_pop = sizeof($array_pop);
		$len_makul = sizeof($array_makul);
		$len_ruang = sizeof($array_ruang);
		$array_fitness = array();

		for($i = 0; $i < $len_pop; $i++){
			//Hitung fitness masing populasi
			$w = countFitnessIdv($array_pop[$i], $array_makul, $array_ruang, $array_cstr_ruang, $array_cstr_jam);

			array_push($array_fitness, array($w, $i));
		}

		return $array_fitness;
	}

	//Fungsi menghitung fitness individu
	function countFitnessIdv($idv, $array_makul, $array_ruang, $array_cstr_ruang, $array_cstr_jam){
		$len_makul = sizeof($array_makul);
		$len_ruang = sizeof($array_ruang);

		$bentrok = 0;
		$salah_ruang = 0;
		$salah_jam = 0;

		//Hitung fitness, berdasarkan:
		//1. jumlah matakuliah yang tidak bentrok
		//2. jumlah matakuliah yang benar tempat
		//Kategori salah penempatan
		//1. tidak sesuai dengan constraint ruang
		//2. tidak sesuai dengan constriant jam

		for($j = 0; $j < $len_makul; $j++){
			//Lakukan pengecekan bentrok untuk seluruh makul, dengan cara:
			//- Tentukan makul dengan index $array_makul[$j] & $array_makul[$j+1]
			//  (untuk mengecek makul di sebelahnya)
			//- Cek apakah ada kesamaan ruang, jika iya
			//- Cek apakah salah satu jam berbentrokan, jika tidak
			//- Skip ke cek kesalahan ruangan dan kesalahan
			for($k = $j+1; $k < $len_makul; $k++){
				//ambil nilai batas bawah dan batas atas jam
				//batas bawah = nilai jam pada individu
				//batas atas = batas bawah + sks mata kuliah
				$ruang_a = $idv[$j][0];
				$ruang_b = $idv[$k][0];

				if($ruang_a === $ruang_b){
					$sks_a = $array_makul[$j][1];
					$bb_a = $idv[$j][1];
					$ba_a = $bb_a + $sks_a;

					$sks_b = $array_makul[$k][1];
					$bb_b = $idv[$k][1];
					$ba_b = $bb_b + $sks_b;

					//variabel supaya bentrok hanya dihitung per mata kuliah tidak redundan
					//kita harus menghindari dihitungnya bentrok lebih dari satu kali
					//karena pengecekan bentrok ada pada setiap jamnya (satu bentrok = satu atau lebih jam)
					//yang dihitung bentrok itu makulnya bukan jamnya
					$allowed = TRUE;
					for($m = $bb_a; $m < $ba_a; $m++){
						for($n = $bb_b; $n < $ba_b; $n++){
							//tambah nilai bentrok jika ada nilai batas bawah dan batas atas
							//jam makul a dan b yang saling bentrok
							if($m === $n){
								if($allowed){
									$bentrok++;
									$allowed = FALSE;
								}
							}
						}
					}
				}
			}

			//Salah
			//Lakukan pengecekan kesalahan jam untuk seluruh makul, dengan cara:
			//- Iterasi setiap index ruang pada individu
			//- Ambil id_ruang pada $array_ruang, kemudian bandingkan dengan id_ruang pada array constraint ruang ($array_cstr_ruang)
			//- Jika id_ruang terdapat pada array constraint ruang, maka makul telah ditempatkan pada ruangan yang benar

			//id_ruang
			$idxRuang = $idv[$j][0];
			$benerRuang = 0;

			$len_cstr_ruang = sizeof($array_cstr_ruang[$j]);
			for($l = 0; $l < $len_cstr_ruang; $l++){
				$idxCstR = $array_cstr_ruang[$j][$l];

				//tambah nilai benar jika makul ditempatkan pada ruangan yang benar
				if($idxRuang == $idxCstR){
					$benerRuang++;
				}
			}

			//jika nilai benar masih 0(FALSE) maka tambah nilai salah ruangan
			if(!$benerRuang){
				$salah_ruang++;
			}

			//Lakukan pengecekan kesalahan jam untuk seluruh makul, dengan cara:
			//- Ambil nilai jam pada array individu
			//- Lakukan iterasi pada setiap individu, nilai jam akan bernilai lebih besar dari 0 jika dilakukan penempatan
			//- Bandingkan nilai jam setiap individu dengan nilai jam pada array constraint jam ($array_cstr_jam)
			//- Jika setiap nilai jam termasuk jumlah sks makul terdapat pada constraint jam, maka
			//  makul telah ditempatkan pada ruangan yang benar

			//nilai jam
			$jam_bwh = $idv[$j][1];
			$sks = $array_makul[$j][1];
			$jam_ats = $jam_bwh + $sks - 1;
			$benerJam = 0;

			$len_cstr_jam = sizeof($array_cstr_jam);
			for($m = 0; $m < $len_cstr_jam; $m++){
				$idxCstJ = $array_cstr_jam[$j][$m];

				//tambah nilai benar jika makul ditempatkan pada jam yang benar
				if($idxCstJ >= $jam_bwh && $idxCstJ <= $jam_ats){
					$benerJam++;
				}
			}

			//jika nilai benar masih 0(FALSE) maka tambah nilai salah jam
			if($benerJam < $sks){
				$salah_jam++;
			}
		}

		//nilai fitness = (jumlah makul - bentrok) + (jumlah makul - salah ruangan) + (jumlah makul - salah jam)
		$w = ($len_makul - $bentrok) + ($len_makul - $salah_ruang) + ($len_makul - $salah_jam);

		return $w;
	}

	//Fungsi seleksi individu
	function selection($array_fitness, $elite_size){
		//Fungsi seleksi individu dilakukan dengan melakukan roulette, dengan langkah:
		//- Pisahkan individu elit dengan yang non-elit
		//- Lakukan perhitungan maksimum fitness untuk individu non-elit
		//- Picu nilai random

		$max_fitness = 0;
		$len_fitness = sizeof($array_fitness);
		//hitung fitness individu non elit
		for($i = 0; $i < $len_fitness - $elite_size; $i++){
			$max_fitness += $array_fitness[$i][0];
		}
		
		//picu nilai random
		$rand_val = rand(0, $max_fitness);

		$w = 0;
		$idx = 0;

		//lakukan iterasi untuk setiap individu non-elit
		for($i = 0; $i < $len_fitness - $elite_size; $i++){
			$w += $array_fitness[$i][0];
			//ambil index dari fitness jika nilai random lebih dari fitness individu[i], namun tidak lebih dari
			//nilai fitness individu[i+1]
			if($rand_val > $w){
				$idx = $i+1;
				if($i == ($len_fitness - 1))
					$idx = $i;
			}
		}

		return $idx;
	}

	//Fungsi undian crossover
	function rollCrossover($pc){
		//picu nilai random dari 0-100
		$x = rand(0,100);

		//jika nilai kurang dari batas probabilitas crossover, lakukan mutasi
		if($x < $pc)
			return true;
		else
			return false;
	}

	//Fungsi crossover
	function crossover($newborn, $idx1, $idx2, $array_pop, $array_makul, $array_ruang){
		$len_makul = sizeof($array_makul);
		$len_ruang = sizeof($array_ruang);

		//Tentukan titik potong crossover secara random
		$cut_point = rand(1, $len_makul-2);

		//Simpan individu yang ingin di crossover ke variabel
		$new_1 = $array_pop[$idx1];
		$new_2 = $array_pop[$idx2];

		//Crossover nilai jam individu 1 dan 2
		for($i = 0; $i < $len_makul; $i++){
			if($i < $cut_point){
				$new_1[$i][0] = $new_2[$i][0];
				$new_1[$i][1] = $new_2[$i][1];
				$new_2[$i][0] = $array_pop[$idx1][$i][0];
				$new_2[$i][1] = $array_pop[$idx1][$i][1];
			}
		}

		//Push salah satu individu ke array individu baru
		array_push($newborn, $new_2);

		return $newborn;
	}

	//Fungsi undian mutasi
	function rollMutation($pm){
		//picu nilai random dari 0-100
		$x = rand(0,100);

		//jika nilai kurang dari batas probabilitas mutasi, lakukan mutasi
		if($x < $pm)
			return true;
		else
			return false;
	}

	//Fungsi mutasi
	function mutate($idv, $array_makul, $array_ruang, $array_cstr_ruang, $array_cstr_jam){
		//Proses mutasi sebenarnya sama dengan proses randomisasi
		//nilai jam pada tiap individu pada fase generasi,
		//hanya saja bedanya satu gen (makul) saja yang dirandomisasi ulang,
		//sementara kalau fase generasi seluruh gen akan dirandomisasi
		//randomisasi ruangan akan diarahkan untuk memenuhi constraint
		$len_makul = sizeof($array_makul);
		$len_ruang = sizeof($array_ruang);
		$mutation_point = rand(0, $len_makul-1);

		for($i = 0; $i < $len_makul; $i++){
			$len_cstr_ruang = sizeof($array_cstr_ruang[$i]);
			$len_cstr_jam = sizeof($array_cstr_jam[$i]);
			$bener_ruang = 0;
			$bener_jam = 0;
			$idxRuang = rand(0, $len_ruang-1);
			$id_ruang = $array_ruang[$idxRuang];

			while ($bener_ruang == 0) {
				for($l = 0; $l < $len_cstr_ruang; $l++){
					$idxCstR = $array_cstr_ruang[$i][$l];
					if($id_ruang == $idxCstR)
						$bener_ruang++;
				}

				if($bener_ruang == 0){
					$idxRuang = rand(0, $len_ruang-1);
					$id_ruang = $array_ruang[$idxRuang];
				}
			}

			$sks = $array_makul[$i][1];
			while ($bener_jam < $sks){
				$idxHari = rand(1, 5);
				$segmen = rand(0, 1);
				if(!$segmen){
					$limBawahJam = (($idxHari - 1) * 11) + 1;
					$limAtasJam = ($idxHari * 11) - $sks - 5;
					//echo 'Lim bwh pagi = ' . $limBawahJam . '<br>';
					//echo 'Lim ats pagi = ' . $limAtasJam . '<br>';
				}
				else{
					$limBawahJam = (($idxHari - 1) * 11) + 6;
					$limAtasJam = ($idxHari * 11) - $sks + 1;
					//echo 'Lim bwh siang = ' . $limBawahJam . '<br>';
					//echo 'Lim ats siang = ' . $limAtasJam . '<br>';
				}
				$idxJam = rand($limBawahJam, $limAtasJam);
				$idxJamAts = $idxJam + $sks - 1;

				for($m = 0; $m < $len_cstr_jam; $m++){
					$idxCstJ = $array_cstr_jam[$i][$m];

					//tambah nilai benar jika makul ditempatkan pada jam yang benar
					if($idxCstJ >= $idxJam && $idxCstJ <= $idxJamAts){
						$bener_jam++;
					}
				}
			}

			if($i === $mutation_point){
				$idv[$i][1] = $idxJam;
			}
		}

		return $idv;
	}

	//Fungsi pengecek apakah menemukan optimum
	function hasFoundOptimum($w, $iter, $len_makul){
		//Dalam hal ini, jadwal akan dikatakan optimum
		//Jika nilai bentrok = 0, salah ruang = 0, dan salah jam = 0
		//Ingat, bahwasanya:
		//Fitness = (jumlah makul - bentrok) + (jumlah makul - salah ruang) + (jumlah makul - salah jam)
		//Fitness = (jumlah makul - 0) + (jumlah makul - 0) + (jumlah makul - 0)
		//Fitness = jumlah makul + jumlah makul + jumlah makul;
		//Jadi, jumlah fitness pada solusi optimum = jumlah makul x 3;
		$optimum_w = $len_makul * 3;
		$optimum = $w === $optimum_w;

		//return true jika optimum
		if($optimum){
			return TRUE;
		}
		else
			return FALSE;
	}

	//Fungsi pengecek apakah telah mencapai generasi maksimum
	function hasReachedMaxIter($iter, $max){
		//Return true jika telah mencapai generasi maksimum
		if($iter >= $max){
			return TRUE;
		}
		else
			return FALSE;
	}

	//Fungsi ekstraksi jadwal pada algoritma GA
	function extractJadwal($real_jadwal, $array_makul, $array_ruang){
		$servername = "localhost";
		$username = "root";
		$password = "";
		$db = "jadwal_ga";

		$len_makul = sizeof($array_makul);
		$len_ruang = sizeof($array_ruang);
		$id_makul = 0;
		$id_ruang = 0;
		$id_jam = 0;

		//Ekstraksi nilai matakuliah, jam dan ruang, kemudian masukkan ke tabel jadwal pada database
		for($i = 0; $i < $len_makul; $i++){
			$id_makul = $array_makul[$i][0];
			$id_ruang = $real_jadwal[$i][0];
			$id_jam = $real_jadwal[$i][1];

			$sql = 'INSERT INTO jadwal (id_makul, id_ruang, id_jam) VALUES
			(' . $id_makul . ', ' . $id_ruang . ', ' . $id_jam . ')';
			
			$conn = mysqli_connect($servername, $username, $password, $db);
			if (mysqli_connect_errno())
			{
				echo "Failed to connect to MySQL: " . mysqli_connect_error();
			}

			//Redirect jika berhasil
			if($conn->query($sql)===TRUE){
				echo "<script>
				location='jadwal.php';
				</script>";
			}
		}
	}

	function debugFitness($idv, $array_makul, $array_ruang, $array_cstr_ruang, $array_cstr_jam){
		$len_makul = sizeof($array_makul);
		$len_ruang = sizeof($array_ruang);

		$bentrok = 0;
		$salah_ruang = 0;
		$salah_jam = 0;

		for($j = 0; $j < $len_makul; $j++){
			//Bentrok
			for($k = $j+1; $k < $len_makul; $k++){
				$ruang_a = $idv[$j][0];
				$ruang_b = $idv[$k][0];

				if($ruang_a === $ruang_b){
					$id_a = $array_makul[$j][0];
					$sks_a = $array_makul[$j][1];
					$bb_a = $idv[$j][1];
					$ba_a = $bb_a + $sks_a;

					$id_b = $array_makul[$k][0];
					$sks_b = $array_makul[$k][1];
					$bb_b = $idv[$k][1];
					$ba_b = $bb_b + $sks_b;

					$id_ruang = $idv[$j][0];
					
					echo 'Makul A>' . $id_a . ': Jam ' . $bb_a . ' ' . $sks_a . ' SKS & Makul B>' . $id_b . ': Jam ' . $bb_b . ' ' . $sks_b . ' SKS satu ruangan di ruangan ' . $id_ruang;

					$allowed = TRUE;
					for($m = $bb_a; $m < $ba_a; $m++){
						for($n = $bb_b; $n < $ba_b; $n++){
							if($m === $n){
								echo ' (BENTROK pada jam ' . $m . ')';
								if($allowed){
									$bentrok++;
									$allowed = FALSE;
								}
							}
						}
					}
					echo '.<br>';
				}
			}

			//Salah
			$id = $array_makul[$j][0];
			$idxRuang = $idv[$j][0];
			$benerRuang = 0;

			$len_cstr_ruang = sizeof($array_cstr_ruang[$j]);
			for($l = 0; $l < $len_cstr_ruang; $l++){
				$idxCstR = $array_cstr_ruang[$j][$l];
				echo 'Constraint ruangan ' . $idxCstR . '<br>';
				if($idxRuang == $idxCstR){
					echo 'Makul>' . $id . ' dalam ruangan ' . $idxRuang . '<br>';
					$benerRuang++;
				}
			}

			if($benerRuang == 0){
				echo 'Makul>' . $id . ' SALAH RUANG dengan ruangan ' . $idxRuang . '<br>';
				$salah_ruang++;
			}

			$benerJam = 0;
			$jam_bwh = $idv[$j][1];
			$sks = $array_makul[$j][1];
			$jam_ats = $jam_bwh + $sks - 1;
			$len_cstr_jam = sizeof($array_cstr_jam);

			for($m = 0; $m < $len_cstr_jam; $m++){
				$idxCstJ = $array_cstr_jam[$j][$m];
				if($idxCstJ >= $jam_bwh && $idxCstJ <= $jam_ats){
					echo 'Makul>' . $id. ' Jam = ' . $jam_bwh . ' & Constraint ' . $idxCstJ . ' <br>';
					$benerJam++;
				}
			}

			echo $benerJam . ' <br>';
			if($benerJam < $sks){
				echo 'Makul>' . $id. ' SALAH JAM dengan jam ' . $idv[$j][1] . '<br>';
				$salah_jam++;
			}
			echo '<br>';
		}
		echo '<hr>';
		echo 'Bentrok: ' . $bentrok . ', Salah Ruangan: ' . $salah_ruang . ', Salah Jam: ' . $salah_jam . '<hr>';

		echo 'Fitness = ('.$len_makul.' - '.$bentrok.') + ('.$len_makul.' - '.$salah_ruang.') + ('.$len_makul .'-'. $salah_jam.') ';
		$w_makul = $len_makul - $bentrok;
		$w_ruang = $len_makul - $salah_ruang;
		$w_jam = $len_makul - $salah_jam;

		$w = $w_makul + $w_ruang + $w_jam;
		echo '<br>';
		for($i = 0; $i < $len_makul; $i++){
			$id_makul = $array_makul[$i][0];
			$id_ruang = $idv[$i][0];
			$id_jam = $idv[$i][1];
			$ruang_kosong = $id_jam == 0;

			if(!$ruang_kosong){
				echo $id_makul . ', ' . $id_ruang . ', ' . $id_jam . '<br>';
				// $sql = 'INSERT INTO jadwal (id_makul, id_ruang, id_jam) VALUES
				// (' . $id_makul . ', ' . $id_ruang . ', ' . $id_jam . ')';
				
				// $conn = mysqli_connect($servername, $username, $password, $db);
				// if (mysqli_connect_errno())
				// {
				// 	echo "Failed to connect to MySQL: " . mysqli_connect_error();
				// }

				// if($conn->query($sql)===TRUE){
				// 	echo "<script>
				// 	location='jadwal.php';
				// 	</script>";
				// }
			}
		}

		//echo 'fitness = ' . $w . '<hr>';

		//return $w;
	}
?>