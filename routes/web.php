<?php

use Illuminate\Support\Facades\Route;
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


/* Web Routes */

		Route::get('/', 'webController@index');
		Route::get('/profile', 'webController@currProfile');
		Route::post('/profile/update', 'authController@updateProfile');
		Route::get('/payment-history', 'webController@paymentHistory');
		Route::get('/sell-history', 'webController@sellHistory');
		Route::get('/withdraw-history', 'webController@withdrawHistory');
		Route::get('/partnership', 'webController@partnerShip');
		Route::get('/provably_fair', 'webController@provablyFair');
		Route::get('/free_cases', 'webController@freeCases');
		Route::get('/marketplace', 'webController@marketplace');
		Route::get('/marketplace/purchase/{id}', 'webController@marketplacePurchase');

		Route::get('/upgrade', 'webController@upgrade');
		Route::post('/wallet/refill/crypto', 'webController@walletRefillCrypto');
		Route::get('/upgrade/inventory/select/{id}', 'responseController@upgradeInSelect');
		Route::get('/upgrade/upskin/select/{id}', 'responseController@upgradeUpSelect');
		Route::get('/upgrade/result/select/{price}/{items}/{id2}', 'responseController@upgradeResult');
		Route::get('/upgrade/skin/select/{price}/{type}', 'responseController@upgradeInSkin');
		Route::get('/upgrade/skin/selectfil/{price}/{fprice}', 'responseController@upgradeInSkinFil');
		
		Route::get('/case/{name}/{id}', 'webController@caseDetail');
		Route::get('/case/open/response/{id}', 'webController@caseItems');

		Route::get('/skin/resell/{id}', 'webController@skinResell');
		Route::get('/skin/withdraw/{id}', 'webController@skinWithdraw');

		Route::get('/skin/resellall/', 'webController@skinResellAll');

		Route::get('/battles', 'Battleontroller@battles');
		Route::get('/create-battle','Battleontroller@createbattles');
		Route::get('/watch-battle/{id}','Battleontroller@watchbattle');
		Route::get('/battle/participate/{id}','Battleontroller@battleParticipate');
		Route::post('/battleadd','Battleontroller@battleadd');
		/* Response */
			Route::get('/battle/check_participant/{id}','Battleontroller@checkParticipant');
			Route::get('/battle/start/{id}','Battleontroller@battleSpiner');




	/* Steam Authentication */
		Route::get('auth/steam', 'authController@redirectToSteam')->name('auth.steam');
		Route::get('auth/steam/handle', 'authController@handle')->name('auth.steam.handle');
		Route::get('auth/logout', 'authController@logout');

	/* Give-Away */
		Route::get('/giveaway/join/{id}', 'giveawayController@joinGiveaway');



/* Admin Routes */

	/* Authentication */

		Route::get('/admin/', 'adminAuthController@index');
		Route::get('/admin/dashboard', 'adminAuthController@dashboardView');
		Route::get('/admin/login', 'adminAuthController@loginView');
		Route::get('/admin/logout', 'adminAuthController@logout');
		Route::get('/admin/users', 'adminAuthController@users');
		Route::get('/admin/users/Add', 'adminAuthController@addUser');
		Route::get('/admin/users/delete/{id}', 'adminAuthController@deleteUser');
		Route::get('/admin/users/edit/{id}', 'adminAuthController@editUser');
		Route::get('/admin/users/inactive/{id}', 'adminAuthController@inactiveUser');
		Route::get('/admin/users/active/{id}', 'adminAuthController@activeUser');

		Route::post('/admin/login', 'adminAuthController@loginAttempt');
		Route::post('/admin/users/insert', 'adminAuthController@insertUser');
		Route::post('/admin/users/update', 'adminAuthController@updateUser');

	/* Give-Away */

		Route::get('/admin/giveaway/type/{type}', 'giveawayController@index');
		Route::get('/admin/giveaway/add', 'giveawayController@addGiveaway');
		Route::get('/admin/giveaway/delete/{id}', 'giveawayController@deleteGiveaway');

		Route::post('/admin/giveaway/insert', 'giveawayController@insertGiveaway');
		
	/* Cases */

		Route::get('/admin/cases', 'caseController@index');
		Route::get('/admin/case/add', 'caseController@addCase');
		Route::get('/admin/case/delete/{id}', 'caseController@deleteCase');
		Route::get('/admin/case/edit/{id}', 'caseController@editCase');

		Route::post('/admin/case/insert', 'caseController@insertCase');
		Route::post('/admin/case/update', 'caseController@updateCase');

	/* Skins */

		Route::get('/admin/skins', 'skinController@index');
		Route::get('/admin/skin/add', 'skinController@addSkin');
		Route::get('/admin/skin/delete/{id}', 'skinController@deleteSkin');

		Route::post('/admin/skin/insert', 'skinController@insertSkin');

	/* Deposit Request */

		Route::get('/admin/deposit/request', 'depositController@index');
		Route::get('/admin/deposit/reject/{id}', 'depositController@rejectRequest');
		Route::get('/admin/deposit/approve/{id}', 'depositController@approveRequest');
		Route::get('/admin/deposit/checkUpdate', 'depositController@checkUpdate');
		
	/* Withdraw Request */

		Route::get('/admin/withdraw/request', 'withdrawRequestController@index');
		Route::get('/admin/withdraw/status/{id}/{status}', 'withdrawRequestController@updateStatus');
		Route::get('/admin/withdraw/checkUpdate', 'withdrawRequestController@checkUpdate');

	/* Market Place */

		Route::get('/admin/marketplace', 'marketplaceController@index');
		Route::get('/admin/marketplace/status/{id}/{status}', 'marketplaceController@status');
		Route::post('/admin/marketplace', 'marketplaceController@addSkin');
		Route::post('/admin/marketplace/editprice', 'marketplaceController@editPrice');


	/* Site Users */

		Route::get('/admin/site-users', 'adminController@siteUsers');