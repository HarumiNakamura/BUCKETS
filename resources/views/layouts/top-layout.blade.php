<!DOCTYPE html>
<html>
<head>
  <meta charset="utf-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <meta name="csrf-token" content="{{ csrf_token() }}">
  <title>BUCKETs</title>

  <link rel="stylesheet" href="{{ Request::root() }}/css/styles.css">
  <link rel="stylesheet" href="{{ Request::root() }}/css/bootstrap.min.css">


  <script type="text/javascript" src="{{ Request::root() }}/js/jquery.js"></script>
  <script type="text/javascript" src="{{ Request::root() }}/js/bootstrap.min.js"></script>

</head>

<body style="background-color: ＃F4F5F7;">

    <header>
        <nav style="border:none" class="navbar navbar-default">
            <div class="container-fluid">
                <!-- Brand and toggle get grouped for better mobile display -->
                <div class="navbar-header">
                    <button type="button" class="navbar-toggle collapsed" data-toggle="collapse" data-target="#bs-example-navbar-collapse-1" aria-expanded="false">
                      <span class="sr-only">Toggle navigation</span>
                      <span class="icon-bar"></span>
                      <span class="icon-bar"></span>
                      <span class="icon-bar"></span>
                    </button>
                    <a class="navbar-brand" href="/">BUCKETS</a>
                </div>

                <!-- Collect the nav links, forms, and other content for toggling -->
                <div class="collapse navbar-collapse" id="bs-example-navbar-collapse-1">
                    <ul class="nav navbar-nav">
                        <li class="active"><a href="#">Link <span class="sr-only">(current)</span></a></li>
                        <li><a href="#">Link</a></li>
                        <li class="dropdown">
                          <a href="#" class="dropdown-toggle" data-toggle="dropdown" role="button" aria-haspopup="true" aria-expanded="false">Dropdown <span class="caret"></span></a>
                          <ul class="dropdown-menu">
                            <li><a href="#">Action</a></li>
                            <li><a href="#">Another action</a></li>
                            {{-- <li><a href="#">Something else here</a></li> --}}
                            {{-- <li role="separator" class="divider"></li>
                            <li><a href="#">Separated link</a></li> --}}
                            {{-- <li role="separator" class="divider"></li>
                            <li><a href="#">One more separated link</a></li> --}}
                          </ul>
                        </li>
                    </ul>
                    <form class="navbar-form navbar-left">
                        <div class="form-group">
                          <input type="text" class="form-control" placeholder="Search">
                        </div>
                        <button type="submit" class="btn btn-default">Submit</button>
                    </form>
                    <ul class="nav navbar-nav navbar-right">
                        {{-- <li><a href="#">Link</a></li>
                        <li class="dropdown">
                          <a href="#" class="dropdown-toggle" data-toggle="dropdown" role="button" aria-haspopup="true" aria-expanded="false">Dropdown <span class="caret"></span></a>
                          <ul class="dropdown-menu">
                            <li><a href="#">Action</a></li>
                            <li><a href="#">Another action</a></li>
                            <li><a href="#">Something else here</a></li>
                            <li role="separator" class="divider"></li>
                            <li><a href="#">Separated link</a></li>
                          </ul>
                        </li> --}}
                        @if (Auth::guest('web'))
                            <li data-toggle="modal" data-target="#login"><a>Login</a></li>
                            <li data-toggle="modal" data-target="#signup"><a>Sign Up</a></li>
                        @else
                            <li class="dropdown">
                                <a href="#" class="dropdown-toggle" data-toggle="dropdown" role="button" aria-haspopup="true" aria-expanded="false">{{Auth::user()->name}}<span class="caret"></span></a>
                                <ul class="dropdown-menu">
                                  <li><a href={{route('profile.index')}}>Profile</a></li>
                                  <li role="separator" class="divider"></li>
                                  <li><a class="nav-link" href="{{ route('user.logout') }}">Logout</a></li>
                                </ul>
                            </li>
                        @endif

                    </ul>
                </div><!-- /.navbar-collapse -->
            </div><!-- /.container-fluid -->
        </nav>
    </header>



    <div class="container">

        @yield('content')

    </div>



    <footer></footer>
</body>


</html>


{{-- login modal start --}}
                        <div class="modal fade" id="login" tabindex="-1" role="dialog">
                            <div class="modal-dialog modal-md" role="document">
                              <div class="modal-content">
                                <div class="modal-header">
                                  <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
                                  <h4 class="modal-title text-center">Log in</h4>
                                </div>
                                @if ($errors->any())
                                    <div class="alert alert-danger" role="alert">
                                        <ul class="mb-0">
                                            @foreach ($errors->all() as $error)
                                                <li>{{ $error }}</li>
                                            @endforeach
                                        </ul>
                                    </div>
                                @endif
                                <div class="modal-body">
                                    <form action="{{route('user.login')}}" method="POST">


                                        {{csrf_field()}}

                                        <div class="form-group">
                                            <input type="email" name="email" class="form-control" placeholder="Email">
                                        </div>

                                        <div class="form-group">
                                            <input type="password" name="password" class="form-control" placeholder="Password">
                                        </div>

                                        <div class="checkbox">
                                          <label>
                                            <input type="checkbox"> Check me out
                                          </label>
                                        </div>
                                        <div class="modal-footer">
                                            <button type="submit" class="btn btn-default">LogIn</button>
                                        </div>
                                        <div class="form-group mt-3">
                                            <a href="{{ route('user.password.request') }}">forget the password?</a>
                                        </div>
                                    </form>
                                </div>
                              </div>
                            </div>
                        </div>
                        {{-- login modal end --}}

                        {{-- signup modal start --}}
                        <div class="modal fade" id="signup" tabindex="-1" role="dialog">
                            <div class="modal-dialog modal-md" role="document">
                              <div class="modal-content">
                                <div class="modal-header">
                                  <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
                                  <h4 class="modal-title text-center">SignUp</h4>
                                </div>
                                <div class="modal-body">
                                    <form action="{{ route('user.register') }}" method="POST">

                                        {{csrf_field()}}

                                        <div class="form-group">
                                              @if ($errors->any())
                                                  <div class="alert alert-danger" role="alert">
                                                      <ul class="mb-0">
                                                          @foreach ($errors->all() as $error)
                                                              <li>{{ $error }}</li>
                                                          @endforeach
                                                      </ul>
                                                  </div>
                                              @endif

                                        </div>
                                        <div class="form-group">
                                            <input type="text" class="form-control" name="name" value="{{old('name')}}" placeholder="Name">
                                        </div>

                                        <div class="form-group">
                                            <input type="email" class="form-control" name="email" value="{{old('email')}}" placeholder="Email">
                                        </div>

                                        <div class="form-group">
                                            <input type="password" class="form-control" name="password" placeholder="Password">
                                        </div>

                                        <div class="form-group">
                                            <input type="password" class="form-control" name="password_confirmation" placeholder="Confirmation Password">
                                        </div>
                                        <div class="modal-footer">
                                            <button type="submit" class="btn btn-default">SignUp</button>
                                        </div>
                                    </form>
                                </div>
                              </div>
                            </div>
                        </div>
                        {{-- signup modal end --}}
