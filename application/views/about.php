<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>About Us | Company Name</title>

  <!-- Bootstrap CSS -->
  <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet">
  <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.11.3/font/bootstrap-icons.min.css">

  <style>
 
    /* Hero */
    .hero-section {
      background: linear-gradient(rgba(37, 77, 112, 0.85), rgba(37, 77, 112, 0.85)),
        url("https://images.unsplash.com/photo-1504384308090-c894fdcc538d?auto=format&fit=crop&w=1400&q=80") center/cover no-repeat;
      color: #fff;
      padding: 100px 20px;
      text-align: center;
    }

    .hero-section h1 {
      font-weight: 700;
      font-size: 3rem;
    }

    .hero-section p {
      font-size: 1.2rem;
    }

    /* About */
    .about-section {
      padding: 80px 20px;
    }

    .about-section h2 {
      color: #254D70;
      font-weight: 600;
    }

    /* Info Cards */
    .info-card {
      border: none;
      border-radius: 12px;
      box-shadow: 0 4px 10px rgba(0, 0, 0, 0.1);
      transition: transform 0.2s;
      height: 100%;
    }

    .info-card:hover {
      transform: translateY(-5px);
    }

    .info-card i {
      font-size: 40px;
      color: #254D70;
      margin-bottom: 15px;
    }

    /* Timeline */
    .timeline {
      position: relative;
      padding-left: 40px;
      margin-top: 40px;
    }

    .timeline::before {
      content: "";
      position: absolute;
      left: 20px;
      top: 0;
      bottom: 0;
      width: 3px;
      background: #254D70;
    }

    .timeline-item {
      margin-bottom: 30px;
      position: relative;
    }
    /* Team */
    .team-card {
      border: none;
      border-radius: 15px;
      overflow: hidden;
      box-shadow: 0 4px 12px rgba(0, 0, 0, 0.1);
      transition: transform 0.3s;
    }

    .team-card:hover {
      transform: translateY(-8px);
    }

    .team-card img {
      height: 250px;
      object-fit: cover;
    }

    .team-card h5 {
      color: #254D70;
      margin-top: 10px;
    }

    /* CTA */
    .cta-section {
      background-color: #254D70;
      color: #fff;
      text-align: center;
      padding: 60px 20px;
    }

    .cta-section h2 {
      font-weight: 700;
    }

   
  </style>
</head>

<body>
  <!-- Header Placeholder -->
  <?php $this->load->view('layout/header'); ?>

  <!-- Hero Section -->
  <section class="hero-section">
    <div class="container">
      <h1>About Our Company</h1>
      <p class="lead">Empowering businesses with innovation, technology, and strategic solutions for a better tomorrow.</p>
    </div>
  </section>

  <!-- About Section -->
  <section class="about-section">
    <div class="container">
      <div class="row align-items-center">
        <div class="col-md-6 mb-4">
          <img src="https://images.unsplash.com/photo-1521737604893-d14cc237f11d?auto=format&fit=crop&w=800&q=80"
            alt="About Company" class="img-fluid rounded shadow">
        </div>
        <div class="col-md-6">
          <h2>Who We Are</h2>
          <p>
            We are a forward-thinking organization committed to creating impactful solutions for our clients. With a blend of creativity, expertise, and dedication, we help businesses embrace digital transformation and achieve sustainable growth.
          </p>
          <p>
            Our diverse team of professionals works across industries, delivering services that combine technology, strategy, and innovation.
          </p>
        </div>
      </div>
    </div>
  </section>

  <!-- Mission / Vision / Values -->
  <section class="py-5 bg-light">
    <div class="container">
      <div class="row text-center g-4">
        <div class="col-md-4">
          <div class="card info-card p-4">
            <i class="bi bi-bullseye"></i>
            <h5 class="fw-bold">Our Mission</h5>
            <p>To provide innovative, scalable, and reliable solutions that empower our clients to succeed in an ever-changing digital world.</p>
          </div>
        </div>
        <div class="col-md-4">
          <div class="card info-card p-4">
            <i class="bi bi-eye"></i>
            <h5 class="fw-bold">Our Vision</h5>
            <p>To become a global leader in delivering transformative solutions that shape the future of businesses and communities.</p>
          </div>
        </div>
        <div class="col-md-4">
          <div class="card info-card p-4">
            <i class="bi bi-people"></i>
            <h5 class="fw-bold">Our Values</h5>
            <p>We believe in integrity, collaboration, innovation, and excellence in every project we deliver.</p>
          </div>
        </div>
      </div>
    </div>
  </section>

  <!-- Our Journey -->
  <section class="py-5">
    <div class="container">
      <h2 class="text-center mb-4" style="color:#254D70;">Our Journey</h2>
      <div class="timeline">
        <div class="timeline-item">
          <h5>2010 - The Beginning</h5>
          <p>Started with a small team driven by passion to create meaningful solutions for local businesses.</p>
        </div>
        <div class="timeline-item">
          <h5>2015 - Expansion</h5>
          <p>Expanded our services globally, delivering cutting-edge technology to diverse industries.</p>
        </div>
        <div class="timeline-item">
          <h5>2020 - Innovation</h5>
          <p>Introduced AI-powered solutions and strengthened our role as a digital transformation partner.</p>
        </div>
        <div class="timeline-item">
          <h5>2023 - Present</h5>
          <p>Continuing our journey of excellence, building impactful strategies for the future of businesses worldwide.</p>
        </div>
      </div>
    </div>
  </section>



  <!-- Call to Action -->
  <section class="cta-section">
    <div class="container">
      <h2>Partner With Us</h2>
      <p class="mb-4">Let’s collaborate and build innovative solutions for a brighter future.</p>
      <a href="<?php echo base_url('contact'); ?>" class="btn btn-light btn-lg">Contact Us</a>
    </div>
  </section>

  <!-- Footer Placeholder -->
  <?php $this->load->view('layout/footer'); ?>

  <!-- Bootstrap JS -->
  <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js"></script>
</body>

</html>
