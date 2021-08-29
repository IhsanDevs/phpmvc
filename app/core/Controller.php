<?php 
class Controller {
    public function view($view, $data = [])
    {
        require __DIR__ . "/../views/{$view}.php";
    }

    public function model($model)
    {
        require __DIR__ . "/../models/{$model}.php";
        return new $model;
    }
}