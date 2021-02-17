<?php
/**
 * @var $catalog
 */
?>
<h2>Catalog</h2>
<div class="cards">
    <?php foreach ($catalog as $value): ?>
        <div class="card">
            <h3><?= $value['title']; ?></h3>
            <p><?= $value['description']; ?></p>
            <p>Цена: <?= $value['price']; ?></p>
        </div>
    <?php endforeach; ?>
</div>
