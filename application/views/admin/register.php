<div class="container mt-3">
    <div class="row">
        <div class="col-sm-6 mx-auto">
            <div class="card bg-dark text-light">
                <div class="card-header">
                    Add Admin
                </div>
                <div class="card-body">
                    <?= $this->session->flashdata('message'); ?>
                    <form action="<?= base_url('admin/register'); ?>" method="post">
                        <div class="form-group">
                            <label for="username">Username</label>
                            <input type="text" class="form-control" name="username" id="username">
                            <?= form_error('username', '<small class="text-danger pl-3">', '</small>'); ?>
                        </div>
                        <div class="form-group">
                            <label for="fullname">Full Name</label>
                            <input type="text" class="form-control" name="fullname" id="fullname">
                            <?= form_error('fullname', '<small class="text-danger pl-3">', '</small>'); ?>

                        </div>
                        <div class="form-group">
                            <label for="password">Password</label>
                            <input type="password" class="form-control" name="password" id="password">
                            <?= form_error('password', '<small class="text-danger pl-3">', '</small>'); ?>
                        </div>
                        <div class="form-group">
                            <label for="password_confirm">Password Confirm</label>
                            <input type="password" class="form-control" name="password_confirm" id="password_confirm">
                            <?= form_error('password_confirm', '<small class="text-danger pl-3">', '</small>'); ?>
                        </div>
                        <div class="div float-right">
                            <button class="btn btn-warning" type="reset">Reset</button>
                            <button class="btn btn-primary" type="submit">Add Admin</button>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>