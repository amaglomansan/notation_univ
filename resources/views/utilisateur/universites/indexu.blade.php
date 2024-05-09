@extends('dashboard')
@section('content')
<div class="container">
<h2 class="font-semibold text-xl text-center text-gray-800 leading-tight">
            Les Universités du Togo
        </h2>
        <div class="row">
            @foreach ($universities as $university)
                <div class="col-md-6 mb-4">
                    <div class="card">
                        <img src='{{$university->image}}' class="card-img-top" alt="{{ $university->name }}">
                        <div class="card-body">
                            <h5 class="card-title">{{$university->name }}</h5>
                            <p class="card-text">{{ $university->description }}</p>
                            <a href='{{ $university->lien }}'class="card-text">{{ $university->lien }}</a>
                            <p class="card-text"><small class="text-muted">{{ $university->location }}</small></p>
                        </div>
                    </div>
                </div>
            @endforeach
        </div>
    </div>

@endsection