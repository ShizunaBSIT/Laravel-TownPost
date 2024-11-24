<!doctype html>
<html lang="en">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Landing Page</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/bootstrap-icons/1.11.1/font/bootstrap-icons.min.css">
    <link href="{{ asset('/css/announcement.css') }}" rel="stylesheet">
</head>
<body>
<nav class="navbar navbar-expand-lg bg-body-tertiary fixed-top">
  <div class="container-fluid">
    <div class="collapse navbar-collapse" id="search">
        <form class="form-inline">
                <input class="form-control" type="search" placeholder="Search Here" aria-label="Search">
                <button type="submit">
                    <i class="bi bi-search"></i>
                </button>
        </form>
    </div>
  </div>
</nav>

<!-- Weather Forecast -->
<main class="container-sm">
<div class="container mt-5 pt-5">
    <div class="card text-center">
        <div class="card-body">
            <h2 class="card-title">Today's Forecast</h2>
            <input type="text" id="city" class="form-control my-3" placeholder="Enter City Name e.g. Manila">
            <button class="btn btn-primary" id="getWeatherButton" onclick="getWeather()">Get Weather</button>
            <p id="weatherInfo" class="mt-3">Weather Info will appear here</p>
        </div>
    </div>
</div> 
<section class="mt-4" style="min-height: 0px">
    <div class="container-sm">
        <!-- Card 1 -->
        <div class="card mb-4">
            <div class="card-header">Today's News!</div>
            <img src="{{asset('/images/talent.png')}}" class="img-fluid" alt="talent">
            <div class="card-body">
                <h5 class="card-title">Upcoming School Event</h5>
                <p class="card-text">
                    Get ready to be amazed! Our annual School's Got Talent Show is coming up on 
                    <strong>December 16, 2024</strong> at <strong>7:30 PM</strong> in the Technological Institute of the Philippines. 
                    Sign-ups are open until <strong>November 30, 2024</strong>. 
                </p>
                <p><strong>Contact:</strong> Eunice D. Ibardaloza, 0917-123-4567, ibardaloza.eunice@titech.edu.ph</p>
                <button class="btn btn-primary">Like</button>
                <button class="btn btn-secondary">Share</button>
                <button class="btn btn-info">Comment</button>
                <form class="mt-2">
                    <div class="input-group">
                        <input type="text" class="form-control" placeholder="Enter your comment">
                        <button class="btn btn-primary" type="submit">
                            <i class="bi bi-send"></i>
                        </button>
                    </div>
                </form>
            </div>
        </div>
</main>

<div class="offcanvas offcanvas-start show text-bg-dark" tabindex="-1" id="offcanvasDark" aria-labelledby="offcanvasDarkLabel">
  <div class="offcanvas-header">
  <img src = "/images/Logo.jpg" width ="50" height="50" alt = "Logo">
    <button type="button" class="btn-close btn-close-white" data-bs-dismiss="offcanvasDark" aria-label="Close"></button>
  </div>
  <div class="offcanvas-body">
    <h5 class="offcanvas-title" id="offcanvasDarkLabel">Menu</h5>
            <a class="nav-link" href="#">
                <img src="{{asset('/images/house.svg')}}" alt="Home">
                <div>Home</div>
            </a>
            <a class="nav-link" href="#">
                <img src="{{asset('/images/Archive.svg')}}" alt="Archive">
                <div>Archive</div>
            </a>
            <a class="nav-link" href="#">
                <img src="{{asset('/images/pencil-square.svg')}}" alt="Write Post">
                <div>Write Post</div>
            </a>
            <a class="nav-link" href="#">
                <img src="{{asset('/images/person-circle.svg')}}" alt="Account Settings">
                <div>Account</div>
            </a>
    <h5 class="offcanvas-title" id="offcanvasDarkLabel">Filter Posts</h5>
    <button class="btn dropdown-toggle" type="button" id="dropdownMenuButton" data-bs-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
            <i class="bi bi-sliders"></i>
    </button>
        <div class="dropdown-menu" aria-labelledby="dropdownMenuButton">
            <a class="dropdown-item" href="#">Recent</a>
            <a class="dropdown-item" href="#">Time</a>
            <a class="dropdown-item" href="#">Date</a>
</div>
</div>
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js"></script>
</body>
</html>