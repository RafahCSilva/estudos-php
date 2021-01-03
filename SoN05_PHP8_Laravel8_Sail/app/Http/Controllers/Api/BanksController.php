<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\ApiControllerTrait;
use App\Http\Controllers\Controller;
use App\Models\Bank;

class BanksController extends Controller
{
    use ApiControllerTrait;

    protected Bank $model;
    protected array $relationships = [];

    public function __construct(Bank $model)
    {
        $this->model = $model;
    }
}
