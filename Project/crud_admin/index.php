<?php 
include('inc/header.php');
session_start();

if(!isset($_SESSION['admin_name'])){
   header('location:../login/login_form.php');
}
?>
<title>Toko Kue</title>
<script src="js/jquery.dataTables.min.js"></script>
<script src="js/dataTables.bootstrap.min.js"></script>		
<link rel="stylesheet" href="css/dataTables.bootstrap.min.css" >
<script src="js/ajax.js"></script>	
<?php include('inc/container.php');?>
<div class="container contact">	
	<div class="col-lg-10 col-md-10 col-sm-9 col-xs-12">   		
		<div class="panel-heading">
			<div class="row">
				<div class="col-md-10">
					<h3 class="panel-title"></h3>
				</div>
				<div class="col-md-2" align="right">
					<button type="button" name="add" id="addRecord" class="btn btn-info">Add New Record</button>
				</div>
			</div>
		</div>
		<table id="recordListing" class="table table-bordered table-striped" style="width: 100%;">
			<thead>
				<tr>
					<th>No</th>
					<th>Nama Kue</th>					
					<th>Harga Kue</th>					
					<th>Jenis Kue</th>
					<th>Deskripsi</th>
					<th>Rasa Kue</th>				
					<th>Edit</th>
					<th>Hapus</th>					
				</tr>
			</thead>
		</table>
	</div>
	<div id="recordModal" class="modal fade">
    	<div class="modal-dialog">
    		<form method="post" id="recordForm">
    			<div class="modal-content">
    				<div class="modal-header">
    					<button type="button" class="close" data-dismiss="modal">&times;</button>
						<h4 class="modal-title"><i class="fa fa-plus"></i> Edit Record</h4>
    				</div>
    				<div class="modal-body">
						<div class="form-group"
							<label for="name" class="control-label">Name kue</label>
							<input type="text" class="form-control" id="nama_kue" name="nama_kue" placeholder="Nama kue" required>			
						</div>
						<div class="form-group">
							<label for="number" class="control-label">Harga Kue</label>							
							<input type="number" class="form-control" id="harga_kue" name="harga_kue" placeholder="Harga Kue">							
						</div>	   	
						<div class="form-group">
							<label for="lastname" class="control-label">Jenis Kue</label>							
							<input type="text" class="form-control"  id="jenis_kue" name="jenis_kue" placeholder="Jenis kue" required>							
						</div>	 
						<div class="form-group">
						<label for="lastname" class="control-label">Deskripsi</label>							
							<input type="text" class="form-control"  id="deskripsi" name="deskripsi" placeholder="Deskripsi" required>							
						</div>
						<div class="form-group">
							<label for="lastname" class="control-label">Rasa Kue</label>							
							<input type="text" class="form-control" id="rasa_kue" name="rasa_kue" placeholder="Rasa Kue">			
						</div>						
    				</div>
    				<div class="modal-footer">
    					<input type="hidden" name="id" id="id" />
    					<input type="hidden" name="action" id="action" value="" />
    					<input type="submit" name="save" id="save" class="btn btn-info" value="Save" />
    					<button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
    				</div>
    			</div>
    		</form>
    	</div>
    </div>
</div>	
<?php include('inc/footer.php');?>