<?php
    require('header.php');
    require('../action/prodi.php');
    if(isset($_POST['tambah'])){
    	$listProdi = new ListProdi();
    	$prodi = new Prodi($_POST['namaProdi'], 0);
    	$listProdi->insertProdi($prodi);
    }
?>
	<h2>Prodi</h2>
	<a class="btn btn-new-primary text-white" href="./prodi.php">Kembali</a>
	<form method="post">
		<div class="row mb-2">
			<div class="col-md-4">
				Nama prodi
			</div>
			<div class="col-md-8">
				<input type="text" name="namaProdi" require class="form-control">
			</div>
		</div>
		<div class="row justify-content-end pr-3">
			<button type="submit" class="btn btn-success text-white" name="tambah">Tambah</button>
		</div>
	</form>
<?php
    require('footer.php');
?>