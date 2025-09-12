<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Main Dashboard</title>
  <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet">
  <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/js/bootstrap.bundle.min.js"></script>
  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.5.0/css/all.min.css">
  <!-- Chart.js -->
  <script src="https://cdn.jsdelivr.net/npm/chart.js"></script>
</head>
<body class="bg-light">

<div class="container mt-4">

  <!-- Top Stats -->
  <div class="row mb-4">
    <div class="col-lg-4 col-md-6 mb-3">
      <div class="card shadow-sm border-0">
        <div class="card-body d-flex justify-content-between align-items-center">
          <div>
            <h6 class="text-muted">Total News</h6>
           <h3 class="mb-0"><?= $counts['news_count']; ?></h3>
          </div>
          <div class="icon bg-primary text-white rounded-circle p-3">
            <i class="fas fa-newspaper fa-lg"></i>
          </div>
        </div>
      </div>
    </div>

    <div class="col-lg-4 col-md-6 mb-3">
      <div class="card shadow-sm border-0">
        <div class="card-body d-flex justify-content-between align-items-center">
          <div>
            <h6 class="text-muted">Total Blogs</h6>
          <h3 class="mb-0"><?= $counts['press_count']; ?></h3>
          </div>
          <div class="icon bg-success text-white rounded-circle p-3">
            <i class="fas fa-bullhorn fa-lg"></i>
          </div>
        </div>
      </div>
    </div>

    <div class="col-lg-4 col-md-6 mb-3">
      <div class="card shadow-sm border-0">
        <div class="card-body d-flex justify-content-between align-items-center">
          <div>
            <h6 class="text-muted">Total Interviews</h6>
         <h3 class="mb-0"><?= $counts['interview_count']; ?></h3>
          </div>
          <div class="icon bg-warning text-white rounded-circle p-3">
            <i class="fas fa-user-tie fa-lg"></i>
          </div>
        </div>
      </div>
    </div>
  </div>

  <!-- Charts Row -->
  <div class="row">
    <!-- Bar Chart -->
    <div class="col-lg-8 mb-3">
      <div class="card shadow-sm border-0">
        <div class="card-header bg-white">
          Month-wise News & Interviews
        </div>
        <div class="card-body">
          <canvas id="barChart" height="150"></canvas>
        </div>
      </div>
    </div>

    <!-- Pie Chart -->
    <div class="col-lg-4 mb-3">
      <div class="card shadow-sm border-0">
        <div class="card-header bg-white">
          Content Distribution (%)
        </div>
        <div class="card-body">
          <canvas id="pieChart" height="200"></canvas>
        </div>
      </div>
    </div>
  </div>

</div>

<!-- Chart.js Config -->
<script>
  // Bar Chart: Month-wise News & Interviews
  const ctxBar = document.getElementById('barChart').getContext('2d');
  const barChart = new Chart(ctxBar, {
    type: 'bar',
    data: {
      labels: ['Jan', 'Feb', 'Mar', 'Apr', 'May', 'Jun', 'Jul'],
      datasets: [
        {
          label: 'News',
          data: [12, 19, 10, 25, 22, 30, 18],
          backgroundColor: '#007bff'
        },
        {
          label: 'Interviews',
          data: [5, 9, 7, 11, 15, 10, 6],
          backgroundColor: '#ffc107'
        }
      ]
    },
    options: {
      responsive: true,
      plugins: {
        legend: { position: 'top' }
      }
    }
  });

  // Pie Chart: Distribution of News, Press Release, Interviews
  const ctxPie = document.getElementById('pieChart').getContext('2d');
  const pieChart = new Chart(ctxPie, {
    type: 'pie',
    data: {
      labels: ['News', 'Press Release', 'Interviews'],
      datasets: [{
        data: [120, 45, 30],
        backgroundColor: ['#007bff', '#28a745', '#ffc107']
      }]
    },
    options: {
      responsive: true,
      plugins: {
        legend: { position: 'bottom' }
      }
    }
  });
</script>

</body>
</html>
