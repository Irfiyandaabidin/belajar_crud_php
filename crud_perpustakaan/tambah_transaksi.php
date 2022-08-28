<?php 
include 'header.php'; 
include 'koneksi.php'
?>

<div class="container">
    <div class="row">
        <h1 class="text-center my-3">Tambah Data Transaksi</h1>
        <?php
        if (@$_GET['id_transaksi']) {
            $id_transaksi = $_GET['id_transaksi'];

            include 'koneksi.php';
        }
        ?>

        <div class="col-md-6 offset-3">
            <form action="simpan_transaksi.php" method="post">
                <div class="md-3">
                    <label class="form-label" for="id_anggota">ID Anggota</label>
                        <select name="id_anggota" id="id_anggota" class="form-control">
                            <option>
                                <?php
                                $query = mysqli_query($koneksi, 'SELECT * FROM transaksi
                                RIGHT JOIN anggota
                                ON transaksi.id_anggota = anggota.id_anggota'
                                );
                                while ($transaksi = mysqli_fetch_array($query)) {
                                ?>
                                    <option value="<?=$transaksi['id_anggota']?>"><?=$transaksi['id_anggota']?></option>
                                <?php
                                }
                                ?>
                            </option>
                        </select>
                </div>
                        
                <div class="md-3">
                    <label class="form-label" for="kode_buku">ID Buku</label>
                        <select name="id_buku" id="id_buku" class="form-control">
                            <option>
                                <?php
                                $query = mysqli_query($koneksi, 'SELECT * FROM transaksi
                                RIGHT JOIN buku
                                ON transaksi.id_buku = buku.id_buku');
                                while ($transaksi = mysqli_fetch_array($query)) {
                                ?>
                                    <option value="<?=$transaksi['id_buku']?>"><?=$transaksi['id_buku']?></option>
                                <?php
                                }
                                ?>
                            </option>
                        </select>
                </div>
                        
                <div class="md-3">
                    <label class="form-label" for="tanggal_kembali">Tanggal Kembali</label> 
                    <input class="form-control" type="date" name="tanggal_kembali" id="tanggal_kembali" value='<?=@$transaksi['tanggal_kembali']?>'>
                </div>            
                    
                <div class="md-3">
                    <label class="form-label" for="tanggal_kembali_asli">Tanggal Kembali Asli</label>    
                    <input class="form-control" type="date" name="tanggal_kembali_asli" id="tanggal_kembali_asli" value='<?=@$transaksi['tanggal_kembali_asli']?>'>
                </div>
                    
                <div class="md-3">
                    <label class="form-label" for="tanggal_pinjam">Tangal Pinjam </label>    
                    <input class="form-control" type="date" name="tanggal_pinjam" id="tanggal_pinjam" value='<?=@$transaksi['tanggal_pinjam']?>'>                
                </div>
                        
                <div class="md-3">
                    <input class="form-control" type="hidden" name="id_transaksi" value="<?=@$transaksi['id_transaksi']?>">
                </div>  
                    <button class="btn btn-primary mt-3" type="submit">Simpan</button>    
            </form> 
        </div>
        
    </div>
</div>

<?php include 'footer.php'; ?>
