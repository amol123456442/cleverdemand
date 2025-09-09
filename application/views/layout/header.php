<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Document</title>
  <style>
    .navbg {
      background-color: #254D70;
    }

    .nav-link {
      color: white;
      position: relative;
      transition: background-color 0.3s ease, color 0.3s ease;
      border-radius: 5px;
      padding: 5px 10px;
      cursor: pointer;
    }

    .nav-link:hover,
    .nav-link:focus {
      background-color: rgba(255, 255, 255, 0.2);
      color: #fff;
      text-decoration: none;
    }

    .dropdown-menu .dropdown-item:hover {
      background-color: #254D70;
      color: white;
    }


    .nav-item.dropdown:hover .dropdown-menu {
      display: block;
      margin-top: 0;
    }

    .podcast-link {
      position: relative;
      display: inline-block;
      padding-right: 40px;
    }

    .trending-badge {
      position: absolute;
      top: -10px;
      right: -25px;
      background-color: orange;
      color: white;
      font-size: 12px;
      padding: 2px 6px;
      border-radius: 3px;
      animation: blink 1s infinite;
    }

    @keyframes blink {

      0%,
      100% {
        opacity: 1;
      }

      50% {
        opacity: 0;
      }
    }

    .dropdown-submenu {
      position: relative;
    }

    .dropdown-submenu>.dropdown-menu {
      top: 0;
      left: 100%;
      margin-top: -1px;
      display: none;
    }

    .dropdown-submenu:hover>.dropdown-menu {
      display: block;
    }

    .dropdown-menu.sub-menu {
      width: 700px;
      /* Adjust width to accommodate 3 columns */
      padding: 10px;
    }

    .grid-container {
      display: grid;
      grid-template-columns: repeat(3, 1fr);
      /* 3 columns with equal width */
      gap: 10px;
      /* Space between items */
    }

    .grid-container li {
      margin: 0;
      /* Remove default margins */
    }

    .dropdown-item {
      padding: 5px 10px;
      /* Adjust padding for better spacing */
      white-space: nowrap;
      /* Prevent text wrapping */
    }

    .navbg {
      background-color: #254D70;
    }

    .nav-link {
      color: white;
      position: relative;
      transition: background-color 0.3s ease, color 0.3s ease;
      border-radius: 5px;
      padding: 5px 10px;
      cursor: pointer;
    }

    .nav-link:hover,
    .nav-link:focus {
      background-color: rgba(255, 255, 255, 0.2);
      color: #fff;
      text-decoration: none;
    }

    .dropdown-menu .dropdown-item:hover {
      background-color: #254D70;
      color: white;
    }

    .nav-item.dropdown:hover .dropdown-menu {
      display: block;
      margin-top: 0;
    }

    .podcast-link {
      position: relative;
      display: inline-block;
      padding-right: 40px;
    }

    .trending-badge {
      position: absolute;
      top: -10px;
      right: -25px;
      background-color: orange;
      color: white;
      font-size: 12px;
      padding: 2px 6px;
      border-radius: 3px;
      animation: blink 1s infinite;
    }

    @keyframes blink {

      0%,
      100% {
        opacity: 1;
      }

      50% {
        opacity: 0;
      }
    }

    .dropdown-submenu {
      position: relative;
    }

    .dropdown-submenu>.dropdown-menu {
      top: 0;
      left: 100%;
      margin-top: -1px;
      display: none;
    }


    /* search section responsive */
    .search-container {
      position: relative;
      width: 250px;
    }

    .input-group {
      position: relative;
      width: 100%;
    }

    .form-control {
      height: 40px;
      padding-right: 40px;
    }

    .btn-link {
      position: absolute;
      right: 10px;
      top: 50%;
      transform: translateY(-50%);
      border: none;
      background: none;
      z-index: 10;
    }

    /* Mobile Responsive Styles */
    @media (max-width: 991px) {
      .search-container {
        width: 100%;
        margin-top: 10px;
      }

      .input-group {
        width: 100%;
      }

      .form-control {
        min-width: 0 !important;
        width: 100% !important;
        height: 36px;
        padding-right: 36px;
      }

      .btn-link {
        right: 8px;
      }

      .bi-search {
        font-size: 14px;
      }
    }

    @media (max-width: 576px) {
      .search-container {
        margin-top: 8px;
      }

      .form-control {
        height: 32px;
        padding: 6px 32px 6px 12px;
      }

      .btn-link {
        right: 6px;
      }

      .bi-search {
        font-size: 12px;
      }
    }
  </style>

</head>

