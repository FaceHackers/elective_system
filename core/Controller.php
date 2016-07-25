<?php

class Controller {
    public function model($model) {
        require_once "../elective_system-2/models/$model.php";
        return new $model ();
    }
    
    public function view($view, $data = Array()) {
        require_once "../elective_system-2/views/$view.php";
    }
}

?>