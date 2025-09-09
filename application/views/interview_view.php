<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title><?= htmlspecialchars($interview['title'] ?? 'Interview') ?> - Interviews</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-rbsA2VBKQhggwzxH7pPCaAqO46MgnOM80zW1RWuH61DGLwZJEdK2Kadq2F9CUG65" crossorigin="anonymous">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.11.3/font/bootstrap-icons.min.css">
    <style>
        .bgColor {
            background-color: rgba(37, 77, 112, 0.2);
            opacity: inherit;
        }
        .featured-label {
            background-color: #27548A;
            padding: 5px 10px;
            font-weight: bold;
            display: inline-block;
            margin-bottom: 10px;
            color: white;
        }
        .sticky-sidebar {
            position: sticky;
            top: 100px;
            z-index: 10;
        }
        .social-icon {
            font-size: 1.5rem;
            color: #000;
        }
        .tag-dot {
            display: inline-block;
            width: 10px;
            height: 10px;
            border-radius: 50%;
            margin-right: 5px;
        }
        /* Smaller tabs */
        .nav-tabs .nav-link {
            font-size: 0.85rem; /* Smaller font size */
            padding: 0.4rem 0.8rem; /* Reduced padding */
            line-height: 1.2; /* Tighter line height */
        }
        .nav-tabs .nav-item {
            margin-bottom: -1px; /* Ensure no extra spacing */
        }
        .nav-tabs {
            border-bottom: 1px solid #dee2e6; /* Keep Bootstrap border */
        }
    </style>
