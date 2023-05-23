<!DOCTYPE html>
<html lang="en">

<head>
      <meta charset="UTF-8">
      <meta http-equiv="X-UA-Compatible" content="IE=edge">
      <meta name="viewport" content="width=device-width, initial-scale=1.0">
      <title>SMART-ILS</title>
      <link href="css/bootstrap.min.css" rel="stylesheet">

      <!-- font -->
      <link href="https://fonts.googleapis.com/css2?family=Ubuntu&display=swap" rel="stylesheet">
      <link href="https://fonts.googleapis.com/css2?family=Viga&display=swap" rel="stylesheet">
      <link rel="stylesheet" href="https://fonts.googleapis.com/css2?family=Material+Symbols+Outlined:opsz,wght,FILL,GRAD@48,400,0,0" />
      <!-- <link rel="stylesheet/less" type="text/css" href="scss/index.scss"> -->
      <style>
            *,
            *:before,
            *:after {
                  box-sizing: border-box;
                  margin: 0;
                  padding: 0;
            }

            a {
                  text-decoration: none;
            }

            .progress-pie-chart {
                  width: 200px;
                  height: 200px;
                  border-radius: 50%;
                  background-color: #E5E5E5;
                  position: relative;
            }

            .progress-pie-chart.gt-50 {
                  background-color: #81CE97;
            }

            .ppc-progress {
                  content: "";
                  position: absolute;
                  border-radius: 50%;
                  left: calc(50% - 100px);
                  top: calc(50% - 100px);
                  width: 200px;
                  height: 200px;
                  clip: rect(0, 200px, 200px, 100px);
            }

            .ppc-progress .ppc-progress-fill {
                  content: "";
                  position: absolute;
                  border-radius: 50%;
                  left: calc(50% - 100px);
                  top: calc(50% - 100px);
                  width: 200px;
                  height: 200px;
                  clip: rect(0, 100px, 200px, 0);
                  background: #81CE97;
                  transform: rotate(60deg);
            }

            .gt-50 .ppc-progress {
                  clip: rect(0, 100px, 200px, 0);
            }

            .gt-50 .ppc-progress .ppc-progress-fill {
                  clip: rect(0, 200px, 200px, 100px);
                  background: #E5E5E5;
            }

            .ppc-percents {
                  content: "";
                  position: absolute;
                  border-radius: 50%;
                  left: calc(50% - 173.9130434783px/2);
                  top: calc(50% - 173.9130434783px/2);
                  width: 173.9130434783px;
                  height: 173.9130434783px;
                  background: #fff;
                  text-align: center;
                  display: table;
            }

            .ppc-percents span {
                  display: block;
                  font-size: 2.6em;
                  font-weight: bold;
                  color: #81CE97;
            }

            .pcc-percents-wrapper {
                  display: table-cell;
                  vertical-align: middle;
            }

            body {
                  font-family: 'Viga';
                  background: #f7f7f7;
            }

            .progress-pie-chart {
                  margin: 50px auto 0;
            }

            .table-view {
                  height: 300px;
            }

            table {
                  max-height: 300px;
            }

            .menu-dashboard {
                  background-color: #354458;
                  width: 22%;
                  height: 100vh;
                  position: sticky;
                  color: white;
                  padding: 0px;
            }

            .user {
                  width: 70%;
                  height: 45px;
                  background-color: aqua;
            }

            .bar {
                  background-color: #44a0dc;
                  z-index: 999;
                  padding-right: 70px;
                  padding-left: 70px;
            }

            .navigasi button:hover,
            .navigasi .fitur:hover {
                  background-color: #28333e;
            }
      </style>
      <script>
            $(document).ready(function() {
                  $("#myModal").modal('show')
            })
      </script>
</head>

<body class="">
      <div class="container-fluid">
            <div class="bar fixed-top shadow d-flex justify-content-between align-items-center" style="height: 50px; " data-bs-theme="dark">
                  <h4 class=" text-white mt-2">SLELS</h4>
                  <p class="text-white mt-3">
                        <?php if (isset($_COOKIE['user'])) :
                              echo $_COOKIE['user'];
                        endif ?></p>
            </div>

            <div class=" row">
                  <div class="col-3 menu-dashboard rounded-end shadow d-flex justify-content-center flex-column align-content-between">
                        <div class="user rounded-pill">
                              <?php
                              if (isset($_COOKIE['user'])) :
                                    $user = $_COOKIE['user']; ?>
                                    <h3>
                                          <?php echo $user; ?>
                                    </h3>
                              <?php endif; ?>
                        </div>
                        <div class="d-flex flex-column justify-content-center text-center navigasi">
                              <a class="nav-link active" aria-current="page" href="#">Home</a>
                              <?php
                              if (isset($_COOKIE['user'])) : ?>
                                    <div class="btn fitur"><a class="" href="#">Data Peminjaman</a></div>
                                    <a class="nav-link" href="#">Manajemen Peralatan</a>
                                    <a class="nav-link" href="#">Manajemen Pengguna</a>
                                    <form method="post" class="d-flex justify-content-center">
                                          <button name="logout" type="submit" formaction="login/index.php" class="btn text-white d-flex align-items-center justify-content-center" style="border-radius:0px; height:50px;width: 100%;">
                                                <span class="material-symbols-outlined">
                                                      logout
                                                </span>Logout
                                          </button>
                                    </form>
                              <?php endif ?>
                        </div>
                  </div>
                  <div class="col-9">
                        <!-- <div class="progress-pie-chart" data-percent="43">
                              <div class="ppc-progress">
                                    <div class="ppc-progress-fill"></div>
                              </div>
                              <div class="ppc-percents">
                                    <div class="pcc-percents-wrapper">
                                          <span>43%</span>
                                    </div>
                              </div>
                        </div> -->
                        <div class="table-view overflow-auto">
                              <table class="table">
                                    <thead>
                                          <tr>
                                                <th scope="col">#</th>
                                                <th scope="col">First</th>
                                                <th scope="col">Last</th>
                                                <th scope="col">Handle</th>
                                          </tr>
                                    </thead>
                                    <tbody>
                                          <tr>
                                                <th scope="row">1</th>
                                                <td>Mark</td>
                                                <td>Otto</td>
                                                <td>@mdo</td>
                                          </tr>
                                          <tr>
                                                <th scope="row">2</th>
                                                <td>Jacob</td>
                                                <td>Thornton</td>
                                                <td>@fat</td>
                                          </tr>
                                          <tr>
                                                <th scope="row">3</th>
                                                <td colspan="2">Larry the Bird</td>
                                                <td>@twitter</td>
                                          </tr>
                                    </tbody>
                              </table>
                        </div>
                  </div>
            </div>
      </div>
      <?php
      if (isset($_POST['logout'])) {
            setcookie('user', '', time() - 100, 'login/');
            header('location: http://localhost:8080/wpw/proyek/login');
      }
      ?>
      <script src="js/bootstrap.bundle.min.js"></script>
      <script src="js/jquery-3.6.1.min.js"></script>
      <script src="js/index.js"></script>
</body>

</html>