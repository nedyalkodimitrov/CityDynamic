<?php

require_once 'utils/Kafka.php';
require_once 'utils/Mongo.php';
use util\Kafka;
use util\Mongo;

$kafka = new Kafka();
$mongo = new Mongo('context');

$context = stream_context_create([
    'ssl' => [
        'local_cert' => 'certs/server.crt',    // Path to the server certificate
        'local_pk' => 'certs/server.key',     // Path to the server private key
        'cafile' => '/etc/ssl/certs/custom/root-ca.crt',      // Path to the Root CA certificate
        'verify_peer' => false,          // Verify client certificates
        'verify_peer_name' => false,    // Set true for hostname verification
        'allow_self_signed' => true,   // Reject self-signed client certificates
    ],
]);

$server = stream_socket_server('tls://0.0.0.0:8080',
    $errorCode, $errorMessage, STREAM_SERVER_BIND | STREAM_SERVER_LISTEN, $context);

if (!$server) {
    die("Error: $errorMessage ($errorCode)\n");
}

echo "TLS server is listening on port 8080...\n";

while ($client = stream_socket_accept($server)) {
    fwrite($client, "Hello, TLS Client!\n");
    echo "Client connected.\n";

    while (!feof($client)) {
        $message = fread($client, 1024); // Read up to 1024 bytes from the client
        if ($message) {
            $data = json_decode($message, true);
            echo "Received message: " . json_encode($data) . "\n";
            sendTopic($message);
        }
    }

    echo "Client disconnected.\n";
    fclose($client);
}

fclose($server);