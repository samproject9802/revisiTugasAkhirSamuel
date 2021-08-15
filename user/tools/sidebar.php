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
    <li class="nav-item <?= $page == 'dashboard' ? 'active' : ''; ?>">
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
    <li class="nav-item <?= $page == 'kuisioner' ? 'active' : ''; ?>">
        <a class="nav-link collapsed" href="?page=kuisioner">
        <i class="fas fa-clipboard-list"></i>
            <span>Kuisioner</span>
        </a>
    </li>

    <!-- Divider -->
    <hr class="sidebar-divider">

    <!-- Sidebar Toggler (Sidebar) -->
    <div class="text-center d-none d-md-inline">
        <button class="rounded-circle border-0" id="sidebarToggle"></button>
    </div>

</ul>