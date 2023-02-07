<?php
include "koneksi.php";
?>

<head>

    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <meta name="description" content="">
    <meta name="author" content="">
    <link rel="shortcut icon" href="logo.png">
    <title>Login</title>

    <!-- Custom fonts for this template-->
    <link href="vendor/fontawesome-free/css/all.min.css" rel="stylesheet" type="text/css">
    <link
        href="https://fonts.googleapis.com/css?family=Nunito:200,200i,300,300i,400,400i,600,600i,700,700i,800,800i,900,900i"
        rel="stylesheet">

    <!-- Custom styles for this template-->
    <link href="css/sb-admin-2.min.css" rel="stylesheet">
    <link href="vendor/datatables/dataTables.bootstrap4.min.css" rel="stylesheet">

    <!-- <link rel="stylesheet" type="text/css" href="https://cdn.datatables.net/1.13.1/css/jquery.dataTables.css"> -->
</head>
<form action="" method="post">

    <section class="vh-100" style="background-color: #508bfc;">
        <div class="container py-5 h-100">
            <div class="row d-flex justify-content-center align-items-center h-100">
                <div class="col-12 col-md-8 col-lg-6 col-xl-5">
                    <div class="card shadow-2-strong" style="border-radius: 1rem;">
                        <div class="card-body p-5 text-center">

                            <h3 class="mb-5">Sign in</h3>

                            <div class="form-outline mb-4">
                                <input type="text" id="typeEmailX-2" class="form-control form-control-lg"
                                    name="username" />
                                <label class="form-label" for="typeEmailX-2">Username</label>
                            </div>

                            <div class="form-outline mb-4">
                                <input type="password" id="typePasswordX-2" class="form-control form-control-lg"
                                    name="password" />
                                <label class="form-label" for="typePasswordX-2">Password</label>
                            </div>

                            <!-- Checkbox -->
                            <div class="form-check d-flex justify-content-start mb-4">
                                <input class="form-check-input" type="checkbox" value="" id="form1Example3" />
                                <label class="form-check-label" for="form1Example3"> Remember password </label>
                            </div>

                            <button class="btn btn-primary btn-lg btn-block" type="submit" name="proses">Login</button>

                            <hr class="my-4">


                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>
</form>
<?php
if(isset($_POST['proses'])){
    $username=$_POST['username'];
    $password=md5($_POST['password']);
    $query=mysqli_query($koneksi,"select * from petugas where username='$username' AND password='$password'");
    if(mysqli_num_rows($query)>0){
        // echo "login berhasil";
        $data=mysqli_fetch_array($query);
        session_start();
        $_SESSION['status']="sukses";
        $_SESSION['nama_petugas']=$data['nama_petugas'];
        $_SESSION['level']=$data['level'];
        $_SESSION['id_petugas']=$data['id'];
        header('location:index.php');
        // echo $data['nama_petugas'];
    }
    else {
        echo "login gagal";
    }
}

?>