<?php


namespace app\engine;


use app\interfaces\IRenderer;

class Render implements IRenderer {
    public function renderTemplate(string $template, array $params = []):
    string|false {
        ob_start();
        extract($params);
        $templatePath = TEMPLATE_DIR . $template . EXTENSION;
        include $templatePath;
        return ob_get_clean();
    }
}
