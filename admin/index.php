<?php
    require('header.php');
    $koneksi = create_connection();
    $data = $koneksi-> prepare('SELECT 
                                    (SELECT count(NIM) from mahasiswa) as jumlah_mahasiswa,
                                    (SELECT count(idDosen) from dosen) as jumlah_dosen,
                                    (SELECT count(idProdi) from prodi) as jumlah_prodi
                                    ');
    $data->execute();
    $data = $data->fetch();
    $jumlah_mahasiswa = $data['jumlah_mahasiswa'];
    $jumlah_dosen = $data['jumlah_dosen'];
    $jumlah_prodi = $data['jumlah_prodi'];
?>
    <h2>Dashboard</h2>
    <div class="row">
        <div class="col-md-3">
            <div class="card-design bg-red row">
                <div class="col-4">
                    <i class="fas fa-building icon-dashboard"></i>
                </div>
                <div class="col-8 ">
                    <h4>Jumlah Prodi</h4>
                    <?php
                        echo '<h2>'.$jumlah_prodi.'</h2>';
                    ?>
                </div>
            </div>
        </div>
        <div class="col-md-3">
            <div class="card-design bg-blue row">
                <div class="col-6">
                    <i class="fas fa-users icon-dashboard"></i>
                </div>
                <div class="col-6">
                    <h4>Jumlah Dosen</h4>
                    <?php
                        echo '<h2>'.$jumlah_dosen.'</h2>';
                    ?>
                </div>
            </div>
        </div>
        <div class="col-md-3">
            <div class="card-design bg-green row">
                <div class="col-4">
                    <i class="fas fa-user icon-dashboard"></i>
                </div>
                <div class="col-8 ">
                    <h4>Jumlah Mahasiswa</h4>
                    <?php
                        echo '<h2>'.$jumlah_mahasiswa.'</h2>';
                    ?>
                </div>
            </div>
        </div>
    </div>
<?php
    require('footer.php');
?>