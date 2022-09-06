<?php
require 'vendor/autoload.php';

$namespace = 'http://' . $_SERVER['SERVER_NAME'] . $_SERVER['REQUEST_URI'];
$namespace = str_replace('client.php','server.php', $namespace);
$client = new nusoap_client($namespace);

$response = $client->call('get_intro', array(
    'name' => 'Jozka'
));
echo $response;

echo '<br>';
$response = $client->call('get_barang_tersedia', array(
    'category' => 'basic',
    'name' => 'Jozka'
));
echo $response;

echo '<br>';
echo '<br>';
$response = $client->call('get_barang_coming_soon', array(
    'category' => 'basic',
    'name' => 'Jozka'
));
echo $response;

echo '<br>';
$data = array(
    'ID' => '1',
    'first_name' => 'Jozka Roihutan',
    'last_name' => 'Siregar',
    'birthdate' => '2002-05-21',
);
$response = $client->call('reformat_data', array(
    'pelanggan' => $data
));
echo '<pre>';
print_r($response);
echo '</pre>';