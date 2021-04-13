@extends('layouts.app')

@section('content')
    <div class="container">
        <div class="col-md-12">
            @isset($filter)
                <div class="card-header">Filtered hobbies by
                    <span class="badge badge-{{ $filter->style }}">{{ $filter->name }}</span>
                    <span class="float-right"><a href="/hobby">Show all Hobbies</a></span>
                </div>
            @else
                <div class="card-header">All the hobbies
                </div>
            @endisset
                <div class="row">
                <!-- Card -->
                @foreach($hobbies as $hobby)
                    <div class="col-md-4 ">
                        <div class="card promoting-card">
                        <!-- Card content -->
                            <!-- Subtitle -->
                            <p class="card-text mx-3" >
                            Posted by: 
                            <a style="text-decoration-line: none" href="/user/{{ $hobby->user->id }}">
                            {{ $hobby->user->name }}
                            </a>
                            <i class="far fa-clock pr-2 ml-5"></i>{{ $hobby->created_at->diffForHumans() }}
                            </p>
                            <div class="card-body d-flex">
                                <!-- Avatar -->
                                @if(file_exists('img/users/' . $hobby->user->id . '_thumb.jpg'))
                                    <a title="Show Details" href="/user/{{ $hobby->user->id }}">
                                    <img src="/img/users/{{$hobby->user->id}}_thumb.jpg"
                                    class="rounded-circle mr-3" height="50px" width="50px" alt="Hobby Thumb">
                                    </a> 
                                @endif
                                    <div>
                                    <!-- Content -->
                                    <!-- Title -->
                                        <h5 class="card-title mb-2">
                                        <a style="text-decoration-line: none" title="Show Details" href="/hobby/{{ $hobby->id }}">
                                        {{ $hobby->name }}
                                        </a>
                                        </h5>
                                    </div>
                   
                            </div>
                                <!-- Card image -->
                                @if(file_exists('img/hobbies/' . $hobby->id . '_thumb.jpg'))
                                    <div class="view overlay">
                                        <img class="card-img-top rounded-0" src="/img/hobbies/{{ $hobby->id }}_large.jpg" 
                                        height="300" alt="Card image cap">
                                        <a href="#!">
                                            <div class="mask rgba-white-slight">
                                            </div>
                                        </a>
                                    </div>
                                @endif
                                <!-- Card content -->
                                <div class="card-body">
                                    <div class="collapse-content">
                                        <!-- Text -->
                                        <p style="color:gray">{{ $hobby->description }}</p>
                                        @foreach($hobby->tags as $tag)
                                        <a href="/hobby/tag/{{ $tag->id }}">
                                            <span class="badge badge-{{ $tag->style }}">{{ $tag->name }}</span>
                                        </a>
                                        @endforeach
                                    </div>
                                    @auth
                                    <div class="m-2">
                                        <a class="btn btn-sm btn-outline-primary text-wrap" href="/hobby/{{ $hobby->id }}/edit">
                                        <i class="fas fa-edit"></i> Edit Hobby
                                        </a>
                                        @endauth
                                        @auth
                                        <form class="float-right" style="display: inline" action="/hobby/{{ $hobby->id }}" method="post">
                                        @csrf
                                        @method("DELETE")
                                        <input class="btn btn-sm btn-outline-danger" type="submit" value="Delete">
                                        </form>
                                    @endauth
                                    </div>
                                </div>
                            </div>
                        </div>
                @endforeach
        </div>
    </div>

    <div class="mt-3">
        {{ $hobbies->links() }}
    </div>
    @auth
    <div class="mt-2">
        <a class="btn btn-success btn-sm m-3" href="/hobby/create">
            <i class="fas fa-plus-circle"></i> Create new Hobby</a>
    </div>
    @endauth

@endsection