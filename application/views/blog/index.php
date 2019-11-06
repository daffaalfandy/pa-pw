<div class="container mt-3">
    <table class="table table-dark">
        <thead>
            <tr>
                <th>Username</th>
                <th>Time</th>
                <th>Type</th>
                <th></th>
            </tr>
        </thead>
        <tbody>
            <?php foreach ($users as $key => $user) : ?>
                <tr>
                    <td><a class="text-white" href="<?= base_url('blog/detail/' . $user['id']); ?>"><?= $user['username']; ?></a></td>
                    <td><?= $user['time']; ?> Jam</td>
                    <td><?= $user['type']; ?></td>
                    <td>
                        <a class="text-info" href="<?= base_url('blog/edit/' . $user['id']); ?>"><i class="fas fa-edit"> </i></a> &nbsp; &nbsp;
                        <a href="delete.html" class="text-info"><i class="fas fa-trash-alt"> </i></a>
                    </td>
                </tr>
            <?php endforeach; ?>
        </tbody>
    </table>
</div>