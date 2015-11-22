<?php


namespace sql_nd_3\DDD;

require_once "Comment.php";
require_once "CommentRepository.php";
require_once "TopicRepository.php";

$commentRepository = new CommentRepository();
$topicRepository = new TopicRepository();

$bla = "blablablabla";

$comment = new Comment();
$comment->setAuthor('Author' . rand(0, 1000));
$comment->setTopicID($topicRepository->getRandomId());
$comment->setComment(substr($bla, 0, rand(12, strlen($bla))));
$commentRepository->saveComment($comment);
echo "<div>" . $comment->getTopicID() . "</div>";
echo "<div>" . $comment->getAuthor() . "</div>";
echo "<div>" . $comment->getComment() . "</div>";