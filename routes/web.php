<?php

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/

// Route::get('/', function () {
//     return view('welcome');
// });

Auth::routes();

// Route::get('/','HomeController@index')->name('admin.index');

Route::prefix('admin')->group(function()
{
	Route::middleware('auth:admin')->group(function()
	{
		Route::group(['middleware'=>'menuPermission'],function()
		{
			//Dashboard Link url
			Route::get('/','HomeController@index')->name('admin.index');

			// Menu 
			Route::get('/menu','Admin\MenuController@index')->name('menu.index');
			Route::get('/menu-add','Admin\MenuController@add')->name('menu.add');
			Route::post('/menu-save','Admin\MenuController@save')->name('menu.save');
			Route::get('/menu-edit/{id}','Admin\MenuController@edit')->name('menu.edit');
			Route::post('/menu-update','Admin\MenuController@update')->name('menu.update');
			Route::post('/menu-status','Admin\MenuController@status')->name('menu.status');
			Route::post('/menu-delete','Admin\MenuController@delete')->name('menu.delete');
			Route::post('/menu-max-order-by','Admin\MenuController@maxOrderBY')->name('menu.maxOrderBy');

			// Menu Action
			Route::get('/menu-action/{id}','Admin\MenuActionController@index')->name('menuAction.index');
			Route::get('/menu-action-add/{menuId}','Admin\MenuActionController@add')->name('menuAction.add');
			Route::post('/menu-action-save','Admin\MenuActionController@save')->name('menuAction.save');
			Route::get('/menu-action-edit/{menuActionId}','Admin\MenuActionController@edit')->name('menuAction.edit');
			Route::post('/menu-action-update','Admin\MenuActionController@update')->name('menuAction.update');
			Route::post('/menu-action-status','Admin\MenuActionController@status')->name('menuAction.status');
			Route::post('/menu-action/delete','Admin\MenuActionController@delete')->name('menuAction.delete');

			// Menu Action Type
			Route::get('/menu-action-type','Admin\MenuActionTypeController@index')->name('menuActionType.index');
			Route::get('/menu-action-type-add','Admin\MenuActionTypeController@add')->name('menuActionType.add');
			Route::post('/menu-action-type-save','Admin\MenuActionTypeController@save')->name('menuActionType.save');
			Route::get('/menu-action-type-edit/{id}','Admin\MenuActionTypeController@edit')->name('menuActionType.edit');
			Route::post('/menu-action-type-update','Admin\MenuActionTypeController@update')->name('menuActionType.update');
			Route::post('/menu-action-type-status','Admin\MenuActionTypeController@status')->name('menuActionType.status');
			Route::post('/menu-action-delete','Admin\MenuActionTypeController@delete')->name('menuActionType.delete');

			//User Manage
			Route::get('/user','Admin\AdminController@index')->name('user.index');
			Route::get('/user-add','Admin\AdminController@addUser')->name('user.add');
			Route::post('/user-save','Admin\AdminController@saveUser')->name('user.save');
			Route::get('/user-edit/{id}','Admin\AdminController@editUser')->name('user.edit');
			Route::post('/user-upate','Admin\AdminController@updateUser')->name('user.update');
			Route::get('/user-change-password/{id}','Admin\AdminController@password')->name('user.changePassword');
			Route::post('/user-save-password','Admin\AdminController@passwordChange')->name('user.savePassword');
			Route::get('/user-profile/{id}','Admin\AdminController@userProfile')->name('user.profile');
			Route::post('/user-delete','Admin\AdminController@deleteUser')->name('user.delete');
			Route::post('/user-status','Admin\AdminController@changeUserStatus')->name('user.status');

			//User Roll Manage
			Route::get('/user-role','Admin\UserRoleController@index')->name('userRole.index');
			Route::get('/user-role-add','Admin\UserRoleController@add')->name('userRole.add');
			Route::post('/user-role-save','Admin\UserRoleController@save')->name('userRole.save');
			Route::get('/user-role-edit/{id}','Admin\UserRoleController@edit')->name('userRole.edit');
			Route::post('/user-role-upate','Admin\UserRoleController@update')->name('userRole.update');
			Route::post('/user-role-delete','Admin\UserRoleController@delete')->name('userRole.delete');
			Route::post('/user-role-status','Admin\UserRoleController@status')->name('userRole.status');
			Route::get('/user-role-permission/{id}','Admin\UserRoleController@permission')->name('userRole.permission');
			Route::post('/user-role-permission-update','Admin\UserRoleController@permissionUpdate')->name('userRole.permissionUpdate');
		
			//Site Information section
			Route::get('/website-information','Admin\WebsiteInformationController@index')->name('websiteInformation.index');
			Route::get('/website-information-add','Admin\WebsiteInformationController@add')->name('websiteInformation.add');
			Route::post('/website-information-save','Admin\WebsiteInformationController@save')->name('websiteInformation.save');
			Route::get('/website-information-edit/{id}','Admin\WebsiteInformationController@edit')->name('websiteInformation.edit');
			Route::post('/website-information-update','Admin\WebsiteInformationController@update')->name('websiteInformation.update');
		
			//Admin Information section
			Route::get('/admin-panel-information','Admin\AdminPanelInformationController@index')->name('adminPanelInformation.index');
			Route::get('/admin-panel-information-add','Admin\AdminPanelInformationController@add')->name('adminPanelInformation.add');
			Route::post('/admin-panel-information-save','Admin\AdminPanelInformationController@save')->name('adminPanelInformation.save');
			Route::get('/admin-panel-information-edit/{id}','Admin\AdminPanelInformationController@edit')->name('adminPanelInformation.edit');
			Route::post('/admin-panel-information-update','Admin\AdminPanelInformationController@update')->name('adminPanelInformation.update');

			// User Menu 
			Route::get('/front-end-menu','Admin\FrontEndMenuController@index')->name('frontEndMenu.index');
			Route::get('/front-end-menu-add','Admin\FrontEndMenuController@add')->name('frontEndMenu.add');
			Route::post('/front-end-menu-save','Admin\FrontEndMenuController@save')->name('frontEndMenu.save');
			Route::get('/front-end-menu-edit/{id}','Admin\FrontEndMenuController@edit')->name('frontEndMenu.edit');
			Route::post('/front-end-menu-update','Admin\FrontEndMenuController@update')->name('frontEndMenu.update');
			Route::post('/front-end-menu-status','Admin\FrontEndMenuController@status')->name('frontEndMenu.status');
			Route::post('/front-end-menu-menu-status','Admin\FrontEndMenuController@menuStatus')->name('frontEndMenu.menuStatus');
			Route::post('/front-end-menu-footer-menu-status','Admin\FrontEndMenuController@footerMenuStatus')->name('frontEndMenu.footerMenuStatus');
			Route::post('/front-end-menu-delete','Admin\FrontEndMenuController@delete')->name('frontEndMenu.delete');
			Route::post('/front-end-menu-max-order-by','Admin\FrontEndMenuController@maxOrderBY')->name('frontEndMenu.maxOrderBy');

			// Socila Links
			Route::get('/social-link','Admin\SocialLinksController@index')->name('socialLink.index');
			Route::get('/social-link-add','Admin\SocialLinksController@add')->name('socialLink.add');
			Route::post('/social-link-save','Admin\SocialLinksController@save')->name('socialLink.save');
			Route::get('/social-link-edit/{id}','Admin\SocialLinksController@edit')->name('socialLink.edit');
			Route::post('/social-link-update','Admin\SocialLinksController@update')->name('socialLink.update');
			Route::post('/social-link-status','Admin\SocialLinksController@status')->name('socialLink.status');
			Route::post('/social-link-delete','Admin\SocialLinksController@delete')->name('socialLink.delete');

			// Sliders
			Route::get('/sliders','Admin\SlidersController@index')->name('sliders.index');
			Route::get('/sliders-add','Admin\SlidersController@add')->name('sliders.add');
			Route::post('/sliders-save','Admin\SlidersController@save')->name('sliders.save');
			Route::get('/sliders-edit/{id}','Admin\SlidersController@edit')->name('sliders.edit');
			Route::post('/sliders-update','Admin\SlidersController@update')->name('sliders.update');
			Route::post('/sliders-status','Admin\SlidersController@status')->name('sliders.status');
			Route::post('/sliders-delete','Admin\SlidersController@delete')->name('sliders.delete');

			// Pages 
			Route::get('/page','Admin\PageController@index')->name('page.index');
			Route::get('/page-add','Admin\PageController@add')->name('page.add');
			Route::post('/page-save','Admin\PageController@save')->name('page.save');
			Route::get('/page-edit/{id}','Admin\PageController@edit')->name('page.edit');
			Route::post('/page-update','Admin\PageController@update')->name('page.update');
			Route::post('/page-status','Admin\PageController@status')->name('page.status');
			Route::post('/page-delete','Admin\PageController@delete')->name('page.delete');

			// Posts
			Route::get('/post/{id}','Admin\PostController@index')->name('post.index');
			Route::get('/post-add/{pageId}','Admin\PostController@add')->name('post.add');
			Route::post('/post-save','Admin\PostController@save')->name('post.save');
			Route::get('/post-edit/{postId}','Admin\PostController@edit')->name('post.edit');
			Route::post('/post-update','Admin\PostController@update')->name('post.update');
			Route::post('/post-status','Admin\PostController@status')->name('post.status');
			Route::post('/post/delete','Admin\PostController@delete')->name('post.delete');

			// Agent 
			Route::get('/agent','Admin\AgentController@index')->name('agent.index');
			Route::get('/agent-add','Admin\AgentController@add')->name('agent.add');
			Route::post('/agent-save','Admin\AgentController@save')->name('agent.save');
			Route::get('/agent-edit/{id}','Admin\AgentController@edit')->name('agent.edit');
			Route::post('/agent-update','Admin\AgentController@update')->name('agent.update');
			Route::post('/agent-status','Admin\AgentController@status')->name('agent.status');
			Route::post('/agent-delete','Admin\AgentController@delete')->name('agent.delete');

			// Subagent 
			Route::get('/subagent','Admin\SubagentController@index')->name('subagent.index');
			Route::get('/subagent-add','Admin\SubagentController@add')->name('subagent.add');
			Route::post('/subagent-save','Admin\SubagentController@save')->name('subagent.save');
			Route::get('/subagent-edit/{id}','Admin\SubagentController@edit')->name('subagent.edit');
			Route::post('/subagent-update','Admin\SubagentController@update')->name('subagent.update');
			Route::post('/subagent-status','Admin\SubagentController@status')->name('subagent.status');
			Route::post('/subagent-delete','Admin\SubagentController@delete')->name('subagent.delete');

			// Warehouse 
			Route::get('/warehouse','Admin\WarehouseController@index')->name('warehouse.index');
			Route::get('/warehouse-add','Admin\WarehouseController@add')->name('warehouse.add');
			Route::post('/warehouse-save','Admin\WarehouseController@save')->name('warehouse.save');
			Route::get('/warehouse-edit/{id}','Admin\WarehouseController@edit')->name('warehouse.edit');
			Route::post('/warehouse-update','Admin\WarehouseController@update')->name('warehouse.update');
			Route::post('/warehouse-status','Admin\WarehouseController@status')->name('warehouse.status');
			Route::post('/warehouse-delete','Admin\WarehouseController@delete')->name('warehouse.delete');

			// Marchant 
			Route::get('/marchant','Admin\MarchantController@index')->name('marchant.index');
			Route::get('/marchant-add','Admin\MarchantController@add')->name('marchant.add');
			Route::post('/marchant-save','Admin\MarchantController@save')->name('marchant.save');
			Route::get('/marchant-edit/{id}','Admin\MarchantController@edit')->name('marchant.edit');
			Route::post('/marchant-update','Admin\MarchantController@update')->name('marchant.update');
			Route::post('/marchant-status','Admin\MarchantController@status')->name('marchant.status');
			Route::post('/marchant-delete','Admin\MarchantController@delete')->name('marchant.delete');

			// Client 
			Route::get('/client','Admin\ClientController@index')->name('client.index');
			Route::get('/client-add','Admin\ClientController@add')->name('client.add');
			Route::post('/client-save','Admin\ClientController@save')->name('client.save');
			Route::get('/client-edit/{id}','Admin\ClientController@edit')->name('client.edit');
			Route::post('/client-update','Admin\ClientController@update')->name('client.update');
			Route::post('/client-status','Admin\ClientController@status')->name('client.status');
			Route::post('/client-delete','Admin\ClientController@delete')->name('client.delete');

			// Delivery Man 
			Route::get('/deliveryMan','Admin\DeliveryManController@index')->name('deliveryMan.index');
			Route::get('/deliveryMan-add','Admin\DeliveryManController@add')->name('deliveryMan.add');
			Route::post('/deliveryMan-save','Admin\DeliveryManController@save')->name('deliveryMan.save');
			Route::get('/deliveryMan-edit/{id}','Admin\DeliveryManController@edit')->name('deliveryMan.edit');
			Route::post('/deliveryMan-update','Admin\DeliveryManController@update')->name('deliveryMan.update');
			Route::post('/deliveryMan-status','Admin\DeliveryManController@status')->name('deliveryMan.status');
			Route::post('/deliveryMan-delete','Admin\DeliveryManController@delete')->name('deliveryMan.delete');

			// Courier Type 
			Route::get('/courierType','Admin\CourierTypeController@index')->name('courierType.index');
			Route::get('/courierType-add','Admin\CourierTypeController@add')->name('courierType.add');
			Route::post('/courierType-save','Admin\CourierTypeController@save')->name('courierType.save');
			Route::get('/courierType-edit/{id}','Admin\CourierTypeController@edit')->name('courierType.edit');
			Route::post('/courierType-update','Admin\CourierTypeController@update')->name('courierType.update');
			Route::post('/courierType-status','Admin\CourierTypeController@status')->name('courierType.status');
			Route::post('/courierType-delete','Admin\CourierTypeController@delete')->name('courierType.delete');

			// Delivery Type 
			Route::get('/deliveryType','Admin\DeliveryTypeController@index')->name('deliveryType.index');
			Route::get('/deliveryType-add','Admin\DeliveryTypeController@add')->name('deliveryType.add');
			Route::post('/deliveryType-save','Admin\DeliveryTypeController@save')->name('deliveryType.save');
			Route::get('/deliveryType-edit/{id}','Admin\DeliveryTypeController@edit')->name('deliveryType.edit');
			Route::post('/deliveryType-update','Admin\DeliveryTypeController@update')->name('deliveryType.update');
			Route::post('/deliveryType-status','Admin\DeliveryTypeController@status')->name('deliveryType.status');
			Route::post('/deliveryType-delete','Admin\DeliveryTypeController@delete')->name('deliveryType.delete');

			// Area Setup
			Route::get('/areaSetup','Admin\AreaSetupController@index')->name('areaSetup.index');
			Route::get('/areaSetup-add','Admin\AreaSetupController@add')->name('areaSetup.add');
			Route::post('/areaSetup-save','Admin\AreaSetupController@save')->name('areaSetup.save');
			Route::get('/areaSetup-edit/{id}','Admin\AreaSetupController@edit')->name('areaSetup.edit');
			Route::post('/areaSetup-update','Admin\AreaSetupController@update')->name('areaSetup.update');
			Route::post('/areaSetup-status','Admin\AreaSetupController@status')->name('areaSetup.status');
			Route::post('/areaSetup-delete','Admin\AreaSetupController@delete')->name('areaSetup.delete');

			// Booking Order 
			Route::get('/bookingOrder','Admin\BookingOrderController@index')->name('bookingOrder.index');
			Route::get('/bookingOrder-add','Admin\BookingOrderController@add')->name('bookingOrder.add');
			Route::post('/bookingOrder-save','Admin\BookingOrderController@save')->name('bookingOrder.save');
			Route::get('/bookingOrder-edit/{id}','Admin\BookingOrderController@edit')->name('bookingOrder.edit');
			Route::post('/bookingOrder-update','Admin\BookingOrderController@update')->name('bookingOrder.update');
			Route::post('/bookingOrder-status','Admin\BookingOrderController@status')->name('bookingOrder.status');
			Route::get('/bookingOrder-view/{id}','Admin\BookingOrderController@view')->name('bookingOrder.view');
			Route::post('/bookingOrder-delete','Admin\BookingOrderController@delete')->name('bookingOrder.delete');
			Route::post('/bookingOrder-client-type-info','Admin\BookingOrderController@getClientTypeInfo')->name('bookingOrder.getClientTypeInfo');
			Route::post('/bookingOrder-delivery-type-info','Admin\BookingOrderController@getDeliveryTypeInfo')->name('bookingOrder.getDeliveryTypeInfo');
			Route::post('/bookingOrder-delivery-type-info','Admin\BookingOrderController@getDeliveryTypeInfo')->name('bookingOrder.getDeliveryTypeInfo');
			Route::post('/bookingOrder-get-client-info','Admin\BookingOrderController@getClientInfo')->name('bookingOrder.getClientInfo');

			// Sender Orders 
			Route::get('/senderOrder','Admin\SenderOrderController@index')->name('senderOrder.index');
			Route::get('/senderOrder-view/{id}','Admin\SenderOrderController@view')->name('senderOrder.view');
			Route::get('/senderOrder-assign-collection-man/{id}','Admin\SenderOrderController@assignCollectionMan')->name('senderOrder.assignCollectionMan');
			Route::post('/senderOrder-assign-collection-man/save','Admin\SenderOrderController@saveAssignedCollectionMan')->name('senderOrder.saveAssignedCollectionMan');
			Route::post('/senderOrder-show-delivery-man-info','Admin\SenderOrderController@showDeliveryManInfo')->name('senderOrder.showDeliveryManInfo');
			Route::post('/senderOrder-goods-receieve-status','Admin\SenderOrderController@goodsReceiveStatus')->name('senderOrder.goodsReceiveStatus');
			Route::get('/senderOrder-transfer-to-host-warehouse/{id}','Admin\SenderOrderController@transferToHostWarehouse')->name('senderOrder.transferToHostWarehouse');
			Route::post('/senderOrder-transfer-to-host-warehouse/save','Admin\SenderOrderController@saveTransferToHostWarehouse')->name('senderOrder.saveTransferToHostWarehouse');
			Route::post('/senderOrder-show-warehouse-info','Admin\SenderOrderController@showWarehouseInfo')->name('senderOrder.showWarehouseInfo');

			// Receiver Orders 
			Route::get('/receiverOrder','Admin\ReceiverOrderController@index')->name('receiverOrder.index');
			Route::get('/receiverOrder-view/{id}','Admin\ReceiverOrderController@view')->name('receiverOrder.view');
			Route::get('/receiverOrder-assign-delivery-man/{id}','Admin\ReceiverOrderController@assignDeliveryMan')->name('receiverOrder.assignDeliveryMan');
			Route::post('/receiverOrder-assign-delivery-man/save','Admin\ReceiverOrderController@saveAssignedDeliveryMan')->name('receiverOrder.saveAssignedDeliveryMan');
			Route::post('/receiverOrder-show-delivery-man-info','Admin\ReceiverOrderController@showDeliveryManInfo')->name('receiverOrder.showDeliveryManInfo');
			Route::post('/receiverOrder-goods-receieve-status','Admin\ReceiverOrderController@goodsReceiveStatus')->name('receiverOrder.goodsReceiveStatus');
			Route::post('/receiverOrder-goods-delivery-status','Admin\ReceiverOrderController@goodsDeliveryStatus')->name('receiverOrder.goodsDeliveryStatus');

			// Goods Collection 
			Route::get('/goodsCollection','Admin\GoodsCollectionController@index')->name('goodsCollection.index');
			Route::get('/goodsCollection-view/{id}','Admin\GoodsCollectionController@view')->name('goodsCollection.view');
			Route::post('/goodsCollection-approve-collection','Admin\GoodsCollectionController@approveOrRefuseCollection')->name('goodsCollection.approveOrRefuseCollection');

			// Goods Delivery 
			Route::get('/goodsDelivery','Admin\GoodsDeliveryController@index')->name('goodsDelivery.index');
			Route::get('/goodsDelivery-view/{id}','Admin\GoodsDeliveryController@view')->name('goodsDelivery.view');
			Route::post('/goodsDelivery-approve-delivery','Admin\GoodsDeliveryController@approveOrRefuseDelivery')->name('goodsDelivery.approveOrRefuseDelivery');

			// Receive From Agent
			Route::get('/receiveFormAgent','Admin\ReceiveFromAgentController@index')->name('receiveFormAgent.index');
			Route::get('/receiveFormAgent-view/{id}','Admin\ReceiveFromAgentController@view')->name('receiveFormAgent.view');
			Route::post('/receiveFormAgent-goods-receieve-status','Admin\ReceiveFromAgentController@goodsReceiveStatus')->name('receiveFormAgent.goodsReceiveStatus');
			// Receive From Warehouse
			Route::get('/receiveFormWarehouse','Admin\ReceiveFromWarehouseController@index')->name('receiveFromWarehouse.index');
			Route::get('/receiveFormWarehouse-view/{id}','Admin\ReceiveFromWarehouseController@view')->name('receiveFromWarehouse.view');
			Route::post('/receiveFormWarehouse-goods-receieve-status','Admin\ReceiveFromWarehouseController@goodsReceiveStatus')->name('receiveFromWarehouse.goodsReceiveStatus');

			// Issue To Warehouse
			Route::get('/issueToWarehouse','Admin\IssueToWarehouseController@index')->name('issueToWarehouse.index');
			Route::get('/issueToWarehouse-view/{id}','Admin\IssueToWarehouseController@view')->name('issueToWarehouse.view');
			Route::get('/issueToWarehouse-issue-to-warehouse/{id}','Admin\IssueToWarehouseController@issueToWarehouse')->name('issueToWarehouse.issueToWarehouse');
			Route::post('/issueToWarehouse-issue-to-warehouse/save','Admin\IssueToWarehouseController@saveIssueToWarehouse')->name('issueToWarehouse.saveIssueToWarehouse');
			Route::post('/issueToWarehouse-show-warehouse-info','Admin\IssueToWarehouseController@showWarehouseInfo')->name('issueToWarehouse.showWarehouseInfo');

			// Issue To Agents
			Route::get('/issueToAgent','Admin\IssueToAgentController@index')->name('issueToAgent.index');
			Route::get('/issueToAgent-view/{id}','Admin\IssueToAgentController@view')->name('issueToAgent.view');
			Route::post('/issueToAgent-status','Admin\IssueToAgentController@issueToAgentStatus')->name('issueToAgent.issueToAgentStatus');

			// Issue To Agents
			Route::get('/issueToSubagent','Admin\IssueToSubagentController@index')->name('issueToSubagent.index');
			Route::get('/issueToSubagent-view/{id}','Admin\IssueToSubagentController@view')->name('issueToSubagent.view');
			Route::post('/issueToSubagent-status','Admin\IssueToSubagentController@issueToSubagentStatus')->name('issueToSubagent.issueToSubagentStatus');
		});
	});

	//Admin Login Url
	Route::get('/login', 'Auth\AdminLoginController@showLoginForm')->name('admin.login');
	Route::post('/login', 'Auth\AdminLoginController@login');
    Route::post('/logout', 'Auth\AdminLoginController@adminLogout')->name('admin.logout');

    // Password Reset Routes...
    Route::get('/password/reset', 'Auth\AdminForgotPasswordController@passwordForget')->name('admin.password.forget');
    Route::post('/password/email', 'Auth\AdminForgotPasswordController@passwordEmail')->name('admin.password.email');
    Route::get('/new-password/{email}', 'Auth\AdminForgotPasswordController@newPassword')->name('admin.password.newPassword');
    Route::post('/password/save', 'Auth\AdminForgotPasswordController@changePasswordSave')->name('admin.password.save');
});

