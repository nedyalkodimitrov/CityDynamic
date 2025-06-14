<?php
$conf = new RdKafka\Conf();

// Set the broker list
$rk = new RdKafka\Producer($conf);
$rk->addBrokers("kafka:9093"); // change if your broker runs elsewhere

$topic = $rk->newTopic("test_topic");

// Send a message
$topic->produce(RD_KAFKA_PARTITION_UA, 0, "Hello, Kafka!");

echo "Message sent hahahah!\n";
