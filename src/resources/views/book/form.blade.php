@extends('layout')

@section('content')

    <h1>{{$title}}</h1>
    <hr>

    @if ($errors->any())
        <div class="alert alert-danger" role="alert">Woops! Fix the problem!</div>
    
    @endif

        <form method="post" action="{{ $book->exists ? '/books/patch/' . $book->id : '/books/put' }}">
            @csrf
                <div class="mb-3">
                    <label for="book-name" class="form-label">Title</label>
                    <input type="text" id="book-name" name="name" class="form-control @error('name') is-invalid @enderror" value="{{ old('name', $book->name) }}">
                    @error('name')
                        <p class="invalid-feedback">{{$errors->first('name')}}</p>
                    @enderror
                </div>

                <div class="mb-3">
                    <label for="book-author" class="form-label">Author</label>
                    <select id="book-author" name="author_id" class="form-select @error('author_id') is-invalid @enderror">
                        <option value="">Pick the author!</option>
                        @foreach($authors as $author)
                            <option value="{{$author->id}}" @if ($author->id ==old('author_id', $book->aithor->id ?? false)) selected @endif>{{$author->name}}</option>
                        @endforeach
                    </select>

                    @error('author_id')
                        <p class="invalid-feedback">{{$errors->first('author_id')}}</p>
                    @enderror
                </div>

                <div class="mb-3">
                    <label for="book-description" class="form-label">Description</label>
                    <textarea id="book-description" name="description" class="form-control @error('description') is-invalid @enderror">{{old('description', $book->description)}}</textarea>
                    @error('description')
                        <p class="invalid-feedback">{{$errors->first('description')}}</p>
                    @enderror
                </div>

                <div class="mb-3">
                    <label for="book-year" class="form-label">Year</label>
                    <input type="number" max="{{date('Y') + 1}}" step="1" id="book-year" name="year" class="form-control @error('year') is-invalid @enderror" value="{{ old('year', $book->year) }}">
                    @error('year')
                        <p class="invalid-feedback">{{$errors->first('year')}}</p>
                    @enderror
                </div>

                <div class="mb-3">
                    <label for="book-price" class="form-label">Price</label>
                    <input type="number" min="0.00" step="0.01" lang="en" id="book-price" name="price" class="form-control @error('price') is-invalid @enderror" value="{{ old('price', $book->price) }}">
                    @error('price')
                        <p class="invalid-feedback">{{$errors->first('price')}}</p>
                    @enderror
                </div>

                <div class="mb-3">
                    <div class="form-check">
                        <input type="checkbox" id="book-display" name="display" value="1" class="form-check-input @error('displsy') is-invalid @enderror" @if (old('display', $book->display)) checked @endif>
                        <label class="form-check-label" for="book-display">Publish a record</label>
                        @error('display')
                        <p class="invalid-feedback">{{$errors->first('description')}}</p>
                        @enderror
                    </div>
                </div>

                <button type="submit" class="btn btn-primary">{{$book->exists ? 'Update' : 'Add'}}</button>
        </form>

@endsection