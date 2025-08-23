<?php
$client = stream_socket_client('tcp://websocket-server:8080', $errorCode,
    $errorString, 30, STREAM_CLIENT_CONNECT);

if (!$client) {
    die("Error: $errorString ($errorCode)\n");
}

do {
    while (!feof($client)) {
        echo fgets($client, 1024);

        while (true) {
            $array = array_map(fn() => rand(0, 1), range(1, 24));
            fwrite($client, json_encode($array));
            echo "Message sent to server.\n";
            sleep(1000);
        }
    }

    echo "Connection lost. Retrying...\n";
    fclose($client);
    $client = stream_socket_client('tcp://websocket-server:8080', $errorCode, $errorString, 30, STREAM_CLIENT_CONNECT);

    if (!$client) {
        echo "Retry failed: $errorString ($errorCode)\n";
        sleep(15); // Wait before retrying
    } else {
        echo "Reconnected to the server.\n";
    }
} while (!$client);

fclose($client);