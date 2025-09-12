<!DOCTYPE html>
<html lang="en">

<head>
  	<meta charset="UTF-8">
	<meta name="viewport" content="width=device-width, initial-scale=1.0">
	<link href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.3/dist/css/bootstrap.min.css" rel="stylesheet"
		integrity="sha384-rbsA2VBKQhggwzxH7pPCaAqO46MgnOM80zW1RWuH61DGLwZJEdK2Kadq2F9CUG65" crossorigin="anonymous">
	<link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.11.3/font/bootstrap-icons.min.css">
	<title>Privacy-Policy</title>
	<base href="<?= base_url() ?>">
</head>

<body>
    <?php $this->load->view('layout/header'); ?>

    <div class="container my-5">
        <div class="row justify-content-center">
            <div class="col-lg-10">
                <h2 class="fw-bold mb-3" style="color:#264D70;">Privacy Policy</h2>
                <hr class="mb-4" style="border-top: 2px solid #264D70;">

                <p>
                    This Privacy Policy describes how <strong>Prospectprecise</strong> (“we”, “our”, “us”) collects, uses, and protects
                    your personal information when you visit our website or use our services. By using our website,
                    you agree to the practices outlined in this policy.
                </p>

                <h5 class="fw-semibold mt-4">1. Information We Collect</h5>
                <p>We may collect the following information:</p>
                <ul>
                    <li>Personal details (name, email address, phone number)</li>
                    <li>Information you provide when subscribing to our newsletters</li>
                    <li>Usage data such as IP address, browser type, and pages visited</li>
                </ul>

                <h5 class="fw-semibold mt-4">2. How We Use Your Information</h5>
                <ul>
                    <li>To provide and improve our services</li>
                    <li>To send newsletters, updates, and promotional content</li>
                    <li>To ensure website security and prevent fraud</li>
                </ul>

                <h5 class="fw-semibold mt-4">3. Sharing of Information</h5>
                <p>
                    We do not sell, trade, or rent your personal information. However, we may share it with trusted third-party
                    service providers to operate our services (such as email delivery).
                </p>

                <h5 class="fw-semibold mt-4">4. Data Security</h5>
                <p>
                    We implement strict security measures to protect your personal data. However, no method of
                    transmission over the internet is 100% secure.
                </p>

                <h5 class="fw-semibold mt-4">5. Your Rights</h5>
                <p>
                    You have the right to access, update, or delete your personal data. To exercise these rights,
                    contact us at <a href="mailto:contact@Prospectprecise.com" style="color:#264D70;">contact@Prospectprecise.com</a>.
                </p>

                <h5 class="fw-semibold mt-4">6. Updates to This Policy</h5>
                <p>
                    We may update this Privacy Policy from time to time. Any changes will be posted on this page with the updated date.
                </p>

                <p class="mt-4"><strong>Last Updated:</strong> September 2025</p>
            </div>
        </div>
    </div>

    <?php $this->load->view('layout/footer'); ?>

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.3/dist/js/bootstrap.bundle.min.js"
        crossorigin="anonymous"></script>
</body>

</html>