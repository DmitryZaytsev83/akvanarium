<?php


namespace app\controllers;


use app\engine\Request;
use app\models\Basket;
use JetBrains\PhpStorm\NoReturn;

class BasketController extends Controller {

    function actionIndex() {
        $basket = new Basket();
        $count = Basket::getCountWhere("session_id", session_id());
        echo $this->render("basket", ['count' => $count]);
    }
}
