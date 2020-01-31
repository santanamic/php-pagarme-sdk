<?php

ini_set('xdebug.var_display_max_depth', '10');
ini_set('xdebug.var_display_max_children', '256');
ini_set('xdebug.var_display_max_data', '1024');

require_once('../vendor/autoload.php');

$pagarme = new PagarMe\Client(
    'ak_test_TudwDN44zu9K9ukIh4Hw8Eol38FnKP'
);


try {
    $transaction = $pagarme->transactions()->create([
		'amount' => 1000,
		'payment_method' => 'credit_card',
		'card_holder_name' => 'Anakin Skywalker',
		'card_cvv' => '123',
		'card_number' => '4242424242424242',
		'card_expiration_date' => '1220',
		'customer' => [
			'external_id' => '1',
			'name' => 'Nome do cliente',
			'type' => 'individual',
			'country' => 'br',
			'documents' => [
			  [
				'type' => 'cpf',
				'number' => '00000000000'
			  ]
			],
			'phone_numbers' => [ '+551199999999' ],
			'email' => 'cliente@email.com'
		],
		'billing' => [
			'name' => 'Nome do pagador',
			'address' => [
			  'country' => 'br',
			  'street' => 'Avenida Brigadeiro Faria Lima',
			  'street_number' => '1811',
			  'state' => 'sp',
			  'city' => 'Sao Paulo',
			  'neighborhood' => 'Jardim Paulistano',
			  'zipcode' => '01451001'
			]
		],
		'shipping' => [
			'name' => 'Nome de quem receberá o produto',
			'fee' => 1020,
			'delivery_date' => '2018-09-22',
			'expedited' => false,
			'address' => [
			  'country' => 'br',
			  'street' => 'Avenida Brigadeiro Faria Lima',
			  'street_number' => '1811',
			  'state' => 'sp',
			  'city' => 'Sao Paulo',
			  'neighborhood' => 'Jardim Paulistano',
			  'zipcode' => '01451001'
			]
		],
		'items' => [
			[
			  'id' => '1',
			  'title' => 'R2D2',
			  'unit_price' => 300,
			  'quantity' => 1,
			  'tangible' => true
			],
			[
			  'id' => '2',
			  'title' => 'C-3PO',
			  'unit_price' => 700,
			  'quantity' => 1,
			  'tangible' => true
			]
		]
	]);
	
	var_dump($transaction);

} catch (Exception $e) {
    var_dump($e);
    echo 'Exception when calling Order request->run: ', $e->getMessage(), PHP_EOL;
}
