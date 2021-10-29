<!-- section -->
<section class="section">

    <!-- body -->
    <div class="grid gap-4">
        <div class="card">
            <div class="m-4">
                <!-- <button data-modalButton="simple-modal" class="btn-primary-md">Edit</button> -->
                <h1 class="font-bold text-tertiary font-montserrat text-lg">Profil</h1>
                <?php if ($this->session->flashdata('flash')) : ?>
                    <div class="alert alert-success alert-dismissible fade show" role="alert">
                        Selamat <strong>Profil</strong> <?= $this->session->flashdata('flash'); ?>.
                    </div>
                <?php endif; ?>
                <a class="btn btn-info" href="<?= base_url() ?>welcome/user_add">Tambah User</a>
            </div>
            <div class="grid lg:grid-cols-1 xl:grid-cols-1 gap-4">
                <div class="table-responsive-default">
                    <table id="example" class="table p-4">
                        <thead>
                            <tr>
                                <th>Username</th>
                                <th>Password</th>
                                <th>Aksi</th>
                            </tr>
                        </thead>
                        <tbody>
                            <?php $no = 1;
                            foreach ($user as $u) : ?>
                                <tr>
                                    <td><?= $u['username'] ?></td>
                                    <td>Password</td>
                                    <td>
                                        <?php
                                        $id = $this->session->userdata('id');
                                        if ($id == $u['id']) : ?>
                                            <a href="<?= base_url() ?>welcome/profil_edit/<?= $u['id']; ?>"><i class='bx bxs-edit bx-xs'></i></a>
                                        <?php endif; ?>
                                        <!-- <a href=""><i class='bx bx-trash bx-xs'></i></a> -->
                                    </td>
                                </tr>
                            <?php endforeach ?>
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
    </div>
    <!-- end body -->