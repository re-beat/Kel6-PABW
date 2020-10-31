<?php
    require('header.php');
    require_once('../action/prodi.php');
    require_once('../action/dosen.php');
    if(isset($_POST['tambah'])){
    	$listMahasiswa = new ListMahasiswa();
    	$mahasiswa = new Mahasiswa($_POST['NIM'], $_POST['namaMahasiswa'], $_POST['idProdi'], $_POST['idDosen']);
    	$listMahasiswa->insertMahasiswa($mahasiswa);
    }
?>
	<h2>Mahasiswa</h2>
	<a class="btn btn-new-primary text-white" href="./mahasiswa.php">Kembali</a>
	<form method="post">
		<div class="row mb-2">
			<div class="col-md-4">
				NIM
			</div>
			<div class="col-md-8">
				<input type="text" name="NIM" require class="form-control">
			</div>
		</div>
		<div class="row mb-2">
			<div class="col-md-4">
				Nama
			</div>
			<div class="col-md-8">
				<input type="text" name="namaMahasiswa" require class="form-control">
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
		<div class="row mb-2">
			<div class="col-md-4">
				Dosen
			</div>
			<div class="col-md-8">
				<select class="form-control" name="idDosen">
				<?php
					$listDosen = new ListDosen();
					foreach ($listDosen->getAllDosen() as $dosen) {
						echo "<option value='".$dosen->getIdDosen()."'>".$dosen->getNama()."</option>";
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