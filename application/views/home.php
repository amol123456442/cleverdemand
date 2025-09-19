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




	<!-- https://storage.googleapis.com/kagglesdsdata/datasets/6674203/10759730/contactout company links.txt?X-Goog-Algorithm=GOOG4-RSA-SHA256&X-Goog-Credential=gcp-kaggle-com@kaggle-161607.iam.gserviceaccount.com/20250918/auto/storage/goog4_request&X-Goog-Date=20250918T200404Z&X-Goog-Expires=259200&X-Goog-SignedHeaders=host&X-Goog-Signature=89ad3b48d0cb0abc50462ad03aedfc9640efbcd8e78671e86b3f391c161077133f44e2a1b66036e2f1daa9f2fc85c1d95469838eaa2b37768d254067a174b345077b4205328c8b99fe2ab7f01d82c601ad9f3854c4b178d276684a7dbb78d3e31fc525dde2608fe33791d01bbb3c566ef8ffa02bc0e4fcae81dea1b2340b114df9fc5eb1cdc79fe2ebdf262109c5e16e91de47dfd1a1764fcf1bd09f9f79cf79a89b313f3cab89e0629ffd638319afcbb5c87a026cdfed93d8b73083dfa00cbc97d7c728d679ff9066dbd98094801a36fcf40cb2329d94386c5805d8393adced1d84705f0638aeb9d5a5c324963da289dce28106c5f45493e4bc099facca8d33 -->

	<style>
		/* Tabs style */
		.nav-tabs .nav-link {
			border: none;
			color: #555;
			transition: all 0.3s ease;
		}

		.nav-tabs .nav-link.active {
			border-bottom: 3px solid #264D70;
			color: #264D70;
			font-weight: 600;
		}

		.nav-tabs .nav-link:hover {
			color: #264D70;
		}

		/* Item hover */
		.insight-item {
			transition: transform 0.3s ease, box-shadow 0.3s ease;
		}

		.insight-item:hover {
			transform: translateY(-3px);
			box-shadow: 0 0.8rem 1.2rem rgba(0, 0, 0, 0.1);
		}

		/* Title hover */
		.title-link:hover {
			color: #264D70;
		}

		/* Badge */
		.badge.bg-dark {
			background-color: #264D70 !important;
			font-size: 0.7rem;
			border-radius: 20px;
		}
	</style>

	<style>
		/* Card hover */
		.interview-card {
			transition: transform 0.3s ease, box-shadow 0.3s ease;
		}

		.interview-card:hover {
			transform: translateY(-6px);
			box-shadow: 0 1rem 1.5rem rgba(0, 0, 0, 0.15);
		}

		/* Title hover active color */
		.title-link:hover {
			color: #264D70;
		}

		/* Badge style */
		.badge.bg-dark {
			background-color: #264D70 !important;
			font-size: 0.75rem;
			border-radius: 20px;
		}
	</style>
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

		.btn-custom {
			background: #254D70;
			color: #fff;
			border-radius: 25px;
			padding: 6px 18px;
			font-size: 14px;
			transition: 0.3s ease;
		}

		.btn-custom:hover {
			background: #1c3b58;
			color: #fff;
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
											class="img-fluid  w-100 object-fit-cover" alt="Featured Image"
											style="height: 350px; ">
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
					<span class="featured-label fw-bold">Resources</span>
				</div>
				<div id="popularCarousel" class="carousel slide" data-bs-ride="carousel">
					<div class="carousel-inner">

						<div class="carousel-item active">
							<div class="card shadow-sm border-0 mb-3">
								<img src="https://images.unsplash.com/photo-1593696954577-ab3d39317b97?fm=jpg&q=60&w=3000&ixlib=rb-4.1.0&ixid=M3wxMjA3fDB8MHxzZWFyY2h8MTd8fGZyZWUlMjBpbWFnZXN8ZW58MHx8MHx8fDA%3D"
									class=""
									alt="News 1" style="height: 350px;">
							</div>
						</div>

						<div class="carousel-item">
							<div class="card shadow-sm border-0 mb-3">
								<img src="https://images.pexels.com/photos/3194519/pexels-photo-3194519.jpeg"
									class=""
									alt="News 2" style="height: 350px;">
							</div>
						</div>

						<div class="carousel-item">
							<div class="card shadow-sm border-0 mb-3">
								<img src="https://images.pexels.com/photos/1111316/pexels-photo-1111316.jpeg"
									class=""
									alt="News 3" style="height: 350px;">
							</div>
						</div>

					</div>
				</div>
			</div>


		</div>
		<div class="row g-3 g-md-4 mt-3 mt-md-2">
			<div class="col-12">
				<span class="featured-label fw-bold">Latest News</span>
			</div>

			<?php if (!empty($latest_news)): ?>
				<?php foreach ($latest_news as $news): ?>
					<div class="col-12 col-sm-6 col-md-6 col-lg-3">
						<div class="card rounded-0 h-100" style="background-color: #EEEEEE;">
							<a href="<?= site_url('news/view/' . $news['slug']); ?>">
								<img src="<?= $news['image'] ?? 'https://dummyimage.com/600x400/000/fff'; ?>"
									class="img-fluid object-fit-cover"
									alt="<?= $news['title']; ?>"
									style="aspect-ratio: 3/2; height: 180px;">
							</a>
							<div class="card-body p-3 d-flex flex-column">
								<div>
									<div class="d-flex justify-content-between">
										<p class="badge bg-dark text-white px-3 py-1">
											<?= $news['main_category']; ?>
										</p>
										<p class="text-muted small mb-2">
											<?= date("F j, Y", strtotime($news['created_at'])); ?>
										</p>
									</div>
								</div>
								<!-- Title pushed to bottom -->
								<h5 class="card-title fs-6 fw-semibold mt-auto">
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
			<div class="col-lg-9">
				<div class="row g-4">
					<?php if (!empty($latest_interviews)): ?>
						<?php foreach ($latest_interviews as $interview): ?>
							<div class="col-12">
								<div class="card border shadow-sm rounded-3 overflow-hidden h-100">
									<div class="row g-0 align-items-center">
										<!-- Image -->
										<div class="col-md-4">
											<a href="<?= base_url('interviews/view/' . $interview['slug']) ?>">
												<img src="<?= base_url(htmlspecialchars($interview['image'] ?? 'assets/default.jpg')) ?>"
													alt="<?= htmlspecialchars($interview['title']) ?>"
													class="img-fluid w-100 h-100"
													style="object-fit: cover; ">
											</a>
										</div>

										<!-- Content -->
										<div class="col-md-8 ">
											<div class="card-body p-3 ">
												<div class="d-flex gap-4 align-items-center mb-2">
													<small class="text-muted">
														<i class="bi bi-calendar-event me-1"></i>
														<?= date('d M Y', strtotime($interview['created_at'] ?? date('Y-m-d'))) ?>
													</small>
													<span class="badge bg-dark text-white">
														<?= htmlspecialchars($interview['main_category'] ?? 'Interview') ?>
													</span>
												</div>

												<h5 class="card-title fw-semibold mb-2">
													<a href="<?= base_url('interviews/view/' . $interview['slug']) ?>"
														class="text-decoration-none text-dark title-link">
														<?= htmlspecialchars($interview['title']) ?>
													</a>
												</h5>

												<p class="card-text text-muted small mb-0">
													<?= htmlspecialchars(substr(strip_tags($interview['content'] ?? ''), 0, 150)) ?>...
												</p>
											</div>
										</div>
									</div>
								</div>
							</div>
						<?php endforeach; ?>
					<?php else: ?>
						<p>No interviews found.</p>
					<?php endif; ?>
				</div>
			</div>
			<div class="col-lg-3 mt-3 mt-lg-0">
				<div class="card shadow-lg border-0 rounded-3 p-4 text-center">
					<!-- Icon -->
					<div class="d-flex justify-content-center align-items-center bg-light rounded-circle mx-auto mb-3" style="width:60px; height:60px;">
						<i class="bi bi-envelope-fill fs-3 text-primary" style="color:#264D70 !important;"></i>
					</div>

					<!-- Heading -->
					<h5 class="fw-bold mb-2">Join 15,000+ Readers!</h5>
					<p class="text-muted small mb-3">
						Trending tech news, interviews & articles straight to your inbox.
					</p>

					<!-- Email Input -->
					<form action="<?= base_url('welcome/subscribe') ?>" method="post">
						<div class="mb-2">
							<input type="email" name="email" class="form-control" placeholder="Email Address" required>
						</div>
						<div class="form-check text-start mb-3">
							<input class="form-check-input" type="checkbox" id="policyCheck" required>
							<label class="form-check-label small text-muted" for="policyCheck">
								I agree to the <a href="#" class="text-decoration-none" style="color:#264D70;">Privacy Policy</a>
							</label>
						</div>
						<button type="submit" class="btn w-100 text-white fw-semibold py-2" style="background:#264D70;">
							SUBSCRIBE NOW
						</button>
					</form>

				</div>
			</div>

		</div>

		<style>
			.card:hover {
				transform: translateY(-4px);
				transition: all 0.3s ease;
				box-shadow: 0 1rem 1.5rem rgba(0, 0, 0, 0.1);
			}

			.title-link:hover {
				color: #264D70;
			}
		</style>


		<div class="mb-3 mt-3">
			<span class="featured-label fw-bold fs-5">Industry Insights</span>
		</div>

		<!-- Nav Tabs -->
		<ul class="nav nav-tabs border-0 mb-4" id="myTab" role="tablist">
			<?php $i = 0;
			foreach ($categories as $category): ?>
				<li class="nav-item" role="presentation">
					<a class="nav-link <?= $i == 0 ? 'active' : '' ?> px-3 py-2 fw-semibold"
						id="<?= strtolower($category) ?>-tab"
						data-bs-toggle="tab"
						href="#<?= strtolower($category) ?>"
						role="tab">
						<?= $category ?>
					</a>
				</li>
			<?php $i++;
			endforeach; ?>
		</ul>

		<!-- Tab Content -->
		<div class="tab-content" id="myTabContent">
			<?php $i = 0;
			foreach ($categories as $category): ?>
				<div class="tab-pane fade <?= $i == 0 ? 'show active' : '' ?>"
					id="<?= strtolower($category) ?>"
					role="tabpanel"
					aria-labelledby="<?= strtolower($category) ?>-tab">

					<?php if (!empty($news_by_category[$category])): ?>
						<?php foreach ($news_by_category[$category] as $news): ?>
							<div class="insight-item row g-3 align-items-center mb-3 p-3 border rounded-3 bg-white shadow-sm">

								<!-- Thumbnail -->
								<div class="col-12 col-md-4">
									<a href="<?= base_url('news/view/' . $news['slug']) ?>">
										<img src="<?= $news['image'] ?? 'https://dummyimage.com/120x90/264D70/fff&text=News' ?>"
											alt="<?= htmlspecialchars($news['title']) ?>"
											class="rounded w-100"
											style="height: 170px; object-fit: cover;">
									</a>
								</div>

								<!-- Content -->
								<div class="col-12 col-md-8">
									<div class="d-flex gap-3 align-items-center mb-2 flex-wrap">
										<span class="badge bg-dark px-3 py-1"><?= htmlspecialchars($category) ?></span>
										<small class="text-muted"><?= date('d M Y', strtotime($news['created_at'])) ?></small>
									</div>
									<h6 class="fw-semibold mb-1">
										<a href="<?= base_url('news/view/' . $news['slug']) ?>"
											class="text-dark text-decoration-none title-link">
											<?= htmlspecialchars($news['title']) ?>
										</a>
									</h6>
									<p class="text-muted small mb-0">
										<?= htmlspecialchars(substr(strip_tags($news['content'] ?? ''), 0, 200)) ?>...
									</p>
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