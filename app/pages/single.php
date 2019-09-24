

<?php 


$db=App\App::getDatabase();

$data=$db->prepare('SELECT * FROM articles WHERE id = ?',$_GET['id'],'App\Table\Article');







foreach ($data as  $post) {
   
    ?>
    <ul>
    
        <li><a href="<?=$post->getUrl()?>"><?=$post->titre ?></a></li>
        <li><?=$post->getContenu() ?></li>
        <li><?=$post->date ?></li>
    </ul>

<?php
}
?>

    