// Route::get('/home', 'HomeController@index')->name('home');


//Frontend part start here
Route::get('/','FrontendController@index');

//code for custom/user
Route::prefix('user')->group(function(){
	Route::namespace('Auth\Customer')->group(function () { 
		Route::match(['GET', 'POST'], '/registration', 'CustomerAuthController@registration')->name('user.registration');
		Route::match(['GET'], '/verification', 'CustomerAuthController@completeRegistration')->name('user.verificationLink');

		Route::match(['GET', 'POST'], '/login', 'CustomerAuthController@login')->name('user.login');
	});

	//authentication for customer
	Route::middleware('auth:customer')->group(function(){
		Route::any('/dashboard', 'CustomerController@dashboard')->name('user.dashboard');
		Route::any('/profile', 'CustomerController@profile')->name('user.profile');
		Route::any('/profile-edit', 'CustomerController@editProfile')->name('user.editProfile');
		Route::any('/booking', 'BookingController@index')->name('user.booking');
		Route::any('/booking/create', 'BookingController@create')->name('user.bookingCreate');
		Route::any('/booking/edit/{id}', 'BookingController@edit')->name('user.bookingEdit');
		Route::any('/booking/view/{id}', 'BookingController@view')->name('user.bookingView');

		Route::any('/logout', 'Auth\Customer\CustomerAuthController@logout')->name('user.logout');
	});

});

