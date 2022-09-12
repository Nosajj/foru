<?php
$category = $result["data"]["category"];
$topics = $result["data"]['topics'];

    
?>

<h1>liste topics de la catégorie <?= $category->getCategoryName()?></h1>



<?php
foreach($topics as $topic ){

    ?><div>
    <p><?=$topic->getTitle()." ".$topic->getCreationDate()." ".$topic->getUser()->getPseudo()?></p>
    <a href="index.php?ctrl=forum&action=detailsTopic&id=<?= $topic->getId()?>">Les posts</a>
    <?php
}
?>





