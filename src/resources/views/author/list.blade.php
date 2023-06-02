@extends('layout')

@section('content')

    <h1>{{$title}}</h1>
    <hr>

    @if (count($items) > 0)

        <table class="table table-striped table-hover table-sm">
            <thead>
                <tr>
                    <th>ID</th>
                    <th>Name</th>
                    <th>Actions</th>
                </tr>
            </thead>
            <tbody>
                @foreach($items as $author)
                    <tr>
                        <td>{{$author->id}}</td>
                        <td>{{$author->name}}</td>
                        <td><a href="/authors/update/{{$author->id}}" class="btn btn-outline-primary btn-sm">Edit</a> / <form method="post" action="/authors/delete/{{ $author->id }}" class="deletion-form d-inline">
                            @csrf 
                            <button type="submit" class="btn btn-outline-danger btn-sm">Delete</button>
                        </form></td>
                    </tr>
                @endforeach
            </tbody>
        </table>

    @else
        <p>Nav atrasts neviens ieraksts</p>

    @endif

    <a href="/authors/create" class="btn btn-primary">Add new author</a>

@endsection