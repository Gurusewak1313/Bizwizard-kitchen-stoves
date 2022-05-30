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
            <?= $this->Html->link(__('Edit Estimated Time'), ['action' => 'edit', $estimatedTime->id], ['class' => 'side-nav-item']) ?>
            <?= $this->Form->postLink(__('Delete Estimated Time'), ['action' => 'delete', $estimatedTime->id], ['confirm' => __('Are you sure you want to delete # {0}?', $estimatedTime->id), 'class' => 'side-nav-item']) ?>
            <?= $this->Html->link(__('List Estimated Time'), ['action' => 'index'], ['class' => 'side-nav-item']) ?>
            <?= $this->Html->link(__('New Estimated Time'), ['action' => 'add'], ['class' => 'side-nav-item']) ?>
        </div>
    </aside>
    <div class="column-responsive column-80">
        <div class="estimatedTime view content">
            <h3><?= h($estimatedTime->id) ?></h3>
            <table>
                <tr>
                    <th><?= __('Est Time') ?></th>
                    <td><?= h($estimatedTime->est_time) ?></td>
                </tr>
                <tr>
                    <th><?= __('Id') ?></th>
                    <td><?= $this->Number->format($estimatedTime->id) ?></td>
                </tr>
            </table>
        </div>
    </div>
</div>
