@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-11">
            <div class="card">
                <div class="card-header">All the hobbies</div>

                <div class="card-body">
                   <ul class="list list-group">
                   @foreach($hobbies as $hobby)
                   <li class="list-group-item">
                   <a href="/hobby/{{ $hobby->id}}" title="Show details">{{ $hobby->name }}</a>
                   <a href="hobby/{{ $hobby->id}}/edit" class="btn btn-sm btn-light ml-2"><i class="fas fa-edit"></i>Edit Hobby</a>
                   <form class="float-right" style="display: inline" action="/hobby/{{ $hobby->id }}" method="post">
                                        @csrf
                                        @method("DELETE")
                                        <input class="btn btn-sm btn-outline-danger" type="submit" value="Delete">
                                    </form>

                   </li>
                   @endforeach
                   </ul>
                </div>
            </div>
                <div class="mt-2">
                  <a class="btn btn-success btn-sm" href="/hobby/create"> <i class="fas fa-plus-circle"></i> Create new hobby</a>
                </div>
        </div>
    </div>
</div>
@endsection
