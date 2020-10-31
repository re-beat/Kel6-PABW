<?php
	class Prodi{
		private $namaProdi;
		private $idProdi;
		function prodi($namaProdi, $idProdi){
			$this->namaProdi = $namaProdi;
			$this->idProdi = $idProdi;
		}
		function getIdProdi(){
			return $this->idProdi;
		}
		function setNamaProdi($namaProdi){
			$this->namaProdi = $namaProdi;
		}
		function getNamaProdi(){
			return $this->namaProdi;
		}
	}
	class ListProdi{
		public function __construct()
	    {
	    	$this->koneksi = create_connection();
	    }
		function getAllProdi(){
			$ambil=$this->koneksi->prepare("select * from prodi");
			$ambil->execute();
			while($tampil=$ambil->fetch()){
	            $hasil[] = new Prodi($tampil['namaProdi'], $tampil['idProdi']);
			}
			return $hasil;
		}
		public static function getProdiById($id){
			$ambil = create_connection()->prepare("select * from prodi where idProdi=:idProdi");
			$ambil -> bindParam(':idProdi', $id);
			$ambil->execute();
			$row = $ambil->fetch();
			return new Prodi($row['namaProdi'], $row['idProdi']);
		}
		function deleteProdi($id){
			$delete = $this-> koneksi->prepare('DELETE FROM prodi where idProdi=:idProdi');
			$delete->bindParam(':idProdi', $id);
			$delete->execute();
		}

		function saveProdi($idProdiLama, $Prodi){
			$koneksi = create_connection();
			$simpan = $koneksi->prepare("update prodi set namaProdi=:namaProdi where idProdi=:idProdi");
			$simpan->bindParam(':namaProdi',$Prodi->getNamaProdi());
			$simpan->bindParam(':idProdi', $idProdiLama);
			$simpan->execute();
			header('Location:../admin/prodi.php');
		}
		function insertProdi($Prodi){
			$koneksi = $this->koneksi;
			$masuk = $koneksi->prepare('insert into prodi value (0, :namaProdi)');
			$masuk->bindParam(":namaProdi", $Prodi->getNamaProdi());
			$masuk->execute();
			header('Location:../admin/prodi.php');
		}
	}
?>