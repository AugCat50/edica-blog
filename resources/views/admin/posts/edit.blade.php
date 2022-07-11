@extends('admin.layouts.main')

@section('content')

<div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <div class="content-header">
        <div class="container-fluid">
            <div class="row mb-2">
                <div class="col-sm-6">
                    <h1 class="m-0">Редактирование поста</h1>
                </div><!-- /.col -->
                <div class="col-sm-6">
                    <ol class="breadcrumb float-sm-right">
                        <li class="breadcrumb-item"><a href="{{ route('admin.main.index') }}">Главная</a></li>
                        <li class="breadcrumb-item"><a href="{{ route('admin.post.index') }}">Посты</a></li>
                        <li class="breadcrumb-item active">Редактирование поста</li>
                    </ol>
                </div>
                <!-- /.col -->
            </div><!-- /.row -->
        </div><!-- /.container-fluid -->
    </div>
    <!-- /.content-header -->

    <!-- Main content -->
    <section class="content">
        <div class="container-fluid">
            <!-- Small boxes (Stat box) -->
            <div class="row">
                <div class="col-6">
                    <div class="card card-default p-3">
                        <form action="{{ route('admin.post.update', $post->id) }}" method="POST" enctype="multipart/form-data">
                            @csrf
                            @method('PATCH')
                            <div class="form-group">
                                <label>Категория</label>
                                <select class="form-control" name="category_id">
                                    @foreach($categories as $category)
                                    <option 
                                        value="{{ $category->id }}" 
                                        {{ $category->id == old('category_id', $post->category_id) ? 'selected' : ''}}
                                        >
                                        {{ $category->title }}
                                    </option>
                                    @endforeach
                                </select>
                            </div>

                            <div class="col-md-6">
                                <div class="form-group">
                                    <label>Тэги</label>
                                    <select name="tag_ids[]" class="select2" multiple="multiple" data-placeholder="Select a State" style="width: 100%;">
                                        @foreach ($tags as $tag)
                                        <option 
                                            value="{{ $tag->id }}"
                                            {{ is_array(old( 'tag_ids', $post->tags->pluck('id')->toArray()) ) && in_array( $tag->id, old('tag_ids', $post->tags->pluck('id')->toArray()) ) ? 'selected' : '' }}
                                            >
                                            {{ $tag->title }}
                                        </option>
                                        @endforeach
                                    </select>
                                </div>
                            </div>

                            <div class="form-group">
                                <label for="exampleInputFile">Название поста</label>
                                <input class="form-control mb-3" name="title" type="text" placeholder="Имя категории" value="{{ old('title', $post->title) }}">
                                @error('title')
                                <div class="text-danger">
                                    <p>{{ $message }}</p>
                                </div>
                                @enderror
                            </div>

                            <div class="form-group">
                                <label for="exampleInputFile">Текст поста</label>
                                <textarea id="summernote" name="content">{{ old('content', $post->content) }}</textarea>
                                @error('content')
                                <div class="text-danger">
                                    <p>{{ $message }}</p>
                                </div>
                                @enderror
                            </div>

                            <div class="form-group">
                                <label for="exampleInputFile">Изображение превью</label>
                                <div class="input-group">
                                    <div class="row">
                                        <img class="w-50 mb-3" src="{{  asset( 'storage/'.$post->preview_image ) }}" alt="Изображение превью">
                                    </div>

                                    <div class="row w-100">
                                        <div class="custom-file w-50">
                                            <input type="file" class="custom-file-input" id="exampleInputFile" name="preview_image">
                                            <label class="custom-file-label" for="exampleInputFile">...</label>
                                        </div>
                                    </div>

                                    @error('preview_image')
                                    <div class="text-danger">
                                        <p>{{ $message }}</p>
                                    </div>
                                    @enderror
                                    <!-- <div class="input-group-append">
                                    <span class="input-group-text">Загрузить</span>
                                </div> -->
                                </div>
                            </div>

                            <div class="form-group">
                                <label for="exampleInputFile">Главное изображение поста</label>
                                <div class="input-group">
                                    <div class="row">
                                        <img class="w-50 mb-3" src="{{  asset( 'storage/'.$post->main_image ) }}" alt="Главное изображение поста">
                                    </div>

                                    <div class="row w-100">
                                        <div class="custom-file w-50">
                                            <input type="file" class="custom-file-input" id="exampleInputFile" name="main_image">
                                            <label class="custom-file-label" for="exampleInputFile">...</label>
                                        </div>
                                    </div>

                                    @error('main_image')
                                    <div class="text-danger">
                                        <p>{{ $message }}</p>
                                    </div>
                                    @enderror
                                    <!-- <div class="input-group-append">
                                    <span class="input-group-text">Загрузить</span>
                                </div> -->
                                </div>
                            </div>

                            <input type="submit" class="btn btn-block btn-success col-2" value="Сохранить">
                        </form>
                    </div>
                </div>
            </div>
            <!-- /.row -->
        </div><!-- /.container-fluid -->
    </section>
    <!-- /.content -->
</div>

@endsection