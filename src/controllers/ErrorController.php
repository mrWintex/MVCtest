<?php
class ErrorController extends Controller{
    public function Process($params)
    {
        header("HTTP/1.1 404 Not Found");
        $this->header["title"] = "Chyba 404";
        $this->view = "error";
    }
}

?>