@extends('app')

<!DOCTYPE html>
<html>
<head>
    <title></title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.0-beta3/dist/css/bootstrap.min.css" rel="stylesheet">
</head>

<body>

    <nav class="navbar navbar-light navbar-expand-lg mb-5" style="background-color: #e3f2fd;">
        <div class="container">
            <a class="navbar-brand mr-auto" href="#">GitHub User Information Generator</a>
            <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarNav"
                aria-controls="navbarNav" aria-expanded="false" aria-label="Toggle navigation">
                <span class="navbar-toggler-icon"></span>
            </button>
            <div class="collapse navbar-collapse" id="navbarNav">
                <ul class="navbar-nav">
                    @guest
                    <li class="nav-item">
                        <a class="nav-link" href="{{ route('login') }}">Login</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="{{ route('register-user') }}">Register</a>
                    </li>
                    @else
                    <li class="nav-item">
                        <a class="nav-link" href="{{ route('signout') }}">Logout</a>
                    </li>
                    @endguest
                </ul>
            </div>
        </div>
    </nav>
    @yield('content')

     <form method="POST" action="{{ url('generator') }}">
            @csrf
            @if ($errors->any())
            <div class="alert alert-warning">
                <ul>
                    @foreach ($errors->all() as $error)
                    <li>{{ $error }}</li>
                    @endforeach
                </ul>
            </div>
            @endif
            @if (Session::has('success'))
            <div class="alert alert-info">
                <p>{{ Session::get('success') }}</p>
            </div>
            @endif
            <table class="table" id="multiForm">
                <tr>
                    <th>Add Username</th>
                    <th>Remove</th>
                </tr>
                <tr>
                    <td><input type="text" name="multiInput[0][username]" class="form-control"/></td>
                    <td><input type="button" name="add" value="Add" id="addRemoveIp" class="btn btn-outline-dark"></td>
                </tr>
            </table>

            <div class="d-grid mt-3">
              <input type="submit" class="submit btn btn-dark btn-block" value="Submit">
            </div>  
        </form>

      
</body>


<script src="https://code.jquery.com/jquery-3.5.1.min.js"></script>
<script>
    var i = 0;
    $("#addRemoveIp").click(function () {
      
        ++i;
      if (i<=9){
        $("#multiForm").append('<tr><td><input type="text" name="multiInput['+i+'][username]" class="form-control" /></td><td><button type="button" class="remove-item btn btn-danger">Delete</button></td></tr>');
        }
    });
    $(document).on('click', '.remove-item', function () {
        if (i>1){
        $(this).parents('tr').remove();
            }
    });

 
</script>

 
</html>