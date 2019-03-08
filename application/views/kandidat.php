<?php echo form_open('kandidat/tambah');?>
<pre>
<h1>Tambah Data Kandidat</h1>
Nim : <input type="text" name="nim" placeholder="NIM" required autofocus> 
<br>
Nama Depan : <input type="text" name="nama_depan" placeholder="Nama Depan" required autofocus> 
<br>
Jabatan : <select name="jabatan" >
    <option value="">Pilih</option>
    <option value="presma">Presiden Mahasiswa</option>
    <option value="wapresma">Wakil Presiden Mahasiswa</option>
</select>
<br>
Nomor Kandidat : <input type="number" name="no_kandidat" placeholder="Nomor Kandidat" required autofocus> 
<br>
<input type="submit" value="Simpan">
</pre>
<?php form_close();?>