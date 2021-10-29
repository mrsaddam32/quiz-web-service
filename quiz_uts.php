<?php

require_once "koneksi.php";

if (function_exists($_GET['function'])) {
    $_GET['function']();
}

function get_donasi()
{
    global $conn;
    $query = $conn->query("SELECT * FROM transaction_donasi");
    while ($row = mysqli_fetch_object($query)) {
        $data[] = $row;
    }

    $response = [
        'status' => 1,
        'message' => 'Success',
        'data' => $data
    ];

    header('Content-Type: application/json');
    echo json_encode($response);
}

function insert_donasi()
{
    global $conn;
    $string = "0123456789abcdefghijklmnopqrstuvwxyzABCDEFGHIJKLMNOPQRSTUVWXYZ";
    $token = generate_token($string, 8);
    $check = [
        'id' => '',
        'nama' => '',
        'email' => '',
        'telp' => '',
        'donasi' => '',
        'token' => ''
    ];
    $check_match = count(array_intersect_key($_POST, $check));

    if ($check_match == count($check)) {
        $result = mysqli_query($conn, "INSERT INTO transaction_donasi SET id = '$_POST[id]', nama = '$_POST[nama]', email = '$_POST[email]',telp = '$_POST[telp]', donasi = '$_POST[donasi]', token = '$token'");

        if ($result) {
            $response = [
                'status' => 1,
                'message' => 'Insert Success'
            ];
        } else {
            $response = [
                'status' => 0,
                'message' => 'Insert Failed'
            ];
        }
    } else {
        $response = [
            'status' => 0,
            'message' => 'Wrong Parameter'
        ];
    }

    header('Content-Type: application/json');
    echo json_encode($response);
}

function generate_token($input, $strength = 16)
{
    $input_length = strlen($input);
    $random_string = '';
    for ($i = 0; $i < $strength; $i++) {
        $random_character = $input[mt_rand(0, $input_length - 1)];
        $random_string .= $random_character;
    }

    return $random_string;
}
