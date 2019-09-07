@extends('layouts.layout')
@section('content')
<div class="row">
  <section class="content">
    <div class="col-md-8 col-md-offset-2">
      @if(Session::has('success'))
      <div class="alert alert-info">
        {{Session::get('success')}}
      </div>
      @endif
      <div class="panel panel-default">
        <div class="panel-body">
          <div class="pull-left"><h3>Term</h3></div>
          <div class="pull-right">
            <div class="btn-group">
              <!-- <a href="{{ route('dictionary.create') }}" class="btn btn-info" >New Milestrone</a> -->
            </div>
          </div>
          <div class="table-container">
            <table id="mytable" class="table table-bordred table-striped">
             <thead>
               <th>Term</th>
               <th>Language</th>
               <th>ID Translate</th>
               <th>Edit</th>
               <th>Delete</th>
             </thead>
             <tbody>
              <tr>
                <td>{{$term->term}}</td>
                <td>{{$term->language}}</td>
                <td>{{$term->translate_id}}</td>
                <td><a class="btn btn-primary btn-xs" href="{{action('DictionaryController@edit', $term)}}" ><span class="glyphicon glyphicon-pencil"></span></a></td>
                <td>
                </td>
              </tr>
             </tbody>
            </table>
            <table>
             <tbody>
              <tr>
                <a href="{{ route('dictionary.index') }}" class="btn btn-info btn-block" >Index</a>
              </tr>
             </tbody>
            </table>
          </div>
        </div>
      </div>
    </div>
</section>

@endsection
