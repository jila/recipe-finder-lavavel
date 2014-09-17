@extends('layouts.main')
@section('content')
    <div class="row">
        <div class="col-md-12"><h4>Your choises for dinner are</h4></div>
    </div> 
    @foreach ($dinner as $choice)
        <div class="row">
            <div class="col-md-12">{{{ $choice }}}</div>
        </div>
    @endforeach
    <div class="row">
        <div class="col-md-12">Enjoy!!!</div>
    </div>        
@stop
