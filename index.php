<?php
echo 'Hello World';
// require_once __DIR__ . '/vendor/autoload.php';

/* use LukeTowers\ShopifyPHP\Shopify; */
/* use LukeTowers\ShopifyPHP\Shopify;

$api = new Shopify($data['shop'], [
    'api_key' => 'f20f59485693b3a175c8780cc53f3389',
    'secret'  => 'e4f50dcf24ba4cc2350363a38123a446',
]); */

$api_url = 'https://f20f59485693b3a175c8780cc53f3389:e4f50dcf24ba4cc2350363a38123a446@johnlewisdesign.myshopify.com';

$shop_obj_url = $api_url . '/admin/shop.json';

$shop_content = @file_get_contents( $shop_obj_url );

$shop_json = json_decode( $shop_content, true );

$shop = $shop_json['shop'];

// Initialize the client
// $api = new Shopify('johnlewisdesign.myshopify.com', '9231e1fc15d891789531973f76b282f1');

 // $apiKey = "f20f59485693b3a175c8780cc53f3389";
 // $pwd = "e4f50dcf24ba4cc2350363a38123a446";
 //
 // $baseUrl = "https://".$apiKey .":". $pwd ."johnlewisdesign.myshopify.com";
 //
 // $storedToken = '9231e1fc15d891789531973f76b282f1'; // Retrieve the stored token for the shop in question
 // $api = new Shopify(' . $baseUrl .', $storedToken);



// $storedToken = ''; // Retrieve the stored token for the shop in question
// Get the products with ids of '632910392' and '921728736' with only the 'id', 'images', and 'title' fields
// $result = $api->call('GET', '/admin/customers.json');


// $result = $api->call('GET', '/admin/api/2019-07/orders.json');
 echo 'Email is:' . $shop['email']; ?>
<?php
// $result = $api->call('GET', 'johnlewisdesign.myshopify.com/admin/api/2019-04/customers.json', [
//     'ids' => '632910392,921728736',
//    'fields' => 'id,images,title',
// ]);
var_dump($result);

// Create a new "Burton Custom Freestyle 151" product
// $result = $api->call('POST', 'admin/products.json', [
//     'product' => [
//         "title"        => "Burton Custom Freestyle 151",
//         "body_html"    => "<strong>Good snowboard!</strong>",
//         "vendor"       => "Burton",
//         "product_type" => "Snowboard",
//         "tags"         => 'Barnes & Noble, John's Fav, "Big Air"',
//     ],
// ]);
?>
