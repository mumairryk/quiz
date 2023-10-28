@extends('layouts.app')
@section('content')
    <div class="container d-flex justify-content-center">
        <div class="col-md-6">
            <div class="card">
                <div class="card-header">Result Page</div>
                <div class="card-body">
                    <h3>Correct Ans ({{$results->total_correct}})</h3>
                    <h3>Wrong Ans ({{$results->total_questions - ($results->total_correct+$results->total_skip)}})</h3>
                    <h3>Skip Ans ({{$results->total_skip}})</h3>
                    <!-- Show Logout Button -->
                    <a href="{{route('home')}}" class="btn btn-primary">Logout</a>
                </div>
            </div>
        </div>
    </div>
@endsection
