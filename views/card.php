<?php
/**
 * @var \app\models\Product $product
 */
?>
<h3>Наименование: <?= $product->getTitle(); ?></h3>
<h3>Описание: <?= $product->getDescription(); ?></h3>
<h3>Цена: <?= $product->getPrice(); ?></h3>
