<!doctype html>
<html lang="str_replace('_', '-', app() -> getLocale()">
<head>
    <meta charset="utf-8">
    <meta name="csrf-token" content="{{ csrf_token() }}">
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
            <form class="d-flex">
                <input class="form-control me-2" type="search" placeholder="Search" aria-label="Search">
                    <button class="btn btn-outline-success" type="submit">Search</button>
                 </form>
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
                            <div class="jumbotron">
                                <h4 class="display-4">{{$post->title}}</h1>
                                        <p class="lead">{{$post->category_ID}}</p>
                                            <p class="lead">{{$post->user_ID}}, {{$post->date_posted}}</p>
                                                <p class="lead">{{$post->content}}</p>
                                        <hr class="my-4">
        
                                         
                                       <div class="reactions-container" data-post-id="{{ $post->post_ID }}">
                                        <!-- Like Button -->
                                            <button type="button" class="btn btn-outline-primary react-btn" data-reaction="like">
                                                    <i class="bi bi-hand-thumbs-up"></i> Like 
                                                        <span class="badge bg-secondary like-count">0</span>
                                            </button>
                    
                                                <!-- Love Button -->
                                                <button type="button" class="btn btn-outline-danger react-btn" data-reaction="love">
                                                    <i class="bi bi-heart"></i> Love 
                                                        <span class="badge bg-secondary love-count">0</span>
                                                </button>
                                        </div>
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
                </div>
            </form>
            </div>
</main>
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-YvpcrYf0tY3lHB60NNkmXc5s9fDVZLESaAA55NDzOxhy9GkcIdslK1eN7N6jIeHz" crossorigin="anonymous"></script>
<script src="{{ asset('js/announcement.js') }}"></script>
<script>
    document.addEventListener('DOMContentLoaded', function() {
    const csrfToken = document.querySelector('meta[name="csrf-token"]').getAttribute('content');
    
    // Fetch reactions for each post
    document.querySelectorAll('.reactions-container').forEach(container => {
        const postId = container.getAttribute('data-post-id');
        fetchReactions(postId, container);
    });

    // Add event listeners to reaction buttons
    document.querySelectorAll('.react-btn').forEach(button => {
        button.addEventListener('click', function() {
            const postId = this.closest('.reactions-container').getAttribute('data-post-id');
            const reaction = this.getAttribute('data-reaction');
            
            // Assuming you're logged in and have a user ID
            const userId = {{ Auth::id() }}; // Make sure this works with your authentication setup

            sendReaction(postId, userId, reaction);
        });
    });

    function fetchReactions(postId, container) {
        fetch(`/test/reactions/${postId}`, {
            method: 'GET',
            headers: {
                'Content-Type': 'application/json',
                'X-CSRF-TOKEN': csrfToken
            }
        })
        .then(response => response.json())
        .then(data => {
            data.forEach(reactionGroup => {
                const countElement = container.querySelector(`.${reactionGroup.reaction}-count`);
                if (countElement) {
                    countElement.textContent = reactionGroup.total;
                }
            });
        })
        .catch(error => console.error('Error:', error));
    }

    function sendReaction(postId, userId, reaction) {
        fetch('/test/reactions/react', {
            method: 'GET', // Changed to GET based on your route
            headers: {
                'Content-Type': 'application/json',
                'X-CSRF-TOKEN': csrfToken
            },
            body: JSON.stringify({
                post_ID: postId,
                user_ID: userId,
                reaction: reaction
            })
        })
        .then(response => response.json())
        .then(data => {
            console.log(data.message);
            // Optionally, refresh reactions count
            const container = document.querySelector(`.reactions-container[data-post-id="${postId}"]`);
            fetchReactions(postId, container);
        })
        .catch(error => console.error('Error:', error));
    }
});
</script>
</body>
</html>