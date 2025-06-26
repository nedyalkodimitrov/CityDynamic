<?php

namespace App\Http\Utils;

class KafkaConsumer
{
    private $rk;

    public function __construct($broker = "kafka:9093", $groupId = "default-topic")
    {
        $conf = new \RdKafka\Conf();
        $conf->set('bootstrap.servers', $broker);
        $conf->set('group.id', $groupId);

        $this->rk = new \RdKafka\KafkaConsumer($conf);

    }

    public function consumeTopic($topic)
    {
        $this->consumer->subscribe([$topic]);

        while (true) {
            $message = $this->consumer->consume(120 * 1000);
        }

        return $message;
    }
}
