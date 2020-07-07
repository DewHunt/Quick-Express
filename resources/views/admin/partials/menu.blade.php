@php
    use App\Menu;
    use App\MenuAction;
    use App\UserRoles;

    $userMenus = Menu::where('status',1)->orderBy('order_by','ASC')->get();
    $roleId =  Auth::user()->role;
    $userRoles = UserRoles::where('id',$roleId)->first();
    $routeName = \Request::route()->getName();
    $userMenuAction = MenuAction::where('action_link',$routeName)->first();
    $childMenuRoute = Menu::where('id',@$userMenuAction->parent_menu_id)->first();
    $parentMenuRoute = Menu::where('id',@$childMenuRoute->parent_menu)->first();
@endphp

<aside class="left-sidebar">
    <!-- Sidebar scroll-->
    <div class="scroll-sidebar">
        <!-- Sidebar navigation-->
        <nav class="sidebar-nav">
            <ul id="sidebarnav">
                @foreach ($userMenus as $menu)
                    @php
                        $rolePermission = explode(',', $userRoles->permission);
                    @endphp

                    @if (in_array($menu->id, $rolePermission))
                        @if ($menu->parent_menu == null)
                            @php
                                $parentMenuLink = $menu->menu_link;
                                $childMenu = Menu::orderBy('order_by','ASC')
                                    ->where('parent_menu',$menu->id)
                                    ->where('Status',1)
                                    ->get();

                                $countChildMenu = count(@$childMenu);

                                if (@$parentMenuRoute->id == $menu->id)
                                {
                                    $parentMenuActive = 'active';
                                    $expandParent = 'in';
                                }
                                else
                                {
                                    $parentMenuActive = '';
                                    $expandParent = '';
                                }
                            @endphp
                            <li class="{{$parentMenuActive}}">

                            @if ($countChildMenu > 0)
                                <a class="waves-effect waves-dark has-arrow {{$parentMenuActive}}" href="javascript:void(0)">
                                    <i class="fa fa-bars"></i><span class="hide-menu">{{ $menu->menu_name }} </span>
                                </a>
                            @else
                                <a class="waves-effect waves-dark" href="{{ route($parentMenuLink) }}">
                                    <i class="fa fa-bars"></i><span class="hide-menu">{{ $menu->menu_name }} </span>
                                </a>
                            @endif

                            @if ($countChildMenu > 0)
                                <ul aria-expanded="false" class="collapse {{$expandParent}}">

                                    @foreach ($childMenu as $menuChild)
                                        @php
                                            $rolePermission = explode(',', $userRoles->permission);
                                        @endphp

                                        @if (in_array($menuChild->id, $rolePermission))
                                            @php
                                                $childMenuLink = $menuChild->menu_link;
                                                if (@$childMenuRoute->menu_link == $menuChild->menu_link)
                                                {
                                                    $activeChildMenu = 'active';
                                                }
                                                else
                                                {
                                                    $activeChildMenu = '';
                                                }
                                            @endphp

                                            <li class="{{$activeChildMenu}}">
                                                <a href="{{ route($childMenuLink) }}" class="{{$activeChildMenu}}">
                                                    <i class="fa fa-caret-right"></i> {{ $menuChild->menu_name }}
                                                </a>
                                            </li>
                                        @endif
                                    @endforeach
                                </ul>
                            @endif
                            </li>
                        @endif
                    @endif
                @endforeach
            </ul>
        </nav>
        <!-- End Sidebar navigation -->
    </div>
    <!-- End Sidebar scroll-->
</aside>