<!doctype html>
<html lang="en">
  <head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Landing Page</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-QWTKZyjpPEjISv5WaRU9OFeRpok6YctnYmDr5pNlyT2bRjXh0JMhjY6hW+ALEwIH" crossorigin="anonymous">
    <link rel="stylesheet" href="{{asset('css/landing.css}}">
</head>
  <body>
    <!-- Sidebar -->
    <nav id="sidebar" class="position-fixed">
        <div class="sidebar-header text-center py-4">
            <img src="/images/Logo.jpg" alt="Logo">
        </div>
        <ul class="list-unstyled components">
            <p class="text-white text-center">Menu</p>
            <li class="active">
                <a class="nav-link text-white" href="#">
                    <img src="{{ asset('/images/house.svg') }}"> Home
                </a>
            </li>
            <li>
                <a class="nav-link text-white" href="{{route('createPost')}}">
                 <img src="{{ asset('/images/pencil-square.svg') }}"> Write Post
                </a>
            </li>
            <li>
                <a class="nav-link text-white" href="{{url('/login')}}">
                    <img src="{{ asset('/images/person-circle.svg') }}"> Account
                </a>
            </li>
        </ul>
    </nav>

    <!-- Content -->
    <div id="content" class="ms-auto">
        <!-- Navbar -->
        <div class="d-flex justify-content-between align-items-center py-3 px-3">
            <button id="sidebarCollapse" class="btn btn-info">
                <i class="bi bi-list"></i>
            </button>
            <form class="d-flex">
                <input class="form-control me-2" type="search" placeholder="Search" aria-label="Search">
                    <button class="btn btn-outline-success" type="submit">Search</button>
                 </form>
        </div>
    </div>
                                        <!--Main Content Goes Here-->
         <main class="container mt-4">
             <!-- Weather Forecast -->
            <div class="card text-center mb-4">
                <div class="card-body">
                    <h2 class="card-title">Today's Forecast</h2>
                    <input type="text" id="city" class="form-control my-3" placeholder="Enter City Name e.g. Manila">
                    <button class="btn btn-primary" id="getWeatherButton" onclick="getWeather()">Get Weather</button>
                    <p id="weatherInfo" class="mt-3">Weather Info will appear here</p>
                </div>
            </div>

                                                                    <!--Retrieval Section-->
            <!--if no post to show-->
            @if($posts->isEmpty())
            <div class="alert alert-warning" role="alert">
                    No posts to display.
            </div>
            @else

            <!--Foreach Loop-->
                @foreach($posts as $post)
                    <div class="card-body">
                    <div class="card mb-4">
                        <div class="card-header">
                            <h5 class="card-title">Retrieve Content</h5>
                         </div>
                            <div class="card-body">
                        @foreach($posts as $post)
                            <div class="jumbotron">
                                <h4 class="display-4">{{$post->title}}</h1>
                                        <p class="lead">{{$post->category_ID}}</p>
                                            <p class="lead">{{$post->user_ID}}, {{$post->date_posted}}</p>
                                                <p class="lead">{{$post->content}}</p>
                                        <hr class="my-4">
        
                                         <!-- Like Button -->
                                        <a href="#" button type="submit" class="btn btn-info">
                                             <i class="bi bi-hand-thumbs-up"></i> Like
                                    </a>
                                        <!-- Edit Button with Post ID -->
                                            <button type="button" class="btn btn-primary" data-bs-toggle="modal" data-bs-target="#exampleModal">
                                                <i class="bi bi-pencil-square"></i> Edit
                                            </button>

                                        <!-- Modal -->
                                            <div class="modal fade" id="exampleModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
                                                <div class="modal-dialog" role="document">
                                                <div class="modal-content">
                                                        <!-- Edit Post -->
                                                <form method="POST" action="{{ route('updatePost', $post->post_ID) }}">
                                                    @csrf
                                                    @method('PUT')
                                                <div class="modal-header">
                                                <h5 class="modal-title" id="exampleModalLabel">Edit Post</h5>
                                                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                                                </div>
                                                    <div class="modal-body">
                                                    <div class="form-group">
                                                        <label for="recipient-name" class="col-form-label">Title:</label>
                                                            <input type="text" class="form-control" id="recipient-name" name="title" value="{{ $post->title }}">
                                                        </div>
                                                    <div class="form-group">
                                                        <label for="message-text" class="col-form-label">Content:</label>
                                                            <textarea class="form-control" id="message-text" name="content">{{ $post->content }}</textarea>
                                                        </div>
                                                    </div>
                                                    <div class="modal-footer">
                                                        <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
                                                        <button type="submit" class="btn btn-primary">Save changes</button>
                                                    </div>
                                                </form>
                                            </div>
                                        </div>
                                    </div>
                                        <!-- Delete Button -->
                                        <form action="{{ route('deletePost',$post->post_ID) }}" method="POST" class="d-inline">
                                            @csrf
                                            @method('DELETE')
                                            <button type="submit" class="btn btn-danger btn-sm">
                                                    <i class="bi bi-trash3"></i> Delete
                                            </button>
                                        </form>
                        @endforeach
                        </div>
                @endforeach
        </main>
    <script src="{{asset('js/announcement.js')}}"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-YvpcrYf0tY3lHB60NNkmXc5s9fDVZLESaAA55NDzOxhy9GkcIdslK1eN7N6jIeHz" crossorigin="anonymous"></script>
  </body>
</html>