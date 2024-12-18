<!DOCTYPE html>
<html>
    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <title>Create a New Account</title>

        <link rel="stylesheet" href="{{ asset('css/bootstrap/bootstrap.min.css') }}">
    </head>
    <body>
        <section class="vh-100" style="background-color: #eee; background-repeat: inherit;">
            <div class="container h-100">
              <div class="row d-flex justify-content-center align-items-center h-100">
                <div class="col-lg-12 col-xl-11">
                  <div class="card text-black" style="border-radius: 25px;">
                    <div class="card-body p-md-5">
                      <div class="row justify-content-center">
                        <div class="col-md-10 col-lg-6 col-xl-5 order-2 order-lg-1">
          
                          <p class="text-center h1 fw-bold mb-5 mx-1 mx-md-4 mt-4">Sign up</p>
          
                          <form class="mx-1 mx-md-4" action="{{ route('register') }}" method="POST">
                            @csrf
                            <div class="d-flex flex-row align-items-center mb-4">
                                <i class="fas fa-user fa-lg me-3 fa-fw"></i>
                                <div data-mdb-input-init class="form-outline flex-fill mb-0">
                                    <input type="text" id="form3Example1c" class="form-control" placeholder="Enter a valid Username" name="username" required />
                                    <label class="form-label" for="form3Example1c">Your Name</label>
                                </div>
                            </div>
                            <div class="d-flex flex-row align-items-center mb-4">
                                <i class="fas fa-envelope fa-lg me-3 fa-fw"></i>
                                <div data-mdb-input-init class="form-outline flex-fill mb-0">
                                    <input type="email" id="form3Example3c" class="form-control" placeholder="email@example.com" name="email" required />
                                    <label class="form-label" for="form3Example3c">Your Email</label>
                                </div>
                            </div>
                            <div class="d-flex flex-row align-items-center mb-4">
                                <i class="fas fa-lock fa-lg me-3 fa-fw"></i>
                                <div data-mdb-input-init class="form-outline flex-fill mb-0">
                                    <input type="password" id="form3Example4c" class="form-control" placeholder="(Should not contain illegal characters)" name="password" required />
                                    <label class="form-label" for="form3Example4c">Password</label>
                                </div>
                            </div>
                            <div class="d-flex flex-row align-items-center mb-4">
                                <i class="fas fa-key fa-lg me-3 fa-fw"></i>
                                <div data-mdb-input-init class="form-outline flex-fill mb-0">
                                    <input type="password" id="form3Example4cd" class="form-control" name="password_confirmation" required />
                                    <label class="form-label" for="form3Example4cd">Repeat your password</ label>
                                </div>
                            </div>
                            <div class="form-check d-flex justify-content-center mb-5">
                                <input class="form-check-input me-2" type="checkbox" value="" id="form2Example3c" required />
                                <label class="form-check-label" for="form2Example3">
                                    I agree all statements in <a href="{{ url('/terms') }}">Terms of service</a>
                                </label>
                            </div>
                            <div class="d-flex justify-content-center mx-4 mb-3 mb-lg-4">
                                <button type="submit" data-mdb-button-init data-mdb-ripple-init class="btn btn-primary btn-lg">Register</button>
                            </div class="d-flex justify-content-center">
                            <p>Already have an account? <a href="{{url('/login')}}">Login</a></p>
                            <div>

                            </div>
                          </form>
                                  
                        </div>
                        <div class="col-md-10 col-lg-6 col-xl-7 d-flex align-items-center order-1 order-lg-2">
          
                          <img src="Images/towntalk_logo 2.jpg"
                            class="img-fluid" alt="Sample image">
          
                        </div>
                      </div>
                    </div>
                  </div>
                </div>
              </div>
            </div>
          </section>
    </body>
    <script src="js/bootstrap.bundle.min.js"></script>
</html>