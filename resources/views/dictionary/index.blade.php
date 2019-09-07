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
          <div class="pull-left"><h3>Terms</h3></div>
          <div class="pull-right">
            <div class="btn-group">
              <a href="{{ route('dictionary') }}" class="btn btn-info" >Translate</a>
              <a href="{{ route('dictionary.create') }}" class="btn btn-info" >New Term</a>
            </div>
          </div>
          <div class="table-container">
            <table id="mytable" class="table table-bordred table-striped">
             <thead>
               <th>Term</th>
               <th>Language</th>
               <th>ID Translate</th>
               <th>View</th>
               <th>Edit</th>
               <th>Delete</th>
             </thead>
             <tbody>
              @if($terms->count())
              @foreach($terms as $termino)
              <tr>
                <td>{{$termino->term}}</td>
                <td>{{$termino->language}}</td>
                <td>{{$termino->translate_id}}</td>
                <td><a class="btn btn-primary btn-xs" href="{{action('DictionaryController@show', $termino->id)}}" ><span class="glyphicon glyphicon-eye-open"></span></a></td>
                <td><a class="btn btn-primary btn-xs" href="{{action('DictionaryController@edit', $termino->id)}}" ><span class="glyphicon glyphicon-pencil"></span></a></td>
                <td>
                  <form action="{{action('DictionaryController@destroy', $termino->id)}}" method="post">
                   {{csrf_field()}}
                   <input name="_method" type="hidden" value="DELETE">

                   <button class="btn btn-danger btn-xs" type="submit"><span class="glyphicon glyphicon-trash"></span></button>
                 </td>
               </tr>
               @endforeach
               @else
               <tr>
                <td colspan="8">There are not register !!</td>
              </tr>
              @endif
            </tbody>
          </table>
          <table>
             <tbody>
              <tr>
                <a href="{{ url('/') }}" class="btn btn-info btn-block" >Home</a>
              </tr>
             </tbody>
            </table>
        </div>
      </div>
      {{ $terms->links() }}
    </div>
  </div>
</section>

@endsection