//code for biker
Route::prefix('biker')->group(function(){
	Route::namespace('Auth\Biker')->group(function () { 
		Route::any('/registration', 'BikerAuthController@registration')->name('biker.registration');
		Route::any('/verification', 'BikerAuthController@completeRegistration')->name('biker.verificationLink');

		Route::any('/login', 'BikerAuthController@login')->name('biker.login');
	});

	//authentication for biker
	Route::middleware('auth:biker')->group(function(){
		Route::any('/dashboard', 'BikerController@dashboard')->name('biker.dashboard');
		Route::any('/profile', 'BikerController@profile')->name('biker.profile');
		Route::any('/profile-edit', 'BikerController@editProfile')->name('biker.editProfile');
		Route::any('/logout', 'Auth\Biker\BikerAuthController@logout')->name('biker.logout');
	});

});

//code for merchant
Route::prefix('merchant')->group(function(){
	Route::namespace('Auth\Merchant')->group(function () { 
		Route::any('/registration', 'MerchantAuthController@registration')->name('merchant.registration');
		Route::any('/verification', 'MerchantAuthController@completeRegistration')->name('merchant.verificationLink');

		Route::any('/login', 'MerchantAuthController@login')->name('merchant.login');
	});

	//authentication for merchant
	Route::middleware('auth:merchant')->group(function(){
		
	});

});

Route::any('/test-url', 'MerchantAuthController@login')->name('merchant.login');
