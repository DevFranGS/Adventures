@extends('layouts.layout')
<div class="flex-center position-ref full-height">
    <div class="container">
        <div class="title m-b-md">
            New Adventure
        </div>
        <form class="form-horizontal" method="POST" action="{{ route('adventure.store') }}">
            @foreach ($errors->all() as $error)
                <p class="alert alert-danger">{{ $error}}</p><br>
            @endforeach
            {!! csrf_field() !!}
            <fieldset>
                <div class="form-group">
                    <label for="name" class="col-lg-2 control-label">Title</label>
                    <div class="col-lg-10">
                        <input type="text" class="form-control" value="{{ old('name')}}" id="name" placeholder="name" name="name">
                    </div>
                </div>
                <div class="form-group">
                    <div class="col-lg-10 col-lg-offset-2">
                    <button class="btn btn-default">Cancel</button>
                    <button type="submit" class="btn btn-primary">Save</button>
                    <a href="{{ route('adventure.index') }}" class="btn btn-info btn-block" >Index</a>
                </div>
            </fieldset>
        </form>
    </div>
</div>
