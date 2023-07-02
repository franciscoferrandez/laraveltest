@extends('layouts.app')

@section('content')
    <div class="container">
        <div class="row">
            <div class="col-md-12">
                <div class="card">
                    <div class="card-header">
                        Edit Category
                    </div>
                    <div class="card-body">
                        <form action="{{ route('categories.update', $category->id) }}" method="POST" name="mainForm">
                            @method("put")
                            @csrf
                            <div class="form-group">
                                <label for="name">Category</label>
                                <input type="text" class="form-control" name="name" value="{{ $category->name }}" >
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
