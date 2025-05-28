<?php

// $mahasiswa = [
//     [
//         "nama" => "Muzella Sabilla",
//         "nim" => "2217020080",
//         "email" => "muzellasabilla@gmail.com"
//     ],
//     [
//         "nama" => "Risma",
//         "nim" => "2217020090",
//         "email" => "risma@gmail.com"
//     ]
// ];

$dbh = new PDO('mysql:host=localhost;dbname=universitas','root','');
$db = $dbh->prepare('SELECT * FROM mahasiswa');
$db->execute();
$mahasiswa = $db->fetchAll(PDO::FETCH_ASSOC);



$data = json_encode($mahasiswa);
echo $data;


?>