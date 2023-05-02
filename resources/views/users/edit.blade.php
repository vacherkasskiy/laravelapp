@extends('layout.app')

@section('title', 'Изменение пользователя')

@section('content')
    @if(auth()->check() && auth()->user()->role == 'admin')
        <div class="card">
            <div class="card-header">
                Пользователь
            </div>
            <div class="card-body">

                <form method="POST" action="{{ route('users.update', $user->id) }}">
                    @method('PUT')
                    @csrf

                    <div class="mb-3">
                        <label for="article" class="form-label">NAME</label>
                        <input type="text" class="form-control" name="name" id="name" value="{{ $user->name }}">
                    </div>

                    <div class="mb-3">
                        <label for="description" class="form-label">EMAIL</label>
                        <input class="form-control" id="email" name="email" value="{{ $user->email }}">
                    </div>

                    <div class="input-group mb-3">
                        <div class="input-group-prepend">
                            <label class="input-group-text" for="role">ROLE</label>
                        </div>
                        <select class="custom-select" id="role" name="role">
                            <option selected>{{ $user->role }}}</option>
                            <option value="admin">admin</option>
                            <option value="user">user</option>
                        </select>
                    </div>

                    <button type="submit" class="btn btn-success">Применить</button>
                    <a href="/users">
                        <button type="button" class="btn btn-primary">Отмена</button>
                    </a>
                </form>
            </div>
        </div>
    @else
        <div style="width: 100%;height: 100%;display: flex;justify-content: center;align-items: center">
            <h1 style="font-size:30px;color:red;">You don't have access to this section.</h1>
        </div>
    @endif
@endsection
