@extends('layouts.app')

@section('content')
    <div class="container">
        <div class="row">
            <div class="col-md-12">
                <div class="card">
                    <div class="card-header">
                        New Book
                    </div>
                    <div class="card-body">
                        <form action="{{ route('books.save') }}" method="POST" name="mainForm">
                            @csrf
                            <div class="form-group">
                                <label for="isbn">ISBN</label>
                                <input type="text" class="form-control" name="isbn" >
                            </div>
                            <div class="form-group">
                                <label for="title">Title</label>
                                <input type="text" class="form-control" name="title" >
                            </div>
                            <div class="form-group">
                                <label for="category_id">Category</label>
                                <select class="form-control" id="category_id" name="category_id">
                                    <option value="0">Select one...</option>
                                    @foreach($categories as $category)
                                        <option value="{{$category->id}}">{{$category->name}}</option>
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
