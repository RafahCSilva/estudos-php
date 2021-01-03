<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\ApiControllerTrait;
use App\Http\Controllers\Controller;
use App\Models\User;

class UsersController extends Controller
{
    use ApiControllerTrait;

    protected User $model;
    protected array $relationships = [];

    public function __construct(User $model)
    {
        $this->model = $model;
    }
}
