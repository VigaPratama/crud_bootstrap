<!DOCTYPE html>
<html>
<head>
    <title>Create</title>
    <!-- Load file CSS Bootstrap offline -->
    <link rel="stylesheet" href="bootstrap/css/bootstrap.min.css">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">

</head>
<body>
<div class="container">
    <?php
    //Include file koneksi, untuk koneksikan ke database
    include "koneksi.php";
    
    //Fungsi untuk mencegah inputan karakter yang tidak sesuai
    function input($data) {
        $data = trim($data);
        $data = stripslashes($data);
        $data = htmlspecialchars($data);
        return $data;
    }
    //Cek apakah ada kiriman form dari method post
    if ($_SERVER["REQUEST_METHOD"] == "POST") {

        $nama=input($_POST["nama"]);
        $nim=input($_POST["nim"]);
        $alamat=input($_POST["alamat"]);
        $jurusan=input($_POST["jurusan"]);
        $jenis_kelamin=input($_POST["jenis_kelamin"]);
        $telp=input($_POST["telp"]);

        //Query input menginput data kedalam tabel anggota
        $sql="insert into data_mahasiswa (nama,nim,alamat,jurusan,jenis_kelamin,telp) values ('$nama','$nim','$alamat','$jurusan','$jenis_kelamin','$telp')";

        //Mengeksekusi/menjalankan query diatas
        $hasil=mysqli_query($kon,$sql);

        //Kondisi apakah berhasil atau tidak dalam mengeksekusi query diatas
        if ($hasil) {
            header("Location:index.php");
        }
        else {
            echo "<div class='alert alert-danger'> Data Gagal disimpan.</div>";

        }

    }
    ?>
    <br>
    <h2>Input Data</h2><br>


    <form action="<?php echo $_SERVER["PHP_SELF"];?>" method="post">
    <br>
        <div class="form-group">
            <label>Nama</label>
            <input type="text" name="nama" class="form-control" placeholder="Masukan Nama" required />

        </div>
        <br>
        <div class="form-group">
            <label>NIM</label>
            <input type="text" name="nim" class="form-control" placeholder="Masukan NIM" required/>

        </div>
        <br>
        <div class="form-group">
            <label>Alamat:</label>
            <textarea name="alamat" class="form-control" rows="5" placeholder="Masukan Alamat" required></textarea>
        </div>
        <br>
        <div class="form-group">
            <label>Jurusan:</label>
            <div class="col-sm-8"><select id="jurusan" name="jurusan" class="form-control select2" style="width: 150%;">
                    <option value="-" selected="selected">--- PILIH ---</option>
                    <option value="Teknik Informatika">Teknik Informatika</option>
                    <option value="Kedokteran">Kedokteran</option>
                    <option value="Teknik Electro">Teknik Electro</option>
                    <option value="Statistika">Statistika</option>
                    <option value="Ilmu Ekonomi">Ilmu Ekonomi</option>
                </select>
                </div>
        </div>
        <br>
        <div class="form-group">
            <label>Jenis Kelamin:</label>
            <div class="col-sm-8"><select id="jenis_kelamin" name="jenis_kelamin" class="form-control select2" style="width: 150%;">
                    <option value="-" selected="selected">--- PILIH ---</option>
                    <option value="Laki-laki">Laki-Laki</option>
                    <option value="Perempuan">Perempuan</option>
                </select>
                </div>
        </div>
        <br>
        <div class="form-group">
            <label>Telepon:</label>
            <input type="text" name="telp" class="form-control" placeholder="Masukan Telp" required/>
        </div>
        <br>
        

        <button type="submit" name="submit" class="btn btn-primary">Submit</button>
        <a href="index.php" class="btn btn-danger" role="button">Kembali</a>
    </form>
</div>
</body>
</html>