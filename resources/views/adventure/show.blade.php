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
          <div class="pull-left"><h3>Adventure</h3></div>
          <div class="pull-right">
            <div class="btn-group">
              <a href="{{ route('adventure.create') }}" class="btn btn-info" >New Milestrone</a>
            </div>
          </div>
          <div class="table-container">
            <table id="mytable" class="table table-bordred table-striped">
             <thead>
               <th>Title</th>
               <th>Edit</th>
               <th>Delete</th>
             </thead>
             <tbody>
              <!-- if($adventures->count())
              foreach($adventures as $adventure) -->
              <tr>
                <td>{{$adventure->name}}</td>
                <td><a class="btn btn-primary btn-xs" href="{{action('AdventureController@edit', $adventure)}}" ><span class="glyphicon glyphicon-pencil"></span></a></td>
                <td>
                  <form action="{{action('AdventureController@destroy', $adventure->id)}}" method="post">
                   {{csrf_field()}}
                   <input name="_method" type="hidden" value="DELETE">

                   <button class="btn btn-danger btn-xs" type="submit"><span class="glyphicon glyphicon-trash"></span></button>
                </td>
              </tr>
               <!-- endforeach
               else
               <tr>
                <td colspan="8">There are not register !!</td>
              </tr>
              endif -->
             </tbody>
            </table>
          </div>
        </div>
      </div>
    </div>
</section>

@endsection
