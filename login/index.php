<?php
session_start();
if (isset($_SESSION['user'])) {
      header('location: http://localhost:8080/wpw/proyek');
}
?>
<!DOCTYPE html>
<html lang="en">

<head>
      <meta charset="UTF-8">
      <meta http-equiv="X-UA-Compatible" content="IE=edge">
      <meta name="viewport" content="width=device-width, initial-scale=1.0">
      <title>Login</title>
      <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha3/dist/css/bootstrap.min.css">
      <link href="https://fonts.googleapis.com/css2?family=Ubuntu&display=swap" rel="stylesheet">
      <style>
            body {
                  font-family: 'Ubuntu', sans-serif;
                  background-color: #009BE6;
            }

            .login-card {
                  width: 40%;
                  margin-top: 10%;
                  border-radius: 6px;
                  border: none;
                  background-color: #FDFDFD;
            }

            .tombol {
                  box-shadow: 2px 2px 7px rgba(0, 0, 0, .6);
            }

            input {
                  background-color: #FDFDFD;
                  outline: 1px solid #ccc;
            }
      </style>
</head>

<body>
      <div class="container d-flex justify-content-center align-items-center mt-1">
            <div class="card login-card p-3 shadow-lg">
                  <div class="card-body">
                        <div class="row">
                              <h3 class="text-center fw-bold">E - ITMS</h3>
                        </div>
                        <div class="row">
                              <form method="post">
                                    <div class="mb-3">
                                          <label for="username" class="form-label">Username</label>
                                          <input type="text" name="username" class="form-control" id="username" aria-describedby="emailHelp">
                                    </div>
                                    <div class="mb-3">
                                          <label for="exampleInputPassword1" class="form-label">Password</label>
                                          <input type="password" name="password" class="form-control" id="exampleInputPassword1">
                                    </div>
                                    <div class="mb-3 form-check">
                                          <input type="checkbox" value="yes" name="remember" class="form-check-input" id="exampleCheck1">
                                          <label class="form-check-label" for="exampleCheck1">Remember me</label>
                                    </div>
                                    <button type="submit" class="btn btn-primary tombol" name="login" formaction="index.php">Login</button>
                                    <button type="reset" class="btn btn-danger tombol" style="margin-left:10px;"> &#160;Clear &#160;</button>
                                    <button type="" class="btn btn-secondary tombol" style="margin-left:10px;"><a href="../" class="text-white" style="text-decoration:none">&#160; Back &#160;</a></button>
                              </form>
                        </div>
                  </div>
            </div>
      </div>

      <?php
      // session_start();
      include '../connection.php';
      if (isset($_POST['login'])) {
            try {
                  $cookieAct;
                  $username = $_POST['username'];
                  $passwd = md5($_POST['password']);
                  $connect->exec("USE proyek");
                  $query = "SELECT * FROM user WHERE username = :username AND password = :passwd";
                  $statement = $connect->prepare($query);
                  $statement->bindParam(':username', $username);
                  $statement->bindParam(':passwd', $passwd);
                  $statement->execute();

                  $count = $statement->rowCount();
                  if ($count > 0) {
                        $sesStmnt = "SELECT nama_user FROM user WHERE username = :username";
                        $name = $connect->prepare($sesStmnt);
                        $name->bindParam(':username', $username);
                        $name->execute();
                        $selectedName = $name->fetchColumn();
                        $_SESSION['user'] = $selectedName;
                        $roleStmnt = "SELECT user_role FROM user WHERE username = :username";
                        $stmnt = $connect->prepare($roleStmnt);
                        $stmnt->bindParam(':username', $username);
                        $stmnt->execute();
                        $role = $stmnt->fetchColumn();
                        $_SESSION['role'] = $role;
                        $idStmnt = "SELECT id_user FROM user WHERE username = :username";
                        $stmnt = $connect->prepare($idStmnt);
                        $stmnt->bindParam(':username', $username);
                        $stmnt->execute();
                        $id = $stmnt->fetchColumn();
                        $_SESSION['id'] = $id;

                        if (isset($_POST['remember'])) {
                              $cookieAct = $_POST['remember'];
                        }
                        if ($cookieAct === "yes") {
                              setcookie('user', $username, time() + 900,  '/');
                        }
                        header('location:  http://localhost:8080/wpw/proyek');
                  } else {
                        echo "<script>alert(\"Username atau password salah!\") </script>";
                  }
            } catch (PDOException $e) {
                  echo $e->getMessage();
            }
      }
      ?>
</body>

</html>