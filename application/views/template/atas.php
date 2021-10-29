<!doctype html>
<html>

<head>
    <meta charset="UTF-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <link rel="icon" href="<?= base_url() ?>assets/img/simonpim.png">
    <title>Simonpim</title>
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
    <!-- Datatable -->
    <link rel="stylesheet" type="text/css" href="https://cdn.datatables.net/1.11.2/css/jquery.dataTables.css">
    <link rel="stylesheet" href="<?php echo base_url('assets/jquery-ui/jquery-ui.min.css'); ?>" /> <!-- Load file css jquery-ui -->
    <script src="<?php echo base_url('assets/jquery.min.js'); ?>"></script> <!-- Load file jquery -->

</head>

<body class="full-body" x-data="{sidebar: true}">
    <!-- preloader -->
    <div id="preloader" class="preloader">
        <div class="preloader-border">
            <div class="preloader-dot"></div>
        </div>
        <span class="preloader-text">Loading</span>
    </div>
    <!-- end preloader -->

    <!-- sidebar -->
    <div id="sidebar" class="sidebar" x-show="sidebar" :class="sidebar ? 'hidden lg:block' : 'block lg:hidden'" x-transition:enter="animate__animated animate__bounceInLeft">
        <div class="sidebar-header">
            <a href="#" class="flex items-center lg:justify-center">
                <!-- <div class="flex justify-center items-center box-content bg-quaternary shadow-neumorphism h-10 w-10 rounded-xl mr-4">
                  For character logo-->
                <!-- <span class="text-primary font-black text-2xl">V</span>  -->
                <!-- For image logo-->
                <!-- <img src="<?= base_url() ?>assets/img/logo_virtue.png" class="w-7 h-7" alt="logo"> 
        </div> -->
                <span class="tracking-widest text-primary text-xl font-semibold lg:text-2xl">
                    Simonpim
                </span>
            </a>
            <div class="block lg:hidden">
                <button class="flex justify-center items-center py-2 box-content bg-quaternary shadow-neumorphism w-10 rounded-xl" @click="sidebar = false">
                    <i class='bx bx-x bx-sm text-primary'></i>
                </button>
            </div>
        </div>
        <hr class="divider">
        <div class="sidebar-wrap">
            <div class="sidebar-body">
                <ul>
                    <li class="sidebar-item">
                        <a href="<?= base_url() ?>welcome/beranda" class="sidebar-item-link">
                            <i class='bx bxs-dashboard bx-xs'></i>
                            <span class="sidebar-item-text line-clamp-1">Dashboard</span>
                        </a>
                    </li>
                    <!-- <li class="sidebar-item">
                        <a href="Widget.html" class="sidebar-item-link">
                            <i class='bx bxs-widget bx-xs'></i>
                            <span class="sidebar-item-text line-clamp-1">Widget</span>
                        </a>
                    </li> -->
                    <li class="sidebar-item">
                        <a href="<?= base_url() ?>welcome/profil" class="sidebar-item-link">
                            <i class='bx bx-cog bx-xs'></i>
                            <span class="sidebar-item-text line-clamp-1">Profil</span>
                        </a>
                    </li>
                    <!-- <li class="sidebar-list" x-data="{ open: false }">
                        <button class="sidebar-list-link" @click="open = !open">
                            <i class='bx bxs-component bx-xs'></i>
                            <span class="sidebar-item-text line-clamp-1">Component</span>
                            <i class='bx bxs-right-arrow ml-4 transform duration-500'
                                :class="open ? 'bx-rotate-90' : ''"></i>
                        </button>
                        <ul class="sidebar-list-dropdown transform duration-500" x-show="open" x-transition>
                            <li class="list">
                                <a href="Component - Alert.html"> Alert</a>
                            </li>
                            <li class="list">
                                <a href="Component - Badge.html"> Badge</a>
                            </li>
                            <li class="list">
                                <a href="Component - Button.html"> Button</a>
                            </li>
                            <li class="list">
                                <a href="Component - Card.html"> Card</a>
                            </li>
                            <li class="list">
                                <a href="Component - Colors.html"> Color</a>
                            </li>
                            <li class="list">
                                <a href="Component - List Group.html"> List Group</a>
                            </li>
                            <li class="list">
                                <a href="Component - Modal.html"> Modal</a>
                            </li>
                            <li class="list">
                                <a href="Component - Pagination.html"> Pagination</a>
                            </li>
                            <li class="list">
                                <a href="Component - Tooltip.html"> Tooltip</a>
                            </li>
                        </ul>
                    </li> -->
                </ul>
            </div>
        </div>
    </div>
    <!-- end sidebar -->

    <!-- main -->
    <main class="main" x-bind:class="{'lg:w-full': ! sidebar }">
        <!-- nav -->
        <nav class="flex justify-between">
            <div class="py-4">
                <div class="flex flex-row ">
                    <button class="flex btn-icon lg:hidden" @click="sidebar = true" id="btn-sidebar">
                        <i class='bx bx-menu bx-sm text-primary'></i>
                    </button>
                    <button class="lg:flex btn-icon hidden" @click="sidebar = !sidebar" id="btn-sidebar">
                        <i class='bx bx-menu bx-sm text-primary'></i>
                    </button>
                </div>
            </div>
            <div class="hidden lg:block w-3/12 py-4">
                <div class="flex justify-start">

                </div>
            </div>
            <div class="hidden lg:block w-9/12 ">
                <div x-data="{ open: false }" class="flex justify-end py-4">
                    <div class="hidden lg:block">
                        <p class="font-semibold py-2 px-4 tracking-wider"></p>
                    </div>
                    <button class="h-10 w-10 border-tertiary rounded-full" @click="open = ! open">
                        <img src="<?= base_url() ?>assets/img/faces/7.jpg" class="w-10 rounded-full" alt="">
                    </button>
                    <div class="absolute mt-16" x-show="open" @click.outside="open = false" x-transition>
                        <div class="w-60 h-w-60 p-4 bg-quaternary shadow-neumorphism text-tertiary rounded-lg">
                            <a href="<?= base_url() ?>welcome/logout" class="flex-card">
                                <div class="card-icon">
                                    <i class='bx bx-exit bx-sm text-primary'></i>
                                </div>
                                <span class="px-2 font-medium ">logout</span>
                            </a>
                        </div>
                    </div>
                </div>
            </div>
            <!-- for mobile -->
            <div class="flex flex-grow items-center justify-center">
                <div class="block lg:hidden">
                    <a href="#" class="flex items-center justify-center">
                        <span class="tracking-widest text-primary text-lg font-semibold ">
                            Virtue
                        </span>
                    </a>
                </div>
            </div>
            <div class="flex flex-none">
                <div class="block lg:hidden ">
                    <div x-data="{ open: false }" class="flex justify-end py-4">
                        <button class="flex btn-icon" @click="open = ! open">
                            <i class='bx bx-dots-horizontal-rounded bx-sm text-primary'></i>
                        </button>

                        <div class="absolute mt-16" x-show="open" @click.outside="open = false" x-transition:enter="animate__animated animate__bounceInDown" x-transition:leave="animate__animated animate__bounceOutUp">
                            <div class="w-60 h-w-60 p-4 bg-quaternary shadow-neumorphism text-tertiary rounded-lg">
                                <div class="flex-card">
                                    <button class="h-10 w-10 border-tertiary rounded-full" @click="open = ! open">
                                        <img src="<?= base_url() ?>assets/img/faces/7.jpg" class="w-10 rounded-full" alt="">
                                    </button>
                                    <p class="flex justify-center items-center font-semibold px-4 tracking-wider">Hi,
                                        Muhammad</p>
                                </div>
                                <hr class="divider">
                                <a href="#" class="flex-card">
                                    <div class="card-icon">
                                        <span class="notif-dot-success"></span>
                                        <i class='bx bxs-inbox bx-sm text-primary'></i>
                                    </div>
                                    <span class="px-2 font-medium">Inbox</span>
                                </a>
                                <a href="#" class="flex-card">
                                    <div class="card-icon">
                                        <span class="notif-dot-warning"></span>
                                        <i class='bx bxs-notification bx-sm text-primary'></i>
                                    </div>
                                    <span class="px-2 font-medium">Notification</span>
                                </a>
                                <hr class="divider">
                                <a href="#" class="flex-card">
                                    <div class="card-icon">
                                        <i class='bx bxs-user-circle bx-sm text-primary'></i>
                                    </div>
                                    <span class="px-2 font-medium">Profile</span>
                                </a>
                                <a href="#" class="flex-card">
                                    <div class="card-icon">
                                        <i class='bx bx-slider-alt bx-sm text-primary'></i>
                                    </div>
                                    <span class="px-2 font-medium">Setting</span>
                                </a>
                                <hr class="border-gray-300">
                                <a href="#" class="flex-card">
                                    <div class="card-icon">
                                        <i class='bx bx-exit bx-sm text-primary'></i>
                                    </div>
                                    <span class="px-2 font-medium ">logout</span>
                                </a>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <!-- end for mobile -->
        </nav>
        <hr class="divider">
        <!-- end nav -->