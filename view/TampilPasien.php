<?php


include("KontrakView.php");
include("presenter/ProsesPasien.php");

class TampilPasien implements KontrakView
{
	private $prosespasien; //presenter yang dapat berinteraksi langsung dengan view
	private $tpl;

	function TampilPasien()
	{
		//konstruktor
		$this->prosespasien = new ProsesPasien();
	}

	function tampil()
	{
		$this->prosespasien->prosesDataPasien();
		$data = null;
		$data2 = null;

		//semua terkait tampilan adalah tanggung jawab view
		for ($i = 0; $i < $this->prosespasien->getSize(); $i++) {
			$no = $i + 1;
			
			$id = $this->prosespasien->getId($i);
			$nik = $this->prosespasien->getNik($i);
			$nama = $this->prosespasien->getNama($i);
			$tempat = $this->prosespasien->getTempat($i);
			$tl = $this->prosespasien->getTl($i);
			$gender = $this->prosespasien->getGender($i);
			$email = $this->prosespasien->getEmail($i);
			$telp = $this->prosespasien->getTelepon($i);

			$data .= "<tr>
			<td>" . $no . "</td>
			<td>" . $nik . "</td>
			<td>" . $nama . "</td>
			<td>" . $tempat . "</td>
			<td>" . $tl . "</td>
			<td>" . $gender . "</td>
			<td>" . $email . "</td>
			<td>" . $telp . "</td>
			<td><a href='index.php?edit=".$id."&nik=".$nik."&nama=".$nama."&tempat=".$tempat."&tl=".$tl."&gender=".$gender."&email=".$email."&telp=".$telp."' class='btn btn-warning'>Edit</a>
            	<a href='index.php?delete=". $this->prosespasien->getId($i) ."' class='btn btn-danger'>Delete</a></td>";
		}
		$data2 .= "<h3>TAMBAH PASIEN</h3>
                  <form action='index.php' method='POST' class='col-6'>
				    <div class='row'>
                        <div class='form-group col-4'>
                            <label>NIK</label>
                            <input type='text' name='nik' class='form-control' required>
                        </div>
                        <div class='form-group col-8'>
                            <label>Nama Lengkap</label>
                            <input type='text' name='nama' class='form-control' required>
                        </div>
                    </div>
                    <div class='row'>
                        <div class='form-group col-4'>
                            <label>Tempat lahir</label>
                            <input type='text' name='tempat' class='form-control' required>
                        </div>
                        <div class='form-group col-4'>
                            <label>Tanggal Lahir</label>
                            <input type='date' name='tl' class='form-control' required>
                        </div>
                        <div class='form-group col-4'>
                            <p class='mb-0'>Gender</p>
                            <div class='form-check'>
                                <input class='form-check-input' type='radio' name='gender' value='Laki-laki' checked>
                                <label class='form-check-label'>
                                    Laki-laki
                                </label>
                            </div>
                            <div class='form-check'>
                                <input class='form-check-input' type='radio' name='gender' value='Perempuan'>
                                <label class='form-check-label'>
                                    Perempuan
                                </label>
                            </div>
                        </div>
                    </div>
                    <div class='row'>
                        <div class='form-group col-6'>
                            <label>Email</label>
                            <input type='email' name='email' class='form-control' required>
                        </div>
                        <div class='form-group col-6'>
                            <label>No. Telepon</label>
                            <input type='telp' name='telp' class='form-control' required>
                        </div>
                    </div>
                    <button name='tambah' type='submit' class='btn btn-success'>Tambah</button> 
                  </form>";

		// Membaca template skin.html
		$this->tpl = new Template("templates/skin.html");
		// Mengganti kode dengan data yang sudah diproses
		$this->tpl->replace("DATA_TABEL", $data);
		$this->tpl->replace("DATA_FORM", $data2);
		// Menampilkan ke layar
		$this->tpl->write();
	}

