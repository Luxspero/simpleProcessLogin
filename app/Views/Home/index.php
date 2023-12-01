<div id="layoutSidenav_content">
    <main>
        <div class="container-fluid px-4">
            <h1 class="mt-4"><?= $judul ?></h1>
            <ol class="breadcrumb mb-4">
                <li class="breadcrumb-item active"><?= $judul ?></li>
            </ol>
            <?php if (session()->get('message')) : ?>
                <div class="alert alert-<?= session()->get('status') ?> alert-dismissible fade show" role="alert">
                <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
                <strong><?= print_r(session()->getFlashdata('message')) ?></strong>
                </div>
            <?php endif; ?>
            <div class="card mb-4">
                <div class="card-header">
                    <i class="fas fa-table me-1"></i>
                    
                </div>
                <div class="card-body">
                    <h1>Welcome</h1>

                </div>
            </div>
        </div>
    </main>
