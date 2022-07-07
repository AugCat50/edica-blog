<?php

namespace App\Http\Controllers\Admin\Post;

use App\Models\Post;
use App\Http\Controllers\Controller;
use App\Http\Requests\Admin\Post\StoreRequest;
use Illuminate\Support\Facades\Storage;

class StoreController extends Controller
{
    //Метод по умолчанию.
    public function __invoke(StoreRequest $request)
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
    
            $post = Post::firstOrCreate($data);

            // dd($tagIds);
            $post->tags()->attach($tagIds);
        } catch(\Exception $e){
            abort(404);
        }


        return redirect()->route('admin.post.index');
    }
}
