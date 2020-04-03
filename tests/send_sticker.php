<?php
/**
 * Created by PhpStorm.
 * User: Ekk
 * Date: 03-Apr-20
 * Time: 10:32 AM
 */

require_once '../vendor/autoload.php';

use Ekkalak\Line\LineNotify;

$token = 'YOUR-TOKEN-HERE';

$notify = new LineNotify($token);

$response = $notify->sendSticker(2, 160);

var_dump($response);