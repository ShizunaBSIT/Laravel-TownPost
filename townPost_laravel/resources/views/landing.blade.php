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
                <i class="bi bi-list"></i> Toggle Sidebar
            </button>
            <!--method="GET" action = "{{route('posts.find', [$post_ID->id])}}"-->
            <form class="form-inline my-2 my-lg-0 d-flex">
                <input class="form-control mr-sm-2" type="search" placeholder="Enter ID to search" aria-label="Search" name="postID">
                    <button class="btn btn-outline-success my-2 my-sm-0" type="submit">Search</button>
            </form>
        </div>

        <!-- Main Content -->
<main class="container mt-4">
@if(session('success'))
    <div class="alert alert-success" role="alert">
        Welcome {{ $user->username }}
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

    <form method="GET" action ="{{route('posts.get')}}">      <!-- News Section -->
        <div class="card-body">
        <div class="card mb-4">
            <div class="card-header">
                <h5 class="card-title">Retrieve Content</h5>
        </div>
        <div class="card-body">
            @if(isset($posts))
                <div class="card mb-4">
                    <label for="titlepage" class="form-label"><strong>Title:</strong></label>
                        {{$posts->title }}
                </div>
                <div class="card mb-4">
                    <label for="category" class="form-label"><strong>Category ID:</strong></label>
                        {{ $posts->category_ID }}
                </div>
                <div class="card mb-4">
                    <label for="userid" class="form-label"><strong>User ID:</strong></label>
                        {{ $posts->user_ID }}
                </div>
                <div class="card mb-4 publish-date-container">
                    <label for="publishDate" class="form-label"><strong>Publish Date:</strong></label>
                        {{ $posts->publish_date }}
                </div>
                <div class="card mb-4">
                    <label class="content"><strong>Content:</strong></label>
                        {{ $posts->content }}
                </div>
                @else
                    <p>No post available to display.</p>    
                @endif

        <!-- if button is click it will prompt a message that they need an account to comment -->
                    <button type="button" class="btn btn-outline-primary">
                        <i class="bi bi-hand-thumbs-up">Like</i>
                    </button>
                    <button type="button" class="btn btn-outline-secondary" onclick="sharePost()">
                        <i class="bi bi-share">Share</i>
                    </button>
                    <button type="button" class="btn btn-outline-success">
                        <i class="bi bi-pencil-square">Edit</i>
                    </button>
                    <button type="button" class="btn btn-outline-danger" onclick="deletePost()">
                        <i class="bi bi-trash3">Delete</i>
                    </button>
                    <button type="button" class="btn btn-outline-info" onclick="writeComment()">
                        <i class="bi bi-comment-dots">Comment</i>
                    </button> <br><br>

                <!-- Comment Enabled -->
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
</main>
    </div>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js"></script>
    <script src="{{ asset('js/weatherapi.js') }}"></script>
    <script>
    function deletePost(postId) {
        if (confirm('Are you sure you want to delete this post?')) {
            fetch(`/test/posts/delete/${postId}`, {
                method: 'DELETE'
            }).then(response => response.json())
            .then(data => {
                alert(data.message);
                location.reload(); 
            }).catch(error => console.error('Error:', error));
        }
    }
    //for searcg post
    function submitForm() {
        const postID = document.getElementById('postID').value;
        if (postID) {
            window.location.href = `/test/posts/${postID}`; 
        } else {
            alert('Please enter a Post ID to search.');
        }
    }
</script>
</body>
</html>