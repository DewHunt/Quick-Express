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

			// Delivery Type 
			Route::get('/deliveryType','Admin\DeliveryTypeController@index')->name('deliveryType.index');
			Route::get('/deliveryType-add','Admin\DeliveryTypeController@add')->name('deliveryType.add');
			Route::post('/deliveryType-save','Admin\DeliveryTypeController@save')->name('deliveryType.save');
			Route::get('/deliveryType-edit/{id}','Admin\DeliveryTypeController@edit')->name('deliveryType.edit');
			Route::post('/deliveryType-update','Admin\DeliveryTypeController@update')->name('deliveryType.update');
			Route::post('/deliveryType-status','Admin\DeliveryTypeController@status')->name('deliveryType.status');
			Route::post('/deliveryType-delete','Admin\DeliveryTypeController@delete')->name('deliveryType.delete');

			// Service 
			Route::get('/service','Admin\ServiceController@index')->name('service.index');
			Route::get('/service-add','Admin\ServiceController@add')->name('service.add');
			Route::post('/service-save','Admin\ServiceController@save')->name('service.save');
			Route::get('/service-edit/{id}','Admin\ServiceController@edit')->name('service.edit');
			Route::post('/service-update','Admin\ServiceController@update')->name('service.update');
			Route::post('/service-status','Admin\ServiceController@status')->name('service.status');
			Route::post('/service-delete','Admin\ServiceController@delete')->name('service.delete');

			// Service Type
			Route::get('/serviceType','Admin\ServiceTypeController@index')->name('serviceType.index');
			Route::get('/serviceType-add','Admin\ServiceTypeController@add')->name('serviceType.add');
			Route::post('/serviceType-save','Admin\ServiceTypeController@save')->name('serviceType.save');
			Route::get('/serviceType-edit/{id}','Admin\ServiceTypeController@edit')->name('serviceType.edit');
			Route::post('/serviceType-update','Admin\ServiceTypeController@update')->name('serviceType.update');
			Route::post('/serviceType-status','Admin\ServiceTypeController@status')->name('serviceType.status');
			Route::post('/serviceType-delete','Admin\ServiceTypeController@delete')->name('serviceType.delete');

			// Charge For Client
			Route::get('/chargeForClient','Admin\ChargeForClientController@index')->name('chargeForClient.index');
			Route::get('/chargeForClient-add','Admin\ChargeForClientController@add')->name('chargeForClient.add');
			Route::post('/chargeForClient-save','Admin\ChargeForClientController@save')->name('chargeForClient.save');
			Route::get('/chargeForClient-edit/{id}','Admin\ChargeForClientController@edit')->name('chargeForClient.edit');
			Route::post('/chargeForClient-update','Admin\ChargeForClientController@update')->name('chargeForClient.update');
			Route::post('/chargeForClient-status','Admin\ChargeForClientController@status')->name('chargeForClient.status');
			Route::post('/chargeForClient-delete','Admin\ChargeForClientController@delete')->name('chargeForClient.delete');

			// Charge For Merchant
			Route::get('/chargeForMerchant','Admin\ChargeForMerchantController@index')->name('chargeForMerchant.index');
			Route::get('/chargeForMerchant-add','Admin\ChargeForMerchantController@add')->name('chargeForMerchant.add');
			Route::post('/chargeForMerchant-save','Admin\ChargeForMerchantController@save')->name('chargeForMerchant.save');
			Route::get('/chargeForMerchant-edit/{id}','Admin\ChargeForMerchantController@edit')->name('chargeForMerchant.edit');
			Route::post('/chargeForMerchant-update','Admin\ChargeForMerchantController@update')->name('chargeForMerchant.update');
			Route::post('/chargeForMerchant-status','Admin\ChargeForMerchantController@status')->name('chargeForMerchant.status');
			Route::post('/chargeForMerchant-delete','Admin\ChargeForMerchantController@delete')->name('chargeForMerchant.delete');
			Route::post('/chargeForMerchant-get-service-name','Admin\ChargeForMerchantController@getServiceInfo')->name('chargeForMerchant.getServiceInfo');

			// Charge For Delivery Men
			Route::get('/chargeForDeliveryMen','Admin\ChargeForDeliveryMenController@index')->name('chargeForDeliveryMen.index');
			Route::get('/chargeForDeliveryMen-add','Admin\ChargeForDeliveryMenController@add')->name('chargeForDeliveryMen.add');
			Route::post('/chargeForDeliveryMen-save','Admin\ChargeForDeliveryMenController@save')->name('chargeForDeliveryMen.save');
			Route::get('/chargeForDeliveryMen-edit/{id}','Admin\ChargeForDeliveryMenController@edit')->name('chargeForDeliveryMen.edit');
			Route::post('/chargeForDeliveryMen-update','Admin\ChargeForDeliveryMenController@update')->name('chargeForDeliveryMen.update');
			Route::post('/chargeForDeliveryMen-status','Admin\ChargeForDeliveryMenController@status')->name('chargeForDeliveryMen.status');
			Route::post('/chargeForDeliveryMen-delete','Admin\ChargeForDeliveryMenController@delete')->name('chargeForDeliveryMen.delete');

			// Hub Setup
			Route::get('/hubSetup','Admin\HubSetupController@index')->name('hubSetup.index');
			Route::get('/hubSetup-add','Admin\HubSetupController@add')->name('hubSetup.add');
			Route::post('/hubSetup-save','Admin\HubSetupController@save')->name('hubSetup.save');
			Route::get('/hubSetup-edit/{id}','Admin\HubSetupController@edit')->name('hubSetup.edit');
			Route::post('/hubSetup-update','Admin\HubSetupController@update')->name('hubSetup.update');
			Route::post('/hubSetup-status','Admin\HubSetupController@status')->name('hubSetup.status');
			Route::post('/hubSetup-delete','Admin\HubSetupController@delete')->name('hubSetup.delete');

			// Area Setup
			Route::get('/areaSetup','Admin\AreaSetupController@index')->name('areaSetup.index');
			Route::get('/areaSetup-add','Admin\AreaSetupController@add')->name('areaSetup.add');
			Route::post('/areaSetup-save','Admin\AreaSetupController@save')->name('areaSetup.save');
			Route::get('/areaSetup-edit/{id}','Admin\AreaSetupController@edit')->name('areaSetup.edit');
			Route::post('/areaSetup-update','Admin\AreaSetupController@update')->name('areaSetup.update');
			Route::post('/areaSetup-status','Admin\AreaSetupController@status')->name('areaSetup.status');
			Route::post('/areaSetup-delete','Admin\AreaSetupController@delete')->name('areaSetup.delete');
			Route::post('/areaSetup-get-area-info','Admin\AreaSetupController@getAreaInfo')->name('areaSetup.getAreaInfo');

			// Booking Order 
			Route::get('/bookingOrder','Admin\BookingOrderController@index')->name('bookingOrder.index');
			Route::get('/bookingOrder-add','Admin\BookingOrderController@add')->name('bookingOrder.add');
			Route::post('/bookingOrder-save','Admin\BookingOrderController@save')->name('bookingOrder.save');
			Route::get('/bookingOrder-edit/{id}','Admin\BookingOrderController@edit')->name('bookingOrder.edit');
			Route::post('/bookingOrder-update','Admin\BookingOrderController@update')->name('bookingOrder.update');
			Route::post('/bookingOrder-status','Admin\BookingOrderController@status')->name('bookingOrder.status');
			Route::get('/bookingOrder-view/{id}','Admin\BookingOrderController@view')->name('bookingOrder.view');
			Route::post('/bookingOrder-delete','Admin\BookingOrderController@delete')->name('bookingOrder.delete');
			Route::post('/bookingOrder-get-client-info','Admin\BookingOrderController@getClientInfo')->name('bookingOrder.getClientInfo');
			Route::post('/bookingOrder-get-receiver-info','Admin\BookingOrderController@getReceiverInfo')->name('bookingOrder.getReceiverInfo');
			Route::post('/bookingOrder-get-charge-info','Admin\BookingOrderController@getChargeInfo')->name('bookingOrder.getChargeInfo');
			Route::post('/bookingOrder-get-agent-info','Admin\BookingOrderController@getAgentInfo')->name('bookingOrder.getAgentInfo');
			Route::post('/bookingOrder-get-service-info','Admin\BookingOrderController@getServiceInfo')->name('bookingOrder.getServiceInfo');

			// Booking Order POS
			Route::get('/bookingOrder-pos','Admin\BookingOrderPosController@index')->name('bookingOrderPos.index');
			Route::post('/bookingOrder-pos','Admin\BookingOrderPosController@index')->name('bookingOrderPos.index');
			Route::post('/bookingOrder-pos-print','Admin\BookingOrderPosController@print')->name('bookingOrderPos.print');

			// Assigned Delivery Man
			Route::get('/assignedDeliveryMan','Admin\AssignedDeliveryManController@index')->name('assignedDeliveryMan.index');
			Route::get('/assignedDeliveryMan-add','Admin\AssignedDeliveryManController@add')->name('assignedDeliveryMan.add');
			Route::post('/assignedDeliveryMan-save','Admin\AssignedDeliveryManController@save')->name('assignedDeliveryMan.save');
			Route::get('/assignedDeliveryMan-view/{id}','Admin\AssignedDeliveryManController@view')->name('assignedDeliveryMan.view');
			Route::post('/assignedDeliveryMan-reject','Admin\AssignedDeliveryManController@reject')->name('assignedDeliveryMan.reject');
			Route::post('/assignedDeliveryMan-hub-wise-order','Admin\AssignedDeliveryManController@hubWiseOrder')->name('assignedDeliveryMan.hubWiseOrder');
			Route::post('/assignedDeliveryMan-get-all-areas','Admin\AssignedDeliveryManController@getAllAreas')->name('assignedDeliveryMan.getAllAreas');
			Route::post('/assignedDeliveryMan-area-wise-order','Admin\AssignedDeliveryManController@areaWiseOrder')->name('assignedDeliveryMan.areaWiseOrder');

			// Assigned Delivery Man
			Route::get('/assignedDeliveryMan','Admin\AssignedDeliveryManController@index')->name('assignedDeliveryMan.index');
			Route::get('/assignedDeliveryMan-add','Admin\AssignedDeliveryManController@add')->name('assignedDeliveryMan.add');
			Route::post('/assignedDeliveryMan-save','Admin\AssignedDeliveryManController@save')->name('assignedDeliveryMan.save');
			Route::get('/assignedDeliveryMan-view/{id}','Admin\AssignedDeliveryManController@view')->name('assignedDeliveryMan.view');
			Route::post('/assignedDeliveryMan-reject','Admin\AssignedDeliveryManController@reject')->name('assignedDeliveryMan.reject');
			Route::post('/assignedDeliveryMan-hub-wise-order','Admin\AssignedDeliveryManController@hubWiseOrder')->name('assignedDeliveryMan.hubWiseOrder');
			Route::post('/assignedDeliveryMan-get-all-areas','Admin\AssignedDeliveryManController@getAllAreas')->name('assignedDeliveryMan.getAllAreas');
			Route::post('/assignedDeliveryMan-area-wise-order','Admin\AssignedDeliveryManController@areaWiseOrder')->name('assignedDeliveryMan.areaWiseOrder');

			// Assign Order Status
			Route::get('/assignedOrderStatus','Admin\AssignedOrderStatusController@index')->name('assignedOrderStatus.index');
			Route::post('/assignedOrderStatus','Admin\AssignedOrderStatusController@index')->name('assignedOrderStatus.index');
			Route::get('/assignedOrderStatus-add','Admin\AssignedOrderStatusController@add')->name('assignedOrderStatus.add');
			Route::post('/assignedOrderStatus-save','Admin\AssignedOrderStatusController@save')->name('assignedOrderStatus.save');
			Route::get('/assignedOrderStatus-view/{id}','Admin\AssignedOrderStatusController@view')->name('assignedOrderStatus.view');
			Route::post('/assignedOrderStatus-reject','Admin\AssignedOrderStatusController@reject')->name('assignedOrderStatus.reject');
			Route::post('/assignedOrderStatus-hub-wise-order','Admin\AssignedOrderStatusController@hubWiseOrder')->name('assignedOrderStatus.hubWiseOrder');
			Route::post('/assignedOrderStatus-get-all-areas','Admin\AssignedOrderStatusController@getAllAreas')->name('assignedOrderStatus.getAllAreas');
			Route::post('/assignedOrderStatus-area-wise-order','Admin\AssignedOrderStatusController@areaWiseOrder')->name('assignedOrderStatus.areaWiseOrder');
			Route::post('/assignedOrderStatus-delivery-man-wise-order','Admin\AssignedOrderStatusController@deliveryManWiseOrder')->name('assignedOrderStatus.deliveryManWiseOrder');

			// Order List
			Route::get('/order-list','Admin\OrderListController@index')->name('orderList.index');
			Route::post('/order-list','Admin\OrderListController@index')->name('orderList.index');
			Route::post('/order-list-print','Admin\OrderListController@print')->name('orderList.print');

			// Order Status List
			Route::get('/order-starus-list','Admin\OrderStatusListController@index')->name('orderStatusList.index');
			Route::post('/order-starus-list','Admin\OrderStatusListController@index')->name('orderStatusList.index');
			Route::post('/order-starus-list-print','Admin\OrderStatusListController@print')->name('orderStatusList.print');


			//Booking Order For Merchant
			Route::get('/merchant-booking-order','Admin\MerchantBookingOrderController@index')->name('merchantBookingOrder.index');

			Route::get('/merchant-booking-order-add','Admin\MerchantBookingOrderController@add')->name('merchantBookingOrder.add');
			Route::post('/merchant-booking-order-add-save','Admin\MerchantBookingOrderController@save')->name('merchantBookingOrder.save');

			Route::get('/merchant-booking-order-view/{id}','Admin\MerchantBookingOrderController@view')->name('merchantBookingOrder.view');

			Route::get('/merchant-booking-order-edit/{id}','Admin\MerchantBookingOrderController@edit')->name('merchantBookingOrder.edit');
			Route::post('/merchant-booking-order-update','Admin\MerchantBookingOrderController@update')->name('merchantBookingOrder.update');

			Route::post('/merchant-booking-order-status','Admin\MerchantBookingOrderController@status')->name('merchantBookingOrder.status');
			
			Route::post('/merchant-booking-order-delete','Admin\MerchantBookingOrderController@delete')->name('merchantBookingOrder.delete');
			Route::post('/merchant-booking-order-get-receiver-info','Admin\MerchantBookingOrderController@getReceiverInfo')->name('merchantBookingOrder.getReceiverInfo');
			Route::post('/merchant-booking-order-get-charge-info','Admin\MerchantBookingOrderController@getChargeInfo')->name('merchantBookingOrder.getChargeInfo');


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
			Route::post('/goodsDelivery-return-delivery','Admin\GoodsDeliveryController@returnDelivery')->name('goodsDelivery.returnDelivery');
			Route::post('/goodsDelivery-reschedule-delivery','Admin\GoodsDeliveryController@rescheduleDelivery')->name('goodsDelivery.rescheduleDelivery');

			// Return Delivery 
			Route::get('/returnDelivery','Admin\ReturnDeliveryController@index')->name('returnDelivery.index');
			Route::get('/returnDelivery-view/{id}','Admin\ReturnDeliveryController@view')->name('returnDelivery.view');
			Route::post('/returnsDelivery-approve-delivery','Admin\ReturnDeliveryController@approveOrRefuseDelivery')->name('returnDelivery.approveOrRefuseDelivery');

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

			// Payment Collection 
			Route::get('/paymentCollection','Admin\PaymentCollectionController@index')->name('paymentCollection.index');
			Route::get('/paymentCollection-add','Admin\PaymentCollectionController@add')->name('paymentCollection.add');
			Route::post('/paymentCollection-save','Admin\PaymentCollectionController@save')->name('paymentCollection.save');
			Route::get('/paymentCollection-edit/{id}','Admin\PaymentCollectionController@edit')->name('paymentCollection.edit');
			Route::post('/paymentCollection-update','Admin\PaymentCollectionController@update')->name('paymentCollection.update');
			Route::post('/paymentCollection-status','Admin\PaymentCollectionController@status')->name('paymentCollection.status');
			Route::get('/paymentCollection-view/{id}','Admin\PaymentCollectionController@view')->name('paymentCollection.view');
			Route::post('/paymentCollection-delete','Admin\PaymentCollectionController@delete')->name('paymentCollection.delete');
			Route::post('/paymentCollection-get-order-info','Admin\PaymentCollectionController@getOrderInfo')->name('paymentCollection.getOrderInfo');
			Route::post('/paymentCollection-delivery-man-wise-order','Admin\PaymentCollectionController@deliveryManWiseOrder')->name('paymentCollection.deliveryManWiseOrder');

			// Delivery Man Payment 
			Route::get('/deliveryManPayment','Admin\DeliveryManPaymentController@index')->name('deliveryManPayment.index');
			Route::get('/deliveryManPayment-add','Admin\DeliveryManPaymentController@add')->name('deliveryManPayment.add');
			Route::post('/deliveryManPayment-save','Admin\DeliveryManPaymentController@save')->name('deliveryManPayment.save');
			Route::get('/deliveryManPayment-edit/{id}','Admin\DeliveryManPaymentController@edit')->name('deliveryManPayment.edit');
			Route::post('/deliveryManPayment-update','Admin\DeliveryManPaymentController@update')->name('deliveryManPayment.update');
			Route::post('/deliveryManPayment-status','Admin\DeliveryManPaymentController@status')->name('deliveryManPayment.status');
			Route::get('/deliveryManPayment-view/{id}','Admin\DeliveryManPaymentController@view')->name('deliveryManPayment.view');
			Route::post('/deliveryManPayment-delete','Admin\DeliveryManPaymentController@delete')->name('deliveryManPayment.delete');
			Route::post('/deliveryManPayment-get-order-info','Admin\DeliveryManPaymentController@getOrderInfo')->name('deliveryManPayment.getOrderInfo');

			// Merchant Payment 
			Route::get('/merchantPayment','Admin\MerchantPaymentController@index')->name('merchantPayment.index');
			Route::get('/merchantPayment-add','Admin\MerchantPaymentController@add')->name('merchantPayment.add');
			Route::post('/merchantPayment-save','Admin\MerchantPaymentController@save')->name('merchantPayment.save');
			Route::get('/merchantPayment-edit/{id}','Admin\MerchantPaymentController@edit')->name('merchantPayment.edit');
			Route::post('/merchantPayment-update','Admin\MerchantPaymentController@update')->name('merchantPayment.update');
			Route::post('/merchantPayment-status','Admin\MerchantPaymentController@status')->name('merchantPayment.status');
			Route::get('/merchantPayment-view/{id}','Admin\MerchantPaymentController@view')->name('merchantPayment.view');
			Route::post('/merchantPayment-delete','Admin\MerchantPaymentController@delete')->name('merchantPayment.delete');
			Route::post('/merchantPayment-get-order-info','Admin\MerchantPaymentController@getOrderInfo')->name('merchantPayment.getOrderInfo');
			
		// Start Account Management
			// COA Setup
			Route::get('/coa-setup','Admin\CoaSetupController@index')->name('coaSetup.index');
			Route::get('/coa-setup-add','Admin\CoaSetupController@add')->name('coaSetup.add');
			Route::post('/coa-setup-action','Admin\CoaSetupController@action')->name('coaSetup.action');
			Route::get('/coa-setup-edit/{id}','Admin\CoaSetupController@edit')->name('coaSetup.edit');
			Route::post('/coa-setup-update','Admin\CoaSetupController@update')->name('coaSetup.update');
			Route::post('/coa-setup-delete','Admin\CoaSetupController@delete')->name('coaSetup.delete');
			Route::post('/coa-setup-tree','Admin\CoaSetupController@makeTree')->name('coaSetup.makeTree');
			Route::post('/coa-setup-new-coa-data','Admin\CoaSetupController@newCoaData')->name('coaSetup.newCoaData');
			Route::post('/coa-setup-load-coa-data','Admin\CoaSetupController@loadCoaData')->name('coaSetup.loadCoaData');

			// Debit Voucher Entry
			Route::get('/debit-entry','Admin\DebitEntryController@index')->name('debitEntry.index');
			Route::post('/debit-entry','Admin\DebitEntryController@index')->name('debitEntry.index');
			Route::post('/debit-entry-print','Admin\DebitEntryController@print')->name('debitEntry.print');
			Route::get('/debit-entry-add','Admin\DebitEntryController@add')->name('debitEntry.add');
			Route::post('/debit-entry-save','Admin\DebitEntryController@save')->name('debitEntry.save');
			Route::get('/debit-entry-view/{id}','Admin\DebitEntryController@view')->name('debitEntry.view');
			Route::get('/debit-entry-print/{id}','Admin\DebitEntryController@printDebitVoucher')->name('debitEntry.printDebitVoucher');
			Route::get('/debit-entry-edit/{id}','Admin\DebitEntryController@edit')->name('debitEntry.edit');
			Route::post('/debit-entry-update','Admin\DebitEntryController@update')->name('debitEntry.update');
			Route::post('/debit-entry-delete','Admin\DebitEntryController@delete')->name('debitEntry.delete');
			Route::post('/debit-entry-publish','Admin\DebitEntryController@changePublish')->name('debitEntry.publish');
			Route::post('/debit-entry-get-coa','Admin\DebitEntryController@getCoa')->name('debitEntry.getCoa');
			Route::post('/debit-entry-vouchar-no','Admin\DebitEntryController@getVoucharNo')->name('debitEntry.getVoucharNo');

			// Credit Voucher Entry
			Route::get('/credit-entry','Admin\CreditEntryController@index')->name('creditEntry.index');
			Route::post('/credit-entry','Admin\CreditEntryController@index')->name('creditEntry.index');
			Route::post('/credit-entry-print','Admin\CreditEntryController@print')->name('creditEntry.print');
			Route::get('/credit-entry-add','Admin\CreditEntryController@add')->name('creditEntry.add');
			Route::post('/credit-entry-save','Admin\CreditEntryController@save')->name('creditEntry.save');
			Route::get('/credit-entry-view/{id}','Admin\CreditEntryController@view')->name('creditEntry.view');
			Route::get('/credit-entry-print/{id}','Admin\CreditEntryController@printCreditVoucher')->name('creditEntry.printCreditVoucher');
			Route::get('/credit-entry-edit/{id}','Admin\CreditEntryController@edit')->name('creditEntry.edit');
			Route::post('/credit-entry-update','Admin\CreditEntryController@update')->name('creditEntry.update');
			Route::post('/credit-entry-delete','Admin\CreditEntryController@delete')->name('creditEntry.delete');
			Route::post('/credit-entry-publish','Admin\CreditEntryController@changePublish')->name('creditEntry.publish');
			Route::post('/credit-entry-get-coa','Admin\CreditEntryController@getCoa')->name('creditEntry.getCoa');
			Route::post('/credit-entry-vouchar-no','Admin\CreditEntryController@getVoucharNo')->name('creditEntry.getVoucharNo');

			// Journal Voucher Entry
			Route::get('/journal-entry','Admin\JournalEntryController@index')->name('journalEntry.index');
			Route::post('/journal-entry','Admin\JournalEntryController@index')->name('journalEntry.index');
			Route::post('/journal-entry-print','Admin\JournalEntryController@print')->name('journalEntry.print');
			Route::get('/journal-entry-add','Admin\JournalEntryController@add')->name('journalEntry.add');
			Route::post('/journal-entry-save','Admin\JournalEntryController@save')->name('journalEntry.save');
			Route::get('/journal-entry-view/{id}','Admin\JournalEntryController@view')->name('journalEntry.view');
			Route::get('/journal-entry-print/{id}','Admin\JournalEntryController@printJournalVoucher')->name('journalEntry.printJournalVoucher');
			Route::get('/journal-entry-edit/{id}','Admin\JournalEntryController@edit')->name('journalEntry.edit');
			Route::post('/journal-entry-update','Admin\JournalEntryController@update')->name('journalEntry.update');
			Route::post('/journal-entry-delete','Admin\JournalEntryController@delete')->name('journalEntry.delete');
			Route::post('/journal-entry-publish','Admin\JournalEntryController@changePublish')->name('journalEntry.publish');
			Route::post('/journal-entry-get-coa','Admin\JournalEntryController@getCoa')->name('journalEntry.getCoa');
			Route::post('/journal-entry-vouchar-no','Admin\JournalEntryController@getVoucharNo')->name('journalEntry.getVoucharNo');

			// Openning Balance Entry
			Route::get('/opening-balance-entry','Admin\OpeningBalanceController@index')->name('openingBalanceEntry.index');
			Route::post('/opening-balance-entry','Admin\OpeningBalanceController@index')->name('openingBalanceEntry.index');
			Route::post('/opening-balance-entry-print','Admin\OpeningBalanceController@print')->name('openingBalanceEntry.print');
			Route::get('/opening-balance-entry-add','Admin\OpeningBalanceController@add')->name('openingBalanceEntry.add');
			Route::post('/opening-balance-entry-save','Admin\OpeningBalanceController@save')->name('openingBalanceEntry.save');
			Route::get('/opening-balance-entry-view/{id}','Admin\OpeningBalanceController@view')->name('openingBalanceEntry.view');
			Route::get('/opening-balance-entry-print/{id}','Admin\OpeningBalanceController@printOpeningBalanceVoucher')->name('openingBalanceEntry.printOpeningBalanceVoucher');
			Route::post('/opening-balance-entry-delete','Admin\OpeningBalanceController@delete')->name('openingBalanceEntry.delete');
			Route::post('/opening-balance-entry-publish','Admin\OpeningBalanceController@changePublish')->name('openingBalanceEntry.publish');
			Route::post('/opening-balance-entry-get-coa','Admin\OpeningBalanceController@getCoa')->name('openingBalanceEntry.getCoa');
			Route::post('/opening-balance-entry-vouchar-no','Admin\OpeningBalanceController@getVoucharNo')->name('openingBalanceEntry.getVoucharNo');

			// Voucher Approve
			Route::get('/voucher-approve','Admin\VoucherApproveController@index')->name('voucherApprove.index');
			Route::post('/voucher-approve','Admin\VoucherApproveController@index')->name('voucherApprove.index');
			Route::get('/voucher-approve-view/{id}','Admin\VoucherApproveController@view')->name('voucherApprove.view');
			Route::post('/voucher-approve','Admin\VoucherApproveController@approve')->name('voucherApprove.approve');
		// End Account Management

		// Start Account Report
			// COA List
			Route::get('/coa-list','Admin\CoaListController@index')->name('coaList.index');
			Route::get('/coa-list-print','Admin\CoaListController@print')->name('coaList.print');

			//Voucher List
			Route::get('/voucher-list','Admin\VoucherListController@index')->name('voucherList.index');
			Route::post('/voucher-list','Admin\VoucherListController@index')->name('voucherList.index');
			Route::post('/voucher-list-print','Admin\VoucherListController@print')->name('voucherList.print');

			//General Ledger List
			Route::get('/general-ledger','Admin\GeneralLedgerController@index')->name('generalLedger.index');
			Route::post('/general-ledger','Admin\GeneralLedgerController@index')->name('generalLedger.index');
			Route::post('/general-ledger-print','Admin\GeneralLedgerController@print')->name('generalLedger.print');

			//Trasaction Ledger List
			Route::get('/transaction-ledger','Admin\TransactionLedgerController@index')->name('transactionLedger.index');
			Route::post('/transaction-ledger','Admin\TransactionLedgerController@index')->name('transactionLedger.index');
			Route::post('/transaction-ledger-print','Admin\TransactionLedgerController@print')->name('transactionLedger.print');

			//Cash Book
			Route::get('/cash-book','Admin\CashBookController@index')->name('cashBook.index');
			Route::post('/cash-book','Admin\CashBookController@index')->name('cashBook.index');
			Route::post('/cash-book-print','Admin\CashBookController@print')->name('cashBook.print');

			//Bank Book
			Route::get('/bank-book','Admin\bankBookController@index')->name('bankBook.index');
			Route::post('/bank-book','Admin\bankBookController@index')->name('bankBook.index');
			Route::post('/bank-book-print','Admin\bankBookController@print')->name('bankBook.print');

			//Trial Balance
			Route::get('/trial-balance','Admin\TrialBalanceController@index')->name('trialBalance.index');
			Route::post('/trial-balance','Admin\TrialBalanceController@index')->name('trialBalance.index');
			Route::post('/trial-balance-print','Admin\TrialBalanceController@print')->name('trialBalance.print');

			//Balance Sheets
			Route::get('/balance-sheet','Admin\BalanceSheetController@index')->name('balanceSheet.index');
			Route::post('/balance-sheet','Admin\BalanceSheetController@index')->name('balanceSheet.index');
			Route::post('/balance-sheet-print','Admin\BalanceSheetController@print')->name('balanceSheet.print');

			//Income statement
			Route::get('/income-statement','Admin\IncomeStatementController@index')->name('incomeStatement.index');
			Route::post('/income-statement','Admin\IncomeStatementController@index')->name('incomeStatement.index');
			Route::post('/income-statement-print','Admin\IncomeStatementController@print')->name('incomeStatement.print');

			//Receive And Payment statement
			Route::get('/receive-payment-statement','Admin\ReceivePaymentStatementController@index')->name('receivePaymentStatement.index');
			Route::post('/receive-payment-statement','Admin\ReceivePaymentStatementController@index')->name('receivePaymentStatement.index');
			Route::post('/receive-payment-statement-print','Admin\ReceivePaymentStatementController@print')->name('receivePaymentStatement.print');
		// End Account Report

			// Marchant Statement
			Route::get('/merchant-statement','Admin\MerchantStatementController@index')->name('merchantStatement.index');
			Route::post('/merchant-statement','Admin\MerchantStatementController@index')->name('merchantStatement.index');
			Route::post('/merchant-statement-print','Admin\MerchantStatementController@print')->name('merchantStatement.print');

			// Marchant Statement
			Route::get('/order-statement','Admin\OrderStatementController@index')->name('orderStatement.index');
			Route::post('/order-statement','Admin\OrderStatementController@index')->name('orderStatement.index');
			Route::post('/order-statement-print','Admin\OrderStatementController@print')->name('orderStatement.print');

			// Payment Log
			Route::get('/payment-log','Admin\PaymentLogController@index')->name('paymentLog.index');
			Route::post('/payment-log','Admin\PaymentLogController@index')->name('paymentLog.index');
			Route::post('/payment-log-print','Admin\PaymentLogController@print')->name('paymentLog.print');

			// Collection History
			Route::get('/collection-history','Admin\CollectionHistoryController@index')->name('collectionHistory.index');
			Route::post('/collection-history','Admin\CollectionHistoryController@index')->name('collectionHistory.index');
			Route::post('/collection-history-print','Admin\CollectionHistoryController@print')->name('collectionHistory.print');

			// Top Sheet
			Route::get('/top-sheet','Admin\TopSheetController@index')->name('topSheet.index');
			Route::post('/top-sheet','Admin\TopSheetController@index')->name('topSheet.index');
			Route::post('/top-sheet-print','Admin\TopSheetController@print')->name('topSheet.print');

			// Return History
			Route::get('/return-history','Admin\ReturnHistoryController@index')->name('returnHistory.index');
			Route::post('/return-history','Admin\ReturnHistoryController@index')->name('returnHistory.index');
			Route::post('/return-history-print','Admin\ReturnHistoryController@print')->name('returnHistory.print');

			// Contact Us
			Route::get('/contactUs','Admin\ContactUsController@index')->name('contactUs.index');
			Route::get('/contactUs-add','Admin\ContactUsController@add')->name('contactUs.add');
			Route::post('/contactUs-save','Admin\ContactUsController@save')->name('contactUs.save');
			Route::get('/contactUs-edit/{id}','Admin\ContactUsController@edit')->name('contactUs.edit');
			Route::post('/contactUs-update','Admin\ContactUsController@update')->name('contactUs.update');
			Route::post('/contactUs-status','Admin\ContactUsController@status')->name('contactUs.status');
			Route::post('/contactUs-delete','Admin\ContactUsController@delete')->name('contactUs.delete');

			// Contact Us
			Route::get('/serviceCharges','Admin\ServiceChargesController@index')->name('serviceCharges.index');
			Route::get('/serviceCharges-add','Admin\ServiceChargesController@add')->name('serviceCharges.add');
			Route::post('/serviceCharges-save','Admin\ServiceChargesController@save')->name('serviceCharges.save');
			Route::get('/serviceCharges-edit/{id}','Admin\ServiceChargesController@edit')->name('serviceCharges.edit');
			Route::post('/serviceCharges-update','Admin\ServiceChargesController@update')->name('serviceCharges.update');
			Route::post('/serviceCharges-status','Admin\ServiceChargesController@status')->name('serviceCharges.status');
			Route::post('/serviceCharges-delete','Admin\ServiceChargesController@delete')->name('serviceCharges.delete');
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
Route::get('/','FrontendController@index')->name('quickExpress');

