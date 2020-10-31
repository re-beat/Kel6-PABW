<?php
    require('header.php');
    require_once('../action/mahasiswa.php');
    require_once('../action/dosen.php');
    $NIM = $_GET['NIM'];
    $listMahasiswa = new ListMahasiswa();
    $Mahasiswa = $listMahasiswa->getMahasiswaById($NIM);
    if(isset($_POST['simpan'])){
    	$mahasiswaBaru = new Mahasiswa($_POST['NIM'], $_POST['namaMahasiswa'], $_POST['idProdi'], $_POST['idDosen']);
    	$listMahasiswa->saveMahasiswa($NIM, $mahasiswaBaru);
    }
?>
	<h2>Edit Mahasiswa</h2>
	<a class="btn btn-new-primary text-white" href="./mahasiswa.php">Kembali</a>
	<form method="post">
		<div class="row mb-2">
			<div class="col-md-4">
				NIM
			</div>
			<div class="col-md-8">
				<?php echo '<input type="text" name="NIM" require class="form-control" value="'.$NIM.'">' ?>
			</div>
		</div>
		<div class="row mb-2">
			<div class="col-md-4">
				Nama
			</div>
			<div class="col-md-8">
				<?php echo '<input type="text" name="namaMahasiswa" require class="form-control" value="'.$Mahasiswa->getNama().'">' ?>
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
						if($prodi->getIdProdi()==$Mahasiswa->getIdProdi()){
							echo "<option value='".$prodi->getIdProdi()."' selected>".$prodi->getNamaProdi()."</option>";
						}else{
							echo "<option value='".$prodi->getIdProdi()."'>".$prodi->getNamaProdi()."</option>";
						}
					}
				?>
				</select>
			</div>
		</div><div class="row mb-2">
			<div class="col-md-4">
				Dosen
			</div>
			<div class="col-md-8">
				<select class="form-control" name="idDosen">
				<?php
					$listDosen = new ListDosen();
					foreach ($listDosen->getAllDosen() as $dosen) {
						if($dosen->getIdDosen()==$Mahasiswa->getIdDosen()){
							echo "<option value='".$dosen->getIdDosen()."' selected>".$dosen->getNama()."</option>";
						}else{
							echo "<option value='".$dosen->getIdDosen()."'>".$dosen->getNama()."</option>";
						}
					}
				?>
				</select>
			</div>
		</div>
		<?php
			echo '<input type="hidden" value="'.$NIM.'" name="id">';
		?>
		<div class="row justify-content-end pr-3">
			<button type="submit" class="btn btn-success text-white" name="simpan">Simpan</button>
		</div>
	</form>
	
<?php
    require('footer.php');
?>