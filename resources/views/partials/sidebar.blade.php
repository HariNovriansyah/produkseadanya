        <div class="sidebar-content">
            <div class="user">
                <div class="avatar-sm float-left mr-2">
                    <img src="{{ asset('img/profile.jpg') }}" alt="..." class="avatar-img rounded-circle" />
                </div>
                <div class="info">
                    <a data-toggle="collapse" href="#collapseExample" aria-expanded="true">
                        <h1>
                            {{ Auth::user()->name }}
                        </h1>
                    </a>
                    <div class="clearfix"></div>
                    <div class="collapse in" id="collapseExample">
                        <ul class="nav">
                            <li><a href="#profile"><span class="link-collapse">My Profile</span></a></li>
                            <li><a href="#edit"><span class="link-collapse">Edit Profile</span></a></li>
                        </ul>
                    </div>
                </div>
            </div>
            <ul class="nav nav-primary">
                <hr align="center" color="white" size="1">
                <li class="nav-item">
                    <a  href="/home" class="collapsed" aria-expanded="false">
                        <p><b>MENU UTAMA</b></p>
                    </a>
                </li>
                <hr align="center" color="white" size="1">
                <li class="nav-item">
                    <a data-toggle="collapse" href="#base">
                        <i class="fa fa-home"></i>
                        <p>Home</p>
                    </a>
                </li>
                <li class="nav-item">
                    <a data-toggle="collapse" href="#sidebarLayouts">
                        <i class="fas fa-folder"></i>
                        <p>File Master</p>
                        <span class="caret"></span>
                    </a>
                    <div class="collapse" id="sidebarLayouts">
                        <ul class="nav nav-collapse">
                            <li><a href="/kelompokproduk"><span class="sub-item">Kelompok Produk</span></a></li>
                            <li><a href="/produk"><span class="sub-item">Produk</span></a></li>
                            <li><a href="#"><span class="sub-item">Karyawan</span></a></li>
                        </ul>
                    </div>
                </li>
                <li class="nav-item">
                    <a href="#">
                        <i class="fas fa-folder"></i>
                        <p>File Transaksi</p>
                    </a>
                </li>
                <li class="nav-item">
                    <a href="#">
                        <i class="fas fa-folder"></i>
                        <p>File Laporan</p>
                    </a>
                </li>
            </ul>
        </div>
