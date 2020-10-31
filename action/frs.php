<?php
	require_once('../action/matakuliah.php');
	class FRS{
		private $idFrs;
		private $NIM;
		private $Semester;
		private $persetujuanDosen;
		private $koneksi;
		function __construct($idFrs){
			$this->idFrs=$idFrs;
			$koneksi = create_connection();
			$ambil = $koneksi->prepare("SELECT * FROM frs where idFrs=:idFrs");
			$ambil->bindParam(':idFrs', $idFrs);
			$ambil->execute();
			$row = $ambil->fetch();
			$this->Semester = $row['semester'];
			$this->NIM = $row['NIM'];
			$this->persetujuanDosen = $row['persetujuanDosen'];
			$this->koneksi = create_connection();
		}
		function getNIM(){
			return $this->NIM;
		}
		function getSemester(){
			return $this->Semester;
		}
		function getPersetujuanDosen(){
			return $this->persetujuanDosen;
		}
		function setPersetujuanDosen
		($persetujuan_dosen){
			$this->persetujuanDosen;
		}
		function getIdFrs(){
			return $this->idFrs;
		}
		function getAllTakenMataKuliah(){
			try{
				$koneksi = $this->koneksi;
				$ambil=$koneksi->prepare("SELECT matakuliah.* from ambil_matkul inner join matakuliah on matakuliah.idMataKuliah = ambil_matkul.idMataKuliah where idFrs=:idFrs");
				$ambil->bindParam(':idFrs', $this->idFrs);
				$ambil->execute();
				$hasil = [];
				while($tampil=$ambil->fetch()){
		            $hasil[] = new MataKuliah($tampil['idMataKuliah'], $tampil['namaMataKuliah'], $tampil['idDosen'], $tampil['sks']);
				}
				return $hasil;
			}catch(PDOException $Exception){
				 throw new MyDatabaseException( $Exception->getMessage( ) , (int)$Exception->getCode( ) );
			}
			ini_set('memory_limit', '44M');
		}
		function ambilMataKuliah($idMataKuliah){
			$query = $this->koneksi->prepare("insert into ambil_matkul value(:idMataKuliah, :idFrs)");
			$query->bindParam(':idFrs', $this->idFrs);
			$query->bindParam(':idMataKuliah', $idMataKuliah);
			$query->execute();
		}
		function dropMataKuliah($idMataKuliah){
			$query = $this->koneksi->prepare("DELETE FROM ambil_matkul where idFrs=:idFrs and idMataKuliah=:idMataKuliah");
			$query->bindParam(':idFrs', $this->idFrs);
			$query->bindParam(':idMataKuliah', $idMataKuliah);
			$query->execute();
		}
		function setujui(){
			$query = $this->koneksi->prepare("UPDATE frs set persetujuanDosen=1 where idFrs=:idFrs");
			$query->bindParam(':idFrs', $this->idFrs);
			$query->execute();
			$this->persetujuanDosen = 1;
		}
	}
?>