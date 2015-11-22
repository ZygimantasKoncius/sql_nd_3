<?php

namespace ActiveRecord;

include_once "../DBWrapper.php";

use DBWrapper\DBWrapper;

class Comment{
    private $id;
    private $topicID;
    private $date;
    private $comment;
    private $author;
    private $connection;
    public function __construct($id = null, $topicID = null, $comment = null, $date = null, $author = null, $connection = null){
        $this->id = $id;
        $this->topicID = $topicID;
        $this->comment = $comment;
        $this->date = $date;
        $this->author = $author;
        if(!isset($connection)) {
            $dbWrapper = new DBWrapper();
            $this->connection = $dbWrapper->getConnection();
        }else{
            $this->connection = $connection;
        }
    }
    public function setId($id){
        $this->id = $id;
    }
    public function getId(){
        return $this->id;
    }
    public function setComment($comment){
        $this->comment = $comment;
    }
    public function getComment(){
        return $this->comment;
    }
    public function setDate($date){
        $this->date = $date;
    }
    public function getDate(){
        return $this->date;
    }
    public function setAuthor($author){
        $this->author = $author;
    }
    public function getAuthor()
    {
        return $this->author;
    }
    public function getTopicID()
    {
        return $this->topicID;
    }
    public function setTopicID($topicID)
    {
        $this->topicID = $topicID;
    }
    public function save(){
        $query = "UPDATE topics SET comment_count = comment_count + 1 WHERE topics.id = ".$this->getTopicID();
        $this->connection->exec($query);
        $query = "INSERT INTO comments(topicID, post_date, author, comment_text) VALUES(".$this->getTopicID().", NOW(),'".$this->getAuthor()."', '".$this->getComment()."')";
        return $this->connection->exec($query);
    }
}