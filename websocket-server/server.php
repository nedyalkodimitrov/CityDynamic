<?php
require __DIR__ . '/vendor/autoload.php';

$kafka = new \util\Kafka();
$mongo = new \util\Mongo('context');

$server = stream_socket_server('tcp://0.0.0.0:8080',
    $errorCode, $errorMessage, STREAM_SERVER_BIND | STREAM_SERVER_LISTEN);

if (!$server) {
    die("Error: $errorMessage ($errorCode)\n");
}

echo "TLS server is listening on port 8080...\n";

while ($client = stream_socket_accept($server, -1)) {
    fwrite($client, "Hello, TLS Client!\n");
    echo "Client connected.\n";

    while (!feof($client)) {
        $message = fread($client, 1024); // Read up to 1024 bytes from the client
        if ($message) {
            $data = json_decode($message, true);
            echo "Received message: " . json_encode($data) . "\n";
            $kafka->sendTopic("bus-1", $message);
        }
    }

    echo "Client disconnected.\n";
    fclose($client);
}

fclose($server);