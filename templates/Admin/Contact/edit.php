<?php
/**
 * @var \App\View\AppView $this
 * @var \App\Model\Entity\Contact $contact
 */
$formtemplate =[
    'inputContainer' => '<div class="input {{type}}{{required}}">{{content}}</div>',
    'label' => '<label{{attrs}} class="form-label">{{text}}</label>',
    'input' => '<input type="{{type}}" name="{{name}}" class="form-control"{{attrs}}/>',
];
$this->Form->setTemplates($formtemplate);
?>
<div class="stone form content">
    <h3>Edit Contact Details</h3>
    <div class="justify-content-between mb-4">
        <a href="<?= $this->Url->build(['action' => 'index']) ?>"
           class="d-none d-sm-inline-block btn btn-sm btn-primary shadow-sm"><i
                class="fas fa-address-book fa-sm text-white-50"></i> View Contact Details</a>
        <p>&nbsp;</p>
        <div class="contact-form">
            <form id="contact" action="" method="post">
                <div class="row">
                    <?= $this->Form->create($contact) ?>
                    <div class="col-lg-12 col-md-12 col-sm-12">
                        <fieldset class="mb-4">
                            <legend><?= __('Edit Contact Details') ?></legend>
                            <?php
                            echo $this->Form->control('phone',['label'=>'Phone Number*', 'type'=>'text', 'pattern'=>'[0][0-9]{9}','title'=>'Please enter a valid phone number.']);
                            echo $this->Form->control('email',['label'=>'Email Address', 'type'=>'email']);
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
