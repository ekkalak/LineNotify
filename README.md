# Line Notify
Sending messages to LINE Notify with PHP.

## Requirement

- Line Token https://notify-bot.line.me/en/
- PHP
- Composer
- Guzzle Client

## Install
``` composer require ekkalak/line-notify```

## Usage

```php
<?php 

require_once '../vendor/autoload.php';

use Ekkalak\Line\LineNotify;

$notify = new LineNotify('YOUR-TOKEN-HERE');

// Send text
$response = $notify->sendText($text);

// i.e.
$response = $notify->sendText("Hello test");

// Send sticker
// Sticker List:
// https://devdocs.line.me/files/sticker_list.pdf
// https://developers.line.biz/media/messaging-api/sticker_list.pdf
$response = $notify->sendSticker($stickerPackageId, $stickerId);

// i.e.
$response = $notify->sendSticker(4, 300);

var_dump($response);

```