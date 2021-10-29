<!-- section -->
<section class="section">
    <!-- body -->
    <div class="grid gap-4">
        <div class="card">
            <?php if ($this->session->flashdata('flash')) : ?>
                <div class="alert alert-success alert-dismissible fade show" role="alert">
                    Selamat <strong>User</strong> <?= $this->session->flashdata('flash'); ?>.
                </div>
            <?php endif; ?>

            <div class="grid lg:grid-cols-1 xl:grid-cols-1 gap-4">
                <form method="POST" action="<?= base_url() ?>welcome/user_add">
                    <div class="flex flex-col gap-2">
                        <div class="input-group r-sm bg-primary">
                            <div class="input-group-icon">
                                <i class='bx bx-user bx-xs'></i>
                            </div>
                            <input type="text" name="username" class="input-group-item focus-primary r-l-sm" placeholder="Username" required>
                        </div>
                    </div>
                    <br>
                    <div class="flex flex-col gap-2">
                        <div class="input-group r-sm bg-primary">
                            <div class="input-group-icon">
                                <i class='bx bxs-lock bx-xs'></i>
                            </div>
                            <input type="password" name="password" class="input-group-item focus-primary r-l-sm" placeholder="Password" required>
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