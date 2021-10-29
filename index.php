<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Data donasi</title>
</head>

<body>
    <h1 style="text-align: center;">Daftar Donasi</h1>
    <br>
    <table width="100%" border="1">
        <tr>
            <td><b>No</b></td>
            <td><b>Nama</b></td>
            <td><b>Email</b></td>
            <td><b>Nomor Telepon</b></td>
            <td><b>Donasi</b></td>
        </tr>
        <?php

        // Setup cURL
        $curl = curl_init();
        curl_setopt_array($curl, [
            CURLOPT_URL => 'http://localhost:8080/quiz-web-service/quiz_uts.php?function=get_donasi',
            CURLOPT_RETURNTRANSFER => true,
            CURLOPT_ENCODING => '',
            CURLOPT_MAXREDIRS => 10,
            CURLOPT_TIMEOUT => 0,
            CURLOPT_FOLLOWLOCATION => true,
            CURLOPT_HTTP_VERSION => CURL_HTTP_VERSION_1_1,
            CURLOPT_CUSTOMREQUEST => 'GET',
        ]);

        $response = json_decode(curl_exec($curl), true);
        curl_close($curl);

        $i = 1;
        foreach ($response['data'] as $data) {
            echo "
            <tr>
                <td>" . $i++ . "</td>
                <td>" . $data['nama'] . "</td>
                <td>" . $data['email'] . "</td>
                <td>" . $data['telp'] . "</td>
                <td>" . $data['donasi'] . "</td>
            </tr>
            ";
        }
        ?>
    </table>
</body>

</html>