<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title><?= htmlspecialchars($news_item['title'] ?? 'News Article') ?> - News</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.3/dist/css/bootstrap.min.css" rel="stylesheet"
        integrity="sha384-rbsA2VBKQhggwzxH7pPCaAqO46MgnOM80zW1RWuH61DGLwZJEdK2Kadq2F9CUG65" crossorigin="anonymous">
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
    </style>
</head>

<body>
    <!-- Header Placeholder -->
    <?php $this->load->view('layout/header'); ?>

    <!-- Breadcrumb -->
    <nav class="container mt-3" aria-label="breadcrumb">
        <ol class="breadcrumb">
            <li class="breadcrumb-item"><a href="<?= base_url() ?>">Home</a></li>
            <li class="breadcrumb-item"><a href="<?= base_url('news') ?>">News</a></li>
            <li class="breadcrumb-item"><a href="<?= base_url('news?category=' . urlencode($news_item['main_category'] ?? 'MarTech')) ?>">MarTech</a></li>
            <li class="breadcrumb-item"><a href="<?= base_url('news?category=' . urlencode($news_item['main_category'] ?? 'MarTech') . '&subcategory=Content Management') ?>">Content Management</a></li>
            <li class="breadcrumb-item active" aria-current="page"><?= htmlspecialchars($news_item['title'] ?? 'News Article') ?></li>
        </ol>
    </nav>

    <!-- Main Content -->
    <div class="container py-4">
        <div class="row d-flex bgColor justify-content-between p-3">
            <!-- Title & Meta -->
            <div class="col-md-5 d-flex align-items-center">
                <div>
                    <h2 class="fw-bold"><?= htmlspecialchars($news_item['title'] ?? 'Untitled') ?></h2>
                    <p class="text-danger"><?= htmlspecialchars($news_item['main_category'] ?? 'Uncategorized') ?></p>
                    <small>By <?= htmlspecialchars($news_item['provided'] ?? 'Unknown Provider') ?> | 
                        Date: <?= date('d M Y', strtotime($news_item['created_at'] ?? date('Y-m-d'))) ?> | 
                        <?= htmlspecialchars($news_item['read_time'] ?? '5 Mins Read') ?></small>
                </div>
            </div>
            <!-- Image -->
            <div class="col-md-6 text-end">
                <img src="<?= base_url(htmlspecialchars($news_item['image'] ?? 'assets/default.jpg')) ?>" 
                     class="img-fluid rounded" alt="News Image">
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
                        $subcategories = array_map('trim', explode(',', $news_item['category'] ?? ''));
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
                            <a href="https://www.facebook.com/sharer/sharer.php?u=<?= urlencode(base_url('news/view/' . $news_item['slug'])) ?>"
                                style="background-color: #1877F2; color: white; width: 40px; height: 40px; display: flex; align-items: center; justify-content: center; border-radius: 50%; text-decoration: none;"
                                target="_blank">
                                <i class="bi bi-facebook" style="font-size: 20px;"></i>
                            </a>
                            <a href="https://twitter.com/intent/tweet?url=<?= urlencode(base_url('news/view/' . $news_item['slug'])) ?>&text=<?= urlencode($news_item['title']) ?>"
                                style="background-color: #000000; color: white; width: 40px; height: 40px; display: flex; align-items: center; justify-content: center; border-radius: 50%; text-decoration: none;"
                                target="_blank">
                                <i class="bi bi-twitter-x" style="font-size: 20px;"></i>
                            </a>
                            <a href="https://www.linkedin.com/shareArticle?mini=true&url=<?= urlencode(base_url('news/view/' . $news_item['slug'])) ?>&title=<?= urlencode($news_item['title']) ?>"
                                style="background-color: #0A66C2; color: white; width: 40px; height: 40px; display: flex; align-items: center; justify-content: center; border-radius: 50%; text-decoration: none;"
                                target="_blank">
                                <i class="bi bi-linkedin" style="font-size: 20px;"></i>
                            </a>
                            <a href="https://www.youtube.com"
                                style="background-color: #FF0000; color: white; width: 40px; height: 40px; display: flex; align-items: center; justify-content: center; border-radius: 50%; text-decoration: none;"
                                target="_blank">
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
                <p><?= $news_item['content'] ?? 'No content available.' ?></p>
                <div class="d-flex gap-2 mt-3">
                    <?php
                    $subcategories = array_map('trim', explode(',', $news_item['category'] ?? ''));
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

            <!-- Right Column (Relevant Articles) -->
            <div class="col-md-3">
                <div class="sticky-sidebar">
                    <div class="text-start mb-3">
                        <span class="featured-label fw-bold">Relevant articles</span>
                    </div>
                    <?php
                    $related_articles = $this->News_model->get_news([
                        'category' => $news_item['main_category'],
                        'subcategory' => 'Content Management',
                        'not_slug' => $news_item['slug']
                    ], 3);
                    if (!empty($related_articles)):
                        foreach ($related_articles as $related):
                    ?>
                        <div class="card mb-3">
                            <img src="<?= base_url(htmlspecialchars($related['image'] ?? 'assets/default.jpg')) ?>" 
                                 class="card-img-top" alt="Related Article">
                            <div class="card-body">
                                <h6 class="card-title">
                                    <a href="<?= base_url('news/view/' . $related['slug']) ?>" class="text-decoration-none">
                                        <?= htmlspecialchars($related['title'] ?? 'Untitled') ?>
                                    </a>
                                </h6>
                                <p class="card-text"><?= htmlspecialchars(substr(strip_tags($related['content'] ?? ''), 0, 50)) ?>...</p>
                            </div>
                        </div>
                    <?php
                        endforeach;
                    else:
                    ?>
                        <p>No related articles found.</p>
                    <?php endif; ?>
                </div>
            </div>
        </div>
    </div>

    <!-- Footer Placeholder -->
    <?php $this->load->view('layout/footer'); ?>

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.3/dist/js/bootstrap.bundle.min.js"
        integrity="sha384-kenU1KFdBIe4zVF0s0G1M5b4hcpxyD9F7jL+jjXkk+Q2h455rYXK/7HAuoJl+0I4"
        crossorigin="anonymous"></script>
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