<div id="nav-bar" class="nav-bar-main-block">
	<div class="sticky-area">
		<div class="container">
			<div class="row">
				<div class="col-lg-3 col-md-12">
					<!--logo-->
					<div class="logo">
						<a href="{{url('/')}}" title="logo">
							<img src="{{ asset(@$website_information->logo_one) }}" alt="logo">
						</a>
					</div>
					<!-- Responsive Menu Area -->
					<div class="responsive-menu-wrap"></div>
				</div>

				<div class="col-lg-7">
					<!-- main-menu-->
					<div class="navigation text-white">
						<div id="cssmenu">
							<ul>
								@php
									$menus = DB::table('tbl_frontend_menu')
										->where('parent_menu','=',null)
										->orderby('order_by','asc')
										->get();
								@endphp
								@foreach ($menus as $menu)
									@php
										$subMenus = DB::table('tbl_frontend_menu')
											->where('parent_menu','=',$menu->id)
											->orderby('order_by','asc')
											->get()
									@endphp

									@if (count($subMenus) > 0)
										<li>
											<a href="#">{{ $menu->menu_name }} +</a>
											<ul>
												@foreach ($subMenus as $subMenu)
													<li><a href="{{ route($subMenu->menu_link) }}">{{ $subMenu->menu_name }}</a></li>
												@endforeach
											</ul>
										</li>
									@else
										<li {{-- class="active" --}}>
											<a href="{{ route($menu->menu_link) }}">{{ $menu->menu_name }}</a>
										</li>	
									@endif							
								@endforeach
							</ul>
						</div>
					</div>
				</div>

				<div class="col-lg-2 col-12">
					<div>
						<ul>
							<form action="{{ route('order.track') }}" method="get">
								@csrf
								<li>
									<input class="form-control" type="text" name="order_track" style="margin: 25px 0px;" placeholder="Enter order no" value="{{@$order_no}}">
								</li>
								
							</form>
						</ul>						
					</div>
				</div>
			</div>
		</div>
	</div>
</div>