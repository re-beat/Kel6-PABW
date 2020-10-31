<?php

	function create_connection(){
		try{
	        $koneksi = new PDO("mysql:host=localhost;dbname=tugas_database","root","");
	        return $koneksi;
		}catch(PDOException $e){
	        echo "Koneksi Gagal ".$e->getMessage();
		}
	}
	class Login{
        var $koneksi;

        function login($koneksi){
            $this->koneksi = $koneksi;
            session_start();
        }
        public function try_login($username, $password) { 
            try { 
                $stmt = $this->koneksi->prepare("SELECT * FROM login where username=:username"); 
                $stmt->bindParam(":username", $username); 
                $stmt->execute();
                $data = $stmt->fetch();
                if($stmt->rowCount() > 0){ 
                    if(md5($password) == $data['password']){
	                    if($data['hak_akses']=='admin'){
	                        $_SESSION['username'] = $data['username'];
	                        $_SESSION['hak_akses'] = $data['hak_akses']; 
                            header('Location:./admin');
	                    } else if($data['hak_akses']=='mahasiswa'){
	                        $_SESSION['username'] = $data['username'];
	                        $_SESSION['hak_akses'] = $data['hak_akses']; 
	                        $_SESSION['NIM'] = $data['id']; 
                            header('Location:./mahasiswa');
	                    }else if($data['hak_akses']=='dosen'){
	                        $_SESSION['username'] = $data['username'];
	                        $_SESSION['hak_akses'] = $data['hak_akses']; 
	                        $_SESSION['idDosen'] = $data['id'];
                            header('Location:./dosen'); 
	                    }
                        return true; 
                    }else{ 
                        $this->error = "Password Salah"; 
                        return false; 
                    } 
                }else{ 
                    $this->error = "Email username tidak ditemukan"; 
                    return false; 
                } 
            } catch (PDOException $e) { 
                echo $e->getMessage(); 
                return false; 
            } 
        }

        #mengecek apakah sudah login
        public function isLogin(){
            if(isset($_SESSION['username'])) { 
                return true; 
            }else {
                return false;
            }
        }

        public function getMessageLogin(){ 
            return $this->error; 
        } 
        public function getUser(){
            if(!$this->isLoggedIn()){ 
                return false; 
            } 
            try { 
             // Ambil data user dari database
                return [$_SESSION['username'], $_SESSION['hak_akses']]; 
            } catch (PDOException $e) { 
                 echo $e->getMessage(); 
                 return false; 
            } 
        }
        public function logout(){ 
           session_destroy();
           header("Location:../");
        } 
    }
	$login = new Login(create_connection());
?>
