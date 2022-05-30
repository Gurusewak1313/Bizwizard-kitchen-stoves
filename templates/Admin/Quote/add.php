<?php
/**
 * @var \App\View\AppView $this
 * @var \App\Model\Entity\Quote $quote
 * @var \Cake\Collection\CollectionInterface|string[] $quoteRequest
 */
$formtemplate =[
    'inputContainer' => '<div class="input {{type}}{{required}}", style="margin-left: 20px;margin-right: 500px">{{content}}</div>',
    'label' => '<label{{attrs}} class="form-label", style="margin-bottom: 2px">{{text}}</label>',
    'input' => '<input type="{{type}}" name="{{name}}" class="form-control", style="margin-bottom: 15px"{{attrs}}/>',
];
$this->Form->setTemplates($formtemplate);

use Cake\ORM\TableRegistry;

$quoteSession = $this->request->getSession()->read('quoteRequest');
$quote_id = $quoteSession;

$stoneTable = TableRegistry::getTableLocator()->get('Stone');
$stone=$stoneTable->find('all',['conditions'=>['Stone.id'=>$quote_id['stone_type']]]);

// Calling all() will execute the query
// and return the result set.
$results = $stone->all();

// Converting the query to a key-value array will also execute it.
$data = $stone->toArray();

$estimatedTimeTable = TableRegistry::getTableLocator()->get('EstimatedTime');
$estimated_time=$estimatedTimeTable->find('list', ['keyField' => 'id', 'valueField' => 'est_time']);

// Calling all() will execute the query
// and return the result set.
$estTimeResults = $estimated_time->all();

// Converting the query to a key-value array will also execute it.
$estTimeData = $estimated_time->toArray();

?>

<?php
?>
<h1 class = "h3 mb-2 text-gray-800">Respond to the Quote #<?=$quote_id['id']?></h1>
<h2 class = "h4 mb-2 text-gray-800">Quote Requested</h2>
<table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">
    <thead>
    <tr>
        <th scope="col">Entry</th>
        <th scope="col">Details</th>
    </tr>
    </thead>
    <tbody>
    <tr>
        <th scope="row">Quote Date</th>
        <td><?=$quote_id['quote_date']?></td>

    </tr>
    <tr>
        <th scope="row">Customer Full Name</th>
        <td><?=$quote_id['cust_name']?></td>

    </tr><tr>
        <th scope="row">Customer Email</th>
        <td><?=$quote_id['cust_email']?></td>

    </tr><tr>
        <th scope="row">Customer Phone</th>
        <td><?=$quote_id['cust_phone']?></td>

    </tr><tr>
        <th scope="row">Customer Residential Address</th>
        <td><?=$quote_id['street_number']." ".$quote_id['street_name']." ".$quote_id['suburb']." ".$quote_id['state']." ".$quote_id['postcode']?></td>

    </tr><tr>
        <th scope="row">Stone Required</th>
        <td><?=$data[0]['stone_name']?></td>

    </tr><tr>
        <th scope="row">Length (m)</th>
        <td><?=$quote_id['length']?></td>

    </tr><tr>
        <th scope="row">Width (m)</th>
        <td><?=$quote_id['width']?></td>

    </tr><tr>
        <th scope="row">Thickness (cm)</th>
        <td><?=$quote_id['thickness']?></td>

    </tr><tr>
        <th scope="row">Sink Cuts Requested</th>
        <td><?=$quote_id['no_sink_cut']?></td>
    </tr>
    </tbody>
</table>

<?= $this->Form->create($quote) ?>
<h2 class = "h3 mb-2 text-gray-800", style="margin-top: 10px">Record Quote Response</h2>
<h5 class = "h5 mb-2 text-gray-800", style="margin-top: 10px">All Fields with * are mandatory.</h5>


    <?php
        $volume = (int)$quote_id['length']*(int)$quote_id['width']*(int)$quote_id['thickness'];
        $cost = $volume*$data[0]['stone_price_m2']*1.5;
        echo $this->Form->control('initial_price',['label' => 'Initial Price ($)','default'=>$cost, 'readonly'=>'readonly']);
        echo $this->Form->control('final_price', ['label'=>'Final Price ($) *', 'type' => 'number', 'pattern' => '[0-9]+([.,][0-9]+)?','step' => '0.01', 'min' => '0']);
        echo $this->Form->label('Estimated Time *',null,['style'=>'margin-left: 20px']);
        echo $this->Form->select('est_time_id',$estTimeData,['class'=>'btn btn-primary btn-sm dropdown-toggle','style'=>'margin-left: 20px']);
        echo $this->Form->control('comments',['label'=>'Comments *', 'class'=>'form-control','rows'=>'3']);
        echo $this->Form->hidden('quote_request_id',['default'=>(int)$quote_id['id']]);
        ?>
<?= $this->Form->button(__('Submit'),['class'=>'btn btn-primary','style'=>'margin-top: 10px; margin-left: 200px; margin-bottom: 20px']) ?>
<?= $this->Form->end() ?>
