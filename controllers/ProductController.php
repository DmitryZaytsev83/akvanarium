<?php


namespace app\controllers;


class ProductController {

    private string $action;
    private string $defaultAction = 'index';


    public function runAction($action = null): void {
        $this->action = $action ?: $this->defaultAction;
        $method = 'action' . ucfirst($this->action);
        if (method_exists($this, $method)) {
            $this->$method();
        } else {
            $this->actionIndex();
        }
    }

    private function actionCatalog() {
        echo "catalog";
    }

    private function actionCard() {
        echo "card";
    }

    public function actionIndex() {
        $this->actionCatalog();
    }
}
