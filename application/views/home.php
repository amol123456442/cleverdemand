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
			!important;
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
						<div class="col-12 col-md-12 mb-3 mb-md-0 mt-3">
							<div class="text-start mb-3">
								<span class="featured-label fw-bold">Latest Insight</span>
							</div>
							<a href="/news/1">
								<img src="https://www.michaelpage.ae/sites/michaelpage.ae/files/legacy/7_digital_skills600x387.png"
									class="img-fluid rounded w-100 object-fit-cover" alt="Featured Image"
									style="height: 300px; object-fit: cover;">
							</a>
							<div class="text-start mt-3">
								<div class="d-flex justify-content-between">
									<p class="badge text-bg-primary text-uppercase small mb-2 mb-md-3">
										Technology
									</p>
									<p class="text-muted small mb-0">June 12, 2025</p>
								</div>
								<h3 class="fs-5 fs-md-4 fw-semibold mb-2">
									<a href="/news/1" class="text-decoration-none text-dark">
										Breakthrough in Quantum Computing
									</a>
								</h3>


							</div>
						</div>
					</div>
				</div>
			</div>

			<!-- Sidebar -->
			<div class="col-12 col-md-4 col-lg-3">
				<div class="text-start mb-3">
					<span class="featured-label fw-bold">Popular</span>
				</div>
				<div class="popular-section p-4 text-dark" style="background-color: rgba(123, 181, 231, 0.34);">

					<!-- <h5 class="fw-semibold mb-3">Popular</h5> -->
					<ul class="list-unstyled">
						<li class="mb-3">
							<a href="/news/2" class="text-decoration-none text-dark">Xionomics: Dems chip breakthrough:
								A new
								flashpoint in the US-China tech war?</a>
						</li>
						<hr>
						<li class="mb-3">
							<p class="category-label text-dark small mb-1 ">Data Centers</p>
							<a href="/news/3" class="text-decoration-none text-dark">Where to go when a library's
								down</a>
						</li>
						<hr>
						<li class="mb-3">
							<p class="category-label text-dark small mb-1">Latest</p>
							<a href="/news/4" class="text-decoration-none text-dark">When will the AI bubble burst?</a>
						</li>
						<hr>

						<li>
							<a href="/news/all" class=" text-decoration-none btn btn-primary">See all</a>
						</li>
					</ul>
				</div>
			</div>
		</div>
		<div class="row g-3 g-md-4 mt-3 mt-md-4">
			<div class="col-12">
				<span class="featured-label fw-bold">Latest News</span>
			</div>

			<!-- News Item 1 -->
			<div class="col-12 col-sm-6 col-md-6 col-lg-3">
				<div class="card rounded-0 h-100">
					<a href="/news/1">
						<img src="https://dummyimage.com/600x400/000/fff"
							class="img-fluid card-img-top object-fit-cover" alt="Article Image"
							style="aspect-ratio: 3/2; height: 180px;">
					</a>
					<div class="card-body p-3">
						<div class="d-flex justify-content-between">
							<p class="category-label text-muted small mb-1">Technology</p>
						<p class="text-muted small mb-2">June 12, 2025</p>
						</div>
						<h5 class="card-title fs-6 fw-semibold">
							<a href="/news/1" class="text-decoration-none text-dark">
								Breakthrough in Quantum Computing
							</a>
						</h5>
					</div>
				</div>
			</div>

			<!-- News Item 2 -->
			<div class="col-12 col-sm-6 col-md-6 col-lg-3">
				<div class="card rounded-0 h-100">
					<a href="/news/2">
						<img src="https://dummyimage.com/600x400/000/fff"
							class="img-fluid card-img-top object-fit-cover" alt="Article Image"
							style="aspect-ratio: 3/2; height: 180px;">
					</a>
					<div class="card-body p-3">
						<div class="d-flex justify-content-between">
							<p class="category-label text-muted small mb-1">Technology</p>
						<p class="text-muted small mb-2">June 12, 2025</p>
						</div>
						<h5 class="card-title fs-6 fw-semibold">
							<a href="/news/2" class="text-decoration-none text-dark">
								AI Models Achieve New Milestone
							</a>
						</h5>
					</div>
				</div>
			</div>

			<!-- News Item 3 -->
			<div class="col-12 col-sm-6 col-md-6 col-lg-3">
				<div class="card rounded-0 h-100">
					<a href="/news/3">
						<img src="https://dummyimage.com/600x400/000/fff"
							class="img-fluid card-img-top object-fit-cover" alt="Article Image"
							style="aspect-ratio: 3/2; height: 180px;">
					</a>
					<div class="card-body p-3">
					<div class="d-flex justify-content-between">
							<p class="category-label text-muted small mb-1">Technology</p>
						<p class="text-muted small mb-2">June 12, 2025</p>
						</div>
						<h5 class="card-title fs-6 fw-semibold">
							<a href="/news/3" class="text-decoration-none text-dark">
								New Data Center Opens in Asia
							</a>
						</h5>
					</div>
				</div>
			</div>

			<!-- News Item 4 -->
			<div class="col-12 col-sm-6 col-md-6 col-lg-3">
				<div class="card rounded-0 h-100">
					<a href="/news/4">
						<img src="https://dummyimage.com/600x400/000/fff"
							class="img-fluid card-img-top object-fit-cover" alt="Article Image"
							style="aspect-ratio: 3/2; height: 180px;">
					</a>
					<div class="card-body p-3">
					<div class="d-flex justify-content-between">
							<p class="category-label text-muted small mb-1">Technology</p>
						<p class="text-muted small mb-2">June 12, 2025</p>
						</div>
						<h5 class="card-title fs-6 fw-semibold">
							<a href="/news/4" class="text-decoration-none text-dark">
								Open-Source Platform Gains Traction
							</a>
						</h5>
					</div>
				</div>
			</div>
		</div>
		<div class="row mt-4">
			<div class="col-12">
				<span class="featured-label fw-bold">Interviews</span>
			</div>
			<div class="col-12">
				<div id="interviewCarousel" class="carousel slide" data-bs-ride="carousel">
					<div class="carousel-inner">
						<!-- Slide 1 -->
						<div class="carousel-item active">
							<div class="row">
								<!-- Interview 1 -->
								<div class="col-12 col-md-4 mb-3 mb-md-0">
									<div class="card rounded-0 shadow-sm border-1 h-100">
										<a href="/interviews/1">
											<img src="https://dummyimage.com/600x400/000/fff" class="img-fluid w-100"
												alt="Interview Image" style="height: 200px; object-fit: cover;">
										</a>
										<div class="d-flex justify-content-between mt-3 mb-3 p-2">
											<p class="category-label text-muted small mb-1">Interview</p>
											<p class="text-muted small mb-2">June 12, 2025</p>
										</div>
										<h5 class="card-title fs-6 fw-semibold p-2">In-Depth with AI Pioneer</h5>
									</div>
								</div>
								<!-- Interview 2 -->
								<div class="col-12 col-md-4 mb-3 mb-md-0">
									<div class="card rounded-0 shadow-sm border-1 h-100">
										<a href="/interviews/2">
											<img src="https://dummyimage.com/600x400/000/fff" class="img-fluid w-100"
												alt="Interview Image" style="height: 200px; object-fit: cover;">
										</a>
										<div class="d-flex justify-content-between mt-3 mb-3 p-2">
											<p class="category-label text-muted small mb-1">Interview</p>
											<p class="text-muted small mb-2">June 11, 2025</p>
										</div>
										<h5 class="card-title fs-6 fw-semibold p-2">Tech CEO on Future of Cloud</h5>
									</div>
								</div>
								<!-- Interview 3 -->
								<div class="col-12 col-md-4 mb-3 mb-md-0">
									<div class="card rounded-0 shadow-sm border-1 h-100">
										<a href="/interviews/3">
											<img src="https://dummyimage.com/600x400/000/fff" class="img-fluid w-100"
												alt="Interview Image" style="height: 200px; object-fit: cover;">
										</a>
										<div class="d-flex justify-content-between mt-3 mb-3 p-2">
											<p class="category-label text-muted small mb-1">Interview</p>
											<p class="text-muted small mb-2">June 10, 2025</p>
										</div>
										<h5 class="card-title fs-6 fw-semibold p-2">Data Scientist Shares Insights</h5>
									</div>
								</div>
							</div>
						</div>
						<!-- Slide 2 -->
						<div class="carousel-item">
							<div class="row">
								<!-- Interview 4 -->
								<div class="col-12 col-md-4 mb-3 mb-md-0">
									<div class="card rounded-0 shadow-sm border-1 h-100">
										<a href="/interviews/4">
											<img src="https://dummyimage.com/600x400/000/fff" class="img-fluid w-100"
												alt="Interview Image" style="height: 200px; object-fit: cover;">
										</a>
										<div class="d-flex justify-content-between mt-3 mb-3 p-2">
											<p class="category-label text-muted small mb-1">Interview</p>
											<p class="text-muted small mb-2">June 9, 2025</p>
										</div>
										<h5 class="card-title fs-6 fw-semibold p-2">Innovator on Quantum Tech</h5>
									</div>
								</div>
								<!-- Interview 5 -->
								<div class="col-12 col-md-4 mb-3 mb-md-0">
									<div class="card rounded-0 shadow-sm border-1 h-100">
										<a href="/interviews/5">
											<img src="https://dummyimage.com/600x400/000/fff" class="img-fluid w-100"
												alt="Interview Image" style="height: 200px; object-fit: cover;">
										</a>
										<div class="d-flex justify-content-between mt-3 mb-3 p-2">
											<p class="category-label text-muted small mb-1">Interview</p>
											<p class="text-muted small mb-2">June 8, 2025</p>
										</div>
										<h5 class="card-title fs-6 fw-semibold p-2">Cybersecurity Expert Interview</h5>
									</div>
								</div>
								<!-- Interview 6 -->
								<div class="col-12 col-md-4 mb-3 mb-md-0">
									<div class="card rounded-0 shadow-sm border-1 h-100">
										<a href="/interviews/6">
											<img src="https://dummyimage.com/600x400/000/fff" class="img-fluid w-100"
												alt="Interview Image" style="height: 200px; object-fit: cover;">
										</a>
										<div class="d-flex justify-content-between mt-3 mb-3 p-2">
											<p class="category-label text-muted small mb-1">Interview</p>
											<p class="text-muted small mb-2">June 7, 2025</p>
										</div>
										<h5 class="card-title fs-6 fw-semibold p-2">Startup Founder on Growth</h5>
									</div>
								</div>
							</div>
						</div>
					</div>

					<!-- Carousel Controls -->
					<button class="carousel-control-prev" type="button" data-bs-target="#interviewCarousel"
						data-bs-slide="prev">
						<span class="carousel-control-prev-icon" aria-hidden="true"></span>
						<span class="visually-hidden">Previous</span>
					</button>
					<button class="carousel-control-next" type="button" data-bs-target="#interviewCarousel"
						data-bs-slide="next">
						<span class="carousel-control-next-icon" aria-hidden="true"></span>
						<span class="visually-hidden">Next</span>
					</button>
				</div>
			</div>
		</div>
		<div class="row g-4 mt-4 mb-4">
			<!-- Left Column -->
			<div class="col-12 col-lg-9">
				<div class="mb-3">
					<span class="featured-label fw-bold">Industry Insights</span>
				</div>

				<!-- Dropdown Tab Navigation -->
				<ul class="nav nav-tabs flex-wrap gap-2 mb-3" id="myTab" role="tablist">
					<li class="nav-item" role="presentation">
						<a class="nav-link active" id="martech-tab" data-bs-toggle="tab" href="#martech"
							role="tab">Martech</a>
					</li>
					<li class="nav-item" role="presentation">
						<a class="nav-link" id="hrtech-tab" data-bs-toggle="tab" href="#hrtech" role="tab">HRTech</a>
					</li>
					<li class="nav-item" role="presentation">
						<a class="nav-link" id="fintech-tab" data-bs-toggle="tab" href="#fintech" role="tab">FinTech</a>
					</li>
					<li class="nav-item" role="presentation">
						<a class="nav-link" id="consumer-tab" data-bs-toggle="tab" href="#consumer" role="tab">Consumer
							Tech</a>
					</li>
				</ul>
				<script>
					document.querySelectorAll('.dropdown-item[data-bs-toggle="tab"]').forEach(function (el) {
						el.addEventListener('click', function (e) {
							var tabTrigger = new bootstrap.Tab(el);
							tabTrigger.show();
						});
					});
				</script>

				<!-- Tab Content -->
				<div class="tab-content" id="myTabContent">
					<!-- Martech -->
					<div class="tab-pane fade show active" id="martech" role="tabpanel" aria-labelledby="martech-tab">
						<div class="p-3 border rounded bg-white mb-3">
							<h6 class="fw-semibold mb-1">Top Martech Tools of 2025</h6>
							<div class="d-flex justify-content-between text-muted small">
								<span>Martech</span>
								<span>10 Jun 2025</span>
							</div>
						</div>
						<div class="p-3 border rounded bg-white mb-3">
							<h6 class="fw-semibold mb-1">How AI is Changing Marketing Automation</h6>
							<div class="d-flex justify-content-between text-muted small">
								<span>Martech</span>
								<span>08 Jun 2025</span>
							</div>
						</div>
						<div class="p-3 border rounded bg-white mb-3">
							<h6 class="fw-semibold mb-1">How AI is Changing Marketing Automation</h6>
							<div class="d-flex justify-content-between text-muted small">
								<span>Martech</span>
								<span>08 Jun 2025</span>
							</div>
						</div>
						<div class="p-3 border rounded bg-white mb-3">
							<h6 class="fw-semibold mb-1">How AI is Changing Marketing Automation</h6>
							<div class="d-flex justify-content-between text-muted small">
								<span>Martech</span>
								<span>08 Jun 2025</span>
							</div>
						</div>
						<div class="p-3 border rounded bg-white mb-3">
							<h6 class="fw-semibold mb-1">How AI is Changing Marketing Automation</h6>
							<div class="d-flex justify-content-between text-muted small">
								<span>Martech</span>
								<span>08 Jun 2025</span>
							</div>
						</div>
					</div>

					<!-- HRTech -->
					<div class="tab-pane fade" id="hrtech" role="tabpanel" aria-labelledby="hrtech-tab">
						<div class="p-3 border rounded bg-white mb-3">
							<h6 class="fw-semibold mb-1">Top 5 HR platforms reshaping hiring</h6>
							<div class="d-flex justify-content-between text-muted small">
								<span>HRTech</span>
								<span>11 Jun 2025</span>
							</div>
						</div>
						<div class="p-3 border rounded bg-white mb-3">
							<h6 class="fw-semibold mb-1">Remote work tools adopted by global HR teams</h6>
							<div class="d-flex justify-content-between text-muted small">
								<span>HRTech</span>
								<span>09 Jun 2025</span>
							</div>
						</div>
						<div class="p-3 border rounded bg-white mb-3">
							<h6 class="fw-semibold mb-1">Remote work tools adopted by global HR teams</h6>
							<div class="d-flex justify-content-between text-muted small">
								<span>HRTech</span>
								<span>09 Jun 2025</span>
							</div>
						</div>
						<div class="p-3 border rounded bg-white mb-3">
							<h6 class="fw-semibold mb-1">Remote work tools adopted by global HR teams</h6>
							<div class="d-flex justify-content-between text-muted small">
								<span>HRTech</span>
								<span>09 Jun 2025</span>
							</div>
						</div>
						<div class="p-3 border rounded bg-white mb-3">
							<h6 class="fw-semibold mb-1">Remote work tools adopted by global HR teams</h6>
							<div class="d-flex justify-content-between text-muted small">
								<span>HRTech</span>
								<span>09 Jun 2025</span>
							</div>
						</div>
					</div>

					<!-- FinTech -->
					<div class="tab-pane fade" id="fintech" role="tabpanel" aria-labelledby="fintech-tab">
						<div class="p-3 border rounded bg-white mb-3">
							<h6 class="fw-semibold mb-1">India’s UPI growth fuels FinTech boom</h6>
							<div class="d-flex justify-content-between text-muted small">
								<span>FinTech</span>
								<span>13 Jun 2025</span>
							</div>
						</div>
						<div class="p-3 border rounded bg-white mb-3">
							<h6 class="fw-semibold mb-1">Crypto regulations tighten across Asia</h6>
							<div class="d-flex justify-content-between text-muted small">
								<span>FinTech</span>
								<span>10 Jun 2025</span>
							</div>
						</div>
						<div class="p-3 border rounded bg-white mb-3">
							<h6 class="fw-semibold mb-1">Crypto regulations tighten across Asia</h6>
							<div class="d-flex justify-content-between text-muted small">
								<span>FinTech</span>
								<span>10 Jun 2025</span>
							</div>
						</div>
						<div class="p-3 border rounded bg-white mb-3">
							<h6 class="fw-semibold mb-1">Crypto regulations tighten across Asia</h6>
							<div class="d-flex justify-content-between text-muted small">
								<span>FinTech</span>
								<span>10 Jun 2025</span>
							</div>
						</div>
						<div class="p-3 border rounded bg-white mb-3">
							<h6 class="fw-semibold mb-1">Crypto regulations tighten across Asia</h6>
							<div class="d-flex justify-content-between text-muted small">
								<span>FinTech</span>
								<span>10 Jun 2025</span>
							</div>
						</div>
						<div class="p-3 border rounded bg-white mb-3">
							<h6 class="fw-semibold mb-1">Crypto regulations tighten across Asia</h6>
							<div class="d-flex justify-content-between text-muted small">
								<span>FinTech</span>
								<span>10 Jun 2025</span>
							</div>
						</div>
					</div>

					<!-- Consumer Tech -->
					<div class="tab-pane fade" id="consumer" role="tabpanel" aria-labelledby="consumer-tab">
						<div class="p-3 border rounded bg-white mb-3">
							<h6 class="fw-semibold mb-1">Smartphone launches to watch in 2025</h6>
							<div class="d-flex justify-content-between text-muted small">
								<span>Consumer Tech</span>
								<span>14 Jun 2025</span>
							</div>
						</div>
						<div class="p-3 border rounded bg-white mb-3">
							<h6 class="fw-semibold mb-1">Top smart home gadgets ranked</h6>
							<div class="d-flex justify-content-between text-muted small">
								<span>Consumer Tech</span>
								<span>11 Jun 2025</span>
							</div>
						</div>
						<div class="p-3 border rounded bg-white mb-3">
							<h6 class="fw-semibold mb-1">Top smart home gadgets ranked</h6>
							<div class="d-flex justify-content-between text-muted small">
								<span>Consumer Tech</span>
								<span>11 Jun 2025</span>
							</div>
						</div>
						<div class="p-3 border rounded bg-white mb-3">
							<h6 class="fw-semibold mb-1">Top smart home gadgets ranked</h6>
							<div class="d-flex justify-content-between text-muted small">
								<span>Consumer Tech</span>
								<span>11 Jun 2025</span>
							</div>
						</div>
						<div class="p-3 border rounded bg-white mb-3">
							<h6 class="fw-semibold mb-1">Top smart home gadgets ranked</h6>
							<div class="d-flex justify-content-between text-muted small">
								<span>Consumer Tech</span>
								<span>11 Jun 2025</span>
							</div>
						</div>
					</div>
				</div>
			</div>

			<!-- Right Column: Newsletter -->
			<div class="col-12 col-lg-3">
				<div class="mb-3 text-center text-lg-start">
					<span class="featured-label fw-bold">Subscribe to Our Newsletter</span>
				</div>

				<div class="card bg-light shadow-sm py-4 px-3">
					<div class="card-body text-center">
						<h5 class="card-title fs-6 fw-semibold mb-3">Stay Updated!</h5>

						<form class="w-100">
							<div class="mb-2">
								<input type="email" class="form-control" placeholder="Enter your email" required>
							</div>
							<div class="d-grid">
								<button class="btn btn-primary" type="submit">Subscribe</button>
							</div>
						</form>

						<p class="small text-muted mt-3 mb-0">
							Get the latest updates and stories delivered to your inbox every week.
						</p>
					</div>
				</div>
			</div>


		</div>
		<div class="row mt-4 mb-4">
			<div class="col-12">
				<span class="featured-label fw-bold">Articles</span>
			</div>
			<div class="col-12">
				<div id="interviewCarousel" class="carousel slide" data-bs-ride="carousel">
					<div class="carousel-inner">
						<!-- Slide 1 -->
						<div class="carousel-item active">
							<div class="row">
								<!-- Interview 1 -->
								<div class="col-12 col-md-4 mb-3 mb-md-0">
									<div class="card rounded-0 shadow-sm border-0 h-100">
										<a href="/interviews/1">
											<img src="https://dummyimage.com/600x400/000/fff" class="img-fluid w-100"
												alt="Interview Image" style="height: 200px; object-fit: cover;">
										</a>
										<div class="d-flex justify-content-between mt-3 mb-3 p-2">
											<p class="category-label text-muted small mb-1">Interview</p>
											<p class="text-muted small mb-2">June 12, 2025</p>
										</div>
										<h5 class="card-title fs-6 fw-semibold p-2">In-Depth with AI Pioneer</h5>
									</div>
								</div>
								<!-- Interview 2 -->
								<div class="col-12 col-md-4 mb-3 mb-md-0">
									<div class="card rounded-0 shadow-sm border-0 h-100">
										<a href="/interviews/2">
											<img src="https://dummyimage.com/600x400/000/fff" class="img-fluid w-100"
												alt="Interview Image" style="height: 200px; object-fit: cover;">
										</a>
										<div class="d-flex justify-content-between mt-3 mb-3 p-2">
											<p class="category-label text-muted small mb-1">Interview</p>
											<p class="text-muted small mb-2">June 11, 2025</p>
										</div>
										<h5 class="card-title fs-6 fw-semibold p-2">Tech CEO on Future of Cloud</h5>
									</div>
								</div>
								<!-- Interview 3 -->
								<div class="col-12 col-md-4 mb-3 mb-md-0">
									<div class="card rounded-0 shadow-sm border-0 h-100">
										<a href="/interviews/3">
											<img src="https://dummyimage.com/600x400/000/fff" class="img-fluid w-100"
												alt="Interview Image" style="height: 200px; object-fit: cover;">
										</a>
										<div class="d-flex justify-content-between mt-3 mb-3 p-2">
											<p class="category-label text-muted small mb-1">Interview</p>
											<p class="text-muted small mb-2">June 10, 2025</p>
										</div>
										<h5 class="card-title fs-6 fw-semibold p-2">Data Scientist Shares Insights</h5>
									</div>
								</div>
							</div>
						</div>
						<!-- Slide 2 -->
						<div class="carousel-item">
							<div class="row">
								<!-- Interview 4 -->
								<div class="col-12 col-md-4 mb-3 mb-md-0">
									<div class="card rounded-0 shadow-sm border-0 h-100">
										<a href="/interviews/4">
											<img src="https://dummyimage.com/600x400/000/fff" class="img-fluid w-100"
												alt="Interview Image" style="height: 200px; object-fit: cover;">
										</a>
										<div class="d-flex justify-content-between mt-3 mb-3 p-2">
											<p class="category-label text-muted small mb-1">Interview</p>
											<p class="text-muted small mb-2">June 9, 2025</p>
										</div>
										<h5 class="card-title fs-6 fw-semibold p-2">Innovator on Quantum Tech</h5>
									</div>
								</div>
								<!-- Interview 5 -->
								<div class="col-12 col-md-4 mb-3 mb-md-0">
									<div class="card rounded-0 shadow-sm border-0 h-100">
										<a href="/interviews/5">
											<img src="https://dummyimage.com/600x400/000/fff" class="img-fluid w-100"
												alt="Interview Image" style="height: 200px; object-fit: cover;">
										</a>
										<div class="d-flex justify-content-between mt-3 mb-3 p-2">
											<p class="category-label text-muted small mb-1">Interview</p>
											<p class="text-muted small mb-2">June 8, 2025</p>
										</div>
										<h5 class="card-title fs-6 fw-semibold p-2">Cybersecurity Expert Interview</h5>
									</div>
								</div>
								<!-- Interview 6 -->
								<div class="col-12 col-md-4 mb-3 mb-md-0">
									<div class="card rounded-0 shadow-sm border-1 h-100">
										<a href="/interviews/6">
											<img src="https://dummyimage.com/600x400/000/fff" class="img-fluid w-100"
												alt="Interview Image" style="height: 200px; object-fit: cover;">
										</a>
										<div class="d-flex justify-content-between mt-3 mb-3 p-2">
											<p class="category-label text-muted small mb-1">Interview</p>
											<p class="text-muted small mb-2">June 7, 2025</p>
										</div>
										<h5 class="card-title fs-6 fw-semibold p-2">Startup Founder on Growth</h5>
									</div>
								</div>
							</div>
						</div>
					</div>

					<!-- Carousel Controls -->
					<button class="carousel-control-prev" type="button" data-bs-target="#interviewCarousel"
						data-bs-slide="prev">
						<span class="carousel-control-prev-icon" aria-hidden="true"></span>
						<span class="visually-hidden">Previous</span>
					</button>
					<button class="carousel-control-next" type="button" data-bs-target="#interviewCarousel"
						data-bs-slide="next">
						<span class="carousel-control-next-icon" aria-hidden="true"></span>
						<span class="visually-hidden">Next</span>
					</button>
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