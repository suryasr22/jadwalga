<?php
//INISIALISASI==============================================================================================================
	require_once('makul.php');
	$array_makul = array();
	$array_jadwal = array();
	$array_populasi = array();
	$copy_populasi = array();
	$array_weight = array();
	$copy_weight = array();
	$array_fitness = array();
	$array_temp = array();
	$idx_idv_a = 0;
	$idx_idv_b = 0;
	$populasi_awal = 10;
	$iterasi = 0;
	$max_iter = 50;

	//inisialisasi makul
	$array_makul = init_makul();

	//inisialisasi constraint
	echo "Init constraint <hr>";
	$array_jadwal = init_jadwal($array_makul);
	debugJadwal($array_jadwal);

	//generate populasi
	echo "Init populasi <hr>";
	for($i = 0; $i < $populasi_awal; $i++){
		$array_baru = generatePopulation($array_jadwal, $array_makul);
		array_push($array_populasi, $array_baru);
		echo "Individu - " . ($i+1) . "<hr>";
		debugJadwal($array_baru);

		//hitung bobot berdasarkan jml bentrok & jml makul salah tempat
		$array_weight[$i] = countAttributes($array_baru, $array_makul);
	}

//INISIALISASI SELESAI======================================================================================================

//PROGRAM UTAMA=============================================================================================================
	//CEK FITNESS===========================================================================================================

	//hitung fitness
	echo "<hr>";
	for($i = 0; $i < $populasi_awal; $i++){
		$array_fitness[$i] = countFitness($array_weight, $i);
	}

	//copy array populasi
	$copy_populasi = $array_populasi;
	$copy_weight = $array_weight;
	//rsort($copy_populasi);

	//sort populasi berdasarkan fitness
	array_multisort($copy_weight, SORT_DESC, $copy_populasi);
	echo "<hr>";

	//cek apakah hasil optimum telah ditemukan?
	//while(countBentrok($copy_populasi[0]) > 0 && countTdkBoleh($copy_populasi[0], $array_makul) > 0){
	while($iterasi < $max_iter){
		$iterasi++;

		//SELEKSI===========================================================================================================

		//ROULETTE WHEEL
		$array_temp = selection($array_populasi, $array_weight);

		//KAWIN SILANG======================================================================================================
		$array_temp = crossover($array_temp);

		//MUTASI============================================================================================================
		$array_temp = mutation($array_temp, $array_makul);

		//sort populasi berdasarkan fitness
		//array_multisort($array_fitness, SORT_DESC, $array_populasi, $array_weight);
		//echo "<hr>";

		array_push($array_populasi, $array_temp[0]);
		array_push($array_populasi, $array_temp[1]);
		$array_temp = array();
		$array_weight = array();

		//rekalkulasi fitness
		echo "Iterasi ke - " . $iterasi . "<hr>";
		for($i = 0; $i < sizeof($array_populasi); $i++){
			//echo "Individu - " . ($i+1) . "<hr>";
			//debugJadwal($array_populasi[$i]);

			//hitung bobot berdasarkan jml bentrok & jml makul salah tempat
			$array_weight[$i] = countAttributes($array_baru, $array_makul);
		}

		//copy array populasi
		$copy_populasi = $array_populasi;
		$copy_weight = $array_weight;
		array_multisort($copy_weight, SORT_DESC, $copy_populasi);

		for($i = 0; $i < sizeof($array_populasi); $i++){
			echo "Individu - " . ($i+1) . ", Weight = " . $copy_weight[$i] . "<hr>";
			debugJadwal($copy_populasi[$i]);
		}
		//debugJadwal($copy_populasi[0]);
	}

	//copy array populasi
	$copy_populasi = $array_populasi;
	rsort($copy_populasi);

	//if(countBentrok($copy_populasi[0]) == 0 && countTdkBoleh($copy_populasi[0], $array_makul) == 0){
	echo "Jadwal optimum telah ditemukan pada iterasi ke - " . $iterasi . ". <hr>";
	echo "Weight = " . $copy_weight[0] . "<br>";
	debugJadwal($copy_populasi[0]);
	echo "<hr>";		
	//}
	

//PROGRAM UTAMA SELESAI=====================================================================================================

