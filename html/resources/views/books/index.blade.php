@extends('layouts.app')

@section('content')
    <div class="container">
        <div class="row">
            <div class="col-md-12">
                <div class="card">
                    <div class="card-header">
                        Books
                        <a class="btn btn-sm btn-success float-end" href="{{ route('books.create') }}">Nuevo</a>
                    </div>
                    <div class="card-body">
                        <table class="table table-hover table-sm">
                            <thead>
                            <th>
                                ISBN
                            </th>
                            <th>
                                Title
                            </th>
                            <th>
                                Category
                            </th>
                            <th style="width: 100px;">
                                &nbsp;
                            </th>
                            </thead>
                            <tbody>
                            @foreach($books as $book)
                                <tr>
                                    <td>
                                        {{ $book->isbn }}
                                    </td>
                                    <td>
                                        {{ $book->title }}
                                    </td>
                                    <td>
                                        {{ $book->category ? $book->category->name : 'N/A' }}
                                    </td>
                                    <td>
                                        <a href="{{ route('books.edit', $book->id) }}" class="btn btn-warning btn-sm"><i
                                                class="fa-solid fa-edit"></i></a>
                                        <a href="javascript: document.getElementById('delete-{{$book->id}}').submit();"
                                           class="btn btn-danger btn-sm"><i class="fa-solid fa-trash"></i></a>
                                        <form id="delete-{{$book->id}}" action="{{ route('books.delete', $book->id) }}"
                                              class="d-none" method="POST">
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
