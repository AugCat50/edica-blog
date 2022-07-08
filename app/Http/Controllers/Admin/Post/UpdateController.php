<?php

namespace App\Http\Controllers\Admin\Post;

use App\Models\Post;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Storage;
use App\Http\Requests\Admin\Post\UpdateRequest;

class UpdateController extends BaseController
{
    //Метод по умолчанию.
    public function __invoke(UpdateRequest $request, Post $post)
    {
        $data = $request->validated();

        $post = $this->service->update($request, $data, $post);

        return view('admin.posts.show', compact('post'));
    }
}
