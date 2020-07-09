@extends('admin.layouts.masterAddEdit')

@section('card_body')
    @php    
        use App\UserRoles;
        use App\Menu;
        use App\MenuAction;
    @endphp
    <style type="text/css">
        .parentMenuBlock{
            border: 1px solid #d4c8c8;
            padding: 17px 0px;
            margin-bottom: 20px;
        }
    </style>

    <div class="card-body">
        <input type="hidden" name="userroleId" value="{{ $userRoles->id }}">

        <div class="row">
            <div class="col-md-10">
                <input type="checkbox" class="select_all" name="select_all"> Select All                                        
            </div>
        </div>

        <div style="padding-bottom: 10px;"></div>

        @foreach ($userMenus as $mainMenu)
	        @php
	            $rolePermission = explode(',', $userRoles->permission);
	            if (in_array($mainMenu->id, $rolePermission))
	            {
	                $checked = "checked";
	            }
	            else
	            {
	                $checked = "";
	            }                                       
	        @endphp

            @if ($mainMenu->parent_menu == NULL)
                @php
                    $subMenus = Menu::where('parent_menu',$mainMenu->id)->get();
                @endphp
                <div class="row parentMenuBlock">
                    <div class="col-md-12">
                        <input class="parentMenu_{{ $mainMenu->parent_menu }} menu" type="checkbox" name="usermenu[]" value="{{ $mainMenu->id }}" {{ $checked }}  data-id="{{ $mainMenu->id }}" @if ($mainMenu->id == 1) onclick="return false" checked @endif>
                        <span>{{ $mainMenu->menu_name }}</span>
                      
                        <div class="row" style="padding-left: 60px;">
                            @foreach ($subMenus as $menu)
                                @php
                                    $userMenuAction = MenuAction::where('status',1)->orderBy('order_by','ASC')->where('parent_menu_id',$menu->id)->get();
                                    $rolePermission = explode(',', $userRoles->permission);
                                    if (in_array($menu->id, $rolePermission))
                                    {
                                        $checked = "checked";
                                    }
                                    else
                                    {
                                        $checked = "";
                                    }                                            
                                @endphp

                                <div class="col-md-3" style="margin-bottom: 12px;">
                                    <input class="parentMenu_{{ $menu->parent_menu }} menu" type="checkbox" name="usermenu[]" value="{{ $menu->id }}" {{ $checked }}  data-id="{{ $menu->id }}">
                                    <span>{{ $menu->menu_name }}</span>
                                    <div style="margin-left: 26px;margin-top: 3px;">
                                        @foreach ($userMenuAction as $action)
                                            @php
                                                $actionPermission = explode(',', $userRoles->action_permission);
                                                if (in_array($action->id, $actionPermission))
                                                {
                                                    $actionChecked = "checked";
                                                }
                                                else
                                                {
                                                    $actionChecked = "";
                                                }                                                    
                                            @endphp
                                            <input class="childMenu_{{ $action->parent_menu_id }}" type="checkbox" name="usermenuAction[]" value="{{ $action->id }}" style="margin-bottom: 8px;" {{ $actionChecked }}> {{ $action->action_name }} <br>
                                        @endforeach
                                    </div>
                                </div>
                            @endforeach
                        </div>
                    </div>
                </div>
            @endif
        @endforeach
    </div>
@endsection

@section('custom-js')
    <script src="{{ asset('/public/admin-elite/assets/node_modules/jquery/jquery-3.2.1.min.js') }}"></script>

    <script type="text/javascript">
        $(document).ready(function(){
            $('.select_all').click(function(event){
                if(this.checked)
                {
                    // Iterate each checkbox
                    $(':checkbox').each(function(){
                        this.checked = true;
                    });
                }
                else
                {
                    $(':checkbox').each(function(){
                        this.checked = false;
                    });
                }
            });

            $('.menu').click(function(event){
                var menuId = $(this).data('id');
                if(this.checked)
                {
                    $('.parentMenu_'+menuId).each(function()
                    {
                        this.checked = true;
                    });

                    $('.childMenu_'+menuId).each(function(){
                        this.checked = true;
                    });
                }
                else
                {
                    $('.parentMenu_'+menuId).each(function()
                    {
                        this.checked = false;
                    });

                    $('.childMenu_'+menuId).each(function(){
                        this.checked = false;
                    });
                }
            });
        });

        document.forms['editUser'].elements['role'].value = "{{$userRoles->role}}";
    </script>
@endsection