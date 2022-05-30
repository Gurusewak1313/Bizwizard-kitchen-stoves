<?php
/**
 * @var \App\View\AppView $this
 * @var \App\Model\Entity\QuoteRequest $quoteRequest
 * @var string[]|\Cake\Collection\CollectionInterface $status
 * @var string[]|\Cake\Collection\CollectionInterface $stone

 */
use Cake\ORM\TableRegistry;

$stoneTable = TableRegistry::getTableLocator()->get('Stone');
$stone=$stoneTable->find('list', ['keyField' => 'id', 'valueField' => 'stone_name']);

// Calling all() will execute the query
// and return the result set.
$stoneResults = $stone->all();

// Converting the query to a key-value array will also execute it.
$stoneData = $stone->toArray();

$formtemplate =[
    'inputContainer' => '<div class="input {{type}}{{required}}">{{content}}</div>',
    'label' => '<label{{attrs}} class="form-label mt-3">{{text}}</label>',
    'input' => '<input type="{{type}}" name="{{name}}" class="form-control"{{attrs}}/>',
];
$this->Form->setTemplates($formtemplate);
?>

<div class="quoteRequest form content">
    <h3>Edit Quote Request #<?= h($quoteRequest->id) ?></h3>
    <div class="justify-content-between mb-4">
        <a href="<?= $this->Url->build(['action' => 'index']) ?>"
            class="d-none d-sm-inline-block btn btn-sm btn-primary shadow-sm"><i
                class="fas fa-address-book fa-sm text-white-50"></i> List Quote Requests</a>
        <p>&nbsp;</p>
        <div class="contact-form">
            <form id="contact" action="" method="post">
                <div class="row">
                    <?= $this->Form->create($quoteRequest) ?>
                    <div class="col-lg-12 col-md-12 col-sm-12">
                        <fieldset class="mb-4">
                            <?php
                        echo $this->Form->control('quote_date',['label'=>'Date*', 'readonly' => 'readonly']);
                        echo $this->Form->control('cust_name',['label'=>'Full Name*']);
                        echo $this->Form->control('cust_email',['label'=>'Email Address*', 'type'=>'email']);
                        echo $this->Form->control('cust_phone',['label'=>'Phone Number*', 'type'=>'text', 'pattern'=>'[0][0-9]{9}','title'=>'Please enter a valid phone number.']);
                        echo $this->Form->control('street_number',['label'=>'Street No. *']);
                        echo $this->Form->control('street_name',['label'=>'Street Name *','pattern'=>'[A-Za-z ]{1,32}','title'=>'Please Enter a valid street name.']);
                        echo $this->Form->control('suburb',['label'=>'Suburb *','pattern'=>'[A-Za-z ]{1,32}','title'=>'Please enter a valid suburb of Australia']);
                        echo $this->Form->control('postcode',['label'=>'Postcode *', 'pattern'=>'[0-9]{4}','title'=>'Please enter a valid postcode with 4 digits long']);
                        echo $this->Form->label('State *');
                        echo $this->Form->select('state', ['VIC', 'QLD', 'NSW','NT', 'ACT','TAS','WA', 'SA'], ['class'=>"btn btn-primary btn-sm dropdown-toggle mt-4 mb-2 mr-5", 'style'=>"margin-left:20px"]);
                        echo $this->Form->label('Stone Type Required*');
                        echo $this->Form->select('stone_type', $stoneData, ['class'=>"btn btn-primary btn-sm dropdown-toggle mt-4 mb-2 mr-5", 'style'=>"margin-left:20px"]);
                        echo $this->Form->control('length',['label'=>'Length of the stone cut (m)*', 'type' => 'number', 'pattern'=>'[0-9]', 'min' => '0']);
                        echo $this->Form->control('width',['label'=>'Width of the stone cut (m)*', 'type' => 'number', 'pattern'=>'[0-9]', 'min' => '0']);
                        echo $this->Form->control('thickness',['label'=>'Thickness of the stone cut (cm)*', 'type' => 'number', 'pattern'=>'[0-9]', 'min' => '0']);
                        echo $this->Form->control('no_sink_cut',['label'=>'Number of Sink Cuts*', 'type' => 'number', 'pattern'=>'[0-9]', 'min' => '0']);
                        echo $this->Form->hidden('status_id');
                        ?>
                        </fieldset>
                        <?= $this->Form->button(__('Confirm Edit'), ['class' => 'btn btn-primary'],)?>
                        <?= $this->Form->button(__('Cancel'), ['class' => 'btn btn-danger'],)?>
                        <?= $this->Form->end()?>
                    </div>
                </div>
            </form>
        </div>
    </div>
