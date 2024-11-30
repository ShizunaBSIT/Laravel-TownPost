<!doctype html>
<html lang="str_replace('_', '-', app() -> getLocale()">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Landing Page</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/bootstrap-icons/1.11.1/font/bootstrap-icons.min.css">
    <link href="{{ asset('/css/landing.css') }}" rel="stylesheet">
</head>
<body>
    <!-- Sidebar -->
    <nav id="sidebar" class="position-fixed">
        <div class="sidebar-header text-center py-4">
            <img src="/images/Logo.jpg" width="50" height="50" alt="Logo">
        </div>
        <ul class="list-unstyled components">
            <p class="text-white text-center">Menu</p>
            <li class="active">
                <a class="nav-link text-white" href="#">
                    <img src="{{ asset('/images/house.svg') }}" width="30" height="30" alt="Home" class="me-2"> Home
                </a>
            </li>
            <li>
                <a class="nav-link text-white" href="{{route('createPost')}}">
                    <img src="{{ asset('/images/pencil-square.svg') }}" width="30" height="30" alt="Write Post" class="me-2"> Write Post
                </a>
            </li>
            <li>
                <a class="nav-link text-white" href="{{url('/login')}}">
                    <img src="{{ asset('/images/person-circle.svg') }}" width="30" height="30" alt="Account Settings" class="me-2"> Account
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
        </div>

        <!-- Main Content -->
<main class="container mt-4">
@if(session('success'))
    <div class="alert alert-success" role="alert">
        Welcome {{ Auth::user()->username }}
    </div>
@endif
            <!-- Weather Forecast -->
            <div class="card text-center mb-4">
                <div class="card-body">
                    <h2 class="card-title">Today's Forecast</h2>
                    <input type="text" id="city" class="form-control my-3" placeholder="Enter City Name e.g. Manila">
                    <button class="btn btn-primary" id="getWeatherButton" onclick="getWeather()">Get Weather</button>
                    <p id="weatherInfo" class="mt-3">Weather Info will appear here</p>
                </div>
            </div>
                <div class="card-body">
                    <div class="card mb-4">
                        <div class="card-header">
                            <h5 class="card-title">Retrieve Content</h5>
                         </div>
                            <div class="card-body">
                        @foreach($posts as $post)
                                <div class="card mb-4">
                                    <label for="titlepage" class="form-label"><strong>Title:</strong></label>
                                       {{$post->title}}
                                </div>
                                <div class="card mb-4">
                                    <label for="category" class="form-label"><strong>Category ID:</strong></label>
                                     {{$post->category_ID}}
                                </div>
                                <div class="card mb-4">
                                    <label for="userid" class="form-label"><strong>User ID:</strong></label>
                                    {{$post->user_ID}}
                                </div>
                                <div class="card mb-4 publish-date-container">
                                    <label for="publishDate" class="form-label"><strong>Publish Date:</strong></label>
                                    {{$post->date_posted}}
                                </div>
                                <div class="card mb-4">
                                    <label class="content"><strong>Content:</strong></label>
                                </div>
                        <!--buttons-->
                                <button type="button" class="btn btn-info">
                                    <i class="bi bi-hand-thumbs-up"></i> Like
                                </button>
                                <button type="button" class="btn btn-primary" data-bs-toggle="modal" data-bs-target="#editModal">
                                    <i class="bi bi-pencil-square"></i> Edit
                                </button>
                                <button type="submit" class="btn btn-danger">
                                        <i class="bi bi-trash3"></i> Delete
                                </button>
                        @endforeach
                        </div>
                </div>
            </form>
            </div>
</main>
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-YvpcrYf0tY3lHB60NNkmXc5s9fDVZLESaAA55NDzOxhy9GkcIdslK1eN7N6jIeHz" crossorigin="anonymous"></script>
<script src="{{ asset('js/announcement.js') }}"></script>
</body>
</html>