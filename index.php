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
      <link rel="stylesheet" href="https://fonts.googleapis.com/css2?family=Material+Symbols+Outlined:opsz,wght,FILL,GRAD@48,400,0,0" />
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

            body {
                  font-family: 'Viga';
                  background: #f7f7f7;
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

            .fitur {
                  height: 55px;
                  border-radius: 0px;
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
                        <div class="d-flex flex-column justify-content-center text-center navigasi">
                              <a class="nav-link active" aria-current="page" href="#">Home</a>
                              <?php
                              if (isset($_COOKIE['user'])) : ?>

                                    <div class="btn fitur d-flex justify-content-center align-items-center"><span class="text-white  material-symbols-outlined">
                                                edit_note
                                          </span><a class="text-white align-items-center" href="#">&#160;Data Peminjaman</a></div>
                                    <div class="btn fitur d-flex justify-content-center align-items-center"><span class="text-white  material-symbols-outlined">
                                                home_repair_service
                                          </span><a class="text-white align-items-center" href="#">&#160;Manajemen Peralatan</a></div>
                                    <div class="btn fitur d-flex justify-content-center align-items-center"><span class="text-white  material-symbols-outlined">
                                                manage_accounts
                                          </span><a class="text-white align-items-center" href="#">&#160;Manajemen Pengguna</a></div>
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