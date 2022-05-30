<?php
/**
 * @var \App\View\AppView $this
 * @var \App\Model\Entity\Stone $stone
 */
?>
<div class="stone view content">
    <h3>Viewing Stone Type #<?= h($stone->id) ?></h3>

    <div class="justify-content-between mb-4">
        <a href="<?= $this->Url->build(['action' => 'index']) ?>"
           class="d-none d-sm-inline-block btn btn-sm btn-primary shadow-sm"><i
                class="fas fa-address-book fa-sm text-white-50"></i> List Stone Types</a>

        <a href="<?= $this->Url->build(['action' => 'edit', $stone->id]) ?>"
           class="d-none d-sm-inline-block btn btn-sm btn-primary shadow-sm"><i
                class="fas fa-info-circle fa-sm text-white-50"></i> Edit Stone Type</a>
    </div>

    <table class="table table-bordered" id="dataTable" style="width:40%">
        <tr>
            <th style="width:30%"><?= __('ID') ?></th>
            <td><?= $this->Number->format($stone->id) ?></td>
        </tr>
        <tr>
            <th><?= __('Stone Name') ?></th>
            <td><?= h($stone->stone_name) ?></td>
        </tr>
        <tr>
            <th><?= __('Stone Price m<sup>3</sup>') ?></th>
            <td><?php echo "$" . number_format($stone->stone_price_m2, 2, '.', ','); ?></td>
        </tr>
    </table>
</div>
