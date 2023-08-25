<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">

        <title>Laravel</title>
        <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous"> 

        <!-- Fonts -->
        <link rel="preconnect" href="https://fonts.bunny.net">
        <link href="https://fonts.bunny.net/css?family=figtree:400,600&display=swap" rel="stylesheet" />
        <link rel="stylesheet" type="text/css" href="{{ url('/css/style.css') }}" />
        <!-- Styles -->
        
    </head>
    <body class="">
        <nav class="navbar navbar-expand-lg navbar-light bg-light">
            <div class="container-fluid">
              <a class="navbar-brand" href="#">Panel</a>
              <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarNavAltMarkup" aria-controls="navbarNavAltMarkup" aria-expanded="false" aria-label="Toggle navigation">
                <span class="navbar-toggler-icon"></span>
              </button>
              <div class="collapse navbar-collapse" id="navbarNavAltMarkup">
                <div class="navbar-nav">
                  <a class="nav-link active" aria-current="page" href="{{url('/')}}">Register Users</a>
                  <a class="nav-link active" aria-current="page" href="{{url('user-list')}}">Register Lists</a>
                </div>
              </div>
            </div>
          </nav>

        <div class="container my-5">
            
            <header class="header">
                <h1 id="title" class="text-center">User Referal Code</h1>
                <p id="description" class="text-center">
                    User will get 10 points and referral user get 20 points
                </p>                  
                 
                    @if ($errors->any())
                            @foreach ($errors->all() as $error)
                            <div class="alert alert-danger alert-dismissible fade show" role="alert" style="z-index: 99">
                                {{$error}}
                               <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
                            </div>
                            @endforeach
                    </div>
                    @endif



                    @if ($message = Session::get('message'))
                    <div class="alert alert-success alert-dismissible fade show" role="alert" style="z-index: 99">
                            {{$message}}
                        <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
                      </div>
                    @endif
        
                    @if ($message = Session::get('error'))
                    <div class="alert alert-danger alert-dismissible fade show" role="alert" style="z-index: 99">
                        {{$message}}
                       <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
                    </div>
                    @endif

            </header>
            <div class="form-wrap">	
                <form id="survey-form" method="POST" action="submit-form">
                    @csrf
                    <div class="row">
                        <div class="col-md-6">
                            <div class="form-group">
                                <label id="name-label" for="name">Name</label>
                                <input type="text" name="name" id="name" placeholder="Enter your name" class="form-control" required>
                            </div>
                        </div>
                        <div class="col-md-6">
                            <div class="form-group">
                                <label id="email-label" for="email">Email</label>
                                <input type="email" name="email" id="email" placeholder="Enter your email" class="form-control" required >
                            </div>
                        </div>
                    </div>
                    
                    <div class="row">
                        <div class="col-md-6">
                            <div class="form-group">
                                <label id="number-label" for="number">Mobile Number </label>
                                <input type="number" name="mobile_no" id="number" class="form-control" placeholder="number" required >
                            </div>
                        </div>
                        <div class="col-md-6">
                            <div class="form-group">
                                <label id="referral-label" for="referral">Referral Code </label>
                                <input type="referral" name="referral" id="referral" class="form-control" placeholder="referral"  >
                            </div>
                        </div>
                    </div>
                    
                    <div class="row">
                        <div class="col-md-6">
                            <div class="form-group">
                                <label>Gender</label>
                                <div class="custom-control custom-radio custom-control-inline">
                                    <input type="radio" id="male" value="M" name="gender" class="custom-control-input" checked="" >
                                    <label class="custom-control-label" for="male">Male</label>
                                </div>
                                <div class="custom-control custom-radio custom-control-inline">
                                    <input type="radio" id="female" value="F" name="gender" class="custom-control-input" >
                                    <label class="custom-control-label" for="female">Female</label>
                                </div>
                            </div>
                        </div>
        
                        <div class="col-md-6">
                            <div class="form-group">
                                <label>Technology</label>
                                <div class="custom-control custom-checkbox custom-control-inline">
                                    <input type="checkbox" class="custom-control-input" name="tech[]" value="php" id="php" checked="" >
                                    <label class="custom-control-label" for="php">PHP</label>
                                </div>
                                <div class="custom-control custom-checkbox custom-control-inline">
                                    <input type="checkbox" class="custom-control-input" name="tech[]" value="angular" id="angular" >
                                    <label class="custom-control-label" for="angular">Angular</label>
                                </div>
                                <div class="custom-control custom-checkbox custom-control-inline">
                                    <input type="checkbox" class="custom-control-input" name="tech[]" value="nodejs" id="node">
                                    <label class="custom-control-label" for="node">Node</label>
                                </div>
                            </div>
                        </div>
                    </div>
        
                    <div class="row">
                        <div class="col-md-4">
                            <button type="submit" id="submit" class="btn btn-primary btn-block">Submit Form</button>
                        </div>
                    </div>
        
                </form>
            </div>	
        </div>
    </body>
        <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-MrcW6ZMFYlzcLA8Nl+NtUVF0sA7MsXsP1UyJoMp4YLEuNSfAP+JcXn/tWtIaxVXM" crossorigin="anonymous"></script>
</html>
