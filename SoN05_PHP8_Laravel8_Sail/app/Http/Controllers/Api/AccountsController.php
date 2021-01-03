<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\ApiControllerTrait;
use App\Http\Controllers\Controller;
use App\Models\Account;

class AccountsController extends Controller
{
    use ApiControllerTrait;

    protected Account $model;
    protected array $relationships = ['bank'];

    public function __construct(Account $model)
    {
        $this->model = $model;
    }
}
