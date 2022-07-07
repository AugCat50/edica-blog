<?php

namespace App\Http\Controllers\Admin\Post;

use App\Models\Post;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Storage;
use App\Http\Requests\Admin\Post\UpdateRequest;

class UpdateController extends Controller
{
    //Метод по умолчанию.
    public function __invoke(UpdateRequest $request, Post $post)
    {
        try{
            $data   = $request->validated();
            $tagIds = $data['tag_ids'];
            unset($data['tag_ids']);
    
            if($request->has('preview_image')){
                $data['preview_image'] = Storage::disk('public')->put('/images', $data['preview_image']);
            }
    
            if($request->has('main_image')){
                $data['main_image'] = Storage::disk('public')->put('/images', $data['main_image']);
            }

            $post->update($data);
            $post->tags()->sync($tagIds);
        } catch(\Exception $e){
            abort(404);
        }

        return view('admin.posts.show', compact('post'));
    }
}