	function tampilFormEdit($id, $nik, $nama, $tempat, $tl, $gender, $email, $telp)
	{
		$this->prosespasien->prosesDataPasien();
		$data = null;
		$data2 = null;

		//semua terkait tampilan adalah tanggung jawab view
		for ($i = 0; $i < $this->prosespasien->getSize(); $i++) {
			$no = $i + 1;
			
			$id = $this->prosespasien->getId($i);
			$nik = $this->prosespasien->getNik($i);
			$nama = $this->prosespasien->getNama($i);
			$tempat = $this->prosespasien->getTempat($i);
			$tl = $this->prosespasien->getTl($i);
			$gender = $this->prosespasien->getGender($i);
			$email = $this->prosespasien->getEmail($i);
			$telp = $this->prosespasien->getTelepon($i);

			$data .= "<tr>
			<td>" . $no . "</td>
			<td>" . $nik . "</td>
			<td>" . $nama . "</td>
			<td>" . $tempat . "</td>
			<td>" . $tl . "</td>
			<td>" . $gender . "</td>
			<td>" . $email . "</td>
			<td>" . $telp . "</td>
			<td><a href='index.php?edit=".$id."&nik=".$nik."&nama=".$nama."&tempat=".$tempat."&tl=".$tl."&gender=".$gender."&email=".$email."&telp=".$telp."' class='btn btn-warning'>Edit</a>
            	<a href='index.php?delete=". $this->prosespasien->getId($i) ."' class='btn btn-danger'>Delete</a></td>";
		}
		$data2 .= "<h3>EDIT PASIEN</h3>
                  <form action='index.php' method='POST' class='col-6'>
                    <input type='hidden' name='id' value='".$id."' required>
		            <div class='row'>
                        <div class='form-group col-4'>
                            <label>NIK</label>
                            <input type='text' name='nik' class='form-control' value='".$nik."' required>
                        </div>
                        <div class='form-group col-8'>
                            <label>Nama Lengkap</label>
                            <input type='text' name='nama' class='form-control' value='".$nama."' required>
                        </div>
                    </div>
                    <div class='row'>
                        <div class='form-group col-4'>
                            <label>Tempat lahir</label>
                            <input type='text' name='tempat' class='form-control' value='".$tempat."' required>
                        </div>
                        <div class='form-group col-4'>
                            <label>Tanggal Lahir</label>
                            <input type='date' name='tl' class='form-control' value='".$tl."' required>
                        </div>
                        <div class='form-group col-4'>
                            <p class='mb-0'>Gender</p>
                            <div class='form-check'>
                                <input class='form-check-input' type='radio' name='gender' value='Laki-laki' checked>
                                <label class='form-check-label'>
                                    Laki-laki
                                </label>
                            </div>
                            <div class='form-check'>
                                <input class='form-check-input' type='radio' name='gender' value='Perempuan'>
                                <label class='form-check-label'>
                                    Perempuan
                                </label>
                            </div>
                        </div>
                    </div>
                    <div class='row'>
                        <div class='form-group col-6'>
                            <label>Email</label>
                            <input type='email' name='email' class='form-control' value='".$email."' required>
                        </div>
                        <div class='form-group col-6'>
                            <label>No. Telepon</label>
                            <input type='telp' name='telp' class='form-control' value='".$telp."' required>
                        </div>
                    </div>
                    <button name='submit_edit' type='submit' class='btn btn-success'>Edit</button> 
                  </form>";

		// Membaca template skin.html
		$this->tpl = new Template("templates/skin.html");
		// Mengganti kode dengan data yang sudah diproses
		$this->tpl->replace("DATA_TABEL", $data);
		$this->tpl->replace("DATA_FORM", $data2);
		// Menampilkan ke layar
		$this->tpl->write();
	}
	
	function hapusPasien($id)
	{
		//delete
		$this->prosespasien->deleteDataPasien($id);
	}
	function tambahPasien($nik, $nama, $tempat, $tl, $gender, $email, $telp)
	{
		//add
		$this->prosespasien->addDataPasien($nik, $nama, $tempat, $tl, $gender, $email, $telp);
	}
	function ubahPasien($id, $nik, $nama, $tempat, $tl, $gender, $email, $telp)
	{
		//add
		$this->prosespasien->editDataPasien($id, $nik, $nama, $tempat, $tl, $gender, $email, $telp);
	}
}
