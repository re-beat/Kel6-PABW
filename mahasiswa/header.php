<?php

    require_once('../conn.php');
    if(!$login->isLogin()){
        header('Location:../');
    }
?>
<html>
    <head>
        <!-- Required meta tags -->
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">

        <!-- Bootstrap CSS -->
        <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css" integrity="sha384-JcKb8q3iqJ61gNV9KGb8thSsNjpSL0n8PARn9HuZOnIxN0hoP+VmmDGMN5t9UJ0Z" crossorigin="anonymous">
        <link rel="stylesheet" href="../assets/css/custom.css">
        <link rel="stylesheet" href="../assets/fontawesome/css/all.css">
        <title>Mahasiswa</title>
    </head>
    <body>
       <div class="wrapper">
		    <!-- Sidebar -->
		    <nav id="sidebar">

		        <ul class="list-unstyled components">
		            <li class="text-center sidebar-link">
		                <a href="../mahasiswa/index.php">FRS</a>
		            </li>
		            <li class="text-center sidebar-link">
		                <a href="../action/logout.php">Log Out</a>
		            </li>
		        </ul>
		    </nav>
		    <div id="content" class="bg-light w-100">
			    <nav class="navbar navbar-expand-lg navbar-light bg-light pl-0">
			        <div class="container-fluid">

			            <button type="button" id="sidebarCollapse" class="btn btn-info">
			                <i class="fas fa-align-left"></i>
			                <span>Toggle Sidebar</span>
			            </button>
			        </div>
			    </nav>
			    <div class="pl-2">
