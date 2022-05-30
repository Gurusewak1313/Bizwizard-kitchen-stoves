<?php
/**
 * @var \App\View\AppView $this
 * @var \App\Model\Entity\Quote[]|\Cake\Collection\CollectionInterface $quote
 */
echo $this->Html->css('/vendor/datatables/dataTables.bootstrap4.min.css', ['block' => true]);
echo $this->Html->script('/vendor/datatables/jquery.dataTables.min.js', ['block' => true]);
echo $this->Html->script('/vendor/datatables/dataTables.bootstrap4.min.js', ['block' => true]);
echo $this->Html->script('/js/demo/datatables-demo.js', ['block' => true]);
?>
<div class="quote index content">
    <h3><?= __('Quote') ?></h3>
    <div class="table-responsive">
        <table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">
            <thead>
            <tr>
                <th><?= $this->Paginator->sort('id', 'ID') ?></th>
                <th><?= $this->Paginator->sort('initial_price', 'Initial Quote Price') ?></th>
                <th><?= $this->Paginator->sort('final_price', 'Final Quote Price') ?></th>
                <th><?= $this->Paginator->sort('est_time_id', 'Estimated Time') ?></th>
                <th><?= $this->Paginator->sort('comments', 'Comments') ?></th>
                <th><?= $this->Paginator->sort('quote_request_id', 'Quote Request Reference ID') ?></th>
                <th class="actions"><?= __('Actions') ?></th>
            </tr>
            </thead>
            <tbody>
            <?php foreach ($quote as $quote): ?>
                <tr>
                    <td><?= $this->Number->format($quote->id) ?></td>
                    <td><?= $this->Number->format($quote->initial_price) ?></td>
                    <td><?= $this->Number->format($quote->final_price) ?></td>
                    <td><?= $quote->has('est_time_id') ? $this->Text->autoParagraph($quote->estimated_time->est_time, ['controller' => 'EstimatedTime', 'action' => 'view', $quote->estimated_time->est_time]) : '' ?>
                    <td><?= h($quote->comments) ?></td>
                    <td><?= $quote->has('quote_request') ? $this->Html->link($quote->quote_request->id, ['controller' => 'QuoteRequest', 'action' => 'view', $quote->quote_request->id]) : '' ?></td>
                    <td class="actions">
                        <?= $this->Html->link(__('View'), ['action' => 'view', $quote->id]) ?>
                        <?= $this->Html->link(__('Edit'), ['action' => 'edit', $quote->id]) ?>
                        <?= $this->Form->postLink(__('Delete'), ['action' => 'delete', $quote->id], ['confirm' => __('Are you sure you want to delete # {0}?', $quote->id)]) ?>
                    </td>
                </tr>
            <?php endforeach; ?>
            </tbody>
        </table>
    </div>
</div>
