<div id="makul" class="table-responsive-sm tab-pane fade in active">
	<table class="w-auto table table-dark  table-hover table-sm table-bordered">
		<section id="container">
	  		<section id="main-content">
			<section class="wrapper">
    			<div class="row mt">
					<div class="col-lg-12">
    				<div class="table-responsive">
          			<div class="row-auto">
          			<br>
	        		  <button type="button" class="btn btn-primary float-right" data-toggle="modal" data-target="#inputmakul">Input Makul</button>

					<!-- Modal -->
					<?php include ('modal_tambahmakul.php'); ?>
	
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
				              $makul[nama]
				            </td>
				            <td>
				              $makul[sks]
				            </td>
				           ";

				        echo "
				            <td align =\"right\">
				              <a href=\"/process/ubah_makul.php?id=$makul[id]\" class=\"btn btn-primary btn-xs\" role=\"button\"><i class=\"fa fa-pencil\"></i></a>
				              <a onclick =\"return confirm('Yakin Ingin menghapus data?')\" href=\"/process/hapus_makul.php?id_makul=$makul[id]\" class=\"btn btn-danger btn-xs\" role=\"button\"><i class=\"fa fa-trash-o\"></i></a>
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