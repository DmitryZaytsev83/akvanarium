<?php


namespace app\controllers;


class Controller {
    protected string $action;
    protected string $defaultAction = 'index';
    protected string $layout = 'main';
    protected bool $useLayout = true;


    public function runAction($action = null): void {
        $this->action = $action ?: $this->defaultAction;
        $method = 'action' . ucfirst($this->action);
        if (method_exists($this, $method)) {
            $this->$method();
        } else {
            $this->actionIndex();
        }
    }

    public function render(string $template, array $params = []): string|false {
        if ($this->useLayout) {
            return $this->renderTemplate("layouts/{$this->layout}",
                ['content' => $this->renderTemplate($template, $params)]);
        } else {
            return $this->renderTemplate($template, $params);
        }
    }

    public function renderTemplate(string $template, array $params = []):
    string|false {
        ob_start();
        extract($params);
        $templatePath = TEMPLATE_DIR . $template . EXTENSION;
//        echo $templatePath;
        include $templatePath;
        return ob_get_clean();
    }
}
