<!DOCTYPE html>
<html lang="es">

<head>
    <meta charset="utf-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">

    <link rel="apple-touch-icon" sizes="76x76" href="<?= $this->Url->assetUrl('/theme/img/apple-icon.png') ?>">
    <link rel="icon" type="image/png" href="<?= $this->Url->assetUrl('/theme/img/apple-icon.png') ?>">

    <title>Work Pappers</title>

    <!--     Fonts and icons     -->
    <link rel="stylesheet" type="text/css" href="//fonts.googleapis.com/css?family=Roboto:300,400,500,700,900|Roboto+Slab:400,700" />

    <!-- Nucleo Icons -->
    <?= $this->Html->css(['/theme/css/nucleo-icons', '/theme/css/nucleo-svg']) ?>

    <!-- Font Awesome Icons -->
    <script src="//kit.fontawesome.com/42d5adcbca.js" crossorigin="anonymous"></script>

    <!-- Material Icons -->

    <!-- CSS Files -->
    <?= $this->Html->css(['/theme/css/material-dashboard.min']) ?>
    <link href="//fonts.googleapis.com/icon?family=Material+Icons+Round" rel="stylesheet">

    <!-- CSS additional -->
    <?= $this->Html->css(['additional']) ?>
</head>

<?php
$c = $this->getRequest()->getParam('controller');
$a = $this->getRequest()->getParam('action');
?>

