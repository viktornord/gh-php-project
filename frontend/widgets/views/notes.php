<?php
/**
 * Created by PhpStorm.
 * User: victor
 * Date: 13/12/15
 * Time: 20:31
 */

/**
 * @var String[] $notes
 * @var String $title
 */

?>

<div class="widget-notes">
    <h3><?= $title ?></h3>
    <ul>
        <?php foreach($notes as $note): ?>
            <li><?= $note ?></li>
        <?php endforeach; ?>
    </ul>
</div>
