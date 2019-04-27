@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-10">
            <div class="card">
                <div class="card-header">Popis projekata</div>

                <div class="card-body">
                    @if (session('status'))
                        <div class="alert alert-success" role="alert">
                            {{ session('status') }}
                        </div>
                    @endif

                    <table class="table table-striped">
                        <thead>
                        <tr>
                            <td>Naziv</td>
                            <td>Voditelj</td>
                            <td>Opis</td>
                            <td>Cijena</td>
                            <td>Početak</td>
                            <td>Kraj</td>
                        </tr>
                        </thead>
                        <tbody>
                        @foreach(Auth::user()->projects as $project)
                            <tr>
                                <td>{{ $project->name }}</td>
                                <td>{{ $project->user_id }}</td>
                                <td>{{ $project->description }}</td>
                                <td>{{ $project->price }} kn</td>
                                <td>{{ $project->start }}</td>
                                <td>{{ $project->finish }}</td>
                                <td><a href="{{ route('project.edit', $project->id) }}" class="btn btn-primary">Izmjeni</a></td>
                                <td>
                                    <form action="{{ route('project.destroy', $project->id) }}" method="post">
                                        @csrf
                                        @method('DELETE')
                                        <button class="btn btn-danger" type="submit">Obriši</button>
                                    </form>
                                </td>
                            </tr>
                        @endforeach
                        </tbody>
                    </table>

                    <a href="{{ url('/add_project') }}">Add new project</a>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
