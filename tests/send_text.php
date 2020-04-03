<?php
/**
 * Created by PhpStorm.
 * User: Ekk
 * Date: 03-Apr-20
 * Time: 8:54 AM
 */

require_once '../vendor/autoload.php';

use Ekkalak\Line\LineNotify;

$token = 'YOUR-TOKEN-HERE';

$notify = new LineNotify($token);

$response = $notify->sendText("Hello test");

var_dump($response);