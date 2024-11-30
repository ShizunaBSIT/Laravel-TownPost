<!doctype html>
<html lang="en">
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
                <a class="nav-link text-white" href="{{route('posts.create')}}">
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
            <br>
            <div class="container">
        <!-- Button Section -->
        <div class="d-flex flex-wrap gap-2">
            <button type="button" class="btn btn-info">
                <i class="bi bi-hand-thumbs-up"></i> Like
            </button>
            <button type="button" class="btn btn-primary" data-bs-toggle="modal" data-bs-target="#commentModal">
                <i class="bi bi-chat-left-quote"></i> Comment
            </button>
            <button type="button" class="btn btn-primary" data-bs-toggle="modal" data-bs-target="#editModal">
                <i class="bi bi-pencil-square"></i> Edit
            </button>
            <form action="/deletePost" method="POST" onsubmit="return confirm('Are you sure you want to delete this post?')">
                <button type="submit" class="btn btn-danger">
                    <i class="bi bi-trash3"></i> Delete
                </button>
            </form>
        </div>

        <!-- Comment Modal -->
        <div class="modal fade" id="commentModal" tabindex="-1" aria-labelledby="commentModalLabel" aria-hidden="true">
            <div class="modal-dialog modal-dialog-scrollable">
                <div class="modal-content">
                    <div class="modal-header">
                        <h5 class="modal-title" id="commentModalLabel">Add Comment</h5>
                        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                    </div>
                    <div class="modal-body">
                        <form method="POST" action="{{route('comments.posts', [$comment->postID])}}">
                            @csrf
                            <div class="mb-3">
                                <label for="commentText" class="form-label">Your Comment:</label>
                                <textarea class="form-control" id="commentText" rows="3"></textarea>
                            </div>
                        </form>
                        <form method="GET" action="{{route('comments.get')}}">
                            <div class="mb-3">
                                <div class="card-body">
                                    <label class="content"><strong>Comments:</strong></label>
                                        {{ $comments->id }}
                                    </div>
                            </div>
                        </form>
                    </div>
                    <div class="modal-footer">
                        <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
                        <button type="button" class="btn btn-primary">Submit</button>
                    </div>
                </div>
            </div>
        </div>

        <!-- Edit Modal -->
        <div class="modal fade" id="editModal" tabindex="-1" aria-labelledby="editModalLabel" aria-hidden="true">
            <div class="modal-dialog modal-dialog-scrollable">
                <div class="modal-content">
                    <div class="modal-header">
                        <h5 class="modal-title" id="editModalLabel">Edit Details</h5>
                        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                    </div>
                    <div class="modal-body">
                        <form method="POST" action="{{route('posts.update', [$post->id])}}>
                        @csrf
                        @method('PUT')
                        <div class="mb-3">
                                <label for="editText" class="form-label">Title:</label>
                                <textarea class="form-control" id="editText" value="{{$post->title}}" rows="3"></textarea>
                            </div>
                            <div class="mb-3">
                                <label for="editText" class="form-label">Edit Content:</label>
                                <textarea class="form-control" id="editText" value="{{$post->content}}" rows="3"></textarea>
                            </div>
                    </div>
                    <div class="modal-footer">
                        <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
                        <button type="button" class="btn btn-primary">Save Changes</button>
                    </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
</main>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js"></script>
   <script>
            document.getElementById('sidebarCollapse').addEventListener('click', () => {
            document.getElementById('sidebar').classList.toggle('active');
            });
   </script>
</body>
</html>
