<!DOCTYPE html>
<html lang="en">
  <head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>{{Auth::user()->first . "'s Homework Dashboard"}}</title>

    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.5/css/bootstrap.min.css" />
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/octicons/3.1.0/octicons.min.css" />
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css" />
    <link href="https://fonts.googleapis.com/css?family=Open+Sans:400,600,700,800" rel="stylesheet" />
    <link rel="stylesheet" href="/css/dashboard.css" />
    @yield('links')

    <!--[if lt IE 9]>
      <script src="https://cdn.jsdelivr.net/html5shiv/3.7.2/html5shiv.min.js"></script>
      <script src="https://cdn.jsdelivr.net/respond/1.4.2/respond.min.js"></script>
    <![endif]-->
  </head>
  <body>
    <nav class="navbar navbar-default" role="navigation">
      <div class="container-fluid">
        <div class="navbar-header">
          <button type="button" class="navbar-toggle" data-toggle="collapse" data-target="#navbar">
            <span class="sr-only">Toggle navigation</span>
            <span class="icon-bar"></span>
            <span class="icon-bar"></span>
            <span class="icon-bar"></span>
          </button>
          <a class="navbar-brand" href="{{ url('/dashboard') }}">Astley's Shark Tank</a>
        </div>

        <!-- Collect the nav links, forms, and other content for toggling -->
        <div class="collapse navbar-collapse" id="navbar">
          <ul class="nav navbar-nav navbar-right">
            <li>
                <a href="{{ url('/logout') }}"
                    onclick="event.preventDefault();
                             document.getElementById('logout-form').submit();">
                    Logout
                </a>

                <form id="logout-form" action="{{ url('/logout') }}" method="POST" style="display: none;">
                    {{ csrf_field() }}
                </form>
            </li>
          </ul>
        </div><!-- /.navbar-collapse -->
      </div><!-- /.container-fluid -->
    </nav>
    <div style="height:calc(100% - 50px);" class="container-fluid">
      <div style="height:100%" class="row">
        <div class="col-md-2 sidebar">
          <!-- <div style="height:120px; background-color: black;">
            <object style="height: 100px;" type="image/svg+xml" data="/img/phoenix_grey.svg">Florida Polytechnic University</object>
          </div> -->
          <ul class="nav nav-pills nav-stacked">
            <li role="navigation" class="{{Request::path() == 'dashboard' ? 'active' : ''}}"><a href="{{ url('/dashboard')}}"><i style="padding-right: 10px;"class="fa fa-home" aria-hidden="true"></i>Dashboard</a></li>
            <li role="navigation" class="{{Request::path() == 'assignments' ? 'active' : ''}}"><a href="{{ url('/assignments')}}"><i style="padding-right: 10px;"class="fa fa-file-text-o" aria-hidden="true"></i>Assignments</a></li>
            <li role="navigation" class="{{Request::path() == 'grades' ? 'active' : ''}}"><a href="{{ url('/grades')}}"><i style="padding-right: 10px;"class="fa fa-check-square-o" aria-hidden="true"></i>Grades</a></li>
            <li role="navigation" class="{{Request::path() == 'messages' ? 'active' : ''}}"><a href="{{ url('/messages')}}"><i style="padding-right: 10px;" class="fa fa-envelope-o" aria-hidden="true"></i>Messages</a></li>
            <li role="navigation" class="{{Request::path() == 'resources' ? 'active' : ''}}"><a href="{{ url('/resources')}}"><i style="padding-right: 10px;"class="fa fa-info" aria-hidden="true"></i>Student Resources</a></li>
          </ul>
        </div>
        @yield('inside_row')
      </div>
      @yield('content')
    </div>
    <script src="https://cdn.jsdelivr.net/jquery/2.1.3/jquery.min.js"></script>
    <script src="https://cdn.jsdelivr.net/bootstrap/3.3.5/js/bootstrap.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/Chart.js/2.4.0/Chart.min.js"></script>
    <script src="/js/dashboard.js"></script>
    @yield('scripts')
  </body>
</html>
