<?php
	//Libraries
	//Koneksi
	include("koneksi.php");

	//Fungsi2
	include("functions.php");

	//Session checker
	include("session_check.php");

	$conn->query("TRUNCATE TABLE jadwal");
	//INISILAISASI==================================================
	//1. Makul diload pertama, terus disimpen di array dimensi 2,
	//array_makul[jml_makul][0] = id makul
	//array_makul[jml_makul][1] = sks
	$array_makul = array();
	$result_makul = $conn->query("SELECT id, sks FROM matakuliah");
	while($makul = $result_makul->fetch_assoc()){
		$arrMakul = array();
		array_push($arrMakul, $makul['id']);
		array_push($arrMakul, $makul['sks']);
		array_push($array_makul, $arrMakul);
	}
	$len_makul = sizeof($array_makul);

	//debug makul
	// echo 'Makul<hr>';
	// for($i = 0; $i < $len_makul; $i++){
	// 	echo $i . ': ' . $array_makul[$i][0] . ', ' . $array_makul[$i][1] . '<br>';
	// }
	// echo '<br>';

	//2. Ruangan diload kedua, terus disimpen di array dimensi 2,
	//array_ruang[0] = id_ruangan
	$array_ruang = array();
	$result_ruang = $conn->query("SELECT id FROM ruangan");
	while($ruang = $result_ruang->fetch_assoc()){
		array_push($array_ruang, $ruang['id']);
	}
	$len_ruang = sizeof($array_ruang);

	//debug ruang
	// echo 'Ruangan<hr>';
	// for($i = 0; $i < $len_ruang; $i++){
	// 	echo $i . ': ' . $array_ruang[$i][0] . '<br>';
	// }
	// echo '<br>';

	//3. Inisialisasi array jadwal
	//array_jadwal[jml_makul][jml_ruang] = id_jam

	//push makul
	$array_jadwal = array();
	for($i = 0; $i < $len_makul; $i++){
		array_push($array_jadwal, array());
	}

	//push ruang
	// echo 'Jadwal<hr>';
	// for($i = 0; $i < $len_makul; $i++){
	// 	for($j = 0; $j < $len_ruang; $j++){
	// 		array_push($array_jadwal[$i], 0);
	// 	}
	// }

	// for($i = 0; $i < $len_makul; $i++){
	// 	for($j = 0; $j < $len_ruang; $j++){
	// 		echo $i . ': ' . $j . '> ' . $array_jadwal[$i][$j] . '<br>';
	// 	}
	// 	echo '<br>';
	// }
	
	//4. Load constraint
	//- Constraint jam -> makul -> dosen_makul -> dosen -> dosen_jam
	//- Constraint ruangan -> makul -> dosen_makul -> dosen -> dosen_ruang
	//array_jam[jml_makul][cnt_jam] = id_jam	
	//array_ruang[jml_makul][cnt_rng] = id_ruang

	//Constraint Jam
	$array_cstr_jam = array();	

	for($i = 0; $i < $len_makul; $i++){
		array_push($array_cstr_jam, array());
		$id_makul = $array_makul[$i][0];
		$result_dosen_jam = $conn->query("SELECT dosen_jam.id_jam FROM matakuliah, dosen_makul, dosen_jam WHERE matakuliah.id = dosen_makul.id_makul AND dosen_makul.id_dosen = dosen_jam.id_dosen AND matakuliah.id = $id_makul");
		//echo "SELECT matakuliah.id, dosen_jam.id_jam FROM matakuliah, dosen_makul, dosen_jam WHERE matakuliah.id = dosen_makul.id_makul AND dosen_makul.id_dosen = dosen_jam.id_dosen AND matakuliah.id = $id_makul<br>";
		while ($dosen_jam = $result_dosen_jam->fetch_assoc()) {
			array_push($array_cstr_jam[$i], $dosen_jam['id_jam']);
		}
	}

	// echo 'Constraint Jam<hr>';
	// for($i = 0; $i < $len_makul; $i++){
	// 	$len_dosen_jam = sizeof($array_cstr_jam[$i]);
	// 	for($j = 0; $j < $len_dosen_jam; $j ++){
	// 		echo $i . ': ' . $j . '> ' . $array_cstr_jam[$i][$j] . '<br>';
	// 	}
	// 	echo '<br>';
	// }

	//Constraint Ruangan
	$array_cstr_ruang = array();

	for($i = 0; $i < $len_makul; $i++){
		array_push($array_cstr_ruang, array());
		$id_makul = $array_makul[$i][0];
		$result_dosen_ruang = $conn->query("SELECT dosen_ruang.id_ruang FROM matakuliah, dosen_makul, dosen_ruang WHERE matakuliah.id = dosen_makul.id_makul AND dosen_makul.id_dosen = dosen_ruang.id_dosen AND matakuliah.id = $id_makul");
		//echo "SELECT dosen_ruang.id_ruang FROM matakuliah, dosen_makul, dosen_ruang WHERE matakuliah.id = dosen_makul.id_makul AND dosen_makul.id_dosen = dosen_ruang.id_dosen AND matakuliah.id = $id_makul<br>";
		while ($dosen_ruang = $result_dosen_ruang->fetch_assoc()) {
			array_push($array_cstr_ruang[$i], $dosen_ruang['id_ruang']);
		}
	}

	// echo 'Constraint Ruangan<hr>';
	// for($i = 0; $i < $len_makul; $i++){
	// 	$id_makul = $array_makul[$i][0];
	// 	echo 'Makul ' . $id_makul . '<br>';
	// 	$len_dosen_ruang = sizeof($array_cstr_ruang[$i]);
	// 	for($j = 0; $j < $len_dosen_ruang; $j ++){
	// 		echo $i . ': ' . $j . '> ' . $array_cstr_ruang[$i][$j] . '<br>';
	// 	}
	// 	echo '<br>';
	// }

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
	$max_w = 0;
	//iterator
	$iter = 0;

	$array_pop = generatePopulation($len_pop, $array_jadwal, $array_makul, $array_ruang);

	$array_w = countFitness($array_pop, $array_makul, $array_ruang, $array_cstr_ruang, $array_cstr_jam);

	// $len_w = sizeof($ranked_w);
	// for($i = 0; $i < $len_w; $i++){
	// 	echo $array_w[$i][0] . ' ' . $array_w[$i][1] . '<br> ';
	// 	echo $ranked_w[$i][0] . ' ' . $ranked_w[$i][1] . '<br> ';
	// }

	//echo 'Max_W : ' . max($array_w) . ' dari ' . ($len_makul*3) . '.<hr>';

	//pilih 2 individu melalui roulette
	while(!hasFoundOptimum($max_w, $iter, $len_makul) && !hasReachedMaxIter($iter, $max_generations)){

		$iter++;
		$newborn = array();
		$array_pool = array();		

		$ranked_w = $array_w;
		sort($ranked_w);

		$len_w = sizeof($ranked_w);
		// for($i = 0; $i < $len_w; $i++){
		// 	//echo $array_w[$i][0] . ' ' . $array_w[$i][1] . '<br> ';
		// 	echo $ranked_w[$i][0] . ' ' . $ranked_w[$i][1] . '<br> ';
		// }

		$bound = $len_w - $elite_size;
		for($i = $len_w-1; $i >= $bound; $i--){
			array_push($array_pool, $ranked_w[$i]);
		}
			
		// echo 'Sekarang individu terpilih:<br>';
		// for($i = 0; $i < $elite_size; $i++){
		// 	echo 'Individu ke - ' . ($array_pool[$i][1]+1) . ' dengan fitness = ' . $array_pool[$i][0] . '<br>';
		// }

		//roulette
		$idx = selection($ranked_w, $elite_size);
		array_push($array_pool, $ranked_w[$idx]);
		$len_pool = sizeof($array_pool);

		//echo 'Individu tambahan ' . $idx . ' dengan fitness = ' . $array_pool[$len_pool-1][0] . '<br><br>';

		//echo 'jml individu ' . sizeof($array_pop) . '<br><br>';

		if(rollCrossover($pc)){
			//echo 'Terjadi Crossover<hr><br>';
			$len_pool = sizeof($array_pool);
			//echo $len_pool;
			for($i = 0; $i < $len_pool-1; $i+=2){
				$idx_a = $array_pool[$i][1];
				$idx_b = $array_pool[$i+1][1];

				//echo $i . ' INDEX A : '. $idx_a . ' INDEX B : ' . $idx_b . '<br>';
				$newborn = crossover($newborn, $idx_a, $idx_b, $array_pop, $array_makul, $array_ruang);
			}

			$len_newborn = sizeof($newborn);

			//echo 'JML KETURUNAN ' . $len_newborn . '<br>';
			for($i = 0; $i < $len_newborn; $i++){
				if(rollMutation($pm)){
					//echo 'Terjadi Mutasi Pada Individu ke - ' . $i . '<hr><br>';
					$newborn[$i] = mutate($newborn[$i], $array_makul, $array_ruang);
				} else {
					//echo 'Tidak Terjadi Mutasi Pada Individu ke - ' . $i . '<hr><br>';
				}
			}

			$len_newborn = sizeof($newborn);

			//echo 'JML KETURUNAN ' . $len_newborn . '<br>';

			for($i = 0; $i < $len_newborn; $i++){
				$new_w = countFitnessIdv($newborn[$i], $array_makul, $array_ruang, $array_cstr_ruang, $array_cstr_jam);
				array_push($array_pop, $newborn[$i]);

				$len_pop = sizeof($array_pop);
				array_push($array_w, array($new_w, $len_pop-1));
				//echo 'Muncul Individu Baru dengan fitness = ' . $new_w . '<br>';
			}
		} else {
			//echo 'Tidak Terjadi Crossover<hr><br>';
		}
		//echo 'JML INDIVIDU ' . sizeof($array_pop) . '<br>';
		$len_w = sizeof($ranked_w);
		$max_w = $ranked_w[$len_w - 1][0];
	}
	$ranked_w = $array_w;
	sort($ranked_w);

	$len_w = sizeof($ranked_w);
	$max_w = $ranked_w[$len_w - 1][0];
	$idx_w = $ranked_w[$len_w - 1][1];

	$real_jadwal = $array_pop[$idx_w];

	extractJadwal($real_jadwal, $array_makul, $array_ruang);

	// for($i = 0; $i < $len_w; $i++){
	// 	//echo $array_w[$i][0] . ' ' . $array_w[$i][1] . '<br> ';
	// 	echo $ranked_w[$i][0] . ' ' . $ranked_w[$i][1] . '<br> ';
	// }

	// echo '<br>Total Seluruh Fitness  = ' . $len_w;
	// echo '<br>Fitness Tertinggi = ' . $max_w;
	// echo '<br>';

	//debugFitness($real_jadwal, $array_makul, $array_ruang, $array_cstr_ruang, $array_cstr_jam);

	//Functions====================================================================================================================================================
	function generatePopulation($len_pop, $array_jadwal, $array_makul, $array_ruang){
		//Generate populasi
		$array_pop = array();
		$len_makul = sizeof($array_makul);
		$len_ruang = sizeof($array_ruang);

		//echo 'Populasi<hr><br>';
		for($i = 0; $i < $len_pop; $i++){

			//echo 'Individu ke - ' . ($i+1) . '<hr>';
			array_push($array_pop, $array_jadwal);

			for($j = 0; $j < $len_makul; $j++){

				$idxRuang = rand(0, $len_ruang-1);
				//echo 'ID Makul : ' . $array_makul[$j][0] . ', SKS : ' . $array_makul[$j][1] . '<br>';

				$idxHari = rand(1, 5);
				$limBawahJam = (($idxHari - 1) * 13) + 1;
				//echo 'Batas Bawah Jam : ' . $limBawahJam . '<br>';

				$limAtasJam = ($idxHari * 13) - $array_makul[$j][1] + 1;
				//echo 'Batas Atas Jam : ' . $limAtasJam . '<br>';

				$idxJam = rand($limBawahJam, $limAtasJam);
				//echo 'Index Ruang : ' . $idxRuang . ', ID Jam : ' . $idxJam . '<br>';

				for($k = 0; $k < $len_ruang; $k++){
					if($k === $idxRuang)
						$array_pop[$i][$j][$k] = $idxJam;
					else
						$array_pop[$i][$j][$k] = 0;
					//echo $i . ': ' . $j . '> ' . $k . ' = ' . $array_pop[$i][$j][$k] . '<br>';
				}
				//echo '<br>';
			}
			//echo '<br>';
		}

		return $array_pop;
	}

	function countFitness($array_pop, $array_makul, $array_ruang, $array_cstr_ruang, $array_cstr_jam){
		$len_pop = sizeof($array_pop);
		$len_makul = sizeof($array_makul);
		$len_ruang = sizeof($array_ruang);
		$array_w = array();

		//Hitung fitness, berdasarkan:
		//1. jumlah matakuliah yang tidak bentrok
		//2. jumlah matakuliah yang benar tempat
		//Kategori salah penempatan
		//1. tidak sesuai dengan constraint ruang
		//2. tidak sesuai dengan constriant jam

		//Hitung bentrok		
		for($i = 0; $i < $len_pop; $i++){
			$bentrok = 0;
			$salah_ruang = 0;
			$salah_jam = 0;
			for($j = 0; $j < $len_makul; $j++){
				//Bentrok
				for($k = $j+1; $k < $len_makul; $k++){
					for($l = 0; $l < $len_ruang; $l++){
						$idv_a = $array_pop[$i][$j][$l] !== 0;
						$idv_b = $array_pop[$i][$k][$l] !== 0;
						if($idv_a && $idv_b){
							$id_a = $array_makul[$j][0];
							$sks_a = $array_makul[$j][1];
							$bb_a = $array_pop[$i][$j][$l];
							$ba_a = $bb_a + $sks_a;

							$id_b = $array_makul[$k][0];
							$sks_b = $array_makul[$k][1];
							$bb_b = $array_pop[$i][$k][$l];
							$ba_b = $bb_b + $sks_b;
							
							//echo 'Makul A>' . $id_a . ': Jam ' . $bb_a . ' ' . $sks_a . ' SKS & Makul B>' . $id_b . ': Jam ' . $bb_b . ' ' . $sks_b . ' SKS satu ruangan';

							$allowed = TRUE;
							for($m = $bb_a; $m < $ba_a; $m++){
								for($n = $bb_b; $n < $ba_b; $n++){
									if($m === $n){
										//echo ' (BENTROK pada jam ' . $m . ')';
										if($allowed){
											$bentrok++;
											$allowed = FALSE;
										}
									}
								}
							}
							//echo '.<br>';
						}
					}
				}
				//Salah
				$id = $array_makul[$j][0];
				for($k = 0; $k < $len_ruang; $k++){
					$idv = $array_pop[$i][$j][$k] !== 0;
					if($idv){
						$idxRuang = $k;
						$benerRuang = 0;

						$len_cstr_ruang = sizeof($array_cstr_ruang[$j]);
						for($l = 0; $l < $len_cstr_ruang; $l++){
							$idxCstR = $array_cstr_ruang[$j][$l];
							if($idxRuang == $idxCstR){
								$benerRuang++;
							}
						}
						if(!$benerRuang){
							//echo 'Makul>' . $id . ' SALAH RUANG dengan ruangan ' . $k . '<br>';
							$salah_ruang++;
						}

						$benerJam = 0;
						$jam = $array_pop[$i][$j][$k];
						$len_cstr_jam = sizeof($array_cstr_jam);
						for($m = 0; $m < $len_cstr_jam; $m++){
							$idxCstJ = $array_cstr_jam[$j][$m];
							//echo 'Makul>' . $id. ' Jam = ' . $jam . ' & Constraint ' . $idxCstJ . ' <br>';
							if($jam == $idxCstJ){
								$benerJam++;
							}
						}

						if($benerJam == 0){
							//echo 'Makul>' . $id. ' SALAH JAM dengan jam ' . $array_pop[$i][$j][$k] . '<br>';
							$salah_jam++;
						}
					}
				}
				//echo '<br>';
			}
			// echo '<hr>';
			// echo 'Bentrok: ' . $bentrok . ', Salah Ruangan: ' . $salah_ruang . ', Salah Jam: ' . $salah_jam . '<hr>';


			$max_tdk_bentrok = $len_makul;
			$max_blh_ruang = $len_makul;
			$max_blh_jam = $len_makul;

			$w = ($max_tdk_bentrok - $bentrok) + ($max_blh_ruang - $salah_ruang) + ($max_blh_jam - $salah_jam);

			//echo 'fitness = ' . $w . '<hr>';

			array_push($array_w, array($w, $i));
		}

		return $array_w;
		//Hitung salah tempat
		// $salah_ruang = 0;
		// $salah_jam = 0;
		// for($i = 0; $i < $len_pop; $i++){
		// 	for($j = 0; $j < $len_makul; $j++){
		// 		$id = $array_makul[$j][0];
		// 		for($k = 0; $k < $len_ruang; $k++){
		// 			$idv = $array_pop[$i][$j][$k] !== 0;
		// 			if($idv){
		// 				$idxRuang = $k;
		// 				$benerRuang = 0;

		// 				$len_cstr_ruang = sizeof($array_cstr_ruang[$j]);
		// 				for($l = 0; $l < $len_cstr_ruang; $l++){
		// 					$idxCstR = $array_cstr_ruang[$j][$l];
		// 					if($idxRuang == $idxCstR){
		// 						$benerRuang++;
		// 					}
		// 				}
		// 				if(!$benerRuang){
		// 					echo 'Makul>' . $id . ' SALAH RUANG dengan ruangan ' . $k . '<br>';
		// 					$salah_ruang++;
		// 				}

		// 				$benerJam = 0;
		// 				$jam = $array_pop[$i][$j][$k];
		// 				$len_cstr_jam = sizeof($array_cstr_jam);
		// 				for($m = 0; $m < $len_cstr_jam; $m++){
		// 					$idxCstJ = $array_cstr_jam[$j][$m];
		// 					//echo 'Makul>' . $id. ' Jam = ' . $jam . ' & Constraint ' . $idxCstJ . ' <br>';
		// 					if($jam == $idxCstJ){
		// 						$benerJam++;
		// 					}
		// 				}

		// 				if($benerJam == 0){
		// 					echo 'Makul>' . $id. ' SALAH JAM dengan jam ' . $array_pop[$i][$j][$k] . '<br>';
		// 					$salah_jam++;
		// 				}
		// 			}
		// 		}
		// 	}
		// }
	}

	function selection($array_fitness, $elite_size){
		$max_w = 0;
		$len_w = sizeof($array_fitness);
		for($i = 0; $i < $len_w - $elite_size; $i++){
			$max_w += $array_fitness[$i][0];
		}
		
		$rand_val = rand(0, $max_w);

		$w = 0;
		$idx = 0;

		for($i = 0; $i < $len_w - $elite_size; $i++){
			$w += $array_fitness[$i][0];
			if($rand_val > $w){
				$idx = $i+1;
				if($i == ($len_w - 1))
					$idx = $i;
			}
		}

		return $idx;
	}

	function rollCrossover($pc){
		$x = rand(0,100);

		if($x < $pc)
			return true;
		else
			return false;
	}

	function crossover($newborn, $idx1, $idx2, $array_pop, $array_makul, $array_ruang){
		$len_makul = sizeof($array_makul);
		$len_ruang = sizeof($array_ruang);

		$cut_point = rand(1, $len_makul-2);

		//simpen array individu 1 ke buffer
		$new_1 = $array_pop[$idx1];
		$new_2 = $array_pop[$idx2];

		//swap nilai
		for($i = 0; $i < $len_makul; $i++){
			for($j = 0; $j < $len_ruang; $j++){
				if($i < $cut_point){
					$new_1[$i][$j] = $new_2[$i][$j];
					$new_2[$i][$j] = $array_pop[$idx1][$i][$j];
				}
			}
		}

		array_push($newborn, $new_2);

		// echo 'Keturunan Baru<hr><br>';
		// for($i = 0; $i < 2; $i++){
		// 	echo 'Individu ke - ' . ($i+1) . '<hr>';
		// 	for($j = 0; $j < $len_makul; $j++){
		// 		echo 'ID Makul : ' . $array_makul[$j][0] . ', SKS : ' . $array_makul[$j][1] . '<br>';
		// 		for($k = 0; $k < $len_ruang; $k++){
		// 			echo $i . ': ' . $j . '> ' . $k . ' = ' . $newborn[$i][$j][$k] . '<br>';
		// 		}
		// 		echo '<br>';
		// 	}
		// 	echo '<br>';
		// }

		return $newborn;
	}

	function rollMutation($pm){
		$x = rand(0,100);

		if($x < $pm)
			return true;
		else
			return false;
	}

	function mutate($idv, $array_makul, $array_ruang){
		$len_makul = sizeof($array_makul);
		$len_ruang = sizeof($array_ruang);
		$mutation_point = rand(0, $len_makul-1);

		for($i = 0; $i < $len_makul; $i++){
			$idxRuang = rand(0, $len_ruang-1);
			$idxHari = rand(1, 5);
			$limBawahJam = (($idxHari - 1) * 13) + 1;
			$limAtasJam = ($idxHari * 13) - $array_makul[$i][1];
			$idxJam = rand($limBawahJam, $limAtasJam);

			if($i === $mutation_point){
				//echo 'Poin mutasi pada makul ' . $array_makul[$i][0] . '<br>';
				//kosongin value ruangan
				for($j = 0; $j < $len_ruang; $j++){
					if($j === $idxRuang)
						$idv[$i][$j] = $idxJam;
					else
						$idv[$i][$j] = 0;
				}
			}
		}

		for($i = 0; $i < $len_makul; $i++){
			//echo 'ID Makul : ' . $array_makul[$i][0] . ', SKS : ' . $array_makul[$i][1] . '<br>';
			for($j = 0; $j < $len_ruang; $j++){
				//echo $i . '> ' . $j . ' = ' . $idv[$i][$j] . '<br>';
			}
			//echo '<br>';
		}

		return $idv;
	}

	function countFitnessIdv($idv, $array_makul, $array_ruang, $array_cstr_ruang, $array_cstr_jam){
		$len_makul = sizeof($array_makul);
		$len_ruang = sizeof($array_ruang);

		$bentrok = 0;
		$salah_ruang = 0;
		$salah_jam = 0;

		for($j = 0; $j < $len_makul; $j++){
			//Bentrok
			for($k = $j+1; $k < $len_makul; $k++){
				for($l = 0; $l < $len_ruang; $l++){
					$idv_a = $idv[$j][$l] !== 0;
					$idv_b = $idv[$k][$l] !== 0;
					if($idv_a && $idv_b){
						$id_a = $array_makul[$j][0];
						$sks_a = $array_makul[$j][1];
						$bb_a = $idv[$j][$l];
						$ba_a = $bb_a + $sks_a;

						$id_b = $array_makul[$k][0];
						$sks_b = $array_makul[$k][1];
						$bb_b = $idv[$k][$l];
						$ba_b = $bb_b + $sks_b;
						
						//echo 'Makul A>' . $id_a . ': Jam ' . $bb_a . ' ' . $sks_a . ' SKS & Makul B>' . $id_b . ': Jam ' . $bb_b . ' ' . $sks_b . ' SKS satu ruangan';

						$allowed = TRUE;
						for($m = $bb_a; $m < $ba_a; $m++){
							for($n = $bb_b; $n < $ba_b; $n++){
								if($m === $n){
									//echo ' (BENTROK pada jam ' . $m . ')';
									if($allowed){
										$bentrok++;
										$allowed = FALSE;
									}
								}
							}
						}
						//echo '.<br>';
					}
				}
			}
			//Salah
			$id = $array_makul[$j][0];
			for($k = 0; $k < $len_ruang; $k++){
				$idv_s = $idv[$j][$k] !== 0;
				if($idv_s){
					$idxRuang = $k;
					$benerRuang = 0;

					$len_cstr_ruang = sizeof($array_cstr_ruang[$j]);
					for($l = 0; $l < $len_cstr_ruang; $l++){
						$idxCstR = $array_cstr_ruang[$j][$l];
						if($idxRuang == $idxCstR){
							$benerRuang++;
						}
					}
					if(!$benerRuang){
						//echo 'Makul>' . $id . ' SALAH RUANG dengan ruangan ' . $k . '<br>';
						$salah_ruang++;
					}

					$benerJam = 0;
					$jam = $idv[$j][$k];
					$len_cstr_jam = sizeof($array_cstr_jam);
					for($m = 0; $m < $len_cstr_jam; $m++){
						$idxCstJ = $array_cstr_jam[$j][$m];
						//echo 'Makul>' . $id. ' Jam = ' . $jam . ' & Constraint ' . $idxCstJ . ' <br>';
						if($jam == $idxCstJ){
							$benerJam++;
						}
					}

					if($benerJam == 0){
						//echo 'Makul>' . $id. ' SALAH JAM dengan jam ' . $array_pop[$i][$j][$k] . '<br>';
						$salah_jam++;
					}
				}
			}
			//echo '<br>';
		}
		// echo '<hr>';
		// echo 'Bentrok: ' . $bentrok . ', Salah Ruangan: ' . $salah_ruang . ', Salah Jam: ' . $salah_jam . '<hr>';

		$w = ($len_makul - $bentrok) + ($len_makul - $salah_ruang) + ($len_makul - $salah_jam);

		//echo 'fitness = ' . $w . '<hr>';

		return $w;
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
				for($l = 0; $l < $len_ruang; $l++){
					$idv_a = $idv[$j][$l] !== 0;
					$idv_b = $idv[$k][$l] !== 0;
					if($idv_a && $idv_b){
						$id_a = $array_makul[$j][0];
						$sks_a = $array_makul[$j][1];
						$bb_a = $idv[$j][$l];
						$ba_a = $bb_a + $sks_a;

						$id_b = $array_makul[$k][0];
						$sks_b = $array_makul[$k][1];
						$bb_b = $idv[$k][$l];
						$ba_b = $bb_b + $sks_b;
						
						//echo 'Makul A>' . $id_a . ': Jam ' . $bb_a . ' ' . $sks_a . ' SKS & Makul B>' . $id_b . ': Jam ' . $bb_b . ' ' . $sks_b . ' SKS satu ruangan';

						$allowed = TRUE;
						for($m = $bb_a; $m < $ba_a; $m++){
							for($n = $bb_b; $n < $ba_b; $n++){
								if($m === $n){
									//echo ' (BENTROK pada jam ' . $m . ')';
									if($allowed){
										$bentrok++;
										$allowed = FALSE;
									}
								}
							}
						}
						//echo '.<br>';
					}
				}
			}
			//Salah
			$id = $array_makul[$j][0];
			for($k = 0; $k < $len_ruang; $k++){
				$idv_s = $idv[$j][$k] !== 0;
				if($idv_s){
					$idxRuang = $k;
					$benerRuang = 0;

					$len_cstr_ruang = sizeof($array_cstr_ruang[$j]);
					for($l = 0; $l < $len_cstr_ruang; $l++){
						$idxCstR = $array_cstr_ruang[$j][$l];
						if($idxRuang == $idxCstR){
							$benerRuang++;
						}
					}
					if(!$benerRuang){
						//echo 'Makul>' . $id . ' SALAH RUANG dengan ruangan ' . $k . '<br>';
						$salah_ruang++;
					}

					$benerJam = 0;
					$jam = $idv[$j][$k];
					$len_cstr_jam = sizeof($array_cstr_jam);
					for($m = 0; $m < $len_cstr_jam; $m++){
						$idxCstJ = $array_cstr_jam[$j][$m];
						//echo 'Makul>' . $id. ' Jam = ' . $jam . ' & Constraint ' . $idxCstJ . ' <br>';
						if($jam == $idxCstJ){
							$benerJam++;
						}
					}

					if($benerJam == 0){
						//echo 'Makul>' . $id. ' SALAH JAM dengan jam ' . $idv[$j][$k] . '<br>';
						$salah_jam++;
					}
				}
			}
			//echo '<br>';
		}
		echo '<hr>';
		echo 'Bentrok: ' . $bentrok . ', Salah Ruangan: ' . $salah_ruang . ', Salah Jam: ' . $salah_jam . '<hr>';

		echo 'Fitness = ('.$len_makul.' - '.$bentrok.') + ('.$len_makul.' - '.$salah_ruang.') + ('.$len_makul .'-'. $salah_jam.') ';
		$w_makul = $len_makul - $bentrok;
		$w_ruang = $len_makul - $salah_ruang;
		$w_jam = $len_makul - $salah_jam;

		$w = $w_makul + $w_ruang + $w_jam;

		//echo 'fitness = ' . $w . '<hr>';

		//return $w;
	}

	function hasFoundOptimum($w, $iter, $len_makul){
		$optimum_w = $len_makul * 3;
		$optimum = $w === $optimum_w;

		if($optimum){
			//echo 'Optimum Ditemukan Pada Generasi ke - ' . $iter . '<br>';
			return TRUE;
		}
		else
			return FALSE;
	}

	function hasReachedMaxIter($iter, $max){
		if($iter >= $max){
			//echo 'Iterasi Selesai';
			return TRUE;
		}
		else
			return FALSE;
	}

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

		for($i = 0; $i < $len_makul; $i++){
			$id_makul = $array_makul[$i][0];
			for($j = 0; $j < $len_ruang; $j++){
				$id_ruang = $array_ruang[$j];

				$id_jam = $real_jadwal[$i][$j];
				$ruang_kosong = $id_jam === 0;

				if(!$ruang_kosong){
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
			}
		}
	}
?>