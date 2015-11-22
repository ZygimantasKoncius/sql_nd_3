<?php

namespace sql_nd_3\DDD;

class Topic{
    private $id;
    private $name;
    private $postDate;
    private $commentCount;
    public function __construct($id = null, $name = null, $postDate = null, $commentCount = 0){
        $this->id = $id;
        $this->name = $name;
        $this->postDate = $postDate;
        $this->commentCount = $commentCount;
    }
    public function setId($id){
        $this->id = $id;
    }
    public function getId(){
        return $this->id;
    }
    public function setName($name){
        $this->name = $name;
    }
    public function getName(){
        return $this->name;
    }
    public function setPostDate($postDate){
        $this->postDate = $postDate;
    }
    public function getPostDate(){
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
}