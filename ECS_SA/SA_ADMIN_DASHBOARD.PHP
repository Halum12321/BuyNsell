<?php
include('DBConnect.php');
session_start();

if (!isset($_SESSION["UNAME"])) {
  $_SESSION = array();
  session_destroy();
  header('location: ../index.php');
  die();
}
?>
<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="utf-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
  <meta name="description" content="">
  <meta name="author" content="">
  <link href="../assets/images/buyAndSell.png" rel="icon">
  <title>Dashboard - BUY & SELL</title>
  <link href="vendor/fontawesome-free/css/all.min.css" rel="stylesheet" type="text/css">
  <link href="vendor/bootstrap/css/bootstrap.min.css" rel="stylesheet" type="text/css">
  <link href="css/SD-admin.min.css" rel="stylesheet">
</head>

<body id="page-top">
  <div id="wrapper">
    <!-- Sidebar -->
    <ul class="navbar-nav sidebar sidebar-light accordion" id="accordionSidebar">
      <a class="sidebar-brand d-flex align-items-center justify-content-center"  href="../Buyer_index.php">
        <div class="sidebar-brand-icon">
          <img src="../assets/images/buy&sell-logo.png">
        </div>
        <div class="sidebar-brand-text mx-3"><span style="color: #01D1FF;">BUY</span> & <span style="color: #EEFF01;">SELL</span></div>
      </a>
      <hr class="sidebar-divider my-0">
      <li class="nav-item active">
        <a class="nav-link" href="admin_dashboard.php">
          <i class="fas fa-fw fa-tachometer-alt" style="color: #1E1F29;"></i>
          <span>Dashboard</span></a>
      </li>
      <hr class="sidebar-divider">
      <div class="sidebar-heading">
        Features
      </div>
      <li class="nav-item">
        <a class="nav-link collapsed" href="#" data-toggle="collapse" data-target="#collapseBootstrap" aria-expanded="true" aria-controls="collapseBootstrap">
          <i class="fa fa-cart-arrow-down"></i>
          <span>Product</span>
        </a>
        <div id="collapseBootstrap" class="collapse" aria-labelledby="headingBootstrap" data-parent="#accordionSidebar">
          <div class="bg-white py-2 collapse-inner rounded">
            <h6 class="collapse-header">Product</h6>
            <a class="collapse-item" href="admin_addProduct.php">Add a product</a>
            <a class="collapse-item" href="admin_manageProduct.php">Manage product</a>
          </div>
        </div>
      </li>
      <li class="nav-item">
        <a class="nav-link" href="admin_confirmOrder.php">
          <i class="fab fa-fw fa-wpforms"></i>
          <span>Order list</span>
        </a>
      </li>
      <li class="nav-item">
        <a class="nav-link" href="admin_history.php">
          <i class="fas fa-fw fa-history"></i>
          <span>History</span>
        </a>
      </li>
      <li class="nav-item">
        <a class="nav-link collapsed" href="#" data-toggle="collapse" data-target="#collapseBootstrap2" aria-expanded="true" aria-controls="collapseBootstrap">
          <i class="fa fa-home"></i>
          <span>Stores</span>
        </a>
        <div id="collapseBootstrap2" class="collapse" aria-labelledby="headingBootstrap" data-parent="#accordionSidebar">
          <div class="bg-white py-2 collapse-inner rounded">
            <h6 class="collapse-header">Stores</h6>
            <a class="collapse-item" href="admin_registration.php">Manage my store</a>
            <a class="collapse-item" href="admin_manageStores.php">Manage sellers store</a>
          </div>
        </div>
      </li>
      <hr class="sidebar-divider">
      <div class="sidebar-heading">
        OTHER PAGES
      </div>
      <li class="nav-item">
        <a class="nav-link" href="my_account.php">
          <i class="fas fa-fw fa-user"></i>
          <span>My Account</span>
        </a>
      </li>
      <li class="nav-item">
        <a class="nav-link" href="admin_manageUsers.php">
          <i class="fas fa-fw fa-user-friends"></i>
          <span>Manage Users</span>
        </a>
      </li>
      <li class="nav-item">
        <a class="nav-link" href="javascript:void(0);" data-toggle="modal" data-target="#logoutModal">
          <i class="fa fa-sign-out-alt"></i>
          <span>Logout</span>
        </a>
      </li>
      <hr class="sidebar-divider">
    </ul>
    <!-- Sidebar -->
    <div id="content-wrapper" class="d-flex flex-column">
      <div id="content">
        <!-- TopBar -->
        <nav class="navbar navbar-expand navbar-light bg-navbar topbar mb-4 static-top">
          <button id="sidebarToggleTop" class="btn btn-link rounded-circle mr-3">
            <i class="fa fa-bars"></i>
          </button>
          <ul class="navbar-nav ml-auto">
            <div class="topbar-divider d-none d-sm-block"></div>
            <li class="nav-item dropdown no-arrow">
              <a class="nav-link dropdown-toggle" href="#" id="userDropdown" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                <img class="img-profile rounded-circle" src="<?php
                                                              if ($_SESSION['PROFILE'] == '') {
                                                                echo 'img/user.png';
                                                              } else {
                                                                echo $_SESSION['PROFILE'];
                                                              }
                                                              ?>" style="max-width: 60px">
                <span class="ml-2 d-none d-lg-inline text-white small"><?php echo $_SESSION['FIRST_NAME'];
                                                                        echo ' ';
                                                                        echo $_SESSION['LAST_NAME']; ?></span>
              </a>
              <div class="dropdown-menu dropdown-menu-right shadow animated--grow-in" aria-labelledby="userDropdown">
                <a class="dropdown-item" href="my_account.php">
                  <i class="fas fa-user fa-sm fa-fw mr-2 text-gray-400"></i>
                  Profile
                </a>
                <a class="dropdown-item" href="#">
                  <i class="fas fa-cogs fa-sm fa-fw mr-2 text-gray-400"></i>
                  Settings
                </a>
                <div class="dropdown-divider"></div>
                <a class="dropdown-item" href="javascript:void(0);" data-toggle="modal" data-target="#logoutModal">
                  <i class="fas fa-sign-out-alt fa-sm fa-fw mr-2 text-gray-400"></i>
                  Logout
                </a>
              </div>
            </li>
          </ul>
        </nav>
        <!-- Topbar -->

        <!-- Container Fluid-->
        <div class="container-fluid" id="container-wrapper">
          <div class="d-sm-flex align-items-center justify-content-between mb-4">
            <h1 class="h3 mb-0 text-gray-800">Admin Dashboard</h1>
            <ol class="breadcrumb">
              <li class="breadcrumb-item"><a href="">Home</a></li>
              <li class="breadcrumb-item active" aria-current="page">Dashboard</li>
            </ol>
          </div>

          <div class="row mb-3">
            <!-- Earnings (Monthly) Card Example -->
            <div class="col-xl-3 col-md-6 mb-4">
              <div class="card h-100">
                <div class="card-body">
                  <div class="row align-items-center">
                    <div class="col mr-2">
                      <div class="text-xs font-weight-bold text-uppercase mb-1">Overall Earnings </div>
                      <div class="h5 mb-0 font-weight-bold text-gray-800">
                        <?php
                        $query2 = "SELECT SUM(TOTAL_PURCHASE) FROM purchase_basket where MONTH(DATE_PURCHASED) = MONTH(now()) and YEAR(DATE_PURCHASED) = YEAR(NOW()) and STATUS = 'Completed'
                      ||  MONTH(DATE_PURCHASED) = MONTH(now()) and YEAR(DATE_PURCHASED) = YEAR(NOW()) and STATUS = 'To Receive'
                      ||  MONTH(DATE_PURCHASED) = MONTH(now()) and YEAR(DATE_PURCHASED) = YEAR(NOW()) and STATUS = 'To Ship'
                      ||  MONTH(DATE_PURCHASED) = MONTH(now()) and YEAR(DATE_PURCHASED) = YEAR(NOW()) and STATUS = 'Checkout'";
                        $result2 = mysqli_query($con, $query2);
                        while ($row2 = mysqli_fetch_array($result2)) {

                          $amount = $row2["SUM(TOTAL_PURCHASE)"]; // Replace this with your integer value

                          // Format the integer as currency with two decimal places and a comma as a thousands separator
                          $formattedAmount = number_format($amount, 2, '.', ',');

                          // Output the formatted currency
                          echo '₱' . $formattedAmount; // Add a currency symbol if needed (e.g., '$', '€', '£', etc.)
                        }
                        ?>
                      </div>
                      <div class="mt-2 mb-0 text-muted text-xs">
                        Month of <span id="mSelected"> </span>
                        <script>
                          var currentDate = new Date();
                          var currentMonth = currentDate.getMonth() + 1;
                          var month = document.getElementById("mSelected");
                          // Set the text content of the paragraph
                          if (currentMonth == 1) {
                            month.textContent = 'January';
                          } else {
                            if (currentMonth == 2) {
                              month.textContent = 'February';
                            } else {
                              if (currentMonth == 3) {
                                month.textContent = 'March';
                              } else {
                                if (currentMonth == 4) {
                                  month.textContent = 'April';
                                } else {
                                  if (currentMonth == 5) {
                                    month.textContent = 'May';
                                  } else {
                                    if (currentMonth == 6) {
                                      month.textContent = 'June';
                                    } else {
                                      if (currentMonth == 7) {
                                        month.textContent = 'July';
                                      } else {
                                        if (currentMonth == 8) {
                                          month.textContent = 'August';
                                        } else {
                                          if (currentMonth == 9) {
                                            month.textContent = 'September';
                                          } else {
                                            if (currentMonth == 10) {
                                              month.textContent = 'October';
                                            } else {
                                              if (currentMonth == 11) {
                                                month.textContent = 'November';
                                              } else {
                                                if (currentMonth == 12) {
                                                  month.textContent = 'December';
                                                }
                                              }

                                            }
                                          }
                                        }
                                      }
                                    }
                                  }
                                }

                              }
                            }
                          }
                        </script>
                      </div>
                    </div>
                    <div class="col-auto">
                      <i class="fas fa-shopping-bag fa-2x" style="color: #EEFF01;"></i>
                    </div>
                  </div>
                </div>
              </div>
            </div>
            <!-- Earnings (Annual) Card Example -->
            <div class="col-xl-3 col-md-6 mb-4">
              <div class="card h-100">
                <div class="card-body">
                  <div class="row no-gutters align-items-center">
                    <div class="col mr-2">
                      <div class="text-xs font-weight-bold text-uppercase mb-1">Yearly Sales <br><span id="ySelected"></span></div>
                      <script>
                        var currentDate = new Date();
                        var currentYear = currentDate.getFullYear();
                        var yr = document.getElementById("ySelected");
                        yr.textContent = currentYear;
                      </script>
                      <div class="h5 mb-0 font-weight-bold text-gray-800"> <?php
                                                                            $query2 = "SELECT SUM(TOTAL_PURCHASE) FROM purchase_basket where YEAR(DATE_PURCHASED) = YEAR(NOW()) and STATUS = 'Completed'
                      ||  YEAR(DATE_PURCHASED) = YEAR(NOW()) and STATUS = 'To Receive'
                      ||  YEAR(DATE_PURCHASED) = YEAR(NOW()) and STATUS = 'To Ship'
                      ||  YEAR(DATE_PURCHASED) = YEAR(NOW()) and STATUS = 'Checkout'";
                                                                            $result2 = mysqli_query($con, $query2);
                                                                            while ($row2 = mysqli_fetch_array($result2)) {

                                                                              $amount = $row2["SUM(TOTAL_PURCHASE)"]; // Replace this with your integer value

                                                                              // Format the integer as currency with two decimal places and a comma as a thousands separator
                                                                              $formattedAmount = number_format($amount, 2, '.', ',');

                                                                              // Output the formatted currency
                                                                              echo '₱' . $formattedAmount; // Add a currency symbol if needed (e.g., '$', '€', '£', etc.)
                                                                            }
                                                                            ?></div>
                      <div class="mt-2 mb-0 text-muted text-xs">
                      </div>
                    </div>
                    <div class="col-auto">
                      <i class="fas fa-shopping-cart fa-2x text-success"></i>
                    </div>
                  </div>
                </div>
              </div>
            </div>
            <!-- New User Card Example -->
            <div class="col-xl-3 col-md-6 mb-4">
              <div class="card h-100">
                <div class="card-body">
                  <div class="row no-gutters align-items-center">
                    <div class="col mr-2">
                      <div class="text-xs font-weight-bold text-uppercase mb-1">User Registered</div>
                      <div class="h5 mb-0 mr-3 font-weight-bold text-gray-800">
                        <?php
                        $query2 = "SELECT COUNT(ID) FROM user_account";
                        $result2 = mysqli_query($con, $query2);
                        while ($row2 = mysqli_fetch_array($result2)) {
                          echo $row2["COUNT(ID)"];;
                        }
                        ?>
                      </div>
                      <div class="mt-2 mb-0 text-muted text-xs">
                        As of Today
                      </div>
                    </div>
                    <div class="col-auto">
                      <i class="fas fa-users fa-2x text-info"></i>
                    </div>
                  </div>
                </div>
              </div>
            </div>
            <!-- Pending Requests Card Example -->
            <div class="col-xl-3 col-md-6 mb-4">
              <div class="card h-100">
                <div class="card-body">
                  <div class="row no-gutters align-items-center">
                    <div class="col mr-2">
                      <div class="text-xs font-weight-bold text-uppercase mb-1">Number of Registered Store</div>
                      <div class="h5 mb-0 font-weight-bold text-gray-800">
                        <?php
                        $query2 = "SELECT COUNT(ID) FROM sellers_information";
                        $result2 = mysqli_query($con, $query2);
                        while ($row2 = mysqli_fetch_array($result2)) {

                          echo $row2["COUNT(ID)"];
                        }
                        ?>
                      </div>
                      <div class="mt-2 mb-0 text-muted text-xs">

                      </div>
                    </div>
                    <div class="col-auto">
                      <i class="fa fa-store fa-2x text-warning"></i>
                    </div>
                  </div>
                </div>
              </div>
            </div>

            <!-- Area Chart -->
            <div class="col-xl-8 col-lg-7">
              <div class="card mb-4">
                <div class="card-header py-3 d-flex flex-row align-items-center justify-content-between">
                  <h6 class="m-0 font-weight-bold text-primary">Monthly Sales Report</h6>

                </div>
                <div class="card-body">
                  <div class="chart-area">
                    <canvas id="myAreaChartA"></canvas>
                  </div>
                </div>
              </div>
            </div>
            <!-- Pie Chart -->
            <div class="col-xl-4 col-lg-5">
              <div class="card mb-4">
                <div class="card-header py-3 d-flex flex-row align-items-center justify-content-between">
                  <h6 class="m-0 font-weight-bold text-primary">Store Sales Status</h6><br><br><br>
                  
                </div>
                <div class="card-body">

                <canvas id="myAreaChartB"></canvas>
                </div>
                <div class="card-footer text-center">
                  <br><br><br>      
              </div>
              </div>
            </div>

            <!-- table for selling product-->
            <div class="col-xl-12 col-lg-12 mb-4">
              <div class="card">
                <div class="card-header py-3 d-flex flex-row align-items-center justify-content-between">
                  <h6 class="m-0 font-weight-bold text-primary">Selling Product Daily Status</h6>
                </div>
                <div class="table-responsive" style="height:400px">
                  <table class="table align-items-center table-flush text-center">
                    <thead class="thead-light">
                      <tr>
                        <th>Image</th>
                        <th>Product Name</th>
                        <th>Item Price</th>
                        <th># of Sold Items</th>
                      </tr>
                    </thead>
                    <tbody>
                      <?php
                      $query = "SELECT COUNT(ID) AS ids, PRODUCT_NAME, ITEM_PRICE, ITEM_IMAGE FROM  purchase_basket GROUP BY PRODUCT_NAME";
                      $resultTableH = mysqli_query($con, $query);
                      ?>
                      <?php
                      while ($row = mysqli_fetch_array($resultTableH)) {
                      ?>
                        <tr>
                        <td><img src="<?php echo $row['ITEM_IMAGE'] ?>" width="50px" alt=""></td>
                          <td><?php echo $row['PRODUCT_NAME'] ?></td>
                          <td><?php echo $row['ITEM_PRICE'] ?></td>
                          <td class="text-center"><?php echo $row['ids'] ?></td>
                        </tr>
                      <?php
                      } ?>
                    </tbody>
                  </table>
                </div>
                <div class="card-footer"></div>
              </div>
            </div>
            <!-- Bar Chart -->
            <div class="col-lg-8">
              <div class="card shadow mb-4">
                <div class="card-header py-3">
                  <h6 class="m-0 font-weight-bold text-primary">BUY AND SELL PERFORMANCE ACTIVITY</h6>
                </div>
                <div class="card-body">
                  <div class="chart-bar">
                  <div id="reportsChart"></div>
                  <canvas id="myBarChartC"></canvas>
                  
                  </div>
                  <hr>
                </div>
              </div>
            </div>
            <!-- Donut Chart -->
            <div class="col-lg-4">
            <div class="card">
                <div class="card-header py-3 d-flex flex-row align-items-center justify-content-between">
                  <h6 class="m-0 font-weight-bold text-primary">5 Top Customer</h6>
                </div>
                <div class="table-responsive" style="height:370px">
                  <table class="table align-items-center table-flush">
                    <thead class="thead-light">
                      <tr>
                        <th>Customer Name</th>
                        <th>Number of Purchase</th>
                      </tr>
                    </thead>
                    <tbody>
                      <?php
                      $query = "SELECT DISTINCT PURCHASED_BY, COUNT(IF(STATUS = 'Completed',1, null)) as id2 FROM  purchase_basket GROUP BY PURCHASED_BY ORDER BY COUNT(IF(STATUS = 'Completed',1, null)) LIMIT 5";
                      $resultTableH = mysqli_query($con, $query);
                      ?>
                      <?php
                      while ($row = mysqli_fetch_array($resultTableH)) {
                      ?>
                        <tr>
                          <td><?php echo $row['PURCHASED_BY'] ?></td>
                          <td><?php echo $row['id2'] ?></td>
                        </tr>
                      <?php
                      } ?>
                    </tbody>
                  </table>
                </div>
                <div class="card-footer"></div>
              </div>
            </div>

          </div>
          <!--Row-->



          <!-- Modal Logout -->
          <div class="modal fade" id="logoutModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabelLogout" aria-hidden="true">
            <div class="modal-dialog" role="document">
              <div class="modal-content">
                <div class="modal-header">
                  <h5 class="modal-title" id="exampleModalLabelLogout">Ohh No!</h5>
                  <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                  </button>
                </div>
                <div class="modal-body">
                  <p>Are you sure you want to logout?</p>
                </div>
                <div class="modal-footer">
                  <button type="button" class="btn btn-outline-primary" data-dismiss="modal">Cancel</button>
                  <a href="../index.php" class="btn btn-primary">Logout</a>
                </div>
              </div>
            </div>
          </div>

        </div>
        <!---Container Fluid-->
      </div>
      <!-- Footer -->
      <footer class="sticky-footer bg-white">
        <div class="container my-auto">
          <div class="copyright text-center my-auto">
            <span>COPYRIGHT &copy; <script>
                document.write(new Date().getFullYear());
              </script> All rights reserved.
          </div>
        </div>


      </footer>
      <!-- Footer -->
    </div>
  </div>

  <!-- Scroll to top -->
  <a class="scroll-to-top rounded" href="#page-top">
    <i class="fas fa-angle-up"></i>
  </a>

  <script src="vendor/jquery/jquery.min.js"></script>
  <script src="vendor/bootstrap/js/bootstrap.bundle.min.js"></script>
  <script src="vendor/jquery-easing/jquery.easing.min.js"></script>
  <script src="js/ruang-admin.min.js"></script>
  <script src="vendor/chart.js/Chart.min.js"></script>
  <script src="js/demo/chart-area-demo.js"></script>
  <script src="js/demo/chart-pie-demo.js"></script>
  <script src="js/demo/chart-bar-demo.js"></script>
