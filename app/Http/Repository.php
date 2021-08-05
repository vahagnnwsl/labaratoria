<?php

namespace App\Http;

class Repository
{

    protected $model;

    public function __construct($model)
    {
        $this->model = $model;
    }
}
