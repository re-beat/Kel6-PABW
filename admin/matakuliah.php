<?php
    require('header.php');
    require('../action/matakuliah.php');
    $listMataKuliah = new ListMataKuliah();
    if(isset($_POST["hapus"])){
    	$id = $_POST["id"];
    	$listMataKuliah->deleteMataKuliah($id);
    }
?>
	<h2>MataKuliah</h2>
	<a class="btn btn-new-primary" href="./matakuliah_tambah.php">Tambah</a>
	<table class="w-100">
		<thead>
			<tr>
				<td>Nama MataKuliah</td>
                <td>Dosen</td>
				<td>SKS</td>
				<td>Action</td>
			</tr>
		</thead>
		<tfoot>
			<tr>
				<td>Nama MataKuliah</td>
                <td>Dosen</td>
				<td>SKS</td>
				<td>Action</td>	
			</tr>
		</tfoot>
		<tbody>
			<?php
				foreach ($listMataKuliah->getAllMataKuliah() as $row) {
					echo 
					'
					<form method="post">
						<tr>
	                        <td>'.$row->getNamaMataKuliah().'</td>
	                        <td>'.$row->getNamaDosen().'</td>
	                        <td>'.$row->getSKS().'</td>
							<td>
								<a href="./matakuliah_edit.php?idMataKuliah='.$row->getIdMataKuliah().'" class="btn btn-warning">
									Edit
								</a>
								<input type="hidden" value="'.$row->getIdMataKuliah().'" name="id">
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