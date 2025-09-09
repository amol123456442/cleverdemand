<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-rbsA2VBKQhggwzxH7pPCaAqO46MgnOM80zW1RWuH61DGLwZJEdK2Kadq2F9CUG65" crossorigin="anonymous">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.11.3/font/bootstrap-icons.min.css">
    <title>Latest Interviews</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet">
    <style>
        .filter-btn {
            margin: 3px;
            border-radius: 8px;
        }
        .badge-category {
            margin-right: 5px;
        }
        .featured-label {
            background-color: #27548A;
            padding: 5px 10px;
            font-weight: bold;
            display: inline-block;
            margin-bottom: 10px;
            color: white;
        }
    </style>
</head>
<body>
    <!-- Header Placeholder -->
    <?php $this->load->view('layout/header'); ?>

    <!-- Breadcrumb -->
    <nav class="container mt-3" aria-label="breadcrumb">
        <ol class="breadcrumb">
            <li class="breadcrumb-item"><a href="#">Home</a></li>
            <li class="breadcrumb-item active">Interviews</li>
        </ol>
    </nav>

    <div class="container py-5">
        <div class="row">
            <div class="col-12">
                <h1 class="fw-bold text-info">Executive Insights</h1>
                <hr class="w-50">
                <p>Hear from industry leaders and innovators. Read exclusive interviews <br> sharing insights on driving business success and navigating challenges.</p>
                <a href="#" class="fs-4" style="text-decoration: underline; color: black; font-weight: bold;">Discover how leaders shape the future.</a>
            </div>
        </div>
    </div>

    <div class="container mb-4 mt-4">
        <div class="row">
            <!-- Main Content -->
            <div class="col-12 col-md-9 border-end">
                <div class="text-start mb-3">
                    <span class="featured-label fw-bold">Latest Interviews</span>
                </div>

                <form method="get" class="row row-cols-1 row-cols-md-3 g-3 mb-4">
                    <!-- Category Dropdown -->
                    <div>
                        <select name="category" class="form-select" onchange="this.form.submit()">
                            <option value="">Select Industry</option>
                            <?php
                            $categories = ['MarTech', 'HRTech', 'Fintech', 'Consumer Tech'];
                            foreach ($categories as $cat) {
                                $selected = ($_GET['category'] ?? '') === $cat ? 'selected' : '';
                                echo "<option value=\"$cat\" $selected>$cat</option>";
                            }
                            ?>
                        </select>
                    </div>

                    <!-- Subcategory Dropdown -->
                    <div>
                        <select name="subcategory" class="form-select" onchange="this.form.submit()">
                            <option value="">Select Category</option>
                            <?php
                            $selectedCategory = $_GET['category'] ?? '';
                            $subcategoryOptions = [];

                            switch ($selectedCategory) {
                                case 'MarTech':
                                    $subcategoryOptions = ["Advertising", "AI", "Analytics", "Business Intelligence", "CDP", "Communications", "Content Management", "Content Marketing", "Conversational Marketing", "CRM", "Customer Engagement", "Customer Experience", "Cybersecurity", "Data Management", "Digital Asset Management", "Digital Experience", "Digital Marketing", "Digital Transformation", "E-commerce", "Email Marketing", "Marketing Automation", "Marketing Cloud", "Sales", "SEO/SEM", "Social Media", "Supply Chain Management"];
                                    break;
                                case 'HRTech':
                                    $subcategoryOptions = ["AI", "Cybersecurity", "Diversity, Equity & Inclusion (DEI)", "Employee Experience", "Employee Wellness", "HCM", "HR Analytics", "HR Automation", "HR Cloud", "Learning & Development", "Payroll & Benefits", "Remote Work", "Talent Acquisition", "Workforce Management"];
                                    break;
                                case 'Fintech':
                                    $subcategoryOptions = ["Banking", "Blockchain", "Cryptocurrency", "Decentralized Finance", "Financial Services", "Insurance", "Investment", "Lending & Credit", "Payments & Wallets", "Security"];
                                    break;
                                case 'Consumer Tech':
                                    $subcategoryOptions = ["5G Devices", "AI", "Audio & Visual Technology", "Computers", "Consumer Health", "Home Appliances", "In-home Entertainment", "Mobile", "Online Retail", "Security", "Smart Home Technology", "Social Networking", "Wearable Technology"];
                                    break;
                            }

                            foreach ($subcategoryOptions as $sub) {
                                $selected = ($_GET['subcategory'] ?? '') === $sub ? 'selected' : '';
                                echo "<option value=\"$sub\" $selected>$sub</option>";
                            }
                            ?>
                        </select>
                    </div>

                    <!-- Search Box -->
                    <div>
                        <input type="text" name="search" class="form-control" placeholder="Search interviews..." value="<?= htmlspecialchars($_GET['search'] ?? '') ?>">
                    </div>
                </form>

                <div class="container mt-4">
                    <?php if (empty($interviews)): ?>
                        <p>No interviews found.</p>
                    <?php else: ?>
                        <?php foreach ($interviews as $item): ?>
                            <div class="row mb-4 pb-4 border-bottom bg-light p-3">
                                <div class="col-12 col-md-4">
                                    <a href="<?= base_url('interviews/view/' . $item['slug']) ?>">
                                        <img src="<?= base_url(htmlspecialchars($item['image'] ?? 'assets/default.jpg')) ?>" class="img-fluid" alt="Interview Image">
                                    </a>
                                </div>
                                <div class="col-12 col-md-8">
                                    <h5 class="fw-bold">
                                        <a href="<?= base_url('interviews/view/' . $item['slug']) ?>" class="text-decoration-none text-dark">
                                            <?= htmlspecialchars($item['title'] ?? 'Untitled') ?>
                                        </a>
                                    </h5>
                                    <div class="mb-2 text-muted small">
                                        <i class="bi bi-calendar-event"></i> <?= date('F d, Y', strtotime($item['created_at'] ?? date('Y-m-d'))) ?>
                                        <br>
                                        <span class="badge bg-dark"><?= htmlspecialchars($item['main_category'] ?? 'Uncategorized') ?></span>
                                        <?php
                                        // Display subcategories (stored in 'category' as comma-separated)
                                        $subcategories = array_map('trim', explode(',', $item['category'] ?? ''));
                                        foreach ($subcategories as $sub):
                                            if ($sub):
                                        ?>
                                            <span class="badge bg-secondary"><?= htmlspecialchars($sub) ?></span>
                                        <?php
                                            endif;
                                        endforeach;
                                        ?>
                                        <br>
                                        <span class="text-muted">Featuring: <?= htmlspecialchars($item['interviewee_name'] ?? 'Unknown') ?>, <?= htmlspecialchars($item['interviewee_designation'] ?? '') ?> at <?= htmlspecialchars($item['company_name'] ?? 'Unknown') ?></span>
                                    </div>
                                    <p>
                                        <?= htmlspecialchars(substr(strip_tags($item['content'] ?? ''), 0, 100)) ?>...
                                    </p>
                                </div>
                            </div>
                        <?php endforeach; ?>
                    <?php endif; ?>

                    <div class="text-center">
                        <button class="btn btn-primary">Show More <i class="bi bi-arrow-down-circle ms-2"></i></button>
                    </div>
                </div>
            </div>

            <!-- Sidebar Carousel -->
            <div class="col-12 col-md-3 mt-4 mt-md-0">
                <div class="text-start mb-3">
                    <span class="featured-label fw-bold border-2 pb-1">Featured Interviews</span>
                </div>
                <div id="featuredInterviewsCarousel" class="carousel slide p-2" data-bs-interval="false" style="background-color: rgba(123, 181, 231, 0.34);">
                    <div class="d-flex justify-content-end gap-2 mb-2">
                        <button class="btn btn-primary btn-sm" type="button" data-bs-target="#featuredInterviewsCarousel" data-bs-slide="prev"><</button>
                        <button class="btn btn-primary btn-sm" type="button" data-bs-target="#featuredInterviewsCarousel" data-bs-slide="next">></button>
                    </div>
                    <div class="carousel-inner">
                        <div class="carousel-item active">
                            <div class="d-flex mb-3">
                                <img src="https://dummyimage.com/80x80/000/fff&text=1" class="me-3" alt="Interview 1" width="80" height="80">
                                <div>
                                    <p class="mb-1 fw-semibold small">AI’s Role in Marketing Transformation</p>
                                    <small class="text-muted">August 20, 2024</small>
                                </div>
                            </div>
                            <hr>
                            <div class="d-flex mb-3">
                                <img src="https://dummyimage.com/80x80/000/fff&text=2" class="me-3" alt="Interview 2" width="80" height="80">
                                <div>
                                    <p class="mb-1 fw-semibold small">Building a Future-Proof HR Strategy</p>
                                    <small class="text-muted">August 16, 2024</small>
                                </div>
                            </div>
                            <hr>
                            <div class="d-flex mb-3">
                                <img src="https://dummyimage.com/80x80/000/fff&text=3" class="me-3" alt="Interview 3" width="80" height="80">
                                <div>
                                    <p class="mb-1 fw-semibold small">Blockchain in Financial Services</p>
                                    <small class="text-muted">July 4, 2024</small>
                                </div>
                            </div>
                        </div>
                        <!-- Slide 2 -->
                        <div class="carousel-item">
                            <div class="d-flex mb-3">
                                <img src="https://dummyimage.com/80x80/000/fff&text=4" class="me-3" alt="Interview 4" width="80" height="80">
                                <div>
                                    <p class="mb-1 fw-semibold small">Smart Home Tech Innovations</p>
                                    <small class="text-muted">July 2, 2024</small>
                                </div>
                            </div>
                            <div class="d-flex mb-3">
                                <img src="https://dummyimage.com/80x80/000/fff&text=5" class="me-3" alt="Interview 5" width="80" height="80">
                                <div>
                                    <p class="mb-1 fw-semibold small">Cybersecurity Challenges in Fintech</p>
                                    <small class="text-muted">June 25, 2024</small>
                                </div>
                            </div>
                            <div class="d-flex mb-3">
                                <img src="https://dummyimage.com/80x80/000/fff&text=6" class="me-3" alt="Interview 6" width="80" height="80">
                                <div>
                                    <p class="mb-1 fw-semibold small">The Future of Remote Work</p>
                                    <small class="text-muted">June 18, 2024</small>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <!-- Footer Placeholder -->
    <?php $this->load->view('layout/footer'); ?>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-kenU1KFdBIe4zVF0s0G1M5b4hcpxyD9F7jL+jjXkk+Q2h455rYXK/7HAuoJl+0I4" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js"></script>
</body>
</html>