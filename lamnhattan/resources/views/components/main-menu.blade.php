
 <ul class="main_menu d-flex justify-cotent-center">
    @foreach ($menus as $menu)
    <x-main-sub-menu :menu="$menu"/>
@endforeach
           
          </ul>