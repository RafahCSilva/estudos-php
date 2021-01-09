<?php

namespace App\Http\Controllers;

use App\Models\Page;

class PagesController extends Controller
{
    use CrudControllerTrait;

    protected $model;
    protected $path = 'pages';
    protected $redirectPath = '/pages';

    public function __construct(Page $model)
    {
        $this->model = $model;
    }
}
