<?php
session_start();
include '../../db/login.php';
include '../../status/status.php';
if (empty($_POST['nom']) and empty($_SESSION['nom'])) error("Vous n'avez pas choisi d'application", "../telephones/listetel.php");

$applicationnom = mysqli_real_escape_string($conn, $_POST['nom']);
$idtel          = mysqli_real_escape_string($conn, $_SESSION['idtel']);
if (empty($_POST['nom'])) $applicationnom = mysqli_real_escape_string($conn, $_SESSION['nom']);

if (isset($_POST['submit']) or isset($idtel)) {
    $res = $conn->query("SELECT *, chb_applications.nom AS applicationnom, chb_telephones.nom AS telephonenom, chb_apptel.id AS apptelid FROM chb_apptel JOIN chb_applications ON chb_apptel.idapp = chb_applications.id JOIN chb_telephones ON chb_apptel.idtel = chb_telephones.id WHERE idtel = \"$idtel\" AND chb_applications.nom = \"$applicationnom\"");
    $row = $res->fetch_assoc();
} else error("Variable nom vide", "../telephones/listetel.php");
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
                                    <a href="../../telephones/listetel.php" class="nav-link active">
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
                                    <a href="../../telephones/edit/edittel.php" class="nav-link">
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
                            <h1 class="m-0">Editer un lien entre <?php echo htmlspecialchars($row['telephonenom']) . " et " . htmlspecialchars($row['applicationnom']); ?></h1>
                        </div><!-- /.col -->
                        <div class="col-sm-6">
                            <ol class="breadcrumb float-sm-right">
                                <li class="breadcrumb-item"><a href="#">Accueil</a></li>
                                <li class="breadcrumb-item active">Editer un lien</li>
                            </ol>
                        </div><!-- /.col -->
                    </div><!-- /.row -->
                </div><!-- /.container-fluid -->
            </div>
            <!-- /.content-header -->

            <!-- Main content -->
            <div class="content d-flex justify-content-center">
                <!-- general form elements -->
                <div class="card card-info">
                    <div class="card-header">
                        <h3 class="card-title">Editer le lien</h3>
                    </div>
                    <!-- form start -->
                    <form role="form" action="editapptelthink.php" method="POST">
                        <input type="hidden" name="oldid" value="<?php echo htmlspecialchars($row['apptelid']); ?>" />
                        <div class="card-body">
                            <div class="form-group">
                                <label>Endpoint ARN :</label>
                                <input type="text" class="form-control" name="endpointARN" placeholder="Endpoint ARN" value="<?php echo htmlspecialchars($row['endpointARN']); ?>">
                            </div>
                            <div class="form-group">
                                <label>Message :</label>
                                <input type="text" class="form-control" name="message" placeholder="❤️ Heartbeat @ (Heure de notification)" value="<?php echo htmlspecialchars($row['message']); ?>">
                            </div>
                            <label>Planification CRON :</label>
                            <div class="row justify-content-center">
                                <div class="col-sm-2">
                                    <!-- Select multiple-->
                                    <div class="form-group">
                                        <label>Heures :</label>
                                        <select multiple class="custom-select" size="12" name="cron-hours" id="cron-hours" onchange="updateField('hours')">
                                            <?php
                                            for ($i = 0; $i <= 23; $i++) {
                                                echo '<option selected="selected" value="' . $i . '">' . str_pad($i, 2, "0", STR_PAD_LEFT) . '</option>';
                                            } ?>
                                        </select>
                                        <a href="javascript:cronHelperSelectAll('#cron-hours')">Tout sélectionner</a>
                                    </div>
                                </div>
                                <div class="col-sm-2">
                                    <div class="form-group">
                                        <label>Minutes :</label>
                                        <select multiple class="custom-select" size="12" name="cron-minutes" id="cron-minutes" onchange="updateField('minutes')">
                                            <?php
                                            for ($i = 0; $i <= 59; $i++) {
                                                echo '<option selected="selected" value="' . $i . '">' . str_pad($i, 2, "0", STR_PAD_LEFT) . '</option>';
                                            } ?>
                                        </select>
                                        <a href="javascript:cronHelperSelectAll('#cron-minutes')">Tout sélectionner</a>
                                    </div>
                                </div>
                                <div class="col-sm-2">
                                    <div class="form-group">
                                        <label>Jour :</label>
                                        <select multiple class="custom-select" size="12" name="cron-dom" id="cron-dom" onchange="updateField('dom')">
                                            <?php
                                            for ($i = 1; $i <= 31; $i++) {
                                                echo '<option selected="selected" value="' . $i . '">' . str_pad($i, 2, "0", STR_PAD_LEFT) . '</option>';
                                            } ?>
                                        </select>
                                        <a href="javascript:cronHelperSelectAll('#cron-dom')">Tout sélectionner</a>
                                    </div>
                                </div>
                                <div class="col-sm-2">
                                    <div class="form-group">
                                        <label>Mois :</label>
                                        <select multiple class="custom-select" size="12" name="cron-months" id="cron-months" onchange="updateField('months')">
                                            <option selected="selected" value="1">Janvier</option>
                                            <option selected="selected" value="2">Février</option>
                                            <option selected="selected" value="3">Mars</option>
                                            <option selected="selected" value="4">Avril</option>
                                            <option selected="selected" value="5">Mai</option>
                                            <option selected="selected" value="6">Juin</option>
                                            <option selected="selected" value="7">Juillet</option>
                                            <option selected="selected" value="8">Août</option>
                                            <option selected="selected" value="9">Septembre</option>
                                            <option selected="selected" value="10">Octobre</option>
                                            <option selected="selected" value="11">Novembre</option>
                                            <option selected="selected" value="12">Décembre</option>
                                        </select>
                                        <a href="javascript:cronHelperSelectAll('#cron-months')">Tout sélectionner</a>
                                    </div>
                                </div>
                                <div class="col-sm-2">
                                    <div class="form-group">
                                        <label>Jour de la semaine :</label>
                                        <select multiple class="custom-select" size="7" name="cron-dow" id="cron-dow" onchange="updateField('dow')">
                                            <option selected="selected" value="1">Lundi</option>
                                            <option selected="selected" value="2">Mardi</option>
                                            <option selected="selected" value="3">Mercredi</option>
                                            <option selected="selected" value="4">Jeudi</option>
                                            <option selected="selected" value="5">Vendredi</option>
                                            <option selected="selected" value="6">Samedi</option>
                                            <option selected="selected" value="0">Dimanche</option>
                                        </select>
                                        <a href="javascript:cronHelperSelectAll('#cron-dow')">Tout sélectionner</a>
                                    </div>
                                </div>
                                <input type="text" class="form-control" id="cron-output" name="cron" placeholder="Planification CRON - Défaut: 0 12 * * *" onkeyup="importCronExpressionFromInput('#cron-output')" value="<?php echo htmlspecialchars($row['cron']); ?>">
                            </div>
                        </div>
                        <!-- /.card-body -->
                        <div class="card-footer">
                            <button type="submit" name="submit" class="btn btn-info">Editer</button>
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
    <!-- cron-expression-generator -->
    <script src="../../js/cron.js"></script>
</body>

</html>