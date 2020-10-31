<?php
    require('header.php');
    require('../action/matakuliah.php');
    if(isset($_POST['tambah'])){
    	$listMataKuliah = new ListMataKuliah();
    	$matakuliah = new MataKuliah(0, $_POST['namaMataKuliah'], $_POST['idDosen'], $_POST['sks']);
    	$listMataKuliah->insertMataKuliah($matakuliah);
    }
?>
	<h2>Mata Kuliah</h2>
	<a class="btn btn-new-primary text-white" href="./matakuliah.php">Kembali</a>
	<form method="post">
        
		<div class="row mb-2">
			<div class="col-md-4">
				Nama Mata Kuliah
			</div>
			<div class="col-md-8">
				<input type="text" name="namaMataKuliah" require class="form-control">
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
		<div class="row mb-2">
			<div class="col-md-4">
				SKS
			</div>
			<div class="col-md-8">
                <input type="number" class="form-control" name="sks">
			</div>
		</div>
		<div class="row justify-content-end pr-3">
			<button type="submit" class="btn btn-success text-white" name="tambah">Tambah</button>
		</div>
	</form>
	
<?php
    require('footer.php');
?>