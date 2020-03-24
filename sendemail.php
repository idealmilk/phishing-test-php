<?php

require 'vendor/autoload.php';

use Bitly\BitlyClient;

$employeeEmail = "xxxxxx@xxx.com";
$employeeName = "xxxxxx";

function shortenUrl($email) {
        $md5hash = md5($email);

        $bitlyClient = new BitlyClient('xxxAPI KEYxxx');

        $options = [
                'longUrl' => 'http://sclieads.xyz/{$md5hash}',
                'format' => 'xml'
        ];

        $response = $bitlyClient->shorten($options);
        $shortUrl = (string) $response->data->url;

        return $shortUrl;
};

$urlToSend = shortenUrl($md5hash);

function sendEmail($to, $name, $url){
        $subject = "TEST";
        $message = "Hi $name,
                        \r\nYou're such a valued member of the SciLeads team that I thought you deserved ONE BILLION POUNDS.
                        \r\nClick this link if that's something you might be interested: $url
                        \r\nThanks
                        \r\nJames";
        $headers = "From: xxxxxx xxxxxx <xxxxxx@xxx.com>";

        mail($to, $subject, $message, $headers);
};


// foreach($recipients as $email => $name)
// {
//     $urlToSend = shortenUrl($md5hash);
// }

sendEmail($employeeEmail, $employeeName, $urlToSend);

echo "sent!";

?>