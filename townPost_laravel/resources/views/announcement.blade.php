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

<!--Get Weather forecast by City-->
<div class="container-weather expand-lg">
    <div class="card">
            <div class="weather-info-container text-center">
                <h2 class="card-title">Today's Forecast:</h2>
                <input type="text" id="city" class="form-control my-3" placeholder="Enter City Name e.g Manila"/>
                <button class="btn btn-primary" onclick="getWeather()">Get Weather</button>
                <p id="weatherInfo" class="mt-3">Weather Info will appear here</p>
            </div>
    </div>
</div>


   <!-- Content: Card 1 -->
<section class="header">
<div class="container-md mt-4">
    <div class="card">
        <div class="card-header">
            <p class="greeting mb-0">Today's News!</p>
        </div>
        <div class="card-body">
            <h5 class="card-title">Upcoming School Event</h5>
            <p class="card-text"><strong>Headline:</strong> Mark Your Calendars for <strong>School's Got Talent Show</strong></p>
            <p class="card-text">
                Get ready to be amazed! Our annual School's Got Talent Show is coming up on <strong>December 16, 2024</strong>
                at <strong>7:30 PM</strong> in the Technological Institute of the Philippines. Sign-ups are open until
                <strong>November 30, 2024</strong>. All students are encouraged to participate. Prizes will be awarded to the top
                three performers. Let's showcase our talents and have some fun!
            </p>
            <p class="card-text"><strong>Contact Information:</strong></p>
            <p class="card-text"><em>Eunice D. Ibardaloza - Coordinator</em></p>
            <p class="card-text"><em>0917-123-4567</em></p>
            <p class="card-text"><em>ibardaloza.eunice@titech.edu.ph</em></p>
            <!-- Reaction Buttons -->
            <button class="btn btn-primary">Like</button>
            <button class="btn btn-secondary">Share</button>
            <button class="btn btn-info">Comment</button>
            <!-- Comment Section -->
            <textarea class="form-control mt-2" placeholder="Create an account to Comment" disabled img src="{{asset('/images/send.png')}}"></textarea>
        </div>
    </div>
</div>

<!-- Content: Card 2 -->
<div class="container-md mt-4">
    <div class="card">
        <div class="card-header">
            <p class="greeting mb-0">Yesterday's News!</p>
        </div>
        <div class="card-body">
            <h5 class="card-title">TUPAD Program Enrollment</h5>
            <p class="card-text"><strong>Headline:</strong> Earn Extra Income with TUPAD! Enroll Now for Short-Term Jobs</p>
            <p class="card-text">The TUPAD program is now accepting applications! This program provides short-term employment opportunities for individuals in need of financial assistance.</p>
            <div class="card-text"><strong>Eligibility:</strong>
                <ul>
                    <li>Must be a resident of Metro Manila</li>
                    <li>Must be at least 18 years old</li>
                    <li>Must be willing to work for a specified number of days</li>
                </ul>
            </div>
            <div class="card-text"><strong>How to Apply:</strong>
                <ul>
                    <li>Visit the DOLE office in your Municipality</li>
                    <li>Bring a valid ID and proof of residency</li>
                    <li>Fill out the application form and submit it to the officer on duty</li>
                </ul>
            </div>
            <!-- Reaction Buttons -->
            <button class="btn btn-primary">Like</button>
            <button class="btn btn-secondary">Share</button>
            <button class="btn btn-info">Comment</button>
            <!-- Comment Section -->
            <textarea class="form-control mt-2" placeholder="Create an account to Comment" disabled></textarea>
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