<body class="g-sidenav-show  bg-gray-200">
    <aside class="sidenav navbar navbar-vertical navbar-expand-xs border-0 border-radius-xl my-3 fixed-start ms-3   bg-gradient-dark" id="sidenav-main">
        <div class="sidenav-header">
            <i class="fas fa-times p-3 cursor-pointer text-white opacity-5 position-absolute end-0 top-0 d-none d-xl-none" aria-hidden="true" id="iconSidenav"></i>
            <a class="navbar-brand m-0" href="<?= $this->Url->build(['controller' => 'Quotes', 'action' => 'index']) ?>">
                <?= $this->Html->image('/theme/img/logo-ct.png', ["class" => "navbar-brand-img h-100", "alt" => "main_logo"]) ?>
                <span class="ms-1 font-weight-bold text-white">Work Pappers</span>
            </a>
        </div>
        <hr class="horizontal light mt-0 mb-2">
        <div class="collapse navbar-collapse w-auto h-auto ps" id="sidenav-collapse-main">
            <ul class="navbar-nav">
                <li class="nav-item">
                    <a class="nav-link text-white <?= $c == 'Quotes' ? 'active' : '' ?>" href="<?= $this->Url->build(['controller' => 'Quotes', 'action' => 'index']) ?>">
                        <div class="text-white text-center me-2 d-flex align-items-center justify-content-center">
                            <i class="material-icons opacity-10">description</i>
                        </div>
                        <span class="nav-link-text ms-1">Quotes</span>
                    </a>
                </li>
                <li class="nav-item">
                    <a class="nav-link text-white <?= $c == 'Bills' ? 'active' : '' ?>" href="<?= $this->Url->build(['controller' => 'Bills', 'action' => 'index']) ?>">
                        <div class="text-white text-center me-2 d-flex align-items-center justify-content-center">
                            <i class="material-icons opacity-10">receipt_long</i>
                        </div>
                        <span class="nav-link-text ms-1">Bills</span>
                    </a>
                </li>
                <li class="nav-item">
                    <a class="nav-link text-white <?= $c == 'Clients' ? 'active' : '' ?>" href="<?= $this->Url->build(['controller' => 'Clients', 'action' => 'index']) ?>">
                        <div class="text-white text-center me-2 d-flex align-items-center justify-content-center">
                            <i class="material-icons opacity-10">group</i>
                        </div>
                        <span class="nav-link-text ms-1">Clients</span>
                    </a>
                </li>
                <li class="nav-item">
                    <a class="nav-link text-white <?= $c == 'Suppliers' ? 'active' : '' ?>" href="<?= $this->Url->build(['controller' => 'Suppliers', 'action' => 'index']) ?>">
                        <div class="text-white text-center me-2 d-flex align-items-center justify-content-center">
                            <i class="material-icons opacity-10">badge</i>
                        </div>
                        <span class="nav-link-text ms-1">Suppliers</span>
                    </a>
                </li>
                <li class="nav-item">

                    <?php $others_collapsed = in_array($c, ['BankAccounts', 'BankAccountTypes', 'IdentificationTypes', 'BillsStatuses', 'PaymentStatuses', 'QuotesStatuses']) ?>

                    <a data-bs-toggle="collapse" href="#componentsExamples" class="nav-link text-white collapsed <?= $others_collapsed ? 'active' : '' ?>" aria-controls="componentsExamples" role="button" aria-expanded="<?= $others_collapsed ? 'true' : 'false' ?>">
                        <div class="text-white text-center me-2 d-flex align-items-center justify-content-center">
                            <i class="material-icons opacity-10">more_horiz</i>
                        </div>
                        <span class="nav-link-text ms-1">Others</span>
                    </a>

                    <div class="collapse <?= $others_collapsed ? 'show' : '' ?>" id="componentsExamples">
                        <ul class="nav ">
                            <li class="nav-item">
                                <a class="nav-link text-white py-1 <?= $c == 'BankAccounts' ? 'active' : '' ?>" href="<?= $this->Url->build(['controller' => 'BankAccounts', 'action' => 'index']) ?>">
                                    <span class="sidenav-normal ms-2  ps-1"> Bank Accounts </span>
                                </a>
                            </li>
                            <li class="nav-item">
                                <a class="nav-link text-white py-1 <?= $c == 'BankAccountTypes' ? 'active' : '' ?>" href="<?= $this->Url->build(['controller' => 'BankAccountTypes', 'action' => 'index']) ?>">
                                    <span class="sidenav-normal  ms-2  ps-1"> Bank Account Types </span>
                                </a>
                            </li>
                            <li class="nav-item">
                                <a class="nav-link text-white py-1 <?= $c == 'IdentificationTypes' ? 'active' : '' ?>" href="<?= $this->Url->build(['controller' => 'IdentificationTypes', 'action' => 'index']) ?>">
                                    <span class="sidenav-normal  ms-2  ps-1"> Identification Types </span>
                                </a>
                            </li>
                            <li class="nav-item">
                                <a class="nav-link text-white py-1 <?= $c == 'BillsStatuses' ? 'active' : '' ?>" href="<?= $this->Url->build(['controller' => 'BillsStatuses', 'action' => 'index']) ?>">
                                    <span class="sidenav-normal  ms-2  ps-1"> Bills Statuses </span>
                                </a>
                            </li>
                            <li class="nav-item">
                                <a class="nav-link text-white py-1 <?= $c == 'PaymentStatuses' ? 'active' : '' ?>" href="<?= $this->Url->build(['controller' => 'PaymentStatuses', 'action' => 'index']) ?>">
                                    <span class="sidenav-normal  ms-2  ps-1"> Payment Statuses </span>
                                </a>
                            </li>
                            <li class="nav-item">
                                <a class="nav-link text-white py-1 <?= $c == 'QuotesStatuses' ? 'active' : '' ?>" href="<?= $this->Url->build(['controller' => 'QuotesStatuses', 'action' => 'index']) ?>">
                                    <span class="sidenav-normal  ms-2  ps-1"> Quotes Statuses </span>
                                </a>
                            </li>
                        </ul>
                    </div>
                </li>
            </ul>
        </div>
    </aside>
    <main class="main-content position-relative max-height-vh-100 h-100 border-radius-lg ">

        <div class="container-fluid py-4">
            <div class="container-fluid">

                <?= $this->Flash->render() ?>
                <?= $this->fetch('content') ?>

            </div>
        </div>

    </main>

    <!--   Core JS Files   -->
    <?= $this->Html->script([
        '/theme/js/core/popper.min',
        '/theme/js/core/bootstrap.min',
        '/theme/js/plugins/perfect-scrollbar.min',
        '/theme/js/plugins/smooth-scrollbar.min',
    ]) ?>

    <script>
        var win = navigator.platform.indexOf('Win') > -1;
        if (win && document.querySelector('#sidenav-scrollbar')) {
            var options = {
                damping: '0.5'
            }
            Scrollbar.init(document.querySelector('#sidenav-scrollbar'), options);
        }
    </script>

    <!-- Github buttons -->
    <script async defer src="//buttons.github.io/buttons.js"></script>

    <!-- Control Center for Material Dashboard: parallax effects, scripts for the example pages etc -->
    <?= $this->Html->script('/theme/js/material-dashboard.min') ?>

    <?= $this->fetch('end_scripts') ?>

</body>

</html>