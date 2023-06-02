<?php
session_start();
if (!isset($_SESSION['user']) || $_SESSION['role'] != 'Admin') {
      header('Location: http://localhost:8080/wpw/proyek');
}
?>

<!DOCTYPE html>
<html lang="en">

<head>
      <meta charset="UTF-8">
      <meta http-equiv="X-UA-Compatible" content="IE=edge">
      <meta name="viewport" content="width=device-width, initial-scale=1.0">
      <title>Input User</title>
      <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-KK94CHFLLe+nY2dmCWGMq91rCGa5gtU4mk92HdvYe+M/SXH301p5ILy+dN9+nJOZ" crossorigin="anonymous">
      <style>
            body {
                  display: flex;
                  justify-content: center;
                  align-items: center;
                  height: 100%;
                  background-color: #009BE6;
            }

            .form-container {
                  min-width: 120vh;
                  margin-top: 15px;
            }
      </style>
</head>

<body>
      <div class="form-container ">
            <div class="card login-card p-3 shadow-lg">
                  <div class="card-body ">
                        <div class="row">
                              <h3 class="text-center fw-bold">Registrasi User</h3>
                        </div>
                        <form method="POST">
                              <div class="row mb-1">
                                    <label for="exampleInputiId" class="col-sm-5 col-form-label">Id Pengguna</label>
                                    <div class="col-sm-15">
                                          <input type="text" class="form-control" id="exampleInputId" name="id">
                                    </div>
                              </div>
                              <div class="row mb-1">
                                    <label for="exampleInputNama" class="col-sm-5 col-form-label">Nama</label>
                                    <div class="col-sm-15">
                                          <input type="text" class="form-control" id="exampleInputNama" name="nama">
                                    </div>
                              </div>
                              <div class="row mb-1">
                                    <label for="exampleInputUname" class="col-sm-5 col-form-label">Username</label>
                                    <div class="col-sm-15">
                                          <input type="text" class="form-control" id="exampleInputUname" name="uname">
                                    </div>
                              </div>
                              <div class="row mb-1">
                                    <label for="exampleInputPassword" class="col-sm-5 col-form-label">Password</label>
                                    <div class="col-sm-15">
                                          <input type="password" class="form-control" id="exampleInputPassword" name="passwd">
                                    </div>
                              </div>
                              <div class="row mb-1">
                                    <label for="exampleInputTelepon" class="col-sm-5 col-form-label">Telepon</label>
                                    <div class="col-sm-15">
                                          <div class="input-group">
                                                <span class="input-group-text">+62</span>
                                                <input type="number" class="form-control" id="exampleInputTelepon" name="telp">
                                          </div>
                                    </div>
                              </div>
                              <div class="row mb-3">
                                    <label class="col-sm-5 col-form-label">Role</label>
                                    <div class="col-sm-10 d-flex " style="padding-left: 0px;">
                                          <div class="form-check" style="margin-left: 12px;">
                                                <input type="radio" class="form-check-input" id="adminRadio" name="role" value="Admin">
                                                <label class="form-check-label mr-3" for="adminRadio">Admin</label>
                                          </div>
                                          <div class="form-check" style="margin-left: 20px;">
                                                <input type="radio" class="form-check-input" id="mahasiswaRadio" name="role" value="Dosen">
                                                <label class="form-check-label" for="mahasiswaRadio">Dosen</label>
                                          </div>
                                          <div class="form-check" style="margin-left: 20px;">
                                                <input type="radio" class="form-check-input" id="mahasiswaRadio" name="role" value="Mahasiswa">
                                                <label class="form-check-label" for="mahasiswaRadio">Mahasiswa</label>
                                          </div>
                                    </div>
                              </div>
                              <button type="submit" class="btn btn-primary tombol" name="login" formaction="input-pengguna.php">Submit</button>
                              <button type="reset" class="btn btn-danger tombol" style="margin-left:10px;"> &#160;Clear &#160;</button>
                              <button type="" class="btn btn-secondary tombol" style="margin-left:10px;"><a href="../userman/" class="text-white" style="text-decoration:none">&#160; Back &#160;</a></button>
                  </div>
                  </form>
            </div>
      </div>
      </div>
      <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.11.7/dist/umd/popper.min.js" integrity="sha384-zYPOMqeu1DAVkHiLqWBUTcbYfZ8osu1Nd6Z89ify25QV9guujx43ITvfi12/QExE" crossorigin="anonymous"></script>
      <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha3/dist/js/bootstrap.min.js" integrity="sha384-Y4oOpwW3duJdCWv5ly8SCFYWqFDsfob/3GkgExXKV4idmbt98QcxXYs9UoXAB7BZ" crossorigin="anonymous"></script>
</body>

</html>

<?php
include '../connection.php';
if (isset($_POST['login'])) {
      try {
            $id = $_POST['id'];
            $nama = $_POST['nama'];
            $uname = $_POST['uname'];
            $passwd = md5($_POST['passwd']);
            $telp = $_POST['telp'];
            $telp = '+62' . $telp;
            $role = $_POST['role'];

            $connect->exec("USE proyek");
            $query = "INSERT INTO user (
        id_user, nama_user, username, password, telepon ,user_role
        ) VALUES (
        :id, :nama, :uname, :passwd, :telp , :role
        )";

            $stmt = $connect->prepare($query);
            $stmt->bindParam(':id', $id);
            $stmt->bindParam(':nama', $nama);
            $stmt->bindParam(':uname', $uname);
            $stmt->bindParam(':passwd', $passwd);
            $stmt->bindParam(':telp', $telp);
            $stmt->bindParam(':role', $role);
            $stmt->execute();
            echo "<script>alert('Update Successfully')</script>";
      } catch (PDOException $e) {
            echo $e->getMessage();
      }
      $connect = null;
}
?>