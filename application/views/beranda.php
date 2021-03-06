<!-- section -->
<section class="section">
    <!-- body -->
    <div class="grid lg:grid-cols-1 mb-4">
        <div class="grid lg:grid-cols-6 xl:grid-cols-2 gap-4">
            <div class="widget-simple-card bg-info text-quaternary">
                <div class="widget-simple-card-icon bg-quaternary text-info">
                    <i class='bx bxs-shopping-bag bx-lg bx-tada-hover'></i>
                </div>
                <div class="widget-simple-card-text">
                    <h1>Jumlah Undangan</h1>
                    <span>250</span>
                </div>
            </div>
            <div class="widget-simple-card bg-success text-quaternary">
                <div class="widget-simple-card-icon bg-quaternary text-success">
                    <i class='bx bxs-chart bx-lg bx-tada-hover'></i>
                </div>
                <div class="widget-simple-card-text">
                    <h1>Undangan Yang Dihadiri</h1>
                    <span>54%</span>
                </div>
            </div>
        </div>
    </div>
    <!-- body -->
    <div class="grid gap-4">
        <div class="card">
            <?php if ($this->session->flashdata('flash')) : ?>
                <div class="alert alert-success alert-dismissible fade show" role="alert">
                    Selamat <strong>Undangan</strong> <?= $this->session->flashdata('flash'); ?>.
                </div>
            <?php endif; ?>
            <div class="m-4">
                <button data-modalButton="signup-modal" class="btn-tertiary-md pull-right"><i class='bx bx-plus-circle bx-xs'></i></button>
                <h1 class="font-bold text-tertiary font-montserrat text-lg">Data Undangan</h1>
            </div>
            <div class="grid lg:grid-cols-1 xl:grid-cols-1 gap-4">
                <div class="table-responsive-default">
                    <table id="example" class="table p-4">
                        <thead>
                            <tr>
                                <th style="width: 5%">No</th>
                                <th>Tanggal Terima</th>
                                <th>Instansi/Organisasi</th>
                                <th>Perihal</th>
                                <th>Tanggal Pelaksanaan</th>
                                <th>Delegasi</th>
                                <th>Keterangan</th>
                                <th>File</th>
                                <th>Aksi</th>
                            </tr>
                        </thead>
                        <tbody>
                            <?php $no = 1;
                            foreach ($undangan as $u) : ?>
                                <tr>
                                    <td><?= $no++ ?></td>
                                    <td><?= $u['tgl_terima'] ?></td>
                                    <td><?= $u['instansi'] ?></td>
                                    <td><?= $u['perihal'] ?></td>
                                    <td><?= $u['tgl_pelaksana'] ?></td>
                                    <td><?= $u['delegasi'] ?></td>
                                    <td><?= $u['ket'] ?></td>
                                    <td><a class="btn btn-sm btn-primary" href="<?= base_url() ?>welcome/download/<?= $u['id'] ?>" target="_blank"><?= $u['file'] ?></a></td>
                                    <td>
                                        <a class="btn btn-sm btn-primary" href="<?= base_url() ?>welcome/edit_undangan/<?= $u['id']; ?>"><i class="bx bxs-edit bx-xs"></i></a>
                                        <a onclick="return confirm('Yakin Hapus')" class="btn btn-sm btn-danger" href="<?= base_url() ?>welcome/hapus_undangan/<?= $u['id']; ?>"><i class="bx bx-trash bx-xs"></i></a>
                                    </td>
                                </tr>
                            <?php endforeach; ?>
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
    </div>
    <!-- end body -->