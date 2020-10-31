<?php
 
    require('header.php');
    require('../action/dosen.php');
    $idDosen = $_GET['idDosen'];
    $listDosen = new ListDosen();
    $dosen = $listDosen->getDosenById($idDosen);
    if(isset($_POST['simpan'])){
    	$dosenBaru = new Dosen(0, $_POST['NIDN'], $_POST['namaDosen'], $_POST['idProdi']);
    	$listDosen->updateDosen($idDosen, $dosenBaru);
    }
?>
	<h2>Edit Dosen</h2>
	<a class="btn btn-new-primary text-white" href="./dosen.php">Kembali</a>
	<form method="post" >
		<div class="row mb-2">
			<div class="col-md-4">
				NIDN
			</div>
			<div class="col-md-8">
				<?php echo '<input type="text" name="NIDN" require class="form-control" value="'.$dosen->getNIDN().'">' ?>
			</div>
		</div>
		<div class="row mb-2">
			<div class="col-md-4">
				Nama
			</div>
			<div class="col-md-8">
				<?php echo '<input type="text" name="namaDosen" require class="form-control" value="'.$dosen->getNama().'">' ?>
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
						if($prodi->getIdProdi()==$dosen->getIdProdi()){
							echo "<option value='".$prodi->getIdProdi()."' selected>".$prodi->getNamaProdi()."</option>";
						}else{
							echo "<option value='".$prodi->getIdProdi()."'>".$prodi->getNamaProdi()."</option>";
						}
					}
				?>
				</select>
			</div>
		</div>
		<?php
			echo '<input type="hidden" value="'.$dosen->getNIDN().'" name="id">';
		?>
		<div class="row justify-content-end pr-3">
			<button type="submit" class="btn btn-success text-white" name="simpan">Simpan</button>
		</div>
	</form>
	
<?php
    require('footer.php');
?>