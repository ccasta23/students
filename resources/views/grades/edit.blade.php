@extends('layouts.base')

@section('title', 'Edit | ' . $grade->name )

@section('content')
    <article class="container">
        <section class="row">
            <h1 class="col alert alert-success text-center">Edit {{$grade->name}}</h1>
        </section>
    </article>
    <article class="container">
        <section>
            <form action="/grades/{{$grade->id}}" class="row" method="POST">
                @csrf
                @method('PUT')
                <div class="mb-3 col-6">
                    <label for="grade_name" class="form-label">Name</label>
                    <input type="text" class="form-control" id="grade_name" name="grade_name" value="{{old('grade_name', $grade->grade_name)}}">
                </div>
                <div class="mb-3 col-6">
                    <label for="grade_value_percentage" class="form-label">Percentage Value</label>
                    <input type="number" step="0.1" min="0" max="100" class="form-control" id="grade_value_percentage" name="grade_value_percentage" value="{{old('grade_value_percentage', $grade->grade_value_percentage)}}">
                </div>
                <div class="mb-3 col-6">
                    <label for="grade_deadline" class="form-label">Deadline</label>
                    <input type="datetime-local" class="form-control" id="grade_deadline" name="grade_deadline" value="{{old('grade_deadline', $grade->grade_deadline)}}">
                </div>
                <div class="mb-3 col-12 d-grid">
                    <input type="submit" value="Save" class="btn btn-success text-center">
                </div>
            </form>
            @if($errors->any())
                <div class="alert alert-danger">
                    <ul>
                        @foreach($errors->all() as $error)
                            <li>{{$error}}</li>
                        @endforeach
                    </ul>
                </div>
            @endif
        </section>
    </article>
@endsection
