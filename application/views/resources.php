<!DOCTYPE html>
<html lang="en">

<head>
	<meta charset="UTF-8">
	<meta name="viewport" content="width=device-width, initial-scale=1.0">
	<link href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.3/dist/css/bootstrap.min.css" rel="stylesheet"
		integrity="sha384-rbsA2VBKQhggwzxH7pPCaAqO46MgnOM80zW1RWuH61DGLwZJEdK2Kadq2F9CUG65" crossorigin="anonymous">
	<link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.11.3/font/bootstrap-icons.min.css">
	<title>Resources</title>
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

		/* Unique Card */
		.card-unique {
			position: relative;
			border: none;
			border-radius: 18px;
			overflow: hidden;
			background: linear-gradient(135deg, #254D70, #3c6ea7);
			color: #fff;
			transition: all 0.3s ease;
			display: flex;
			flex-direction: column;
		}

		.card-unique img {
			width: 100%;
			height: 220px;
			object-fit: cover;
			opacity: 0.85;
			transition: 0.3s ease;
		}

		.card-unique:hover img {
			transform: scale(1.05);
			opacity: 0.7;
		}

		.card-overlay {
			position: absolute;
			top: 0;
			left: 0;
			width: 100%;
			height: 100%;
			background: rgba(37, 77, 112, 0.1);
		}

		.card-body {
			position: relative;
			background: rgba(255, 255, 255, 0.9);
			backdrop-filter: blur(6px);
			margin: 0 15px -25px 15px;
			border-radius: 12px;
			padding: 25px;
			color: #333;
			box-shadow: 0 8px 20px rgba(0, 0, 0, 0.2);
			z-index: 2;
			flex-grow: 1;
			display: flex;
			flex-direction: column;
			justify-content: space-between;
		}

		.card-title {
			color: #254D70;
			font-weight: bold;
			font-size: 1rem;
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

	<div class="container">
		<div class="row">
			<div class="col-lg-12 text-center my-4">
				<h1>Resources</h1>
			</div>
		</div>
	</div>

<div class="container py-5">
    <div class="row g-5" id="resources-container">

        <?php foreach ($resources as $index => $res): ?>
            <div class="col-lg-4 d-flex resource-card <?= $index >= 6 ? 'd-none extra' : '' ?>">
                <div class="card-unique h-100 w-100">
                    <img src="<?= $res['image'] ?>" alt="...">
                    <div class="card-overlay"></div>
                    <div class="card-body text-center">
                        <h5 class="card-title"><a href="<?= $res['link'] ?>" style="text-decoration: none; color: #254D70" ><?= $res['title'] ?></a></h5>
                        <a href="<?= $res['link'] ?>" class="btn btn-custom my-2">Read More</a>
                    </div>
                </div>
            </div>
        <?php endforeach; ?>

        <div class="col-lg-12 text-center mt-4">
            <button id="show-more" class="btn btn-custom my-2">
                Show More <i class="bi bi-sort-numeric-down-alt ms-1"></i>
            </button>
        </div>

    </div>
</div>

<script>
    document.getElementById("show-more").addEventListener("click", function () {
        let hiddenCards = document.querySelectorAll(".resource-card.extra.d-none");
        hiddenCards.forEach(card => {
            card.classList.remove("d-none");
        });
        this.style.display = "none"; // Show More button छुपा दो
    });
</script>


	<?php $this->load->view('layout/footer'); ?>
	<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.3/dist/js/bootstrap.bundle.min.js"
		integrity="sha384-kenU1KFdBIe4zVF0s0G1M5b4hcpxyD9F7jL+jjXkk+Q2h455rYXK/7HAuoJl+0I4"
		crossorigin="anonymous"></script>
</body>

</html>