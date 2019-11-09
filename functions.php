<?php
	function GetData($conn, $sql){
	    $result = $conn -> query($sql);
	    //echo $result -> num_rows;
	    if($result -> num_rows > 0){
	      return $result -> fetch_assoc();
	    } else {
	      return false;
	    }
	}

	function SelectTarget($usrType){
		switch ($usrType) {
			default:
				//Admin
				return "dosen.php";
				break;
			case 2:
				//Perawat
				return "dasbor_dosen.php";
				break;
		}
	}

	function build_navbar($type, $selected){
		//navbar head
		$nav_head_1 = '
			<nav class="navbar navbar-expand-lg navbar-dark bg-dark fixed-top">
				<div class="container">
		';

		$nav_head_2 = '
					<button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarResponsive" aria-controls="navbarResponsive" aria-expanded="false" aria-label="Toggle navigation">
					<span class="navbar-toggler-icon"></span>
					</button>
					<div class="collapse navbar-collapse" id="navbarResponsive">
						<ul class="navbar-nav ml-auto">
		';

		//navbar foot
		$nav_foot = '
						</ul>
					</div>
				</div>
			</nav>
		';

		$nav_item_logout = '
			<li class="nav-item">
				<a class="nav-link" onclick ="return confirm(\'Yakin Ingin sign out?\')" href="process/signout.php">Logout</a>
			</li>
		';

		//NAVBAR CONTENTS

		//DOSEN
		$nav_dosen = array();
		array_push($nav_dosen, '
			<li class="nav-item">
				<a class="nav-link" href="dosen.php">Dosen</a>
			</li>
			');
		array_push($nav_dosen, '
			<li class="nav-item active">
				<a class="nav-link" href="dosen.php">Dosen
					<span class="sr-only">(current)</span>
				</a>
			</li>
			');

		//ADMIN
		$nav_admin = array();
		array_push($nav_admin, '
			<li class="nav-item">
				<a class="nav-link" href="admin.php">Admin</a>
			</li>
			');
		array_push($nav_admin, '
			<li class="nav-item active">
				<a class="nav-link" href="admin.php">Admin
					<span class="sr-only">(current)</span>
				</a>
			</li>
			');

		//MAKUL SUPER ADMIN & ADMIN
		$nav_makul_a = array();
		array_push($nav_makul_a, '
			<li class="nav-item">
				<a class="nav-link" href="makul.php">Mata Kuliah</a>
			</li>
			');
		array_push($nav_makul_a, '
			<li class="nav-item active">
				<a class="nav-link" href="makul.php">Mata Kuliah
					<span class="sr-only">(current)</span>
				</a>
			</li>
			');

		//MAKUL DOSEN
		$nav_makul_d = array();
		array_push($nav_makul_d, '
			<li class="nav-item">
				<a class="nav-link" href="dasbor_dosen.php">Mata Kuliah</a>
			</li>
			');
		array_push($nav_makul_d, '
			<li class="nav-item active">
				<a class="nav-link" href="dasbor_dosen.php">Mata Kuliah
					<span class="sr-only">(current)</span>
				</a>
			</li>
			');

		//RUANGAN
		$nav_ruangan = array();
		array_push($nav_ruangan, '
			<li class="nav-item">
				<a class="nav-link" href="ruangan.php">Ruangan</a>
			</li>
			');
		array_push($nav_ruangan, '
			<li class="nav-item active">
				<a class="nav-link" href="ruangan.php">Ruangan
					<span class="sr-only">(current)</span>
				</a>
			</li>
			');

		//JADWAL
		$nav_jadwal = array();
		array_push($nav_jadwal, '
			<li class="nav-item">
				<a class="nav-link" href="jadwal.php">Jadwal</a>
			</li>
			');
		array_push($nav_jadwal, '
			<li class="nav-item active">
				<a class="nav-link" href="jadwal.php">Jadwal
					<span class="sr-only">(current)</span>
				</a>
			</li>
			');

		//PROFIL
		$nav_profil = array();
		array_push($nav_profil, '
			<li class="nav-item">
				<a class="nav-link" href="profile.php">Profil</a>
			</li>
			');
		array_push($nav_profil, '
			<li class="nav-item active">
				<a class="nav-link" href="profile.php">Profil
					<span class="sr-only">(current)</span>
				</a>
			</li>
			');

		$navbar = $nav_head_1;
		switch($type){
			//Super admin
			case 'super_admin':
				$navbar = $navbar . '<a class="navbar-brand" href="dosen.php">Dashboard Master Admin</a>';
				$navbar = $navbar . $nav_head_2;

				if($selected === 'dosen')
					$navbar = $navbar . $nav_dosen[1];
				else
					$navbar = $navbar . $nav_dosen[0];

				if($selected === 'admin')
					$navbar = $navbar . $nav_admin[1];
				else
					$navbar = $navbar . $nav_admin[0];

				if($selected === 'makul')
					$navbar = $navbar . $nav_makul_a[1];
				else 
					$navbar = $navbar . $nav_makul_a[0];

				if($selected === 'ruangan')
					$navbar = $navbar . $nav_ruangan[1];
				else
					$navbar = $navbar . $nav_ruangan[0];

				if($selected === 'jadwal')
					$navbar = $navbar . $nav_jadwal[1];
				else
					$navbar = $navbar . $nav_jadwal[0];
				
				if($selected === 'profil')
					$navbar = $navbar . $nav_profil[1];
				else
					$navbar = $navbar . $nav_profil[0];
			break;

			case 'admin':
				$navbar = $navbar . '<a class="navbar-brand" href="dosen.php">Dashboard Admin</a>';
				$navbar = $navbar . $nav_head_2;

				if($selected === 'dosen')
					$navbar = $navbar . $nav_dosen[1];
				else
					$navbar = $navbar . $nav_dosen[0];

				if($selected === 'makul')
					$navbar = $navbar . $nav_makul_a[1];
				else 
					$navbar = $navbar . $nav_makul_a[0];

				if($selected === 'ruangan')
					$navbar = $navbar . $nav_ruangan[1];
				else
					$navbar = $navbar . $nav_ruangan[0];

				if($selected === 'jadwal')
					$navbar = $navbar . $nav_jadwal[1];
				else
					$navbar = $navbar . $nav_jadwal[0];

				if($selected === 'profil')
					$navbar = $navbar . $nav_profil[1];
				else
					$navbar = $navbar . $nav_profil[0];
			break;

			case 'dosen':
				$navbar = $navbar . '<a class="navbar-brand" href="dasbor_dosen.php">Dashboard Dosen</a>';
				$navbar = $navbar . $nav_head_2;

				if($selected === 'makul')
					$navbar = $navbar . $nav_makul_d[1];
				else 
					$navbar = $navbar . $nav_makul_d[0];

				if($selected === 'profil')
					$navbar = $navbar . $nav_profil[1];
				else
					$navbar = $navbar . $nav_profil[0];
			break;
		}
		$navbar = $navbar . $nav_item_logout . $nav_foot;

		//debug
		echo $navbar;
	}

	function print_title($tgt){
		switch ($tgt) {
			case 0:
				//Master Admin
				echo "<title>Dashboard Master Admin</title>";
				break;
			case 1:
				//Admin
				echo "<title>Dashboard Admin</title>";
				break;
			case 2:
				//Dosen
				echo "<title>Dashboard Dosen</title>";
				break;
		}
	}

	function build_konten_jadwal($conn, $id_dosen){
		//vars
		$waktu_awal = '08:00';
		$jam = 11;
		$hari = 5;

		//batas bawah (timestamp > date)
		$bb_tms = strtotime($waktu_awal);
		$bb_dt = date('H:i', $bb_tms);

		//batas atas (timestamp > date)
		$ba_tms = strtotime("+50 minutes", strtotime($bb_dt));
		$ba_dt = date('H:i', $ba_tms);

		//print head table
		echo '
			<table class="w-auto table table-dark table-hover table-sm table-bordered">
				<table class="table table-striped table-advance table-hover table-condensed">
				<thead>
			      	<tr scope="row">
		                <th scope="col"></th>
		                <th scope="col"></th>
		                <th scope="col" colspan="6" class="text-center">Hari</th>
	              	</tr>
			    </thead>
				<tbody class="text-center">
			        <tr>
		                <th>No</th>
		                <th>Jam</th>
		                <th>Senin</th>
		                <th>Selasa</th>
		                <th>Rabu</th>
		                <th>Kamis</th>
		                <th>Jum\'at</th>
		                <th><></th>
	          		</tr>
		';

		//ambil data dosen_jam
		$sql = "SELECT * FROM dosen_jam WHERE id_dosen = '$id_dosen'";
		$data_dosen_jam = $conn->query($sql);
		//echo $sql;

		//array buat nyimpen status dosen_jam
		$array_jam = array();
		//inisialisasi array (diisi FALSE dulu semua)
		for($i = 1; $i <= 55; $i++){
			$array_jam[$i] = 0;
		}

		//masukin data ke array
		while($dosen_jam = $data_dosen_jam->fetch_assoc()){
			$id_jam = $dosen_jam['id_jam'];
			$array_jam[$id_jam] = 1;
		}

		//print jam
		for($i = 1; $i <= $jam; $i++){
			echo '
				<tr>
		            <th>' . $i . '</th>
		            <td>' . $bb_dt . ' - ' . $ba_dt . '</td>
		    ';

		    //print ceklis per hari
		    for($j = 0; $j < $hari; $j++){
		    	echo '
		    		<td><input class="form-check-input" type="checkbox"
		    		id="cb_j_' . ($i + ($j * $jam)) . '" 
		    		name="cb_j_' . ($i + ($j * $jam)) . '" 
		    		value="option1" 
		    	';

		    	if($array_jam[$i + ($j * $jam)])
		    		echo 'checked';

		    	echo '
		    		></td>
		    	';
		    }

		    if($i == 1){
		    	echo '
			    	<td rowspan="5">Pagi<br><input class="form-check-input" type="checkbox" id="cb_pagi"></td>
				';
			}

			if($i == 6){
		    	echo '
			    	<td rowspan="6">Siang<br><input class="form-check-input" type="checkbox" id="cb_siang"></td>
				';
			}

		    echo '
	          	</tr>
			';

			//Update batas bawah & atas
			$bb_tms = strtotime($ba_dt);

			//Skip jam isoma siang
			if($i === 5)
				$bb_tms = strtotime('13:00');

			$bb_dt = date('H:i', $bb_tms);

			$ba_tms = strtotime("+50 minutes", strtotime($bb_dt));
			$ba_dt = date('H:i', $ba_tms);
		}

		//print foot table
		echo '
				</tbody>
			</table>
		';
	}

	function build_jadwal_ga($conn){
		//vars
		$waktu_awal = '08:00';
		$jam = 11;
		$hari = 5;

		//batas bawah (timestamp > date)
		$bb_tms = strtotime($waktu_awal);
		$bb_dt = date('H:i', $bb_tms);

		//batas atas (timestamp > date)
		$ba_tms = strtotime("+50 minutes", strtotime($bb_dt));
		$ba_dt = date('H:i', $ba_tms);

		//print head table
		echo '
			<table class="w-auto table table-dark table-hover table-sm table-bordered">
				<table class="table table-striped table-advance table-hover table-condensed">
				<thead>
			      	<tr scope="row">
		                <th scope="col"></th>
		                <th scope="col"></th>
		                <th scope="col" colspan="5" class="text-center">Hari</th>
	              	</tr>
			    </thead>
				<tbody>
			        <tr>
	                <th>No</th>
	                <th>Jam</th>
	                <th>Senin</th>
	                <th>Selasa</th>
	                <th>Rabu</th>
	                <th>Kamis</th>
	                <th>Jum\'at</th>
	          	</tr>
		';
		//array buat nyimpen data makul
		//$array_makul[total_makul][0] = id_makul
		//$array_makul[total_makul][1] = nama_makul
		//$array_makul[total_makul][2] = sks

		$sql = "SELECT * FROM matakuliah";
		$data_makul = $conn->query($sql);

		$array_makul = array();

		while($makul = $data_makul->fetch_assoc()){
			$id_makul = $makul['id'];
			$nama_makul = $makul['nama'];
			$sks = $makul['sks'];

			array_push($array_makul, array($id_makul, $nama_makul, $sks));
		}

		$len_makul = sizeof($array_makul);

		//array buat nyimpen data ruang
		//$array_ruang[total_ruang][0] = id_ruang
		//$array_ruang[total_ruang][1] = nama_ruang

		$sql1 = "SELECT * FROM ruangan";
		$data_ruang = $conn->query($sql1);

		$array_ruang = array();

		while($ruang = $data_ruang->fetch_assoc()){
			$id_ruang = $ruang['id'];
			$nama_ruang = $ruang['nama'];

			array_push($array_ruang, array($id_ruang, $nama_ruang));
		}

		$len_ruang = sizeof($array_ruang);

		//array buat nyimpen data jadwal
		//$array_jadwal[jml_makul][0] = id_makul
		//$array_jadwal[jml_makul][1] = id_ruang
		//$array_jadwal[jml_makul][2] = batas bawah jam
		//$array_jadwal[jml_makul][3] = batas atas jam

		//ambil data jadwal
		$sql2 = "SELECT * FROM jadwal";
		$data_jadwal = $conn->query($sql2);
		//echo $sql;

		$array_jadwal = array();

		//masukin data ke array
		while($jadwal = $data_jadwal->fetch_assoc()){
			$id_makul = $jadwal['id_makul'];
			$id_ruang = $jadwal['id_ruang'];
			$id_jam = $jadwal['id_jam'];

			for($i = 0; $i < $len_makul; $i++){
				if($array_makul[$i][0] === $id_makul)
					$sks = $array_makul[$i][2];
			}

			$ba = $id_jam + $sks - 1;

			array_push($array_jadwal, array($id_makul, $id_ruang, $id_jam, $ba));
		}

		//array jam
		$array_jam = array();
		//inisialisasi array (diisi FALSE dulu semua)
		for($i = 1; $i <= 65; $i++){
			$array_jam[$i] = 0;
		}

		$len_jadwal = sizeof($array_jadwal);
		//print isi table
		//print jam
		for($i = 1; $i <= $jam; $i++){
			echo '
				<tr>
		            <th>' . $i . '</th>
		            <td>' . $bb_dt . ' - ' . $ba_dt . '</td>
		    ';

		    //print ceklis per hari
		    for($j = 0; $j < $hari; $j++){
		    	$id_jam = $i + ($j * $jam);

		    	echo '
		    		<th>
		    	';

		    	if($len_jadwal > 0){
		    		for($k  = 0; $k < $len_makul; $k++){
			    		//echo $array_jadwal[$k][2] . ', ' . $array_jadwal[$k][3] . '<br>';
			    		if($id_jam >= $array_jadwal[$k][2] && $id_jam <= $array_jadwal[$k][3]){

			    			$nama_makul = $array_makul[$k][1];

			    			for($l = 0; $l < $len_ruang; $l++){
			    				//echo $array_jadwal[$k][1] . ' vs ' . $array_ruang[$l][0] . '<br>';
			    				if($array_jadwal[$k][1] === $array_ruang[$l][0])
			    					$nama_ruang = $array_ruang[$l][1];
			    			}

			    			$pos = strpos($nama_makul, '-');
			    			if($pos){
			    				$len = strlen($nama_makul);
				    			$nama = substr($nama_makul, 0, $pos);
				    			$kelas = substr($nama_makul, $pos + 2, $len);
				    			echo $nama . '<br>' . $kelas . '<br>' . $nama_ruang . '<hr>';
			    			} else {
			    				echo $nama_makul . '<br>' . $nama_ruang . '<hr>';
			    			}
			    			
			    			//echo $array_jadwal[$k][0] . ', ' . $array_jadwal[$k][1] . ', ' . $array_jadwal[$k][2] . ', ' . $array_jadwal[$k][3] . '<hr>';
			    		}
			    	}
		    	}

		    	echo '
		    		</th>
		    	';
		    }

		    echo '
	          	</tr>
			';

			//Update batas bawah & atas
			$bb_tms = strtotime($ba_dt);

			//Skip jam isoma siang
			if($i === 5)
				$bb_tms = strtotime('13:00');

			$bb_dt = date('H:i', $bb_tms);

			$ba_tms = strtotime("+50 minutes", strtotime($bb_dt));
			$ba_dt = date('H:i', $ba_tms);
		}

		//print foot table
		echo '
				</tbody>
			</table>
		';
	}

	function build_jadwal_ruang($conn){
		//array buat nyimpen data makul
		//$array_makul[total_makul][0] = id_makul
		//$array_makul[total_makul][1] = nama_makul
		//$array_makul[total_makul][2] = sks

		$sql = "SELECT * FROM matakuliah";
		$data_makul = $conn->query($sql);

		$array_makul = array();

		while($makul = $data_makul->fetch_assoc()){
			$id_makul = $makul['id'];
			$nama_makul = $makul['nama'];
			$sks = $makul['sks'];

			array_push($array_makul, array($id_makul, $nama_makul, $sks));
		}

		$len_makul = sizeof($array_makul);

		//array buat nyimpen data ruang
		//$array_ruang[total_ruang][0] = id_ruang
		//$array_ruang[total_ruang][1] = nama_ruang

		$sql1 = "SELECT * FROM ruangan";
		$data_ruang = $conn->query($sql1);

		$array_ruang = array();

		while($ruang = $data_ruang->fetch_assoc()){
			$id_ruang = $ruang['id'];
			$nama_ruang = $ruang['nama'];

			array_push($array_ruang, array($id_ruang, $nama_ruang));
		}

		$len_ruang = sizeof($array_ruang);

		//array buat nyimpen data jadwal
		//$array_jadwal[jml_makul][0] = id_makul
		//$array_jadwal[jml_makul][1] = id_ruang
		//$array_jadwal[jml_makul][2] = batas bawah jam
		//$array_jadwal[jml_makul][3] = batas atas jam

		//ambil data jadwal
		$sql2 = "SELECT * FROM jadwal";
		$data_jadwal = $conn->query($sql2);
		//echo $sql;

		$array_jadwal = array();

		//masukin data ke array
		while($jadwal = $data_jadwal->fetch_assoc()){
			$id_makul = $jadwal['id_makul'];
			$id_ruang = $jadwal['id_ruang'];
			$id_jam = $jadwal['id_jam'];

			for($i = 0; $i < $len_makul; $i++){
				if($array_makul[$i][0] === $id_makul)
					$sks = $array_makul[$i][2];
			}

			$ba = $id_jam + $sks - 1;

			array_push($array_jadwal, array($id_makul, $id_ruang, $id_jam, $ba));
		}

		//array jam
		$array_jam = array();
		//inisialisasi array (diisi FALSE dulu semua)
		for($i = 1; $i <= 65; $i++){
			$array_jam[$i] = 0;
		}

		$len_jadwal = sizeof($array_jadwal);

		//print isi table
		//print per ruangan
		for($i = 0; $i < $len_ruang; $i++){
			//vars
			$waktu_awal = '08:00';
			$jam = 11;
			$hari = 5;

			//batas bawah (timestamp > date)
			$bb_tms = strtotime($waktu_awal);
			$bb_dt = date('H:i', $bb_tms);

			//batas atas (timestamp > date)
			$ba_tms = strtotime("+50 minutes", strtotime($bb_dt));
			$ba_dt = date('H:i', $ba_tms);

			$nama_ruang = $array_ruang[$i][1];
			echo '<center><h4>Ruangan ' . $nama_ruang . '</h4></center><hr>';
			//print head table
			echo '
				<table class="w-auto table table-dark table-hover table-sm table-bordered">
					<table class="table table-striped table-advance table-hover table-condensed">
					<thead>
				      	<tr scope="row">
			                <th scope="col"></th>
			                <th scope="col"></th>
			                <th scope="col" colspan="5" class="text-center">Hari</th>
		              	</tr>
				    </thead>
					<tbody>
				        <tr>
		                <th>No</th>
		                <th>Jam</th>
		                <th>Senin</th>
		                <th>Selasa</th>
		                <th>Rabu</th>
		                <th>Kamis</th>
		                <th>Jum\'at</th>
		          	</tr>
			';

			for($j = 1; $j <= $jam; $j++){
				echo '
					<tr>
			            <th>' . $j . '</th>
			            <td>' . $bb_dt . ' - ' . $ba_dt . '</td>
			    ';

			    //print ceklis per hari
			    for($k = 0; $k < $hari; $k++){
			    	$id_jam = $j + ($k * $jam);

			    	echo '
			    		<th>
			    	';

			    	if($len_jadwal > 0){
			    		for($l  = 0; $l < $len_makul; $l++){
				    		//echo $array_jadwal[$k][2] . ', ' . $array_jadwal[$k][3] . '<br>';
				    		if($id_jam >= $array_jadwal[$l][2] && $id_jam <= $array_jadwal[$l][3] && $array_jadwal[$l][1] === $array_ruang[$i][0]){

				    			$nama_makul = $array_makul[$l][1];
			    				//echo $array_jadwal[$k][1] . ' vs ' . $array_ruang[$l][0] . '<br>';

				    			$pos = strpos($nama_makul, '-');
				    			if($pos){
				    				$len = strlen($nama_makul);
					    			$nama = substr($nama_makul, 0, $pos);
					    			$kelas = substr($nama_makul, $pos + 2, $len);
					    			echo $nama . '<br>' . $kelas . '<br>' . $nama_ruang . '<hr>';
				    			} else {
				    				echo $nama_makul . '<br>' . $nama_ruang . '<hr>';
				    			}
				    			
				    			//echo $array_jadwal[$k][0] . ', ' . $array_jadwal[$k][1] . ', ' . $array_jadwal[$k][2] . ', ' . $array_jadwal[$k][3] . '<hr>';
				    		}
				    	}
			    	}

			    	echo '
			    		</th>
			    	';
			    }

			    echo '
		          	</tr>
				';

				//Update batas bawah & atas
				$bb_tms = strtotime($ba_dt);

				//Skip jam isoma siang
				if($j === 5)
					$bb_tms = strtotime('13:00');

				$bb_dt = date('H:i', $bb_tms);

				$ba_tms = strtotime("+50 minutes", strtotime($bb_dt));
				$ba_dt = date('H:i', $ba_tms);
			}

			//print foot table
			echo '
					</tbody>
				</table>
			';

			echo '<hr>';
		}
	}

	function build_jadwal_semester($conn){
		//array buat nyimpen data makul
		//$array_makul[total_makul][0] = id_makul
		//$array_makul[total_makul][1] = nama_makul
		//$array_makul[total_makul][2] = sks

		$sql = "SELECT * FROM matakuliah";
		$data_makul = $conn->query($sql);

		$array_makul = array();

		while($makul = $data_makul->fetch_assoc()){
			$id_makul = $makul['id'];
			$nama_makul = $makul['nama'];
			$sks = $makul['sks'];
			$semester = $makul['semester'];

			array_push($array_makul, array($id_makul, $nama_makul, $sks, $semester));
		}

		$len_makul = sizeof($array_makul);
		$len_smstr = 8;

		//array buat nyimpen data ruang
		//$array_ruang[total_ruang][0] = id_ruang
		//$array_ruang[total_ruang][1] = nama_ruang

		$sql1 = "SELECT * FROM ruangan";
		$data_ruang = $conn->query($sql1);

		$array_ruang = array();

		while($ruang = $data_ruang->fetch_assoc()){
			$id_ruang = $ruang['id'];
			$nama_ruang = $ruang['nama'];

			array_push($array_ruang, array($id_ruang, $nama_ruang));
		}

		$len_ruang = sizeof($array_ruang);

		//array buat nyimpen data jadwal
		//$array_jadwal[jml_makul][0] = id_makul
		//$array_jadwal[jml_makul][1] = id_ruang
		//$array_jadwal[jml_makul][2] = batas bawah jam
		//$array_jadwal[jml_makul][3] = batas atas jam

		//ambil data jadwal
		$sql2 = "SELECT * FROM jadwal";
		$data_jadwal = $conn->query($sql2);
		//echo $sql;

		$array_jadwal = array();

		//masukin data ke array
		while($jadwal = $data_jadwal->fetch_assoc()){
			$id_makul = $jadwal['id_makul'];
			$id_ruang = $jadwal['id_ruang'];
			$id_jam = $jadwal['id_jam'];

			for($i = 0; $i < $len_makul; $i++){
				if($array_makul[$i][0] === $id_makul)
					$sks = $array_makul[$i][2];
			}

			$ba = $id_jam + $sks - 1;

			array_push($array_jadwal, array($id_makul, $id_ruang, $id_jam, $ba));
		}

		//array jam
		$array_jam = array();
		//inisialisasi array (diisi FALSE dulu semua)
		for($i = 1; $i <= 65; $i++){
			$array_jam[$i] = 0;
		}

		$len_jadwal = sizeof($array_jadwal);

		//print isi table
		//print per ruangan
		for($i = 1; $i <= $len_smstr; $i++){
			//vars
			$waktu_awal = '08:00';
			$jam = 11;
			$hari = 5;

			//batas bawah (timestamp > date)
			$bb_tms = strtotime($waktu_awal);
			$bb_dt = date('H:i', $bb_tms);

			//batas atas (timestamp > date)
			$ba_tms = strtotime("+50 minutes", strtotime($bb_dt));
			$ba_dt = date('H:i', $ba_tms);
		
			echo '<center><h4>Semester ' . $i . '</h4></center><hr>';
			//print head table
			echo '
				<table class="w-auto table table-dark table-hover table-sm table-bordered">
					<table class="table table-striped table-advance table-hover table-condensed">
					<thead>
				      	<tr scope="row">
			                <th scope="col"></th>
			                <th scope="col"></th>
			                <th scope="col" colspan="5" class="text-center">Hari</th>
		              	</tr>
				    </thead>
					<tbody>
				        <tr>
		                <th>No</th>
		                <th>Jam</th>
		                <th>Senin</th>
		                <th>Selasa</th>
		                <th>Rabu</th>
		                <th>Kamis</th>
		                <th>Jum\'at</th>
		          	</tr>
			';

			for($j = 1; $j <= $jam; $j++){
				echo '
					<tr>
			            <th>' . $j . '</th>
			            <td>' . $bb_dt . ' - ' . $ba_dt . '</td>
			    ';

			    //print ceklis per hari
			    for($k = 0; $k < $hari; $k++){
			    	$id_jam = $j + ($k * $jam);

			    	echo '
			    		<th>
			    	';

			    	if($len_jadwal > 0){
			    		for($l  = 0; $l < $len_makul; $l++){
				    		$bener = 0;
							//echo $array_jadwal[$k][2] . ', ' . $array_jadwal[$k][3] . '<br>';
				    		if($id_jam >= $array_jadwal[$l][2] && $id_jam <= $array_jadwal[$l][3] && $array_makul[$l][3] == $i){

				    			$nama_makul = $array_makul[$l][1];
			    				//echo $array_jadwal[$k][1] . ' vs ' . $array_ruang[$l][0] . '<br>';
			    				for($m = 0; $m < $len_ruang; $m++){
				    				//echo $array_jadwal[$k][1] . ' vs ' . $array_ruang[$l][0] . '<br>';
				    				if($array_jadwal[$l][1] === $array_ruang[$m][0])
				    					$nama_ruang = $array_ruang[$m][1];
				    			}

				    			$pos = strpos($nama_makul, '-');
				    			if($pos){
				    				$len = strlen($nama_makul);
					    			$nama = substr($nama_makul, 0, $pos);
					    			$kelas = substr($nama_makul, $pos + 2, $len);
					    			echo $nama . '<br>' . $kelas . '<br>' . $nama_ruang . '<hr>';
				    			} else {
				    				echo $nama_makul . '<br>' . $nama_ruang . '<hr>';
				    			}
				    			
				    			//echo $array_jadwal[$k][0] . ', ' . $array_jadwal[$k][1] . ', ' . $array_jadwal[$k][2] . ', ' . $array_jadwal[$k][3] . '<hr>';
				    		}
				    	}
			    	}
			    	
			    	echo '
			    		</th>
			    	';
			    }

			    echo '
		          	</tr>
				';

				//Update batas bawah & atas
				$bb_tms = strtotime($ba_dt);

				//Skip jam isoma siang
				if($j === 5)
					$bb_tms = strtotime('13:00');

				$bb_dt = date('H:i', $bb_tms);

				$ba_tms = strtotime("+50 minutes", strtotime($bb_dt));
				$ba_dt = date('H:i', $ba_tms);
			}

			//print foot table
			echo '
					</tbody>
				</table>
			';

			echo '<hr>';
		}
	}
?>