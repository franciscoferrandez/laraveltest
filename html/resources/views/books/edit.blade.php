@extends('layouts.app')

@section('content')
    <div class="container">
        <div class="row">
            <div class="col-md-12">
                <div class="card">
                    <div class="card-header">
                        Edit Book
                    </div>
                    <div class="card-body">
                        <form action="{{ route('books.update', $book->id) }}" method="POST" name="mainForm">
                            @method("put")
                            @csrf
                            <div class="form-group">
                                <label for="isbn">ISBN</label>
                                <input type="text" class="form-control" name="isbn" value="{{ $book->isbn }}" >
                            </div>
                            <div class="form-group">
                                <label for="title">Title</label>
                                <input type="text" class="form-control" name="title" value="{{$book->title}}" >
                            </div>
                            <div class="form-group">
                                <label for="category_id">Category</label>
                                <select class="form-control" id="category_id" name="category_id">
                                    <option value="0">Select one...</option>
                                    @foreach($categories as $category)
                                        <option value="{{$category->id}}" {{$category->id == $book->category_id ? 'selected' : ''}} >{{$category->name}}</option>
                                    @endforeach
                                </select>
                            </div>
                        </form>
                    </div>
                    <div class="card-footer">
                        <button onclick="document.mainForm.submit();" class="btn btn-primary">Save</button>
                        <a href="{{ route('books.index') }}" class="btn btn-warning">Cancel</a>
                    </div>
                </div>

            </div>
        </div>
    </div>
@endsection
