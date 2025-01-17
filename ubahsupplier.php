<div class="row">
	<div class="col-md-12">
		<div class="box">
			<div class="box-header">
				<h3 class="box-title" style="padding-top:0; margin-top:0; color:#065cac;"><b>Ubah Supplier</b></h3>
			</div>
			<hr/>
			<div class="box-body">	
				<?php 
				include "koneksi.php";
				$id = $_GET['id'];
					if (isset($_POST['save'])) {
						$nama = mysqli_real_escape_string($conn, $_POST['nama']);
						$alamat = mysqli_real_escape_string($conn, $_POST['alamat']);
						mysqli_query($conn, "UPDATE supplier SET nama_supplier='$nama', alamat='$alamat' WHERE kd_supplier = '$id'");
						echo "<script>bootbox.alert('Data Terubah', function(){
							window.location = 'index.php?page=supplier';
						});</script>";
					}
					
					// ambil dulu data supplier berdasarkan id nya
					$qry = mysqli_query($conn, "SELECT * FROM supplier WHERE kd_supplier= '$id'");
					$sp = mysqli_fetch_array($qry);
				?>	
				<form method="POST" id="forminput" enctype="multipart/form-data">
					<div class="form-group">
						<label>Nama Supplier</label>
						<input type="text" class="form-control" name="nama" id="nama" value="<?php echo $sp['nama_supplier']; ?>" placeholder="Masukan Nama Supplier">
					</div>
					<div class="form-group">
						<label>Alamat</label>
						<input type="text" class="form-control" name="alamat" id="alamat" value="<?php echo $sp['alamat']; ?>" placeholder="Masukan Alamat Supplier">
					</div>
					<button id="formbtn" class="btn btn-primary" name="save"><i class="fa fa-save"></i> Simpan</button>
					<a href="index.php?page=supplier" class="btn btn-warning"><i class="fa fa-arrow-left"></i> Back to supplier</a>
				</form>
			</div>
		</div>
	</div>
</div>
<script>
	//fungsi hide div
	$(function(){
		setTimeout(function(){$("#divAlert").fadeOut(900)}, 500);
	});
	function validateText(id){
		if ($('#'+id).val()== null || $('#'+id).val()== "") {
			var div = $('#'+id).closest('div');
			div.addClass("has-error has-feedback");
			return false;
		}
		else{
			var div = $('#'+id).closest('div');
			div.removeClass("has-error has-feedback");
			return true;	
		}
	}
	$(document).ready(function(){
		$("#formbtn").click(function(){
			if (!validateText('nama')) {
				$('#nama').focus();
				return false;
			}
			if (!validateText('alamat')) {
				$('#alamat').focus();
				return false;
			}
			return true;
		});
	});
</script>
