<?php
    require('header.php');
    require('../action/dosen.php');
    if(isset($_POST['tambah'])){
    	$listDosen = new ListDosen();
    	$dosen = new Dosen(0, $_POST['NIDN'], $_POST['namaDosen'], $_POST['idProdi']);
    	$listDosen->insertDosen($dosen);
    }
?>
	<h2>dosen</h2>
	<a class="btn btn-new-primary text-white" href="./dosen.php">Kembali</a>
	<form method="post">
		<div class="row mb-2">
			<div class="col-md-4">
				NIDN
			</div>
			<div class="col-md-8">
				<input type="text" name="NIDN" require class="form-control">
			</div>
		</div>
		<div class="row mb-2">
			<div class="col-md-4">
				Nama
			</div>
			<div class="col-md-8">
				<input type="text" name="namaDosen" require class="form-control">
			</div>

		</div>
		<div class="row mb-2">
			<div class="col-md-4">
				Prodi
			</div>
			<div class="col-md-8">
				<select class="form-control" name="idProdi">
				<?php
					$listProdi = new ListProdi();
					foreach ($listProdi->getAllProdi() as $prodi) {
						echo "<option value='".$prodi->getIdProdi()."'>".$prodi->getNamaProdi()."</option>";
					}
				?>
				</select>
			</div>
		</div>
		<div class="row justify-content-end pr-3">
			<button type="submit" class="btn btn-success text-white" name="tambah">Tambah</button>
		</div>
	</form>
	
<?php
    require('footer.php');
?>