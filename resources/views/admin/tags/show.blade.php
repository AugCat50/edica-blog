@extends('admin.layouts.main')

@section('content')

<div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <div class="content-header">
        <div class="container-fluid">
            <div class="row mb-2">
                <div class="col-sm-6">
                    <h1 class="m-0">Тэг</h1>
                </div><!-- /.col -->
                <div class="col-sm-6">
                    <ol class="breadcrumb float-sm-right">
                        <li class="breadcrumb-item"><a href="{{ route('admin.main.index') }}">Главная</a></li>
                        <li class="breadcrumb-item"><a href="{{ route('admin.tag.index') }}">Тэги</a></li>
                        <li class="breadcrumb-item active">Тэг</li>
                    </ol>
                </div><!-- /.col -->
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
                    <div class="card">
                        <!-- <div class="card-header">
                            <h3 class="card-title">Responsive Hover Table</h3>

                            <div class="card-tools">
                                <div class="input-group input-group-sm" style="width: 150px;">
                                    <input type="text" name="table_search" class="form-control float-right" placeholder="Search">

                                    <div class="input-group-append">
                                        <button type="submit" class="btn btn-default">
                                            <i class="fas fa-search"></i>
                                        </button>
                                    </div>
                                </div>
                            </div>
                        </div> -->
                        <!-- /.card-header -->
                        <div class="card-body table-responsive p-0">
                            <table class="table table-hover text-nowrap">
                                <tbody>
                                        <tr>
                                            <td>ID</td>
                                            <td>Название</td>
                                            <td>Редактировать</td>
                                            <td>Удалить</td>
                                        </tr>
                                        <tr>
                                            <td>{{ $tag->id }}</td>
                                            <td>{{ $tag->title }}</td>
                                            <td><a href="{{ route('admin.tag.edit', $tag->id) }}"><i class="fas fa-pencil-alt"></i></a></td>
                                            <td>
                                                <form action="{{ route('admin.tag.delete', $tag->id) }}" method="post">
                                                    @csrf
                                                    @method('DELETE')
                                                    <button type="submit" class="border-0 bg-transparent"><i class="fas fa-trash" role="button"></i></button>
                                                </form>
                                            </td>
                                        </tr>
                                </tbody>
                            </table>
                        </div>
                        <!-- /.card-body -->
                    </div>
                </div>
            </div>
            <!-- /.row -->
            <div class="raw">
                <div class="col-1">
                    <a href="{{ route('admin.tag.create') }}" class="btn btn-block btn-info">Добавить</a>
                </div>
            </div>
        </div><!-- /.container-fluid -->
    </section>
    <!-- /.content -->
</div>

@endsection