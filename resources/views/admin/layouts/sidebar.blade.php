<div class="sidebar-inner slimscrollleft">

    <div id="sidebar-menu">
        <ul>
            <li class="menu-title yekan">منو</li>

            <li>
                    <a href="{{route('admin.mainPage')}}" class="waves-effect">
                    <i class="dripicons-home"></i>
                    <span> {{ __('mainMenu') }} <span class="badge badge-success badge-pill float-right">0</span></span>
                </a>
            </li>

            <li class="has_sub">
                <a href="javascript:void(0);" class="waves-effect"><i class="dripicons-briefcase"></i> <span> لیست ها </span> <span class="menu-arrow float-right"><i class="mdi mdi-chevron-right"></i></span></a>
                <ul class="list-unstyled">
                    <li><a href="{{route('admin.users')}}">لیست کاربران</a></li>
                    <li><a href="{{route('admin.category')}}">دسته بندی پارچه ها</a></li>
                    <li><a href="{{route('admin.fabric')}}">لیست پارچه ها </a></li>

                </ul>
            </li>



            <li class="has_sub">
                <a href="javascript:void(0);" class="waves-effect"><i class="dripicons-rocket"></i> <span> Icons </span> <span class="menu-arrow float-right"><i class="mdi mdi-chevron-right"></i></span></a>
                <ul class="list-unstyled">
                    <li><a href="icons-material.html">Material Design</a></li>
                    <li><a href="icons-ion.html">Ion Icons</a></li>
                    <li><a href="icons-fontawesome.html">Font Awesome</a></li>
                    <li><a href="icons-themify.html">Themify Icons</a></li>
                    <li><a href="icons-dripicons.html">Dripicons</a></li>
                    <li><a href="icons-typicons.html">Typicons Icons</a></li>
                </ul>
            </li>



        </ul>
    </div>
</div> <!-- end sidebarinner -->
