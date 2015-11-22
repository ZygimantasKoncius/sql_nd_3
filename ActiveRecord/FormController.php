<?php

namespace ActiveRecord;

require_once('Comment.php');
require_once('../DatabaseWrapper.php');

use DatabaseWrapper;

$dbWrapper = new DatabaseWrapper();
$connection = $dbWrapper->getConnection();
$topicIds = array();
foreach($connection->query('SELECT id FROM topics') as $row){
    $topicIds[] = $row['id'];
}
$bla = "bla";
$comment = new Comment($connection);
$comment->setAuthor('Author'.rand(0,1000));
$comment->setThreadID($topicIds[ rand(0,sizeof($topicIds)-1) ]);
$comment->setComment(substr($bla, 0, rand(12, strlen($bla)) ));
$comment->save();
echo "<div>".$comment->getThreadID()."</div>";
echo "<div>".$comment->getAuthor()."</div>";
echo "<div>".$comment->getComment()."</div>";