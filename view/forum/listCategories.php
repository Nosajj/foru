<?php

$categories = $result["data"]['categories'];
    
?>

<h1>liste categorie</h1>

<?php
foreach($categories as $category ){

    ?><div>
    <p><?=$category->getCategoryName()?></p>
    <a class="btn-1" href="index.php?ctrl=forum&action=detailsCategory&id=<?= $category->getId() ?>">Cliquez</a>
    </div>
    <?php
}





  