Route::any('/order/track','BookingController@orderTrack')->name('order.track');

Route::get('/about-us','FrontendController@aboutUs')->name('aboutUs');

Route::get('/our-services','FrontendController@ourService')->name('ourService');
Route::get('/parcel-delivery','FrontendController@parcelDelivery')->name('parcelDelivery');
Route::get('/document-delivery','FrontendController@documentDelivery')->name('documentDelivery');
Route::get('/food-delivery','FrontendController@foodDelivery')->name('foodDelivery');
Route::get('/grocery-delivery','FrontendController@groceryDelivery')->name('groceryDelivery');

Route::get('/services-charges','FrontendController@serviceCharge')->name('serviceCharge');

Route::get('/contact-us','FrontendController@contactUs')->name('contactUs');

//code for custom/user
Route::prefix('user')->group(function(){
	//authentication for customer
	Route::middleware('auth:customer')->group(function(){
		Route::any('/dashboard', 'CustomerController@dashboard')->name('user.dashboard');
		Route::any('/profile', 'CustomerController@profile')->name('user.customerProfile');
		Route::any('/profile-edit', 'CustomerController@editProfile')->name('user.editProfile');
		Route::any('/booking', 'BookingController@index')->name('user.booking');
		Route::any('/booking/create', 'BookingController@create')->name('user.bookingCreate');
		Route::any('/booking/edit/{id}', 'BookingController@edit')->name('user.bookingEdit');
		Route::any('/booking/view/{id}', 'BookingController@view')->name('user.bookingView');
		Route::post('/booking/get_receiver_info','BookingController@getReceiverInfo')->name('user.getReceiverInfo');
		Route::post('/booking/get_charge_info','BookingController@getChargeInfo')->name('user.getChargeInfo');
		Route::post('/booking/get_agent_info','BookingController@getAgentInfo')->name('user.getAgentInfo');

		Route::any('/logout', 'Auth\Customer\CustomerAuthController@logout')->name('user.logout');
	});

});

