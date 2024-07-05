<!-- Topbar Start -->
{{-- <div class="container-fluid bg-light px-0 wow fadeIn" data-wow-delay="0.1s">
    <div class="row gx-0 align-items-center d-none d-lg-flex">
        <div class="col-lg-6 px-5 text-start">
            <ol class="breadcrumb mb-0">
                <li class="breadcrumb-item"><a class="small text-dark">Support : <span
                            class="text-muted">admin@mimhgogourung.sch.id</span></a></li>
            </ol>
        </div>
        <div class="col-lg-6 px-5 text-end">
            <div class="h-100 d-inline-flex align-items-center">
                <a class="btn-square text-success border-end rounded-0" href="https://www.facebook.com/mimh.gogourung"
                    target="_blank"><i class="fab fa-facebook"></i></a>
                <a class="btn-square text-success pe-0 border-end rounded-0"
                    href="https://www.instagram.com/mimhgogourung/" target="_blank"><i class="fab fa-instagram"></i></a>
                <a class="btn-square text-success" href="https://www.youtube.com/channel/UCTao-sMMlTqTeU-wCKKYuUA"
                    target="_blank"><i class="fab fa-youtube"></i></a>
            </div>
        </div>
    </div>
</div> --}}
<!-- Topbar End -->


<!-- Brand & Contact Start -->
{{-- <div class="container-fluid py-4 px-5 wow fadeIn" data-wow-delay="0.1s">
    <div class="row align-items-center top-bar">
        {{-- <div class="col-lg-4 col-md-12 text-lg-start d-flex justify-content-center">
            <a href="/" class="navbar-brand m-0 p-0">
                <div class="d-flex align-items-center">
                    <img src="{{ asset('favicon48x48.png') }}" alt="Logo" width="50" height="50">
                    <span>
                        <h1 class="fw-bold text-primary m-0 d-inline-block ms-3">Kecamatan Galing</h1>
                    </span>
                </div>
            </a>
        </div> --}}
        {{-- <div class="col-lg-8 col-md-7 d-none d-lg-block">
            <div class="row">
                <div class="col">
                    <div class="d-flex align-items-center justify-content-end">
                        <div class="flex-shrink-0 btn-lg-square border rounded-circle">
                            <i class="far fa-clock text-success"></i>
                        </div>
                        <div class="ps-3">
                            <p class="mb-2">JAM BUKA</p>
                            <h6 class="mb-1">Senin - Kamis, 06.30 - 13.40</h6>
                            {{-- <h6 class="mb-1">Jum'at, 06.30 - 11.00</h6>
                            <h6 class="mb-0">Sabtu, 06.30 - 12.20</h6>
                        </div>
                    </div>
                </div>
                <div class="col-4">
                    <div class="d-flex align-items-center justify-content-end">
                        <div class="flex-shrink-0 btn-lg-square border rounded-circle">
                            <i class="fa fa-phone text-success"></i>
                        </div>
                        <div class="ps-3">
                            <p class="mb-2">TELEPON</p>
                            <h6 class="mb-0">(0342) 816646</h6>
                        </div>
                    </div>
                </div>
            </div>
        </div> 
    </div>
</div> --}}
<!-- Brand & Contact End -->


<!-- Navbar Start -->
<nav class="navbar navbar-expand-lg bg-primary navbar-dark sticky-top py-lg-0 px-lg-5 wow fadeIn" data-wow-delay="0.1s">
    <div class="container-fluid">
        <a href="/" class="navbar-brand m-0 p-0">
            <div class="d-flex align-items-center">
                <img src="{{ asset('favicon48x48.png') }}" alt="Logo" width="50" height="50">
                <span>
                    <h3 class="fw-bold text-light m-0 d-inline-block ms-3">KECAMATAN GALING</h3>
                </span>
            </div>
        </a>
        <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarCollapse" aria-controls="navbarCollapse" aria-expanded="false" aria-label="Toggle navigation">
            <span class="navbar-toggler-icon"></span>
        </button>
        <div class="collapse navbar-collapse justify-content-end" id="navbarCollapse">
            <ul class="navbar-nav">
                <li class="nav-item">
                    <a href="{{url('/') }}" class="nav-link {{ Request::is('/') ? 'active' : '' }}">BERANDA</a>
                </li>
                <li class="nav-item dropdown">
                    <a href="#" class="nav-link dropdown-toggle {{ Request::is('about', 'structure') ? 'active' : '' }}" data-bs-toggle="dropdown">PROFIL</a>
                    <ul class="dropdown-menu border-0 rounded-0 rounded-bottom m-0">
                        <li><a href="{{ url('/about') }}" class="dropdown-item">TENTANG KAMI</a></li>
                        <li><a href="{{ url('/sambutan') }}" class="dropdown-item">SAMBUTAN CAMAT</a></li>
                        <li><a href="{{ url('/structure') }}" class="dropdown-item">STRUKTUR ORGANISASI</a></li>
                    </ul>
                </li>
                <li class="nav-item">
                    <a href="{{ url('/kegiatan') }}" class="nav-link {{ Request::is('kegiatan') ? 'active' : '' }}">KEGIATAN</a>
                </li>
                <li class="nav-item">
                    <a href="{{ url('/pengumuman') }}" class="nav-link {{ Request::is('pengumuman') ? 'active' : '' }}">PENGUMUMAN</a>
                </li>
                <li class="nav-item">
                    <a href="{{ url('/berita') }}" class="nav-link {{ Request::is('berita') ? 'active' : '' }}">BERITA</a>
                </li>
            </ul>
        </div>
    </div>
</nav>

<!-- Navbar End -->
