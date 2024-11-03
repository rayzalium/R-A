
<!DOCTYPE html>
<html lang="en">

<head>
    <meta name="csrf-token" content="{{ csrf_token() }}">
    <meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<!-- Primary Meta Tags -->
<title>LogSheet</title>
<meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
<meta name="title" content="Neumorphism Components - Forms">
<meta name="author" content="Themesberg">

<link rel="canonical" href="https://themesberg.com/product/ui-kits/neumorphism-ui/" />

<!--  Social tags -->
<meta name="keywords" content="neumorphism, neumorphism ui, neomorphism, neomorphism ui, neomorphism css, neumorphism css, neumorph, neumorphic, design system, login, form, table, tables, card, cards, navbar, modal, icons, icons, map, chat, carousel, menu, datepicker, gallery, slider, date, social, dropdown, search, tab, nav, footer, date picker, forms, tabs, time, button, select, input, timeline, cart, about us, account, log in, blog, profile, portfolio, landing page, ecommerce, shop, landing, register, app, contact, one page, sign up, signup, store, bootstrap 4, bootstrap4, dashboard, bootstrap 4 dashboard, bootstrap 4 design, bootstrap 4 system, bootstrap 4, bootstrap 4 uit kit, bootstrap 4 kit, themesberg, html kit, html css template, web template, bootstrap, bootstrap 4, css3 template, frontend, responsive bootstrap template, bootstrap ui kit, responsive ui kit">
<meta name="description" content="Start developing neumorphic web applications and pages using Neumorphism UI. It features over 100 individual components and 5 example pages.">

<!-- Schema.org markup for Google+ -->
<meta itemprop="name" content="Neumorphism UI by Themesberg">
<meta itemprop="description" content="Start developing neumorphic web applications and pages using Neumorphism UI. It features over 100 individual components and 5 example pages.">
<meta itemprop="image" content="https://themesberg.s3.us-east-2.amazonaws.com/public/products/neumorphism-ui/neumorphism-thumbnail.jpg">

<!-- Twitter Card data -->
<meta name="twitter:card" content="product">
<meta name="twitter:site" content="@themesberg">
<meta name="twitter:title" content="Neumorphism UI by Themesberg">
<meta name="twitter:description" content="Start developing neumorphic web applications and pages using Neumorphism UI. It features over 100 individual components and 5 example pages.">
<meta name="twitter:creator" content="@themesberg">
<meta name="twitter:image" content="https://themesberg.s3.us-east-2.amazonaws.com/public/products/neumorphism-ui/neumorphism-thumbnail.jpg">

<!-- Open Graph data -->
<meta property="fb:app_id" content="214738555737136">
<meta property="og:title" content="Neumorphism UI by Themesberg" />
<meta property="og:type" content="article" />
<meta property="og:url" content="https://demo.themesberg.com/neumorphism-ui/" />
<meta property="og:image" content="https://themesberg.s3.us-east-2.amazonaws.com/public/products/neumorphism-ui/neumorphism-thumbnail.jpg"/>
<meta property="og:description" content="Start developing neumorphic web applications and pages using Neumorphism UI. It features over 100 individual components and 5 example pages." />
<meta property="og:site_name" content="Themesberg" />

<!-- Favicon -->
<link rel="apple-touch-icon" sizes="120x120" href="../../assets/img/favicon/apple-touch-icon.png">
<link rel="icon" type="image/png" sizes="32x32" href="../../assets/img/favicon/favicon-32x32.png">
<link rel="icon" type="image/png" sizes="16x16" href="../../assets/img/favicon/favicon-16x16.png">
<link rel="manifest" href="../../assets/img/favicon/site.webmanifest">
<link rel="mask-icon" href="../../assets/img/favicon/safari-pinned-tab.svg" color="#ffffff">
<meta name="msapplication-TileColor" content="#ffffff">
<meta name="theme-color" content="#ffffff">

<!-- Fontawesome -->
<link type="text/css" href="./@fortawesome/fontawesome-free/css/all.min.css" rel="stylesheet">
<link rel="stylesheet"  href="{{ asset('assets/css/@fortawesome/fontawesome-free/css/all.min.css') }}" >

