@extends('layouts/top-layout')

@section('content')

<div class="page-header">
  <h1>{{Auth::user()->name}} <small>Subtext for header</small></h1>
</div>


<div class="container center-block">

    @foreach($profiles as $profile)


    {{-- サイズの調整と条件分岐（画像がなければデフォルトを使用） --}}
    <img id="profile-img" src="{{ Request::root() }}/{{$profile->photo}}" alt="" class="center-block img-circle img-responsive">

    <div class="panel panel-default">
        <div class="panel-body">
            <h3>free omment:</h3>
            {{$profile->comment}}
        </div>
    </div>
    <a href="{{route('profile.edit', $profile->id)}}"><button type="button" class="btn btn-default btn-lg btn-block">Edit this profile</button></a>
    @endforeach

</div>
@endsection
