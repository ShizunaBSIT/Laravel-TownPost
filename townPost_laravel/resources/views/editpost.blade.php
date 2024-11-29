<!doctype html>
<html lang="en">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Landing Page</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/bootstrap-icons/1.11.1/font/bootstrap-icons.min.css">
    <link href="{{ asset('/css/creeatepost.css') }}" rel="stylesheet">
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
                <a class="nav-link text-white" href="{{route('login')}}">
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
            <ul class="list-unstyled components d-flex">
            <p class="text-white text-center"></p>
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
        </div>
        <main class="container mt-4">
            <form method="POST" action="{{route('posts.update', [$post_id->id])}}">
                @method('PUT')
                <div class="card-body">
                    <div class="card mb-4">
                        <label for="titlepage" class="form-label"><strong>Title:</strong></label>
                        <input type="text" class="form-control" id="titlepage" name="title" placeholder="Enter your title here" value="{{$post->title}}" required>
                    </div>
                <div class="card mb-4 publish-date-container">
                    <label for="publishDate" class="form-label"><strong>Publish Date:</strong></label>
                    <input type="text" class="form-control" id="publishDate" name="date_posted" readonly placeholder="Press the button set date" value="{{$post->date_posted}}">
                    <button class="btn btn-outline-primary btn-sm float-right" type="button" onclick="getDate()">Set Date</button>
                </div>
                <div class="card mb-4">
                    <label class="content"><strong>Content:</strong></label>
                    <textarea class="form-control" aria-label="With textarea" name="content" value="{{$post->content}}" reuqired></textarea>
                </div>
                    <button class="btn btn-outline-primary float-end"type="submit">Update Post</button>
                </div>
            </form>
        </main>


</body>
