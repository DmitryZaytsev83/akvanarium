<?php


namespace app\controllers;


use app\models\Product;

class ProductController extends Controller {

    protected function actionCatalog() {
        $catalog = Product::getAll();
        echo $this->render("catalog", ['catalog'=>$catalog]);
    }

    protected function actionCard() {
        $id = 1;
        $product = Product::getOne($id);
        echo $this->renderTemplate("card", ['product' => $product]);
    }

    public function actionIndex() {
        $this->actionCatalog();
    }
}
