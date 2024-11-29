<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Login to Get Started</title>
    <link rel="stylesheet" href="{{ asset('css/bootstrap/bootstrap.min.css') }}">
</head>
<body>
    <section class="main-bg" style="background-color: #9A616D;">
        <div class="container py-5 h-100">
            <div class="row d-flex justify-content-center align-items-center h-100">
                <div class="col col-xl-10">
                    <div class="card" style="border-radius: 1rem; background-color: yellowgreen;">
                        <div class="row g-0">
                            <div class="col-md-6 col-lg-5 d-none d-md-block">
                                <img src="{{ asset('img/newspaper.jpg') }}" alt="login form" class="img-fluid" style="border-radius: 1rem 0 0 1rem;" />
                            </div>
                            <div class="col-md-6 col-lg-7 d-flex align-items-center">
                                <div class="card-body p-4 p-lg-5 text-black fw-bold">
                                    <form action="{{ route('login') }}" method="POST">
                                        @csrf
                                        <div class="d-flex align-items-center mb-3 pb-1">
                                            <a class="navbar-brand me-3" style="font-family: Garamond, serif; color: navy;" href="#">
                                                <img src="{{ asset('img/towntalk_logo 2.jpg') }}" alt="Logo" style="height: 80px;" class="d-inline-block">
                                                <span class="h1 d-inline-block fw-bolder mb-0" style="max-width: 150px;">Town Talk E-Bulletin</span>
                                            </a>
                                        </div>
                                        <h5 class="fw-bolder mb-3 pb-1" style="letter-spacing: 1px;">Sign into your account</h5>
                                        <div data-mdb-input-init class="form-outline mb-4">
                                            <input type="email" id="form2Example17" name="email" class="form-control form-control-lg" placeholder="junadelacruz@gmail.com" required />
                                            <label class="form-label" for="form2Example17">Email address</label>
                                        </div>
                                        <div data-mdb-input-init class="form-outline mb-4">
                                            <input type="password" id="form2Example27" name="password" class="form-control form-control-lg" required />
                                            <label class="form-label" for="form2Example27">Password</label>
                                        </div>
                                        <div class="pt-1 mb-4">
                                            <button data-mdb-button-init data-mdb-ripple-init class="btn btn-dark btn-lg btn-block" type="submit">Login</button>
                                        </div>
                                        <a class="small text-muted" href="#!">Forgot password?</a>
                                        <p class="mb-5 pb-lg-2" style="color: #393f81;">Don't have an account? <a href="{{ route('register') }}" style="color: #393f81;">Register here</a></p>
                                        <a href="#!" class="small text-muted">Terms of use.</a>
                                        <a href="#!" class="small text-muted">Privacy policy</a>
                                    </form>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>
    <script src="{{ asset('js/bootstrap/bootstrap.bundle.min.js') }}"></script>
</body>
</html>