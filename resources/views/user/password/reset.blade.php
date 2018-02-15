@extends('layouts.top-layout')
@section('content')
    @if ($errors->any())
        <div class="alert alert-danger" role="alert">
            <ul class="mb-0">
                @foreach ($errors->all() as $error)
                    <li>{{ $error }}</li>
                @endforeach
            </ul>
        </div>
    @endif
    <div class="card">
        <div class="card-header">
            please make new password
        </div>
        <div class="card-body">
            <form method="POST" action="{{ route('user.password.reset', [$token]) }}">
                {{ csrf_field() }}
                <input type="hidden" name="token" value="{{ $token }}">
                <div class="form-group">
                    <input type="text" class="form-control" id="email" name="email" value="{{ old('email') }}" placeholder="Email">
                </div>
                <div class="form-group">
                    <input type="password" class="form-control" id="password" name="password" placeholder="New Password">
                    <input type="password" class="form-control" id="password_confirmation" name="password_confirmation" placeholder="New Password for confirmation">
                </div>
                <button type="submit" class="btn btn-primary">Submit</button>
            </form>
        </div>
    </div>
@endsection
