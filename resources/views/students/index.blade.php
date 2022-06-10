<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ __('Students') }}
        </h2>
    </x-slot>
    <article class="container">
        <section class="row">
            <h1 class="col alert alert-success text-center">Students</h1>
        </section>
    </article>
    <article class="container">
        <section class="row">
            <div class="col">
                <table class="table table-bordered table-striped">
                    <thead>
                    <tr>
                        <th>Code</th>
                        <th>Document</th>
                        <th>Name</th>
                        <th>Lastname</th>
                        <th>Average</th>
                        <th>Birth date</th>
                        <th>Email</th>
                        <th>Show</th>
                        <th>Edit</th>
                        <th>Delete</th>
                    </tr>
                    </thead>
                    <tbdody>
                        @foreach($students as $student)
                            <tr>
                                <td>{{$student->code}}</td>
                                <td>{{$student->document}}</td>
                                <td>{{$student->name}}</td>
                                <td>{{$student->lastname}}</td>
                                <td>{{$student->average}}</td>
                                <td>{{$student->birth_date}}</td>
                                <td>{{$student->email}}</td>
                                <td><a href="/students/{{$student->id}}" class="btn btn-primary">Show</a></td>
                                <td><a href="/students/{{$student->id}}/edit" class="btn btn-success">Edit</a></td>
                                <td>
                                    <form action="/students/{{$student->id}}" method="POST">
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
                <a href="/students/create" class="btn btn-success text-center">Create new student</a>
            </div>
        </section>
    </article>
</x-app-layout>
