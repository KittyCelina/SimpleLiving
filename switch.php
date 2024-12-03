<?php
include_once 'functions/authentication.php';
?>
<!DOCTYPE html>
<html data-bs-theme="light" lang="en">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0, shrink-to-fit=no">
    <title>Dashboard - West Prime Smart Power Automation</title>
    <meta name="description" content="Automation Systems">
    <link rel="stylesheet" href="assets/bootstrap/css/bootstrap.min.css">
    <link rel="stylesheet" href="assets/css/Nunito.css">
    <link rel="stylesheet" href="assets/fonts/fontawesome-all.min.css">
    <link rel="stylesheet" href="assets/css/Banner-Heading-Image-images.css">
    <link rel="stylesheet" href="assets/css/Features-Large-Icons-icons.css">
    <link rel="stylesheet" href="assets/css/Timeline-Steps.css">
</head>

<body id="page-top">
    <div id="wrapper">
        <div class="d-flex flex-column" id="content-wrapper">
            <nav class="navbar navbar-expand-md bg-body shadow-sm">
                <div class="container-fluid"><a class="navbar-brand d-flex align-items-center" href="dashboard.php">
                        <div class="bs-icon-md bs-icon-circle bs-icon-semi-white d-flex flex-shrink-0 justify-content-center align-items-center me-1 d-inline-block bs-icon xl shadow"><svg xmlns="http://www.w3.org/2000/svg" width="1em" height="1em" fill="currentColor" viewBox="0 0 16 16" class="bi bi-house-heart-fill">
                                <path d="M7.293 1.5a1 1 0 0 1 1.414 0L11 3.793V2.5a.5.5 0 0 1 .5-.5h1a.5.5 0 0 1 .5.5v3.293l2.354 2.353a.5.5 0 0 1-.708.707L8 2.207 1.354 8.853a.5.5 0 1 1-.708-.707z"></path>
                                <path d="m14 9.293-6-6-6 6V13.5A1.5 1.5 0 0 0 3.5 15h9a1.5 1.5 0 0 0 1.5-1.5zm-6-.811c1.664-1.673 5.825 1.254 0 5.018-5.825-3.764-1.664-6.691 0-5.018"></path>
                            </svg></div><span>West Prime Smart Power Automation</span>
                    </a><button data-bs-toggle="collapse" class="navbar-toggler" data-bs-target="#navcol-2"><span class="visually-hidden">Toggle navigation</span><span class="navbar-toggler-icon"></span></button>
                    <div class="collapse navbar-collapse" id="navcol-2">
                        <ul class="navbar-nav ms-auto"></ul><button class="btn btn-primary ms-md-2" type="button" data-bs-toggle="modal" data-bs-target="#login">Logout</button>
                    </div>
                </div>
            </nav>
        </div><a class="border rounded d-inline scroll-to-top" href="#page-top"><i class="fas fa-angle-up"></i></a>
    </div>
    <div class="container py-4 py-xl-5">
        <div class="row mb-5">
            <div class="col-md-8 col-xl-6 text-center mx-auto">
                <h2>Smart Switch</h2>
                <p class="w-lg-50">Curae hendrerit donec commodo hendrerit egestas tempus, turpis facilisis nostra nunc. Vestibulum dui eget ultrices.</p>
            </div>
        </div>
        <div class="row gy-2 row-cols-1 row-cols-md-2 row-cols-xl-3">
            <div class="col">
                <div class="card">
                    <div class="card-body p-4">
                        <h2 class="text-center card-title">Bulb</h2>
                        <div class="d-flex mb-2"><img class="img-thumbnail flex-shrink-0 me-3 fit-cover" alt="processor, core, chip" width="50" height="50" src="assets/img/chip.png">
                            <div>
                                <p class="fw-bold mb-0">{device.name}</p>
                                <p class="text-muted mb-0">{relay.id}</p>
                            </div>
                        </div>
                        <div class="row">
                            <div class="col"><button class="btn btn-success w-100 my-1" type="button">Turn On</button></div>
                            <div class="col"><button class="btn btn-danger w-100 my-1" type="button">Turn Off</button></div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <div class="modal fade" role="dialog" tabindex="-1" id="login">
        <div class="modal-dialog modal-dialog-centered" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <h4 class="modal-title">Login</h4><button class="btn-close" type="button" aria-label="Close" data-bs-dismiss="modal"></button>
                </div>
                <div class="modal-body">
                    <form method="post">
                        <div class="form-floating mb-3"><input class="form-control form-control" type="text" placeholder="Username" name="username"><label class="form-label">Username</label></div>
                        <div class="form-floating mb-3"><input class="form-control form-control" type="password" placeholder="Password" name="password"><label class="form-label">Password</label></div>
                    </form>
                </div>
                <div class="modal-footer"><button class="btn btn-primary" type="button">Login</button></div>
            </div>
        </div>
    </div>
    <script src="assets/js/jquery.min.js"></script>
    <script src="assets/bootstrap/js/bootstrap.min.js"></script>
    <script src="assets/js/bs-init.js"></script>
    <script src="assets/js/theme.js"></script>
</body>

</html>