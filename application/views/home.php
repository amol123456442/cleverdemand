<!DOCTYPE html>
<html lang="en">

<head>
	<meta charset="UTF-8">
	<meta name="viewport" content="width=device-width, initial-scale=1.0">
	<link href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.3/dist/css/bootstrap.min.css" rel="stylesheet"
		integrity="sha384-rbsA2VBKQhggwzxH7pPCaAqO46MgnOM80zW1RWuH61DGLwZJEdK2Kadq2F9CUG65" crossorigin="anonymous">
	<link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.11.3/font/bootstrap-icons.min.css">
	<title>Home</title>
	<base href="<?= base_url() ?>">
	<style>
		.featured-label {
			background-color: #27548A;
			padding: 5px 10px;
			font-weight: bold;
			display: inline-block;
			margin-bottom: 10px;
			color: white;
		}

		.card:hover {
			transform: translateY(-4px);
			transition: 0.3s ease;
			box-shadow: 0 0.5rem 1rem rgba(0, 0, 0, 0.15);
		}

		.hover-underline:hover {
			text-decoration: underline;
		}

		/* All tab links default text color */
		ul#myTab.nav-tabs .nav-link {
			color: #27548A !important;
		}

		/* Active tab style */
		ul#myTab.nav-tabs .nav-link.active {
			background-color: rgba(123, 181, 231, 0.34);
			color: black !important;
			border-color: #27548A !important;
		}

		/* Hover effect */
		ul#myTab.nav-tabs .nav-link:hover {
			color: white !important;
			background-color: #27548A;
		}
	</style>
</head>

