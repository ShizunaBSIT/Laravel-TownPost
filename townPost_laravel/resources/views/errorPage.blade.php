<!doctype html>
<html lang="en">
  <head>

    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <!-- Bootstrap CSS -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">

    <style>
      body {
        font-family: Arial, sans-serif;
        background-color: #f8f9fa;
        margin: 0;
        padding: 0;
        display: flex;
        justify-content: center;
        align-items: center;
        height: 100vh;
      }

      h1 {
        color: #343a40;
        font-size: 2.5rem;
        margin-bottom: 0.5rem;
      }

      h4 {
        color: #dc3545;
        font-size: 1.5rem;
        margin-bottom: 1rem;
      }

      p {
        color: #6c757d;
        font-size: 1.2rem;
      }

      .row {
        width: 90%;
        max-width: 600px;
        padding: 20px;
        background: #ffffff;
        box-shadow: 0 4px 8px rgba(0, 0, 0, 0.1);
        border-radius: 8px;
      }

      .col-8 {
        padding-right: 15px;
      }

      .col-4 {
        text-align: center;
      }

      .col-4 img {
        border-radius: 50%;
      }
    </style>

    <title>Error</title>
  </head>
  <body>
    <!-- Side bar -->
    <nav id="sidebar" class="position-fixed d-flex flex-column">
        <div class="sidebar-header text-center py-4">
            <img src="/images/Logo.jpg" width="50" height="50" alt="Logo">
        </div>
        <ul class="list-unstyled components flex-grow-1">
            <p class="text-white text-center">Menu</p>
            <li class="active">
                <a class="nav-link text-white" href="#">
                    <img src="{{ asset('/images/house.svg') }}" width="30" height="30" alt="Home" class="me-2"> Home
                </a>
            </li>
            <li>
                <a class="nav-link text-white" href="{{ route('writePost') }}">
                    <img src="{{ asset('/images/pencil-square.svg') }}" width="30" height="30" alt="Write Post" class="me-2"> Write Post
                </a>
            </li>
            <li>
                <a class="nav-link text-white" href="{{route('accountView')}}">
                    <img src="{{ asset('/images/person-circle.svg') }}" width="30" height="30" alt="Account Settings" class="me-2"> Account
                </a>
            </li>
        </ul>

        <!-- Footer Section -->
        <footer class="mt-auto text-center py-3 bg-dark text-white">
            <p>&copy; 2024 Town Bulletin</p>
            <p>All rights reserved</p>
        </footer>
    </nav>


    <div class="row">
      <!-- Error content Message Here -->
      <div class="col-8">
        <h1>Town Talk E-Bulletin</h1>
        <h4>{{$error_code}}</h4>
        <p>{{$message}}</p>
      </div>
      <div class="col-4">
        <img src="{{ asset('/images/error.jpg') }}" width="100" height="100" alt="error" class="me-2">
      </div>
    </div>
  </body>
</html>
