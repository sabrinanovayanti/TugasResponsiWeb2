<?php
require_once './config/dbcon.php';
?>
<!DOCTYPE html>
<html lang="en">

<?php
$head = "DASHBOARD";
?>

<body class="back-color">
    <?php
    include './components/navbar.php';
    ?>
    <div class="container mt-5 pt-4 text-center">
        <h1 class="fw-bolder">Inventory System</h1>
        <table class="table caption-top table-responsive mt-4 table-light">
            <caption><a href="./index.php?page=product" class="btn btn-outline-success"><i
                        class="bi bi-plus-lg me-2"></i>Add Product</a></caption>
            <thead class="table-light">
                <tr>
                    <th scope="col">ID Barang</th>
                    <th scope="col">Jenis Barang</th>
                    <th scope="col">Nama Barang</th>
                    <th scope="col">Harga Barang</th>
                    <th scope="col">Berat Barang</th>
                    <th scope="col" colspan="2">Action</th>
                </tr>
            </thead>
            <tbody>
                <!-- TODO 1 : LOOP DATA -->
                <?php
                $num = 1;
                $queryData = $conn->query("SELECT id_barang, 
                                            jenis_barang, 
                                            nama_barang,
                                            harga_barang, 
                                            berat_barang, 
                                            FROM barang 
                                            JOIN brands b ON p.brand_id = b.id");
                while ($data = $queryData->fetch_assoc()) {
                    ?>
                    <tr>
                        <th scope="row">
                            <?= $num ?>
                        </th>
                        <td>
                            <?= $data['id_barang'] ?>
                        </td>
                        <td>
                            <?= $data['jenis'] ?>
                        </td>
                        <td>
                            <?= $data['release_year'] ?>
                        </td>
                        <td>
                            <?= $data['price'] ?>
                        </td>
                        <td><img class="prev-img" src="<?= $data['product_image'] ?>"></td>
                        <td><a href="./index.php?page=product&id=<?= $data['id'] ?>"
                                class="btn btn-outline-warning px-3 py-1"><i class="bi bi-pencil me-2"></i>Edit</a></td>
                        <td><a href="./index.php?page=deleteProduct&id=<?= $data['id'] ?>"
                                class="btn btn-outline-danger px-3 py-1"><i class="bi bi-trash2-fill me-2"></i>Delete</a>
                        </td>
                    </tr>
                    <?php
                    $num++;
                }
                ?>

            </tbody>
        </table>
    </div>
</body>

</html>

<style>
    .back-color {
        background-color: #EEEEEE;
    }

    .prev-img {
        max-width: 100px;
        max-height: 100px;
    }
</style>