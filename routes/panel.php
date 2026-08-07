<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Panel\Auth\LoginController;
use App\Http\Controllers\Panel\Auth\ForgotPasswordController;
use App\Http\Controllers\Panel\Auth\ResetPasswordController;
use App\Http\Controllers\Panel\HomeController;
use App\Http\Controllers\Panel\AdminController;
use App\Http\Controllers\Panel\PromotionalEmailController;
use App\Http\Controllers\Panel\RoleController;
use App\Http\Controllers\Panel\UserController;
use App\Http\Controllers\Panel\ProductController;
use App\Http\Controllers\Panel\PartnerController;
use App\Http\Controllers\Panel\AddressController;
use App\Http\Controllers\Panel\ServiceController;
use App\Http\Controllers\Panel\SliderController;
use App\Http\Controllers\Panel\PageController;
use App\Http\Controllers\Panel\ContactController;
use App\Http\Controllers\Panel\FaqController;
use App\Http\Controllers\Panel\SettingsController;
use App\Http\Controllers\Panel\CityController;
use App\Http\Controllers\Panel\NotificationController;
use App\Http\Controllers\Panel\PostController;
use App\Http\Controllers\Panel\CategoryController;
use App\Http\Controllers\Panel\TestimonialController;
use App\Http\Controllers\Panel\QuoteRequestController as PanelQuoteRequestController;
use App\Http\Controllers\Panel\SubscriberController;

