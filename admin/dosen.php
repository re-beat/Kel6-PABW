<?php
    require('header.php');
    require('../action/dosen.php');
    $listDosen = new ListDosen();
    if(isset($_POST["hapus"])){
    	$id = $_POST["id"];
    	$listDosen->deleteDosen($id);
    }
?>
	<h2>Dosen</h2>
	<a class="btn btn-new-primary" href="./dosen_tambah.php">Tambah</a>
	<table class="w-100">
		<thead class="text-center">
			<tr>
				<td>NIDN</td>
				<td>Nama</td>
				<td>Prodi</td>
				<td>Action</td>
			</tr>
		</thead>
		<tfoot class="text-center">
			<tr>
				<td>NIDN</td>
				<td>Nama</td>
				<td>Prodi</td>
				<td>Action</td>
			</tr>
		</tfoot>
		<tbody>
			<?php
				foreach ($listDosen->getAllDosen() as $dosen) {
					echo 
					'
					<form method="post">
						<tr>
						<td>'.$dosen->getNIDN().'</td>
						<td>'.$dosen->getNama().'</td>
						<td>'.$dosen->getNamaProdi().'</td>
						<td>
							<a href="./dosen_edit.php?idDosen='.$dosen->getIdDosen().'" class="btn btn-warning">
								Edit
							</a>
							<input type="hidden" value="'.$dosen->getIdDosen().'" name="id">
							<button type="submit" name="hapus" class="btn btn-danger">
								Delete
							</button>
						</td> 
						</tr>
					</form>';
				}
			?>
		</tbody>
	</table>
<?php
    require('footer.php');
?>