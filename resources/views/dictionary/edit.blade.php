@extends('layouts.layout')
@section('content')
<div class="row">
	<section class="content">
		<div class="col-md-8 col-md-offset-2">
			@if (count($errors) > 0)
			<div class="alert alert-danger">
				<strong>Error!</strong> Review the required fields.<br><br>
				<ul>
					@foreach ($errors->all() as $error)
					<li>{{ $error }}</li>
					@endforeach
				</ul>
			</div>
			@endif
			@if(Session::has('success'))
			<div class="alert alert-info">
				{{Session::get('success')}}
			</div>
			@endif

			<div class="panel panel-default">
				<div class="panel-heading">
					<h3 class="panel-title">Editing Term</h3>
                </div>
				<div class="panel-body">
					<div class="table-container">
						<form method="POST" action="{{ route('dictionary.update',$term->id) }}"  role="form">
							{{ csrf_field() }}
							<input name="_method" type="hidden" value="PATCH">
							<div class="row">
								<div class="col-xs-6 col-sm-6 col-md-6">
									<div class="form-group">
                                        <label for="term">Term</label>
										<input type="text" name="term" id="term" class="form-control input-sm" value="{{$term->term}}">
									</div>
								</div>
								<div class="col-xs-6 col-sm-6 col-md-6">
									<div class="form-group">
                                        <label for="language">Language</label>
										<input type="text" name="language" id="language" class="form-control input-sm" value="{{$term->language}}">
									</div>
								</div>
								<div class="col-xs-6 col-sm-6 col-md-6">
									<div class="form-group">
                                        <label for="translate_if">ID Translate</label>
										<input type="text" name="translate_id" id="translate_id" class="form-control input-sm" value="{{$term->translate_id}}">
									</div>
								</div>
							</div>
                            <div class="col-xs-12 col-sm-12 col-md-12">
                                <input type="submit"  value="Update" class="btn btn-success btn-block">
                                <a href="{{ route('dictionary.index') }}" class="btn btn-info btn-block" >Back</a>
                            </div>
							</div>
						</form>
					</div>
				</div>
			</div>
		</div>
    </section>
</div>
@endsection
