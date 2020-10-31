<?php
    require('header.php');
    require('../action/prodi.php');
    $idProdi = $_GET['idProdi'];
    $listProdi = new ListProdi();
    $prodi = $listProdi->getProdiById($idProdi);
    if(isset($_POST['simpan'])){
    	$listProdi->saveProdi($idProdi, new Prodi($_POST['namaProdi'], 0));
    }
?>
	<h2>Edit Prodi</h2>
	<a class="btn btn-new-primary text-white" href="./prodi.php">Kembali</a>
	<form method="post">
		<div class="row mb-2">
			<div class="col-md-4">
				Nama Prodi
			</div>
			<div class="col-md-8">
				<?php echo '<input type="text" name="namaProdi" require class="form-control" value="'.$prodi->getNamaProdi().'">' ?>
			</div>
		</div>
		<?php
			echo '<input type="hidden" value="'.$prodi->getIdProdi().'" name="idProdi">';
		?>
		<div class="row justify-content-end pr-3">
			<button type="submit" class="btn btn-success text-white" name='simpan'>Simpan</button>
		</div>
	</form>
	
<?php
    require('footer.php');
?>