@extends('layouts.layout')
<div class="flex-center position-ref full-height">
    <div class="container">
        <div class="title m-b-md">
            New Term
        </div>
        <form class="form-horizontal" method="POST" action="{{ route('dictionary.store') }}">
            @foreach ($errors->all() as $error)
                <p class="alert alert-danger">{{ $error}}</p><br>
            @endforeach
            {!! csrf_field() !!}
            <fieldset>
                <div class="form-group">
                    <label for="id" class="col-lg-2 control-label">ID</label>
                    <div class="col-lg-10">
                        <input type="text" class="form-control" value="{{ old('id')}}" id="id" placeholder="id" name="id" disabled>
                    </div>
                </div>
                <div class="form-group">
                    <label for="term" class="col-lg-2 control-label">Term</label>
                    <div class="col-lg-10">
                        <input type="text" class="form-control" value="{{ old('term')}}" id="term" placeholder="term" name="term">
                    </div>
                </div>
                <div class="form-group">
                    <label for="language" class="col-lg-2 control-label">Language</label>
                    <div class="col-lg-10">
                        <input type="text" class="form-control" value="{{ old('language')}}" id="language" placeholder="language" name="language">
                    </div>
                </div>
                <div class="form-group">
                    <label for="translate_id" class="col-lg-2 control-label">ID Translate</label>
                    <div class="col-lg-10">
                        <input type="text" class="form-control" value="{{ old('translate_id')}}" id="translate_id" placeholder="translate_id" name="translate_id">
                    </div>
                </div>
                <div class="form-group">
                    <div class="col-lg-10 col-lg-offset-2">
                    <button class="btn btn-default">Cancel</button>
                    <button type="submit" class="btn btn-primary">Save</button>
                                <a href="{{ route('dictionary.index') }}" class="btn btn-info btn-block" >Index</a>
                </div>
            </fieldset>
        </form>
    </div>
</div>
