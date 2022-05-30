<?php
/**
 * @var \App\View\AppView $this
 * @var \App\Model\Entity\Quote $quote
 */
?>

<div class="quote view content">
    <h3>Viewing Quote #<?= h($quote->id) ?></h3>

    <div class="justify-content-between mb-4">
        <a href="<?= $this->Url->build(['action' => 'index']) ?>"
           class="d-none d-sm-inline-block btn btn-sm btn-primary shadow-sm"><i
                class="fas fa-address-book fa-sm text-white-50"></i> List Quotes</a>

        <a href="<?= $this->Url->build(['action' => 'edit', $quote->id]) ?>"
           class="d-none d-sm-inline-block btn btn-sm btn-primary shadow-sm"><i
                class="fas fa-info-circle fa-sm text-white-50"></i> Edit Quote</a>
    </div>

    <table class="table table-bordered" id="dataTable" style="width:40%">
        <tr>
            <th style="width:30%"><?= __('Est Time') ?></th>
            <td><?= h($quote->est_time) ?></td>
        </tr>
        <tr>
            <th><?= __('Comments') ?></th>
            <td><?= h($quote->comments) ?></td>
        </tr>
        <tr>
            <th><?= __('Quote Request') ?></th>
            <td><?= $quote->has('quote_request') ? $this->Html->link($quote->quote_request->id, ['controller' => 'QuoteRequest', 'action' => 'view', $quote->quote_request->id]) : '' ?></td>
        </tr>
        <tr>
            <th><?= __('Id') ?></th>
            <td><?= $this->Number->format($quote->id) ?></td>
        </tr>
        <tr>
            <th><?= __('Initial Price') ?></th>
            <td><?= $this->Number->format($quote->inital_price) ?></td>
        </tr>
        <tr>
            <th><?= __('Final Price') ?></th>
            <td><?= $this->Number->format($quote->final_price) ?></td>
        </tr>
    </table>
</div>

