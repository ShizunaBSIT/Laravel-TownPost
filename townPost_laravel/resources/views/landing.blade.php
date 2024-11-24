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
                <a class="nav-link text-white" href="#">
                    <img src="{{ asset('/images/house.svg') }}" width="30" height="30" alt="Home" class="me-2"> Home
                </a>
            </li>
            <li>
                <a class="nav-link text-white" href="#">
                    <img src="{{ asset('/images/Archive.svg') }}" width="30" height="30" alt="Archive" class="me-2"> Archive
                </a>
            </li>
            <li>
                <a class="nav-link text-white" href="#">
                    <img src="{{ asset('/images/pencil-square.svg') }}" width="30" height="30" alt="Write Post" class="me-2"> Write Post
                </a>
            </li>
            <li>
                <a class="nav-link text-white" href="#">
                    <img src="{{ asset('/images/person-circle.svg') }}" width="30" height="30" alt="Account Settings" class="me-2"> Account
                </a>
            </li>
        </ul>
        <ul class="list-unstyled components">
            <p class="text-white text-center">Filter Posts</p>
            <li>
                <div class="dropdown">
                    <button class="btn btn-secondary dropdown-toggle" type="button" id="dropdownMenuButton" data-bs-toggle="dropdown" aria-expanded="false">
                        <i class="bi bi-sliders"></i> Filter
                    </button>
                    <ul class="dropdown-menu" aria-labelledby="dropdownMenuButton">
                        <li><a class="dropdown-item" href="#">Recent</a></li>
                        <li><a class="dropdown-item" href="#">Time</a></li>
                        <li><a class="dropdown-item" href="#">Date</a></li>
                    </ul>
                </div>
            </li>
        </ul>
    </nav>

    <!-- Content -->
    <div id="content" class="ms-auto">
        <!-- Navbar -->
        <div class="d-flex justify-content-between align-items-center bg-light py-3 px-3">
            <button id="sidebarCollapse" class="btn btn-info">
                <i class="bi bi-list"></i> Toggle Sidebar
            </button>
            <form class="d-flex">
                <input class="form-control me-2" type="search" placeholder="Search Here" aria-label="Search">
                <button class="btn btn-outline-primary" type="submit">
                    <i class="bi bi-search"></i>
                </button>
            </form>
        </div>

        <!-- Main Content -->
        <main class="container mt-4">
            <!-- Weather Forecast -->
            <div class="card text-center mb-4">
                <div class="card-body">
                    <h2 class="card-title">Today's Forecast</h2>
                    <input type="text" id="city" class="form-control my-3" placeholder="Enter City Name e.g. Manila">
                    <button class="btn btn-primary" id="getWeatherButton">Get Weather</button>
                    <p id="weatherInfo" class="mt-3">Weather Info will appear here</p>
                </div>
            </div>

            <!-- News Section -->
            <div class="card mb-4">
                <div class="card-header">Today's News!</div>
                <img src="{{ asset('/images/talent.png') }}" class="img-fluid" alt="Talent">
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
    </div>

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js"></script>
    <script>
        document.getElementById('sidebarCollapse').addEventListener('click', () => {
            document.getElementById('sidebar').classList.toggle('active');
        });
    </script>
</body>
</html>
