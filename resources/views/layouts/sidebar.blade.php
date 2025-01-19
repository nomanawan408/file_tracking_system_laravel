<div id="layoutSidenav_nav">
    <nav class="sb-sidenav accordion sb-sidenav-dark" id="sidenavAccordion">
        <div class="sb-sidenav-menu">
            <div class="nav">
                <div class="sb-sidenav-menu-heading">Core</div>
                <a class="nav-link" href="{{ route('dashboard') }}">
                    <div class="sb-nav-link-icon"><i class="fas fa-tachometer-alt"></i></div>
                    Dashboard
                </a>
                <a class="nav-link collapsed" href="#" data-bs-toggle="collapse" data-bs-target="#collapseFiles" aria-expanded="false" aria-controls="collapseFiles">
                    <div class="sb-nav-link-icon"><i class="fas fa-columns"></i></div>
                    Files
                    <div class="sb-sidenav-collapse-arrow"><i class="fas fa-angle-down"></i></div>
                </a>
                <div class="collapse" id="collapseFiles" aria-labelledby="headingOne" data-bs-parent="#sidenavAccordion">
                    <nav class="sb-sidenav-menu-nested nav">
                        <a class="nav-link" href="{{ route('files.index') }}">All Files</a>
                        <a class="nav-link" href="{{ route('files.create') }}">File Uploads</a>
                    </nav>
                </div>
                <a class="nav-link" href="{{ route('dashboard') }}">
                    <div class="sb-nav-link-icon"><i class="fas fa-tachometer-alt"></i></div>
                    Setting
                </a>
                <a class="nav-link" href="{{ route('files.search') }}">
                    <div class="sb-nav-link-icon"><i class="fas fa-search"></i></div>
                    Search
                </a>
                

               
            </div>
        </div>
       
    </nav>
</div>