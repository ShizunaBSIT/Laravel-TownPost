<!doctype html>
<html lang="en">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Landing Page</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/bootstrap-icons/1.11.1/font/bootstrap-icons.min.css">
    <link href="{{ asset('/css/announcement.css') }}" rel="stylesheet">
    <style>
        body.modal-open {
            overflow: hidden; /* Prevent scrolling when modal is open */
        }
        .modal-backdrop {
            z-index: 1040; /* Ensures backdrop is below the modal */
        }
        .modal {
            z-index: 1050; /* Ensures modal appears above the backdrop */
            display: block; /* Force modal to be visible for demo */
        }
    </style>
</head>
<body>
    <!-- Modal -->
    <div class="modal show" id="myModal" tabindex="-1" aria-hidden="true">
        <div class="modal-dialog">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title">Hi, there! 🙋🏽‍♀️</h5>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <div class="modal-body">
                    <p>Sorry! Create your Account to continue😖 </p>
                </div>
                <div class="modal-footer">
                    <a href="{{url('/announcement')}}">
                        <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
                    </a>
                    <a href="{{url('/login')}}">
                        <button type="button" class="btn btn-primary" onclick="myButtons()">Create Account</button>
                    </a>
                </div>
            </div>
        </div>
    </div>

    <!-- Required Scripts -->
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js"></script>
    <script>
        document.addEventListener('DOMContentLoaded', function () {
            const modal = new bootstrap.Modal(document.getElementById('myModal'), {
                backdrop: 'static', // Prevent closing by clicking outside
                keyboard: false    // Disable closing with ESC key
            });
            modal.show(); // Show the modal on page load
        });
    </script>
</body>
</html>
