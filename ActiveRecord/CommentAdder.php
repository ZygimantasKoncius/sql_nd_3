<?php

namespace ActiveRecord;

require_once('Comment.php');
require_once('../DBWrapper.php');

use DBWrapper\DBWrapper;

$dbWrapper = new DBWrapper();
$connection = $dbWrapper->getConnection();
$topicIds = array();

foreach ($connection->query('SELECT id FROM topics') as $row) {
    $topicIds[] = $row['id'];
}

$bla = "blablablabla";
$comment = new Comment($connection);
$comment->setAuthor('Author' . rand(0, 1000));
$comment->setTopicID($topicIds[rand(0, sizeof($topicIds) - 1)]);
$comment->setComment(substr($bla, 0, rand(12, strlen($bla))));
$comment->save();

echo "<div>" . $comment->getTopicID() . "</div>";
echo "<div>" . $comment->getAuthor() . "</div>";
echo "<div>" . $comment->getComment() . "</div>";