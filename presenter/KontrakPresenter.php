<?php


interface KontrakPresenter
{
	public function prosesDataPasien();
	public function getId($i);
	public function getNik($i);
	public function getNama($i);
	public function getTempat($i);
	public function getTl($i);
	public function getGender($i);
	public function getEmail($i);
	public function getTelepon($i);
	public function getSize();
	public function deleteDataPasien($id);
	public function addDataPasien($nik, $nama, $tempat, $tl, $gender, $email, $telp);
	public function editDataPasien($id, $nik, $nama, $tempat, $tl, $gender, $email, $telp);
}
