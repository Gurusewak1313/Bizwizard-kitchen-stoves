<?php
/**
 * @var \App\View\AppView $this
 * @var \App\Model\Entity\Status $status
 */
?>
<div class="row">
    <aside class="column">
        <div class="side-nav">
            <h4 class="heading"><?= __('Actions') ?></h4>
            <?= $this->Html->link(__('Edit Status'), ['action' => 'edit', $status->id], ['class' => 'side-nav-item']) ?>
            <?= $this->Form->postLink(__('Delete Status'), ['action' => 'delete', $status->id], ['confirm' => __('Are you sure you want to delete # {0}?', $status->id), 'class' => 'side-nav-item']) ?>
            <?= $this->Html->link(__('List Status'), ['action' => 'index'], ['class' => 'side-nav-item']) ?>
            <?= $this->Html->link(__('New Status'), ['action' => 'add'], ['class' => 'side-nav-item']) ?>
        </div>
    </aside>
    <div class="column-responsive column-80">
        <div class="status view content">
            <h3><?= h($status->id) ?></h3>
            <table>
                <tr>
                    <th><?= __('Id') ?></th>
                    <td><?= $this->Number->format($status->id) ?></td>
                </tr>
                <tr>
                    <th><?= __('Status Name') ?></th>
                    <td><?= $this->Number->format($status->status_name) ?></td>
                </tr>
            </table>
            <div class="related">
                <h4><?= __('Related Quote Request') ?></h4>
                <?php if (!empty($status->quote_request)) : ?>
                <div class="table-responsive">
                    <table>
                        <tr>
                            <th><?= __('Id') ?></th>
                            <th><?= __('Quote Date') ?></th>
                            <th><?= __('Cust Name') ?></th>
                            <th><?= __('Cust Email') ?></th>
                            <th><?= __('Cust Phone') ?></th>
                            <th><?= __('Residential Address') ?></th>
                            <th><?= __('Stone Type') ?></th>
                            <th><?= __('Length') ?></th>
                            <th><?= __('Width') ?></th>
                            <th><?= __('Thickness') ?></th>
                            <th><?= __('No Sink Cut') ?></th>
                            <th><?= __('Status Id') ?></th>
                            <th class="actions"><?= __('Actions') ?></th>
                        </tr>
                        <?php foreach ($status->quote_request as $quoteRequest) : ?>
                        <tr>
                            <td><?= h($quoteRequest->id) ?></td>
                            <td><?= h($quoteRequest->quote_date) ?></td>
                            <td><?= h($quoteRequest->cust_name) ?></td>
                            <td><?= h($quoteRequest->cust_email) ?></td>
                            <td><?= h($quoteRequest->cust_phone) ?></td>
                            <td><?= h($quoteRequest->street_number) . " " . h($quoteRequest->street_name) . " " . h($quoteRequest->suburb) . " " . h($quoteRequest->postcode) . " " . h($quoteRequest->state) ?></td>
                            <td><?= h($quoteRequest->stone_type) ?></td>
                            <td><?= h($quoteRequest->length) ?></td>
                            <td><?= h($quoteRequest->width) ?></td>
                            <td><?= h($quoteRequest->thickness) ?></td>
                            <td><?= h($quoteRequest->no_sink_cut) ?></td>
                            <td><?= h($quoteRequest->status_id) ?></td>
                            <td class="actions">
                                <?= $this->Html->link(__('View'), ['controller' => 'QuoteRequest', 'action' => 'view', $quoteRequest->id]) ?>
                                <?= $this->Html->link(__('Edit'), ['controller' => 'QuoteRequest', 'action' => 'edit', $quoteRequest->id]) ?>
                                <?= $this->Form->postLink(__('Delete'), ['controller' => 'QuoteRequest', 'action' => 'delete', $quoteRequest->id], ['confirm' => __('Are you sure you want to delete # {0}?', $quoteRequest->id)]) ?>
                            </td>
                        </tr>
                        <?php endforeach; ?>
                    </table>
                </div>
                <?php endif; ?>
            </div>
        </div>
    </div>
</div>
