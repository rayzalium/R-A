
<!DOCTYPE html>
<html lang="en">

<head>
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
                <img class="navbar-brand-light" src="./yemenia-logo.png" alt="Logo dark">
            </a>

     </header>



    <main>
        <form action="{{ route('LogSheet.store')}}" method="POST" id="logsheetForm">
            @csrf
    <div class="col-12">
        <div class="form-group", style="margin-top: 200px">
            <label class="my-1 mr-2" for="inlineFormCustomSelectPref">Plane</label>
            <select class="custom-select my-1 mr-sm-2" id="inlineFormCustomSelectPref" name="name_of_plane">
                <option selected name="name_of_plane" >Choose...</option>
                <option name="name_of_plane" >AFA320</option>
                <option name="name_of_plane" >AFB320</option>
                <option name="name_of_plane" >AFC320</option>



            </select>
        </div>
        </div>
        <div class="form-group">
            <label for="exampleFormControlTextarea2">No. of Flight</label>
            <input type="text" name="no_of_flight"  class="form-control" id="exampleInputPassword" aria-describedby="passwordHelp" placeholder="No. of Flight">
        </div>
     
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
                            <input class="form-control datepicker" id="exampleInputDate2" placeholder="Start date" type="text">
                        </div>
                    </div>
                </div>
                <div class="col">
                    <div class="form-group">
                        <label class="h6" for="exampleInputDate3">To</label>
                        <div class="input-group input-group-border">
                            <div class="input-group-prepend"><span class="input-group-text"><span class="far fa-calendar-alt"></span></span></div>
                            <input class="form-control datepicker" id="exampleInputDate3" placeholder="End date" type="text" format="YYYY/MM/DD">
                        </div>
                    </div>
                </div>
            </div>
            <div class="input-daterange timepicker row align-items-center">
                <div class="col">
                <div class="form-group">
                    <label class="h6" for="takeoffTime">Takeoff Time</label>
                    <div class="input-group input-group-border">
                        <div class="input-group-prepend">
                            <span class="input-group-text"><span class="far fa-clock"></span></span>
                        </div>
                        <input type="time" class="form-control timepicker" id="takeoffTime" placeholder="Select time" required>
                    </div>
                </div>
           
                <div class="col">
                <div class="form-group">
                    <label class="h6" for="landingTime">Landing Time</label>
                    <div class="input-group input-group-border">
                        <div class="input-group-prepend">
                            <span class="input-group-text"><span class="far fa-clock"></span></span>
                        </div>
                        <input type="time" class="form-control timepicker" id="landingTime" placeholder="Select time" required>
                    </div>
                </div>
                </div>
        </div>
    </div> 
        </div>
            <!-- End of Form -->
        </div>
    </div>


    <div class="form-group">
        <label class="my-1 mr-sm-2" for="departure">Departure:</label>
        <select class="custom-select my-1 mr-sm-2" id="departure" onchange="handleSelection('departure', 'arrival')">
          <option value="">Select Departure</option>
          <option value="Sna">Sana'a</option>
          <option value="Adn">Aden</option>
          <option value="Cri">Cairo</option>
          <option value="Amn">Amman</option>
          <option value="Mbi">Mumbai</option>
        </select>
    </div>
    <div class="form-group">
        <label class="my-1 mr-sm-2" for="arrival">Arrival:</label>
    <select class="custom-select my-1 mr-sm-2" id="arrival" onchange="handleSelection('arrival', 'departure')">
      <option value="">Select Arrival</option>
      <option value="Sna">Sana'a</option>
      <option value="Adn">Aden</option>
      <option value="Cri">Cairo</option>
      <option value="Amn">Amman</option>
      <option value="Mbi">Mumbai</option>
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



  <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>

  <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
  <script>
      $(document).ready(function () {
          $('#logsheetForm').on('submit', function (e) {
              e.preventDefault();
              $.ajax({
                  url: "{{ route('logsheet.store') }}",
                  method: "POST",
                  data: $(this).serialize(),
                  success: function (response) {
                      if (response.success) {
                          alert(response.message);

                          // After saving LogSheet, increment cycleA
                          $.ajax({
                              url: "{{ route('cycleA.increment') }}",
                              method: "POST",
                              data: { _token: '{{ csrf_token() }}' },
                              success: function (responseA) {
                                  if (responseA.success) {
                                      console.log("CycleA incremented.");

                                      // Then increment cycleB
                                      $.ajax({
                                          url: "{{ route('cycleB.increment') }}",
                                          method: "POST",
                                          data: { _token: '{{ csrf_token() }}' },
                                          success: function (responseB) {
                                              if (responseB.success) {
                                                  console.log("CycleB incremented.");

                                                  // Then increment cycleC
                                                  $.ajax({
                                                      url: "{{ route('cycleC.increment') }}",
                                                      method: "POST",
                                                      data: { _token: '{{ csrf_token() }}' },
                                                      success: function (responseC) {
                                                          if (responseC.success) {
                                                              console.log("CycleC incremented.");
                                                          }
                                                      }
                                                  });

                                              }
                                          }
                                      });
                                  }
                              }
                          });
                      }
                  }
              });
          });
      });
  </script>
   <script>
    $(document).ready(function () {
      // Initialize datepickers for "From" and "To" dates
      $('#exampleInputDate2').datepicker({
          format: "yyyy/mm/dd",
          autoclose: true,
          todayHighlight: true,
          icons: {
              time: 'far fa-clock',
              date: 'far fa-calendar-alt',
              up: 'fas fa-chevron-up',
              down: 'fas fa-chevron-down',
              previous: 'fas fa-chevron-left',
              next: 'fas fa-chevron-right'
          }
      }).on('changeDate', function () {
          const fromDate = $('#exampleInputDate2').datepicker('getDate');
          const formattedDate = formatDate(fromDate);
  
          // Update the input value and set the "To Date" start date
          $('#exampleInputDate2').val(formattedDate);
          $('#exampleInputDate3').datepicker('setStartDate', fromDate);
  
          // Print to the console
          console.log(`From Date Selected: ${formattedDate}`);
      });
  
      $('#exampleInputDate3').datepicker({
          format: "yyyy/mm/dd",
          autoclose: true,
          todayHighlight: true,
          icons: {
              time: 'far fa-clock',
              date: 'far fa-calendar-alt',
              up: 'fas fa-chevron-up',
              down: 'fas fa-chevron-down',
              previous: 'fas fa-chevron-left',
              next: 'fas fa-chevron-right'
          }
      }).on('changeDate', function () {
          const toDate = $('#exampleInputDate3').datepicker('getDate');
          const fromDate = $('#exampleInputDate2').datepicker('getDate');
  
          if (toDate < fromDate) {
              alert('The "To Date" cannot be earlier than the "From Date".');
              console.error(`Error: The "To Date" (${formatDate(toDate)}) is earlier than the "From Date" (${formatDate(fromDate)}).`);
              $('#exampleInputDate3').val('');
          } else {
              const formattedDate = formatDate(toDate);
  
              // Update the input value and print to the console
              $('#exampleInputDate3').val(formattedDate);
              console.log(`To Date Selected: ${formattedDate}`);
          }
      });
  
      // Helper function to format the date to "yyyy/mm/dd"
      function formatDate(date) {
          const year = date.getFullYear();
          const month = String(date.getMonth() + 1).padStart(2, '0'); // Months are 0-based
          const day = String(date.getDate()).padStart(2, '0');
          return `${year}/${month}/${day}`;
      }
    });
  </script>
  <script>
    function handleSelection(changedDropdownId, otherDropdownId) {
      const changedDropdown = document.getElementById(changedDropdownId);
      const otherDropdown = document.getElementById(otherDropdownId);

      const selectedValue = changedDropdown.value;

      // Enable all options in the other dropdown
      Array.from(otherDropdown.options).forEach(option => {
        option.disabled = false;
      });

      // Disable the selected value in the other dropdown
      if (selectedValue) {
        Array.from(otherDropdown.options).forEach(option => {
          if (option.value === selectedValue) {
            option.disabled = true;
          }
        });
      }
    }
