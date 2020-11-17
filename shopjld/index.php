<?php
echo '<style>
  body {
    font-family: -apple-system,BlinkMacSystemFont,San Francisco,Roboto,Segoe UI,Helvetica Neue,sans-serif;
    color: #212b36;
  }
    table {
    background-color: #fff;
    padding: 10px;
  }
  table.lineitems {
    border: 1px solid #ccc;
  }
  td {
    padding: 10px;
  }
  tr:nth-child(even) {
  background-color: #f2f2f2
  }
</style>';// require_once __DIR__ . '/vendor/autoload.php';

/* use LukeTowers\ShopifyPHP\Shopify; */
/* use LukeTowers\ShopifyPHP\Shopify;

$api = new Shopify($data['shop'], [
    'api_key' => 'f20f59485693b3a175c8780cc53f3389',
    'secret'  => 'e4f50dcf24ba4cc2350363a38123a446',
]); */

// SHOP DETAILS
$api_url = 'https://privatekey:secret@yoursite.myshopify.com';
$shop_obj_url = $api_url . '/admin/shop.json';
$shop_content = @file_get_contents( $shop_obj_url );
$shop_json = json_decode( $shop_content, true );
$shop = $shop_json['shop'];
// print_r($shop_content);

echo '<h2>Shop setup</h2>
<h4>Shop ID: ';
echo $shop['id'];
echo '</h4>
<h4>Shop Name: ';
echo $shop['name'];
echo '</h4>
<h4>Contact Email: ';
echo $shop['email'];
echo '</h4>
<h4>Shop Domain: ';
echo $shop['domain'];
echo '</h4>
<h4>Country Code: ';
echo $shop['country_code'];
echo '</h4>';



// CUSTOMER DETAILS
$cust_obj_url = $api_url . '/admin/customers.json';
$cust_content = @file_get_contents( $cust_obj_url );
$cust_json = json_decode( $cust_content, true );
$customers = $cust_json['customers'];

echo '<h2>Customers</h2>';
echo '<table width="100%">';
echo '<thead>';
echo '<td>ID</td><td>First Name</td><td>Last Name</td><td>Email</td><td>Orders</td><td>Active</td><td>Total Spend</td><td>Phone</td><td>Notes</td>';
echo '</thead>';
foreach ($customers as $customer) {
  echo '<tr>';
    echo '<td>' . $customer['id'] . '</td>';
    echo '<td>' . $customer['first_name'] . '</td>';
    echo '<td>' . $customer['last_name'] . '</td>';
    echo '<td>' . $customer['email'] . '</td>';
    echo '<td>' . $customer['orders_count'] . '</td>';
    echo '<td>' . $customer['state'] . '</td>';
    echo '<td>' . $customer['total_spent'] . '</td>';
    echo '<td>' . $customer['phone'] . '</td>';
    echo '<td>' . $customer['notes'] . '</td>';
  echo '</tr>';
}
echo '</table>';


// ORDER DETAILS
$ord_obj_url = $api_url . '/admin/orders.json';
$ord_content = @file_get_contents( $ord_obj_url );
$ord_json = json_decode( $ord_content, true );
$orders = $ord_json['orders'];

echo '<h2>Orders</h2>';
echo '<table width="100%">';
echo '<thead>';
echo '<td>ID</td><td>Order #</td><td>Created</td><td>Email</td><td>Total</td><td>Tax</td><td>Line Items Total</td><td>Phone</td><td>Notes</td>';
echo '</thead>';
foreach ($orders as $order) {
  echo '<tr>';
    echo '<td>' . $order['id'] . '</td>';
    echo '<td>' . $order['number'] . '</td>';
    echo '<td>' . $order['created_at'] . '</td>';
    echo '<td>' . $order['email'] . '</td>';
    echo '<td>' . $order['total_price'] . '</td>';
    echo '<td>' . $order['total_tax'] . '</td>';
    echo '<td>' . $order['total_line_items_price'] . '</td>';
    echo '<td>' . $order['phone'] . '</td>';
    echo '<td>' . $order['notes'] . '</td>';
  echo '</tr>';
  $orderlines = $order['line_items'];
  echo '<table width="100%" class="lineitems">';
  echo '<thead>';
  echo '<td>Qty</td><td>Title</td><td>SKU</td><td>Price</td><td>Tax amount</td><td>Tax Rate</td>';
  echo '</thead>';
  foreach ($orderlines as $lineitem) {
    echo '<tr>';
      echo '<td>' . $lineitem['quantity'] . '</td>';
      echo '<td>' . $lineitem['title'] . '</td>';
      echo '<td>' . $lineitem['sku'] . '</td>';
      echo '<td>' . $lineitem['price'] . '</td>';
      echo '<td>' . $lineitem['tax_lines']['price'] . '</td>';
      echo '<td>' . $lineitem['tax_lines']['rate'] . '</td>';
      echo '</tr>';
}
echo '</table>';

  // var_dump($orderlines);
  echo '</table>';
}

?>
<?php
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

 // $result = $api->call('GET', 'johnlewisdesign.myshopify.com/admin/api/2019-04/customers.json', [
//     'ids' => '632910392,921728736',
//    'fields' => 'id,images,title',
// ]);

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
