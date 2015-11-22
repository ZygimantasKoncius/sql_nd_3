<?php

namespace ActiveRecord;

include_once "../DBWrapper.php";
include_once "Comment.php";

use DBWrapper\DBWrapper;

class Topic
{
    private $id;
    private $name;
    private $postDate;
    private $commentCount;
    private $comments;
    private $connection;

    public function __construct($id = null, $name = null, $postDate = null, $commentCount = 0, $connection = null)
    {
        $this->id = $id;
        $this->name = $name;
        $this->postDate = $postDate;
        $this->commentCount = $commentCount;
        $this->comments = array();
        if (!isset($connection)) {
            $dbWrapper = new DBWrapper();
            $this->connection = $dbWrapper->getConnection();
        } else {
            $this->connection = $connection;
        }
    }

    public static function loadAll()
    {
        $dbWrapper = new DBWrapper();
        $connection = $dbWrapper->getConnection();
        $query = "SELECT * FROM topics";
        $topics = array();
        foreach ($connection->query($query) as $row) {
            $topic = new Topic($row['id'], $row['name'], $row['post_date'], $row['comment_count'], $connection);
            $topic->setComments();
            $topics[] = $topic;
        }
        return $topics;
    }

    public function save()
    {
        $query = "INSERT INTO topics(name, post_date, comment_count) VALUES('" . $this->getName() . "', NOW()," . $this->getCommentCount() . ")";
        return $this->connection->exec($query);
    }

    public function setId($id)
    {
        $this->id = $id;
    }

    public function getId()
    {
        return $this->id;
    }

    public function setName($name)
    {
        $this->name = $name;
    }

    public function getName()
    {
        return $this->name;
    }

    public function setPostDate($postDate)
    {
        $this->postDate = $postDate;
    }

    public function getPostDate()
    {
        return $this->postDate;
    }

    public function getCommentCount()
    {
        return $this->commentCount;
    }

    public function setCommentCount($commentCount)
    {
        $this->commentCount = $commentCount;
    }

    public function getComments()
    {
        return $this->comments;
    }

    public function setComments()
    {
        $query = 'SELECT comments.* FROM comments JOIN topics ON comments.topicID = ' . $this->getId() . " AND topics.id = " . $this->getId();
        foreach ($this->connection->query($query) as $row) {
            $comment = new Comment($row['id'], $row['topicID'], $row['comment_data'], $row['post_date'], $row['author'], $this->connection);
            $this->comments[] = $comment;
        }
    }
}