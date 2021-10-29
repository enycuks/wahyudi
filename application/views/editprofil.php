<!-- section -->
<section class="section">
    <!-- body -->
    <div class="grid gap-4">
        <div class="card">
            <?php if ($this->session->flashdata('flash')) : ?>
                <div class="alert alert-success alert-dismissible fade show" role="alert">
                    Selamat <strong>Profil</strong> <?= $this->session->flashdata('flash'); ?>.
                </div>
            <?php endif; ?>

            <div class="grid lg:grid-cols-1 xl:grid-cols-1 gap-4">
                <form method="POST" action="" enctype="multipart/form-data">
                    <div class="flex flex-col gap-2">
                        <div class="input-group r-sm bg-primary">
                            <div class="input-group-icon">
                                <i class='bx bx-calendar bx-xs'></i>
                            </div>
                            <input type="hidden" name="id" value="<?= $user['id'] ?>">
                            <input type="text" name="username" class="input-group-item focus-primary r-l-sm" placeholder="Username" value="<?= $user['username'] ?>" required>
                        </div>
                    </div>
                    <br>
                    <div class="flex flex-col gap-2">
                        <div class="input-group r-sm bg-primary">
                            <div class="input-group-icon">
                                <i class='bx bxs-landmark bx-xs'></i>
                            </div>
                            <input type="text" name="password" class="input-group-item focus-primary r-l-sm" placeholder="Instansi/Organisasi" value="<?= $user['password'] ?>" required>
                        </div>
                    </div>
                    <br>
                    <hr class="divider">
                    <div class="modal-footer font-semibold">
                        <button data-dismiss="modal">Close</button>
                        <button type="submit" class="btn-primary-md">Save</button>
                    </div>
                </form>
            </div>
        </div>
    </div>
    <!-- end body -->