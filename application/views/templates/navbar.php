<!-- Navbar -->
<nav class="navbar navbar-expand-sm navbar-dark bg-dark">
    <a class="navbar-brand" href="<?= base_url('blog'); ?>">Ukulele</a>
    <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarNav" aria-controls="navbarNav" aria-expanded="false" aria-label="Toggle navigation">
        <span class="navbar-toggler-icon"></span>
    </button>
    <div class="collapse navbar-collapse" id="navbarNav">
        <ul class="navbar-nav">
            <li class="nav-item active">
                <a class="nav-link" href="<?= base_url('blog'); ?>">List Member<span class="sr-only">(current)</span></a>
            </li>
            <li class="nav-item">
                <a class="nav-link" href="<?= base_url('blog/add'); ?>">Add Member</a>
            </li>
            <?php if ($this->session->userdata('role') == 1) : ?>
                <li class="nav-item">
                    <a class="nav-link" href="<?= base_url('admin/register'); ?>">Add Admin</a>
                </li>
            <?php endif; ?>
            <li class="nav-item">
                <a class="float-right nav-link" href="<?= base_url('admin/logout'); ?>">Logout</a>
            </li>
            <form class="form-inline my-2 my-lg-0">
                <input class="form-control mr-sm-2" type="search" placeholder="Search" aria-label="Search" id="search">
                <button class="btn btn-outline-secondary my-2 my-sm-0" type="submit">Search</button>
            </form>
        </ul>
    </div>
</nav>