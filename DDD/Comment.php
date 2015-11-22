<?php

namespace sql_nd_3\DDD;

class Comment{
    private $id;
    private $topicID;
    private $date;
    private $comment;
    private $author;
    public function __construct($id = null, $topicID = null, $comment = null, $date = null, $author = null){
        $this->id = $id;
        $this->topicID = $topicID;
        $this->comment = $comment;
        $this->date = $date;
        $this->author = $author;
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
}