<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Dashboard</title>
    <link rel="stylesheet" href="styles.css">
    <script src="script.js" defer></script>
    <link href='https://unpkg.com/boxicons@2.1.4/css/boxicons.min.css' rel='stylesheet'>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.5.0/css/all.min.css">
</head>

<body>

    <div class="sidebar">
        <div class="logo-details">
            <div class="logo_name">Logo</div>
            <i class="fas fa-bars" id="btn"></i>
        </div>
        <ul class="nav-list">
            <li>
                <a href="<?php echo base_url('main-dashboard'); ?>" target="contentFrame">
                    <i class="fas fa-home"></i>
                    <span class="links_name">Dashboard</span>
                </a>
            </li>
            <li>
                <a href="<?php echo base_url('createpost'); ?>" target="contentFrame">
                    <i class="fas fa-newspaper"></i>
                    <span class="links_name"> Create News Post</span>
                </a>
            </li>
            <li>
                <a href="<?php echo base_url('interviews/create'); ?>" target="contentFrame">
                    <i class="fas fa-user-tie"></i>
                    <span class="links_name">Create Interviews</span>
                </a>
            </li>
            <li>
                <a href="<?php echo base_url('createpressrelease'); ?>" target="contentFrame">
                    <i class="fas fa-pen-nib"></i>
                    <span class="links_name">Create Blogs</span>
                </a>
            </li>
            <li>
                <a href="<?php echo base_url('createarticles'); ?>" target="contentFrame">
                    <i class="fas fa-file-alt"></i>
                    <span class="links_name">Create Articles</span>
                </a>
            </li>
            <li>
                <a href="<?= base_url('auth/logout') ?>">
                    <i class="fas fa-sign-out-alt"></i>
                    <span class="links_name">Log-Out</span>
                </a>
            </li>
            <li class="profile">
                <div class="profile-details">
                    <i class="fas fa-user-circle fa-2x me-2" style="color: #e9e0e0ff;"></i>
                    <div class="name_job">
                        <div class="name">Amol Patil</div>
                        <div class="job">Web Developer</div>
                    </div>
                </div>
                <i class="fas fa-sign-out-alt text-light" id="log_out" title="Logout"
                    style="color: #f0e2e2ff;"></i>
            </li>
        </ul>
    </div>

    <!-- Content Section -->
    <section class="home-section">
        <iframe src="<?php echo base_url('main-dashboard'); ?>"
            name="contentFrame"
            id="contentFrame"
            frameborder="0"></iframe>
    </section>

    <script>
        let sidebar = document.querySelector(".sidebar");
        let closeBtn = document.querySelector("#btn");

        closeBtn.addEventListener("click", () => {
            sidebar.classList.toggle("open");
            menuBtnChange();
        });

        function menuBtnChange() {
            if (sidebar.classList.contains("open")) {
                closeBtn.classList.replace("bx-menu", "bx-menu-alt-right");
            } else {
                closeBtn.classList.replace("bx-menu-alt-right", "bx-menu");
            }
        }
    </script>

    <style>
        * {
            margin: 0;
            padding: 0;
            box-sizing: border-box;
            font-family: "Poppins", sans-serif;
        }

        .sidebar {
            position: fixed;
            left: 0;
            top: 0;
            height: 100%;
            width: 78px;
            background: #264D70;
            padding: 6px 14px;
            z-index: 1;
            transition: all 0.5s ease;
        }

        .sidebar.open {
            width: 250px;
        }

        .sidebar .logo-details {
            height: 60px;
            display: flex;
            align-items: center;
            justify-content: space-between;
            position: relative;
        }

        .sidebar .logo-details .logo_name {
            color: #fff;
            font-size: 20px;
            font-weight: 600;
            opacity: 0;
            transition: all 0.5s ease;
        }

        .sidebar.open .logo-details,
        .sidebar.open .logo-details .logo_name {
            opacity: 1;
        }

        .sidebar .logo-details #btn {
            position: absolute;
            top: 50%;
            right: 0;
            transform: translateY(-50%);
            font-size: 22px;
            text-align: center;
            cursor: pointer;
            transition: all 0.5s ease;
            color: #fff;
        }

        .sidebar i {
            color: #fff;
            height: 60px;
            min-width: 50px;
            font-size: 28px;
            text-align: center;
            line-height: 60px;
        }

        .sidebar .nav-list {
            margin-top: 20px;
            height: 100%;
        }

        .sidebar li {
            position: relative;
            margin: 8px 0;
            list-style: none;
        }

        .sidebar li a {
            display: flex;
            height: 100%;
            width: 100%;
            border-radius: 12px;
            align-items: center;
            text-decoration: none;
            transition: all 0.4s ease;
            background: #11101D;
            color: #fff;
        }

        .sidebar li a:hover {
            background: #fff;
            color: #11101D;
        }

        .sidebar li a .links_name {
            font-size: 15px;
            font-weight: 400;
            white-space: nowrap;
            opacity: 0;
            pointer-events: none;
            transition: 0.4s;
            margin-left: 8px;
        }

        .sidebar.open li a .links_name {
            opacity: 1;
            pointer-events: auto;
        }

        .sidebar li.profile {
            position: fixed;
            height: 60px;
            width: 78px;
            left: 0;
            bottom: -8px;
            padding: 10px 14px;
            background: #aaa5e680;
            transition: all 0.5s ease;
            overflow: hidden;
        }

        .sidebar.open li.profile {
            width: 250px;
        }

        .sidebar li .profile-details {
            display: flex;
            align-items: center;
            flex-wrap: nowrap;
        }

        .sidebar li.profile .name,
        .sidebar li.profile .job {
            font-size: 15px;
            font-weight: 400;
            color: #fff;
            white-space: nowrap;
        }

        .sidebar li.profile .job {
            font-size: 12px;
        }

        .sidebar .profile #log_out {
            position: absolute;
            top: 50%;
            right: 0;
            transform: translateY(-50%);
            background: #1d1b31;
            width: 100%;
            height: 60px;
            line-height: 60px;
            transition: all 0.5s ease;
        }

        .sidebar.open .profile #log_out {
            width: 50px;
            background: none;
        }

        /* Content Section */
        .home-section {
            position: relative;
            background: #e4e9f7;
            min-height: 100vh;
            top: 0;
            left: 78px;
            width: calc(100% - 78px);
            transition: all 0.5s ease;
        }

        .sidebar.open~.home-section {
            left: 250px;
            width: calc(100% - 250px);
        }

        .home-section iframe {
            width: 100%;
            height: 100vh;
            border: none;
            display: block;
        }
    </style>
</body>

</html>