<?php


namespace app\controllers;


use app\engine\Request;
use app\models\Product;

class ProductController extends Controller {

    protected function actionCatalog() {
        $catalog = Product::getAll();
        echo $this->render("catalog", ['catalog' => $catalog]);
    }

    protected function actionCard() {
        $id = (new Request())->getId();
        $product = Product::getOne($id);
        echo $this->render("card", ['product' => $product]);
    }

    public function actionIndex() {
        $this->actionCatalog();
    }

    protected function actionApicatalog() {
        $catalog = Product::getAll();
        header('Content-Type: application/json');
        echo json_encode(['goods' => $catalog], JSON_NUMERIC_CHECK);
    }
}
