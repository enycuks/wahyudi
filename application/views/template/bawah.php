</section>
<!-- end section -->
</main>
<!-- end main -->


<!-- signup modal -->
<div class="modal items-center hidden" data-modal="signupModal">
    <div class="box-content modal-card-medium rounded-xl bg-quaternary p-10 animate__animated animate__jackInTheBox">
        <div class="modal-header">
            <h1 class="font-bold text-lg">Tambah Undangan</h1>
            <button data-dismiss="modal" class="btn-primary-outline-sm">
                <i class='bx bx-x bx-sm'></i>
            </button>
        </div>
        <div class="flex justify-center flex-col gap-10 mt-4">

            <div class="flex justify-center flex-col gap-4">
                <form method="POST" action="<?= base_url() ?>welcome/beranda" enctype="multipart/form-data">
                    <div class="flex flex-col gap-2">
                        <div class="input-group r-sm bg-primary">
                            <div class="input-group-icon">
                                <i class='bx bx-calendar bx-xs'></i>
                            </div>
                            <input type="date" name="tgl_terima" class="input-group-item focus-primary r-l-sm" placeholder="Tanggal Terima" required>
                        </div>
                    </div>
                    <br>
                    <div class="flex flex-col gap-2">
                        <div class="input-group r-sm bg-primary">
                            <div class="input-group-icon">
                                <i class='bx bxs-landmark bx-xs'></i>
                            </div>
                            <input type="text" name="instansi" class="input-group-item focus-primary r-l-sm" placeholder="Instansi/Organisasi" required>
                        </div>
                    </div>
                    <br>
                    <div class="flex flex-col gap-2">
                        <div class="input-group r-sm bg-primary">
                            <div class="input-group-icon">
                                <i class='bx bxs-receipt bx-xs'></i>
                            </div>
                            <input type="text" name="perihal" class="input-group-item focus-primary r-l-sm" placeholder="Perihal Undangan" required>
                        </div>
                    </div>
                    <br>
                    <div class="flex flex-col gap-2">
                        <div class="input-group r-sm bg-primary">
                            <div class="input-group-icon">
                                <i class='bx bx-images bx-xs'></i>
                            </div>
                            <input type="datetime-local" name="jam" class="input-group-item focus-primary r-l-sm" placeholder="Jam Kegiatan" required>
                        </div>
                    </div>
                    <br>
                    <div class="flex flex-col gap-2">
                        <div class="input-group r-sm bg-primary">
                            <div class="input-group-icon">
                                <i class='bx bx-user bx-xs'></i>
                            </div>
                            <input type="text" name="delegasi" class="input-group-item focus-primary r-l-sm" placeholder="Delegasi" required>
                        </div>
                    </div>
                    <br>
                    <div class="flex flex-col gap-2">
                        <div class="input-group r-sm bg-primary">
                            <div class="input-group-icon">
                                <i class='bx bxs-notepad bx-xs'></i>
                            </div>
                            <input type="text" name="ket" class="input-group-item focus-primary r-l-sm" placeholder="Keterangan" required>
                        </div>
                    </div>
                    <br>
                    <div class="flex flex-col gap-2">
                        <div class="input-group r-sm bg-primary">
                            <div class="input-group-icon">
                                <i class='bx bx-images bx-xs'></i>
                            </div>
                            <input type="file" name="file" class="input-group-item focus-primary r-l-sm" placeholder="File" required>
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
</div>
<!-- end signup modal -->

<!-- simple modal -->
<div class="modal items-center hidden" data-modal="simpleModal">
    <div class="modal-card-medium animate__animated animate__jackInTheBox">
        <div class="modal-header">
            <h1 class="font-bold text-lg">Simple Modal</h1>
            <button data-dismiss="modal" class="btn-primary-outline-sm">
                <i class='bx bx-x bx-sm'></i>
            </button>
        </div>
        <div class="modal-body medium-modal">
            <form>
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
                            <i class='bx bxs-notepad bx-xs'></i>
                        </div>
                        <input type="password" name="ket" class="input-group-item focus-primary r-l-sm" placeholder="Password" required>
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
<!-- end simple modal -->


<!-- Alpine JS -->
<script defer src="https://unpkg.com/alpinejs@3.x.x/dist/cdn.min.js"></script>
<!-- JQuery -->
<script src="<?= base_url() ?>assets/node_modules/jquery/dist/jquery.min.js"></script>
<script src="<?= base_url() ?>assets/js/main.js"></script>
<!-- JS This Page -->
<script src="https://cdn.jsdelivr.net/npm/apexcharts"></script>
<!-- JS This Page -->
<script type="text/javascript" charset="utf8" src="https://cdn.datatables.net/1.11.2/js/jquery.dataTables.js"></script>
<script>
    $(document).ready(function() {
        $('#example').DataTable();
    });
</script>
</body>

</html>