<?php
session_start();
if(empty($_SESSION['iduser'])){
	echo "
		<script type='text/javascript'>
			alert('Mohon maaf, Silahkan Login Terlebih Dahulu.');
			window.location.href='index.php';
		</script>
	";
}
elseif(isset($_SESSION['iduser']) AND isset($_SESSION['akses'])){
include ("config/koneksi.php");
include ("config/akses.php");
include ("config/class_paging.php");
include("config/fungsi_indotgl.php");
include("config/fungsi_rupiah.php");
include ("config/library.php");

$akses=$_SESSION['akses'];
error_reporting(E_ALL^(E_NOTICE));
?>
<!DOCTYPE html>
<html lang="id">
	<head>

		<title><?php include ("config/title.php"); ?></title>
		<meta name="viewport" content="width=device-width, initial-scale=1.0">
		<meta charset="utf-8">  
		<link href="cs/main.css" rel="stylesheet" >
		<!-- <link rel="stylesheet" href="cs1/bootstrap.min.css" /> -->
		<link rel="stylesheet" href="cs1/ace.min.css" id="main-ace-style" />
    
		<link href="css/custom.css" rel="stylesheet" media="screen">
		<link href="css/bootstrap.min.css" rel="stylesheet" media="screen">
		<link  href="css/bootstrap-responsive.min.css"  rel ="stylesheet"> 
        <link  href="font-awesome/css/font-awesome.min.css"  rel ="stylesheet"> 
		<script src="js/jquery.js"></script>
		<script src="js/bootstrap.min.js"></script>
		   <!-- Bootstrap -->
		<!-- <link rel="shortcut icon" href="logo.png" > -->
			
		<?php include("config/f_tgl.php");?>
		<?php include("config/f_jam.php");?>
		
	</head>
	<body>
	<header>
	<?php include("config/f_grafik.php");?>
	<div class="navbar">
					  <div class="navbar-inner">
						<div class="container">
						  <!-- Menampilkan tombol trigger -->
						  <a class="btn btn-navbar" data-toggle="collapse" data-target=".navbar-responsive-collapse">
							<span class="icon-bar"></span>
							<span class="icon-bar"></span>
							<span class="icon-bar"></span>
						  </a><!-- Akhir dari tombol triger -->
						  <!-- Komponen navbar -->
						 
						  <div class="nav-collapse collapse navbar-responsive-collapse">
							<ul class="nav">
							  <li><a href="media.php?module=home"><i class="fa fa-home"></i> Home</a></li>
							  <?php if (($_SESSION['akses']=="3")||($_SESSION['akses']=="1")||($_SESSION['akses']=="2")){?>
                                <li><a href="media.php?module=detailmedik"><i class="fa fa-medkit"></i> Rekam Medik</a></li>
                                <?php } ?>
							<?php
                                if($akses=='3'){
                            ?>
                            <li><a href="media.php?module=data_user"><i class="fa fa-users"></i> Data User</a></li>
                                <?php
                                }
                            
                            ?>
							  <li class="dropdown">
								<a href="#" class="dropdown-toggle" data-toggle="dropdown"><i class="fa fa-users"></i> Data Member <b class="caret"></b></a>
								<ul class="dropdown-menu">
								 <li><a href="media.php?module=data_pasien">Data Member</a></li>
								 <li><a href="media.php?module=tanggungan">Data Non-Member</a></li>
								</ul>
							  </li>

							  
								<li><a href="media.php?module=dokter"><i class="fa fa-user-md"></i> Data Dokter</a>
								
							  </li>
                              <!--   <li><a href="media.php?module=pegawai"><i class="fa fa-users"></i> Data Pegawai</a></li> -->
                             <?php  if (($_SESSION['akses']=="3")||($_SESSION['akses']=="1")){?>
								<li><a href="media.php?module=tindakan"><i class="fa fa-plus-square"></i> Layanan</a></li><?php }?>
								<li><a href="media.php?module=rekap"><i class="fa fa-plus-square"></i> Rekap</a></li>
							<?php if (($_SESSION['akses']=="3")||($_SESSION['akses']=="1")){ ?>
								<li><a href="media.php?module=data_obat">Pembayaran</a></li><?php } ?>
						<!-- 		<li><a href="media.php?module=dataobat"><i class="fa fa-tint"></i> Data Obat</a></li> -->
							</ul>
														
							
							<ul class="nav pull-right">
							  <li class="divider-vertical"></li>
							  <li class="dropdown">
								<a href="#" class="dropdown-toggle" data-toggle="dropdown"><i class="icon-user" ></i> Settings <b class="caret"></b></a>
								<ul class="dropdown-menu">
								<?php  if ($_SESSION['akses']=="3"){?>
								<li><a href="media.php?module=set"><i class="icon-refresh"></i> Setting Login</a></li>
								<?php } ?>
								  <li><a href="media.php?module=profil&&act=edit&&kodeuser=<?php echo $rus['kodeUser']; ?>"><i class="icon-refresh"></i> Profil</a></li>
								  <li><a href="media.php?module=pass&&kodeuser=<?php echo $rus['kodeUser']; ?>"><i class="icon-refresh"></i> Ganti Password</a></li>
								  <li class="divider"></li>
								  <li><a href="keluar.php"><i class="icon-off"></i> Keluar</a></li>
								</ul>
							  </li>
							</ul>
						  </div><!-- /.nav-collapse -->
						</div>
					  </div><!-- /navbar-inner -->
					</div><!-- /navbar -->
	</header>
	

	<?php
		include ("kontent.php");
	?>
			
	
		<script type="text/javascript">
			$(function () {
				$(".btn").popover('show');
			});
		</script>
	</body>
</html>
<?php
}
else{
    
}
?>