@extends('layouts.main')
@section('content')
    <div class="row">
        <div class="col-md-12"><h4>Please attach what you have on fridge and what you feel like eating</h4></div>
    </div>
    {{ Form::open(array('url' => 'recipes/find', 'method' => 'post', 'files' => true, 'role' => 'form')) }}
        <div class="form-group">
        {{ Form::label('fridge-items', 'Fridge Items') }}
        {{ Form::file('fridge-items') }}
        {{ $errors->first('fridge-items', '<div>:message</div>')}}
        </div>
        
        <div class="form-group">
        {{ Form::label('recipes', 'Avalable Recipes') }}
        {{ Form::file('recipes') }}
        {{ $errors->first('recipes', '<div>:message</div>')}}
        </div>
        {{ Form::submit('submit', array('class' => 'btn btn-primary')) }}
    {{ Form::close() }}
@stop
