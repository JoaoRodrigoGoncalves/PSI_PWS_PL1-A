<?php

use GuzzleHttp\Client;

class EmailSystem
{

    public function sendEmail($recipient_email, $recipient_name, $subject, $text): bool
    {
        $body = '{"from":{"email":"no-reply@faturamais.pt","name":"Fatura+"},"to":[{"email": "' . $recipient_email . '","name":"' . $recipient_name . '"}],"subject":"' . $subject . '","html":"' . $text . '"}';

        $client = new Client();
        $res = @$client->request('POST', 'https://api.mailersend.com/v1/email', [
            'headers' => [
                'Authorization' => 'Bearer ' . MAILERSEND_API_KEY,
                'Content-Type' => 'application/json'
            ],
            'body' => $body,
            'verify' => false,
            'http_errors' => false
        ]);
        return ($res->getStatusCode() == 202);
    }

}