Route::group(['prefix' => 'panel', 'as' => 'panel.'], function () {

    Route::get('/', function () {
        return redirect()->route('panel.showLogin');
    });
    Route::get('login', [LoginController::class, 'showLoginForm'])->name('showLogin');
    Route::post('login', [LoginController::class, 'login'])->name('login');

    Route::group(['prefix' => 'password/', 'as' => 'password.'], function () {
        Route::post('email', [ForgotPasswordController::class, 'sendResetLinkEmail'])->name('email');
        Route::get('reset/{token}', [ResetPasswordController::class, 'showResetForm'])->name('reset');
        Route::post('reset', [ResetPasswordController::class, 'reset'])->name('update');
    });

    Route::group(['middleware' => 'auth:admin'], function () {

        Route::get('index', [HomeController::class, 'index'])->name('index');

        Route::group(['prefix' => 'admins', 'as' => 'admins.'], function () {
            Route::get('/', [AdminController::class, 'index'])->middleware('permission:show_admins')->name('index');
            Route::get('/datatable', [AdminController::class, 'datatable'])->middleware('permission:show_admins')->name('datatable');

            Route::group(['prefix' => 'create', 'middleware' => 'permission:add_admins'], function () {
                Route::get('/', [AdminController::class, 'create'])->name('create');
                Route::post('/', [AdminController::class, 'store'])->name('store');
            });
            Route::group(['prefix' => '{id}', 'middleware' => 'permission:add_admins'], function () {
                Route::get('/edit', [AdminController::class, 'edit'])->name('edit');
                Route::put('/edit', [AdminController::class, 'update'])->name('update');
                Route::delete('/', [AdminController::class, 'destroy'])->name('destroy');
            });
        });

        Route::group(['prefix' => 'promotional-emails', 'as' => 'promotional-emails.'], function () {
            Route::get('/', [PromotionalEmailController::class, 'index'])->middleware('permission:show_promotional-emails')->name('index');
            Route::get('/datatable', [PromotionalEmailController::class, 'datatable'])->middleware('permission:show_promotional-emails')->name('datatable');

            Route::group(['prefix' => 'create', 'middleware' => 'permission:add_promotional-emails'], function () {
                Route::get('/', [PromotionalEmailController::class, 'create'])->name('create');
                Route::post('/', [PromotionalEmailController::class, 'store'])->name('store');
            });
            Route::group(['prefix' => '{id}', 'middleware' => 'permission:add_promotional-emails'], function () {
                Route::get('/edit', [PromotionalEmailController::class, 'edit'])->name('edit');
                Route::put('/edit', [PromotionalEmailController::class, 'update'])->name('update');
                Route::delete('/', [PromotionalEmailController::class, 'destroy'])->name('destroy');
            });
        });

        Route::group(['prefix' => 'permission', 'as' => 'permission.'], function () {
            Route::get('/', [RoleController::class, 'index'])->name('index');
            Route::get('/datatable', [RoleController::class, 'datatable'])->name('datatable');

            Route::group(['prefix' => 'create'], function () {
                Route::get('/', [RoleController::class, 'create'])->name('create');
                Route::post('/', [RoleController::class, 'store'])->name('store');
            });

            Route::group(['prefix' => '{id}'], function () {
                Route::get('/edit', [RoleController::class, 'edit'])->name('edit');
                Route::put('/edit', [RoleController::class, 'update'])->name('update');
                Route::delete('/', [RoleController::class, 'destroy'])->name('destroy');
            });
        });

        Route::group(['prefix' => 'users', 'as' => 'users.'], function () {
            Route::get('/', [UserController::class, 'index'])->middleware('permission:show_users')->name('index');
            Route::get('/datatable', [UserController::class, 'datatable'])->middleware('permission:show_users')->name('datatable');

            Route::group(['prefix' => 'create', 'middleware' => 'permission:add_users'], function () {
                Route::get('/', [UserController::class, 'create'])->name('create');
                Route::post('/', [UserController::class, 'store'])->name('store');
            });

            Route::group(['prefix' => '{id}', 'middleware' => 'permission:add_users'], function () {
                Route::get('/edit', [UserController::class, 'edit'])->name('edit');
                Route::put('/edit', [UserController::class, 'update'])->name('update');
                Route::delete('/', [UserController::class, 'destroy'])->name('destroy');
            });
        });

        Route::group(['prefix' => 'products', 'as' => 'products.'], function () {
            Route::get('/', [ProductController::class, 'index'])->middleware('permission:show_products')->name('index');
            Route::get('/datatable', [ProductController::class, 'datatable'])->middleware('permission:show_products')->name('datatable');

            Route::group(['prefix' => 'create', 'middleware' => 'permission:add_products'], function () {
                Route::get('/', [ProductController::class, 'create'])->name('create');
                Route::post('/', [ProductController::class, 'store'])->name('store');
            });

            Route::group(['prefix' => '{id}', 'middleware' => 'permission:add_products'], function () {
                Route::get('/edit', [ProductController::class, 'edit'])->name('edit');
                Route::put('/edit', [ProductController::class, 'update'])->name('update');
                Route::delete('/', [ProductController::class, 'destroy'])->name('destroy');
            });
        });

        Route::group(['prefix' => 'partners', 'as' => 'partners.'], function () {
            Route::get('/', [PartnerController::class, 'index'])->middleware('permission:show_partners')->name('index');
            Route::get('/datatable', [PartnerController::class, 'datatable'])->middleware('permission:show_partners')->name('datatable');

            Route::group(['prefix' => 'create', 'middleware' => 'permission:add_partners'], function () {
                Route::get('/', [PartnerController::class, 'create'])->name('create');
                Route::post('/', [PartnerController::class, 'store'])->name('store');
            });

            Route::group(['prefix' => '{id}', 'middleware' => 'permission:add_partners'], function () {
                Route::get('/edit', [PartnerController::class, 'edit'])->name('edit');
                Route::put('/edit', [PartnerController::class, 'update'])->name('update');
                Route::delete('/', [PartnerController::class, 'destroy'])->name('destroy');
            });
        });

        Route::group(['prefix' => 'addresses', 'as' => 'addresses.'], function () {
            Route::get('/', [AddressController::class, 'index'])->middleware('permission:show_addresses')->name('index');
            Route::get('/datatable', [AddressController::class, 'datatable'])->middleware('permission:show_addresses')->name('datatable');

            Route::group(['prefix' => 'create', 'middleware' => 'permission:add_addresses'], function () {
                Route::get('/', [AddressController::class, 'create'])->name('create');
                Route::post('/', [AddressController::class, 'store'])->name('store');
            });

            Route::group(['prefix' => '{id}', 'middleware' => 'permission:add_addresses'], function () {
                Route::get('/edit', [AddressController::class, 'edit'])->name('edit');
                Route::put('/edit', [AddressController::class, 'update'])->name('update');
                Route::delete('/', [AddressController::class, 'destroy'])->name('destroy');
            });
        });

        Route::group(['prefix' => 'services', 'as' => 'services.'], function () {
            Route::get('/', [ServiceController::class, 'index'])->middleware('permission:show_services')->name('index');
            Route::get('/datatable', [ServiceController::class, 'datatable'])->middleware('permission:show_services')->name('datatable');

            Route::group(['prefix' => 'create', 'middleware' => 'permission:add_services'], function () {
                Route::get('/', [ServiceController::class, 'create'])->name('create');
                Route::post('/', [ServiceController::class, 'store'])->name('store');
            });

            Route::group(['prefix' => '{id}', 'middleware' => 'permission:add_services'], function () {
                Route::get('/edit', [ServiceController::class, 'edit'])->name('edit');
                Route::put('/edit', [ServiceController::class, 'update'])->name('update');
                Route::delete('/', [ServiceController::class, 'destroy'])->name('destroy');
            });
        });

        Route::group(['prefix' => 'sliders', 'as' => 'sliders.'], function () {
            Route::group(['middleware' => ['permission:show_sliders']], function () {
                Route::get('/', [SliderController::class, 'index'])->name('index');
                Route::get('/datatable', [SliderController::class, 'datatable'])->name('datatable');
            });
            Route::group(['middleware' => ['permission:add_sliders']], function () {
                Route::group(['prefix' => 'create'], function () {
                    Route::get('/', [SliderController::class, 'create'])->name('create');
                    Route::post('/', [SliderController::class, 'store'])->name('store');
                });
                Route::group(['prefix' => '{id}'], function () {
                    Route::get('/edit', [SliderController::class, 'edit'])->name('edit');
                    Route::put('/edit', [SliderController::class, 'update'])->name('update');
                    Route::delete('/', [SliderController::class, 'destroy'])->name('destroy');
                });
            });
        });

        Route::group(['prefix' => 'pages', 'as' => 'pages.', 'middleware' => ['permission:manage_pages']], function () {
            Route::get('/', [PageController::class, 'index'])->name('index');
            Route::get('/datatable', [PageController::class, 'datatable'])->name('datatable');

            Route::group(['prefix' => 'create'], function () {
                Route::get('/', [PageController::class, 'create'])->name('create');
                Route::post('/', [PageController::class, 'store'])->name('store');
            });
            Route::group(['prefix' => '{id}'], function () {
                Route::get('/edit', [PageController::class, 'edit'])->name('edit');
                Route::put('/edit', [PageController::class, 'update'])->name('update');
                Route::delete('/', [PageController::class, 'destroy'])->name('destroy');
            });
        });

        Route::group(['prefix' => 'contacts', 'as' => 'contacts.', 'middleware' => 'permission:show_contacts'], function () {
            Route::get('/', [ContactController::class, 'index'])->name('index');
            Route::get('datatable', [ContactController::class, 'datatable']);

            Route::group(['prefix' => '{id}'], function () {
                Route::get('/show', [ContactController::class, 'show'])->name('edit');
                Route::get('/show-replay', [ContactController::class, 'showReplay'])->name('update');
                Route::delete('/', [ContactController::class, 'destroy'])->name('destroy');
            });

            Route::post('add-replay', [ContactController::class, 'replay'])->name('replay');
        });

        Route::group(['prefix' => 'faq/', 'as' => 'faq.', 'middleware' => 'permission:manage_faqs'], function () {
            Route::get('index', [FaqController::class, 'index'])->name('index');
            Route::get('datatable', [FaqController::class, 'datatable'])->name('datatable');

            Route::group(['prefix' => '/create'], function () {
                Route::get('/', [FaqController::class, 'create'])->name('create');
                Route::post('/', [FaqController::class, 'store'])->name('store');
            });

            Route::group(['prefix' => '{id}/'], function () {
                Route::get('/edit', [FaqController::class, 'edit'])->name('edit');
                Route::put('/edit', [FaqController::class, 'update'])->name('update');
                Route::delete('/', [FaqController::class, 'destroy'])->name('destroy');
            });
        });

        Route::resource('settings', SettingsController::class)->except(['create', 'edit', 'show', 'destroy'])->middleware('permission:show_settings');

        Route::group(['prefix' => 'instance', 'as' => 'instance.'], function () {
            Route::get('cities', [CityController::class, 'getCitiesForCountry'])->name('cities');
            // Route::get('user-info-form', ...)->name('userInfoForm'); // requires UserTypeController
        });

        Route::group(['prefix' => 'notifications', 'as' => 'notifications.'], function () {
            Route::get('/', [NotificationController::class, 'index'])->name('index');
        });

        Route::group(['prefix' => 'posts', 'as' => 'posts.'], function () {
            Route::get('/', [PostController::class, 'index'])->name('index')->middleware('permission:show_posts');
            Route::get('/datatable', [PostController::class, 'datatable'])->name('datatable')->middleware('permission:show_posts');

            Route::group(['prefix' => 'create', 'middleware' => 'permission:add_posts'], function () {
                Route::get('/', [PostController::class, 'create'])->name('create');
                Route::post('/', [PostController::class, 'store'])->name('store');
            });

            Route::group(['prefix' => '{id}', 'middleware' => 'permission:add_posts'], function () {
                Route::get('/edit', [PostController::class, 'edit'])->name('edit');
                Route::put('/edit', [PostController::class, 'update'])->name('update');
                Route::delete('/', [PostController::class, 'destroy'])->name('destroy');
            });
        });

        Route::group(['prefix' => 'categories', 'as' => 'categories.'], function () {
            Route::get('/', [CategoryController::class, 'index'])->name('index')->middleware('permission:show_categories');
            Route::get('/datatable', [CategoryController::class, 'datatable'])->name('datatable')->middleware('permission:show_categories');

            Route::group(['prefix' => 'create', 'middleware' => 'permission:add_categories'], function () {
                Route::get('/', [CategoryController::class, 'create'])->name('create');
                Route::post('/', [CategoryController::class, 'store'])->name('store');
            });

            Route::group(['prefix' => '{id}', 'middleware' => 'permission:add_categories'], function () {
                Route::get('/edit', [CategoryController::class, 'edit'])->name('edit');
                Route::put('/edit', [CategoryController::class, 'update'])->name('update');
                Route::delete('/', [CategoryController::class, 'destroy'])->name('destroy');
            });
        });

        Route::group(['prefix' => 'quote-requests', 'as' => 'quote-requests.', 'middleware' => 'permission:show_quote-requests'], function () {
            Route::get('/', [PanelQuoteRequestController::class, 'index'])->name('index');
            Route::get('datatable', [PanelQuoteRequestController::class, 'datatable']);

            Route::group(['prefix' => '{id}'], function () {
                Route::get('/show', [PanelQuoteRequestController::class, 'show'])->name('show');
                Route::delete('/', [PanelQuoteRequestController::class, 'destroy'])->name('destroy');
            });

            Route::post('update-status', [PanelQuoteRequestController::class, 'updateStatus'])->name('updateStatus');
        });

        Route::group(['prefix' => 'subscribers', 'as' => 'subscribers.', 'middleware' => 'permission:show_subscribers'], function () {
            Route::get('/', [SubscriberController::class, 'index'])->name('index');
            Route::get('datatable', [SubscriberController::class, 'datatable']);
            Route::group(['prefix' => '{id}'], function () {
                Route::delete('/', [SubscriberController::class, 'destroy'])->name('destroy');
            });
        });

        Route::group(['prefix' => 'testimonials', 'as' => 'testimonials.'], function () {
            Route::get('/', [TestimonialController::class, 'index'])->name('index')->middleware('permission:show_testimonials');
            Route::get('/datatable', [TestimonialController::class, 'datatable'])->name('datatable')->middleware('permission:show_testimonials');

            Route::group(['prefix' => 'create', 'middleware' => 'permission:add_testimonials'], function () {
                Route::get('/', [TestimonialController::class, 'create'])->name('create');
                Route::post('/', [TestimonialController::class, 'store'])->name('store');
            });

            Route::group(['prefix' => '{id}', 'middleware' => 'permission:add_testimonials'], function () {
                Route::get('/edit', [TestimonialController::class, 'edit'])->name('edit');
                Route::put('/edit', [TestimonialController::class, 'update'])->name('update');
                Route::delete('/', [TestimonialController::class, 'destroy'])->name('destroy');
            });
        });

        Route::get('logout', function () {
            \Illuminate\Support\Facades\Auth::guard('admin')->logout();
            return back();
        })->name('logout');
    });
});
