@extends('layout')

@section('content')

    <h1>{{$title}}</h1>
    <hr>

    @if (count($items) > 0)

        <table class="table table-striped table-hover table-sm">
            <thead>
                <tr>
                    <th>ID</th>
                    <th>Title</th>
                    <th>Author</th>
                    <th>Year</th>
                    <th>Price</th>
                    <th>Posted</th>
                    <th>Actions</th>
                </tr>
            </thead>
            <tbody>
                @foreach($items as $book)
                    <tr>
                        <td>{{$book->id}}</td>
                        <td>{{$book->name}}</td>
                        <td>{{$book->author->name}}</td>
                        <td>{{$book->year}}</td>
                        <td>&euro; {{ number_format($book->price, 2, '.') }}</td>
                        <td>{!! $book->display ? '&#10004;&#65039;' : '&#10060;' !!}</td>
                        <td><a href="/books/update/{{$book->id}}" class="btn btn-outline-primary btn-sm">Edit</a> / <form method="post" action="/books/delete/{{ $book->id }}" class="deletion-form d-inline">
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

    <a href="/books/create" class="btn btn-primary">Add new book</a>

@endsection