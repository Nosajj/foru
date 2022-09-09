<?php

$posts = $result["data"]['posts'];
    
?>

<h1>liste posts</h1>

<?php
foreach($posts as $post ){

    ?>
    <p><?=$post->getText()." ".$post->getCreationdate()." ".$post->getUser()->getPseudo()?></p>
    <?php
}


  
