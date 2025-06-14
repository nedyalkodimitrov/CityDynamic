<?php

namespace util;

class Kafka
{
    private $rk;

    public function __construct($broker = "kafka:9093")
    {
        $conf = new \RdKafka\Conf();
        $this->rk = new \RdKafka\Producer($conf);
        $this->rk->addBrokers($broker); // Change if your broker runs elsewhere
    }

    public function sendTopic($topic, $message)
    {
        $topic = $this->rk->newTopic();
        $topic->produce(\RD_KAFKA_PARTITION_UA, 0, $message);
    }
}