<?php
/**
 * @var \App\View\AppView $this
 * @var \App\Model\Entity\EstimatedTime[]|\Cake\Collection\CollectionInterface $estimatedTime
 */
?>
<div class="estimatedTime index content">
    <?= $this->Html->link(__('New Estimated Time'), ['action' => 'add'], ['class' => 'button float-right']) ?>
    <h3><?= __('Estimated Time') ?></h3>
    <div class="table-responsive">
        <table>
            <thead>
                <tr>
                    <th><?= $this->Paginator->sort('id') ?></th>
                    <th><?= $this->Paginator->sort('est_time') ?></th>
                    <th class="actions"><?= __('Actions') ?></th>
                </tr>
            </thead>
            <tbody>
                <?php foreach ($estimatedTime as $estimatedTime): ?>
                <tr>
                    <td><?= $this->Number->format($estimatedTime->id) ?></td>
                    <td><?= h($estimatedTime->est_time) ?></td>
                    <td class="actions">
                        <?= $this->Html->link(__('View'), ['action' => 'view', $estimatedTime->id]) ?>
                        <?= $this->Html->link(__('Edit'), ['action' => 'edit', $estimatedTime->id]) ?>
                        <?= $this->Form->postLink(__('Delete'), ['action' => 'delete', $estimatedTime->id], ['confirm' => __('Are you sure you want to delete # {0}?', $estimatedTime->id)]) ?>
                    </td>
                </tr>
                <?php endforeach; ?>
            </tbody>
        </table>
    </div>
    <div class="paginator">
        <ul class="pagination">
            <?= $this->Paginator->first('<< ' . __('first')) ?>
            <?= $this->Paginator->prev('< ' . __('previous')) ?>
            <?= $this->Paginator->numbers() ?>
            <?= $this->Paginator->next(__('next') . ' >') ?>
            <?= $this->Paginator->last(__('last') . ' >>') ?>
        </ul>
        <p><?= $this->Paginator->counter(__('Page {{page}} of {{pages}}, showing {{current}} record(s) out of {{count}} total')) ?></p>
    </div>
</div>
