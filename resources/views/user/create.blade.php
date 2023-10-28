@extends('layouts.app')
@section('custom_css')
    <style>
        .center-container {
            display: flex;
            justify-content: center;
            align-items: center;
            height: 100vh;
        }
    </style>
@endsection
@section('content')
    <div class="center-container">
        <div class="card">
            <div class="card-header">Welcome</div>
            <div class="card-body">
                <!-- Show Error Message -->
                @if ($errors->any())
                    <div class="alert alert-danger">
                        <strong>Whoops!</strong> There were some problems with your input.
                    </div>
                @endif
                @if (session('error'))
                    <div class="alert alert-danger">
                        {{ session('error') }}
                    </div>
                @endif

                <form action="{{route('user.create')}}" method="POST">
                    @csrf
                    <div class="form-group">
                        <label for="username">Enter your name:</label>
                        <input type="text" class="form-control" id="name" name="name" required>
                    </div>
                    <button type="submit" class="btn btn-primary">Next</button>
                </form>
            </div>
        </div>
    </div>
@endsection
