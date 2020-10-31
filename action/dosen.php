<?php
	require_once('../action/civitas.php');
	require_once('../action/mahasiswa.php');
	class Dosen extends Civitas{
		private $idDosen;
		private $NIDN;
		private $koneksi;
		function dosen($idDosen, $NIDN, $namaDosen,$idProdi){
			$this->NIDN = $NIDN;
			$this->idDosen=$idDosen;
			$this->koneksi=create_connection();
			parent::__construct($namaDosen, $idProdi);
		}
		function getIdDosen(){
			return $this->idDosen;
		}
		function getNIDN(){
			return $this->NIDN;
		}
		function setNIDN($NIDN){
			$this->NIDN = $NIDN;
		}
		function getMyMahasiswa(){
			$koneksi=$this->koneksi;
			$data = $koneksi->prepare("SELECT * FROM mahasiswa where idDosen=:idDosen");
			$data->bindParam(":idDosen", $this->idDosen);
			$data->execute();
			$hasil = [];
			while($tampil = $data->fetch()){
				$hasil[] = new Mahasiswa($tampil['NIM'], $tampil['namaMahasiswa'], $tampil['idProdi'], $tampil['idDosen']);
			}
			return $hasil;
		}
	}
	class ListDosen{
		function __construct(){
			$this->koneksi =create_connection();
		}
		function getAllDosen(){
			$data = $this->koneksi->prepare('SELECT dosen.*, namaProdi FROM dosen inner join prodi on prodi.idProdi=dosen.idProdi');
			$data->execute();
			while($tampil = $data->fetch()){
				$hasil[] = new Dosen($tampil['idDosen'],$tampil['NIDN'], $tampil['namaDosen'], $tampil['idProdi']);
			}
			return $hasil;
		}
		static function getDosenById($id){
			$data = create_connection()->prepare('SELECT dosen.*, prodi.namaProdi from dosen inner join prodi on dosen.idProdi=prodi.idProdi where idDosen=:idDosen');
			$data->bindParam(':idDosen', $id);
			$data->execute();
			if($dosen = $data->fetch()){
				return new Dosen($dosen['idDosen'], $dosen['NIDN'],$dosen['namaDosen'], $dosen['idProdi']);
			}
			return null;
		}

		function insertDosen($Dosen){
			$query = $this->koneksi->prepare('INSERT INTO dosen value(0,:NIDN,:namaDosen,:idProdi)');
			$query->bindParam(':NIDN', $Dosen->getNIDN());
			$query->bindParam(':namaDosen', $Dosen->getNama());
			$query->bindParam(':idProdi', $Dosen->getIdProdi());
			$query->execute();
			header('Location:../admin/dosen.php');
		}
		function deleteDosen($idDosen){
			$query = $this->koneksi->prepare('DELETE FROM dosen where idDosen=:idDosen');
			$query->bindParam(':idDosen', $idDosen);
			$query->execute();
			header('Location:../admin/dosen.php'); 
		}
		function updateDosen($idDosen, $Dosen){
			$query = $this->koneksi->prepare('UPDATE dosen set NIDN=:NIDN, namaDosen=:namaDosen, idProdi=:idProdi where idDosen=:idDosen');
			$query->bindParam(':NIDN', $Dosen->getNIDN());
			$query->bindParam(':namaDosen', $Dosen->getNama());
			$query->bindParam(':idProdi', $Dosen->getIdProdi());
			$query->bindParam(':idDosen', $idDosen);
			$query->execute();
			header('Location:../admin/dosen.php');
		}
	}
?>