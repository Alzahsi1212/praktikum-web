<div id="top" class="row mb-3">
    <div class="col">
        <h3>Penggajian</h3>
    </div>
    <div class="col">
        <a href="?page=pilihkaryawan" class="btn btn-success float-end">
            <i class="fa fa-plus-circle"></i> Tambah
        </a>
    </div>
    <div class="col">
        <a href="?page=blnthngaji" class="btn btn-primary float-end">
            <i class="fa fa-arrow-circle-left"></i> Kembali
        </a>
    </div>
</div>

<div id="content" class="row mb-3">
    <div class="col">
        <?php
        include "database/conn.php"; 

        $bulan = isset($_GET['bulan']) ? $_GET['bulan'] : 'Semua';
        $tahun = isset($_GET['tahun']) ? $_GET['tahun'] : 'Semua';

        $select_sql = "";

        if ($bulan == "Semua") {
            if ($tahun == "Semua") {
                $select_sql = "SELECT P.*, K.nama FROM penggajian P LEFT JOIN karyawan K ON P.karyawan_nik = K.nik";
            } else {
                $select_sql = "SELECT P.*, K.nama FROM penggajian P LEFT JOIN karyawan K ON P.karyawan_nik = K.nik WHERE tahun = '$tahun'";
            }
        } else {
            if ($tahun == "Semua") {
                $select_sql = "SELECT P.*, K.nama FROM penggajian P LEFT JOIN karyawan K ON P.karyawan_nik = K.nik WHERE bulan = '$bulan'";
            } else {
                $select_sql = "SELECT P.*, K.nama FROM penggajian P LEFT JOIN karyawan K ON P.karyawan_nik = K.nik WHERE tahun = '$tahun' AND bulan = '$bulan'";
            }
        }

        $result = mysqli_query($conn, $select_sql);
        if (!$result) {
        ?>
            <div class="alert alert-danger" role="alert">
                <?php echo mysqli_error($conn); ?>
            </div>
        <?php
            return;
        }

        if (mysqli_num_rows($result) == 0) {
        ?>
            <div class="alert alert-light" role="alert">Data kosong</div>
        <?php
            return;
        }
        ?>
        <table class="table bg-white rounded shadow-sm table-hover">
            <thead>
                <tr>
                    <th scope="col">NIK</th>
                    <th scope="col">Nama</th>
                    <th scope="col">Bulan</th>
                    <th scope="col">Tahun</th>
                    <th class="text-end" scope="col">Gaji Dibayar</th>
                    <th scope="col" width="200">Opsi</th>
                </tr>
            </thead>
            <tbody>
                <?php
                while ($row = mysqli_fetch_assoc($result)) {
                ?>
                <tr class="align-middle">
                    <th scope="row"><?php echo $row["karyawan_nik"] ?></th>
                    <td><?php echo $row["nama"] ?></td>
                    <td><?php echo $row["bulan"] ?></td>
                    <td><?php echo $row["tahun"] ?></td>
                    <td class="text-end"><?php echo number_format($row["gaji_bayar"]) ?></td>
                    <td>
                        <a href="?page=hapusgaji&id=<?= $row["id"] ?>&bulan=<?= $bulan ?>&tahun=<?= $tahun ?>" onclick="return confirm('Konfirmasi data akan dihapus?');" class="btn btn-danger">
                            <i class="fa fa-trash"></i> Hapus
                        </a>
                    </td>
                </tr>
                <?php
                }
                ?>
            </tbody>
        </table>
    </div>
</div>