</body>

</html>

<script>
  $.ajax({
    url: "php/admin/bargraph.php",
    method: "GET",
    success: function(data) {
      console.log(data);
      var month = [];
      var total_amount = [];

      for (var i in data) {
        month.push(data[i].month);
        total_amount.push(data[i].total_amount);
      }


      var ctx = document.getElementById("myAreaChartA");
      var myLineChart = new Chart(ctx, {
        type: 'line',
        data: {
          labels: [month],
          datasets: [{
            label: "Earnings",
            lineTension: 0.3,
            backgroundColor: "rgba(78, 115, 223, 0.2)",
            borderColor: "rgba(78, 115, 223, 1)",
            pointRadius: 3,
            pointBackgroundColor: "rgba(238, 255, 1, 2)",
            pointBorderColor: "rgba(78, 115, 223, 1)",
            pointHoverRadius: 3,
            pointHoverBackgroundColor: "rgba(78, 115, 223, 1)",
            pointHoverBorderColor: "rgba(78, 115, 223, 1)",
            pointHitRadius: 10,
            pointBorderWidth: 2,
            data: [total_amount],
          }],
        },
        options: {
          maintainAspectRatio: false,
          layout: {
            padding: {
              left: 10,
              right: 25,
              top: 25,
              bottom: 0
            }
          },
          scales: {
            xAxes: [{
              time: {
                unit: 'date'
              },
              gridLines: {
                display: false,
                drawBorder: false
              },
              ticks: {
                maxTicksLimit: 7
              }
            }],
            yAxes: [{
              ticks: {
                maxTicksLimit: 5,
                padding: 10,
                // Include a dollar sign in the ticks
                callback: function(value, index, values) {
                  return '₱' + number_format(value);
                }
              },
              gridLines: {
                color: "rgb(234, 236, 244)",
                zeroLineColor: "rgb(234, 236, 244)",
                drawBorder: false,
                borderDash: [2],
                zeroLineBorderDash: [2]
              }
            }],
          },
          legend: {
            display: false
          },
          tooltips: {
            backgroundColor: "rgb(255,255,255)",
            bodyFontColor: "#858796",
            titleMarginBottom: 10,
            titleFontColor: '#6e707e',
            titleFontSize: 14,
            borderColor: '#dddfeb',
            borderWidth: 1,
            xPadding: 15,
            yPadding: 15,
            displayColors: false,
            intersect: false,
            mode: 'index',
            caretPadding: 10,
            callbacks: {
              label: function(tooltipItem, chart) {
                var datasetLabel = chart.datasets[tooltipItem.datasetIndex].label || '';
                return datasetLabel + ': ₱' + number_format(tooltipItem.yLabel);
              }
            }
          }
        }
      });
    },
    error: function(data) {
      console.log(data);
    }
  });


  // Function to fetch data using AJAX
  function fetchData() {
        var xhr = new XMLHttpRequest();

        xhr.onreadystatechange = function () {
            if (xhr.readyState == 4 && xhr.status == 200) {
                var data = JSON.parse(xhr.responseText);
                createBarGraph(data);
            }
        };

        xhr.open("GET", "php/admin/storegraph.php", true);
        xhr.send();
    }

    // Function to create a bar graph using Chart.js
    function createBarGraph(data) {
        var ctx = document.getElementById('myAreaChartB').getContext('2d');

        var myBarChart = new Chart(ctx, {
            type: 'doughnut',
            data: {
                labels: data.labels,
                datasets: [{
                    label: 'Total Amount',
                    data: data.totalAmounts,
                    backgroundColor: ['#4e73df', '#1cc88a', '#36b9cc'],
                    borderColor: 'rgba(75, 192, 192, 1)',
                    borderWidth: 1
                }]
            },
            options: {
                scales: {
                    y: {
                        beginAtZero: true
                    }
                }
            }
        });
    }

    // Fetch data when the page loads
    window.onload = fetchData;

  
  $.ajax({
  url: "php/admin/itemgraph.php",
  method: "GET",
  success: function(data) {
    console.log(data); // Verify the structure of the received data
    
    // Initialize arrays to store labels and data for Chart.js
    var statuses = [];
    var completedCounts = [];
    var checkoutCounts = [];
    var trCounts = [];
    var wishlistCounts = [];
    var cancelledCounts = [];
    var returnedCounts = [];

    // Loop through the received data to extract status labels and counts
    for (var i = 0; i < data.length; i++) {
      statuses.push(data[i].STATUS);
      completedCounts.push(data[i].id2_open);
      checkoutCounts.push(data[i].id3_close);
      trCounts.push(data[i].id4_close);
      wishlistCounts.push(data[i].id5_close);
      cancelledCounts.push(data[i].id6_close);
      returnedCounts.push(data[i].id7_close);
    }

    // Create the Chart.js data object
    var areaData = {
      labels: statuses,
      datasets: [
        {
          label: 'Completed',
          data: completedCounts,
          borderColor: 'green',
          borderWidth: 2,
          backgroundColor: 'rgb(12, 91, 10, 0.8)'
        },
        {
          label: 'Checkout',
          data: checkoutCounts,
          borderColor: 'darkblue',
          borderWidth: 2,
          backgroundColor: 'rgb(10, 77, 91, 0.8)'
        },
        {
          label: 'To Receive',
          data: trCounts,
          borderColor: 'blue',
          borderWidth: 2,
          backgroundColor: 'rgb(15, 242, 195, 0.8)'
        },
        {
          label: 'Returned',
          data: returnedCounts,
          borderColor: 'pink',
          borderWidth: 2,
          backgroundColor: 'rgb(242, 15, 108, 0.8)'
        },
        {
          label: 'Added to Cart',
          data: wishlistCounts,
          borderColor: 'yellow',
          borderWidth: 2,
          backgroundColor: 'rgb(242, 211, 15, 0.8)'
        },
        {
          label: 'Cancelled',
          data: cancelledCounts,
          borderColor: 'red',
          borderWidth: 2,
          backgroundColor: 'rgb(229, 19, 35, 0.8)'
        }
      ]
    };

    // Chart.js options
    var areaOptions = {
      // ... Your chart options (scales, legend, etc.)
    };

    // Create the Chart.js chart
    var revenueChartCanvas = $("#myBarChartC").get(0).getContext("2d");
    var revenueChart = new Chart(revenueChartCanvas, {
      type: 'bar',
      data: areaData,
      options: areaOptions
    });
  },
  error: function(data) {
    console.log(data);
  }
});


</script>


        