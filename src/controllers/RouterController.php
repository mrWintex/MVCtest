<?php
class RouterController extends Controller
{
    protected $controller;

    public function Process($params)
    {
        $parsedURL = $this->ParseURL($params[0]);
        if (empty($parsedURL[0])){
            $this->Redirect("article/uvod");
        }

        $name_of_controller = $this->ToCamelCase(array_shift($parsedURL)) . "Controller";

        if (file_exists(__DIR__ . "/" . $name_of_controller . ".php")) {
            $this->controller = new $name_of_controller;
        } else {
            $this->Redirect("error");
        }

        $this->controller->Process($parsedURL);

        $this->data['title'] = $this->controller->header['title'];
        $this->data['key_words'] = $this->controller->header['key_words'];
        $this->data['description'] = $this->controller->header['description'];

        $this->view = 'layout';
    }

    public function ParseURL($url)
    {
        $parsedURL = parse_url($url);
        $parsedURL["path"] = ltrim($parsedURL["path"], "/");
        $parsedURL["path"] = trim($parsedURL["path"]);

        $splitPath = explode("/", $parsedURL["path"]);

        return $splitPath;
    }

    private function ToCamelCase($text)
    {
        $camel_case = str_replace("-", " ", $text);
        $camel_case = ucwords($camel_case);
        $camel_case = str_replace(" ", "", $camel_case);
        return $camel_case;
    }
}