//FUNGSI & PROSEDUR=========================================================================================================
	//Inisialisasi makul
	function init_makul(){
		$array_makul = array();

		$makul_a = new Makul("A", 2, 0);
		$makul_b = new Makul("B", 1, 3);
		$makul_c = new Makul("C", 1, 2);

		$array_makul = array(
			$makul_a, $makul_b, $makul_c
		);

		foreach ($array_makul as $makul) {
			echo 'Makul ' . $makul->nama . '<br>';
			echo "SKS = " . $makul->jml_sks . '<br>';
			echo "Posisi constraint " . ($makul->start_cstr+1) . '<br><br>';
		}
		return $array_makul;
	}
 	
 	//Inisialisasi jadwal
	function init_jadwal($array_makul){
		$array_jadwal = array();

		//push makul
		for($i = 0; $i < 3; $i ++){
			array_push($array_jadwal, array());
		}

		//pushjam
		for($i = 0; $i < 3; $i ++){
			for($j = 0; $j < 4; $j ++){
				array_push($array_jadwal[$i], array());
			}
		}

		//init bool
		for($i = 0; $i < 3; $i ++){
			for($j = 0; $j < 4; $j ++){
				$array_jadwal[$i][$j][0] = 0;
				$array_jadwal[$i][$j][1] = 0;
			}
		}

		//masukin constraint
		for($i = 0; $i < 3; $i ++){
			$cstr = $array_makul[$i]->start_cstr;
			$sks = $array_makul[$i]->jml_sks;
			for($j = $cstr; $j < ($cstr+$sks); $j++){
				$array_jadwal[$i][$j][0] = 1;
			}
		}

		return $array_jadwal;
	}

	//Nampilin jadwal
	function debugJadwal($array_jadwal){
		//debug
		for($i = 0; $i < 3; $i ++){
			for($j = 0; $j < 4; $j ++){
				echo $array_jadwal[$i][$j][0] . " ";
				echo $array_jadwal[$i][$j][1] . "<br>";
			}
			echo "<br>";
		}
	}

	//Generate populasi
	function generatePopulation($array_jadwal, $array_makul){
		//random jadwal sesuai sks
		for($i = 0; $i < 3; $i ++){
			$sks = $array_makul[$i]->jml_sks;
			$posisi = rand(0, (4 - $sks));
			for($j = $posisi; $j < ($posisi+$sks); $j++){
				$array_jadwal[$i][$j][1] = 1;
			}
		}

		return $array_jadwal;
	}

	//Hitung atribut w
	function countAttributes($array_jadwal, $array_makul){
		$jml_makul = 3;
		$jml_jam = 4;
		$bentrok = 0;
		$tidak_boleh = 0;
		$dah_tidak_boleh = FALSE;
		$sks = 0;
		$w = 0;

		//itung bentrok
		$bentrok = countBentrok($array_jadwal);

		//itung tidak boleh
		$tidak_boleh = countTdkBoleh($array_jadwal, $array_makul);

		//itung bobot
		$w = countWeight($jml_makul, $bentrok, $tidak_boleh);

		//echo "Bentrok = " . $bentrok . "<br>";
		//echo "Tidak Boleh = " . $tidak_boleh . "<br>";
		//echo "Weight = " . $w . "<br><br>";

		return $w;
	}

	//Hitung bentrok
	function countBentrok($array_jadwal){		
		$jml_makul = 3;
		$jml_jam = 4;
		$bentrok = 0;
		//itung bentrok & salah
		for($i = 0; $i < $jml_makul; $i++){
			//bentrok
			for($j = ($i+1); $j < $jml_makul; $j++){
				for($k = 0; $k < $jml_jam; $k++){
					if($array_jadwal[$i][$k][1] == 1 && $array_jadwal[$j][$k][1] == 1)
						$bentrok++;
				}
			}
		}
		return $bentrok;
	}

	//Hitung makul salah tempat
	function countTdkBoleh($array_jadwal, $array_makul){
		$jml_makul = 3;
		$jml_jam = 4;
		$sks = 0;
		$tidak_boleh = 0;
		$dah_tidak_boleh = FALSE;

		//itung bentrok & salah
		for($i = 0; $i < $jml_makul; $i++){
			//tidak boleh
			for($l = 0; $l < $jml_jam; $l++){
				if($array_jadwal[$i][$l][1] == 1){
					$sks++;
					if($sks >= $array_makul[$i]->jml_sks){
						$dah_tidak_boleh = FALSE;
						$sks = 0;
					}
					if($array_jadwal[$i][$l][0] == 0){
						if($dah_tidak_boleh == FALSE){
							$tidak_boleh++;
							$dah_tidak_boleh = TRUE;
						}
					}
				}
			}
		}

		return $tidak_boleh;
	}

	//Hitung bobot
	function countWeight($jml_makul, $jml_bentrok, $jml_tdk_blh){
		$max_tdk_bentrok = ($jml_makul * ($jml_makul - 1) / 2);
		$max_blh = $jml_makul;

		$w = ($max_tdk_bentrok - $jml_bentrok) + ($max_blh - $jml_tdk_blh);
		return $w; 
	}

	//Hitung fitness
	function countFitness($array_weight, $idx_individu){
		$total_weight = 0;
		$fitness = 0;

		$total_weight = countMaxWeight($array_weight);
			
		$fitness = $array_weight[$idx_individu] / $total_weight * 100;
		//echo "Weight = " . $array_weight[$idx_individu] . ", Fitness = " . $fitness . "%<br>" ;
		return $fitness;
	}

	//Hitung max weight
	function countMaxWeight($array_weight){
		$total_weight = 0;

		for($i = 0; $i < sizeof($array_weight); $i++){
			$total_weight += $array_weight[$i];
		}

		return $total_weight;
	}

	//Seleksi
	function selection($array_populasi, $array_weight){
		$array_temp = array();

		$max_weight = countMaxWeight($array_weight);

		$rand_a = rand(0, $max_weight);
		$rand_b = rand(0, $max_weight);

		//echo "Persen Random A = " . $rand_a . "<br>";
		//echo "Persen Random B = " . $rand_b . "<br>";

		$idx_a = roulette($array_weight, $rand_a);
		$idx_b = roulette($array_weight, $rand_b);

		//echo "Index Individu A = " . $idx_a . "<br>";
		//echo "Index Individu B = " . $idx_b . "<br>";

		while($idx_b == $idx_a){
			$rand_b = rand(0, 100);
			$idx_b = roulette($array_weight, $rand_b);
		}

		array_push($array_temp, $array_populasi[$idx_a]);
		array_push($array_temp, $array_populasi[$idx_b]);

		//for($i = 0; $i < sizeof($array_temp); $i++){
		//	debugJadwal($array_temp[$i]);
		//}

		return $array_temp;
	}

	function roulette($array_weight, $rand_val){
		//echo $rand_val;
		$w = 0;
		$idx = 0;
		for($i = 0; $i < sizeof($array_weight); $i++){
			$w += $array_weight[$i];
			if($rand_val > $w){
				$idx = $i+1;
				if($i == (sizeof($array_weight) - 1))
					$idx = $i;
			}
		}
		return $idx;
	}

	//Crossover
	function crossover($array_temp){
		$new_temp = array();
		$idv_a = $array_temp[0];
		$idv_b = $array_temp[1];

		$cp = 2;
		$buffer = $idv_a;

		for($i = 0; $i < sizeof($idv_a); $i++){
			if($i < 2){
				$idv_a[$i] = $idv_b[$i];
				$idv_b[$i] = $buffer[$i];
			}
		}

		$new_temp[0] = $idv_a;
		$new_temp[1] = $idv_b;

		//debugJadwal($new_temp[0]);
		//debugJadwal($new_temp[1]);

		return $new_temp;
	}

	//Mutation individu
	function mutation($array_temp, $array_makul){
		$new_temp = array();
		$idv_a = $array_temp[0];
		$idv_b = $array_temp[1];

		$ratio_a = rand(0, 100);
		$ratio_b = rand(0, 100);

		$idv_a = mutateChromosome($idv_a, $ratio_a, $array_makul);
		$idv_b = mutateChromosome($idv_b, $ratio_b, $array_makul);

		$new_temp[0] = $idv_a;
		$new_temp[1] = $idv_b;

		//debugJadwal($new_temp[0]);
		//debugJadwal($new_temp[1]);

		return $new_temp;		
	}

	//Mutation kromosom
	function mutateChromosome($idv, $ratio, $array_makul){
		$new_idv = $idv;
		//Mutation probability (berapa dari 100)
		$pm = 10;

		if($ratio > $pm){
			//tidak mutasi
			//echo "Tidak Mutasi<br>";
			return $idv;
		}
		else{
			//mutasi
			//echo "Mutasi<br>";
			$mp = rand(0,(sizeof($array_makul) - 1));

			$sks = $array_makul[$mp]->jml_sks;
			$posisi = rand(0, (4 - $sks));

			//reset jadwal
			for($j = 0; $j < 4; $j ++){
				$new_idv[$mp][$j][1] = 0;
			}

			//masukin nilai baru
			for($k = $posisi; $k < ($posisi+$sks); $k++){
				$new_idv[$mp][$k][1] = 1;
			}

			return $new_idv;
		}
	}

//FUNGSI SELESAI============================================================================================================
?>