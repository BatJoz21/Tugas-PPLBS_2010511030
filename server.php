<?php
require 'vendor/autoload.php';
$server = new soap_server();

$namespace = 'http://' . $_SERVER['SERVER_NAME'] . $_SERVER['REQUEST_URI'];
$server->configureWSDL('Daftar Barang Toko BatJoz21');
$server->wsdl->schemaTargetNamespace = $namespace;

// $server->wsdl->addComplexType(
//     'medicalpatient',
//     'complexType',
//     'struct',
//     'all',
//     '',
//     array(
//         'ID' => array('name' => 'ID', 'type' => 'xsd:string'),
//         'first_name' => array('name' => 'first_name', 'type' => 'xsd:string'),
//         'last_name' => array('name' => 'last_name', 'type' => 'xsd:string'),
//         'birthdate' => array('name' => 'birthdate', 'type' => 'xsd:date'),
//         'age' => array('name' => 'age', 'type' => 'xsd:number_format'),
//     ));

function get_intro($name) {
    return "Hello, welcome $name, nice to meet you !!!";
}

$server->register('get_intro',
    array('name' => 'xsd:string'),
    array('return' => 'xsd:string'),
    $namespace,
    false,
    'rpc',
    'encoded',
    'Metode Hello World Sederhana'
);

function get_barang_tersedia($category) {
    if($category == 'basic') {
        $barangtersedia = join(', ', array(
            "glove boxing 8oz", "handwrap boxing 3.5m", "kaos olahraga", "sepatu boxing", "head gear", "celana olahraga"
        ));
        return "Barang yang tersedia adalah: $barangtersedia";
    }
    else {
        return 'Barang Kosong !!!';
    }
}

$server->register('get_barang_tersedia',
    array(
        'category' => 'xsd:string',
    ),
    array('return' => 'xsd:string'),
    $namespace,
    false,
    'rpc',
    'encoded',
    'Metode Get Barang Sederhana'
);

function get_barang_coming_soon($category) {
    if($category == 'basic') {
        $barangtersedia = join(', ', array(
            "glove boxing 12oz", "gum shield", "shin guard", "mma gloves"
        ));
        return "Barang yang akan datang adalah: $barangtersedia";
    }
    else {
        return 'Tidak barang yang akan datang !!!';
    }
}

$server->register('get_barang_coming_soon',
    array(
        'category' => 'xsd:string',
    ),
    array('return' => 'xsd:string'),
    $namespace,
    false,
    'rpc',
    'encoded',
    'Metode Get Barang Sederhana'
);

function reformat_data($medicalpatient) {
    $pelanggan['ID'] = 'KODE: ' . $pelanggan['ID'];
    $pelanggan['first_name'] = 'Mr. ' . $pelanggan['first_name'];
    $pelanggan['age'] = date('Y-m-d') - $pelanggan['birthdate'];

    return $pelanggan;
}

$server->register('reformat_data',
    array('pelanggan' => 'tns:pelanggan'),
    array('return' => 'tns:pelanggan'),
    $namespace,
    false,
    'rpc',
    'encoded',
    'Metode mengubah data pelanggan'
);

$server->service(file_get_contents("php://input"));
exit();