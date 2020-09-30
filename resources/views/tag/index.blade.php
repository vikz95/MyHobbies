@extends('layouts.app')

@section('content')
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-md-11">
                <div class="card">
                    <div class="card-header">All the tags</div>

                    <div class="card-body">
                        <ul class="list-group">
                            @foreach($tags as $tag)
                                <li class="list-group-item">
                                    <h2 class="d-inline"><span class="badge badge-{{ $tag->style }}">{{ $tag->name }}</span></h2>
                                    <a class="btn btn-light btn-sm ml-2" href="/tag/{{ $tag->id }}/edit"><i
                                            class="fas fa-edit"></i>Edit Tag</a>
                                    <form class="float-right" style="display: inline" action="/tag/{{ $tag->id }}" method="post">
                                        @csrf
                                        @method('DELETE')
                                        <input class="btn btn-sm btn-outline-danger" type="submit" value="Delete">
                                    </form>
                                </li>
                            @endforeach
                        </ul>
                    </div>
                </div>

                <div class="mt-2">
                    <a class="btn btn-success btn-sm" href="/tag/create"><i class="fas fa-plus-circle"></i> Create new Tag</a>
                </div>
            </div>
        </div>
    </div>
@endsection