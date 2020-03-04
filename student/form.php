<?php 
include('../config.php');
include_once('verify.php');
include('../includes/header.php');
?>

<?php include('sidebar.php'); ?>

<?php include('../includes/topbar.php'); ?>

<!-- Begin Page Content -->
<div class="container-fluid">
    <div class="row">
        <div class="col">
            <div class="card shadow mb-4">
                <div class="card-header py-3">
                    <div class="row align-items-center">
                        <h1 class="h3 mb-4 text-gray-800">Form</h1>
                    </div>
                    <div class="row align-items-center">
                        <h6 class="card-description"> Audit/Elective/InterDisciplinary Courses </h6>
                    </div>
                </div>
                <div class="card-body">
                    <div class="row">
                        <div class="col-6">
                            <div class="btn-group">

                                <button type="button" class="btn btn-primary dropdown-toggle" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                                    Preference 1
                                </button>
                                <div class="dropdown-menu">
                                    <a class="dropdown-item" href="#">Python</a>
                                    <a class="dropdown-item" href="#">IOT</a>
                                    <a class="dropdown-item" href="#">ML/AI</a>
                                </div>
                            </div>
                        </div>
                        <div class="col-6">
                            <div class="btn-group">
                                <button type="button" class="btn btn-primary dropdown-toggle" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                                    Preference 2
                                </button>
                                <div class="dropdown-menu">
                                    <a class="dropdown-item" href="#">Python</a>
                                    <a class="dropdown-item" href="#">IOT</a>
                                    <a class="dropdown-item" href="#">ML/AI</a>
                                </div>
                            </div>
                        </div>
                    </div>

                    <div class="row mt-4">
                        <div class="col-6">
                            <div class="btn-group">

                                <button type="button" class="btn btn-primary dropdown-toggle" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                                    Preference 1
                                </button>
                                <div class="dropdown-menu">
                                    <a class="dropdown-item" href="#">Python</a>
                                    <a class="dropdown-item" href="#">IOT</a>
                                    <a class="dropdown-item" href="#">ML/AI</a>
                                </div>
                            </div>
                        </div>
                        <div class="col-6">
                            <div class="btn-group">
                                <button type="button" class="btn btn-primary dropdown-toggle" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                                    Preference 2
                                </button>
                                <div class="dropdown-menu">
                                    <a class="dropdown-item" href="#">Python</a>
                                    <a class="dropdown-item" href="#">IOT</a>
                                    <a class="dropdown-item" href="#">ML/AI</a>
                                </div>
                            </div>
                        </div>
                    </div>

                    <div class="row mt-4">
                        <div class="col-6">
                            <div class="btn-group">

                                <button type="button" class="btn btn-primary dropdown-toggle" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                                    Preference 1
                                </button>
                                <div class="dropdown-menu">
                                    <a class="dropdown-item" href="#">Python</a>
                                    <a class="dropdown-item" href="#">IOT</a>
                                    <a class="dropdown-item" href="#">ML/AI</a>
                                </div>
                            </div>
                        </div>
                        <div class="col-6">
                            <div class="btn-group">
                                <button type="button" class="btn btn-primary dropdown-toggle" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                                    Preference 2
                                </button>
                                <div class="dropdown-menu">
                                    <a class="dropdown-item" href="#">Python</a>
                                    <a class="dropdown-item" href="#">IOT</a>
                                    <a class="dropdown-item" href="#">ML/AI</a>
                                </div>
                            </div>
                        </div>
                    </div>

                    <div class="row mt-4">
                        <div class="col-6">
                            <div class="btn-group">

                                <button type="button" class="btn btn-primary dropdown-toggle" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                                    Preference 1
                                </button>
                                <div class="dropdown-menu">
                                    <a class="dropdown-item" href="#">Python</a>
                                    <a class="dropdown-item" href="#">IOT</a>
                                    <a class="dropdown-item" href="#">ML/AI</a>
                                </div>
                            </div>
                        </div>
                        <div class="col-6">
                            <div class="btn-group">
                                <button type="button" class="btn btn-primary dropdown-toggle" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                                    Preference 2
                                </button>
                                <div class="dropdown-menu">
                                    <a class="dropdown-item" href="#">Python</a>
                                    <a class="dropdown-item" href="#">IOT</a>
                                    <a class="dropdown-item" href="#">ML/AI</a>
                                </div>
                            </div>
                        </div>
                    </div>
                    <br>
                    <div class="modal-footer">
                        <button type="button" class="btn btn-secondary" data-dismiss="modal">Submit</button>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>

<!-- /.container-fluid -->

<?php include('../includes/footer.php');
include('../includes/scripts.php');
?>