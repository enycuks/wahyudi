<!-- section -->
<section class="section">
    <!-- body -->
    <div class="grid gap-4">
        <div class="card">
            <?php if ($this->session->flashdata('flash')) : ?>
                <div class="alert alert-success alert-dismissible fade show" role="alert">
                    Selamat <strong>Undangan</strong> <?= $this->session->flashdata('flash'); ?>.
                </div>
            <?php endif; ?>

            <div class="grid lg:grid-cols-1 xl:grid-cols-1 gap-4">
                <form method="POST" action="" enctype="multipart/form-data">
                    <div class="flex flex-col gap-2">
                        <div class="input-group r-sm bg-primary">
                            <div class="input-group-icon">
                                <i class='bx bx-calendar bx-xs'></i>
                            </div>
                            <input type="hidden" name="id" value="<?= $undangan['id'] ?>">
                            <input type="date" name="tgl_terima" class="input-group-item focus-primary r-l-sm" placeholder="Tanggal Terima" value="<?= $undangan['tgl_terima'] ?>" required>
                        </div>
                    </div>
                    <br>
                    <div class="flex flex-col gap-2">
                        <div class="input-group r-sm bg-primary">
                            <div class="input-group-icon">
                                <i class='bx bxs-landmark bx-xs'></i>
                            </div>
                            <input type="text" name="instansi" class="input-group-item focus-primary r-l-sm" placeholder="Instansi/Organisasi" value="<?= $undangan['instansi'] ?>" required>
                        </div>
                    </div>
                    <br>
                    <div class="flex flex-col gap-2">
                        <div class="input-group r-sm bg-primary">
                            <div class="input-group-icon">
                                <i class='bx bxs-receipt bx-xs'></i>
                            </div>
                            <input type="text" name="perihal" class="input-group-item focus-primary r-l-sm" placeholder="Perihal Undangan" value="<?= $undangan['perihal'] ?>" required>
                        </div>
                    </div>
                    <br>
                    <div class="flex flex-col gap-2">
                        <div class="input-group r-sm bg-primary">
                            <div class="input-group-icon">
                                <i class='bx bx-calendar bx-xs'></i>
                            </div>
                            <input type="date" name="tgl_pelaksa" class="input-group-item focus-primary r-l-sm" placeholder="Tanggal Pelaksanaan" value="<?= $undangan['tgl_pelaksana'] ?>" required>
                        </div>
                    </div>
                    <br>
                    <div class="flex flex-col gap-2">
                        <div class="input-group r-sm bg-primary">
                            <div class="input-group-icon">
                                <i class='bx bx-user bx-xs'></i>
                            </div>
                            <input type="text" name="delegasi" class="input-group-item focus-primary r-l-sm" placeholder="Delegasi" value="<?= $undangan['delegasi'] ?>" required>
                        </div>
                    </div>
                    <br>
                    <div class="flex flex-col gap-2">
                        <div class="input-group r-sm bg-primary">
                            <div class="input-group-icon">
                                <i class='bx bxs-notepad bx-xs'></i>
                            </div>
                            <input type="text" name="ket" class="input-group-item focus-primary r-l-sm" placeholder="Keterangan" value="<?= $undangan['ket'] ?>" required>
                        </div>
                    </div>
                    <br>
                    <div class="flex flex-col gap-2">
                        <div class="input-group r-sm bg-primary">
                            <div class="input-group-icon">
                                <i class='bx bx-images bx-xs'></i>
                            </div>
                            <input type="file" name="file" class="input-group-item focus-primary r-l-sm" placeholder="File" value="<?= $undangan['file'] ?>">
                        </div>
                    </div>

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