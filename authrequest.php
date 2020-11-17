<?php

require_once __DIR__ . '/vendor/autoload.php';

use LukeTowers\ShopifyPHP\Shopify;

function make_authorization_attempt($shop, $scopes)
{
    $api = new Shopify($shop, [
        'api_key' => 'yourkeyhere',
        'secret'  => 'yoursecrethere',
    ]);

    $nonce = bin2hex(random_bytes(10));

    // Store a record of the shop attempting to authenticate and the nonce provided
    $storedAttempts = file_get_contents('authattempts.json');
    $storedAttempts = $storedAttempts ? json_decode($storedAttempts) : [];
    $storedAttempts[] = ['shop' => $shop, 'nonce' => $nonce, 'scopes' => $scopes];
    file_put_contents('authattempts.json', json_encode($storedAttempts));

    return $api->getAuthorizeUrl($scopes, 'yoursite.myshopify.com/admin/auth/shopify/callback', $nonce);
}

header('Location: ' . make_authorization_attempt('yoursite.myshopify.com', ['read_customers']));
die();
?>
