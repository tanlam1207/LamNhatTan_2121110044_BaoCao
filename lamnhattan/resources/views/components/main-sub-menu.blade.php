@if (count($menus)>0)
{{-- <li><a class="nav-link" href="">Trang chủ</a></li>
<li><a class="nav-link" href="">Sản phẩm</a></li>
<li><a class="nav-link" href="">Bài viết</a></li>
<li><a class="nav-link" href="">Giới thiệu</a></li>
<li><a class="nav-link" href="">Liên hệ</a></li> --}}
<li class=" menu2 ">
    <div class="dropdow_sp p-0 m-0">
        <a class="" href="{{ $menurow->link }}" >
            {{ $menurow->name }}<i class="fa-solid fa-caret-down"></i>
            <ul class="p-0 m-0">
                @foreach ($menus as $menu)
                <li class="p-2 "><a class="dropdown-item m-0 p-0" href="{{ $menu->link }}">{{ $menu->name }}</a></li>
                @endforeach
            </ul>
        </a>
        
    </div>
</li>

@else
<li ><a class="nav-link" href="{{ $menurow->link }}">{{ $menurow->name }}</a></li>
@endif