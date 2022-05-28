<?php

/******************************************
Nama    : Satria Pinandita Abyatarsyah
NIM     : 2000514
Kelas   : C2 - 2020
 ******************************************/

include("model/Template.class.php");
include("model/DB.class.php");
include("model/Pasien.class.php");
include("model/TabelPasien.class.php");
include("view/TampilPasien.php");;

$tp = new TampilPasien();

if (!empty($_GET['delete'])) {
    //memanggil add
    $id = $_GET['delete'];

    $tp->hapusPasien($id);
}
if (isset($_POST['tambah'])) {
    $nik = $_POST['nik'];
    $nama = $_POST['nama'];
    $tempat = $_POST['tempat'];
    $tl = $_POST['tl'];
    $gender = $_POST['gender'];
    $email = $_POST['email'];
    $telp = $_POST['telp'];

    $tp->tambahPasien($nik, $nama, $tempat, $tl, $gender, $email, $telp);
}
if (isset($_POST['submit_edit'])) {
    $id = $_POST['id'];
    $nik = $_POST['nik'];
    $nama = $_POST['nama'];
    $tempat = $_POST['tempat'];
    $tl = $_POST['tl'];
    $gender = $_POST['gender'];
    $email = $_POST['email'];
    $telp = $_POST['telp'];

    $tp->ubahPasien($id, $nik, $nama, $tempat, $tl, $gender, $email, $telp);
}
if (!empty($_GET['edit'])) {
    $id = $_GET['edit'];
    $nik = $_GET['nik'];
    $nama = $_GET['nama'];
    $tempat = $_GET['tempat'];
    $tl = $_GET['tl'];
    $gender = $_GET['gender'];
    $email = $_GET['email'];
    $telp = $_GET['telp'];
    
    $tp->tampilFormEdit($id, $nik, $nama, $tempat, $tl, $gender, $email, $telp);
} else {
    $tp->tampil();
}