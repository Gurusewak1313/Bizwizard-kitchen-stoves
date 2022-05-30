<?php
echo $this->Html->script('/vendor/jquery/jquery.min.js', ['block' => true]);
echo $this->Html->script('vendor/bootstrap/js/bootstrap.bundle.min.js', ['block' => true]);
echo $this->Html->script('vendor/jquery-easing/jquery.easing.min.js', ['block' => true]);
echo $this->Html->script('js/sb-admin-2.min.js', ['block' => true]);
?>
<!DOCTYPE html>
<html lang="en">

<head>

    <?= $this->Html->charset() ?>
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <meta name="description" content="">
    <meta name="author" content="">
    <?= $this->Html->meta('icon') ?>

    <title><?= $this->fetch('title') ?></title>

    <!-- Custom fonts for this template-->
    <?= $this->Html->css(['/vendor/fontawesome-free/css/all.min.css']) ?>
    <link
        href="https://fonts.googleapis.com/css?family=Nunito:200,200i,300,300i,400,400i,600,600i,700,700i,800,800i,900,900i"
        rel="stylesheet">

    <!-- Custom styles for this template-->
    <?= $this->Html->css(["sb-admin-2.min.css"]) ?>

    <?= $this->fetch('meta') ?>
    <?= $this->fetch('css') ?>

</head>

<body class="bg-gradient-primary">

    <!-- page content here -->
    <?= $this->Flash->render() ?>
    <?= $this->fetch('content') ?>

    <!-- fetch script -->
    <?= $this->fetch('script') ?>
</body>

</html>
