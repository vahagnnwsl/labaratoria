<aside class="main-sidebar sidebar-dark-primary elevation-4">
    <!-- Brand Logo -->
    <a href="/dashboard" class="brand-link">
        <img src="/logo.png" alt="AdminLTE Logo" class="brand-image img-circle elevation-3" style="opacity: .8">
        <span class="brand-text font-weight-light">Euromed</span>
    </a>

    <div class="sidebar">


        <nav class="mt-2">
            <ul class="nav nav-pills nav-sidebar flex-column" data-widget="treeview" role="menu" data-accordion="false">

                <li class="nav-item ">
                    <a href="{{route('patients.index')}}"
                       class="nav-link {{request()->is('dashboard/patients*') ?'active':''}}">
                        <i class=" fas fa-user-tag nav-icon"></i>
                        <p>Patients</p>
                    </a>
                </li>
                <li class="nav-item ">
                    <a href="{{route('patients2.index')}}"
                       class="nav-link {{request()->is('dashboard/2-patients*') ?'active':''}}">
                        <i class=" fas fa-user-tag nav-icon"></i>
                        <p>Patients 2</p>
                    </a>
                </li>

            </ul>
        </nav>
    </div>
</aside>
