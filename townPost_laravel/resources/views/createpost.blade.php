<!doctype html>
<html lang="en">
  <head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Create Post</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-QWTKZyjpPEjISv5WaRU9OFeRpok6YctnYmDr5pNlyT2bRjXh0JMhjY6hW+ALEwIH" crossorigin="anonymous">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/bootstrap-icons/1.11.1/font/bootstrap-icons.min.css">
    <link href="{{ asset('/css/createpost.css') }}" rel="stylesheet">
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
                <a class="nav-link text-white" href="{{route('logout')}}">
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
<form method="POST" action="{{route('createPost')}}">
    @csrf
        <div class="card mb-4">
            <div class="card-header">
                <h5 class="card-title">Add New Post</h5>
        </div>
        <div class="card-body">
            <div class="card mb-4">
                <label for="titlepage" class="form-label"><strong>Title:</strong></label>
                <input type="text" class="form-control" id="titlepage" name="title" placeholder="Enter your title here">
            </div>
            <div class="card mb-4">
            <label for="category" class="form-label"><strong>Category ID:</strong></label>
                <select class="form-select" id="category" name="category_ID">
                    <option selected>Choose...</option>
                    <option value="1">Job</option>
                    <option value="2">School</option>
                    <option value="3">Community</option>
                    <option value="3">Entertainment</option>
                    <option value="3">News</option>
                </select>
            </div>
            <div class="card mb-4">
                <!--session here is not working-->
                    if(session('success'))
                        <div class="alert alert-success" role="alert">
                            {{Auth::user()->user_ID}}
                        </div>
                    @endif
                   <!-- <label for="userid" class="form-label"><strong>Publish by: </strong></label>
                    <input type="text" class="form-control" id="userid" name="username" placeholder="Enter your username here">-->
            </div>
            <div class="card mb-4 publish-date-container">
                    <label for="publishDate" class="form-label"><strong>Publish Date:</strong></label>
                    <input type="text" class="form-control" id="publishDate" name="date_posted" readonly placeholder="Press the button set date">
                    <button class="btn btn-outline-primary btn-sm float-right" type="button" onclick="getDate()">Set Date</button>
            </div>
            <div class="card mb-4">
                    <label class="content"><strong>Content:</strong></label>
                    <textarea class="form-control" aria-label="With textarea" name="content"></textarea>
            </div>
                    <button class="btn btn-outline-primary float-end"type="submit">Save</button>
    </div>
</form>
</main>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-YvpcrYf0tY3lHB60NNkmXc5s9fDVZLESaAA55NDzOxhy9GkcIdslK1eN7N6jIeHz" crossorigin="anonymous"></script>
    <script>
    function getDate() {
        var date = new Date();
        var day = date.getDate();
        var month = date.getMonth() + 1;
        var year = date.getFullYear();
        var formattedTime = `${year}/${month}/${day}`;
        document.getElementById('publishDate').value = formattedTime;
    }
</script>
<script src="{{ asset('js/announcement.js') }}"></script>
</body>
</html>