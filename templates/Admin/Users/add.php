<div class="users form">
    <div class="container">

        <!-- Outer Row -->
        <div class="row justify-content-center">

            <div class="col-xl-5 col-lg-6 col-md-9">

                <div class="card o-hidden border-0 shadow-lg my-5">
                    <div class="card-body p-0">
                        <!-- Nested Row within Card Body -->
                        <div class="row">
                            <div class="col-lg-12">
                                <div class="p-5">

                                    <!-- Register user form-->
                                    <div class="text-center">
                                        <h1 class="h4 text-gray-900 mb-4">Register an Account</h1>
                                    </div>

                                    <?php echo $this->Flash->render(); ?>

                                    <?= $this->Form->create() ?>
                                    <fieldset>
                                        <div class="form-group">
                                            <?= $this->Form->control('email', [
                                                'class' => 'form-control form-control-user',
                                                'required' => true,
                                                'placeholder' => 'Email Address',
                                                'label' => false
                                            ]) ?>
                                        </div>
                                        <div class="form-group">
                                            <?= $this->Form->control('password', [
                                                'class' => 'form-control form-control-user',
                                                'required' => true,
                                                'placeholder' => 'Password',
                                                'label' => false
                                            ]) ?>
                                        </div>
                                    </fieldset>
                                    <?= $this->Form->button(__('Submit'), [
                                        'class' => 'btn btn-primary btn-user btn-block'
                                    ]); ?>
                                    <?= $this->Form->end() ?>
                                    <hr>
                                    <div class="text-center">
                                        <a class="small" href="<?= \Cake\Routing\Router::url([
                                            'prefix' => 'Admin',
                                            'controller' => 'users',
                                            'action' => 'login'
                                        ]) ?>">Already have an account? Login!</a>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>

            </div>

        </div>

    </div>
</div>
