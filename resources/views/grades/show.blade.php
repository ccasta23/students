@extends('layouts.base')

@section('title', 'Show | ' . $student->name  )

@section('content')
    <article class="container">
        <section class="row">
            <div class="col-12">
                <h1 class="text-center alert alert-success">{{ $student->name }} {{$student->lastname}}</h1>
            </div>
        </section>
        <section class="row my-4">
            <div class="col-12">
                <div class="card mb-3">
                    <div class="row g-0">
                        <div class="col-4">
                            <img src="https://www.gravatar.com/avatar/{{$student->email_hashed}}?d=robohash&s=400" class="img-fluid rounded-start" alt="...">
                        </div>
                        <div class="col-8">
                            <div class="card-body">
                                <h5 class="card-title">{{ $student->name }} {{$student->lastname}} <span class="badge rounded-pill bg-success">{{$student->average}}</span></h5>
                                <p class="card-text">Code: {{$student->code}}</p>
                                <p class="card-text">Document: {{$student->document}}</p>
                                <p class="card-text">Birth date: {{$student->birth_date}}</p>
                                <p class="card-text"><small class="text-muted">{{$student->email}}</small></p>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </section>
    </article>
@endsection
