@extends('layouts.app')

@section('content')
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-md-8">
                <div class="card">
                    <div class="card-header">Dodaj novi projekt</div>

                    <div class="card-body">
                        @if($errors->any())
                            <div class="alert alert-danger">
                                <ul>
                                    @foreach($errors->all() as $error)
                                        <li>{{ $error }}</li>
                                    @endforeach
                                </ul>
                            </div>
                        @endif
                        <form method="post" action="{{ route('project.update', $project->id) }}">
                            @method('PATCH')
                            @csrf
                            <div class="form-group">

                                <label for="name">Naziv projekta:</label>
                                <input type="text" class="form-control" name="name" value="{{ $project->name }}">
                            </div>
                            <div class="form-group">
                                <label for="description">Opis projekta:</label>
                                <input type="text" class="form-control" name="description" value="{{ $project->description }}">
                            </div>
                            <div class="form-group">
                                <label for="price">Cijena:</label>
                                <input type="number" class="form-control" name="price" value="{{ $project->price }}">
                            </div>
                            <div class="form-group">
                                <label for="tasks_done">Zadaci:</label>
                                <input type="text" class="form-control" name="tasks_done" value="{{ $project->tasks_done }}">
                            </div>
                            <div class="form-group">
                                <label for="start">Početak:</label>
                                <input type="date" class="form-control" name="start" value="{{ $project->start }}">
                            </div>
                            <div class="form-group">
                                <label for="finish">Kraj:</label>
                                <input type="date" class="form-control" name="finish" value="{{ $project->finish }}">
                            </div>
                            <button type="submit" class="btn btn-primary">Izmjeni</button>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
