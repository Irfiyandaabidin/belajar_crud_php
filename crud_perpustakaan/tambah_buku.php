<?php include 'header.php'; ?>

<div class="container">
    <div class="row">
        <?php
        if (@$_GET['id_buku']) {
            $id_buku = $_GET['id_buku'];

            include 'koneksi.php';
            $query = mysqli_query($koneksi, "SELECT * FROM buku WHERE id_buku = '$id_buku'");
            $buku = mysqli_fetch_array($query);
        }
        ?>
        <h1 class="text-center py-3">Tambah Data Buku</h1>
        <div class="col-md-6 offset-3">
            <form action="simpan_buku.php" method="post">
                    <div class="md-3">
                        <label class="form-label" for="judul">Judul Buku </label>
                        <input class="form-control" type="text" name="judul" id="judul" value='<?=@$buku['judul']?>'>
                    </div>
                        
                    <div class="md-3">
                        <label class="form-label" for="kode_buku">Kode Buku </label>
                        <input class="form-control" type="number" name="kode_buku" id="kode_buku" value='<?=@$buku['kode_buku']?>'>
                    </div>
                        
                    <div class="md-3">
                        <label class="form-label" for="pengarang">Pengarang </label>
                        <input class="form-control" type="text" name="pengarang" id="pengarang" value='<?=@$buku['pengarang']?>'>
                    </div>
                        
                    <div class="md-3">
                        <label class="form-label" for="penerbit">Penerbit </label>
                        <input class="form-control" type="text" name="penerbit" id="penerbit" value='<?=@$buku['penerbit']?>'>
                    </div>
                        
                    <div class="md-3">
                        <label class="form-label" for="tahun">Tahun </label>
                        <input class="form-control" type="number" name="tahun" id="tahun" value="<?=@$buku['tahun']?>">
                    </div>
                        
                    <div class="md-3">
                        <label class="form-label" for="keterangan">Keterangan </label>
                        <input class="form-control" type="text" name="keterangan" id="keterangan" value="<?=@$buku['keterangan']?>">
                    </div>
                        
                    <div class="md-3">
                        <input type="hidden" name="id_buku" value="<?=@$buku['id_buku']?>">
                    </div> 
                    
                    <button class="btn btn-primary mt-3" type="submit">Simpan</button>
            </form>
        </div>
    </div>
</div>

<?php include 'footer.php'; ?>
