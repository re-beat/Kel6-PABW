<?php
    require('header.php');
    require('../action/frs.php');
    $idFrs = $_GET['idFrs'];
    $Frs = new FRS($idFrs);
    if(isset($_POST['tambah_matakuliah'])){
        $Frs->ambilMataKuliah($_POST['idMataKuliah']);
    }
    if(isset($_POST['hapusMataKuliah'])){
        $Frs->dropMataKuliah($_POST['idMataKuliah']);
    }
?>
	<h2>Edit Mahasiswa</h2>
	<a class="btn btn-new-primary text-white" href="./mahasiswa.php">Kembali</a>
		<div class="row mb-2">
			<div class="col-2">
				NIM
			</div>
			<div class="col">
				<?php echo $Frs->getNIM() ?>
			</div>
		</div>
        <div class="row mb-2">
            <div class="col-2">
                Semester
            </div>
            <div class="col">
                <?php echo $Frs->getSemester() ?>  
            </div>
        </div>
		<?php
			echo '<input type="hidden" value="'.$Frs->getNIM().'" name="id">';
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
                <?php echo '<input type="hidden" name="NIM" value="'.$Frs->getNIM().'">';?>
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
                    if($Frs->getPersetujuanDosen()==0){
                        foreach ($Frs->getAllTakenMataKuliah() as $matakuliah) {
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
                    }else{

                        foreach ($Frs->getAllTakenMataKuliah() as $matakuliah) {
                          echo 
                            '<tr>
                                <td>'.$matakuliah->getNamaMataKuliah().'</td>
                                <td>'.$matakuliah->getNamaDosen().'</td>
                                <td>'.$matakuliah->getSKS().'</td>
                                <td>
                                    <form method="post">
                                        <input type="hidden" value="'.$matakuliah->getIdMataKuliah().'" name="idMataKuliah">
                                        <button type="submit" class="btn btn-danger" name="hapusMataKuliah" disabled>Hapus</button>
                                    </form>
                                </td>
                            </tr>';
                        }
                        
                    }
                    ?>
                </tbody>
            </table>
        </div>
    </div>
<?php
    require('footer.php');
?>