<!DOCTYPE html>
<html>

<head>
    <title>Form Pwngubahan Data</title>
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
        //Cek apakah ada nilai yang dikirim menggunakan methos GET dengan nama id_peserta
        if (isset($_GET['id_barang'])) {
            $id_barang = input($_GET["id_barang"]);

            $sql = "select * from barang where id_barang=$id_barang";
            $hasil = mysqli_query($kon, $sql);
            $data = mysqli_fetch_assoc($hasil);


        }

        //Cek apakah ada kiriman form dari method post
        if ($_SERVER["REQUEST_METHOD"] == "POST") {

            $id_barang = htmlspecialchars($_POST["id_barang"]);
            $nama_barang = input($_POST["nama_barang"]);
            $jenis_barang = input($_POST["jenis_barang"]);
            $jumlah_barang = input($_POST["jumlah_barang"]);
            $harga_barang = input($_POST["harga_barang"]);
            $berat_barang = input($_POST["berat_barang"]);

            //Query update data pada tabel anggota
            $sql = "update barang set
			nama_barang='$nama_barang',
			jenis_barang='$jenis_barang',
			jumlah_barang='$jumlah_barang',
			harga_barang='$harga_barang',
			berat_barang='$berat_barang'
			where id_barang=$id_barang";

            //Mengeksekusi atau menjalankan query diatas
            $hasil = mysqli_query($kon, $sql);

            //Kondisi apakah berhasil atau tidak dalam mengeksekusi query diatas
            if ($hasil) {
                header("Location:index_crud.php");
            } else {
                echo "<div class='alert alert-danger'> Data Gagal disimpan.</div>";

            }

        }

        ?>
        <h2>Update Data</h2>


        <form action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]); ?>" method="post">
            <div class="form-group">
                <label>Nama Barang </label>
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

            <input type="hidden" name="id_barang" value="<?php echo $data['id_barang']; ?>" />

            <button type="submit" name="submit" class="btn btn-primary">Submit</button>
        </form>
    </div>
</body>

</html>