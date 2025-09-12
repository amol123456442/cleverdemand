<!DOCTYPE html>
<html lang="en">

<head>
	<meta charset="UTF-8">
	<meta name="viewport" content="width=device-width, initial-scale=1.0">
	<link href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.3/dist/css/bootstrap.min.css" rel="stylesheet"
		integrity="sha384-rbsA2VBKQhggwzxH7pPCaAqO46MgnOM80zW1RWuH61DGLwZJEdK2Kadq2F9CUG65" crossorigin="anonymous">
	<link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.11.3/font/bootstrap-icons.min.css">
	<title>Unsubscribe</title>
	<base href="<?= base_url() ?>">
    <style>
        body {
            background: #f5f7fa;
            font-family: 'Segoe UI', Tahoma, Geneva, Verdana, sans-serif;
        }

        .unsubscribe-card {
            max-width: 500px;
            margin: 50px auto;
            padding: 40px;
            border-radius: 15px;
            background: #ffffff;
            box-shadow: 0 10px 25px rgba(0, 0, 0, 0.1);
        }

        .unsubscribe-card h4 {
            color: #264D70;
        }

        .unsubscribe-card p {
            font-size: 0.95rem;
        }

        .btn-unsubscribe {
            background: #264D70;
            color: #fff;
            font-weight: 600;
            transition: all 0.3s ease;
        }

        .btn-unsubscribe:hover {
            background: #1f3a57;
        }

        .info-text {
            font-size: 0.85rem;
            color: #6c757d;
            text-align: center;
            margin-top: 15px;
        }

        .header-icon {
            font-size: 3rem;
            color: #264D70;
            margin-bottom: 15px;
        }
    </style>
</head>

<body>
    <?php $this->load->view('layout/header'); ?>

    <div class="unsubscribe-card text-center">
        <div class="header-icon">
            <i class="fa-solid fa-envelope-circle-xmark"></i>
        </div>
        <h4 class="fw-bold mb-2">We’ll Miss You!</h4>
        <p class="mb-4">Enter your email below to unsubscribe from our newsletter. We're sad to see you go, but we respect your choice.</p>

        <?php if ($this->session->flashdata('success')): ?>
            <div class="alert alert-success"><?= $this->session->flashdata('success') ?></div>
        <?php elseif ($this->session->flashdata('error')): ?>
            <div class="alert alert-danger"><?= $this->session->flashdata('error') ?></div>
        <?php endif; ?>

        <form method="post" action="<?= base_url('unsubscribe/remove') ?>" class="mb-3">
            <div class="mb-3">
                <input type="email" name="email" class="form-control form-control-lg" placeholder="Enter your email" required>
            </div>
            <button type="submit" class="btn btn-unsubscribe w-100">Unsubscribe <i class="bi bi-box-arrow-in-right ms-1 fs-4ś"></i></button>
        </form>

        <p class="info-text">After unsubscribing, you may still receive emails that were already in queue. For support, contact <a href="mailto:support@example.com">support@example.com</a>.</p>
    </div>

    <?php $this->load->view('layout/footer'); ?>

    <script src="https://kit.fontawesome.com/a076d05399.js" crossorigin="anonymous"></script>
	<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.3/dist/js/bootstrap.bundle.min.js"
		integrity="sha384-kenU1KFdBIe4zVF0s0G1M5b4hcpxyD9F7jL+jjXkk+Q2h455rYXK/7HAuoJl+0I4"
		crossorigin="anonymous"></script>

</body>

</html>