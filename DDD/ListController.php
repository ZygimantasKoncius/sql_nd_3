<?php

namespace sql_nd_3\DDD;

include_once('CommentRepository.php');
include_once('TopicRepository.php');

$topicRepository = new TopicRepository();
$commentRepository = new CommentRepository();
$topics = $topicRepository->getAll();
echo "<h1> Topics </h1>";
echo "<ul>";
foreach($topics as $topic){
    echo "<li>";
    echo "<b>ID:</b>".$topic->getId()."   ";
    echo "<b>Name:</b>".$topic->getName()."   ";
    echo "<b>Post Date:</b>".$topic->getPostDate()."   ";
    echo "<b>Comment Count:</b>".$topic->getCommentCount()."   ";
    echo "<h4> Comments: </h4>";
    echo "<ul>";
    $comments = $commentRepository->getAllByTopicId($topic->getId());
    foreach($comments as $comment){
        echo "<li>";
        echo "<b>ID:</b>".$comment->getId()."  ";
        echo "<b>Author:</b>".$comment->getAuthor()."  ";
        echo "<b>Date commented:</b>".$comment->getDate()."  ";
        echo "<div>".$comment->getComment()."</div>";
        echo "</li>";
        echo "<br>";
    }
    echo "</ul>";
    echo "</li>";
}
echo "</ul>";