<!doctype html>
<html>

<head>
    <meta charset="UTF-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <link rel="icon" href="assets/img/simonpim.png">
    <title>Simonpim - Login</title>
    <!-- Font -->
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Montserrat:ital,wght@0,300;0,400;0,500;0,600;0,700;0,800;0,900;1,200;1,300;1,400;1,500;1,600;1,700;1,800;1,900&display=swap" rel="stylesheet">
    <link href="https://fonts.googleapis.com/css2?family=Poppins:ital,wght@0,100;0,200;0,300;0,400;0,500;0,600;0,700;0,800;0,900;1,100;1,200;1,300;1,400;1,500;1,600;1,700;1,800;1,900&display=swap" rel="stylesheet">
    <link href="https://fonts.googleapis.com/css2?family=Open+Sans:ital,wght@0,300;0,400;0,600;0,700;0,800;1,300;1,400;1,600;1,700;1,800&display=swap" rel="stylesheet">
    <!-- Tailwind CSS -->
    <link href="<?= base_url() ?>assets/dist/tailwind.css" rel="stylesheet">
    <!-- Icons -->
    <link href='https://unpkg.com/boxicons@2.0.9/css/boxicons.min.css' rel='stylesheet'>
    <!-- Animations -->
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/animate.css/4.1.1/animate.min.css" />

</head>

<body class="body-auth">
    <!-- preloader -->
    <div id="preloader" class="preloader">
        <div class="preloader-border">
            <div class="preloader-dot"></div>
        </div>
        <span class="preloader-text">Loading</span>
    </div>
    <!-- end preloader -->

    <section class="section-auth">
        <div class="flex items-center justify-center lg:justify-start">
            <div class="flex justify-center">
                <!-- For character logo-->
                <!-- <span class="text-primary font-black text-2xl">V</span>  -->
                <!-- For image logo-->
                <!-- <img src="assets/img/simonpim.png" class="w-7 h-7" alt="logo"> -->
            </div>
            <!-- <span class="tracking-widest text-primary text-xl font-semibold lg:text-2xl"> -->
            <!-- SIMONPIM -->
            <!-- </span> -->
        </div>
        <div class="wrap-content">
            <div class="content-illustration">
                <img src="assets/img/simonpim.png" class="w-15 h-30" alt="logo">
                <img src="assets/img/illustration/login.svg" width="450px" alt="login">
            </div>
            <div class="content-input">
                <?= $this->session->flashdata('message'); ?>
                <form action="<?= base_url(); ?>welcome/login" method="post">
                    <div class="title-content-input">
                        <h1 class="text-xl font-bold">Selamat Datang Simonpim</h1>
                        <h1 class="text font-bold">Halaman Login</h1>
                        <!-- <span class="text-lg ">Login to access the system</span> -->
                    </div>
                    <div class="mb-4">
                        <div class="input-group r-full bg-primary">
                            <div class="input-group-icon">
                                <i class='bx bx-mail-send bx-xs'></i>
                            </div>
                            <input type="text" name="username" class="input-group-item focus-primary r-l-full" placeholder="Masukkan Username Anda" required>
                        </div>
                        <!-- <span class="helper-danger">text helper</span> -->
                    </div>
                    <div class="mb-4">
                        <div class="input-group r-full bg-primary">
                            <div class="input-group-icon">
                                <i class='bx bx-lock-alt bx-xs'></i>
                            </div>
                            <input type="password" name="password" class="input-group-item focus-primary r-l-full" placeholder="Masukkan Password Anda" required>
                        </div>
                        <!-- <span class="helper-danger">text helper</span> -->
                    </div>

                    <div class="flex justify-center items-center mt-6 gap-4 flex-col tracking-widest">
                        <input type="submit" class="btn-primary-md rounded-full text-right" value="Login">
                        <!-- <span>Don't have an account ? <a href="Auth - Register.html" class="font-bold">Register Now!</a></span> -->
                    </div>
                </form>
            </div>
        </div>
    </section>


    <!-- Alpine JS -->
    <script defer src="https://unpkg.com/alpinejs@3.x.x/dist/cdn.min.js"></script>
    <!-- JQuery -->
    <script src="<?= base_url() ?>assets/node_modules/jquery/dist/jquery.min.js"></script>
    <script src="<?= base_url() ?>assets/js/main.js"></script>
</body>

</html>