<h1 class="h3 mb-2 text-gray-800">Admin Dashboard</h1>

<!-- Content Row -->

<div class="row">

    <!-- Web Content Management -->
    <div class="col-xl-12">
        <div class="card shadow mb-4">
            <!-- Card Header -->
            <div
                class="card-header py-3 d-flex flex-row align-items-center justify-content-between">
                <h6 class="m-0 font-weight-bold text-primary">Web Content Management</h6>
            </div>
            <!-- Card Body -->
            <div class="card-body">
                    <a href="<?= \Cake\Routing\Router::url([
                            'prefix' => 'Admin',
                            'controller' => 'contact',
                            'action' => 'index'
                        ]) ?>" class="btn btn-primary btn-icon-split btn-lg">
                        <span class="icon text-white-50">
                            <i class="fas fa-address-book"></i>
                        </span>
                        <span class="text">Contact Details</span>
                    </a>

                    <a href="<?= \Cake\Routing\Router::url([
                        'prefix' => 'Admin',
                        'controller' => 'stone',
                        'action' => 'index'
                    ]) ?>" class="btn btn-primary btn-icon-split btn-lg">
                        <span class="icon text-white-50">
                            <i class="fas fa-toolbox"></i>
                        </span>
                        <span class="text">Stone Type Management</span>
                    </a>
            </div>
        </div>
    </div>
</div>

<!-- Content Row -->

<div class="row">

    <!-- Business Management -->
    <div class="col-xl-12">
        <div class="card shadow mb-3">
            <!-- Card Header -->
            <div
                class="card-header py-3 d-flex flex-row align-items-center justify-content-between">
                <h6 class="m-0 font-weight-bold text-primary">Business Management</h6>
            </div>
            <!-- Card Body -->
            <div class="card-body">
                    <a href="<?= \Cake\Routing\Router::url([
                        'prefix' => 'Admin',
                        'controller' => 'quote-request',
                        'action' => 'index'
                    ]) ?>" class="btn btn-primary btn-icon-split btn-lg">
                        <span class="icon text-white-50">
                            <i class="fas fa-file-alt"></i>
                        </span>
                        <span class="text">Quote Requests</span>
                    </a>

                    <a href="<?= \Cake\Routing\Router::url([
                        'prefix' => 'Admin',
                        'controller' => 'quote',
                        'action' => 'index'
                    ]) ?>" class="btn btn-primary btn-icon-split btn-lg">
                        <span class="icon text-white-50">
                            <i class="fas fa-file-invoice"></i>
                        </span>
                        <span class="text">Quotes</span>
                    </a>
            </div>
        </div>
    </div>
</div>

