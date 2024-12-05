<!--first landing page to br displayed-->
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
    <!-- Sidebar -->
    <nav id="sidebar" class="position-fixed">
        <div class="sidebar-header text-center py-4">
            <img src="/images/Logo.jpg" width="50" height="50" alt="Logo">
        </div>
        <ul class="list-unstyled components">
            <p class="text-white text-center">Menu</p>
            <li class="active">
                <a class="nav-link text-white" href="{{route('modals.account')}}" >
                    <img src="{{ asset('/images/house.svg') }}" width="30" height="30" alt="Home" class="me-2"> Home
                </a>
            </li>
            <li>
                <a class="nav-link text-white" href="{{route('modals.account')}}" >
                    <img src="{{ asset('/images/pencil-square.svg') }}" width="30" height="30" alt="Write Post" style="color: white "class="me-2"> Write Post
                </a>
            </li>
            <li>
                <a class="nav-link text-white" href="{{route('modals.account')}}" >
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
            <!-- Weather Forecast -->
            <div class="card text-center mb-4">
                <div class="card-body">
                    <h2 class="card-title">Today's Forecast</h2>
                    <input type="text" id="city" class="form-control my-3" placeholder="Enter City Name e.g. Manila">
                    <button class="btn btn-primary" id="getWeatherButton" onclick="getWeather()">Get Weather</button>
                    <p id="weatherInfo" class="mt-3">Weather Info will appear here</p>
                </div>
            </div>

            <!-- News Section -->
<div class="card mb-4">
    <div class="card-header">
        <h5 class="card-title">School's Got Talent Show</h5>
    </div>
    <div class="card-body">
        <p class="post-id"><strong>Post ID:</strong> 1</p>
        <p class="post-category"><strong>Category:</strong> School</p>
        <p class="posted-by"><strong>Author:</strong> shimshimi</p>
        <p class="post-date"><strong>Posted on:</strong> 2022-01-01</p>
        <p class="card-text">Get ready to be amazed! Our annual School's Got Talent Show is coming up on 
            <strong>December 16, 2024</strong> at <strong>7:30 PM</strong> in the Technological Institute of the Philippines. 
            Sign-ups are open until <strong>November 30, 2024</strong>.
        </p>
        <p><strong>Contact:</strong> Eunice D. Ibardaloza, 0917-123-4567, ibardaloza.eunice@titech.edu.ph</p>
        
        <!-- if button is click it will prompt a message that they need an account to comment -->
        <a href="{{route('modals.account')}}" class="btn btn-primary">
            <i class="bi bi-hand-thumbs-up"></i> Like
        </a>
        <a href="{{route('modals.account')}}"  class="btn btn-info" onclick="myButtons()">
            <i class="bi bi-chat-left-quote"></i> Comment
        </a>

        <!-- Disable Comment -->
        <form class="mt-2">
            <textarea class="form-control w-100" rows="3" readonly>Create an Account to comment</textarea>
        </form>
    </div>
</div>

<div class="card mb-4">
    <div class="card-header">
        <h5 class="card-title">TUPAD Ongoing Enrollment</h5>
    </div>
    <div class="card-body">
        <p class="post-id"><strong>Post ID:</strong> 2</p>
        <p class="post-category"><strong>Category:</strong> Community</p>
        <p class="posted-by"><strong>Author:</strong> shimshimi</p>
        <p class="post-date"><strong>Posted on:</strong> 2022-01-01</p>
        <p class="card-text">TUPAD Program Enrollment</p>
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
        
         <!-- if button is click it will prompt a message that they need an account to comment -->
        <a href="#" class="btn btn-primary" onclick="myButtons()">
            <i class="bi bi-hand-thumbs-up"></i> Like
        </a>
        <a href="#" class="btn btn-secondary" onclick="myButtons()">
            <i class="bi bi-share"></i> Share
        </a>
        <a href="#" class="btn btn-info"onclick="myButtons()" >
            <i class="bi bi-chat-left-quote"></i> Comment
        </a>

        <!-- Disabled Comment -->
        <form class="mt-2">
            <textarea class="form-control w-100" rows="3" readonly>Create an Account to comment</textarea>
        </form>
    </div>
</div>
</main>
    </div>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js"></script>
    <script src="{{ asset('js/announcement.js') }}"></script>
</body>
</html>