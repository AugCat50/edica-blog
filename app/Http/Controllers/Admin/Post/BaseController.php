<?php

namespace App\Http\Controllers\Admin\Post;


use App\Services\PostService;
use App\Http\Controllers\Controller;

class BaseController extends Controller
{
    public $service;

    public function __construct(PostService $service)
    {
        $this->service = $service;
    }
}
