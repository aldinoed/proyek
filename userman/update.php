<!DOCTYPE html>
<html lang="en">

<head>
      <meta charset="UTF-8">
      <meta http-equiv="X-UA-Compatible" content="IE=edge">
      <meta name="viewport" content="width=device-width, initial-scale=1.0">
      <title>Document</title>
      <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-KK94CHFLLe+nY2dmCWGMq91rCGa5gtU4mk92HdvYe+M/SXH301p5ILy+dN9+nJOZ" crossorigin="anonymous">
      <link rel="stylesheet" href="https://code.jquery.com/jquery-3.3.1.slim.min.js">
      <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/twitter-bootstrap/4.3.1/js/bootstrap.bundle.min.js">
      <link rel="stylesheet" href="https://fonts.googleapis.com/css2?family=Material+Symbols+Outlined:opsz,wght,FILL,GRAD@48,400,0,0" />
      <style>
            body {
                  display: flex;
                  justify-content: center;
                  align-items: center;
                  background-color: #009BE6;
            }

            .form-container {
                  min-width: 120vh;
                  margin-top: 15px;
                  height: 1000%;
            }
      </style>
</head>

<body>
      <div class="form-container">
            <div class="card login-card p-3 shadow-lg">
                  <div class="card-body">
                        <div class="row">
                              <h3 class="text-center fw-bold">Update User</h3>
                        </div>
                        <form method="POST">
                              <div class="row mb-1">
                                    <label for="exampleInputiId" class="col-sm-5 col-form-label">Id Pengguna</label>
                                    <div class="col-sm-8">
                                          <input disabled type="text" class="form-control" id="InputId" name="id">
                                    </div>
                                    <div class="col">
                                          <button type="button" class="btn btn-warning update" name="update" value="" onclick="toggleForm('InputId')"><svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="bi bi-pencil-square" viewBox="0 0 16 16">
                                                      <path d="M15.502 1.94a.5.5 0 0 1 0 .706L14.459 3.69l-2-2L13.502.646a.5.5 0 0 1 .707 0l1.293 1.293zm-1.75 2.456-2-2L4.939 9.21a.5.5 0 0 0-.121.196l-.805 2.414a.25.25 0 0 0 .316.316l2.414-.805a.5.5 0 0 0 .196-.12l6.813-6.814z" />
                                                      <path fill-rule="evenodd" d="M1 13.5A1.5 1.5 0 0 0 2.5 15h11a1.5 1.5 0 0 0 1.5-1.5v-6a.5.5 0 0 0-1 0v6a.5.5 0 0 1-.5.5h-11a.5.5 0 0 1-.5-.5v-11a.5.5 0 0 1 .5-.5H9a.5.5 0 0 0 0-1H2.5A1.5 1.5 0 0 0 1 2.5v11z" />
                                                </svg></button>
                                    </div>
                              </div>

                              <div class="row mb-1">
                                    <label for="exampleInputNama" class="col-sm-5 col-form-label">Nama</label>
                                    <div class="col-sm-8">
                                          <input disabled type="text" class="form-control" id="InputNama" name="nama">
                                    </div>
                                    <div class="col">
                                          <button type="button" onclick="toggleForm('InputNama')" class="btn btn-warning update2" name="update" value=""><svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="bi bi-pencil-square" viewBox="0 0 16 16">
                                                      <path d="M15.502 1.94a.5.5 0 0 1 0 .706L14.459 3.69l-2-2L13.502.646a.5.5 0 0 1 .707 0l1.293 1.293zm-1.75 2.456-2-2L4.939 9.21a.5.5 0 0 0-.121.196l-.805 2.414a.25.25 0 0 0 .316.316l2.414-.805a.5.5 0 0 0 .196-.12l6.813-6.814z" />
                                                      <path fill-rule="evenodd" d="M1 13.5A1.5 1.5 0 0 0 2.5 15h11a1.5 1.5 0 0 0 1.5-1.5v-6a.5.5 0 0 0-1 0v6a.5.5 0 0 1-.5.5h-11a.5.5 0 0 1-.5-.5v-11a.5.5 0 0 1 .5-.5H9a.5.5 0 0 0 0-1H2.5A1.5 1.5 0 0 0 1 2.5v11z" />
                                                </svg></button>
                                    </div>
                              </div>
                              <div class="row mb-1">
                                    <label for="exampleInputUname" class="col-sm-5 col-form-label">Username</label>
                                    <div class="col-sm-8">
                                          <input disabled type="text" class="form-control" id="InputUname" name="uname">
                                    </div>
                                    <div class="col">
                                          <button type="button" onclick="toggleForm('InputUname')" class="btn btn-warning update3" name="update" value=""><svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="bi bi-pencil-square" viewBox="0 0 16 16">
                                                      <path d="M15.502 1.94a.5.5 0 0 1 0 .706L14.459 3.69l-2-2L13.502.646a.5.5 0 0 1 .707 0l1.293 1.293zm-1.75 2.456-2-2L4.939 9.21a.5.5 0 0 0-.121.196l-.805 2.414a.25.25 0 0 0 .316.316l2.414-.805a.5.5 0 0 0 .196-.12l6.813-6.814z" />
                                                      <path fill-rule="evenodd" d="M1 13.5A1.5 1.5 0 0 0 2.5 15h11a1.5 1.5 0 0 0 1.5-1.5v-6a.5.5 0 0 0-1 0v6a.5.5 0 0 1-.5.5h-11a.5.5 0 0 1-.5-.5v-11a.5.5 0 0 1 .5-.5H9a.5.5 0 0 0 0-1H2.5A1.5 1.5 0 0 0 1 2.5v11z" />
                                                </svg></button>
                                    </div>
                              </div>
                              <div class="row mb-1">
                                    <label for="exampleInputPassword" class="col-sm-5 col-form-label">Password</label>
                                    <div class="col-sm-8">
                                          <input disabled type="password" class="form-control" id="InputPassword" name="passwd">
                                    </div>
                                    <div class="col">
                                          <button type="button" onclick="toggleForm('InputPassword')" class="btn btn-warning update4" name="update" value=""><svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="bi bi-pencil-square" viewBox="0 0 16 16">
                                                      <path d="M15.502 1.94a.5.5 0 0 1 0 .706L14.459 3.69l-2-2L13.502.646a.5.5 0 0 1 .707 0l1.293 1.293zm-1.75 2.456-2-2L4.939 9.21a.5.5 0 0 0-.121.196l-.805 2.414a.25.25 0 0 0 .316.316l2.414-.805a.5.5 0 0 0 .196-.12l6.813-6.814z" />
                                                      <path fill-rule="evenodd" d="M1 13.5A1.5 1.5 0 0 0 2.5 15h11a1.5 1.5 0 0 0 1.5-1.5v-6a.5.5 0 0 0-1 0v6a.5.5 0 0 1-.5.5h-11a.5.5 0 0 1-.5-.5v-11a.5.5 0 0 1 .5-.5H9a.5.5 0 0 0 0-1H2.5A1.5 1.5 0 0 0 1 2.5v11z" />
                                                </svg></button>
                                    </div>
                              </div>
                              <div class="row mb-1">
                                    <label for="exampleInputTelepon" class="col-sm-5 col-form-label">Telepon</label>
                                    <div class="col-sm-8">
                                          <input disabled type="number" class="form-control" id="InputTelepon" name="telp">
                                    </div>
                                    <div class="col">
                                          <button type="button" onclick="toggleForm('InputTelepon')" class="btn btn-warning update5" name="update" value=""><svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="bi bi-pencil-square" viewBox="0 0 16 16">
                                                      <path d="M15.502 1.94a.5.5 0 0 1 0 .706L14.459 3.69l-2-2L13.502.646a.5.5 0 0 1 .707 0l1.293 1.293zm-1.75 2.456-2-2L4.939 9.21a.5.5 0 0 0-.121.196l-.805 2.414a.25.25 0 0 0 .316.316l2.414-.805a.5.5 0 0 0 .196-.12l6.813-6.814z" />
                                                      <path fill-rule="evenodd" d="M1 13.5A1.5 1.5 0 0 0 2.5 15h11a1.5 1.5 0 0 0 1.5-1.5v-6a.5.5 0 0 0-1 0v6a.5.5 0 0 1-.5.5h-11a.5.5 0 0 1-.5-.5v-11a.5.5 0 0 1 .5-.5H9a.5.5 0 0 0 0-1H2.5A1.5 1.5 0 0 0 1 2.5v11z" />
                                                </svg></button>

                                    </div>
                              </div>
                              <div class="row mb-3">
                                    <label class="col-sm-5 col-form-label">Role</label>
                                    <div class="col-sm-10 d-flex " style="padding-left: 0px;">
                                          <div class="form-check" style="margin-left: 12px;">
                                                <input disabled type="radio" class="form-check-input" id="adminRadio" name="role" value="admin">
                                                <label class="form-check-label mr-3" for="adminRadio">Admin</label>
                                          </div>
                                          <div class="form-check" style="margin-left: 20px;">
                                                <input disabled type="radio" class="form-check-input" id="mahasiswaRadio" name="role" value="mahasiswa">
                                                <label class="form-check-label" for="mahasiswaRadio">Mahasiswa</label>
                                          </div>
                                    </div>
                              </div>
                              <button type="submit" class="btn btn-primary tombol" name="login" formaction="input-pengguna.php">Submit</button>
                              <button type="reset" class="btn btn-danger tombol" style="margin-left:10px;">Clear</button>
                  </div>
                  </form>
            </div>
      </div>
      </div>
      <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.11.7/dist/umd/popper.min.js" integrity="sha384-zYPOMqeu1DAVkHiLqWBUTcbYfZ8osu1Nd6Z89ify25QV9guujx43ITvfi12/QExE" crossorigin="anonymous"></script>
      <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha3/dist/js/bootstrap.min.js" integrity="sha384-Y4oOpwW3duJdCWv5ly8SCFYWqFDsfob/3GkgExXKV4idmbt98QcxXYs9UoXAB7BZ" crossorigin="anonymous"></script>
      <script src="https://code.jquery.com/jquery-3.2.1.slim.min.js"></script>
      <script>
            function toggleForm(inputId) {
                  const input = document.getElementById(inputId);
                  input.disabled = !input.disabled;
            }
      </script>

</body>

</html>

<?php
include '../connection.php';
if (isset($_POST['login'])) {
      try {
            echo "<script>alert('Login Successfully')</script>";
            $id = $_POST['id'];
            $nama = $_POST['nama'];
            $uname = $_POST['uname'];
            $passwd = $_POST['passwd'];
            $telp = $_POST['telp'];
            $role = $_POST['role'];

            $connect->exec("USE proyek");
            $query = "INSERT INTO user (
        id_user, nama_user, username, password, telepon ,user_role
        ) VALUES (
        :id, :nama, :uname, :passwd, :telp ,:role
        )";

            $stmt = $connect->prepare($query);
            $stmt->bindParam(':id', $id);
            $stmt->bindParam(':nama', $nama);
            $stmt->bindParam(':uname', $uname);
            $stmt->bindParam(':passwd', $passwd);
            $stmt->bindParam(':telp', $telp);
            $stmt->bindParam(':role', $role);
            $stmt->execute();
      } catch (PDOException $e) {
            echo $e->getMessage();
      }
      // $connect = null;
}
?>