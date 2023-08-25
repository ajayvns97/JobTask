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

        <div class="my-5 mx-2 bg-white p-2">
            <h4>Register Users with Referral Points</h4>
            <table class="table">
                <thead>
                  <tr>
                    <th scope="col">#</th>
                    <th scope="col">Name</th>
                    <th scope="col">Referral Code</th>
                    <th scope="col">Referral Points</th>
                  </tr>
                </thead>
                <tbody>
                    @foreach ($users as $user)
                    <tr>
                        <th scope="row">{{$user['id']}}</th>
                        <td>{{$user['name']}}</td>
                        <td>{{$user['referral_code']}}</td>
                        <td>{{$user['refer_points']}}</td>
                      </tr>
                    @endforeach
                 
                  
                </tbody>
              </table>
        </div>


        <div class="my-5 mx-2 bg-white p-2">
            <h4>Referral Users against  registered  Users</h4>
            <table class="table">
                <thead>
                  <tr>
                    <th scope="col">#</th>
                    <th scope="col">Name</th>
                    <th scope="col">Mobile Number</th>
                    <th scope="col">Email Id</th>
                    <th scope="col">Technologies</th>
                    <th scope="col">Referred By</th>
                  </tr>
                </thead>
                <tbody>
                    @foreach ($referral_users as $user)
                    <tr>
                        <th scope="row">{{$user['id']}}</th>
                        <td>{{$user['name']}}</td>
                        <td>{{$user['mobile_no']}}</td>
                        <td>{{$user['email']}}</td>
                        <td>
                            @foreach ($user['tech'] as $tech)
                            <span class="label">{{$tech['technology']}} ,</span>
                            @endforeach
                        </td>
                        <td>{{$user['referals']['name']}}</td>
                      </tr>
                    @endforeach
                 
                  
                </tbody>
              </table>
        </div>

    </body>
        <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-MrcW6ZMFYlzcLA8Nl+NtUVF0sA7MsXsP1UyJoMp4YLEuNSfAP+JcXn/tWtIaxVXM" crossorigin="anonymous"></script>
</html>
