<?php

include_once('Topic.php');

use ActiveRecord\Topic;

class Topics implements Iterator{
    private $topicArray;
    private $index;
    public function __constructor(){
        $this->topicArray = array();
        $this->index = 0;
    }
    public function loadAll(){
        $this->topicArray = Topic::loadAll();
    }
    public function current()
    {
        return $this->topicArray[$this->index];
    }
    public function next()
    {
        $this->index ++;
    }
    public function key()
    {
        return $this->index;
    }
    public function valid()
    {
        return isset($this->topicArray[$this->key()]);
    }
    public function rewind()
    {
        $this->index = 0;
    }
}