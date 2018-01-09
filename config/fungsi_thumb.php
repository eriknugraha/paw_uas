<?php
function uploadFoto($fupload_name){
  //direktori banner
  $vdir_upload = "../photo_user/";
  $vfile_upload = $vdir_upload . $fupload_name;

  //Simpan gambar dalam ukuran sebenarnya
  move_uploaded_file($_FILES["fupload"]["tmp_name"], $vfile_upload);
}

function uploaddok($fupload_name){
  //direktori banner
  $vdir_upload = "../photo_user/";
  $vfile_upload = $vdir_upload . $fupload_name;

  //Simpan gambar dalam ukuran sebenarnya
  move_uploaded_file($_FILES["fupload"]["tmp_name"], $vfile_upload);
}

function login($fupload_name){
  //direktori banner
  $vdir_upload = "../foto_login/";
  $vfile_upload = $vdir_upload . $fupload_name;

  //Simpan gambar dalam ukuran sebenarnya
  move_uploaded_file($_FILES["fupload"]["tmp_name"], $vfile_upload);
}

function uploadPhoto($fupload_name){
  //direktori banner
  $vdir_upload = "photo_user/";
  $vfile_upload = $vdir_upload . $fupload_name;

  //Simpan gambar dalam ukuran sebenarnya
  move_uploaded_file($_FILES["fupload"]["tmp_name"], $vfile_upload);
}
function fotoPasien($fupload_name){
  //direktori banner
  $vdir_upload = "../foto_pasien/";
  $vfile_upload = $vdir_upload . $fupload_name;

  //Simpan gambar dalam ukuran sebenarnya
  move_uploaded_file($_FILES["fupload"]["tmp_name"], $vfile_upload);
}


?>
