<?php include 'header.php'?>

<div class="container">
    <div class="row">
        <h1>Data Transaksi</h1>
        <a href="tambah_transaksi.php">Tambah Transaksi</a>
        <a href="print_transaksi.php">Print Data</a>

        <?php
        if(@$_GET['tambah'] == "sukses") {
            $color = "success";
            $msg = 'Data Transaksi berhasil ditambah.';
        }
        elseif (@$_GET['update'] == "sukses") {
            $color = "info";
            $msg = "Data Transaksi berhasil diupdate.";
        }
        elseif (@$_GET['delete'] == 'sukses') {
            $color = "danger";
            $msg = "Data Transaksi berhasil dihapus.";
        }
        else{
            $color = "";
            $msg = "";
        }

        if($msg != '') {
            ?>
            <div class="alert alert-<?=$color?> alert-dismissible fade show"  role="alert">
            <?=$msg?>
            <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="close"></button>
            </div>
        <?php
        }
        ?>

    </div>
</div>

<?php include 'footer.php'?>