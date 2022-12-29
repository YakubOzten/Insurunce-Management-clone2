<head>
    <link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.7.0/css/all.css"/>
</head>
<div class="dlabnav">
    <div class="dlabnav-scroll">
        <ul class="metismenu" id="menu">
            <li class="nav-label first">Main Menu</li>
            <li><a class="has-arrow" href="javascript:void()" aria-expanded="false">
                    <i class="fa-solid fa-list-check"></i>
                    <span class="nav-text">Poliçe İşlemleri</span>
                </a>
                <ul aria-expanded="false">
                    <li><a href="{{route("policy-index")}}">Poliçe İndex</a></li>
                    <li><a href="{{route("yonetici-create")}}">Poliçe Create</a></li>

                </ul>
            </li>
            <li><a class="has-arrow" href="javascript:void()" aria-expanded="false">
                    <i class="fa-solid fa-briefcase"></i>

                    <span class="nav-text">Kategori İşlemleri</span>
                </a>
                <ul aria-expanded="false">
                    <li><a href="{{route("yonetici-c_anasayfa")}}">Kategori index</a></li>
                    <li><a href="{{route("yonetici-c_create")}}">Kategori create </a></li>

                </ul>
            </li>
            <li><a class="has-arrow" href="javascript:void()" aria-expanded="false">
                    <i class="fa-regular fa-clipboard"></i>
                    <span class="nav-text">Poliçe Başvuruları</span>
                </a>
                <ul aria-expanded="false">
                    <li><a href="{{route("policy-app")}}">Bekleyen Başvurular</a></li>
                    <li><a href="{{route("finish-app")}}">Tamamlanmiş başvurular </a></li>

                </ul>
            </li>


            <li><a class="has-arrow" href="javascript:void()" aria-expanded="false">
                    <i class="fa-solid fa-handshake-simple"></i>
                    <span class="nav-text">Teklifler</span>
                </a>
                <ul aria-expanded="false">
                    <li><a href="{{route('questions-index')}}">Gelen Teklifler</a></li>
{{--                    <li><a href="add-student.html">Add Students</a></li>--}}
{{--                    <li><a href="edit-student.html">Edit Students</a></li>--}}
{{--                    <li><a href="about-student.html">About Students</a></li>--}}
                </ul>
            </li>
            <li><a class="has-arrow" href="javascript:void()" aria-expanded="false">
                    <i class="fa-solid fa-address-card"></i>
                    <span class="nav-text">İletişim İşlemleri</span>
                </a>
                <ul aria-expanded="false">
                    <li><a href="{{route('contact')}}">Uye İletişim </a></li>
                    {{--                    <li><a href="add-student.html">Add Students</a></li>--}}
                    {{--                    <li><a href="edit-student.html">Edit Students</a></li>--}}
                    {{--                    <li><a href="about-student.html">About Students</a></li>--}}
                </ul>
            </li>
            <li><a class="has-arrow" href="javascript:void()" aria-expanded="false">
                    <i class="fa-solid fa-users"></i>
                    <span class="nav-text">Uye İşlemleri</span>
                </a>
                <ul aria-expanded="false">
                    <li><a href="{{route('uyebilgileri')}}">Uye Bilgileri </a></li>
                    {{--                    <li><a href="add-student.html">Add Students</a></li>--}}
                    {{--                    <li><a href="edit-student.html">Edit Students</a></li>--}}
                    {{--                    <li><a href="about-student.html">About Students</a></li>--}}
                </ul>
            </li>


            {{--            <li><a class="ai-icon" href="{{route('policy-app')}}" aria-expanded="false">--}}
{{--                    <i class="la la-calendar"></i>--}}
{{--                    <span class="nav-text">İletişim İşlemleri </span>--}}
{{--                </a>--}}
{{--            </li>--}}
{{--            <li><a class="has-arrow" href="javascript:void()" aria-expanded="false">--}}
{{--                    <i class="la la-graduation-cap"></i>--}}
{{--                    <span class="nav-text">Courses</span>--}}
{{--                </a>--}}
{{--                <ul aria-expanded="false">--}}
{{--                    <li><a href="all-courses.html">All Courses</a></li>--}}
{{--                    <li><a href="add-courses.html">Add Courses</a></li>--}}
{{--                    <li><a href="edit-courses.html">Edit Courses</a></li>--}}
{{--                    <li><a href="about-courses.html">About Courses</a></li>--}}
{{--                </ul>--}}
{{--            </li>--}}















        </ul>
    </div>


</div>
<script src="https://kit.fontawesome.com/4ea6e3ab0b.js" crossorigin="anonymous"></script>
