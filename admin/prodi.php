<?php
    require('header.php');
    require('../action/prodi.php');
    $listProdi = new ListProdi();
    if(isset($_POST["hapus"])){
    	$id = $_POST["id"];
    	$listProdi->deleteProdi($id);
    }
?>
	<h2>Prodi</h2>
	<a class="btn btn-new-primary" href="./prodi_tambah.php">Tambah</a>
	<table class="w-100">
		<thead>
			<tr>
				<td>Nama Prodi</td>
				<td>Action</td>
			</tr>
		</thead>
		<tfoot>
			<tr>
				<td>Nama Prodi</td>
				<td>Action</td>	
			</tr>
		</tfoot>
		<tbody>

			<?php
				foreach ($listProdi->getAllProdi() as $prodi) {
					echo 
					'
					<form method="post">
						<tr>
							<input type="hidden" value="'.$prodi->getIdProdi().'" name="id">
							<td>'.$prodi->getNamaProdi().'</td>
							<td>
								<a href="./prodi_edit.php?idProdi='.$prodi->getIdProdi().'" class="btn btn-warning">
									Edit
								</a>
								<input type="hidden" value="'.$prodi->getIdProdi().'" name="id">
								<input type="hidden" value="'.$prodi->getIdProdi().'" name="id">
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