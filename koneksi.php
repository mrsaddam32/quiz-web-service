<?php

$conn = mysqli_connect('localhost', 'root', '', 'quiz_uts');
if (!$conn) {
    die("Koneksi tidak berhasil" . mysqli_connect_error());
}
