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
                            <div class="col-12">
                                <h2 class="text-center alert alert-success">{{ $student->name }} {{$student->lastname}} Grades</h2>
                            </div>
                            <div class="row">
                                <div class="col">
                                    <table class="table table-striped table-bordered">
                                        <thead>
                                        <tr>
                                            <th scope="col">Name</th>
                                            <th scope="col">%</th>
                                            <th scope="col">Deadline</th>
                                            <th scope="col">Value</th>
                                            <th scope="col">Update</th>
                                        </tr>
                                        </thead>
                                        <tbody>
                                        @foreach($grades as $grade)
                                            <tr>
                                                <th scope="row">{{$grade->grade_name}}</th>
                                                <td>{{$grade->grade_value_percentage}}%</td>
                                                <td>{{$grade->grade_deadline}}</td>
                                                <form
                                                    action="{{isset($grade->pivot) ? "/students/{$student->id}/grades/{$grade->pivot->id}" : "/students/{$student->id}/grades"}}"
                                                    method="POST"
                                                >
                                                    @csrf
                                                    @isset($grade->pivot)
                                                        @method('PUT')
                                                    @endisset
                                                    <input type="number" hidden="hidden" name="grade_id" value="{{$grade->id}}">
                                                    <td>
                                                        <input
                                                            value="{{isset($grade->pivot) ? $grade->pivot->grade_student : "0"}}"
                                                            step="0.1"
                                                            type="number"
                                                            name="grade_student"
                                                        >
                                                    </td>
                                                    <td>
                                                        <input type="submit" class="btn btn-success" value="Update">
                                                    </td>
                                                </form>

                                            </tr>
                                        @endforeach
                                        </tbody>
                                    </table>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </section>
    </article>
@endsection
