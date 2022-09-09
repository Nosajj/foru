<?php

$topics = $result["data"]['topics'];
$posts = $result["data"]['posts'];
    
?>

<h1>liste topics</h1>

<?php
foreach($topics as $topic ){

    ?>
    <p><?=$topic->getTitle()." ".$topic->getCreationdate()." ".$topic->getUser()->getPseudo()?></p>
    <?php
}
foreach($posts as $post ){

    ?> 
       <p><?=$post->getText()." ".$post->getCreationdate()." ".$post->getUser()->getPseudo()?></p>
    
    <?php
}

?>
<a href="index.php?ctrl=forum&action=listPosts"> ici les posts </a>


  
