<div class="sl-sideleft">


    <label class="sidebar-label">Menu</label>
    <div class="sl-sideleft-menu">
        <a href="{{ url('/home') }}" class="sl-menu-link">
            <div class="sl-menu-item">
                <i class="menu-item-icon icon ion-ios-home-outline tx-22"></i>
                <span class="menu-item-label">Dashboard</span>
            </div><!-- menu-item -->
        </a>
        @if (auth()->user()->hak == 1)
            <a href="#" class="sl-menu-link">
                <div class="sl-menu-item">
                    <i class="menu-item-icon icon ion-ios-paper-outline tx-22"></i>
                    <span class="menu-item-label">Manajemen</span>
                    <i class="menu-item-arrow fa fa-angle-down"></i>
                </div><!-- menu-item -->
            </a>
            <ul class="sl-menu-sub nav flex-column">
                <li class="nav-item"><a href="{{ route('user.index') }}" class="nav-link">Pengguna</a>
                <li class="nav-item"><a href="{{ route('jabatan.index') }}" class="nav-link">Jabatan</a>
                </li>
                <li class="nav-item"><a href="{{ route('unit.index') }}" class="nav-link">Unit</a></li>
                <li class="nav-item"><a href="{{ route('kategori.index') }}" class="nav-link">Kategori</a>
                </li>

                </li>
            </ul>



            <a href="{{ route('doku.index') }}" class="sl-menu-link">
                <div class="sl-menu-item">
                    <i class="menu-item-icon icon ion-ios-email-outline tx-24"></i>
                    <span class="menu-item-label">Dokumen</span>
                </div><!-- menu-item -->
            </a>
        @endif
        @if (auth()->user()->hak == 3)
            <a href="{{ route('docter.index') }}" class="sl-menu-link">
                <div class="sl-menu-item">
                    <i class="menu-item-icon icon ion-ios-email-outline tx-24"></i>
                    <span class="menu-item-label">Dokumen Dokter</span>
                </div><!-- menu-item -->
            </a>
        @endif

        @if (auth()->user()->hak == 4)
            <a href="{{ route('nakes.index') }}" class="sl-menu-link">
                <div class="sl-menu-item">
                    <i class="menu-item-icon icon ion-ios-email-outline tx-24"></i>
                    <span class="menu-item-label">Dokumen Nakes</span>
                </div><!-- menu-item -->
            </a>
        @endif
    </div><!-- sl-sideleft-menu -->

    <br>
</div><!-- sl-sideleft -->
