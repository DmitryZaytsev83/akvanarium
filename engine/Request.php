<?php


namespace app\engine;


class Request {
    private string $requestString;
    private string $method;
    private bool $isAjax;
    private string $controllerClass;
    private string $actionName;
    private int $id;

    /**
     * @return string
     */
    public function getRequestString(): string {
        return $this->requestString;
    }

    /**
     * @return string
     */
    public function getMethod(): string {
        return $this->method;
    }

    /**
     * @return bool
     */
    public function isAjax(): bool {
        return $this->isAjax;
    }

    /**
     * @return string
     */
    public function getControllerClass(): string {
        return $this->controllerClass;
    }

    /**
     * @return string
     */
    public function getActionName(): string {
        return $this->actionName;
    }

    /**
     * @return int
     */
    public function getId(): int {
        return $this->id;
    }

    /**
     * Request constructor.
     */
    public function __construct() {
        $this->requestString = $_SERVER['REQUEST_URI'];
        $this->method = $_SERVER['REQUEST_METHOD'];
        $this->isAjax = !empty($_SERVER['HTTP_X_REQUESTED_WITH']) &&
            strtolower($_SERVER['HTTP_X_REQUESTED_WITH']) == 'xmlhttprequest';
        $this->parseRequest();
    }

    private function parseRequest() {
        $uri = explode("/", $this->requestString);
        $uri = array_filter($uri);
        if (count($uri) < 1) {
            $this->controllerClass = "app\\controllers\\ProductController";
        } else
            $this->controllerClass = "app\\controllers\\" . ucfirst($uri[1]) . "Controller";
        if (count($uri) < 2) {
            $this->actionName = "";
        } else {
            $this->actionName = $uri[2];
        }
        if (count($uri) < 3) {
            $this->id = 1;
        } else {
            $this->id = $uri[3];
        }
    }
}
