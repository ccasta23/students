@extends('layouts.base')

@section('title') Grades list @endsection

@section('content')
    <article class="container">
        <section class="row">
            <h1 class="col alert alert-success text-center">Grades</h1>
        </section>
    </article>
    <article class="container">
        <section class="row">
            <div class="col">
                <table class="table table-bordered table-striped">
                    <thead>
                    <tr>
                        <th>Name</th>
                        <th>Value Percentage</th>
                        <th>Deadline</th>
                        <th>Edit</th>
                        <th>Delete</th>
                    </tr>
                    </thead>
                    <tbdody>
                        @foreach($grades as $grade)
                            <tr>
                                <td>{{$grade->grade_name}}</td>
                                <td>{{$grade->grade_value_percentage}}%</td>
                                <td>{{$grade->grade_deadline}}</td>
                                <td><a href="/grades/{{$grade->id}}/edit" class="btn btn-success">Edit</a></td>
                                <td>
                                    <form action="/grades/{{$grade->id}}" method="POST">
                                        @csrf
                                        @method('DELETE')
                                        <input
                                            type="submit"
                                            value="Delete"
                                            class="btn btn-danger"
                                            onclick="return confirm('Are you sure ?')"
                                        >
                                    </form>
                                </td>
                            </tr>
                        @endforeach
                    </tbdody>
                </table>
            </div>
        </section>
        <section class="row">
            <div class="col d-grid">
                <a href="/grades/create" class="btn btn-success text-center">Create new grade</a>
            </div>
        </section>
    </article>
@endsection
