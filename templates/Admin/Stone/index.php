<?php
/**
 * @var \App\View\AppView $this
 * @var \App\Model\Entity\Stone[]|\Cake\Collection\CollectionInterface $stone
 */
echo $this->Html->css('/vendor/datatables/dataTables.bootstrap4.min.css', ['block' => true]);
echo $this->Html->script('/vendor/datatables/jquery.dataTables.min.js', ['block' => true]);
echo $this->Html->script('/vendor/datatables/dataTables.bootstrap4.min.js', ['block' => true]);
echo $this->Html->script('/js/demo/datatables-demo.js', ['block' => true]);
?>
<div class="stone index content">
    <?= $this->Html->link(__('Add New Stone'), ['action' => 'add'], ['class' => 'button float-right btn btn-primary']) ?>
    <h3><?= __('Stone') ?></h3>
    <div class="table-responsive">
        <table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">
            <thead>
                <tr>
                    <th><?= $this->Paginator->sort('stone_name') ?></th>
                    <th><?= $this->Paginator->sort('stone_price_m2', 'Stone Price ($ per m<sup>2</sup>)', ['escape' => false]) ?></th>
                    <th class="actions"><?= __('Actions') ?></th>
                </tr>
            </thead>
            <tbody>
                <?php foreach ($stone as $stone): ?>
                <tr>
                    <td><?= h($stone->stone_name) ?></td>
                    <td><?php echo "$" . number_format($stone->stone_price_m2, 2, '.', ','); ?></td>
                    <td class="actions">
                        <?= $this->Html->link(__('View'), ['action' => 'view', $stone->id]) ?>
                        <?= $this->Html->link(__('Edit'), ['action' => 'edit', $stone->id]) ?>
                        <?= $this->Form->postLink(__('Delete'), ['action' => 'delete', $stone->id], ['confirm' => __('Are you sure you want to delete # {0}?', $stone->id)]) ?>
                    </td>
                </tr>
                <?php endforeach; ?>
            </tbody>
        </table>
    </div>
</div>
