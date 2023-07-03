@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row">
        <div class="col-md-12">
            <div class="card">
                <div class="card-header">
                    Books
                    <a class="btn btn-sm btn-success float-end" href="{{ route('categories.create') }}">Nuevo</a>
                </div>
                <div class="card-body">
                    <table class="table table-hover table-sm">
                        <thead>
                            <th>
                                Category
                            </th>
                            <th style="width: 100px;">
                                &nbsp;
                            </th>
                        </thead>
                        <tbody>
                            @foreach($categories as $category)
                            <tr>
                                <td>
                                    {{ $category->name }}
                                </td>
                                <td>
                                    <a href="{{ route('categories.edit', $category->id) }}" class="btn btn-warning btn-sm"><i class="fa-solid fa-edit"></i></a>
                                    <a href="javascript: document.getElementById('delete-{{$category->id}}').submit();" class="btn btn-danger btn-sm"><i class="fa-solid fa-trash"></i></a>
                                    <form id="delete-{{$category->id}}" action="{{ route('categories.delete', $category->id) }}" class="d-none" method="POST">
                                        @method('delete')
                                        @csrf
                                    </form>
                                </td>
                            </tr>
                            @endforeach
                        </tbody>
                    </table>
                </div>
            </div>

        </div>
    </div>
</div>
@endsection