//code for biker
Route::prefix('biker')->group(function(){
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
	//authentication for merchant
	Route::middleware('auth:merchant')->group(function(){
		Route::any('/dashboard', 'MerchantController@dashboard')->name('merchant.dashboard');
		Route::any('/profile', 'MerchantController@profile')->name('merchant.profile');
		Route::any('/profile-edit', 'MerchantController@editProfile')->name('merchant.editProfile');
		Route::any('/logout', 'Auth\Merchant\MerchantAuthController@logout')->name('merchant.logout');
	});

});

Route::middleware('IfNotLoggedIn')->group(function(){
	//code for customer/user
	Route::prefix('user')->group(function(){
		Route::namespace('Auth\Customer')->group(function () { 
			Route::match(['GET', 'POST'], '/registration', 'CustomerAuthController@registration')->name('user.registration');
			Route::match(['GET'], '/verification', 'CustomerAuthController@completeRegistration')->name('user.verificationLink');

			Route::match(['GET', 'POST'], '/login', 'CustomerAuthController@login')->name('user.login');
		});
	});

	//code for biker
	Route::prefix('biker')->group(function(){
		Route::namespace('Auth\Biker')->group(function () { 
			Route::any('/registration', 'BikerAuthController@registration')->name('biker.registration');
			Route::any('/verification', 'BikerAuthController@completeRegistration')->name('biker.verificationLink');

			Route::any('/login', 'BikerAuthController@login')->name('biker.login');
		});
	});

	//code for merchant
	Route::prefix('merchant')->group(function(){
		Route::namespace('Auth\Merchant')->group(function () { 
			Route::any('/registration', 'MerchantAuthController@registration')->name('merchant.registration');
			Route::any('/verification', 'MerchantAuthController@completeRegistration')->name('merchant.verificationLink');

			Route::any('/login', 'MerchantAuthController@login')->name('merchant.login');
		});
	});

});	
	
Route::get('/clear', function() {
   Artisan::call('cache:clear');
   Artisan::call('config:clear');
   Artisan::call('config:cache');
   Artisan::call('view:clear');
   Artisan::call('route:clear');
    
   return "Cleared!";

});
