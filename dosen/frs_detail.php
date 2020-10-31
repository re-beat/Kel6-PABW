<?php
    require('header.php');
    require('../action/frs.php');
    $idFrs = $_GET['idFrs'];
    $Frs = new FRS($idFrs);
    if(isset($_POST['tambah_matakuliah'])){
        $Frs->ambilMataKuliah($_POST['idMataKuliah']);
    }
    if(isset($_POST['setujui'])){
        $Frs->setujui();
    }
    if(isset($_POST['hapusMataKuliah'])){
        $Frs->dropMataKuliah($_POST['idMataKuliah']);
    }
?>
	<h2>Edit Mahasiswa</h2>
    <?php
	   echo '<a class="btn btn-new-primary text-white" href="./frs.php?NIM='.$Frs->getNIM().'">Kembali</a>'
    ?>
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
	<div class="container row justify-content-center">
        <div class="col-md-8">
            <table class="w-100 text-center">
                <thead>
                    <tr>
                        <td>Mata Kuliah</td>
                        <td>Dosen</td>
                        <td>SKS</td>
                    </tr>
                </thead>
                <tfoot>
                    <tr>
                        <td>Mata Kuliah</td>
                        <td>Dosen</td>
                        <td>SKS</td>
                    </tr>
                </tfoot>
                <tbody>
                    <?php
                        foreach ($Frs->getAllTakenMataKuliah() as $matakuliah) {
                            echo 
                            '<tr>
                                <td>'.$matakuliah->getNamaMataKuliah().'</td>
                                <td>'.$matakuliah->getNamaDosen().'</td>
                                <td>'.$matakuliah->getSKS().'</td>
                            </tr>';
                        }
                    ?>
                </tbody>
            </table>
            <?php
                if($Frs->getPersetujuanDosen()==0){
                    echo '<form class="w-100 row justify-content-end mt-3" method="post">
                            <button type="submit" class="btn btn-success col-2" name="setujui">Setujui</button>
                        </form>';
                }
            
            ?>
        </div>
    </div>
<?php
    require('footer.php');
?>