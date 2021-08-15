<?php
if (isset($_GET['page'])) $page = $_GET['page'];
else $page = 'dashboard';
?>

<ul class="navbar-nav bg-gradient-primary sidebar sidebar-dark accordion" id="accordionSidebar">

    <!-- Sidebar - Brand -->
    <a class="sidebar-brand d-flex align-items-center justify-content-center" href="?page=dashboard">
        <div class="sidebar-brand-text">INDO<span>STAT<span></div>
    </a>

    <!-- Divider -->
    <hr class="sidebar-divider my-0">

    <!-- Nav Item - Dashboard -->
    <li class="nav-item <?= $page == 'dashboard' || $page == '' ? 'active' : ''; ?>">
        <a class="nav-link" href="?page=dashboard">
            <i class="fas fa-fw fa-tachometer-alt"></i>
            <span>Dashboard</span></a>
    </li>

    <!-- Divider -->
    <hr class="sidebar-divider">

    <!-- Heading -->
    <div class="sidebar-heading">
        Data
    </div>

    <!-- Nav Item - Profile -->
    <li class="nav-item <?= $page == 'input-data' || $page == 'kelola-data' ? 'active' : ''; ?>">
        <a class="nav-link collapsed" href="#" data-toggle="collapse" data-target="#datamaster" aria-expanded="true" aria-controls="datamaster">
            <i class="fas fa-folder"></i>
            <span>Data Master</span>
        </a>
        <div id="datamaster" class="collapse" aria-labelledby="headingUtilities" data-parent="#accordionSidebar">
            <div class="bg-white py-2 collapse-inner rounded">
                <a class="collapse-item" href="?page=input-data">Input Data</a>
                <a class="collapse-item" href="?page=kelola-data">Kelola Data</a>
            </div>
        </div>
    </li>

    <!-- Divider -->
    <hr class="sidebar-divider">

    <!-- Heading -->
    <div class="sidebar-heading">
        Laporan
    </div>

    <!-- Nav Item - Profile -->
    <li class="nav-item <?= $page == 'hasil-survei' ? 'active' : ''; ?>">
        <a class="nav-link collapsed" href="#" data-toggle="collapse" data-target="#datalaporan" aria-expanded="true" aria-controls="datamaster">
            <i class="fas fa-folder"></i>
            <span>Data Laporan</span>
        </a>
        <div id="datalaporan" class="collapse" aria-labelledby="headingUtilities" data-parent="#accordionSidebar">
            <div class="bg-white py-2 collapse-inner rounded">
                <a class="collapse-item" href="?page=hasil-survei">Survey Preview</a>
                <a class="collapse-item" href="?page=laporan-survei">Laporan Data Survei</a>
            </div>
        </div>
    </li>

    <!-- Divider -->
    <hr class="sidebar-divider d-none d-md-block">

    <!-- Sidebar Toggler (Sidebar) -->
    <div class="text-center d-none d-md-inline">
        <button class="rounded-circle border-0" id="sidebarToggle"></button>
    </div>

</ul>