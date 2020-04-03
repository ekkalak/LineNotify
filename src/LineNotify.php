<?php
/**
 * Created by PhpStorm.
 * User: hp
 * Date: 03-Apr-20
 * Time: 8:33 AM
 */

namespace Ekkalak\Line;

use GuzzleHttp\Client;

class LineNotify
{
    const LINE_API = 'https://notify-api.line.me/api/notify';
    private $token, $client, $request, $text;

    /**
     * LineNotify constructor.
     * @param $token
     */
    public function __construct($token)
    {
        $this->token = $token;
        $this->client = new Client();
        $this->text = '';
        $this->request = [
            'headers' => [
                'Authorization' => 'Bearer ' . $this->token,
            ],
        ];
    }

    /**
     * Send only text
     * @param $text
     * @return mixed
     */
    public function sendText($text)
    {
        $this->text = $text;
        $this->request['multipart'][] = [
            'name' => 'message',
            'contents' => $this->text,
        ];
        $response = $this->client->request('POST', self::LINE_API, $this->request);
        return json_decode($response->getBody(), true);
    }

    /**
     * Send sticker with empty text
     * text is required
     * @param $stickerPackageId
     * @param $stickerId
     * @return mixed
     */
    public function sendSticker($stickerPackageId, $stickerId)
    {
        $this->text = ' ';
        $this->request['multipart'][] = [
            'name' => 'message',
            'contents' => $this->text,
        ];
        $this->request['multipart'][] = [
            'name' => 'stickerPackageId',
            'contents' => $stickerPackageId,
        ];
        $this->request['multipart'][] = [
            'name' => 'stickerId',
            'contents' => $stickerId,
        ];
        $response = $this->client->request('POST', self::LINE_API, $this->request);
        return json_decode($response->getBody(), true);
    }

}