</head>
<body>
    <!-- Header Placeholder -->
    <?php $this->load->view('layout/header'); ?>

    <!-- Breadcrumb -->
    <nav class="container mt-3" aria-label="breadcrumb">
        <ol class="breadcrumb">
            <li class="breadcrumb-item"><a href="<?= base_url() ?>">Home</a></li>
            <li class="breadcrumb-item"><a href="<?= base_url('interviews') ?>">Interviews</a></li>
            <li class="breadcrumb-item"><a href="<?= base_url('interviews?category=' . urlencode($interview['main_category'] ?? 'MarTech')) ?>"><?= htmlspecialchars($interview['main_category'] ?? 'MarTech') ?></a></li>
            <li class="breadcrumb-item"><a href="<?= base_url('interviews?category=' . urlencode($interview['main_category'] ?? 'MarTech') . '&subcategory=' . urlencode(explode(',', $interview['category'] ?? '')[0] ?? 'AI')) ?>"><?= htmlspecialchars(explode(',', $interview['category'] ?? '')[0] ?? 'AI') ?></a></li>
            <li class="breadcrumb-item active" aria-current="page"><?= htmlspecialchars($interview['title'] ?? 'Interview') ?></li>
        </ol>
    </nav>

    <!-- Main Content -->
    <div class="container py-4">
        <div class="row d-flex bgColor justify-content-between p-3">
            <!-- Title & Meta -->
            <div class="col-md-5 d-flex align-items-center">
                <div>
                    <h2 class="fw-bold"><?= htmlspecialchars($interview['title'] ?? 'Untitled') ?></h2>
                    <p class="text-danger"><?= htmlspecialchars($interview['main_category'] ?? 'Uncategorized') ?></p>
                    <small>Featuring: <?= htmlspecialchars($interview['interviewee_name'] ?? 'Unknown') ?>, <?= htmlspecialchars($interview['interviewee_designation'] ?? '') ?> at <?= htmlspecialchars($interview['company_name'] ?? 'Unknown') ?> | 
                        By <?= htmlspecialchars($interview['provided'] ?? 'Unknown Provider') ?> | 
                        Date: <?= date('d M Y', strtotime($interview['created_at'] ?? date('Y-m-d'))) ?> | 
                        5 Mins Read</small>
                </div>
            </div>
            <!-- Image -->
            <div class="col-md-6 text-end">
                <img src="<?= base_url(htmlspecialchars($interview['image'] ?? 'assets/default.jpg')) ?>" class="img-fluid rounded" alt="Interview Image">
            </div>
        </div>

        <!-- Content Columns -->
        <div class="row mt-5">
            <!-- Left Column -->
            <div class="col-md-3">
                <div class="sticky-sidebar">
                    <div class="text-start mb-3">
                        <span class="featured-label fw-bold">In this feature</span>
                    </div>
                    <ul>
                        <?php
                        $subcategories = array_map('trim', explode(',', $interview['category'] ?? ''));
                        if (!empty($subcategories) && $subcategories[0] !== '') {
                            foreach ($subcategories as $sub) {
                                echo "<li>" . htmlspecialchars($sub) . "</li>";
                            }
                        } else {
                            echo "<li>No features available</li>";
                        }
                        ?>
                    </ul>

                    <!-- Share & Subscribe -->
                    <div class="mb-4">
                        <div class="text-start mb-3">
                            <span class="featured-label fw-bold">Share Social</span>
                        </div>
                        <div style="display: flex; gap: 15px;">
                            <a href="https://www.facebook.com/sharer/sharer.php?u=<?= urlencode(base_url('interviews/view/' . $interview['slug'])) ?>" style="background-color: #1877F2; color: white; width: 40px; height: 40px; display: flex; align-items: center; justify-content: center; border-radius: 50%; text-decoration: none;" target="_blank">
                                <i class="bi bi-facebook" style="font-size: 20px;"></i>
                            </a>
                            <a href="https://twitter.com/intent/tweet?url=<?= urlencode(base_url('interviews/view/' . $interview['slug'])) ?>&text=<?= urlencode($interview['title']) ?>" style="background-color: #000000; color: white; width: 40px; height: 40px; display: flex; align-items: center; justify-content: center; border-radius: 50%; text-decoration: none;" target="_blank">
                                <i class="bi bi-twitter-x" style="font-size: 20px;"></i>
                            </a>
                            <a href="https://www.linkedin.com/shareArticle?mini=true&url=<?= urlencode(base_url('interviews/view/' . $interview['slug'])) ?>&title=<?= urlencode($interview['title']) ?>" style="background-color: #0A66C2; color: white; width: 40px; height: 40px; display: flex; align-items: center; justify-content: center; border-radius: 50%; text-decoration: none;" target="_blank">
                                <i class="bi bi-linkedin" style="font-size: 20px;"></i>
                            </a>
                            <a href="https://www.youtube.com" style="background-color: #FF0000; color: white; width: 40px; height: 40px; display: flex; align-items: center; justify-content: center; border-radius: 50%; text-decoration: none;" target="_blank">
                                <i class="bi bi-youtube" style="font-size: 20px;"></i>
                            </a>
                        </div>
                        <br>
                        <form>
                            <input type="email" class="form-control w-100 mb-2" placeholder="Email">
                            <button type="submit" class="btn btn-dark w-100">Subscribe</button>
                        </form>
                    </div>
                </div>
            </div>

            <!-- Center Column (Main Content) -->
            <div class="col-md-6">
                <p><?= $interview['content'] ?? 'No content available.' ?></p>
                <div class="d-flex gap-2 mt-3">
                    <?php
                    $subcategories = array_map('trim', explode(',', $interview['category'] ?? ''));
                    $colors = ['#f7df1e', '#41b883', 'rgb(129, 184, 65)'];
                    $i = 0;
                    foreach ($subcategories as $sub):
                        if ($sub):
                            ?>
                            <div class="d-flex align-items-center border rounded-pill px-2 py-1">
                                <span class="tag-dot" style="background-color: <?= $colors[$i % count($colors)] ?>;"></span>
                                <?= htmlspecialchars($sub) ?>
                            </div>
                            <?php
                            $i++;
                        endif;
                    endforeach;
                    ?>
                </div>
            </div>

            <!-- Right Column (Tabs for Bio and Description) -->
            <div class="col-md-3">
                <div class="sticky-sidebar">
                    <div class="text-start mb-3">
                        <span class="featured-label fw-bold">About</span>
                    </div>
                    <ul class="nav nav-tabs d-flex" id="interviewInfoTab" role="tablist">
                        <li class="nav-item" role="presentation">
                            <button class="nav-link active" id="bio-tab" data-bs-toggle="tab" data-bs-target="#bio" type="button" role="tab" aria-controls="bio" aria-selected="true">Interviewee Bio</button>
                        </li>
                        <li class="nav-item" role="presentation">
                            <button class="nav-link" id="company-tab" data-bs-toggle="tab" data-bs-target="#company" type="button" role="tab" aria-controls="company" aria-selected="false">Company Description</button>
                        </li>
                    </ul>
                    <div class="tab-content" id="interviewInfoTabContent">
                        <div class="tab-pane fade show active" id="bio" role="tabpanel" aria-labelledby="bio-tab">
                            <p class="mt-3"><?= htmlspecialchars($interview['interviewee_bio'] ?? 'No bio available.') ?></p>
                        </div>
                        <div class="tab-pane fade" id="company" role="tabpanel" aria-labelledby="company-tab">
                            <p class="mt-3"><?= htmlspecialchars($interview['company_description'] ?? 'No company description available.') ?></p>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <!-- Footer Placeholder -->
    <?php $this->load->view('layout/footer'); ?>

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-kenU1KFdBIe4zVF0s0G1M5b4hcpxyD9F7jL+jjXkk+Q2h455rYXK/7HAuoJl+0I4" crossorigin="anonymous"></script>
    <script>
        const breadcrumb = document.querySelector('.breadcrumb-item.active');
        if (breadcrumb) {
            const words = breadcrumb.textContent.trim().split(' ');
            if (words.length > 6) {
                breadcrumb.textContent = words.slice(0, 6).join(' ') + '...';
            }
        }
    </script>
</body>
</html>