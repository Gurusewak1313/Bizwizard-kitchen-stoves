<?php
/**
 * @var \App\View\AppView $this
 * @var \App\Model\Entity\QuoteRequest[]|\Cake\Collection\CollectionInterface $quoteRequest
 */
echo $this->Html->css('/vendor/datatables/dataTables.bootstrap4.min.css', ['block' => true]);
echo $this->Html->script('/vendor/datatables/jquery.dataTables.min.js', ['block' => true]);
echo $this->Html->script('/vendor/datatables/dataTables.bootstrap4.min.js', ['block' => true]);
echo $this->Html->script('/js/demo/datatables-demo.js', ['block' => true]);
?>

<div class="quoteRequest index content">
    <h1 class="h3 mb-2 text-gray-800"><?= __('Quote Request') ?></h1>
    <div class="table-responsive">
        <table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">
            <thead>
                <tr>
                    <th><?= $this->Paginator->sort('quote_date') ?></th>
                    <th><?= $this->Paginator->sort('cust_name') ?></th>
                    <th><?= $this->Paginator->sort('cust_email') ?></th>
                    <th><?= $this->Paginator->sort('cust_phone') ?></th>
                    <th><?= $this->Paginator->sort('suburb') ?></th>
                    <th><?= $this->Paginator->sort('postcode') ?></th>
                    <th><?= $this->Paginator->sort('state') ?></th>
                    <th><?= $this->Paginator->sort('stone_type') ?></th>
                    <th><?= $this->Paginator->sort('length', 'Length (m)') ?></th>
                    <th><?= $this->Paginator->sort('width', 'Width (m)') ?></th>
                    <th><?= $this->Paginator->sort('thickness', 'Thickness (cm)') ?></th>
                    <th><?= $this->Paginator->sort('no_sink_cut') ?></th>
                    <th><?= $this->Paginator->sort('status_id') ?></th>
                    <th class="actions"><?= __('Actions') ?></th>
                </tr>
            </thead>
            <tbody>
                <?php foreach ($quoteRequest as $quoteRequest): ?>
                <tr>
                    <td><?= $this->Number->format($quoteRequest->id) ?></td>
                    <td><?php echo date('d/m/Y', strtotime($quoteRequest->quote_date)); ?></td> // display date in au format
                    <td><?= h($quoteRequest->cust_name) ?></td>
                    <td><?= h($quoteRequest->cust_email) ?></td>
                    <td><?= h($quoteRequest->cust_phone) ?></td>
                    <td><?= h($quoteRequest->suburb) ?></td>
                    <td><?= h($quoteRequest->postcode) ?></td>
                    <td><?= h($quoteRequest->state) ?></td>
                    <td><?= $quoteRequest->has('stone_type') ? $this->Text->autoParagraph($quoteRequest->stone->stone_name, ['controller' => 'Stone', 'action' => 'view', $quoteRequest->stone->stone_name]) : '' ?> // display stone name
                    <td><?= $this->Number->format($quoteRequest->length) ?></td>
                    <td><?= $this->Number->format($quoteRequest->width) ?></td>
                    <td><?= $this->Number->format($quoteRequest->thickness) ?></td>
                    <td><?= $this->Number->format($quoteRequest->no_sink_cut) ?></td>
                    <td><?= $quoteRequest->has('status') ? $this->Text->autoParagraph($quoteRequest->status->status_name, ['controller' => 'Status', 'action' => 'view', $quoteRequest->status->status_name]) : '' ?> // display full status string
                    </td>
                    <td class="actions">
                        <?= $this->Html->link(__('Respond'), ['action' => 'respond', $quoteRequest->id]) ?>
                        <?= $this->Html->link(__('View'), ['action' => 'view', $quoteRequest->id]) ?>
                        <?= $this->Html->link(__('Edit'), ['action' => 'edit', $quoteRequest->id]) ?>
                        <?= $this->Form->postLink(__('Delete'), ['action' => 'delete', $quoteRequest->id], ['confirm' => __('Are you sure you want to delete # {0}?', $quoteRequest->id)]) ?>
                    </td>
                </tr>
                <?php endforeach; ?>
            </tbody>
        </table>
    </div>
</div>
