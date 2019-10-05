<table class="w-auto table table-dark  table-hover table-sm table-bordered">
  <table class="table table-striped table-advance table-hover table-condensed">
    <thead>
      <th>id</th>
      <th>Nama Mata Kuliah</th>
      <th>Semester</th>
      <th>Jumlah SKS</th>
    </thead>
    <tbody>
      <?php
        while($makul = $dataMakul->fetch_assoc()){
          echo "
            <tr>
              <td>
                $makul[id]
              </td>
              <td>
                $makul[nama]
              </td>
              <td>
                $makul[semester]
              </td>
              <td>
                $makul[sks]
              </td>
          ";

          // echo "
          //     <td align =\"right\">
          //     <a href=\"edit_dosen.php?id=$makul[id]\" class=\"btn btn-primary btn-xs\" role=\"button\"><i class=\"fa fa-pencil\"></i></a>

          //     <a onclick =\"return confirm('Yakin Ingin menghapus data?')\" href=\"hapus_dosen.php?id=$makul[id]\" class=\"btn btn-danger btn-xs\" role=\"button\"><i class=\"fa fa-trash-o\"></i></a>
          //     </td>
          //   </tr>
          // ";
        }
      ?>
    </tbody>
  </table>
</table>