<?php
    require('header.php');
    require('../action/dosen.php');
    $idDosen = $_SESSION['idDosen'];
    $listDosen = new ListDosen();
    $dosen=$listDosen->getDosenById($idDosen);
    $listMahasiswa = $dosen->getMyMahasiswa();
?>
	<h2>FRS</h2>
	<table class="w-100">
        <thead class="text-center">
            <tr>
                <td>NIM</td>
                <td>Nama Mahasiswa</td>
                <td>Action</td>
            </tr>
        </thead>
        <tfoot class="text-center">
            <tr>
                <td>NIM</td>
                <td>Nama Mahasiswa</td>
                <td>Action</td>
            </tr>
        </tfoot>
        <tbody class="text-center">
            <?php
                foreach ($listMahasiswa as $mahasiswa) {
                    echo 
                    '<tr>
                        <td>'.$mahasiswa->getNIM().'</td>
                        <td>'.$mahasiswa->getNama().'</td>
                        <td>
                            <form method="post">

                            <a href="./frs.php?NIM='.$mahasiswa->getNIM().'" class="btn btn-warning">
                                Edit
                            </a>
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