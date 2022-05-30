<?php
/**
 * @var \App\View\AppView $this
 * @var \App\Model\Entity\QuoteRequest $quoteRequest
 * @var \Cake\Collection\CollectionInterface|string[] $status
 * @var \App\Model\Entity\Stone[]|\Cake\Collection\CollectionInterface $stone

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
    'label' => '<label{{attrs}} class="form-label">{{text}}</label>',
    'input' => '<input type="{{type}}" name="{{name}}" class="form-control"{{attrs}}/>',
];
$this->Form->setTemplates($formtemplate);
?>
<!-- Bootstrap core CSS -->
<?= $this->Html->css('/vendor/bootstrap/css/bootstrap.min.css') ?>

<?= $this->fetch('meta') ?>
<?= $this->fetch('css') ?>

<!-- Additional CSS Files -->
<?= $this->Html->css('/assets/css/fontawesome.css') ?>
<?= $this->Html->css('/vendor/bootstrap/css/bootstrap.min.css') ?>

<?= $this->Html->css('/assets/css/style.css') ?>
<?= $this->Html->css('/assets/css/owl.css') ?>
<body>
<div class="page-heading contact-heading header-text" style="background-image: url('/BizWizard/webroot/assets/images/heading-4-1920x500.jpg');">
    <div class="container">
        <div class="row">
            <div class="col-md-12">
                <div class="text-content">
                    <h4>Biz Wizard</h4>
                    <h2>Get A Quote</h2>
                </div>
            </div>
        </div>
    </div>
</div>
<div class="col-md-8" style="padding-left: 50px; padding-top: 70px">
    <h4 style="padding-bottom: 50px">Please fill in the required information to request a Quote.</h4>
    <h6 style="padding-bottom: 50px">fields with * are mandatory</h6>
    <div class="contact-form">
        <form id="contact" action="" method="post">
            <div class="row">
                <?= $this->Form->create($quoteRequest) ?>
                <div class="col-lg-12 col-md-12 col-sm-12">
                    <h3 style="padding-bottom: 20px">Customer Details</h3>
                    <fieldset>
                        <?php
                        echo $this->Form->control('cust_name',['label'=>'Full Name*','pattern'=>'[A-Za-z ]{1,32}','title'=>'Enter a Valid Name.']);
                        echo $this->Form->control('cust_email',['label'=>'Email Address*','type'=>'email']);
                        echo $this->Form->control('cust_phone',['label'=>'Phone Number*', 'type'=>'text', 'pattern'=>'[0][0-9]{9}','title'=>'Please enter a valid phone number, format:0123-456-789 .','placeholder'=>'0123-456-789']);
                        echo $this->Form->control('street_number',['label'=>'Street No. *']);
                        echo $this->Form->control('street_name',['label'=>'Street Name *','pattern'=>'[A-Za-z ]{1,32}','title'=>'Please Enter a valid street name.']);
                        echo $this->Form->control('suburb',['label'=>'Suburb *','pattern'=>'[A-Za-z ]{1,32}','title'=>'Please enter a valid suburb of Australia']);
                        echo $this->Form->control('postcode',['label'=>'Postcode *', 'pattern'=>'[0-9]{4}','title'=>'Please enter a valid postcode with 4 digits long']);
                        echo $this->Form->label('State *');
                        echo $this->Form->select('state', ['VIC', 'QLD', 'NSW','NT', 'ACT','TAS','WA', 'SA']);
                        ?>
                        <h3 style="padding-bottom: 20px">Stone requirements and Measurements</h3>
                        <?php
                        echo $this->Form->label('Stone Type Required*');
                        echo $this->Form->select('stone_type',$stoneData);
                        echo $this->Form->control('length',['label'=>'Length of the stone cut (in metres)*','pattern'=>'[0-9]','title'=>'Enter a valid length.', 'min' => '0']);
                        echo $this->Form->control('width',['label'=>'Width of the stone cut (in metres)*','pattern'=>'[0-9]','title'=>'Enter a valid width.', 'min' => '0']);
                        echo $this->Form->control('thickness',['label'=>'Thickness of the stone cut (in centimetres)*','pattern'=>'[0-9]','title'=>'Enter a valid thickness.', 'min' => '0']);
                        echo $this->Form->control('no_sink_cut',['label'=>'Number of Sink Cuts*','pattern'=>'[0-9]','title'=>'Enter a valid Number of sink cuts.','placeholder'=>'Number of Sink Cuts in stone', 'min' => '0']);
                        echo $this->Form->hidden('status_id');
                        ?>
                    </fieldset>
                    <?= $this->Form->button(__('Submit the Request'), ['class' => 'btn btn-danger'])?>
                </div>
            </div>
        </form>
    </div>
</div>
<footer>
    <div class="container">
        <div class="row">
            <div class="col-md-12">
                <div class="inner-content">
                    <p>Copyright © 2022 Biz Wizard</p>
                </div>
            </div>
        </div>
    </div>
</footer>
</body>
