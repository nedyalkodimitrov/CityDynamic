<?php
$context = stream_context_create([
    'ssl' => [
        'cafile' => '/etc/ssl/certs/custom/root-ca.crt',       // Path to the Root CA certificate
        'verify_peer' => false,           // Verify server certificate
        'verify_peer_name' => false,      // Enforce hostname verification
        'local_cert' => 'cert/client1.crt',    // Client certificate (optional for mTLS)
        'local_pk' => 'cert/client1.key',      // Client private key (optional for mTLS)
    ],
]);

$client = stream_socket_client('tls://websocket-server:8080', $errorCode,
    $errorString, 30, STREAM_CLIENT_CONNECT, $context);

if (!$client) {
    die("Error: $errorString ($errorCode)\n");
}

echo "Connected to the server.\n";

while (!feof($client)) {
    echo fgets($client, 1024);

    while (true) {
        $array = array_map(fn() => rand(0, 1), range(1, 24));
        fwrite($client, json_encode($array));
        echo "Message sent to server.\n";
        sleep(5); // Wait for 5 seconds before sending the next message
    }

}


fclose($client);