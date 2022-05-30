<?php
/**
 * @var \App\View\AppView $this
 * @var \App\Model\Entity\QuoteRequest $quoteRequest
 * @var \Cake\Collection\CollectionInterface|string[] $status
 */
?>
<div class="row">
    <aside class="column">
        <div class="side-nav">
            <h4 class="heading"><?= __('Actions') ?></h4>
            <?= $this->Html->link(__('List Quote Request'), ['action' => 'index'], ['class' => 'side-nav-item']) ?>
        </div>
    </aside>
    <div class="column-responsive column-80">
        <div class="quoteRequest form content">
            <?= $this->Form->create($quoteRequest) ?>
            <fieldset>
                <legend><?= __('Add Quote Request') ?></legend>
                <?php
                echo $this->Form->control('quote_date');
                echo $this->Form->control('cust_name');
                echo $this->Form->control('cust_email');
                echo $this->Form->control('cust_phone');
                echo $this->Form->control('stone_type');
                echo $this->Form->control('length');
                echo $this->Form->control('width');
                echo $this->Form->control('thickness');
                echo $this->Form->control('no_sink_cut');
                echo $this->Form->control('status_id', ['options' => $status]);
                ?>
            </fieldset>
            <?= $this->Form->button(__('Submit')) ?>
            <?= $this->Form->end() ?>
        </div>
    </div>
</div>
