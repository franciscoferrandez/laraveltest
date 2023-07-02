@extends('layouts.app')

@section('content')
    <div class="container">
        <div class="row">
            <div class="col-md-12">
                <div class="card">
                    <div class="card-header">
                        New Category
                    </div>
                    <div class="card-body">
                        <form action="{{ route('categories.save') }}" method="POST" name="mainForm">
                            @csrf
                            <div class="form-group">
                                <label for="name">Category</label>
                                <input type="text" class="form-control" name="name" >
                            </div>
                        </form>
                    </div>
                    <div class="card-footer">
                        <button onclick="document.mainForm.submit();" class="btn btn-primary">Save</button>
                        <a href="{{ route('categories.index') }}" class="btn btn-warning">Cancel</a>
                    </div>
                </div>

            </div>
        </div>
    </div>
@endsection
