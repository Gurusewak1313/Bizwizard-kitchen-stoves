<?php
/**
 * @var \App\View\AppView $this
 * @var \App\Model\Entity\Stone $stone
 */
?>

<div class="stone form content">
    <h3>Add Stone Type</h3>
    <div class="justify-content-between mb-4">
        <a href="<?= $this->Url->build(['action' => 'index']) ?>"
           class="d-none d-sm-inline-block btn btn-sm btn-primary shadow-sm"><i
                class="fas fa-address-book fa-sm text-white-50"></i> List Stone Types</a>
        <p>&nbsp;</p>
        <div class="contact-form">
            <form id="contact" action="" method="post">
                <div class="row">
                    <?= $this->Form->create($stone) ?>
                    <div class="col-lg-12 col-md-12 col-sm-12">
                        <fieldset>
                            <legend><?= __('Add Stone') ?></legend>
                            <?php
                            echo $this->Form->control('stone_name');
                            echo $this->Form->control('stone_price_m2', [
                                'label' => 'Stone Price ($ per m<sup>3</sup>)',
                                'escape' => false,
                                'type'=>'number',
                                'pattern' => '[0-9]+([.][0-9]+)?',
                                'step'=>'0.01',
                                'min' => '0']);
                            ?>
                        </fieldset>
                        <?= $this->Form->button(__('Submit'), ['class' => 'btn btn-primary'],)?>
                        <?= $this->Form->button(__('Cancel'), ['class' => 'btn btn-danger'],)?>
                        <?= $this->Form->end() ?>
                    </div>
                </div>
            </form>
        </div>
    </div>
</div>
