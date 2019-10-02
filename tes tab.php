<!DOCTYPE html>
<head>
  <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.0/css/bootstrap.min.css">
  <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.4.1/jquery.min.js"></script>
  <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.0/js/bootstrap.min.js"></script>
</head>
<body>
  <button type="button" class="btn btn-primary" data-toggle="modal" data-target="inputmakul">
              Input Makul
            </button>
            <!-- Modal -->
            <div class="modal fade" id="inputmakul" tabindex="-1" role="dialog" aria-labelledby="exampleModalScrollableTitle" aria-hidden="true">
              <div class="modal-dialog modal-dialog-scrollable" role="document">
                <div class="modal-content">
                  <div class="modal-header">
                    <h5 class="modal-title" id="exampleModalScrollableTitle">Modal title</h5>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                      <span aria-hidden="true">&times;</span>
                    </button>
                  </div>
                  <div class="modal-body">
                    ...
                  </div>
                  <div class="modal-footer">
                    <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                    <button type="button" class="btn btn-primary">Save changes</button>
                  </div>
                </div>
              </div>
            </div>
              </div>
                </div>
                  </div>
                </div>
              </div>

                <table class="table table-striped table-advance table-hover table-condensed">
                    <thead>
                      <th>Mata Kuliah</th>
                      <th>SKS</th>
                    </thead>
                    <tbody>
                      <?php
                      while($makul = $dataMakul->fetch_assoc()){
                        echo "
                          <tr>
                            <td>
                              $matakuliah[sks]
                            </td>
                            <td>
                              $matakuliah[nama]
                            </td>
                           ";

                        echo "
                            </td>
                            <td align =\"right\">
                              <a href=\"edit_makul.php?id=$matakuliah[id]\" class=\"btn btn-primary btn-xs\" role=\"button\"><i class=\"fa fa-pencil\"></i></a>

                              <a onclick =\"return confirm('Yakin Ingin menghapus data?')\" href=\"hapus_makul.php?id_dosen=$dosen[id]\" class=\"btn btn-danger btn-xs\" role=\"button\"><i class=\"fa fa-trash-o\"></i></a>
                              </td>
                            </tr>
                          ";
                        }
                        ?>
                      </tbody>
                  </table>
                </section>
          </section>
          </section>
        </table>
        </div>

</body>