<?php

include('koneksi.php');
if ($_GET['aksi'] == 'input') {
    $judul = $_POST['judul'];
    $keterangan = $_POST['keterangan'];
    if ($judul != null and $keterangan != null) {
        $sql_input = "INSERT INTO `sejarah` (`id`, `judul`, `keterangan`) VALUES "
                . "(NULL, '$judul', '$keterangan')";
        $simpan_input = mysql_query($sql_input);
        if ($simpan_input) {
            header("location:index.php?page=sejarah");
        } else {
            echo "<script>alert('Gagal di tambahkan!');history.go(-1);</script>";
        }
    } else {
        echo "<script>alert('Tidak Boleh Ada yang kosong!');history.go(-1);</script>";
    }
} else if ($_GET['aksi'] == 'edit') {
    $judul = $_POST['judul'];
    $keterangan = $_POST['keterangan'];
    $id = $_GET['id'];
    if ($judul != null and $keterangan != null) {
        $sql_edit = "UPDATE sejarah SET judul = '$judul',keterangan='$keterangan' WHERE id = '$id' ";
        $edit = mysql_query($sql_edit);
        if ($edit) {
            header("location:index.php?page=sejarah");
        } else {
            echo "<script>alert('Gagal di edit!');history.go(-1);</script>";
        }
    } else {
        echo "<script>alert('Tidak Boleh Ada Yang Kosong!');history.go(-1);</script>";
    }
} else if ($_GET['aksi'] == 'hapus') {
    $sql_hapus = "DELETE FROM sejarah WHERE id = '$_GET[id]'";
    if (mysql_query($sql_hapus)) {
        header("location:index.php?page=sejarah");
    } else {
        echo "Error deleting record: " . mysqli_error($koneksi);
    }
}