<body>
  <nav class="navbar navbg navbar-expand-lg py-3 sticky-top">
    <div class="container-fluid d-flex justify-content-between align-items-center">

      <!-- Logo -->
      <a class="navbar-brand me-5 text-light" href="<?php echo base_url('/'); ?>">Logo</a>

      <!-- Toggler (for mobile view) -->
      <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarSupportedContent"
        aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
        <span class="navbar-toggler-icon"></span>
      </button>

      <!-- Center nav and search using custom spacing -->
      <div class="collapse navbar-collapse flex-grow-1" id="navbarSupportedContent">
        <div class="d-flex w-100 justify-content-between align-items-center">

          <!-- Nav Tabs -->
          <ul class="navbar-nav mx-auto mb-2 mb-lg-0">
            <li class="nav-item mx-3">
     <a class="nav-link active text-light" aria-current="page" href="<?php echo base_url('news'); ?>">News</a>

            </li>
            <!-- nav-item     is delete -->
            <li class=" dropdown mx-3" id="mainDropdown">
              <a class="nav-link dropdown-toggle text-light" href="#" role="button" data-bs-toggle="dropdown"
                aria-expanded="false">
                Market Guide
              </a>
              <ul class="dropdown-menu border-0 bg-light">
                <!-- MarTech -->
                <li class="dropdown-submenu position-relative">
                  <a class="dropdown-item dropdown-toggle" href="#">MarTech</a>
                  <ul class="dropdown-menu sub-menu bg-light">
                    <div class="grid-container">
                      <li><a class="dropdown-item" href="#">Advertising</a></li>
                      <li><a class="dropdown-item" href="#">AI</a></li>
                      <li><a class="dropdown-item" href="#">Analytics</a></li>
                      <li><a class="dropdown-item" href="#">Business Intelligence</a></li>
                      <li><a class="dropdown-item" href="#">CDP</a></li>
                      <li><a class="dropdown-item" href="#">Communications</a></li>
                      <li><a class="dropdown-item" href="#">Content Management</a></li>
                      <li><a class="dropdown-item" href="#">Content Marketing</a></li>
                      <li><a class="dropdown-item" href="#">Conversational Marketing</a></li>
                      <li><a class="dropdown-item" href="#">CRM</a></li>
                      <li><a class="dropdown-item" href="#">Customer Engagement</a></li>
                      <li><a class="dropdown-item" href="#">Customer Experience</a></li>
                      <li><a class="dropdown-item" href="#">Cybersecurity</a></li>
                      <li><a class="dropdown-item" href="#">Data Management</a></li>
                      <li><a class="dropdown-item" href="#">Digital Asset Management</a></li>
                      <li><a class="dropdown-item" href="#">Digital Experience</a></li>
                      <li><a class="dropdown-item" href="#">Digital Marketing</a></li>
                      <li><a class="dropdown-item" href="#">Digital Transformation</a></li>
                      <li><a class="dropdown-item" href="#">E-commerce</a></li>
                      <li><a class="dropdown-item" href="#">Email Marketing</a></li>
                      <li><a class="dropdown-item" href="#">Marketing Automation</a></li>
                      <li><a class="dropdown-item" href="#">Marketing Cloud</a></li>
                      <li><a class="dropdown-item" href="#">Sales</a></li>
                      <li><a class="dropdown-item" href="#">SEO/SEM</a></li>
                      <li><a class="dropdown-item" href="#">Social Media</a></li>
                      <li><a class="dropdown-item" href="#">Supply Chain Management</a></li>
                    </div>
                  </ul>
                </li>

                <!-- HRTech -->
                <li class="dropdown-submenu position-relative">
                  <a class="dropdown-item dropdown-toggle" href="#">HRTech</a>
                  <ul class="dropdown-menu sub-menu bg-light">
                    <div class="grid-container">
                      <li><a class="dropdown-item" href="#">AI</a></li>
                      <li><a class="dropdown-item" href="#">Cybersecurity</a></li>
                      <li><a class="dropdown-item" href="#">Diversity, Equity & Inclusion (DEI)</a></li>
                      <li><a class="dropdown-item" href="#">Employee Experience</a></li>
                      <li><a class="dropdown-item" href="#">Employee Wellness</a></li>
                      <li><a class="dropdown-item" href="#">HCM</a></li>
                      <li><a class="dropdown-item" href="#">HR Analytics</a></li>
                      <li><a class="dropdown-item" href="#">HR Automation</a></li>
                      <li><a class="dropdown-item" href="#">HR Cloud</a></li>
                      <li><a class="dropdown-item" href="#">Learning & Development</a></li>
                      <li><a class="dropdown-item" href="#">Payroll & Benefits</a></li>
                      <li><a class="dropdown-item" href="#">Remote Work</a></li>
                      <li><a class="dropdown-item" href="#">Talent Acquisition</a></li>
                      <li><a class="dropdown-item" href="#">Workforce Management</a></li>
                    </div>
                  </ul>
                </li>

                <!-- Fintech -->
                <li class="dropdown-submenu position-relative">
                  <a class="dropdown-item dropdown-toggle" href="#">Fintech</a>
                  <ul class="dropdown-menu sub-menu bg-light">
                    <div class="grid-container">
                      <li><a class="dropdown-item" href="#">Banking</a></li>
                      <li><a class="dropdown-item" href="#">Blockchain</a></li>
                      <li><a class="dropdown-item" href="#">Cryptocurrency</a></li>
                      <li><a class="dropdown-item" href="#">Decentralized Finance</a></li>
                      <li><a class="dropdown-item" href="#">Financial Services</a></li>
                      <li><a class="dropdown-item" href="#">Insurance</a></li>
                      <li><a class="dropdown-item" href="#">Investment</a></li>
                      <li><a class="dropdown-item" href="#">Lending & Credit</a></li>
                      <li><a class="dropdown-item" href="#">Payments & Wallets</a></li>
                      <li><a class="dropdown-item" href="#">Security</a></li>
                    </div>
                  </ul>
                </li>

                <!-- Consumer Tech -->
                <li class="dropdown-submenu position-relative">
                  <a class="dropdown-item dropdown-toggle" href="#">Consumer Tech</a>
                  <ul class="dropdown-menu sub-menu bg-light">
                    <div class="grid-container">
                      <li><a class="dropdown-item" href="#">5G Devices</a></li>
                      <li><a class="dropdown-item" href="#">AI</a></li>
                      <li><a class="dropdown-item" href="#">Audio & Visual Technology</a></li>
                      <li><a class="dropdown-item" href="#">Computers</a></li>
                      <li><a class="dropdown-item" href="#">Consumer Health</a></li>
                      <li><a class="dropdown-item" href="#">Home Appliances</a></li>
                      <li><a class="dropdown-item" href="#">In-home Entertainment</a></li>
                      <li><a class="dropdown-item" href="#">Mobile</a></li>
                      <li><a class="dropdown-item" href="#">Online Retail</a></li>
                      <li><a class="dropdown-item" href="#">Security</a></li>
                      <li><a class="dropdown-item" href="#">Smart Home Technology</a></li>
                      <li><a class="dropdown-item" href="#">Social Networking</a></li>
                      <li><a class="dropdown-item" href="#">Wearable Technology</a></li>
                    </div>
                  </ul>
                </li>
              </ul>
            </li>

            <li class="nav-item mx-3">

              <a class="nav-link active text-light" aria-current="page" href="<?php echo base_url('interviews'); ?>">
                Interviews
                <span class="trending-badge">Trending</span></a>
            </li>
            <li class="nav-item mx-3">
              <a class="nav-link text-light" href="<?php echo base_url('news'); ?>">Press Release</a>
            </li>
            <li class="nav-item mx-3">
              <a class="nav-link text-light" href="<?php echo base_url('news'); ?>">Article</a>
            </li>
            <li class="nav-item mx-3">
              <a class="nav-link text-light">Resources</a>
            </li>
          </ul>

          <!-- Improved Search Form -->
          <div class="search-container ms-auto position-relative">
            <form class="d-flex align-items-center" role="search">
              <div class="input-group">
                <input class="form-control border-end-0 rounded-pill ps-3 pe-5" type="search"
                  placeholder="Search articles..." aria-label="Search" style="height: 40px; min-width: 250px;">
                <button class="btn btn-link text-muted position-absolute end-0 top-50 translate-middle-y me-2"
                  type="button" style="border: none; background: none; z-index: 10;">
                  <i class="bi bi-search"></i>
                </button>
              </div>
            </form>
          </div>
        </div>
      </div>
    </div>
  </nav>

  <script>
    document.querySelectorAll('.dropdown-submenu > a').forEach(link => {
      link.addEventListener('click', function (e) {
        e.preventDefault(); // Prevent default anchor behavior
        e.stopPropagation(); // Prevent event from bubbling up to parent dropdown

        // Close all other submenus
        document.querySelectorAll('.dropdown-submenu > .dropdown-menu').forEach(menu => {
          menu.style.display = 'none';
        });

        // Toggle the clicked submenu
        const submenu = this.nextElementSibling;
        if (submenu) {
          submenu.style.display = submenu.style.display === 'block' ? 'none' : 'block';
        }
      });
    });

    // Close all submenus when clicking outside the dropdown
    document.addEventListener('click', (e) => {
      if (!e.target.closest('#mainDropdown')) {
        document.querySelectorAll('.dropdown-submenu > .dropdown-menu').forEach(menu => {
          menu.style.display = 'none';
        });
      }
    });
  </script>
</body>

</html>