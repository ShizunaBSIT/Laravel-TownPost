<!doctype html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
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
                <a class="nav-link text-white" href="{{ route('writePost') }}">
                    <img src="{{ asset('/images/pencil-square.svg') }}" width="30" height="30" alt="Write Post" class="me-2"> Write Post
                </a>
            </li>
            <li>
                <a class="nav-link text-white" href="{{route('accountView')}}">
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
            <form class="d-flex" method="GET" action="/searchpost">
                <input class="form-control me-2" type="search" placeholder="Search" aria-label="Search" name="searchWord">
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

            <!--start of cards and retrieving of posts-->
            <div class="card-body">
                <div class="card mb-4">
                    <div class="card-header">
                        <h5 class="card-title">Retrieve Content</h5>
                    </div>
                    @foreach($posts as $post)
                        <div class="card mb-4">
                            <div class="card-header">
                                <h6 class="card-title mb-0">{{ $post->title }}</h6>
                            </div>
                            <div class="card-body">
                                <p class>Category: {{ $post->name }}</p>
                                <p class=>Posted by: {{ $post->username }} on {{ $post->date_posted }}</p>
                                <p>{!! nl2br(e($post->content)) !!}</p>
                            </div>
                            <!--button section-->
                            <div class="card-footer d-flex justify-content-between" style="background-color:#495E57">
                                    <button type="button" class="btn btn-light like-button" data-reacted="false">
                                        <i class="bi bi-hand-thumbs-up"></i> Like
                                     </button>

                                     <button type="button" id="share-button" class="btn btn-secondary" value="{{$post->post_ID}}">
                                        <i class="bi bi-share"></i> Share
                                     </button>
                                     <p class="result"></p>
                                      
                                <a href="{{route('getcomments')}}" type="button" class="btn btn-info">
                                    <i class="bi bi-chat"></i> Comment
                                </a>
                                <button type="button" class="btn btn-primary" data-bs-toggle="modal" data-bs-target="#editModal{{ $post->post_ID }}">
                                    <i class="bi bi-pencil-square"></i> Edit
                                </button>
                                <form action="{{ route('deletePost', $post->post_ID) }}" method="POST" class="d-inline">
                                    @csrf
                                    @method('DELETE')
                                    <button type="submit" class="btn btn-danger btn-sm">
                                        <i class="bi bi-trash3"></i> Delete
                                    </button>
                                </form>
                            </div>
                        </div>
                        <!-- Edit Modal -->
                        <div class="modal fade" id="editModal{{ $post->post_ID }}" tabindex="-1" aria-labelledby="editModalLabel{{ $post->post_ID }}" aria-hidden="true">
                            <div class="modal-dialog">
                                <div class="modal-content">
                                    <form method="POST" action="{{ route('updatePost', $post->post_ID) }}">
                                        @csrf
                                        @method('PUT')
                                        <div class="modal-header">
                                            <h5 class="modal-title" id="editModalLabel{{ $post->post_ID }}">Edit Post</h5>
                                            <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                                        </div>
                                        <div class="modal-body">
                                            <div class="form-group">
                                                <label for="title{{ $post->post_ID }}" class="col-form-label">Title:</label>
                                                <input type="text" class="form-control" id="title{{ $post->post_ID }}" name="title" value="{{ $post->title }}">
                                            </div>
                                            <div class="form-group">
                                                <label for="content{{ $post->post_ID }}" class="col-form-label">Content:</label>
                                                <textarea class="form-control" id="content{{ $post->post_ID }}" name="content">{{ $post->content }}</textarea>
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
                    @endforeach
                </div>
            </div>
        </main>
    </div>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-YvpcrYf0tY3lHB60NNkmXc5s9fDVZLESaAA55NDzOxhy9GkcIdslK1eN7N6jIeHz" crossorigin="anonymous"></script>
    <script src="{{ asset('js/announcement.js') }}"></script>
    <script>
       document.getElementById("share-button").addEventListener("click", async function () {
        const postID = this.value; // Get the post ID from the button's value
        const resultPara = document.querySelector(".result");

        try {
            // Fetch the post data from the server
            const response = await fetch(`/share/${postID}`);
            const post = await response.json();

            if (response.ok && post.length > 0) {
                const shareData = {
                 title: post[0].title || "Check this out!", // Customize based on your post structure
                 text: post[0].content || "Read this amazing post!", // Customize based on your post structure
                 url: `http://127.0.0.1:8000/posts/${postID}`, // Construct the post URL
            };

                // Use the Web Share API
                 await navigator.share(shareData);
                resultPara.textContent = "Post shared successfully!";
             } else {
                resultPara.textContent = post.message || "Failed to fetch the post.";
        }
         } catch (err) {
            resultPara.textContent = `Error: ${err.message}`;
             }   
    });
    </script>
</body>
</html>