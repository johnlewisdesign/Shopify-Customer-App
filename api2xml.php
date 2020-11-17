<?php

require_once __DIR__ . '/vendor/autoload.php';

/* use LukeTowers\ShopifyPHP\Shopify; */
use LukeTowers\ShopifyPHP\Shopify;

// Initialize the client
// $api = new Shopify('yoursite.myshopify.com/admin/api/2019-04/customers.json', 'mysupersecrettoken');

 $apiKey = "yourapikey";
 $pwd = "yourapisecret";

 $baseUrl = "https://".$apiKey .":". $pwd ."yoursite.myshopify.com";

 $storedToken = ''; // Retrieve the stored token for the shop in question
 $api = new Shopify(' . $baseUrl .', $storedToken);



// $storedToken = ''; // Retrieve the stored token for the shop in question
// Get the products with ids of '632910392' and '921728736' with only the 'id', 'images', and 'title' fields
 $result = $api->call('GET', '/admin/api/2019-04/customers.json', '');
// $result = $api->call('GET', 'yoursite.myshopify.com/admin/api/2019-04/customers.json', [
//     'ids' => '632910392,921728736',
//    'fields' => 'id,images,title',
// ]);
echo $result;



?>
