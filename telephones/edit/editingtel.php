<?php
session_start();
include '../../db/login.php';
include '../../status/status.php';
if (isset($_POST['submit']) or isset($_SESSION['idtel'])) {
    $edit   = mysqli_real_escape_string($conn, $_POST['edit']);
    $idtel  = mysqli_real_escape_string($conn, $_SESSION['idtel']);

    if (empty($edit) and empty($idtel)) error("Variable vide", "../telephones/edittel.php");
    else {
        if (!$conn->connect_errno) {
            $res = $conn->query("SELECT nom, os, id FROM chb_telephones WHERE nom = \"$edit\" OR id = \"$idtel\"");
            $row = $res->fetch_assoc();
        }
    }
}
?>

<!DOCTYPE html>
<html lang="fr">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Cube | Heartbeat</title>
    <link rel="icon" type="image/png" href="../../assets/cube.png" />

    <!-- Google Font: Source Sans Pro -->
    <link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Source+Sans+Pro:300,400,400i,700&display=fallback">
    <!-- Font Awesome Icons -->
    <link rel="stylesheet" href="../../plugins/fontawesome-free/css/all.min.css">
    <!-- Theme style -->
    <link rel="stylesheet" href="../../dist/css/adminlte.min.css">
</head>

<body class="hold-transition sidebar-mini sidebar-collapse">
    <div class="wrapper">

        <!-- Navbar -->
        <nav class="main-header navbar navbar-expand navbar-white navbar-light">
            <!-- Left navbar links -->
            <ul class="navbar-nav">
                <li class="nav-item">
                    <a class="nav-link" data-widget="pushmenu" href="#" role="button"><i class="fas fa-bars"></i></a>
                </li>
                <li class="nav-item d-none d-sm-inline-block">
                    <a href="../../index.php" class="nav-link">Accueil</a>
                </li>
                <li class="nav-item d-none d-sm-inline-block">
                    <a href="../../applications/listeapp.php" class="nav-link">Liste des applications</a>
                </li>
                <li class="nav-item d-none d-sm-inline-block">
                    <a href="../../telephones/listetel.php" class="nav-link">Liste des téléphones</a>
                </li>
            </ul>
        </nav>
        <!-- /.navbar -->

        <!-- Main Sidebar Container -->
        <aside class="main-sidebar sidebar-dark-primary elevation-4">
            <!-- Brand Logo -->
            <a href="../../index.php" class="brand-link">
                <img src="../../assets/cube.png" alt="Cube logo" class="brand-image" style="opacity: .8">
                <span class="brand-text font-weight-light">Cube Heartbeat</span>
            </a>

            <!-- Sidebar -->
            <div class="sidebar">
                <!-- Sidebar Menu -->
                <nav class="mt-2">
                    <ul class="nav nav-pills nav-sidebar flex-column" data-widget="treeview" role="menu" data-accordion="false">
                        <!-- Add icons to the links using the .nav-icon class
               with font-awesome or any other icon font library -->
                        <li class="nav-item">
                            <a href="../../index.php" class="nav-link">
                                <i class="nav-icon fas fa-home"></i>
                                <p>Accueil</p>
                            </a>
                        </li>
                        <li class="nav-item">
                            <a href="#" class="nav-link">
                                <i class="nav-icon fas fa-tachometer-alt"></i>
                                <p>
                                    Applications
                                    <i class="right fas fa-angle-left"></i>
                                </p>
                            </a>
                            <ul class="nav nav-treeview">
                                <li class="nav-item">
                                <li class="nav-item">
                                    <a href="../../applications/listeapp.php" class="nav-link">
                                        <i class="fas fa-list-ul nav-icon"></i>
                                        <p>Liste des applications</p>
                                    </a>
                                </li>
                                <li class="nav-item">
                                    <a href="../../applications/add/addapp.php" class="nav-link">
                                        <i class="fas fa-plus-circle nav-icon"></i>
                                        <p>Ajouter une application</p>
                                    </a>
                                </li>
                                <li class="nav-item">
                                    <a href="../../applications/edit/editapp.php" class="nav-link">
                                        <i class="fas fa-wrench nav-icon"></i>
                                        <p>Modifier une application</p>
                                    </a>
                                </li>
                                <li class="nav-item">
                                    <a href="../../applications/rm/rmapp.php" class="nav-link">
                                        <i class="fas fa-times-circle nav-icon"></i>
                                        <p>Supprimer une application</p>
                                    </a>
                                </li>
                            </ul>
                        </li>
                        <li class="nav-item menu-open">
                            <a href="#" class="nav-link active">
                                <i class="nav-icon fas fa-mobile-alt"></i>
                                <p>
                                    Téléphones
                                    <i class="right fas fa-angle-left"></i>
                                </p>
                            </a>
                            <ul class="nav nav-treeview">
                                <li class="nav-item">
                                    <a href="../../telephones/listetel.php" class="nav-link">
                                        <i class="fas fa-list-ul nav-icon"></i>
                                        <p>Liste des téléphones</p>
                                    </a>
                                </li>
                                <li class="nav-item">
                                    <a href="../../telephones/add/addtel.php" class="nav-link">
                                        <i class="fas fa-plus-circle nav-icon"></i>
                                        <p>Ajouter un téléphone</p>
                                    </a>
                                </li>
                                <li class="nav-item">
                                    <a href="../../telephones/edit/edittel.php" class="nav-link active">
                                        <i class="fas fa-wrench nav-icon"></i>
                                        <p>Modifier un téléphone</p>
                                    </a>
                                </li>
                                <li class="nav-item">
                                    <a href="../../telephones/rm/rmtel.php" class="nav-link">
                                        <i class="fas fa-times-circle nav-icon"></i>
                                        <p>Supprimer un téléphone</p>
                                    </a>
                                </li>
                            </ul>
                        </li>
                    </ul>
                </nav>
                <!-- /.sidebar-menu -->
            </div>
            <!-- /.sidebar -->
        </aside>

        <!-- Content Wrapper. Contains page content -->
        <div class="content-wrapper">
            <!-- Content Header (Page header) -->
            <div class="content-header">
                <div class="container-fluid">
                    <div class="row mb-2">
                        <div class="col-sm-6">
                            <h1 class="m-0">Modifier le téléphone <?php echo htmlspecialchars($row['nom']);?></h1>
                        </div><!-- /.col -->
                        <div class="col-sm-6">
                            <ol class="breadcrumb float-sm-right">
                                <li class="breadcrumb-item"><a href="#">Accueil</a></li>
                                <li class="breadcrumb-item active">Modifier un téléphone</li>
                            </ol>
                        </div><!-- /.col -->
                    </div><!-- /.row -->
                </div><!-- /.container-fluid -->
            </div>
            <!-- /.content-header -->

            <!-- Main content -->
            <div class="content d-flex justify-content-center">
                <!-- general form elements -->
                <div class="card card-warning">
                    <div class="card-header">
                        <h3 class="card-title">Modifier le téléphone</h3>
                    </div>
                    <!-- form start -->
                    <form role="form" action="edittelthink.php" method="POST">
                        <input type="hidden" name="oldid" value="<?php echo htmlspecialchars($row['id']); ?>" />
                        <div class="card-body">
                            <div class="form-group">
                                <label>Nom du téléphone :</label>
                                <input type="text" class="form-control" id="nom" name="nom" placeholder="Nom du téléphone" required value="<?php echo htmlspecialchars($row['nom']); ?>">
                            </div>
                            <label>Système d'exploitation du téléphone :</label>
                            <fieldset>
                                <div class="col-sm-10">
                                    <div class="form-check">
                                        <input class="form-check-input" type="radio" name="os" value="Android" <?php if ($row['os'] == "Android") echo "checked"; ?> { # code... }>
                                        <label class="form-check-label" for="gridRadios1">
                                            Android
                                        </label>
                                    </div>
                                    <div class="form-check">
                                        <input class="form-check-input" type="radio" name="os" value="iOS" <?php if ($row['os'] == "iOS") echo "checked"; ?>>
                                        <label class="form-check-label" for="gridRadios2">
                                            iOS
                                        </label>
                                    </div>
                                </div>
                            </fieldset>
                        </div>
                        <!-- /.card-body -->
                        <div class="card-footer">
                            <button type="submit" name="submit" class="btn btn-warning">Modifier</button>
                        </div>
                    </form>
                </div>
                <!-- /.card -->
            </div>
            <!-- /.content -->
        </div>
        <!-- /.content-wrapper -->
    </div>
    <!-- ./wrapper -->

    <!-- REQUIRED SCRIPTS -->

    <!-- jQuery -->
    <script src="../../plugins/jquery/jquery.min.js"></script>
    <!-- Bootstrap 4 -->
    <script src="../../plugins/bootstrap/js/bootstrap.bundle.min.js"></script>
    <!-- AdminLTE App -->
    <script src="../../dist/js/adminlte.min.js"></script>
    <script>
        $(function() {
            var requiredCheckboxes = $('.options :checkbox[required]');
            requiredCheckboxes.change(function() {
                if (requiredCheckboxes.is(':checked')) {
                    requiredCheckboxes.removeAttr('required');
                } else {
                    requiredCheckboxes.attr('required', 'required');
                }
            });
        });
    </script>
</body>

</html>