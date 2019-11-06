<div class="container mt-3">
    <div class="row">
        <div class="col-sm-6 mx-auto">
            <div class="card bg-dark text-light">
                <div class="card-header">
                    Add Member
                </div>
                <div class="card-body">
                    <?= $this->session->flashdata('message'); ?>
                    <form action="<?= base_url('blog/add'); ?>" method="post">
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
                        <div class="form-group">
                            <label for="identity">Sort of Identity</label>
                            <input type="text" class="form-control" name="identity" id="identity">
                            <?= form_error('identity', '<small class="text-danger pl-3">', '</small>'); ?>
                        </div>
                        <div class="form-group">
                            <label for="identity_num">Identity Number</label>
                            <input type="text" class="form-control" name="identity_num" id="identity_num">
                            <?= form_error('identity_num', '<small class="text-danger pl-3">', '</small>'); ?>
                        </div>
                        <div class="form-check form-check-inline mt-4">
                            <label class="form-check-label">Gender</label> &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp;
                            <input class="form-check-input" checked="checked" type="radio" name="gender" value="Men">
                            <label class="form-check-label">Men</label> &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp;
                            <input class="form-check-input" type="radio" name="gender" value="Women">
                            <label class="form-check-label">Women</label>
                        </div>
                        <div class="form-group mt-5">
                            <div class="row">
                                <div class="col-sm-3">
                                    <label for="">Add Billing</label>
                                </div>
                                <div class="col-sm-9">
                                    <select name="time" id="time" class="custom-select">
                                        <option checked="checked" value="1">1 Jam Rp20.000</option>
                                        <option value="4">4 Jam Rp20.000</option>
                                        <option value="6">6 Jam Rp20.000</option>
                                        <option value="10">10 Jam Rp20.000</option>
                                    </select>
                                </div>
                            </div>
                        </div>
                        <div class="form-check form-check-inline mt-4">
                            <label class="form-check-label">Member Type</label> &nbsp; &nbsp; &nbsp; &nbsp; &nbsp;
                            <input class="form-check-input" checked="checked" type="radio" name="type" value="Reguler">
                            <label class="form-check-label">Reguler</label> &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp;
                            <input class="form-check-input" type="radio" name="type" value="VIP">
                            <label class="form-check-label">VIP</label>
                        </div>
                        <div class="div mt-5 float-right">
                            <button class="btn btn-warning" type="reset">Reset</button>
                            <button class="btn btn-primary" type="submit">Add Member</button>
                        </div>

                    </form>
                </div>
            </div>
        </div>
    </div>
</div>