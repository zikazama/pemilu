<?php foreach ($data as $row):?>
<?php echo form_open('user/update');?>

<h1>Tambah Data Mahasiswa</h1>
Nim : <input type="text" name="nim" placeholder="nim" required autofocus value="<?= $row->nim ?>"> 
<br>
Prodi : <select name="prodi" >
    <option value="<?= $row->prodi ?>"><?= $row->prodi ?></option>
    <option value="SI">Sistem Informasi</option>
    <option value="PM">Teknik Pemeliharaan Mesin</option>
    <option value="AI">Agro Industri</option>
    <option value="KP">Keperawatan</option>
</select>
<br>
Tingkat : <select name="tingkat" >
    <option value="<?= $row->tingkat ?>"><?= $row->tingkat ?></option>
    <option value="1">1</option>
    <option value="2">2</option>
    <option value="3">3</option>
</select>
<br>
Password : <input type="text" name="password" placeholder="password" required autofocus value="<?= $row->password ?>"> 
<br>
<input type="submit" value="Simpan">
</pre>
<?php form_close();?>
<?php endforeach; ?>
