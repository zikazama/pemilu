<!DOCTYPE HTML>
<html>
<head>
<title>Data Mahasiswa</title>
</head>
<body>
<table width="40%" border="1">
<tr>
<td>Nim</td>
<td>Prodi</td>
<td>Tingkat</td>
<td>Password</td>
<td>Aksi</td>
</tr>
<tr>
<?php foreach ($user as $row):?>
<td><?php echo $row->nim;?></td>
<td><?php echo $row->prodi;?></td>
<td><?php echo $row->tingkat;?></td>
<td><?php echo $row->password;?></td>
<td><a href="<?php base_url();?>user/edit/<?php echo
$row->nim;?>">Edit</a></td>
</tr>
<?php endforeach;?>
<br> <br>
<?php echo form_open('user/tambah');?>
<pre>
<h1>Tambah Data Mahasiswa</h1>
Nim : <input type="text" name="nimawal" placeholder="awal" required autofocus> - <input type="text" name="nimakhir" placeholder="akhir" required autofocus>
<br>
Prodi : <select name="prodi" >
    <option value="">Pilih</option>
    <option value="SI">Sistem Informasi</option>
    <option value="PM">Teknik Pemeliharaan Mesin</option>
    <option value="AI">Agro Industri</option>
    <option value="KP">Keperawatan</option>
</select>
<br>
Tingkat : <select name="tingkat" >
    <option value="1">1</option>
    <option value="2">2</option>
    <option value="3">3</option>
</select>
<br>
<input type="submit" value="Simpan">
</pre>
<?php form_close();?>
</table>
<?php 
	echo $this->pagination->create_links();
	?>
<a href="<?php echo base_url('user/reset') ?>"><button>Reset</button></a>
</body>
</html>