<?php


namespace app\interfaces;


interface IRenderer {
    public function renderTemplate(string $template, array $params): string|false;
}
