<table class="w-auto table table-dark  table-hover table-sm table-bordered">
	<table class="table table-striped table-advance table-hover table-condensed">
	<thead>
      <th>id</th>
      <th>Nama Dosen</th>
      <th>NIP</th>
      <th></th>
    </thead>
		<tbody>
          <?php
          while($dosen = $dataDosen->fetch_assoc()){
            echo "
              <tr>
                <td>
                  $dosen[id]
                </td>
                <td>
                  $dosen[nama]
                </td>
                <td>
                  $dosen[nip]
                </td>
            ";

            echo "
                <td align =\"right\">
                  <a href=\"ajax/edit_dosen.php?id=$dosen[id]\" id=\"btn-edit-dosen\" class=\"btn btn-primary btn-sm\" role=\"button\"><i class=\"fa fa-pencil\" data-toggle=\"modal\" data-target=\"#myModal\"></i></a>

                	<a onclick =\"return confirm('Yakin Ingin menghapus data?')\" href=\"hapus_dosen.php?id_dosen=$dosen[id]\" class=\"btn btn-danger btn-sm\" role=\"button\"><i class=\"fa fa-trash-o\"></i></a>
                </td>
              </tr>
            ";
          }
          ?>
		</tbody>
	</table>
</table>