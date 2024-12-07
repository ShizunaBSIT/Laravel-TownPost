<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Login to Get Started</title>
    <link rel="stylesheet" href="{{ asset('/css/bootstrap/bootstrap.min.css') }}">
</head>
<body>
    <section class="main-bg" style="background-color:  #F5F7F8;">
        <div class="container py-5 h-100">
            <div class="row d-flex justify-content-center align-items-center h-100">
                <div class="col col-xl-10">
                    <div class="card" style="border-radius: 1rem; background-color: #495E57;">
                        <div class="row g-0">
                            <div class="col-md-6 col-lg-5 d-none d-md-block">
                                <img src="{{ asset('images/newspaper.jpg') }}" alt="login_cover" class="img-fluid" style="border-radius: 1rem 0 0 1rem;" />
                            </div>
                            <div class="col-md-6 col-lg-7 d-flex align-items-center">
                                <div class="card-body p-4 p-lg-5 text-black fw-bold">
                                <form class="mx-1 mx-md-4" action="{{ route('login') }}" method="POST">
                                        @csrf
                                        <div class="d-flex align-items-center mb-3 pb-1">
                                            <i class="me-3"style="
                                                display: inline-block; 
                                                width: 70px; 
                                                height: 60px; 
                                                background-image: url('/images/towntalk_logo 2.jpg'); 
                                                background-size: cover; 
                                                background-repeat: no-repeat; 
                                                background-position: center;">
                                                </i>
                                            <span class="h1 fw-bold mb-0" style=" color: white;">Town Talk E-Bulletin</span>
                                        </div>
                                        <h5 class="fw-bolder mb-3 pb-1" style="letter-spacing: 1px;  color: white;">Sign into your account</h5>
                                        <div data-mdb-input-init class="form-outline mb-4" style=" color: white;">
                                            <input type="email" id="form2Example17" name="email" class="form-control form-control-lg" placeholder="email@example.com" required />
                                            <label class="form-label" for="form2Example17">Email address</label>
                                        </div>
                                        <div data-mdb-input-init class="form-outline mb-4" style=" color: white;">
                                            <input type="password" id="form2Example27" name="password" class="form-control form-control-lg" required/>
                                            <label class="form-label" for="form2Example27">Password</label>
                                        </div>
                                        <div class="pt-1 mb-4">
                                            <button data-mdb-button-init data-mdb-ripple-init class="btn btn-dark btn-lg btn-block" type="submit">Login</button>
                                        </div>
                                        <a class="small text-muted" href="#!" style="color: white;">Forgot password?</a>
                                        <p class="mb-5 pb-lg-2" style=" color: white;">Don't have an account? <a href="{{ url('/register') }}" style="color: white;">Register here</a></p>
                                        <a href="{{url('/terms')}}" class="small" style="color: white;">Terms of use.</a>
                                        <a href="{{url('/privacy')}}" class="small" style="color: white;">Privacy policy</a>
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
