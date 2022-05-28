<?php

/******************************************
Asisten Pemrogaman 11
 ******************************************/

class TabelPasien extends DB
{
	function getPasien()
	{
		// Query mysql select data pasien
		$query = "SELECT * FROM pasien";
		// Mengeksekusi query
		return $this->execute($query);
	}
	function deletePasien($id)
	{
		// Query mysql delte data pasien
		$query = "DELETE FROM pasien WHERE id='$id'";
		// Mengeksekusi query
		return $this->execute($query);
	}
	function addPasien($nik, $nama, $tempat, $tl, $gender, $email, $telp)
	{
		// Query mysql insert data pasien
		$query = "INSERT INTO pasien VALUES ('', '$nik', '$nama', '$tempat', '$tl', '$gender', '$email', '$telp')";
		// Mengeksekusi query
		return $this->execute($query);
	}
	function editPasien($id, $nik, $nama, $tempat, $tl, $gender, $email, $telp)
	{
		// Query mysql update data pasien
		$query = "UPDATE pasien SET nik='$nik', nama='$nama', tempat='$tempat', tl='$tl', gender='$gender', email='$email', telp='$telp' WHERE id='$id'";
		// Mengeksekusi query
		return $this->execute($query);
	}
}
