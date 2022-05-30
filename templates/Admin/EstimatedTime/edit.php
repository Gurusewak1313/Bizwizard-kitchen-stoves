<?php
/**
 * @var \App\View\AppView $this
 * @var \App\Model\Entity\EstimatedTime $estimatedTime
 */
?>
<div class="row">
    <aside class="column">
        <div class="side-nav">
            <h4 class="heading"><?= __('Actions') ?></h4>
            <?= $this->Form->postLink(
                __('Delete'),
                ['action' => 'delete', $estimatedTime->id],
                ['confirm' => __('Are you sure you want to delete # {0}?', $estimatedTime->id), 'class' => 'side-nav-item']
            ) ?>
            <?= $this->Html->link(__('List Estimated Time'), ['action' => 'index'], ['class' => 'side-nav-item']) ?>
        </div>
    </aside>
    <div class="column-responsive column-80">
        <div class="estimatedTime form content">
            <?= $this->Form->create($estimatedTime) ?>
            <fieldset>
                <legend><?= __('Edit Estimated Time') ?></legend>
                <?php
                    echo $this->Form->control('est_time');
                ?>
            </fieldset>
            <?= $this->Form->button(__('Submit')) ?>
            <?= $this->Form->end() ?>
        </div>
    </div>
</div>
