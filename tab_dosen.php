<table class="w-auto table table-dark  table-hover table-sm table-bordered">
	<table class="table table-striped table-advance table-hover table-condensed">
	<thead>
      <th>id</th>
      <th>Nama Dosen</th>
      <th>NIP</th>
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
                </td>
                <td align =\"right\">
                  <a href=\"edit_dosen.php?id=$dosen[id]\" class=\"btn btn-primary btn-xs\" role=\"button\"><i class=\"fa fa-pencil\"></i></a>

                	<a onclick =\"return confirm('Yakin Ingin menghapus data?')\" href=\"hapus_dosen.php?id_dosen=$dosen[id]\" class=\"btn btn-danger btn-xs\" role=\"button\"><i class=\"fa fa-trash-o\"></i></a>
                </td>
              </tr>
            ";
          }
          ?>
		</tbody>
	</table>
</table>