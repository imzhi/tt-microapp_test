<?php

require_once 'vendor/autoload.php';

use Qbhy\TtMicroApp\Factory;

$appConfig = [
    'access_key' => 'access_key',
    'secret_key' => 'secret_key',
    'payment_merchant_id' => 'payment_merchant_id',
    'payment_salt' => 'payment_salt',
    'payment_token' => 'payment_token',
    // 'payment_app_id' => 'your payment_app_id',
    // 'payment_secret' => 'your payment_secret',
];
$factoryConfig = [
    'debug' => false,
    'default' => 'default',
    'drivers' => [
        'default' => $appConfig,
    ],
];
$factory = new Factory($factoryConfig);

$tt_app = $factory->make('default');

$result_order = $tt_app->payment->createOrder(
    [
        'out_order_no' => uniqid(),
        'total_amount' => 1000,
        'subject' => '优惠券购买',
        'body' => '优惠券购买',
        'valid_time' => 60 * 24,
        // 'notify_url' => '',
    ]
);
var_dump($result_order);

$json = '{"timestamp":"1627462474","nonce":"6896","msg":"{\"appid\":\"ttce54b8e9516ce4c001\",\"cp_orderno\":\"BYTE80202107281650174688507\",\"cp_extra\":\"\",\"way\":\"1\",\"channel_no\":\"\",\"channel_gateway_no\":\"12107280136050107907\",\"payment_order_no\":\"4323201116202107286393392940\",\"out_channel_order_no\":\"\",\"total_amount\":1,\"status\":\"SUCCESS\",\"seller_uid\":\"69865741767273372460\",\"extra\":\"null\",\"item_id\":\"\"}","msg_signature":"5d030fbbf38dff872cef7e3312de4b263db6323f","type":"payment"}';
$input_arr = json_decode($json, true);
$sign_res = $tt_app->payment->signCallback($input_arr);
var_dump($sign_res);
