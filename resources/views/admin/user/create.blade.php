@extends('admin.layouts.main')

@section('content')

<div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <div class="content-header">
        <div class="container-fluid">
            <div class="row mb-2">
                <div class="col-sm-6">
                    <h1 class="m-0">Добавление пользователя</h1>
                </div><!-- /.col -->
                <div class="col-sm-6">
                    <ol class="breadcrumb float-sm-right">
                        <li class="breadcrumb-item"><a href="{{ route('admin.main.index') }}">Главная</a></li>
                        <li class="breadcrumb-item"><a href="{{ route('admin.user.index') }}">Пользователи</a></li>
                        <li class="breadcrumb-item active">Добавление пользователя</li>
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
                    <form action="{{ route('admin.user.store') }}" method="post">
                        @csrf
                        <input class="form-control mb-3" name="name" type="text" placeholder="Имя пользователя" value="{{ old('name') }}">
                        @error('name')
                        <div class="text-danger"><p>{{ $message }}</p></div>
                        @enderror

                        <input class="form-control mb-3" name="email" type="text" placeholder="E-mail" value="{{ old('email') }}">
                        @error('email')
                        <div class="text-danger"><p>{{ $message }}</p></div>
                        @enderror

                        <!-- <input class="form-control mb-3" name="password" type="text" placeholder="Пароль"> -->


                        <div class="col-md-6">
                            <div class="form-group">
                                <label>Роль</label>
                                <select name="role" class="select2" multiple="multiple" data-placeholder="Select a State" style="width: 100%;">
                                    <!-- Разбитие массива $rols на ключ => значение -->
                                    @foreach ($roles as $id => $role)
                                        <option value="{{ $id }}" {{ $id == old('role') ? 'selected' : '' }}>
                                            {{ $role }}
                                        </option>
                                    @endforeach
                                </select>
                            </div>
                        </div>
                        @error('role')
                        <div class="text-danger"><p>{{ $message }}</p></div>
                        @enderror

                        <input type="submit" class="btn btn-block btn-success col-2" value="Сохранить">
                    </form>
                </div>
            </div>
            <!-- /.row -->
        </div><!-- /.container-fluid -->
    </section>
    <!-- /.content -->
</div>

@endsection