<!doctype html>
<html lang="en">
  <head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Create Post</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-QWTKZyjpPEjISv5WaRU9OFeRpok6YctnYmDr5pNlyT2bRjXh0JMhjY6hW+ALEwIH" crossorigin="anonymous">
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
   <div class="card" style="width: 18rem;">
        <div class="card-body">

        <!--the error here is that $user is not recognize this is from the users controller basically this
        is the problem here where the users credentials is not fetch -->
            <h5 class="card-title">Account Details</h5>
            <p class="card-text">Email: {{$user[0]->email}}</p>
            <p class="card-text">Username: {{$user[0]->username}}</p>
            <p class="card-text">Date Created: {{$user[0]->date_created}}</p>
        </div>

        <!-- Button to trigger Update Account -->
        <button type="button" class="btn btn-warning" data-bs-toggle="modal" data-bs-target="#updateAccountModal">
            Update Account
        </button>
        <!-- Update Account Modal -->
        <div class="modal fade" id="updateAccountModal" tabindex="-1" aria-labelledby="updateAccountModalLabel" aria-hidden="true">
            <div class="modal-dialog">
                <div class="modal-content">
                    <!--in updating the user first it must identify the userID is-->
                    <form action="{{ route('updateUser', $user[0]->userID) }}" method="POST">
                    @csrf
                    @method('PUT')
                    <div class="modal-header">
                        <h5 class="modal-title" id="updateAccountModalLabel">Update Account Credentials</h5>
                            <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                    </div>
                        <div class="modal-body">
                        <div class="mb-3">
                            <label for="emailInput" class="form-label">Email address:</label>
                            <input type="email" name="email" class="form-control" id="emailInput" aria-describedby="emailHelp">
                        <div id="emailHelp" class="form-text">We'll never share your email with anyone else.</div>
                        </div>
                        <div class="mb-3">
                            <label for="usernameInput" class="form-label">Username:</label>
                            <input type="text" name="username" class="form-control" id="usernameInput">
                        </div>
                        <div class="mb-3">
                            <label for="passwordInput" class="form-label">Update Password:</label>
                            <input type="password" name="password" class="form-control" id="passwordInput">
                        </div>
                    </div>
                        <div class="modal-footer">
                            <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
                            <button type="submit" class="btn btn-primary">Save Changes</button>
                        </div>
                    </form>
                </div>
            </div>
        </div>

                <!-- Button to trigger Delete Account Modal -->
                <button type="button" class="btn btn-danger" data-bs-toggle="modal" data-bs-target="#deleteAccountModal">
                    Delete Account
                </button>

                <!-- Delete Account Modal -->
                <div class="modal fade" id="deleteAccountModal" tabindex="-1" aria-labelledby="deleteAccountModalLabel" aria-hidden="true">
                    <div class="modal-dialog">
                        <div class="modal-content">
                    <form action="{{ route('deleteUser', $user[0]->userID) }}" method="POST">
                        @csrf
                        @method('DELETE')
                        <div class="modal-header">
                            <h5 class="modal-title" id="deleteAccountModalLabel">Account Deletion Warning!</h5>
                            <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                        </div>
                        <div class="modal-body">
                            Are you sure you want to delete your account? This action cannot be undone.
                        </div>
                        <div class="modal-footer">
                            <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
                            <button type="submit" class="btn btn-danger">Confirm Delete</button>
                        </div>
                    </form>
                </div>
            </div>
     </div>
</main>
</body>
</html>
