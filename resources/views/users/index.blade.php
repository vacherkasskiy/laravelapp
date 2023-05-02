@extends('layout.app')

@section('title', 'Users')

@section('content')
    @if(auth()->check() && auth()->user()->role == 'admin')
        <table class="table">
            <thead>
            <tr>
                <th scope="col">#</th>
                <th scope="col">NAME</th>
                <th scope="col">EMAIL</th>
                <th scope="col">ROLE</th>
            </tr>
            </thead>
            <tbody>
            @foreach($users as $user)
                @if ($user->id != auth()->user()->id)
                    <tr>
                        <td>{{ $user->id }}</td>
                        <td>{{ $user->name }}</td>
                        <td>{{ $user->email }}</td>
                        <td>{{ $user->role }}</td>
                        <td>
                            <a href="{{ route('users.edit', $user->id) }}">
                                <button class="btn btn-info btn-sm">Edit</button>
                            </a>
                            <form method="POST" action="{{ route('users.destroy', $user->id) }}">
                                @csrf
                                @method('DELETE')
                                <button type="submit" class="btn btn-danger btn-sm">Delete</button>
                            </form>
                        </td>
                    </tr>
                @endif
            @endforeach
            </tbody>
        </table>
    @else
        <div style="width: 100%;height: 100%;display: flex;justify-content: center;align-items: center">
            <h1 style="font-size:30px;color:red;">You don't have access to this section.</h1>
        </div>
    @endif
@endsection
