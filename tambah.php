<?php

if (isset($_POST['tambahdata'])) {
    $curlDataPost = [
        'id' => '',
        'nama' => $_POST['nama'],
        'email' => $_POST['email'],
        'telp' => $_POST['telp'],
        'donasi' => $_POST['donasi'],
        'token' => ''
    ];

    // Inisialisasi cURL
    $curl = curl_init('http://localhost:8080/quiz-web-service/quiz_uts.php?function=insert_donasi');
    curl_setopt($curl, CURLOPT_RETURNTRANSFER, true);
    curl_setopt($curl, CURLOPT_POST, true);
    curl_setopt($curl, CURLOPT_POSTFIELDS, $curlDataPost);
    $CurlResponse = curl_exec($curl);
    $curlResponseJSON = json_decode($CurlResponse, true);
    curl_close($curl);
    echo $curlResponseJSON['message'] . "<br><a href='tambah.php'>Ingin menambah donasi kembali ?</a>";
    exit();
}

?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Form tambah data donasi</title>
    <style>
        form {
            max-width: 600px;
            margin: 0 auto;
            padding: 20px 40px;
        }

        label {
            display: block;
            margin-bottom: 25px;
            text-transform: uppercase;
        }

        input {
            margin-top: 10px;
            height: 8px;
            width: 100%;
            padding: 15px;
        }

        button {
            width: 100%;
            height: 35px;
            border-radius: 5px;
            cursor: pointer;
        }
    </style>
</head>

<body>
    <form action="" method="POST">
        <label for="nama"><b>Nama : </b>
            <input type="text" name="nama" required>
        </label>
        <br>
        <label for="email"><b>Email : </b>
            <input type="email" name="email" required>
        </label>
        <br>
        <label for="telp"><b>No Telepon : </b>
            <input type="number" name="telp" required>
        </label>
        <br>
        <label for="donasi"><b>Donasi : </b>
            <input type="text" name="donasi" required>
        </label>
        <button type="submit" name="tambahdata">Tambah Data</button>
    </form>
</body>

</html>