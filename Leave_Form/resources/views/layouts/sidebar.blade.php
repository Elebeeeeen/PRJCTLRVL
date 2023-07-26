<style>
    .image {
        margin-left: 20px;
        width: 40   px;
 
    }

    .titleLeave{
        margin-left: 10px; 
        font-size: 18px;
    }
</style>

<aside class="main-sidebar sidebar-dark-primary elevation-4">
    <a href="{{ route('home') }}" class="brand-link">
        <img src="https://www.dof.gov.ph/wp-content/uploads/2015/05/DOF-LOGO-circle-300x300.png" class="image">
        <span class="titleLeave"> Leave Form </span>
    </a>

    <div class="sidebar">
        <nav class="mt-2">
            <ul class="nav nav-pills nav-sidebar flex-column" data-widget="treeview" role="menu" data-accordion="false">
                @include('layouts.menu')
            </ul>
        </nav>
    </div>

</aside>