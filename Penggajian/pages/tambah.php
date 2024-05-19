<?php
include "database/conn.php";
?>
<div id="top" class="row mb-3">
    <div class="col">
        <h3>Tambah Data Bagian</h3>
    </div>
    <div class="col">
        <a href="?page=bagian" class="btn btn-primary float-end">
            <i class="fa fa-arrow-circle-left"></i>
            Kembali
        </a>
    </div>
</div>
<div id="pesan" class="row mb-3">
    <div class="col">
        <?php
        if(isset($_POST["simpan_btn"])){
            $nama = $_POST["nama"];
            $dobel = false;
            $checking = "SELECT * FROM bagian WHERE nama='$nama'";
            $resultcek = mysqli_query($conn, $checking);
            if(mysqli_num_rows($resultcek) > 0){
                $dobel=true;
            }
            if ($dobel){
        ?>
            <div class="alert alert-danger" role="alert">
            <i class="fa fa-exclamation-circle"></i>
            Nama bagian sudah ada.
            </div>
            <?php
            } else {
            $insertSQL = "INSERT INTO bagian SET nama='$nama'";
            $result = mysqli_query($conn, $insertSQL);
            if (!$result){
            ?>
                <div class="alert alert-danger" role="alert">
                    <i class="fa fa-exclamation-circle"></i>
                    <?php echo mysqli_error($conn) ?>
                </div>
            <?php
            } else {
             ?>
            <div class="alert alert-success" role="alert">
                <i class="fa fa-check-circle"></i>
                Data Tersimpan
            </div>
        <?php
            }
        }
    }
        ?>
    </div>
</div>
<div id="input" class="row mb-3">
    <div class="col">
        <div class="card px-3 py-3">
            <form action="" method="post">
            <div class="mb-3">
                <label for="nama" class="form-label">Nama Bagian</label>
                <input type="text" class="form-control" id="nama" name="nama" placeholder="misal: Teknisi" required>
            </div>
            <div class="col mb-3">
                <button class="btn btn-success" type="submit" name="simpan_btn">
                    <i class="fas fa-save"></i>
                    Simpan
                </button>
            </div>
            </form>
        </div>
    </div>
</div>
<script>
    if (window.history.replaceState){
        window.history.replaceState(null, null, window.location.href);
    }
</script>