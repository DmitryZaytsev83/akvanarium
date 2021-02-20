<?php
/**
 * @var $catalog
 */
?>
<h2>Catalog</h2>
<div class="cards">
    <?php foreach ($catalog as $value): ?>
        <a href="/product/card/<?= $value['id']; ?>">
            <div class="card">
                <h3><?= $value['title']; ?></h3>
                <p><?= $value['description']; ?></p>
                <p>Цена: <?= $value['price']; ?></p>
                <form action="/product/add/<?= $value['id']; ?>" method="post">
                    <input type="submit" name="action" value="Купить">
                </form>
            </div>
        </a>
    <?php endforeach; ?>
</div>
