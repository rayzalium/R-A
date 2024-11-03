<!DOCTYPE html>
<html lang="en">

<head>
    <meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<!-- Primary Meta Tags -->
<title> Log In</title>
<meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
<meta name="title" content="Neumorphism Components - Tables">
<meta name="author" content="Themesberg">

<link rel="canonical" href="https://themesberg.com/product/ui-kits/neumorphism-ui/" />


<!-- Fontawesome -->
<link type="text/css" href="./@fortawesome/fontawesome-free/css/all.min.css" rel="stylesheet">
<link rel="stylesheet"  href="{{ asset('assets/css/@fortawesome/fontawesome-free/css/all.min.css') }}" >


<!-- Pixel CSS -->
<link rel="stylesheet" type="text/css" href="{{ asset('assets/css/style.css') }}" >

<!-- NOTICE: You can use the _analytics.html partial to include production code specific code & trackers -->

</head>

<body>
    <main>
        <!-- Section -->
        <section class="min-vh-100 d-flex bg-primary align-items-center">
            <div class="container">
                <div class="row justify-content-center">
                    <div class="col-12 col-md-8 col-lg-6 justify-content-center">
                        <div class="card bg-primary shadow-soft border-light p-4">
                            <div class="row">
                                <h2 class="col text-start m-0" style="font-size: 45px;">Sign in</h2>

                                <div class="col text-end d-flex flex-row-reverse " style="width: 40;"> <img class="float-end " style="max-width: 40%;" src="{{ asset('assets/img/1280px-Yemenia_Logo.svg.png') }}" ></div>



                            </div>
                            <div class="card-body">
                                <form method="POST" action="{{ route('login') }}" class="mt-4">
                                    @csrf
                                    <!-- Form -->
                                    <div class="form-group">
                                        <label for="exampleInputIcon3">Email</label>
                                        <div class="input-group mb-4">
                                            <div class="input-group-prepend">
                                                <span class="input-group-text"><span class="far fa-user"></span></span>
                                            </div>
                                            <input class="form-control" id="exampleInputIcon3" placeholder="email" type="email" name="email" :value="old('email')" required autofocus autocomplete="username" aria-label="email adress">
                                        </div>
                                        <x-input-error :messages="$errors->get('email')" class="mt-2" />
                                    </div>
                                    <!-- End of Form -->
                                    <div class="form-group">
                                        <!-- Form -->
                                        <div class="form-group">
                                            <label for="exampleInputPassword6">Password</label>
                                            <div class="input-group mb-4">
                                                <div class="input-group-prepend">
                                                    <span class="input-group-text"><span class="fas fa-unlock-alt"></span></span>
                                                </div>
                                                <input class="form-control" id="exampleInputPassword6" placeholder="Password" type="password"
                                                name="password"
                                                 autocomplete="current-password" aria-label="Password" required>
                                            </div>
                                            <x-input-error :messages="$errors->get('password')" class="mt-2" />

                                        </div>
                                        <!-- End of Form -->

                                    <button type="submit" class="btn btn-block btn-primary">Sign in</button>
                                    <div class="d-block d-sm-flex justify-content-between align-items-center mb-4">
                                        <div class="form-check">
                                            <input class="form-check-input" type="checkbox" value="" id="defaultCheck5">
                                        </div>
                                        <div><a href="#" class="small text-right">Forget password?</a></div>
                                    </div>
                                </div>
                                </form>

    <!-- Core -->
<script src="../../vendor/jquery/dist/jquery.min.js"></script>
<script src="../../vendor/popper.js/dist/umd/popper.min.js"></script>
<script src="../../vendor/bootstrap/dist/js/bootstrap.min.js"></script>
<script src="../../vendor/headroom.js/dist/headroom.min.js"></script>

<!-- Vendor JS -->
<script src="../../vendor/onscreen/dist/on-screen.umd.min.js"></script>
<script src="../../vendor/nouislider/distribute/nouislider.min.js"></script>
<script src="../../vendor/bootstrap-datepicker/dist/js/bootstrap-datepicker.min.js"></script>
<script src="../../vendor/waypoints/lib/jquery.waypoints.min.js"></script>
<script src="../../vendor/jarallax/dist/jarallax.min.js"></script>
<script src="../../vendor/jquery.counterup/jquery.counterup.min.js"></script>
<script src="../../vendor/jquery-countdown/dist/jquery.countdown.min.js"></script>
<script src="../../vendor/smooth-scroll/dist/smooth-scroll.polyfills.min.js"></script>
<script src="../../vendor/prismjs/prism.js"></script>

<script async defer src="https://buttons.github.io/buttons.js"></script>

<!-- Neumorphism JS -->
<script src="../../assets/js/neumorphism.js"></script>
</body>
</html>
