<?php
/**
 * @var \App\View\AppView $this
 * @var \App\Model\Entity\QuoteRequest $quoteRequest
 */
?>

<div class="quoteRequest view content">
    <div class="justify-content-between mb-4">
        <h3>View Quote Request #<?= h($quoteRequest->id) ?></h3>
        <a href="<?= $this->Url->build(['action' => 'index']) ?>"
           class="d-none d-sm-inline-block btn btn-sm btn-primary shadow-sm"><i
                class="fas fa-address-book fa-sm text-white-50"></i> List Quote Requests</a>

        <a href="<?= $this->Url->build(['action' => 'edit', $quoteRequest->id]) ?>"
           class="d-none d-sm-inline-block btn btn-sm btn-primary shadow-sm"><i
                class="fas fa-info-circle fa-sm text-white-50"></i> Edit Quote Request</a>
    </div>

    <table class="table table-bordered" id="dataTable" style="width:40%">
        <tr>
            <th style="width:30%"><?= __('Quote Request ID') ?></th>
            <td><?= $this->Number->format($quoteRequest->id) ?></td>
        </tr>
        <tr>
            <th><?= __('Quote Date') ?></th>
            <td><?php echo date('d/m/Y', strtotime($quoteRequest->quote_date)); ?></td> // display date in au format
        </tr>
        <tr>
            <th><?= __('Full Name') ?></th>
            <td><?= h($quoteRequest->cust_name); ?></td>
        </tr>
        <tr>
            <th><?= __('Email Address') ?></th>
            <td><?= h($quoteRequest->cust_email) ?></td>
        </tr>
        <tr>
            <th><?= __('Phone Number') ?></th>
            <td><?= number_format($quoteRequest->cust_phone, 0, '.', '') ?></td>
        </tr>
        <tr>
            <th><?= __('Residential Address') ?></th>
            <td><?= h($quoteRequest->street_number) . " " . h($quoteRequest->street_name) . " " . h($quoteRequest->suburb) . " " . h($quoteRequest->postcode) . " " . h($quoteRequest->state) ?></td> // display full address
        </tr>
        <tr>
            <th><?= __('Stone Type Required') ?></th>
            <td><?= (h($quoteRequest->stone_type)); ?></td>
        </tr>
        <tr>
            <th><?= __('Length (metres)') ?></th>
            <td><?= $this->Number->format($quoteRequest->length) ?> m</td>
        </tr>
        <tr>
            <th><?= __('Width (metres)') ?></th>
            <td><?= $this->Number->format($quoteRequest->width) ?> m</td>
        </tr>
        <tr>
            <th><?= __('Thickness (centimetres)') ?></th>
            <td><?= $this->Number->format($quoteRequest->thickness) ?> cm</td>
        </tr>
        <tr>
            <th><?= __('Number of Sink Cut') ?></th>
            <td><?= $this->Number->format($quoteRequest->no_sink_cut) ?></td>
        </tr>

    </table>
</div>
