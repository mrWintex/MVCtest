<?php
    abstract class Controller{
        protected $data = array();
        protected $view = "";
        protected $header = array('title' => "", 'key_words' => "", 'description' => "");

        abstract function Process($params);

        public function PrintView(){
            if($this->view){
                extract($this->data);
                require(dirname(__DIR__, 1) . "/views/" . $this->view . ".phtml");
            }
        }

        public function Redirect($url){
            header("Location: /$url");
            header("Connection: close");
            exit;
        }
    }
?>