<?php

use GuzzleHttp\Client;

class EmailSystem
{

    public static function sendEmail($recipient_email, $recipient_name, $subject, $text): bool
    {
        $empresa = Empresa::first();

        $body = '{"from":{"email":"no-reply@faturamais.pt","name":"' . $empresa->designacaosocial . ' Fatura+"},"to":[{"email": "' . $recipient_email . '","name":"' . $recipient_name . '"}],"subject":"' . $subject . '","html":"' . $text . '"}';

        try
        {
            $client = new Client();
            $res = $client->request('POST', 'https://api.mailersend.com/v1/email', [
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
        catch (Exception $_)
        {
            return false;
        }
    }
}