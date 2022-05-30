<?php
/**
 * @var \App\View\AppView $this
 * @var \App\Model\Entity\Contact $contact
 */
?>

<!-- Bootstrap core CSS -->
<?= $this->Html->css('/vendor/bootstrap/css/bootstrap.min.css') ?>

<?= $this->fetch('meta') ?>
<?= $this->fetch('css') ?>

<!-- Additional CSS Files -->
<?= $this->Html->css('/assets/css/fontawesome.css') ?>
<?= $this->Html->css('/vendor/bootstrap/css/bootstrap.min.css') ?>

<?= $this->Html->css('/assets/css/style.css') ?>
<?= $this->Html->css('/assets/css/owl.css') ?>

<body>
<div class="page-heading contact-heading header-text" style="background-image: url('/assets/images/heading-4-1920x500.jpg');">
    <div class="container">
        <div class="row">
            <div class="col-md-12">
                <div class="text-content">
                    <h4>Biz Wizard</h4>
                    <h2>Get A Quote</h2>
                </div>
            </div>
        </div>
    </div>
</div>

<div class="row">
    <aside class="column">
        <div class="side-nav">
            <h4 class="heading"><?= __('Actions') ?></h4>
            <?= $this->Html->link(__('Edit Contact'), ['action' => 'edit', $contact->phone], ['class' => 'side-nav-item']) ?>
            <?= $this->Form->postLink(__('Delete Contact'), ['action' => 'delete', $contact->phone], ['confirm' => __('Are you sure you want to delete # {0}?', $contact->phone), 'class' => 'side-nav-item']) ?>
            <?= $this->Html->link(__('List Contact'), ['action' => 'index'], ['class' => 'side-nav-item']) ?>
            <?= $this->Html->link(__('New Contact'), ['action' => 'add'], ['class' => 'side-nav-item']) ?>
        </div>
    </aside>
    <div class="column-responsive column-80">
        <div class="contact view content">
            <h3><?= h($contact->phone) ?></h3>
            <table>
                <tr>
                    <th><?= __('Phone') ?></th>
                    <td><?= $this->Number->format($contact->phone) ?></td>
                </tr>
                <tr>
                    <th><?= __('Email') ?></th>
                    <td><?= $this->Number->format($contact->email) ?></td>
                </tr>
            </table>
        </div>
    </div>
</div>

<footer>
    <div class="container">
        <div class="row">
            <div class="col-md-12">
                <div class="inner-content">
                    <p>Copyright © 2022 Biz Wizard</p>
                </div>
            </div>
        </div>
    </div>
</footer>
</body>
