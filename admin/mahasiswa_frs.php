<?php
    require('header.php');
    require('../action/mahasiswa.php');
    $NIM = $_GET['NIM'];
    $listMahasiswa = new ListMahasiswa();
    $mahasiswa=$listMahasiswa->getMahasiswaById($NIM);
    if(isset($_POST['tambah_matakuliah'])){
        $mahasiswa->ambilMataKuliah($_POST['idMataKuliah']);
    }
    if(isset($_POST['hapusMataKuliah'])){
        $mahasiswa->dropMataKuliah($_POST['idMataKuliah']);
    }
    $matakuliahDiambil = $mahasiswa->getAllTakenMataKuliah();
?>
	<h2>Edit Mahasiswa</h2>
	<a class="btn btn-new-primary text-white" href="./mahasiswa.php">Kembali</a>
		<div class="row mb-2">
			<div class="col-2">
				NIM
			</div>
			<div class="col">
				<?php echo $NIM ?>
			</div>
		</div>
		<div class="row mb-2">
			<div class="col-2">
				Nama
			</div>
			<div class="col">
				<?php echo $mahasiswa->getNama() ?>
			</div>
		</div>
		<div class="row mb-2">
			<div class="col-2">
				Prodi
			</div>
			<div class="col">
				<?php echo $mahasiswa->getNamaProdi() ?>
				</select>
			</div>
		</div>
        <div class="row mb-2">
            <div class="col-2">
                Semester
            </div>
            <div class="col">
                <
            </div>
        </div>
		<?php
			echo '<input type="hidden" value="'.$mahasiswa->getNIM().'" name="id">';
		?>
    <form method="post" class="container row justify-content-center">
        <div class="col-md-8">
            <div class="row pr-2">
                <select class="form-control" name="idMataKuliah">
                    <?php
                        $listMataKuliah = new ListMataKuliah();
                        foreach ($listMataKuliah->getAllMataKuliah() as $matakuliah) {
                            echo    '<option value="'.$matakuliah->getIdMataKuliah().'">
                                        '.$matakuliah->getNamaMataKuliah().' oleh :
                                        '.$matakuliah->getNamaDosen().'
                                    </option>';
                        }
                    ?>
                </select>
            </div>
                <?php echo '<input type="hidden" name="NIM" value="'.$NIM.'">';?>
            <div class="row justify-content-end pr-3">
                <div class="col-2">
                    <button type="submit" class="btn btn-success text-white" name="tambah_matakuliah">Simpan</button>
                </div>
            </div>
        </div>
	</form>
	<div class="container row justify-content-center">
        <div class="col-md-8">
            <table class="w-100 text-center">
                <thead>
                    <tr>
                        <td>Mata Kuliah</td>
                        <td>Dosen</td>
                        <td>SKS</td>
                        <td>Action</td>
                    </tr>
                </thead>
                <tfoot>
                    <tr>
                        <td>Mata Kuliah</td>
                        <td>Dosen</td>
                        <td>SKS</td>
                        <td>Action</td>
                    </tr>
                </tfoot>
                <tbody>
                    <?php
                        foreach ($matakuliahDiambil[0] as $matakuliah) {
                            echo 
                            '<tr>
                                <td>'.$matakuliah->getNamaMataKuliah().'</td>
                                <td>'.$matakuliah->getNamaDosen().'</td>
                                <td>'.$matakuliah->getSKS().'</td>
                                <td>
                                    <form method="post">
                                        <input type="hidden" value="'.$matakuliah->getIdMataKuliah().'" name="idMataKuliah">
                                        <button type="submit" class="btn btn-danger" name="hapusMataKuliah">Hapus</button>
                                    </form>
                                </td>
                            </tr>';
                        }
                    ?>
                </tbody>
            </table>
        </div>
    </div>
<?php
    require('footer.php');
?>