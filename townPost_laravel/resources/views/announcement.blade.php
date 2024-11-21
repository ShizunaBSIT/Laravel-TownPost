<!doctype html>
<html lang="en">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Landing Page</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/bootstrap-icons/1.11.1/font/bootstrap-icons.min.css">
    <style>
        @import url('https://fonts.googleapis.com/css2?family=Roboto+Condensed:ital,wght@0,100..900;1,100..900&display=swap');

        body {
                background-color: #C6E7FF;
                font-family: 'Roboto Condensed', sans-serif;
            }

        .filter-posts {
                position: absolute;
                top: 80px; 
                right: 20px; 
                z-index: 1000; 
            }

        .container-md {
                padding: 20px;
                border-radius: 10px; 
            }

        .card {
                margin-top: 30px; 
                background-color: #FBFBFB;
                position: relative;
                border-radius: 10px;
                padding: 20px; 
            }


        .navbar.fixed-bottom {
                background-color: #FFDDAE;
            }

        .navbar.fixed-bottom .nav-link {
                text-align: center;
                color: black;
        }

        .navbar.fixed-bottom .nav-link img {
                display: block;
                margin: 0 auto;
        }

        .heading {
                text-align: center;
                color: #6b7280;
            }
        .form-inline{
            display: flex;
            justify-content: space-between;
            align-items: center;
            padding: 10px;
            text-align: center;
        }
        .navbar.fixed-top{
            border-bottom: none;          
            box-shadow: none;
        }
    </style>

  </head>
<body>
    <!-- Logo -->
    <nav class="navbar fixed-top justify-content-between">
        <img src="/images/Logo.jpg" width="50" height="50" alt="Logo">
        <form class="form-inline">
            <input class="form-control mr-sm-2" type="search" placeholder="Search" aria-label="Search">
            <button class="btn btn-outline-success my-2 my-sm-0" type="submit">Search</button>
        </form>
    </nav>

<!-- Filter posts by recent, date, and time -->
<div class="filter-posts">
        <button class="btn btn-secondary dropdown-toggle" type="button" id="dropdownMenuButton" data-bs-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
            <i class="bi bi-filter-circle"></i>
        </button>
        <div class="dropdown-menu" aria-labelledby="dropdownMenuButton">
            <a class="dropdown-item" href="#">Recent</a>
            <a class="dropdown-item" href="#">Time</a>
            <a class="dropdown-item" href="#">Date</a>
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
            <textarea class="form-control mt-2" placeholder="Create an account to Comment" disabled></textarea>
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
    
    <!--Javascript for Weather API-->
    <script>
        async function getWeather() {
            const city = document.getElementById('city').value;
            const apiKey ='f7062ed848a912a0f655cf26f1fff01e';
            const url = `https://api.openweathermap.org/data/2.5/weather?q=${city}&appid=${apiKey}&units=metric`;

            try {
                const response =await fetch(url)
                if(!response.ok) throw new Error('City not found');
                const data = await response.json();
                const weatherInfo =`Temperature in ${data.name}: ${data.main.temp} °C, Weather: ${data.weather[0].description}`;
                document.getElementById('weatherInfo').innerText = weatherInfo;
            } catch (error) {
                document.getElementById('weatherInfo').innerText=error.message;
            }
        }
    </script>
</body>
</html>