<body>
	<?php $this->load->view('layout/header'); ?>
	<div class="container mt-3">
		<div class="row g-3 g-md-4">
			<!-- Main Content -->
			<div class="col-12 col-md-8 col-lg-9">
				<div class="mb-3 mb-md-4 w-100">
					<div class="row g-2 g-md-3">
						<?php if (!empty($featured_news)): ?>
							<?php foreach ($featured_news as $news): ?>
								<div class="col-12 col-md-12 mb-3 mb-md-0 mt-3">
									<div class="text-start mb-3">
										<span class="featured-label fw-bold">Latest Insight</span>
									</div>
									<a href="<?= site_url('news/view/' . $news['slug']); ?>">
										<img src="<?= $news['image'] ?? 'https://via.placeholder.com/600x387'; ?>"
											class="img-fluid rounded w-100 object-fit-cover" alt="Featured Image"
											style="height: 300px; object-fit: cover;">
									</a>
									<div class="text-start mt-3">
										<div class="d-flex justify-content-between">
											<p class="badge text-bg-primary text-uppercase small mb-2 mb-md-3">
												<?= $news['main_category']; ?>
											</p>
											<p class="text-muted small mb-0">
												<?= date("F j, Y", strtotime($news['created_at'])); ?>
											</p>
										</div>
										<h3 class="fs-5 fs-md-4 fw-semibold mb-2">
											<a href="<?= site_url('news/view/' . $news['slug']); ?>" class="text-decoration-none text-dark">
												<?= $news['title']; ?>
											</a>
										</h3>
									</div>
								</div>
							<?php endforeach; ?>
						<?php else: ?>
							<p>No news available.</p>
						<?php endif; ?>
					</div>
				</div>
			</div>


			<!-- Sidebar -->
			<div class="col-12 col-md-4 col-lg-3">
				<div class="text-start mb-3">
					<span class="featured-label fw-bold">Popular</span>
				</div>

				<div id="popularCarousel" class="carousel slide" data-bs-ride="carousel">
					<div class="carousel-inner">

						<div class="carousel-item active">
							<div class="card shadow-sm border-0 mb-3">
								<img src="https://encrypted-tbn0.gstatic.com/images?q=tbn:ANd9GcTvrQDevxLylxtjB6kG5bRLqoJ8m4ZxjKc7GQ&s" class="card-img-top" style="height:150px; object-fit:cover;" alt="News 1">
								<div class="card-body p-2">
									<p class="text-muted small mb-1">Technology</p>
									<h6 class="card-title mb-0">
										<a href="#" class="text-dark text-decoration-none">Xionomics: Dems chip breakthrough</a>
									</h6>
								</div>
							</div>
						</div>

						<div class="carousel-item">
							<div class="card shadow-sm border-0 mb-3">
								<img src="https://encrypted-tbn0.gstatic.com/images?q=tbn:ANd9GcTvrQDevxLylxtjB6kG5bRLqoJ8m4ZxjKc7GQ&s" class="card-img-top" style="height:150px; object-fit:cover;" alt="News 2">
								<div class="card-body p-2">
									<p class="text-muted small mb-1">Data Centers</p>
									<h6 class="card-title mb-0">
										<a href="#" class="text-dark text-decoration-none">Where to go when a library's down</a>
									</h6>
								</div>
							</div>
						</div>

						<div class="carousel-item">
							<div class="card shadow-sm border-0 mb-3">
								<img src="https://encrypted-tbn0.gstatic.com/images?q=tbn:ANd9GcTvrQDevxLylxtjB6kG5bRLqoJ8m4ZxjKc7GQ&s" class="card-img-top" style="height:150px; object-fit:cover;" alt="News 3">
								<div class="card-body p-2">
									<p class="text-muted small mb-1">Latest</p>
									<h6 class="card-title mb-0">
										<a href="#" class="text-dark text-decoration-none">When will the AI bubble burst?</a>
									</h6>
								</div>
							</div>
						</div>

					</div>

					<!-- Carousel Controls -->
					<button class="carousel-control-prev" type="button" data-bs-target="#popularCarousel" data-bs-slide="prev">
						<span class="carousel-control-prev-icon" aria-hidden="true"></span>
						<span class="visually-hidden">Previous</span>
					</button>
					<button class="carousel-control-next" type="button" data-bs-target="#popularCarousel" data-bs-slide="next">
						<span class="carousel-control-next-icon" aria-hidden="true"></span>
						<span class="visually-hidden">Next</span>
					</button>

				</div>

				<a href="#" class="btn btn-primary w-100 mt-3">See All</a>
			</div>

		</div>
		<div class="row g-3 g-md-4 mt-3 mt-md-4">
			<div class="col-12">
				<span class="featured-label fw-bold">Latest News</span>
			</div>

			<?php if (!empty($latest_news)): ?>
				<?php foreach ($latest_news as $news): ?>
					<div class="col-12 col-sm-6 col-md-6 col-lg-3">
						<div class="card rounded-0 h-100">
							<a href="<?= site_url('news/view/' . $news['slug']); ?>">
								<img src="<?= $news['image'] ?? 'https://dummyimage.com/600x400/000/fff'; ?>"
									class="img-fluid card-img-top object-fit-cover"
									alt="<?= $news['title']; ?>"
									style="aspect-ratio: 3/2; height: 180px;">
							</a>
							<div class="card-body p-3">
								<div class="d-flex justify-content-between">
									<p class="category-label text-muted small mb-1"><?= $news['main_category']; ?></p>
									<p class="text-muted small mb-2"><?= date("F j, Y", strtotime($news['created_at'])); ?></p>
								</div>
								<h5 class="card-title fs-6 fw-semibold">
									<a href="<?= site_url('news/view/' . $news['slug']); ?>" class="text-decoration-none text-dark">
										<?= $news['title']; ?>
									</a>
								</h5>
							</div>
						</div>
					</div>
				<?php endforeach; ?>
			<?php else: ?>
				<p>No news available.</p>
			<?php endif; ?>
		</div>

		<div class="row mt-4">
			<div class="col-12">
				<span class="featured-label fw-bold">Interviews</span>
			</div>
			<div class="col-12">
				<div class="row">
					<?php if (!empty($latest_interviews)): ?>
						<?php foreach ($latest_interviews as $interview): ?>
							<div class="col-12 col-md-4 mb-3 mb-md-0">
								<div class="card rounded-0 shadow-sm border-1 h-100">
									<a href="<?= base_url('interviews/view/' . $interview['slug']) ?>">
										<img src="<?= base_url(htmlspecialchars($interview['image'] ?? 'assets/default.jpg')) ?>"
											class="img-fluid w-100"
											alt="<?= htmlspecialchars($interview['title']) ?>"
											style=" object-fit: cover;">
									</a>
									<div class="d-flex justify-content-between mt-3 mb-3 p-2">
										<p class="category-label text-muted small mb-1">
											<?= htmlspecialchars($interview['main_category'] ?? 'Interview') ?>
										</p>
										<p class="text-muted small mb-2">
											<?= date('F d, Y', strtotime($interview['created_at'] ?? date('Y-m-d'))) ?>
										</p>
									</div>
									<h5 class="card-title fs-6 fw-semibold p-2">
										<?= htmlspecialchars($interview['title']) ?>
									</h5>
								</div>
							</div>
						<?php endforeach; ?>
					<?php else: ?>
						<p>No interviews found.</p>
					<?php endif; ?>
				</div>
			</div>
		</div>

		<div class="mb-3 mt-3">
			<span class="featured-label fw-bold">Industry Insights</span>
		</div>

		<!-- Nav Tabs -->
		<ul class="nav nav-tabs flex-wrap gap-2 mb-3" id="myTab" role="tablist">
			<?php $i = 0;
			foreach ($categories as $category): ?>
				<li class="nav-item" role="presentation">
					<a class="nav-link <?= $i == 0 ? 'active' : '' ?>"
						id="<?= strtolower($category) ?>-tab"
						data-bs-toggle="tab"
						href="#<?= strtolower($category) ?>"
						role="tab"><?= $category ?></a>
				</li>
			<?php $i++;
			endforeach; ?>
		</ul>

		<!-- Tab Content -->
		<!-- Tab Content -->
		<div class="tab-content" id="myTabContent">
			<?php $i = 0;
			foreach ($categories as $category): ?>
				<div class="tab-pane fade <?= $i == 0 ? 'show active' : '' ?>" id="<?= strtolower($category) ?>" role="tabpanel" aria-labelledby="<?= strtolower($category) ?>-tab">

					<?php if (!empty($news_by_category[$category])): ?>
						<?php foreach ($news_by_category[$category] as $news): ?>
							<div class="p-3 border rounded bg-white mb-3">
								<h6 class="fw-semibold mb-1">
									<a href="<?= base_url('news/view/' . $news['slug']) ?>" class="text-dark text-decoration-none">
										<?= htmlspecialchars($news['title']) ?>
									</a>
								</h6>
								<div class="d-flex justify-content-between text-muted small">
									<span><?= htmlspecialchars($category) ?></span>
									<span><?= date('d M Y', strtotime($news['created_at'])) ?></span>
								</div>
							</div>
						<?php endforeach; ?>
					<?php else: ?>
						<p class="text-center text-muted">No news found.</p>
					<?php endif; ?>

				</div>
			<?php $i++;
			endforeach; ?>
		</div>


		<div class="row mt-4 mb-4">
			<div class="col-12">
				<span class="featured-label fw-bold">Articles</span>
			</div>
			<div class="col-12">
				<div class="row">
					<?php if (!empty($latest_articles)): ?>
						<?php foreach ($latest_articles as $article): ?>
							<div class="col-12 col-md-4 mb-3 mb-md-0">
								<div class="card rounded-0 shadow-sm border-0 h-100">
									<a href="<?= base_url('articles/view/' . $article['slug']) ?>">
										<img src="<?= base_url(htmlspecialchars($article['image'] ?? 'assets/default.jpg')) ?>"
											class="img-fluid w-100"
											alt="<?= htmlspecialchars($article['title']) ?>"
											style="height: 230px;">
									</a>
									<div class="d-flex justify-content-between mt-3 mb-3 p-2">
										<p class="category-label text-muted small mb-1">
											<?= htmlspecialchars($article['main_category'] ?? 'Article') ?>
										</p>
										<p class="text-muted small mb-2">
											<?= date('F d, Y', strtotime($article['created_at'] ?? date('Y-m-d'))) ?>
										</p>
									</div>
									<h5 class="card-title fs-6 fw-semibold p-2">
										<a href="<?= base_url('articles/view/' . $article['slug']) ?>" class="text-dark text-decoration-none">
											<?= htmlspecialchars($article['title']) ?>
										</a>
									</h5>
								</div>
							</div>
						<?php endforeach; ?>
					<?php else: ?>
						<p>No articles found.</p>
					<?php endif; ?>
				</div>
			</div>
		</div>

	</div>
	<?php $this->load->view('layout/footer'); ?>
	<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.3/dist/js/bootstrap.bundle.min.js"
		integrity="sha384-kenU1KFdBIe4zVF0s0G1M5b4hcpxyD9F7jL+jjXkk+Q2h455rYXK/7HAuoJl+0I4"
		crossorigin="anonymous"></script>
</body>

</html>