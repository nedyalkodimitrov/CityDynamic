<?php

namespace util;

use MongoDB\Client;

class Mongo
{
    private $client;
    private $db;

    public function __construct($dbName)
    {
        $this->client = new Client("mongodb://root:example@mongo:27017");
        $this->db = $this->client->$dbName;
    }

    public function insertInCollection($collection, $props)
    {
        $collection = $this->db->$collection;
        $result = $collection->insertOne($props);
        return $result->getInsertedId();
    }
}