<?php
/**
 * @var \App\View\AppView $this
 * @var \App\Model\Entity\Quote $quote
 * @var string[]|\Cake\Collection\CollectionInterface $quoteRequest
 * @var \App\Model\Entity\EstimatedTime[]|\Cake\Collection\CollectionInterface $estimated_time
 * @property $session
 */
use Cake\ORM\TableRegistry;

$estimatedTimeTable = TableRegistry::getTableLocator()->get('EstimatedTime');
$estimatedTime=$estimatedTimeTable->find('list', ['keyField' => 'id', 'valueField' => 'est_time']);

// Calling all() will execute the query
// and return the result set.
$estimatedTimeResults = $estimatedTime->all();

// Converting the query to a key-value array will also execute it.
$estTimeData = $estimatedTime->toArray();

$formTemplate =[
    'inputContainer' => '<div class="input {{type}}{{required}}">{{content}}</div>',
    'label' => '<label{{attrs}} class="form-label mt-3">{{text}}</label>',
    'input' => '<input type="{{type}}" name="{{name}}" class="form-control"{{attrs}}/>',
];
$this->Form->setTemplates($formTemplate);

?>

<div class="quote form content">
    <h3>Edit Quote #<?= h($quote->id) ?></h3>
    <div class="justify-content-between mb-4">
        <a href="<?= $this->Url->build(['action' => 'index']) ?>"
           class="d-none d-sm-inline-block btn btn-sm btn-primary shadow-sm"><i
                class="fas fa-address-book fa-sm text-white-50"></i> List Quotes</a>
        <p>&nbsp;</p>
        <div class="contact-form">
            <form id="contact" action="" method="post">
                <div class="row">
                    <?= $this->Form->create($quote) ?>
                    <div class="col-lg-12 col-md-12 col-sm-12">
                        <fieldset class="mb-4">
                            <legend><?= __('Edit Quote') ?></legend>
                            <?php
                                echo $this->Form->control('initial_price', ['readonly'=>'readonly']);
                                echo $this->Form->control('final_price', ['type' => 'number', 'pattern' => '[0-9]+([.,][0-9]+)?', 'step' => '0.01', 'min' => '0']);
                                echo $this->Form->label('Estimated Time*');
                                echo $this->Form->select('est_time_id', $estTimeData, ['class'=>"btn btn-primary btn-sm dropdown-toggle mt-4 mb-2 mr-5", 'style'=>"margin-left:20px"]);
                                echo $this->Form->control('comments');
                                echo $this->Form->hidden('quote_request_id', ['options' => $quoteRequest]);
                            ?>
                        </fieldset>
                        <?= $this->Form->button(__('Confirm Edit'), ['class' => 'btn btn-primary'],)?>
                        <?= $this->Form->button(__('Cancel'), ['class' => 'btn btn-danger'],)?>
                        <?= $this->Form->end() ?>
                    </div>
                </div>
            </form>
        </div>
    </div>
</div>
