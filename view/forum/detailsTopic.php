<?php
$posts = $result["data"]["posts"];
$topics = $result["data"]["topics"];

    
?>

<h1>Message du topic : <?= $topics->getTitle() ?></h1>

<?php
foreach($posts as $post ){

    ?>
    <p><?=$post->getText()." écrit le ".$post->getCreationDate()." par ".$post->getUser()->getPseudo()?></p>
    <?php
}


?>


