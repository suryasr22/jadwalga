<?php
	//Melepas batasan waktu eksekusi algoritma
	ini_set('max_execution_time', 100000);

	//Menambah jumlah memori yang digunakan algoritma
	ini_set('memory_limit', '1024M');



	//Panggil library koneksi db
	//Koneksi dibuka dalam library ini
	include("koneksi.php");

	//Panggil library fungsi
	include("functions.php");

	//Panggil library cek sesi login
	include("session_check.php");



	//INISIALISASI



	//Kosongkan tabel jadwal
	$conn->query("TRUNCATE TABLE jadwal");



	$semester = $_POST['semester'];



	//Inisialisasi array mata kuliah
	//Ambil id makul, sks, id dosen, kelas, semester dari tiap mata kuliah
	//Data ini disimpan pada array bernama $array_makul
	//(b35-b58)
	$array_makul = array();

	$result_makul = $conn->query("SELECT matakuliah.id AS id_makul, dosen.id AS id_dosen, sks, kelas, semester FROM matakuliah, dosen, dosen_makul 
		WHERE matakuliah.id = dosen_makul.id_makul AND dosen.id = dosen_makul.id_dosen");

	while($makul = $result_makul->fetch_assoc()){

		$arrMakul = array();

		if($semester === 'ganjil')
		{
			if($makul['semester'] % 2 == 1){

				array_push($arrMakul, $makul['id_makul']); //==> $array_makul[jml_makul][0] = ID mata kuliah

				array_push($arrMakul, $makul['sks']); //==> $array_makul[jml_makul][1] = SKS mata kuliah

				array_push($arrMakul, $makul['id_dosen']); //==> $array_makul[jml_makul][2] = ID dosen dari mata kuliah

				array_push($arrMakul, $makul['kelas']); //==> $array_makul[jml_makul][3] = kelas mata kuliah

				array_push($arrMakul, $makul['semester']); //==> $array_makul[jml_makul][4] = semester mata kuliah

				array_push($array_makul, $arrMakul);

			}
		} 
		else 
		{
			if($makul['semester'] % 2 == 0){

				array_push($arrMakul, $makul['id_makul']); //==> $array_makul[jml_makul][0] = ID mata kuliah

				array_push($arrMakul, $makul['sks']); //==> $array_makul[jml_makul][1] = SKS mata kuliah

				array_push($arrMakul, $makul['id_dosen']); //==> $array_makul[jml_makul][2] = ID dosen dari mata kuliah

				array_push($arrMakul, $makul['kelas']); //==> $array_makul[jml_makul][3] = kelas mata kuliah

				array_push($arrMakul, $makul['semester']); //==> $array_makul[jml_makul][4] = semester mata kuliah

				array_push($array_makul, $arrMakul);
				
			}
		}

	}

	$len_makul = sizeof($array_makul);



	//Inisialisasi array mata ruangan
	//Ambil id tiap ruangan
	//Data ini disimpan pada array bernama $array_ruang
	//(b66-b76)
	$array_ruang = array();

	$result_ruang = $conn->query("SELECT id FROM ruangan");

	while($ruang = $result_ruang->fetch_assoc()){

		array_push($array_ruang, $ruang['id']); //==> $array_ruang[jml_ruang] = ID ruangan

	}

	$len_ruang = sizeof($array_ruang);



	//Inisialisasi array jadwal
	//Digunakan sebagai sampel individu kosong yang akan digunakan pada setiap individu dalam populasi
	//Data ini disimpan pada array bernama $array_jadwal
	//(b84-b96)
	$array_jadwal = array();

	for($i = 0; $i < $len_makul; $i++){

		array_push($array_jadwal, array());

	}

	for($i = 0; $i < $len_makul; $i++){

		array_push($array_jadwal[$i], 0, 0); //==> $array_jadwal[jml_makul][0] = ID ruangan, $array_jadwal[jml_makul][1] = jam

	}



	//Inisialisasi array batasan jam
	//Ambil batasan jam dari setiap mata kuliah
	//Batasan jam diatur oleh dosen pengampu mata kuliah
	//Data ini disimpan pada array bernama $array_cstr_jam
	//(b105-b123)
	$array_cstr_jam = array();

	for($i = 0; $i < $len_makul; $i++){

		array_push($array_cstr_jam, array());

		$id_makul = $array_makul[$i][0];

		$result_dosen_jam = $conn->query("SELECT dosen_jam.id_jam FROM matakuliah, dosen_makul, dosen_jam WHERE matakuliah.id = dosen_makul.id_makul AND dosen_makul.id_dosen = dosen_jam.id_dosen AND matakuliah.id = $id_makul");

		while ($dosen_jam = $result_dosen_jam->fetch_assoc()) {

			array_push($array_cstr_jam[$i], $dosen_jam['id_jam']); //==> $array_cstr_jam[jml_makul][jml_cstr_jam] = jam

		}

	}

	$len_cstr_jam = sizeof($array_cstr_jam);



	//Inisialisasi array batasan ruangan
	//Ambil batasan jam dari setiap mata kuliah
	//Batasan jam diatur oleh dosen pengampu mata kuliah
	//Data ini disimpan pada array bernama $array_cstr_jam
	//(b132-b150)
	$array_cstr_ruang = array();

	for($i = 0; $i < $len_makul; $i++){

		array_push($array_cstr_ruang, array());

		$id_makul = $array_makul[$i][0];

		$result_dosen_ruang = $conn->query("SELECT dosen_ruang.id_ruang FROM matakuliah, dosen_makul, dosen_ruang WHERE matakuliah.id = dosen_makul.id_makul AND dosen_makul.id_dosen = dosen_ruang.id_dosen AND matakuliah.id = $id_makul");

		while ($dosen_ruang = $result_dosen_ruang->fetch_assoc()) {

			array_push($array_cstr_ruang[$i], $dosen_ruang['id_ruang']); //==> $array_cstr_jam[jml_makul][jml_cstr_ruang] = ID ruangan

		}

	}

	$len_cstr_ruang = sizeof($array_cstr_ruang);



	//Tutup koneksi ke database
	$conn->close();



	//ALGORITMA UTAMA



	//Variabel yang diperlukan GA

	//Jumlah populasi
	$len_pop = 100;

	//Jumlah elit
	$elite_size = 13;

	//Probabilitas koneksi
	$pc = 100;

	//Probabilitas mutasi
	$pm = 100;

	//Generasi maksimum
	$max_generations = 1000;

	//Fitness maksimum
	$max_fitness = 0;

	//Iterasi
	$iter = 0;



	//Generasi populasi
	$array_pop = generatePopulation($len_pop, $array_jadwal, $array_makul, $array_ruang);



	//Hitung fitness
	$array_fitness = countFitness($array_pop, $array_makul, $array_ruang, $array_cstr_ruang, $array_cstr_jam);



	//Urutkan fitness dari yang kecil ke besar
	$ranked_fitness = $array_fitness;

	sort($ranked_fitness);



	//Mulai iterasi
	while(!hasFoundOptimum($max_fitness, $iter, $len_makul) && !hasReachedMaxIter($iter, $max_generations)){

		$iter++;

		$newborn = array();

		$array_pool = array();



		//Pemilihan elit
		//(b218-226)
		$len_fitness = sizeof($ranked_fitness);

		$bound = $len_fitness - $elite_size;

		for($i = $len_fitness-1; $i >= $bound; $i--){

			array_push($array_pool, $ranked_fitness[$i]);

		}



		//Pilih individu non elit
		$idx = selection($ranked_fitness, $elite_size);

		array_push($array_pool, $ranked_fitness[$idx]);



		if(rollCrossover($pc)){

			//Crossover
			//(b241-b251)
			$len_pool = sizeof($array_pool);

			for($i = 0; $i < $len_pool-1; $i+=2){

				$idx_a = $array_pool[$i][1];

				$idx_b = $array_pool[$i+1][1];

				$newborn = crossover($newborn, $idx_a, $idx_b, $array_pop, $array_makul, $array_ruang);

			}



			//Mutasi
			//(b257-b267)
			$len_newborn = sizeof($newborn);

			for($i = 0; $i < $len_newborn; $i++){

				if(rollMutation($pm)){

					$newborn[$i] = mutate($newborn[$i], $array_makul, $array_ruang, $array_cstr_ruang, $array_cstr_jam);

				}

			}



			//Masukkan individu baru ke dalam populasi
			//(b272-b285)
			$len_newborn = sizeof($newborn);

			for($i = 0; $i < $len_newborn; $i++){

				$new_fitness = countFitnessIdv($newborn[$i], $array_makul, $array_ruang, $array_cstr_ruang, $array_cstr_jam);

				array_push($array_pop, $newborn[$i]);

				$len_pop = sizeof($array_pop);

				array_push($array_fitness, array($new_fitness, $len_pop-1));

			}

		}



		//Urutkan kembali fitness populasi
		//(b292-b299)
		$len_fitness = sizeof($ranked_fitness);

		$max_fitness = $ranked_fitness[$len_fitness - 1][0];

		$ranked_fitness = $array_fitness;

		sort($ranked_fitness);

	}



	//Ambil jadwal optimum, masukkan ke database
	//(b306-317)
	$len_fitness = sizeof($ranked_fitness);

	$max_fitness = $ranked_fitness[$len_fitness - 1][0];

	$idx_max_fitness = $ranked_fitness[$len_fitness - 1][1];

	$real_jadwal = $array_pop[$idx_max_fitness];

	//debugFitness($real_jadwal, $array_makul, $array_ruang, $array_cstr_ruang, $array_cstr_jam);

	extractJadwal($real_jadwal, $array_makul, $array_ruang);



	//FUNGSI-FUNGSI



	//Fungsi untuk melakukan generasi populasi
	function generatePopulation($len_pop, $array_jadwal, $array_makul, $array_ruang){

		//Fungsi ini membutuhkan jumlah populasi awal, array jadwal, array makul, array ruang
		//Jumlah populasi awal dibutuhkan untuk menentukan banyaknya populasi yang digenerasi
		//Array jadwal digunakan sebagai sampel tiap individu pada populasi (karena individu berupa jadwal)
		//Array makul digunakan untuk mengambil jumlah sks tiap makul
		//Sks tiap makul akan digunakan untuk randomisasi alokasi jam tiap makul pada jadwal
		//Array ruang digunakan untuk mengambil ID masing-masing ruangan yang ada
		//ID ruang digunakan untuk randomisasi alokasi ruangan tiap makul pada jadwal
		//Fungsi ini menghasilkan array populasi yang berisi individu hasil randomisasi jadwal
		$array_pop = array();

		$len_makul = sizeof($array_makul);

		$len_ruang = sizeof($array_ruang);



		for($i = 0; $i < $len_pop; $i++){

			array_push($array_pop, $array_jadwal);

			for($j = 0; $j < $len_makul; $j++){

				$idxRuang = rand(0, $len_ruang-1); //==> Randomisasi ruangan

				$id_ruang = $array_ruang[$idxRuang];

				$idxHari = rand(1, 5);

				$limBawahJam = (($idxHari - 1) * 12) + 1;

				$limAtasJam = ($idxHari * 12) - $array_makul[$j][1] + 1;

				$idxJam = rand($limBawahJam, $limAtasJam); //==> Randomisasi jam

				$array_pop[$i][$j][0] = $id_ruang;

				$array_pop[$i][$j][1] = $idxJam;

			}

		}

		return $array_pop;

	}



	//Fungsi untuk melakukan perhitungan fitness pada seluruh anggota populasi
	function countFitness($array_pop, $array_makul, $array_ruang, $array_cstr_ruang, $array_cstr_jam){

		//Fungsi ini membutuhkan array populasi, array makul, array ruang, array batasan ruang dan array batasan jam
		//Array populasi digunakan untuk mengambil tiap individu agar dapat dilakukan perhitungan individu tiap fitnessnya
		//Perhitungan individu tiap fitnessnya dilakukan pada fungsi countFitnessIdv
		//Array makul, array ruang, array batasan ruang dan array batasan jam akan digunakan sebagai parameter masukan
		//pada fungsi countFitnessIdv
		//Fungsi ini menghasilkan array fitness yang berisi nilai fitness dari individu pada populasi
		$len_pop = sizeof($array_pop);

		$len_makul = sizeof($array_makul);

		$len_ruang = sizeof($array_ruang);

		$array_fitness = array();

		for($i = 0; $i < $len_pop; $i++){

			$w = countFitnessIdv($array_pop[$i], $array_makul, $array_ruang, $array_cstr_ruang, $array_cstr_jam);

			array_push($array_fitness, array($w, $i));

		}

		return $array_fitness;
	}



	//Fungsi untuk melakukan perhitungan fitness pada sebuah individu
	function countFitnessIdv($idv, $array_makul, $array_ruang, $array_cstr_ruang, $array_cstr_jam){

		//Fungsi ini membutuhkan individu(jadwal), array makul, array ruang, array batasan ruang dan array batasan jam
		//Individu akan digunakan untuk dihitung jumlah bentrok jam, bentrok kelas, bentrok dosen, salah jam, salah ruang dan constraint jumat
		//Array makul digunakan untuk mengambil jumlah sks tiap mata kuliah
		//Sks tiap mata kuliah akan digunakan untuk mengitung bentrok (jam, kelas, dosen), salah jam dan constraint jumat
		//Array ruang digunakan untuk menghitung bentrok jam dan salah ruang
		//Array batasan ruang digunakan untuk menghitung salah ruang
		//Array batasan jam digunakan untuk menghitung salah jam
		//Fungsi ini menghasilkan nilai fitness dari individu
		$len_makul = sizeof($array_makul);

		$len_ruang = sizeof($array_ruang);



		$bentrok = 0;

		$bentrok_dosen = 0;

		$bentrok_kelas = 0;

		$salah_ruang = 0;

		$salah_jam = 0;

		$salah_jumat = 0;



		for($j = 0; $j < $len_makul; $j++){

			//Perhitungan jumlah bentrok
			for($k = $j+1; $k < $len_makul; $k++){

				$ruang_a = $idv[$j][0];

				$ruang_b = $idv[$k][0];



				$kelas_a = $array_makul[$j][3];

				$kelas_b = $array_makul[$k][3];



				$semester_a = $array_makul[$j][4];

				$semester_b = $array_makul[$k][4];



				$dosen_a = $array_makul[$j][2];

				$dosen_b = $array_makul[$k][2];



				$sks_a = $array_makul[$j][1];

				$bb_a = $idv[$j][1];

				$ba_a = $bb_a + $sks_a;



				$sks_b = $array_makul[$k][1];

				$bb_b = $idv[$k][1];

				$ba_b = $bb_b + $sks_b;



				$id_ruang = $idv[$j][0];



				$allowed = TRUE;

				$allowed_dosen = TRUE;

				$allowed_kelas = TRUE;



				for($m = $bb_a; $m < $ba_a; $m++){

					for($n = $bb_b; $n < $ba_b; $n++){

						if($m === $n){
							
							if($ruang_a == $ruang_b){ //==> Bentrok jam mata kuliah pada ruangan yang sama

								if($allowed){

									$bentrok++;

									$allowed = FALSE;

								}

							}

							if($kelas_a == $kelas_b && $semester_a == $semester_b && $kelas_a != '-'){ //==> Bentrok jam mata kuliah dengan kelas yang sama

								if($allowed_kelas){

									$bentrok_kelas++;

									$allowed_kelas = FALSE;

								}

							}

							if($dosen_a == $dosen_b){ //==> Bentrok jam mata kuliah dengan dosen yang sama

								if($allowed_dosen){

									$bentrok_dosen++;

									$allowed_dosen = FALSE;

								}

							}

						}

					}

				}

			}


			
			//Perhitungan jumlah mata kuliah yang salah penempatan ruang (tidak sesuai batasan ruang)
			$idxRuang = $idv[$j][0];

			$benerRuang = 0;

			$len_cstr_ruang = sizeof($array_cstr_ruang[$j]);



			for($l = 0; $l < $len_cstr_ruang; $l++){

				$idxCstR = $array_cstr_ruang[$j][$l];

				if($idxRuang == $idxCstR){

					$benerRuang++;

				}

			}

			if(!$benerRuang){

				$salah_ruang++;

			}



			//Perhitungan jumlah mata kuliah yang salah penempatan jam (tidak sesuai batasan jam)
			$jam_bwh = $idv[$j][1];

			$sks = $array_makul[$j][1];

			$jam_ats = $jam_bwh + $sks - 1;

			$benerJam = 0;

			$len_cstr_jam = sizeof($array_cstr_jam[$j]);



			for($m = 0; $m < $len_cstr_jam; $m++){

				$idxCstJ = $array_cstr_jam[$j][$m];

				if($idxCstJ >= $jam_bwh && $idxCstJ <= $jam_ats){

					$benerJam++;

				}
			}



			if($benerJam < $sks){

				$salah_jam++;

			}



			//Perhitungan jumlah mata kuliah yang melanggar constraint jumat
			if((54 >= $jam_bwh && 54 <= $jam_ats) || (55 >= $jam_bwh && 55 <= $jam_ats)){

				$salah_jumat++;

			}

		}

		//Fitness
		$w = ($len_makul - $bentrok) + ($len_makul - $bentrok_dosen) + ($len_makul - $bentrok_kelas) + ($len_makul - $salah_ruang) + ($len_makul - $salah_jam) + ($len_makul - $salah_jumat);

		return $w;

	}



	//Fungsi seleksi individu non elit
	function selection($array_fitness, $elite_size){

		//Fungsi ini membutuhkan array fitness dan jumlah elit
		//Array fitness digunakan untuk mengambil individu dengan fitness yang sudah terurut
		//Jumlah elit digunakan untuk mengetahui jumlah non elit
		//Fungsi ini menghasilkan indeks dari individu yang terpilih roulette
		$max_fitness = 0;

		$len_fitness = sizeof($array_fitness);



		for($i = 0; $i < $len_fitness - $elite_size; $i++){

			$max_fitness += $array_fitness[$i][0]; //==> Hitung jumlah fitness dari individu non elit

		}



		$rand_val = rand(0, $max_fitness);

		$w = 0;

		$idx = 0;



		for($i = 0; $i < $len_fitness - $elite_size; $i++){
			//Roulette
			$w += $array_fitness[$i][0];

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

		//Fungsi ini membutuhkan nilai probabilitas crossover
		//Fungsi ini menghasilkan apakah crossover akan dilakukan atau tidak
		$x = rand(0,100);



		if($x < $pc)

			return true;

		else

			return false;

	}



	//Fungsi crossover
	function crossover($newborn, $idx1, $idx2, $array_pop, $array_makul, $array_ruang){

		//Fungsi ini membutuhkan array penampung individu baru, indeks individu A, indeks individu B, array populasi, array makul, dan array ruang
		//Array penampung individu baru digunakan untuk menampung individu2 baru hasil crossover
		//Indeks individu A digunakan untuk mengambil individu A pada populasi
		//Indeks individu B digunakan untuk mengambil individu B pada populasi
		//Array populasi akan digunakan untuk mengambil individu A dan B
		//Array makul digunakan untuk iterator individu
		//Fungsi ini menghasilkan dua individu baru hasil crossover individu A dan B
		$len_makul = sizeof($array_makul);

		$len_ruang = sizeof($array_ruang);

		$cut_point = rand(1, $len_makul-2);

		$new_1 = $array_pop[$idx1];

		$new_2 = $array_pop[$idx2];



		for($i = 0; $i < $len_makul; $i++){

			if($i < $cut_point){

				//Crossover
				$new_1[$i][0] = $new_2[$i][0];

				$new_1[$i][1] = $new_2[$i][1];

				$new_2[$i][0] = $array_pop[$idx1][$i][0];

				$new_2[$i][1] = $array_pop[$idx1][$i][1];

			}

		}

		//Individu baru
		array_push($newborn, $new_1);

		array_push($newborn, $new_2);

		return $newborn;
	}



	//Fungsi undian mutasi
	function rollMutation($pm){

		//Fungsi ini membutuhkan nilai probabilitas mutasi
		//Fungsi ini menghasilkan apakah mutasi akan dilakukan atau tidak
		$x = rand(0,100);

		if($x < $pm)

			return true;

		else

			return false;

	}



	//Fungsi mutasi
	function mutate($idv, $array_makul, $array_ruang, $array_cstr_ruang, $array_cstr_jam){

		//Fungsi ini membutuhkan individu yang akan dimutasi, array makul, array ruang, array batasan ruang dan array batasan jam
		//Array makul digunakan untuk mengambil sks dari makul yang akan dimutasi
		//Array ruang digunakan untuk mengambil ID ruangan dari makul yang akan dimutasi
		//Fungsi ini menghasilkan sebuah individu yang telah dimutasi
		$len_makul = sizeof($array_makul);

		$len_ruang = sizeof($array_ruang);

		$mutation_point = rand(0, $len_makul-1);



		$bentrok = 0;

		$bentrok_dosen = 0;

		$bentrok_kelas = 0;



		$random_ruang = TRUE;

		$random_jam = TRUE;



		if($random_ruang){

			$idxRuang = rand(0, $len_ruang-1);

			$id_ruang = $array_ruang[$idxRuang];

			$idv[$mutation_point][0] = $id_ruang;
		}



		if($random_jam){

			$sks = $array_makul[$mutation_point][1];

			$idxHari = rand(1, 5);


			
			$limBawahJam = (($idxHari - 1) * 12) + 1;

			$limAtasJam = ($idxHari * 12) - $sks + 1;

			$idxJam = rand($limBawahJam, $limAtasJam);



			$idv[$mutation_point][1] = $idxJam;

		}

		return $idv;
	}



	//Fungsi pengecekan optimum
	function hasFoundOptimum($w, $iter, $len_makul){

		//Fungsi ini membutuhkan nilai fitness dari individu terbaik, jumlah iterasi, dan jumlah makul
		//Nilai fitness individu terbaik digunakan untuk dicek apakah telah mencapai solusi optimum atau belum
		//Jumlah iterasi digunakan untuk menampilkan pada iterasi keberapa solusi optimum ditemukan
		//Jumlah makul digunakan untuk menghitung skor yang menjadi kriteria optimum
		$optimum_w = $len_makul * 6;

		$optimum = $w === $optimum_w;



		if($optimum){

			echo '<strong>HASIL OPTIMUM TELAH DITEMUKAN PADA ITERASI KE - ' . ($iter+1) . '</strong><br>';

			return TRUE;

		}

		else

			return FALSE;



	}



	//Fungsi pengecekan iterasi maksimum
	function hasReachedMaxIter($iter, $max){

		//Fungsi ini membutuhkan jumlah iterasi dan jumlah maksimum iterasi
		//Fungsi ini menghasilkan apakah iterasi telah mencapai maksimum atau tidak
		if($iter >= $max)

			return TRUE;		

		else

			return FALSE;
	}



	//Fungsi ekstraksi jadwal
	function extractJadwal($real_jadwal, $array_makul, $array_ruang){

		//Fungsi ini membutuhkan jadwal optimum, array makul dan array ruang
		//Jadwal optimum akan diekstrak datanya untuk dimasukkan ke database
		//Array makul digunakan untuk mengekstraksi id_makul
		//Array ruang digunakan untuk mengekstraksi id_ruang
		$servername = "localhost";

		$username = "root";

		$password = "";

		$db = "jadwal_ga";



		$len_makul = sizeof($array_makul);

		$len_ruang = sizeof($array_ruang);



		$id_makul = 0;

		$id_ruang = 0;

		$id_jam = 0;



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

			if($conn->query($sql)===TRUE){
				
				echo "<script>
				
					location='jadwal.php';
				
				</script>";

			}
		}

		echo "<a href=\"jadwal.php\">Kembali ke jadwal</a>";
	}



	//Fungsi untuk menampilkan hasil fitness dari individu optimum
	function debugFitness($idv, $array_makul, $array_ruang, $array_cstr_ruang, $array_cstr_jam){

		//Merupakan fungsi yang sama dengan fungsi penghitung fitness individu
		//Hanya saja bedanya diselipkan fungsi2 echo didalamnya untuk menampilkan perhitungan fitness pada laman web
		$len_makul = sizeof($array_makul);

		$len_ruang = sizeof($array_ruang);



		$bentrok = 0;

		$bentrok_dosen = 0;

		$bentrok_kelas = 0;

		$salah_ruang = 0;

		$salah_jam = 0;

		$salah_jumat = 0;



		for($j = 0; $j < $len_makul; $j++){

			for($k = $j+1; $k < $len_makul; $k++){

				$ruang_a = $idv[$j][0];

				$ruang_b = $idv[$k][0];



				$kelas_a = $array_makul[$j][3];

				$kelas_b = $array_makul[$k][3];



				$semester_a = $array_makul[$j][4];

				$semester_b = $array_makul[$k][4];



				$dosen_a = $array_makul[$j][2];

				$dosen_b = $array_makul[$k][2];



				$id_a = $array_makul[$j][0];

				$sks_a = $array_makul[$j][1];


				$bb_a = $idv[$j][1];

				$ba_a = $bb_a + $sks_a;



				$id_b = $array_makul[$k][0];

				$sks_b = $array_makul[$k][1];

				$bb_b = $idv[$k][1];

				$ba_b = $bb_b + $sks_b;



				$id_ruang = $idv[$j][0];

				$allowed = TRUE;

				$allowed_dosen = TRUE;

				$allowed_kelas = TRUE;

				$benerJumat = 0;



				for($m = $bb_a; $m < $ba_a; $m++){

					for($n = $bb_b; $n < $ba_b; $n++){

						if($m === $n){



							if($ruang_a == $ruang_b){

								echo 'Makul A>' . $id_a . ': Jam ' . $bb_a . ' ' . $sks_a . ' SKS & Makul B>' . $id_b . ': Jam ' . $bb_b . ' ' . $sks_b . ' SKS satu ruangan di ruangan ' . $id_ruang . ' pada jam ' . $m . '<br>';

								if($allowed){

									$bentrok++;

									$allowed = FALSE;

								}

							}



							if($kelas_a == $kelas_b && $semester_a == $semester_b && $kelas_a != '-'){

								echo 'Makul A>' . $id_a . ': Jam ' . $bb_a . ' ' . $sks_a . ' SKS & Makul B>' . $id_b . ': Jam ' . $bb_b . ' ' . $sks_b . ' SKS satu kelas dengan kelas ' . $kelas_a . ' pada jam ' . $m . '<br>';

								if($allowed_kelas){

									$bentrok_kelas++;

									$allowed_kelas = FALSE;

								}

							}



							if($dosen_a == $dosen_b){

								echo 'Makul A>' . $id_a . ': Jam ' . $bb_a . ' ' . $sks_a . ' SKS & Makul B>' . $id_b . ': Jam ' . $bb_b . ' ' . $sks_b . ' SKS satu dosen dengan id dosen ' . $dosen_a . ' pada jam ' . $m . '<br>';

								if($allowed_dosen){

									$bentrok_dosen++;

									$allowed_dosen = FALSE;

								}

							}

						}

					}

				}

			}



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

			$len_cstr_jam = sizeof($array_cstr_jam[$j]);



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



			if((54 >= $jam_bwh && 54 <= $jam_ats) || (55 >= $jam_bwh && 55 <= $jam_ats)){

				$salah_jumat++;

			}

		}



		echo '<hr>';

		echo 'Bentrok: ' . $bentrok . ', Salah Ruangan: ' . $salah_ruang . ', Salah Jam: ' . $salah_jam . '<br>';

		echo 'Bentrok dosen: ' . $bentrok_dosen . ', bentrok kelas: ' . $bentrok_kelas . '<hr>';

		echo 'Fitness = ('.$len_makul.' - '.$bentrok.') + ('.$len_makul.' - '.$bentrok_dosen.') + ('.$len_makul.' - '.$bentrok_kelas.') + ('.$len_makul.' - '.$salah_ruang.') + ('.$len_makul.' - '.$salah_jam.') + ('.$len_makul.' - '.$salah_jumat.')';



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

			}

		}

	}

?>