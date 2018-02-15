@extends('layouts.top-layout')

@section('content')

<span>Hello!{{ Auth::user()->name }}</span>

@endsection
