<?php

interface KontrakView{
	public function tampil();
	public function tampilFormEdit($id, $nik, $nama, $tempat, $tl, $gender, $email, $telp);
	public function hapusPasien($id);
	public function tambahPasien($nik, $nama, $tempat, $tl, $gender, $email, $telp);
	public function ubahPasien($id, $nik, $nama, $tempat, $tl, $gender, $email, $telp);
}

?>