</script>
<script>
    const takeoffTimeInput = document.getElementById("takeoffTime");
    const landingTimeInput = document.getElementById("landingTime");

    landingTimeInput.addEventListener("change", () => {
        const takeoffTime = takeoffTimeInput.value;
        const landingTime = landingTimeInput.value;

        if (takeoffTime && landingTime) {
            // Convert time strings to Date objects
            const takeoffDate = new Date(`1970-01-01T${takeoffTime}:00`);
            const landingDate = new Date(`1970-01-01T${landingTime}:00`);

            // Add 20 hours to the takeoff time
            const maxLandingTime = new Date(takeoffDate.getTime() + 20 * 60 * 60 * 1000);

            if (landingDate > maxLandingTime) {
                alert("The landing time cannot exceed the takeoff time by more than 20 hours.");
                landingTimeInput.value = ""; // Reset landing time
            }
        }
    });

    takeoffTimeInput.addEventListener("change", () => {
        const takeoffTime = takeoffTimeInput.value;
        const landingTime = landingTimeInput.value;

        if (takeoffTime && landingTime) {
            // Convert time strings to Date objects
            const takeoffDate = new Date(`1970-01-01T${takeoffTime}:00`);
            const landingDate = new Date(`1970-01-01T${landingTime}:00`);

            // Add 20 hours to the takeoff time
            const maxLandingTime = new Date(takeoffDate.getTime() + 20 * 60 * 60 * 1000);

            if (landingDate > maxLandingTime) {
                alert("The landing time cannot exceed the takeoff time by more than 20 hours.");
                landingTimeInput.value = ""; // Reset landing time
            }
        }
    });
</script>


</body>

</html>
