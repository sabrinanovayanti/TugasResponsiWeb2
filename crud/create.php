<!DOCTYPE html>
<html>

<head>
    <title>Form Input Barang Baru</title>
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.6.1/dist/css/bootstrap.min.css"
        integrity="sha384-zCbKRCUGaJDkqS1kPbPd7TveP5iyJE0EjAuZQTgFLD2ylzuqKfdKlfG/eSrtxUkn" crossorigin="anonymous">
</head>

<body>
    <div class="container">
        <?php
        //Include file koneksi, untuk koneksikan ke database
        include "koneksi.php";

        //Fungsi untuk mencegah inputan karakter yang tidak sesuai
        function input($data)
        {
            $data = trim($data);
            $data = stripslashes($data);
            $data = htmlspecialchars($data);
            return $data;
        }
        //Cek apakah ada kiriman form dari method post
        if ($_SERVER["REQUEST_METHOD"] == "POST") {

            $nama_barang = input($_POST["nama_barang"]);
            $jenis_barang = input($_POST["jenis_barang"]);
            $jumlah_barang = input($_POST["jumlah_barang"]);
            $harga_barang = input($_POST["harga_barang"]);
            $berat_barang = input($_POST["berat_barang"]);

            //Query input menginput data kedalam tabel anggota
            $sql = "insert into barang (nama_barang,jenis_barang,jumlah_barang,harga_barang,berat_barang) values
		('$nama_barang','$jenis_barang','$jumlah_barang','$harga_barang','$berat_barang')";

            //Mengeksekusi/menjalankan query diatas
            $hasil = mysqli_query($kon, $sql);

            //Kondisi apakah berhasil atau tidak dalam mengeksekusi query diatas
            if ($hasil) {
                header("Location:index_crud.php");
            } else {
                echo "<div class='alert alert-danger'> Data Gagal disimpan.</div>";

            }

        }
        ?>
        <h2>Input Data</h2>


        <form action="<?php echo $_SERVER["PHP_SELF"]; ?>" method="post">
            <div class="form-group">
                <label>Nama Barang</label>
                <input type="text" name="nama_barang" class="form-control" placeholder="Masukan Nama Barang" required />

            </div>
            <div class="form-group">
                <label>Jenis Barang</label>
                <input type="text" name="jenis_barang" class="form-control" placeholder="Masukan Jenis Barang"
                    required />
            </div>
            <div class="form-group">
                <label>Jumlah Barang</label>
                <input type="text" name="jumlah_barang" class="form-control" placeholder="Masukan Jumlah Barang"
                    required />
            </div>
            </p>
            <div class="form-group">
                <label>Harga Barang</label>
                <input type="text" name="harga_barang" class="form-control" placeholder="Masukan Harga Barang"
                    required />
            </div>
            <div class="form-group">
                <label>Berat Barang</label>
                <textarea name="berat_barang" class="form-control" rows="5" placeholder="Masukan Berat Barang"
                    required></textarea>
            </div>

            <button type="submit" name="submit" class="btn btn-primary">Submit</button>
        </form>
    </div>
</body>

</html>