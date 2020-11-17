<?php

  require_once __DIR__ . '/vendor/autoload.php';

  use LukeTowers\ShopifyPHP\Shopify;

  function check_authorization_attempt()
  {
      $data = $_GET;

      $api = new Shopify($data['shop'], [
      'api_key' => 'yourkey',
      'secret'  => 'yoursecret',
      ]);

      $storedAttempt = null;
      $attempts = json_decode(file_get_contents('authattempts.json'));
      foreach ($attempts as $attempt) {
          if ($attempt->shop === $data['shop']) {
              $storedAttempt = $attempt;
              break;
          }
      }

      return $api->authorizeApplication($storedAttempt->nonce, $data);
  }

  $response = check_authorization_attempt();
  if ($response) {
      // Store the access token for later use
      $response->access_token;
  }
