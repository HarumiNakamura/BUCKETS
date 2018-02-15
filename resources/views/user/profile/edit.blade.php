@extends('layouts/top-layout')



@section('content')

<div class="page-header">
  <h1>{{Auth::user()->name}} <small>Editing profile</small></h1>
</div>



{!! Form::model($profile, ['method'=>'PATCH', 'action'=>['User\UserProfileController@update', $profile->id], 'files'=>true]) !!}

<img id="profile-img" src="{{ Request::root() }}/{{$profile->photo}}" alt="" class="center-block img-circle">
<div class="form-group">
  {!! Form::label('photo', 'Photo:')!!}
  {!! Form::file('photo', null, ['class'=>'form-control']) !!}
</div>


<div class="form-group">
  {!! Form::text('name', Auth::user()->name, ['class'=>'form-control']) !!}
</div>

<div class="form-group">
  {!! Form::label('comment', 'introduction')!!}
  {!! Form::textarea('comment',null, ['class'=>'form-control']) !!}
</div>

<div class="form-group">
  {!! Form::submit('Submit', ['class'=>'btn btn-primary']) !!}
</div>

{!! Form::close() !!}






@endsection
