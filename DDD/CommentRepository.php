<?php

namespace sql_nd_3\DDD;

include_once "../DBWrapper.php";
include_once "Comment.php";

use DBWrapper\DBWrapper;

class CommentRepository
{
    private $connection;

    public function __construct()
    {
        $dbWrapper = new DBWrapper();
        $this->connection = $dbWrapper->getConnection();
    }

    public function getAllByTopicId($topicID)
    {
        $query = 'SELECT comments.* FROM comments JOIN topics ON comments.topicID = ' . $topicID . " AND topics.id = " . $topicID;
        $comments = array();
        foreach ($this->connection->query($query) as $row) {
            $comment = new Comment($row['id'], $row['topicID'], $row['comment_data'], $row['post_date'], $row['author'], $this->connection);
            $comments[] = $comment;
        }
        return $comments;
    }

    public function saveComment($comment)
    {
        $query = "UPDATE topics SET comment_count = comment_count + 1 WHERE topics.id = " . $comment->getTopicID();
        $this->connection->exec($query);
        $query = "INSERT INTO comments(topicID, post_date, author, comment_text) VALUES(" . $comment->getTopicID() . ", NOW(),'" . $comment->getAuthor() . "', '" . $comment->getComment() . "')";
        return $this->connection->exec($query);
    }
}