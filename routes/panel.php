<?php


Route::group(['namespace'=>'App\Http\Controllers\Panel','prefix' => 'panel', 'as' => 'panel.'], function () {

    Route::get('/', function () {
        return redirect()->route('panel.showLogin');
    });
    Route::get('login', 'Auth\LoginController@showLoginForm')->name('showLogin');
    Route::post('login', 'Auth\LoginController@login')->name('login');

    /*
     * Reset Password Routes
     */

    Route::group(['prefix' => 'password/', 'namespace' => 'Auth', 'as' => 'password.'], function () {
        Route::post('email', ['as' => 'email', 'uses' => 'ForgotPasswordController@sendResetLinkEmail']);
        Route::get('reset/{token}', ['as' => 'reset', 'uses' => 'ResetPasswordController@showResetForm']);
        Route::post('reset', ['as' => 'update', 'uses' => 'ResetPasswordController@reset']);
    });


    Route::group(['middleware' => 'auth:admin'], function () {

        Route::get('index', 'HomeController@index')->name('index');


        Route::group(['prefix' => 'admins', 'as' => 'admins.' ], function () {

            Route::get('/', ['as' => 'index', 'middleware' => 'permission:show_admins' , 'uses' => 'AdminController@index']);
            Route::get('/datatable', ['as' => 'datatable', 'middleware' => 'permission:show_admins' , 'uses' => 'AdminController@datatable']);

            Route::group(['prefix' => 'create' , 'middleware' => 'permission:add_admins'], function () {
                Route::get('/', ['as' => 'create', 'uses' => 'AdminController@create']);
                Route::post('/', ['as' => 'store', 'uses' => 'AdminController@store']);
            });
            Route::group(['prefix' => '{id}' , 'middleware' => 'permission:add_admins'], function () {
                Route::get('/edit', ['as' => 'edit', 'uses' => 'AdminController@edit']);
                Route::put('/edit', ['as' => 'update', 'uses' => 'AdminController@update']);
                Route::delete('/', ['as' => 'destroy', 'uses' => 'AdminController@destroy']);
            });
        });
        Route::group(['prefix' => 'promotional-emails', 'as' => 'promotional-emails.' ], function () {

            Route::get('/', ['as' => 'index', 'middleware' => 'permission:show_promotional-emails' , 'uses' => 'PromotionalEmailController@index']);
            Route::get('/datatable', ['as' => 'datatable', 'middleware' => 'permission:promotional-emails' , 'uses' => 'PromotionalEmailController@datatable']);

            Route::group(['prefix' => 'create' , 'middleware' => 'permission:add_promotional-emails'], function () {
                Route::get('/', ['as' => 'create', 'uses' => 'PromotionalEmailController@create']);
                Route::post('/', ['as' => 'store', 'uses' => 'PromotionalEmailController@store']);
            });
            Route::group(['prefix' => '{id}' , 'middleware' => 'permission:add_PromotionalEmailController'], function () {
                Route::get('/edit', ['as' => 'edit', 'uses' => 'PromotionalEmailController@edit']);
                Route::put('/edit', ['as' => 'update', 'uses' => 'PromotionalEmailController@update']);
                Route::delete('/', ['as' => 'destroy', 'uses' => 'PromotionalEmailController@destroy']);
            });
        });
        Route::group(['prefix' => 'permission', 'as' => 'permission.'], function () {

            Route::get('/', ['as' => 'index', 'uses' => 'RoleController@index']);
            Route::get('/datatable', ['as' => 'datatable', 'uses' => 'RoleController@datatable']);

            Route::group(['prefix' => 'create'], function () {
                Route::get('/', ['as' => 'create', 'uses' => 'RoleController@create']);
                Route::post('/', ['as' => 'store', 'uses' => 'RoleController@store']);
            });

            Route::group(['prefix' => '{id}'], function () {
                Route::get('/edit', ['as' => 'edit', 'uses' => 'RoleController@edit']);
                Route::put('/edit', ['as' => 'update', 'uses' => 'RoleController@update']);
                Route::delete('/', ['as' => 'destroy', 'uses' => 'RoleController@destroy']);
            });
        });


        Route::group(['prefix' => 'users', 'as' => 'users.'], function () {

            Route::get('/', ['as' => 'index', 'middleware' => 'permission:show_users' ,'uses' => 'UserController@index']);
            Route::get('/datatable', ['as' => 'datatable', 'middleware' => 'permission:show_users' ,'uses' => 'UserController@datatable']);


            Route::group(['prefix' => 'create', 'middleware' => 'permission:add_users' ], function () {
                Route::get('/', ['as' => 'create', 'uses' => 'UserController@create']);
                Route::post('/', ['as' => 'store', 'uses' => 'UserController@store']);
            });

            Route::group(['prefix' => '{id}', 'middleware' => 'permission:add_users'], function () {
                Route::get('/edit', ['as' => 'edit', 'uses' => 'UserController@edit']);
                Route::put('/edit', ['as' => 'update', 'uses' => 'UserController@update']);
                Route::delete('/', ['as' => 'destroy', 'uses' => 'UserController@destroy']);
            });

        });

        Route::group(['prefix' => 'products', 'as' => 'products.'], function () {

            Route::get('/', ['as' => 'index', 'middleware' => 'permission:show_products' ,'uses' => 'ProductController@index']);
            Route::get('/datatable', ['as' => 'datatable', 'middleware' => 'permission:show_products' ,'uses' => 'ProductController@datatable']);


            Route::group(['prefix' => 'create', 'middleware' => 'permission:add_products' ], function () {
                Route::get('/', ['as' => 'create', 'uses' => 'ProductController@create']);
                Route::post('/', ['as' => 'store', 'uses' => 'ProductController@store']);
            });

            Route::group(['prefix' => '{id}', 'middleware' => 'permission:add_products'], function () {
                Route::get('/edit', ['as' => 'edit', 'uses' => 'ProductController@edit']);
                Route::put('/edit', ['as' => 'update', 'uses' => 'ProductController@update']);
                Route::delete('/', ['as' => 'destroy', 'uses' => 'ProductController@destroy']);
            });

        });


        Route::group(['prefix' => 'partners', 'as' => 'partners.'], function () {

            Route::get('/', ['as' => 'index', 'middleware' => 'permission:show_partners' ,'uses' => 'PartnerController@index']);
            Route::get('/datatable', ['as' => 'datatable', 'middleware' => 'permission:show_partners' ,'uses' => 'PartnerController@datatable']);


            Route::group(['prefix' => 'create', 'middleware' => 'permission:add_partners' ], function () {
                Route::get('/', ['as' => 'create', 'uses' => 'PartnerController@create']);
                Route::post('/', ['as' => 'store', 'uses' => 'PartnerController@store']);
            });

            Route::group(['prefix' => '{id}', 'middleware' => 'permission:add_partners'], function () {
                Route::get('/edit', ['as' => 'edit', 'uses' => 'PartnerController@edit']);
                Route::put('/edit', ['as' => 'update', 'uses' => 'PartnerController@update']);
                Route::delete('/', ['as' => 'destroy', 'uses' => 'PartnerController@destroy']);
            });

        });

        Route::group(['prefix' => 'addresses', 'as' => 'addresses.'], function () {

            Route::get('/', ['as' => 'index', 'middleware' => 'permission:show_addresses' ,'uses' => 'AddressController@index']);
            Route::get('/datatable', ['as' => 'datatable', 'middleware' => 'permission:show_addresses' ,'uses' => 'AddressController@datatable']);


            Route::group(['prefix' => 'create', 'middleware' => 'permission:add_addresses' ], function () {
                Route::get('/', ['as' => 'create', 'uses' => 'AddressController@create']);
                Route::post('/', ['as' => 'store', 'uses' => 'AddressController@store']);
            });

            Route::group(['prefix' => '{id}', 'middleware' => 'permission:add_addresses'], function () {
                Route::get('/edit', ['as' => 'edit', 'uses' => 'AddressController@edit']);
                Route::put('/edit', ['as' => 'update', 'uses' => 'AddressController@update']);
                Route::delete('/', ['as' => 'destroy', 'uses' => 'AddressController@destroy']);
            });

        });

        Route::group(['prefix' => 'services', 'as' => 'services.'], function () {

            Route::get('/', ['as' => 'index', 'middleware' => 'permission:show_services' ,'uses' => 'ServiceController@index']);
            Route::get('/datatable', ['as' => 'datatable', 'middleware' => 'permission:show_services' ,'uses' => 'ServiceController@datatable']);


            Route::group(['prefix' => 'create', 'middleware' => 'permission:add_services' ], function () {
                Route::get('/', ['as' => 'create', 'uses' => 'ServiceController@create']);
                Route::post('/', ['as' => 'store', 'uses' => 'ServiceController@store']);
            });

            Route::group(['prefix' => '{id}', 'middleware' => 'permission:add_services'], function () {
                Route::get('/edit', ['as' => 'edit', 'uses' => 'ServiceController@edit']);
                Route::put('/edit', ['as' => 'update', 'uses' => 'ServiceController@update']);
                Route::delete('/', ['as' => 'destroy', 'uses' => 'ServiceController@destroy']);
            });

        });


        Route::group(['prefix' => 'sliders', 'as' => 'sliders.'], function () {

            Route::group(['middleware' => ['permission:show_sliders']], function () {
                Route::get('/', ['as' => 'index', 'uses' => 'SliderController@index']);
                Route::get('/datatable', ['as' => 'datatable','uses' => 'SliderController@datatable']);
            });
            Route::group(['middleware' => ['permission:add_sliders']], function () {
                Route::group(['prefix' => 'create'], function () {
                    Route::get('/', ['as' => 'create', 'uses' => 'SliderController@create']);
                    Route::post('/', ['as' => 'store', 'uses' => 'SliderController@store']);
                });
                Route::group(['prefix' => '{id}'], function () {
                    Route::get('/edit', ['as' => 'edit', 'uses' => 'SliderController@edit']);
                    Route::put('/edit', ['as' => 'update', 'uses' => 'SliderController@update']);
                    Route::delete('/', ['as' => 'destroy', 'uses' => 'SliderController@destroy']);
                });
            });
        });

        Route::group(['prefix' => 'pages', 'as' => 'pages.', 'middleware' => ['permission:manage_pages']], function () {

            Route::get('/', ['as' => 'index', 'uses' => 'PageController@index']);
            Route::get('/datatable', ['as' => 'datatable','uses' => 'PageController@datatable']);

            Route::group(['prefix' => 'create'], function () {
                Route::get('/', ['as' => 'create', 'uses' => 'PageController@create']);
                Route::post('/', ['as' => 'store', 'uses' => 'PageController@store']);
            });
            Route::group(['prefix' => '{id}'], function () {
                Route::get('/edit', ['as' => 'edit', 'uses' => 'PageController@edit']);
                Route::put('/edit', ['as' => 'update', 'uses' => 'PageController@update']);
                Route::delete('/', ['as' => 'destroy', 'uses' => 'PageController@destroy']);
            });

        });




        Route::group(['prefix' => 'contacts', 'as' => 'contacts.'], function () {
            Route::get('/' , ['as' => 'index' , 'uses' => 'ContactController@index']);
            Route::get('datatable' , 'ContactController@datatable');


            Route::group(['prefix' => '{id}'], function () {
                Route::get('/show', ['as' => 'edit', 'uses' => 'ContactController@show']);
                Route::get('/show-replay', ['as' => 'update', 'uses' => 'ContactController@showReplay']);
                Route::delete('/', ['as' => 'destroy', 'uses' => 'ContactController@destroy']);
            });

            Route::post('add-replay' , 'ContactController@replay')->name('replay');
        });


        Route::group(['prefix' => 'faq/', 'as' => 'faq.' , 'middleware' => 'permission:manage_faqs'], function () {
            Route::get('index', ['as'=>'index' , 'uses'=>'FaqController@index']);
            Route::get('datatable', ['as'=>'datatable' , 'uses'=>'FaqController@datatable']);

            Route::group(['prefix' => '/create'], function () {
                Route::get('/', ['as'=>'create' , 'uses'=>'FaqController@create']);
                Route::post('/', ['as'=>'store' , 'uses'=>'FaqController@store']);
            });

            Route::group(['prefix' => '{id}/'], function () {
                Route::get('/edit', ['as'=>'edit' , 'uses'=>'FaqController@edit']);
                Route::put('/', ['as'=>'update' , 'uses'=>'FaqController@update']);
                Route::delete('/', ['as'=>'destroy' , 'uses'=>'FaqController@destroy']);
            });
        });



        Route::resource('settings', 'SettingsController')->except(['create', 'edit', 'show', 'destroy']);


        Route::group(['prefix' => 'instance' , 'as' => 'instance.'], function () {
            Route::get('cities' , ['as' => 'cities' , 'uses' =>'CityController@getCitiesForCountry']);
            Route::get('user-info-form' , ['as' => 'userInfoForm' , 'uses' =>'User\UserTypeController@getForm']);
        });

        Route::group(['prefix' => 'notifications' , 'as' => 'notifications.'], function () {
            Route::get('/', ['as' => 'index', 'uses' => 'NotificationController@index']);
        });

        Route::get('logout', function () {
            \Illuminate\Support\Facades\Auth::guard('admin')->logout();
            return back();
        })->name('logout');
    });



});
