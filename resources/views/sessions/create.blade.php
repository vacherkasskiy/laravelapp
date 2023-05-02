@extends('layout.app')

@section('title', 'Log in')

@section('content')

    <div style="height:100%;width:100%;display: flex;justify-content: center;align-items: center">
        <div style="padding:40px;width:400px;height: 600px;display: flex;flex-direction: column;align-items: center;justify-content: center;">
            <h2>Log In</h2>
            <form method="POST" action="/login">
                {{ csrf_field() }}
                <div class="form-group" style="margin: 10px;">
                    <label for="email">Email:</label>
                    <input type="email" class="form-control" id="email" name="email">
                </div>

                <div class="form-group" style="margin: 10px;">
                    <label for="password">Password:</label>
                    <input type="password" class="form-control" id="password" name="password">
                </div>

                <div class="form-group" style="margin: 10px;">
                    <button style="cursor:pointer" type="submit" class="btn btn-primary">Log in</button>
                </div>
            </form>
        </div>
    </div>

@endsection
