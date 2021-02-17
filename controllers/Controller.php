<?php


namespace app\controllers;


use app\engine\Render;
use app\interfaces\IRenderer;
use JetBrains\PhpStorm\Pure;

class Controller implements IRenderer {
    protected string $action;
    protected string $defaultAction = 'index';
    protected string $layout = 'main';
    protected bool $useLayout = true;
    protected Render $renderer;

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
            return $this->renderTemplate("layouts/{$this->layout}",
                ['content' => $this->renderTemplate($template, $params)]);
        else
            return $this->renderTemplate($template, $params);
    }

    public function renderTemplate(string $template, array $params): string {
        return $this->renderer->renderTemplate($template, $params);
    }
}
