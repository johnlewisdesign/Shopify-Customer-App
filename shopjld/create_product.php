<?

	session_start();

	require __DIR__.'/vendor/autoload.php';
	use phpish\shopify;

	require __DIR__.'/conf.php';

	$shopify = shopify\client(SHOPIFY_SHOP, SHOPIFY_APP_API_KEY, SHOPIFY_APP_PASSWORD, true);

	try
	{
		# Making an API request can throw an exception
		$product = $shopify('POST /admin/products.json', array(), array
		(
			'product' => array
			(

				"title" => "Useful thing",
				"body_html" => "<strong>Trust me, everyone needs at least two of these!</strong>",
				"vendor" => "Johnlewis",
				"product_type" => "gadget",
				"variants" => array
				(
					array
					(
						"option1" => "First",
						"price" => "10.00",
						"sku" => 123,
					),
					array (
						"option1" => "Second",
						"price" => "20.00",
						"sku" => "123"
					),
					"tags" => 'Useful stuff, Top gifts, "HOT GADGET"'
				)
			)
		));

		print_r($product);
	}
	catch (shopify\ApiException $e)
	{
		# HTTP status code was >= 400 or response contained the key 'errors'
		echo $e;
		print_R($e->getRequest());
		print_R($e->getResponse());
	}
	catch (shopify\CurlException $e)
	{
		# cURL error
		echo $e;
		print_R($e->getRequest());
		print_R($e->getResponse());
	}

?>
