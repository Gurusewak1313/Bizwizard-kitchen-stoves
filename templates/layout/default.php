
<!DOCTYPE html>
<html lang="en">

<head>

    <?= $this->Html->charset() ?>
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <link href="https://fonts.googleapis.com/css?family=Poppins:100,200,300,400,500,600,700,800,900&display=swap" rel="stylesheet">

    <title><?= $this->fetch('title') ?></title>
    <?= $this->Html->meta('icon') ?>
    <!-- Bootstrap core CSS -->
    <?= $this->Html->css('/vendor/bootstrap/css/bootstrap.min.css') ?>

    <?= $this->fetch('meta') ?>
    <?= $this->fetch('css') ?>

    <!-- Additional CSS Files -->
    <?= $this->Html->css('/assets/css/fontawesome.css') ?>
    <?= $this->Html->css('/vendor/bootstrap/css/bootstrap.min.css') ?>

    <?= $this->Html->css('/assets/css/style.css') ?>
    <?= $this->Html->css('/assets/css/owl.css') ?>

</head>
<body>
<header class="">
    <nav class="navbar navbar-expand-lg">
        <div class="container">
            <a class="navbar-brand" href="/"><h2>Biz <em>Wizard</em></h2></a>
            <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarResponsive" aria-controls="navbarResponsive" aria-expanded="false" aria-label="Toggle navigation">
                <span class="navbar-toggler-icon"></span>
            </button>
            <div class="collapse navbar-collapse" id="navbarResponsive">
                <ul class="navbar-nav ml-auto">
                    <li class="nav-item"><a class="nav-link" href="/">Home</a></li>
                    <li class="nav-item"><a class="nav-link" href="/QuoteRequest/add">Get A Quote</a></li>
                </ul>
            </div>
        </div>
    </nav>
</header>




</body>


<!-- Page Content -->
<?= $this->Flash->render() ?>
<?= $this->fetch('content') ?>

<!-- Banner Starts Here -->
<!-- Banner Ends Here -->

<!-- Bootstrap core JavaScript -->
<?php echo $this->Html->script('/vendor/jquery/jquery.min.js');?>
<?php echo $this->Html->script('/vendor/bootstrap/js/bootstrap.bundle.min.js');?>
<!-- Additional Scripts -->
<?php echo $this->Html->script('/assets/js/custom.js');?>
<?php echo $this->Html->script('/assets/js/owl.js');?>
<?= $this->fetch('script') ?>
</html>
