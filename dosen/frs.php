<?php
    require('header.php');
    require('../action/mahasiswa.php');
    $NIM = $_GET['NIM'];
    $listMahasiswa = new ListMahasiswa();
    $mahasiswa=$listMahasiswa->getMahasiswaById($NIM);
    if(isset($_POST['setujui'])){
        $query = $mahasiswa->setujuiFrs($_POST['semester']);
    }
    $frsMahasiswa = $mahasiswa->getAllFrs();
?>
	<h2>FRS</h2>
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

    <!-- Modal -->
	<table class="w-100">
        <thead class="text-center">
            <tr>
                <td>Semester</td>
                <td>Persetujuan Dosen</td>
                <td>Action</td>
            </tr>
        </thead>
        <tfoot class="text-center">
            <tr>
                <td>Semester</td>
                <td>Persetujuan Dosen</td>
                <td>Action</td>
            </tr>
        </tfoot>
        <tbody class="text-center">
            <?php
                foreach ($frsMahasiswa as $frs) {
                    echo 
                    '<tr>
                        <td>'.$frs->getSemester().'</td>
                        <td>'.$frs->getPersetujuanDosen().'</td>
                        <td>
                            <form method="post">

                            <a href="./frs_detail.php?idFrs='.$frs->getIdFrs().'" class="btn btn-warning">
                                Lihat
                            </a>';
                                if($frs->getPersetujuanDosen()=='0'){
                                     echo '<input type="hidden" value="'.$frs->getSemester().'" name="semester">
                                        <button type="submit" class="btn btn-danger" name="setujui">
                                            Setujui
                                        </button>';
                                }
                               
                            echo'
                            </form>

                        </td> 
                    </tr>';
                }
            ?>
        </tbody>
    </table>
<?php
    require('footer.php');
?>