<!-- Pixel CSS -->
<link type="text/css" href="./neumorphism.css" rel="stylesheet">
<link rel="stylesheet" type="text/css" href="{{ asset('assets/css/style.css') }}" >
<link rel="stylesheet" type="text/css" href="{{ asset('assets/bootstrap-datetimepicker.min.css') }}" >

<link rel="stylesheet" href="./bootstrap-datetimepicker.min.css">


<!-- NOTICE: You can use the _analytics.html partial to include production code specific code & trackers -->

</head>

<body>





    <header class="header-global">
        <nav id="navbar-main" aria-label="Primary navigation" class="navbar navbar-main navbar-expand-lg navbar-theme-primary headroom navbar-light">
            <div class="container position-relative">
            <a class="navbar-brand shadow-soft py-2 px-3 rounded border border-light mr-lg-4" href="../../index.html">
                <img class="navbar-brand-dark" src="../../assets/img/brand/yemenia-logo.png" alt="Logo light">
                <img class="navbar-brand-light" src="{{ asset('assets/img/yemenia-logo.png') }}" alt="Logo dark">
            </a>

     </header>



    <main>
        <form action="{{ route('logsheet.store')}}" method="POST" id="logSheetForm">
            @csrf
    <div class="col-12">
        <div class="form-group", style="margin-top: 200px">
            <label class="my-1 mr-2" for="name_of_plane">name_of_plane</label>
            <select class="custom-select my-1 mr-sm-2" id="inlineFormCustomSelectPref" name="name_of_plane">
                <option selected name="name_of_plane" value="" >Choose...</option>
                <option name="name_of_plane" value="AFA320">AFA320</option>
                <option name="name_of_plane" value="AFB320" >AFB320</option>
                <option name="name_of_plane"  value="AFC320">AFC320</option>



            </select>
        </div>
        </div>
        <div class="form-group">
            <label for="exampleFormControlTextarea2">No. of Flight</label>
            <input type="text" name="no_of_flight"  class="form-control" id="exampleInputPassword" aria-describedby="passwordHelp" placeholder="No. of Flight">
        </div>
     <!-- <div class="row">
        <div class="col-12">
             Form

            <div class="form-group" >
                <label class="h6" for="exampleInputDate1">Choose a date</label>
                <div class="input-group mb-4">
                    <div class="input-group-prepend">

                        <span class="input-group-text"><span class="far fa-calendar-alt"></span></span>
                    </div>
                    <input class="form-control datepicker" id="exampleInputDate1" placeholder="Select date" type="text" aria-label="Date with icon left">
                </div>
            </div>
         End of Form
        </div> -->
        <!-- <div class="col-md-4 text-center">
            <h3 class="h5">Calendar Datepicker</h3>
            <div class="w-100">
        <form action="" method="post" class="datepickers">
      <div class="form-group">
         <label class="label-control" for="id_start_datetime">Datetime picker</label>
        <div class="input-group date" id="id_0">
          <input type="text" value="" class="form-control" placeholder="MM/DD/YYYY hh:mm:ss" required/>
        </div>
      </div>
        </form> -->
            </div>
        </div>
        <div>
        <div class="col-12">
            <!-- Form -->
            <div class="input-daterange datepicker row align-items-center">
                <div class="col">
                    <label class="h6" for="exampleInputDate2">From</label>
                    <div class="form-group">
                        <div class="input-group input-group-border">
                            <div class="input-group-prepend"><span class="input-group-text"><span class="far fa-calendar-alt"></span></span></div>
                            <input class="form-control datepicker" name="srart_date" id="exampleInputDate2" placeholder="Start date" type="text">
                        </div>
                    </div>
                </div>
                <div class="col">
                    <div class="form-group">
                        <label class="h6" for="exampleInputDate3">To</label>
                        <div class="input-group input-group-border">
                            <div class="input-group-prepend"><span class="input-group-text"><span class="far fa-calendar-alt"></span></span></div>
                            <input class="form-control datepicker" id="exampleInputDate3" name="end_date" placeholder="End date" type="text">
                        </div>
                    </div>
                </div>
            </div>
            <div class="input-daterange timepicker row align-items-center">
            <div class="col">
            <div class="form-group">
                <label class="h6" for="exampleInputTime">Takeoff Time</label>
                <div class="input-group input-group-border">
                    <div class="input-group-prepend">
                        <span class="input-group-text"><span class="far fa-clock"></span></span>
                    </div>
                    <input type="time" name="take_of_time" class="form-control timepicker" id="exampleInputTime" placeholder="Select time" required>
                </div>
            </div>
            </div>
            <div class="col">
            <div class="form-group">
                <label class="h6" for="exampleInputTime">Landing Time</label>
                <div class="input-group input-group-border">
                    <div class="input-group-prepend">
                        <span class="input-group-text"><span class="far fa-clock"></span></span>
                    </div>
                    <input type="time" class="form-control timepicker" name="landing_time" id="exampleInputTime" placeholder="Select time" required>
                </div>
            </div>
            </div>
        </div>
            <!-- End of Form -->
        </div>
    </div>


    <div class="form-group">
        <label class="my-1 mr-2" for="inlineFormCustomSelectPref">Departure</label>
        <select class="custom-select my-1 mr-sm-2" id="inlineFormCustomSelectPref" name="deprature">
            <option selected name="deprature">Choose...</option>
            <option name="deprature" >Sana'a</option>
            <option name="deprature">Aden</option>
            <option  name="deprature" >Cairo</option>
            <option name="deprature" >Jordan</option>

        </select>
    </div>
    <div class="form-group">
        <label class="my-1 mr-2" for="inlineFormCustomSelectPref">Arrival</label>
        <select class="custom-select my-1 mr-sm-2" id="inlineFormCustomSelectPref" name="arrival">
            <option selected name="arrival">Choose...</option>
            <option name="arrival" >Sana'a</option>
            <option name="arrival" >Aden</option>
            <option name="arrival" >Cairo</option>
            <option name="arrival" >Jordan</option>

        </select>
    </div>



    <button class="btn btn-primary text-success mr-2 mb-2" type="submit" >Submit </button>

