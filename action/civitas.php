<?php
	require_once('../action/prodi.php');
	class Civitas{
		private $nama;
		private $prodi;
		public function __construct($nama,$idProdi){
			$this->prodi=ListProdi::getProdiById($idProdi);
			$this->nama = $nama;
		}
		public function getNama(){
			return $this->nama;
		}
		public function setNama($nama){
			$this->nama = $nama;
		}
		public function setProdi($idProdi){
			$this->prodi = ListProdi::getProdiById($idProdi);
		}
		public function getProdi(){
			return $this->prodi;
		}
		public function getIdProdi(){
			return $this->prodi->getIdProdi();
		}
		public function getNamaProdi(){
			return $this->prodi->getNamaProdi();
		}
	}
?>