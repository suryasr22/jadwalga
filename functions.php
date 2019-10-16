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
				<a class="nav-link" href="process/signout.php">Logout</a>
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
				<a class="nav-link" href="asbor_dosen.php">Mata Kuliah
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
		$jam = 13;
		$hari = 5;

		//batas bawah (timestamp > date)
		$bb_tms = strtotime($waktu_awal);
		$bb_dt = date('H:i', $bb_tms);

		//batas atas (timestamp > date)
		$ba_tms = strtotime("+45 minutes", strtotime($bb_dt));
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
				<tbody class="text-center">
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

		//ambil data dosen_jam
		$sql = "SELECT * FROM dosen_jam WHERE id_dosen = '$id_dosen'";
		$data_dosen_jam = $conn->query($sql);
		//echo $sql;

		//array buat nyimpen status dosen_jam
		$array_jam = array();
		//inisialisasi array (diisi FALSE dulu semua)
		for($i = 1; $i <= 65; $i++){
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
		    		<th><input class="form-check-input" type="checkbox" name="cb_j_' . 
		    		($i + ($j * $jam)) . '" value="option1" 
		    	';

		    	if($array_jam[$i + ($j * $jam)])
		    		echo 'checked';

		    	echo '
		    		></th>
		    	';
		    }

		    echo '
	          	</tr>
			';

			//Update batas bawah & atas
			$bb_tms = strtotime($ba_dt);

			//Skip jam isoma siang
			if($i === 6)
				$bb_tms = strtotime('13:00');

			$bb_dt = date('H:i', $bb_tms);

			$ba_tms = strtotime("+45 minutes", strtotime($bb_dt));
			$ba_dt = date('H:i', $ba_tms);
		}

		//print foot table
		echo '
				</tbody>
			</table>
		';
	}
?>