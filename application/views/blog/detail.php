<div class="container mt-3">
    <div class="row">
        <div class="col-sm-6 mx-auto">
            <div class="card bg-dark text-light">
                <div class="card-header">
                    User Details
                </div>
                <div class="card-body">
                    <table class="table text-light">
                        <div class="row">
                            <div class="col">
                                <tbody>
                                    <tr>
                                        <th>Username</th>
                                        <td><?= $username; ?></td>
                                    </tr>
                                    <tr>
                                        <th>Fullname</th>
                                        <td><?= $fullname; ?></td>
                                    </tr>
                                    <tr>
                                        <th>Sort of Identity</th>
                                        <td><?= $identity; ?></td>
                                    </tr>
                                    <tr>
                                        <th>Identity Number</th>
                                        <td><?= $identity_num; ?></td>
                                    </tr>
                                    <tr>
                                        <th>Gender</th>
                                        <td><?= $gender; ?></td>
                                    </tr>
                                </tbody>
                            </div>
                        </div>
                    </table>
                </div>
            </div>
        </div>
    </div>
</div>