</form>
    </main>
    <!-- <a id="producthunt-badge" href="https://www.producthunt.com/posts/neumorphism-ui?utm_source=badge-featured&utm_medium=badge&utm_souce=badge-neumorphism-ui" target="_blank"><img src="https://api.producthunt.com/widgets/embed-image/v1/featured.svg?post_id=200908&theme=dark" alt="Neumorphism UI - Neumorphism inspired UI web components, sections and pages | Product Hunt Embed" style="width: 250px; height: 54px;" width="250px" height="54px" /></a> -->

    <footer class="d-flex pb-5 pt-6 pt-md-7 border-top border-light">
        <div class="container">
            <div class="row">
                <div class="col-lg-4"></div>
            </div>
            <hr class="my-5">
            <div class="row">
                <div class="col text-center">
                    <p class="font-weight-normal font-small mb-0" >Copyright © QMMR <span class="current-year">2024</span>. All rights reserved.</p>
                </div>
            </div>
        </div>
    </footer>

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
<script src="../js/jquery.min.js"></script>
  <script src="js/popper.js"></script>
  <script src="js/bootstrap.min.js"></script>
  <script src="js/moment-with-locales.min.js"></script>
  <script src="js/bootstrap-datetimepicker.min.js"></script>
  <script src="js/main.js"></script>

  <script src = "https://ajax.aspnetCDN.com/ajax/jQuery/jQuery-1.9.0.min.js"></script>
  <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>

  <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
  <script>
    $(document).ready(function() {
        // Set up CSRF token for AJAX
        $.ajaxSetup({
            headers: {
                'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
            }
        });

        // Handle form submission with AJAX
        $('#logSheetForm').on('submit', function(event) {
            event.preventDefault(); // Prevent default form submission

            $.ajax({
                url: '{{ route('logsheet.store') }}',
                type: 'POST',
                data: $(this).serialize(),
                success: function(response) {
                    if (response.success) {
                        alert(response.message); // Display success message
                    }
                },
                error: function(xhr) {
                    // Display error message
                    alert('An error occurred: ' + xhr.responseText);
                }
            });
        });
    });
</script>



</body>

</html>
