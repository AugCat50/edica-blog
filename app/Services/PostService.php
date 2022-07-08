<?php
/*
* Сервисы- это по сути шаблон Command. И раз уж он используется, я бы разделил команды по отдельности.
* Но поскольку, говорят, что существует и такой подход, оставлю как есть. Чтобы был наглядный пример.
*/

namespace App\Services;

use App\Models\Post;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Storage;
use App\Http\Requests\Admin\Post\StoreRequest;
use App\Http\Requests\Admin\Post\UpdateRequest;

class PostService
{
    public function store(StoreRequest $request, $data)
    {
        try {
            $tagIds = $data['tag_ids'];
            unset($data['tag_ids']);

            if ($request->has('preview_image')) {
                $data['preview_image'] = Storage::disk('public')->put('/images', $data['preview_image']);
            }

            if ($request->has('main_image')) {
                $data['main_image'] = Storage::disk('public')->put('/images', $data['main_image']);
            }

            $post = Post::firstOrCreate($data);

            $post->tags()->attach($tagIds);
            DB::commit();
        } catch (\Exception $e) {
            DB::rollBack();
            abort(500);
        }
    }

    public function update(UpdateRequest $request, $data, Post $post)
    {
        try{
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
            DB::commit();          
        } catch(\Exception $e){
            DB::rollBack();
            abort(500);
        }

        return $post;
    }
}
