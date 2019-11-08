<div class="container mt-5">
    <div class="row">
        <div class="col-sm-6 mx-auto">
            <div class="card bg-dark text-light">
                <div class="card-header">
                    Admin Login
                </div>
                <div class="card-body">
                    <?= $this->session->flashdata('message'); ?>
                    <form action="<?= base_url('admin/login'); ?>" method="post">
                        <div class="form-group">
                            <label for="username">Username</label>
                            <input type="text" class="form-control" name="username" id="username">
                        </div>
                        <div class="form-group">
                            <label for="password">Password</label>
                            <input type="password" class="form-control" name="password" id="password">
                        </div>
                        <button class="btn btn-primary" type="submit">Login</button>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>