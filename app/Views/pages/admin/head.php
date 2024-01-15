<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="utf-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <link rel="apple-touch-icon" sizes="76x76" href="<?= base_url('assets/img/apple-icon.png') ?>">
    <link rel="icon" type="image/png" href="<?= base_url('assets/img/favicon.png') ?>">
    <title>
        <?php echo $title; ?>
    </title>
    <!-- Fonts and icons -->
    <link rel="stylesheet" type="text/css"
        href="https://fonts.googleapis.com/css?family=Roboto:300,400,500,700,900|Roboto+Slab:400,700" />
    <!-- Nucleo Icons -->
    <link href="<?= base_url('assets/css/nucleo-icons.css') ?>" rel="stylesheet" />
    <link href="<?= base_url('assets/css/nucleo-svg.css') ?>" rel="stylesheet" />
    <!-- Font Awesome Icons -->
    <script src="https://kit.fontawesome.com/42d5adcbca.js" crossorigin="anonymous"></script>
    <!-- Material Icons -->
    <link href="https://fonts.googleapis.com/icon?family=Material+Icons+Round" rel="stylesheet">
    <!-- CSS Files -->
    <link id="pagestyle" href="<?= base_url('assets/css/material-dashboard.css?v=3.1.0') ?>" rel="stylesheet" />
    <!-- Nepcha Analytics (nepcha.com) -->
    <!-- Nepcha is an easy-to-use web analytics. No cookies and fully compliant with GDPR, CCPA, and PECR. -->
    <script defer data-site="YOUR_DOMAIN_HERE" src="<?= base_url('js/nepcha-analytics.js') ?>"></script>
    <style>
        .custom-alert {
            display: none;
            position: fixed;
            top: 12%;
            left: 50%;
            transform: translate(-50%, -50%);
            padding: 15px;
            background-color: #4CAF50;
            color: white;
            border-radius: 5px;
            box-shadow: 0 4px 8px rgba(0, 0, 0, 0.1);
            z-index: 1000;
        }
        
    </style>
</head>
