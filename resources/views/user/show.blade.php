@extends('layouts.app')

@section('content')
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-md-11">
                <div class="card">
                    <div class="card-header">{{ $user->name }}</div>

                    <div class="card-body">
                        <p>My motto: <b>{{ $user->motto }}</b></p>
                        <p>About me: {{ $user->about_me }}</p>

                        <h5 class="my-3">Hobbies of {{ $user->name }}</h5>
                        @if($user->hobbies->count() > 0)
                            <ul class="list-group">
                                @foreach($user->hobbies as $hobby)
                                    <li class="list-group-item">
                                        <a title="Show details"
                                           href="/hobby/{{ $hobby->id }}">{{ $hobby->name }}</a>
                                        <span
                                            class="float-right mx-2">{{ $hobby->created_at->diffForHumans() }}</span>
                                        <br>
                                        @foreach($hobby->tags as $tag)
                                            <a href="/hobby/tag/{{ $tag->id }}"><span
                                                    class="badge badge-{{ $tag->style }}">{{ $tag->name }}</span></a>
                                        @endforeach
                                    </li>
                                @endforeach
                            </ul>
                        @else
                            <p>{{ $user->name }} has not created any hobbies yet.</p>
                        @endif
                    </div>
                </div>
                <div class="mt-4">
                    <a class="btn btn-primary btn-sm"
                       href="{{ URL::previous() == URL::current() ? '/hobby' : URL::previous() }}">
                        <i class="fas fa-arrow-circle-up"></i> Back to Overview</a>
                </div>
            </div>
        </div>
    </div>
@endsection
