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
                        <form method="post" action="{{ route('project.store') }}">
                            <div class="form-group">
                                @csrf
                                <label for="name">Naziv projekta:</label>
                                <input type="text" class="form-control" name="name">
                            </div>
                            <div class="form-group">
                                <label for="description">Opis projekta:</label>
                                <input type="text" class="form-control" name="description">
                            </div>
                            <div class="form-group">
                                <label for="price">Cijena:</label>
                                <input type="number" class="form-control" name="price">
                            </div>
                            <div class="form-group">
                                <label for="tasks_done">Zadaci:</label>
                                <input type="text" class="form-control" name="tasks_done">
                            </div>
                            <div class="form-group">
                                <label for="start">Početak:</label>
                                <input type="date" class="form-control" name="start">
                            </div>
                            <div class="form-group">
                                <label for="finish">Kraj:</label>
                                <input type="date" class="form-control" name="finish">
                            </div>
                            <div class="form-group">
                                <label for="members">Članovi:</label>
                                <div class="checkbox">
                                    @foreach($users as $user)
                                        <input type="checkbox" value="" name="members"> {{ $user->name }} <br>
                                    @endforeach
                                </div>
                            </div>
                            <button type="submit" class="btn btn-primary">Dodaj projekt</button>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
