<?php
require __DIR__ . '/db/login.php';

date_default_timezone_set('Europe/Paris');
$dateenvoi = date("H:i:s");

if (!$conn->connect_errno) $res = $conn->query("SELECT chb_apptel.*, chb_applications.icone, chb_applications.nom AS appname, chb_telephones.nom AS telname FROM chb_apptel JOIN chb_applications ON chb_apptel.idapp = chb_applications.id JOIN chb_telephones ON chb_apptel.idtel = chb_telephones.id");
?>

<!DOCTYPE html>
<html lang="fr">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Cube | Heartbeat</title>
    <link rel="icon" type="image/png" href="assets/cube.png" />

    <!-- Google Font: Source Sans Pro -->
    <link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Source+Sans+Pro:300,400,400i,700&display=fallback">
    <!-- Font Awesome Icons -->
    <link rel="stylesheet" href="plugins/fontawesome-free/css/all.min.css">
    <!-- Theme style -->
    <link rel="stylesheet" href="dist/css/adminlte.min.css">
</head>

<body class="hold-transition sidebar-mini sidebar-collapse">
    <div class="wrapper">

        <!-- Navbar -->
        <nav class="main-header navbar navbar-expand navbar-white navbar-light ">
            <!-- Left navbar links -->
            <ul class="navbar-nav">
                <li class="nav-item">
                    <a class="nav-link" data-widget="pushmenu" href="#" role="button"><i class="fas fa-bars"></i></a>
                </li>
                <li class="nav-item d-none d-sm-inline-block">
                    <a href="index.php" class="nav-link">Accueil</a>
                </li>
                <li class="nav-item d-none d-sm-inline-block">
                    <a href="applications/listeapp.php" class="nav-link">Liste des applications</a>
                </li>
                <li class="nav-item d-none d-sm-inline-block">
                    <a href="telephones/listetel.php" class="nav-link">Liste des téléphones</a>
                </li>
            </ul>
        </nav>
        <!-- /.navbar -->

        <!-- Main Sidebar Container -->
        <aside class="main-sidebar sidebar-dark-primary elevation-4">
            <!-- Brand Logo -->
            <a href="index.php" class="brand-link">
                <img src="assets/cube.png" alt="Cube logo" class="brand-image" style="opacity: .8">
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
                            <a href="index.php" class="nav-link active">
                                <i class="nav-icon fas fa-home"></i>
                                <p>Accueil</p>
                            </a>
                        </li>
                        <li class="nav-item menu-open">
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
                                    <a href="applications/listeapp.php" class="nav-link">
                                        <i class="fas fa-list-ul nav-icon"></i>
                                        <p>Liste des applications</p>
                                    </a>
                                </li>
                                <li class="nav-item">
                                    <a href="applications/add/addapp.php" class="nav-link">
                                        <i class="fas fa-plus-circle nav-icon"></i>
                                        <p>Ajouter une application</p>
                                    </a>
                                </li>
                                <li class="nav-item">
                                    <a href="applications/edit/editapp.php" class="nav-link">
                                        <i class="fas fa-wrench nav-icon"></i>
                                        <p>Modifier une application</p>
                                    </a>
                                </li>
                                <li class="nav-item">
                                    <a href="applications/rm/rmapp.php" class="nav-link">
                                        <i class="fas fa-times-circle nav-icon"></i>
                                        <p>Supprimer une application</p>
                                    </a>
                                </li>
                            </ul>
                        </li>
                        <li class="nav-item menu-open">
                            <a href="#" class="nav-link">
                                <i class="nav-icon fas fa-mobile-alt"></i>
                                <p>
                                    Téléphones
                                    <i class="right fas fa-angle-left"></i>
                                </p>
                            </a>
                            <ul class="nav nav-treeview">
                                <li class="nav-item">
                                    <a href="telephones/listetel.php" class="nav-link">
                                        <i class="fas fa-list-ul nav-icon"></i>
                                        <p>Liste des téléphones</p>
                                    </a>
                                </li>
                                <li class="nav-item">
                                    <a href="telephones/add/addtel.php" class="nav-link">
                                        <i class="fas fa-plus-circle nav-icon"></i>
                                        <p>Ajouter un téléphone</p>
                                    </a>
                                </li>
                                <li class="nav-item">
                                    <a href="telephones/edit/edittel.php" class="nav-link">
                                        <i class="fas fa-wrench nav-icon"></i>
                                        <p>Modifier un téléphone</p>
                                    </a>
                                </li>
                                <li class="nav-item">
                                    <a href="telephones/rm/rmtel.php" class="nav-link">
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
                            <div class="row">
                                <h1 class="col-4 m-0">Accueil</h1>
                                <form class="col-4" action="telephones/listetel.php">
                                    <button type="submit" class="btn bg-primary"><i class="fas fa-wrench"></i> Modifier les liens</button>
                                </form>
                            </div>
                        </div><!-- /.col -->
                    </div><!-- /.row -->
                </div><!-- /.container-fluid -->
            </div>
            <!-- /.content-header -->

            <!-- Main content -->
            <div class="content">
                <div class="card card-info">
                    <div class="card-header">
                        <h3 class="card-title">Liste des liens téléphones - applications</h3>
                    </div>
                    <!-- /.card-header -->
                    <div class="card-body p-0">
                        <table id="apptel" class="table table-striped">
                            <thead>
                                <tr>
                                    <th>Nom de l'application</th>
                                    <th>Nom du téléphone</th>
                                    <th>Date de modification</th>
                                    <th>Endpoint ARN</th>
                                    <th>Tâche CRON</th>
                                    <th>Message de notification</th>
                                    <th>Paramètres additionnels</th>
                                </tr>
                            </thead>
                            <tbody>
                                <?php
                                $res->data_seek(0);
                                while ($row = $res->fetch_assoc()) {
                                    if (empty($row['message'])) $row['message'] = "❤️ Heartbeat @ $dateenvoi";

                                    echo '<tr><td><img width="50" height="50" src=assets/' . $row['icone'] . "> " . htmlspecialchars($row['appname']) . "</td><td>";
                                    echo htmlspecialchars($row['telname']) . "</td><td>";
                                    echo htmlspecialchars($row['editedat']) . '</td><td>';

                                    echo htmlspecialchars($row['endpointARN']) . '</td><td title="' . htmlspecialchars($row['cron']) . '">';
                                    echo htmlspecialchars($row['cron']) . '</td><td>';

                                    echo htmlspecialchars($row['message']) . '</td><td><a class="btn btn-app bg-info" href="notifications/notifthink.php?endpointARN=';
                                    echo htmlspecialchars($row['endpointARN']) . "&message=" . htmlspecialchars($row['message']) . '"><i class="fas fa-bell"></i>Envoyer</a></td>';
                                    echo "</td></tr>";
                                } ?>
                            </tbody>
                        </table>
                    </div>
                    <!-- /.card-body -->
                </div>
            </div>

            <!-- /.content -->
        </div>
        <!-- /.content-wrapper -->
    </div>
    <!-- ./wrapper -->

    <!-- REQUIRED SCRIPTS -->

    <!-- jQuery -->
    <script src="plugins/jquery/jquery.min.js"></script>
    <!-- Bootstrap 4 -->
    <script src="plugins/bootstrap/js/bootstrap.bundle.min.js"></script>
    <!-- AdminLTE App -->
    <script src="dist/js/adminlte.min.js"></script>
</body>

</html>
<?php
session_start();
session_unset();
session_destroy();
session_write_close();
setcookie(session_name(), '', 0, '/');
session_regenerate_id(true);
?>