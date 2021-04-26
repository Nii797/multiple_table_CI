<!DOCTYPE html>
<html>
<head>
	<title>Paket</title>
	<!--Load CSS File-->
	<link rel="stylesheet" type="text/css" href="<?php echo base_url('assets/css/bootstrap.css');?>">
	<link rel="stylesheet" type="text/css" href="<?php echo base_url('assets/css/bootstrap-select.css');?>">
</head>
<body>
	<div class="container">
		<h1>Lis Paket</h1>
		<button type="button" class="btn btn-success btn-sm" data-toggle="modal" data-target="#addNewModal">Tambah Paket Baru</button><br/>
		<table class="table table-striped">
			<thead>
				<tr>
					<th>#</th>
					<th>Nama Paket</th>
					<th>Buat di</th>
					<th>Item Produk</th>
					<th>Aksi</th>
				</tr>
			</thead>
			<tbody>
				<?php 
					$count=0;
					foreach ($package->result() as $row) :
						$count++;
				?>
				<tr>
					<td><?php echo $count;?></td>
					<td><?php echo $row->package_name;?></td>
					<td><?php echo $row->package_created_at;?></td>
					<td><?php echo $row->item_product.' Items';?></td>
					<td>
						<a href="#" class="btn btn-info btn-sm update-record" data-package_id="<?php echo $row->package_id;?>" data-package_name="<?php echo $row->package_name;?>">Ubah</a>
						<a href="#" class="btn btn-danger btn-sm delete-record" data-package_id="<?php echo $row->package_id;?>">Hapus</a>
					</td>
				</tr>
				<?php endforeach;?>
			</tbody>
			
		</table>
	</div>

	<!-- Modal Add New Package-->
	<form action="<?php echo site_url('package/create');?>" method="post">
		<div class="modal fade" id="addNewModal" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
		  <div class="modal-dialog" role="document">
		    <div class="modal-content">
		      <div class="modal-header">
		        <h5 class="modal-title" id="exampleModalLabel">Tambah Paket Baru</h5>
		        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
		          <span aria-hidden="true">&times;</span>
		        </button>
		      </div>
		      <div class="modal-body">

				<div class="form-group row">
				    <label class="col-sm-2 col-form-label">Paket</label>
				    <div class="col-sm-10">
				      <input type="text" name="package" class="form-control" placeholder="Package Name" required>
				    </div>
				</div>
				<div class="form-group row">
				    <label class="col-sm-2 col-form-label">Produk</label>
				    <div class="col-sm-10">
				      	<select class="bootstrap-select" name="product[]" data-width="100%" data-live-search="true" multiple required>
				      		<?php foreach ($product->result() as $row) :?>
						  		<option value="<?php echo $row->product_id;?>"><?php echo $row->product_name;?></option>
						  	<?php endforeach;?>
						</select>
				    </div>
				</div>

		      </div>
		      <div class="modal-footer">
		        <button type="button" class="btn btn-secondary btn-sm" data-dismiss="modal">Tutup</button>
		        <button type="submit" class="btn btn-success btn-sm">Simpan</button>
		      </div>
		    </div>
		  </div>
		</div>
	</form>

	<!-- Modal Update Package-->
	<form action="<?php echo site_url('package/update');?>" method="post">
		<div class="modal fade" id="UpdateModal" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
		  <div class="modal-dialog" role="document">
		    <div class="modal-content">
		      <div class="modal-header">
		        <h5 class="modal-title" id="exampleModalLabel">Update Paket</h5>
		        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
		          <span aria-hidden="true">&times;</span>
		        </button>
		      </div>
		      <div class="modal-body">

				<div class="form-group row">
				    <label class="col-sm-2 col-form-label">Paket</label>
				    <div class="col-sm-10">
				      <input type="text" name="package_edit" class="form-control" placeholder="Package Name" required>
				    </div>
				</div>
				<div class="form-group row">
				    <label class="col-sm-2 col-form-label">Produk</label>
				    <div class="col-sm-10">
				      	<select class="bootstrap-select strings" name="product_edit[]" data-width="100%" data-live-search="true" multiple required>
				      		<?php foreach ($product->result() as $row) :?>
						  		<option value="<?php echo $row->product_id;?>"><?php echo $row->product_name;?></option>
						  	<?php endforeach;?>
						</select>
				    </div>
				</div>

		      </div>
		      <div class="modal-footer">
		      	<input type="hidden" name="edit_id" required>
		        <button type="button" class="btn btn-secondary btn-sm" data-dismiss="modal">Tutup</button>
		        <button type="submit" class="btn btn-success btn-sm">Ubah</button>
		      </div>
		    </div>
		  </div>
		</div>
	</form>


	<!-- Modal Delete Package-->
	<form action="<?php echo site_url('package/delete');?>" method="post">
		<div class="modal fade" id="DeleteModal" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
		  <div class="modal-dialog" role="document">
		    <div class="modal-content">
		      <div class="modal-header">
		        <h5 class="modal-title" id="exampleModalLabel">Hapus Paket</h5>
		        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
		          <span aria-hidden="true">&times;</span>
		        </button>
		      </div>
		      <div class="modal-body">

				<h4>Apa kau yakin untuk menghapus paket ini?</h4>

		      </div>
		      <div class="modal-footer">
		      	<input type="hidden" name="delete_id" required>
		        <button type="button" class="btn btn-secondary btn-sm" data-dismiss="modal">Tidak</button>
		        <button type="submit" class="btn btn-success btn-sm">Ya</button>
		      </div>
		    </div>
		  </div>
		</div>
	</form>

	<!--Load JavaScript File-->
	<script type="text/javascript" src="<?php echo base_url('assets/js/jquery-3.4.1.min.js');?>"></script>
	<script type="text/javascript" src="<?php echo base_url('assets/js/bootstrap.bundle.js');?>"></script>
	<script type="text/javascript" src="<?php echo base_url('assets/js/bootstrap-select.js');?>"></script>
	<script type="text/javascript">
		$(document).ready(function(){
			$('.bootstrap-select').selectpicker();

			//GET UPDATE
			$('.update-record').on('click',function(){
				var package_id = $(this).data('package_id');
				var package_name = $(this).data('package_name');
				$(".strings").val('');
				$('#UpdateModal').modal('show');
				$('[name="edit_id"]').val(package_id);
				$('[name="package_edit"]').val(package_name);
                //AJAX REQUEST TO GET SELECTED PRODUCT
                $.ajax({
                    url: "<?php echo site_url('package/get_product_by_package');?>",
                    method: "POST",
                    data :{package_id:package_id},
                    cache:false,
                    success : function(data){
                        var item=data;
                        var val1=item.replace("[","");
                        var val2=val1.replace("]","");
                        var values=val2;
                        $.each(values.split(","), function(i,e){
                            $(".strings option[value='" + e + "']").prop("selected", true).trigger('change');
                            $(".strings").selectpicker('refresh');

                        });
                    }
                    
                });
                return false;
			});

			//GET CONFIRM DELETE
			$('.delete-record').on('click',function(){
				var package_id = $(this).data('package_id');
				$('#DeleteModal').modal('show');
				$('[name="delete_id"]').val(package_id);
			});

		});
	</script>
</body>
</html>