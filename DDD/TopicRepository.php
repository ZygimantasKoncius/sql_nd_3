<?php

namespace sql_nd_3\DDD;

include_once "../DBWrapper.php";
include_once "Topic.php";


use DBWrapper\DBWrapper;

class TopicRepository
{
    private $connection;

    public function __construct()
    {
        $dbWrapper = new DBWrapper();
        $this->connection = $dbWrapper->getConnection();
    }

    public function getAll()
    {
        $query = "SELECT * FROM topics";
        $topics = array();
        foreach ($this->connection->query($query) as $row) {
            $topic = new Topic($row['id'], $row['name'], $row['post_date'], $row['comment_count']);
            $topics[] = $topic;
        }
        return $topics;
    }

    public function saveTopic($topic)
    {
        $query = "INSERT INTO topics(name, post_date, comment_count) VALUES('" . $topic->getName() . "', NOW()," . $topic->getCommentCount() . ")";
        return $this->connection->exec($query);
    }

    public function getRandomId()
    {
        $topicIds = array();
        foreach ($this->connection->query('SELECT id FROM topics') as $row) {
            $topicIds[] = $row['id'];
        }
        return $topicIds[rand(0, sizeof($topicIds) - 1)];
    }
}