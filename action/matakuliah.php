<?php
	require_once('../action/dosen.php');
	class MataKuliah{
		private $namaMataKuliah;
		private $idMataKuliah;
		private $dosen;
		private $sks;
		function __construct($idMataKuliah, $namaMataKuliah, $idDosen, $sks){
			$this->idMataKuliah = $idMataKuliah;
			$this->namaMataKuliah = $namaMataKuliah;
			$this->sks = $sks;
			$this->dosen = ListDosen::getDosenById($idDosen);
		}
		function getNamaMataKuliah(){
			return $this->namaMataKuliah;
		}
		function setNamaMataKuliah($namaMataKuliah){
			$this->namaMataKuliah = $namaMataKuliah;
		}
		function setDosen($idDosen){
			$this->dosen = ListDosen::getDosenById($idDosen);
		}
		function getNamaDosen(){
			return $this->dosen->getNama();
		}
		function getDosen(){
			return $this->dosen;
		}
		function getIdDosen(){
			return $this->dosen->getIdDosen();
		}
		function getSKS(){
			return $this->sks;
		}
		function setSKS($sks){
			$this->sks = $sks;
		}
		function getIdMataKuliah(){
			return $this->idMataKuliah;
		}
	}
	class ListMataKuliah{
		public function __construct()
	    {
	    	$this->koneksi = create_connection();
	    }
		static function getAllMataKuliah(){
			$ambil=create_connection()->prepare("select * from matakuliah");
			$ambil->execute();
			while($tampil=$ambil->fetch()){
	            $hasil[] = new MataKuliah($tampil['idMataKuliah'], $tampil['namaMataKuliah'], $tampil['idDosen'], $tampil['sks']);
			}
			return $hasil;
		}
		public static function getMataKuliahById($id){
			$ambil = create_connection()->prepare("select * from matakuliah where idMataKuliah=:idMataKuliah");
			$ambil -> bindParam(':idMataKuliah', $id);
			$ambil->execute();
			$tampil = $ambil->fetch();
			return new MataKuliah($tampil['idMataKuliah'], $tampil['namaMataKuliah'], $tampil['idDosen'], $tampil['sks']);
		}
		function deleteMataKuliah($id){
			$delete = $this->koneksi->prepare('DELETE FROM matakuliah where idMataKuliah=:idMataKuliah');
			$delete->bindParam(':idMataKuliah', $id);
			$delete->execute();
		}

		function updateMataKuliah($idMataKuliah, $MataKuliah){
			try{
				$koneksi = $this->koneksi;
				$simpan = $koneksi->prepare("UPDATE matakuliah set namaMatakuliah=:namaMataKuliah, idDosen=:idDosen, sks=:sks where idMataKuliah=:idMataKuliah");
				$simpan->bindParam(':namaMataKuliah', $MataKuliah->getNamaMataKuliah());
				$simpan->bindParam(':idDosen', $MataKuliah->getIdDosen());
				$simpan->bindParam(':sks', $MataKuliah->getSKS());
				$simpan->bindParam(':idMataKuliah', $idMataKuliah);
				$simpan->execute();
			}catch(PDOException $Exception){
				 throw new MyDatabaseException( $Exception->getMessage( ) , (int)$Exception->getCode( ) );
			}
		}
		function insertMataKuliah($MataKuliah){
			$koneksi = $this->koneksi;
			$masuk = $koneksi->prepare('INSERT INTO matakuliah value (0, :namaMataKuliah, :idDosen, :sks)');
			$masuk->bindParam(":namaMataKuliah", $MataKuliah->getNamaMataKuliah());
			$masuk->bindParam(":idDosen", $MataKuliah->getIdDosen());
			$masuk->bindParam(":sks", $MataKuliah->getSKS());
			$masuk->execute();
			header('Location:../admin/matakuliah.php');
		}

	}
?>