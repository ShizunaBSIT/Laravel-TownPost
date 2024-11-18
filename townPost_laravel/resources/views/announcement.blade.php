<!doctype html>
<html lang="en">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Landing Page</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/bootstrap-icons/1.11.1/font/bootstrap-icons.min.css">
    <link rel="stylesheet" href="{{ asset('css/announcement.css') }}">
  </head>
<body>
    <!-- Logo -->
    <nav class="navbar navbar-light bg-light justify-content-between">
        <img src="/images/Logo.jpg" width="30" height="30" alt="Logo">
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

    <!-- Content -->
    <div class="container-md">
        <div class="heading">
            <p class="greeting">Today's News!</p>
            <h1 class="title">Upcoming School Event</h1>
            <p><strong>Headline:</strong> Mark Your Calendars for <strong>School's Got Talent Show</strong></p>
            <p class="description">
                Get ready to be amazed! Our annual School's Got Talent Show is coming up on <strong>December 16, 2024</strong>
                at <strong>7:30 PM</strong> in the Technological Institute of the Philippines. Sign-ups are open until
                <strong>November 30, 2024</strong>. All students are encouraged to participate. Prizes will be awarded to the top
                three performers. Let's showcase our talents and have some fun!
            </p>
            <p><strong>Contact Information:</strong></p>
            <span><em>Eunice D. Ibardaloza - Coordinator</em></span><br>
            <span><em>0917-123-4567</em></span><br>
            <span><em>ibardaloza.eunice@titech.edu.ph</em></span>
        </div>
<!--Reaction Button -->
        <button class="btn">Like</button>
        <button class="btn">Share</button>
        <button class="btn">Comment</button>
<!--Comment section is disabled-->
          <textarea class="comment-textarea" placeholder="Create an account to Comment"></textarea>
    </div>

<!--Conten no. 2-->
        <div class="container-md">
            <div class="heading">
                <p class="greeting">Yesterdays News!</p>
                  <h1 class="title">
                     TUPAD Program Enrollment
                   </h1>
                       <p><strong>Headline: </strong>Earn Extra Income with TUPAD!, Enroll Now for Short-Term Jobs</p>
                        <p class="description">The TUPAD program is now accepting applications! This program provides short-term employment opportunities for
                          individuals in need of financial assistance.
                          <strong>Eligibility:</strong>
                              <ul>
                                <li>Must be a resident of Metro Manila</li>
                                <li>Must be at least 18 years old</li>
                                <li>Must be willing to work for a specified number of days</li>
                              </ul>
                        </p> 
                    <p><strong>How to Apply:</strong>
                          <ul>
                            <li>Visit the DOLE office in your Municipality</li>
                            <li>Bring a valid ID and proof of residency</li>
                            <li>Fill out the application form and submit it to the officer on duty</li>
                          </ul>
                    </p>
<!--Reaction Button -->
          <button class="btn">Like</button>
          <button class="btn">Share</button>
          <button class="btn">Comment</button>
        <!--Text Area-->
          <textarea class="comment-textarea" placeholder="Create an account to Comment"></textarea>
        </div>

    <!-- Bottom Navbar -->
    <nav class="navbar navbar-light bg-light fixed-bottom">
        <div class="container d-flex justify-content-around">
            <a class="nav-link" href="#">
                <img src="/images/house.svg" width="30" height="30" alt="Home">
                <div>Home</div>
            </a>
            <a class="nav-link" href="#">
                <img src="/images/Archive.svg" width="30" height="30" alt="Archive">
                <div>Archive</div>
            </a>
            <a class="nav-link" href="#">
                <img src="/images/pencil-square.svg" width="30" height="30" alt="Write Post">
                <div>Write Post</div>
            </a>
            <a class="nav-link" href="#">
                <img src="/images/person-circle.svg" width="30" height="30" alt="Account Settings">
                <div>Account Settings</div>
            </a>
        </div>
    </nav>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js"></script>
</body>
</html>
