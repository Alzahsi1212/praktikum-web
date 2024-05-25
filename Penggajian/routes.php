<?php
if (isset($_GET["page"])) {
    $page = $_GET["page"];
} else {
    $page = "";
}

switch ($page) {
    case "":
    case "dashboard":
        include "pages/dashboard.php";
        break;
    case "bagian":
        include "pages/bagian.php";
        break;
    case "tambah":
        include "pages/tambah.php";
        break;
    case "hapus":
        include "pages/hapus.php";
        break;
    case "ubah":
        include "pages/ubah.php";
        break;
    case "karyawan":
        include "karyawan/karyawan.php";
        break;
    case "tambahkaryawan":
        include "karyawan/tambahkaryawan.php";
        break;
    case "hapuskaryawan":
        include "karyawan/hapuskaryawan.php";
        break;   
    case "editkaryawan":
        include "karyawan/editkaryawan.php";
        break;
    default:
        include "pages/404.php";
        break;
}
?>
