<?php
    require('header.php');
    require('../action/mahasiswa.php');
    $NIM = $_SESSION['NIM'];
    $listMahasiswa = new ListMahasiswa();
    $mahasiswa=$listMahasiswa->getMahasiswaById($NIM);
    if(isset($_POST['tambah'])){
        $mahasiswa->tambahSemester();
    }
    if(isset($_POST['hapus'])){
        $mahasiswa->dropSemester($_POST['semester']);
    }
    $frsMahasiswa = $mahasiswa->getAllFrs();
?>
	<h2>FRS</h2>
    <button type="button" class="btn btn-primary" data-toggle="modal" data-target="#exampleModal">
      Tambah Semester
    </button>

    <!-- Modal -->
    <div class="modal fade" id="exampleModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
      <div class="modal-dialog" role="document">
        <form method="post">
            <div class="modal-content">
              <div class="modal-header">
                <h5 class="modal-title" id="exampleModalLabel">Tambah Semester</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                  <span aria-hidden="true">&times;</span>
                </button>
              </div>
              <div class="modal-body">
                Yakin ingin menambah semester?
              </div>
              <div class="modal-footer">
                <button type="button" class="btn btn-secondary" data-dismiss="modal">Batal</button>
                <button type="submit" name="tambah" class="btn btn-primary">Yakin</button>
              </div>
            </div>
        </form>
      </div>
    </div>
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

                            <a href="./frs_edit.php?idFrs='.$frs->getIdFrs().'" class="btn btn-warning">
                                Edit
                            </a>';
                                if($frs->getPersetujuanDosen()=='0'){
                                     echo '<input type="hidden" value="'.$frs->getSemester().'" name="semester">
                                        <button type="submit" class="btn btn-danger" name="hapus">
                                            Delete
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