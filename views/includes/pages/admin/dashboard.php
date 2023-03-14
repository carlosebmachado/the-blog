<?php
$posts_count = \models\Post::count();
$comments_count = \models\Commentary::count();
$messages_count = \models\ContactMessage::count();
if ($posts_count == 0) $posts_count = 1; // avoid division by zero (if there are no posts)
$comments_average = round($comments_count / $posts_count, 2);
?>
<div class="row">
  <div class="col-sm bg-white m-1 p-3 rounded">
    <h5>Posts</h5>
    <div class="mt-4">
      <h6>Total of posts: <?php echo $posts_count ?></h6>
      <h6>Average comments per post: <?php echo $comments_average ?></h6>
    </div>
  </div>
  <div class="col-sm bg-white m-1 p-3 rounded">
    <h5>Commentaries</h5>
    <div class="mt-4">
      <h6>Total of comments: <?php echo $comments_count ?></h6>
    </div>
  </div>
  <div class="col-sm bg-white m-1 p-3 rounded">
    <h5>Messages</h5>
    <div class="mt-4">
      <h6>Total of messages: <?php echo $messages_count ?></h6>
    </div>
  </div>
</div>
<div class="row">
  <div class="col-sm bg-white m-1 p-3 rounded">
    <h5>Fake Metrics</h5>
    <div class="mt-4">
      <h6>Most popular post: <a href="#" target="_blank">All You Need to Know</a></h6>
      <h6>Time the user spent on the site: 15min</h6>
      <h6>Daily visits count: 233</h6>
      <h6>Week visits count: 1740</h6>
      <h6>Monthly visits count: 6290</h6>
      <h6>Total visits count: 154211</h6>
    </div>
  </div>
  <div class="col-sm bg-white m-1 p-3 rounded">
    <h5>Last daily visits</h5>
    <canvas class="mt-4" id="last-daily-visits-chart"></canvas>
  </div>
</div>

<script src="https://cdnjs.cloudflare.com/ajax/libs/Chart.js/2.7.1/Chart.min.js"></script>
<script>
  var ctx = document.getElementById("last-daily-visits-chart");
  var lastDailyVisitsChart = new Chart(ctx, {
    type: 'line',
    data: {
      labels: ["Sun", "Mon", "Tue", "Wed", "Thu", "Fri", "Sat"],
      datasets: [{
        data: [38, 21, 18, 29, 25, 32, 44],
        lineTension: 0,
        backgroundColor: 'transparent',
        borderColor: '#007bff',
        borderWidth: 4,
        pointBackgroundColor: '#007bff'
      }]
    },
    options: {
      scales: {
        yAxes: [{
          ticks: {
            beginAtZero: false
          }
        }]
      },
      legend: {
        display: false,
      }
    }
  });
</script>