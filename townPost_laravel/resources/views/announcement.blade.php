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

<!-- Navbar -->
<!--Navbar-->
<nav class="navbar navbar-expand-lg bg-body-tertiary fixed-top">
  <div class="container-fluid">
       <img src = "/images/Logo.jpg" width ="30" height="30" alt = "Logo">
    <div class="collapse navbar-collapse" id="search">
        <form class="form-inline">
                <input class="form-control" type="search" placeholder="Search Here" aria-label="Search">
                <button type="submit">
                    <i class="bi bi-search"></i>
                </button>
        </form>
        <button class="btn dropdown-toggle" type="button" id="dropdownMenuButton" data-bs-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
            <i class="bi bi-sliders"></i>
        </button>
        <div class="dropdown-menu" aria-labelledby="dropdownMenuButton">
            <a class="dropdown-item" href="#">Recent</a>
            <a class="dropdown-item" href="#">Time</a>
            <a class="dropdown-item" href="#">Date</a>
        </div>
    </div>
  </div>
</nav>
<!-- Navbar End -->

<!-- Weather Forecast -->
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

<!-- News Section -->
<section class="mt-4" style="min-height: 0px">
    <div class="container-sm">
        <!-- Card 1 -->
        <div class="card mb-4">
            <div class="card-header">Today's News!</div>
            <img src="{{asset('/images/talent.png')}}" class="card-img-top" alt="Talent Show Image">
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

        <!-- Card 2 -->
        <div class="card mb-4">
            <div class="card-header">Yesterday's News!</div>
            <img src="{{asset('/images/tupad.png')}}" class="card-img-top" alt="TUPAD Program">
            <div class="card-body">
                <h5 class="card-title">TUPAD Program Enrollment</h5>
                <p>Earn extra income with TUPAD! Enroll now for short-term jobs.</p>
                <p><strong>Eligibility:</strong></p>
                <ul>
                    <li>Resident of Metro Manila</li>
                    <li>At least 18 years old</li>
                    <li>Willing to work for a specified number of days</li>
                </ul>
                <p><strong>How to Apply:</strong></p>
                <ul>
                    <li>Visit your local DOLE office</li>
                    <li>Bring valid ID and proof of residency</li>
                    <li>Submit the application form</li>
                </ul>
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
    </div>
</section>

<!-- Bottom Navbar -->
<nav class="navbar fixed-bottom">
        <div class="container d-flex justify-content-around">
            <a class="nav-link" href="#">
                <img src="{{asset('/images/house.svg')}}" width="30" height="30" alt="Home">
                <div>Home</div>
            </a>
            <a class="nav-link" href="#">
                <img src="{{asset('/images/Archive.svg')}}" width="30" height="30" alt="Archive">
                <div>Archive</div>
            </a>
            <a class="nav-link" href="#">
                <img src="{{asset('/images/pencil-square.svg')}}" width="30" height="30" alt="Write Post">
                <div>Write Post</div>
            </a>
            <a class="nav-link" href="#">
                <img src="{{asset('/images/person-circle.svg')}}" width="30" height="30" alt="Account Settings">
                <div>Account</div>
            </a>
        </div>
</nav>
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js"></script>
<script src="{{ asset('js/weatherapi.js')}}"></script>
</body>
</html>