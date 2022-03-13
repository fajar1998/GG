<div class="sl-header-right">
    @php
        $user = DB::table('users')
            ->where('id', Auth::user()->id)
            ->first();
    @endphp
    <nav class="nav">
        <div class="dropdown show">
            <a href="" class="nav-link nav-link-profile" data-toggle="dropdown" aria-expanded="true">
                <span class="logged-name"> {{ Auth::user()->name }}</span>
                <img src="{{ !empty($user->foto) ? url('upload/profil/' . $user->foto) : url('upload/icon.jpg') }}"
                    class="wd-32 rounded-circle" alt="">
            </a>
            <div class="dropdown-menu dropdown-menu-header wd-200">
                <ul class="list-unstyled user-profile-nav">
                    <li><a href="{{ route('profil.index') }}"><i class="icon ion-ios-person-outline"></i>Profile</a>
                    </li>
                    <li><a href="{{ route('pw.edit', Crypt::encrypt($user->id)) }}"><i
                                class="icon ion-ios-gear-outline"></i>Ganti Password</a></li>
                    <form action="{{ route('logout') }}" method="POST">
                        @csrf
                        <li>
                            <button class="btn btn-dark"><i class="fa fa-sign-out"></i>&nbsp;&nbsp;&nbsp;&nbsp;Log
                                Out</button>
                        </li>
                    </form>



                </ul>
            </div><!-- dropdown-menu -->
        </div><!-- dropdown -->
    </nav>
    <div class="navicon-right">

    </div><!-- navicon-right -->
</div><!-- sl-header-right -->
