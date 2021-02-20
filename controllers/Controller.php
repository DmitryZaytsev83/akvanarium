<?php


namespace app\controllers;


use app\interfaces\IRenderer;
use app\models\Basket;
use JetBrains\PhpStorm\Pure;

abstract class Controller {
    protected string $action;
    protected string $defaultAction = 'index';
    protected string $layout = 'main';
    protected bool $useLayout = true;
    protected IRenderer $renderer;

    /**
     * Controller constructor.
     * @param IRenderer $renderer
     */
    #[Pure] public function __construct(IRenderer $renderer) {
        $this->renderer = $renderer;
    }

    public function runAction($action = null): void {
        $this->action = $action ?: $this->defaultAction;
        $method = 'action' . ucfirst($this->action);
        if (method_exists($this, $method)) $this->$method();
        else $this->actionIndex();
    }

    public function render(string $template, array $params = []): string|false {
        if ($this->useLayout)
            return $this->renderer->renderTemplate("layouts/{$this->layout}",
                ['content' => $this->renderer->renderTemplate($template,
                    $params),
                    'count' => (Basket::getCountWhere('session_id', session_id()))]);
        else
            return $this->renderer->renderTemplate($template, $params);
    }

    abstract function actionIndex();
}
