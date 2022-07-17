@extends('layouts.main')

@section('content')
<main class="blog pb-5">
    <div class="container pb-5">
        <h1 class="edica-page-title" data-aos="fade-up">Категории</h1>
        <section class="featured-posts-section">
            <div class="row">
                <ul class="navbar-nav">
                @foreach($categories as $category)
                    <li class="nav-item"><a href="{{ route('category.post.index', $category->id) }}">{{ $category->title }}</a></li>
                @endforeach    
                </ul>    
            </div>
        </section>
    </div>
</main>

@endsection
