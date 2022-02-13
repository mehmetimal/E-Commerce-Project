<?php

use App\Http\Controllers\AttributeController;
use App\Http\Controllers\AttributeValueController;
use App\Http\Controllers\CategoryController;
use App\Http\Controllers\ProductController;
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
Route::group(['middleware' => ['role:Super Admin|Admin|Shop','auth']], function () {
    Route::resource('category',CategoryController::class);

    Route::post('category/get-category-info-with.attributes',[CategoryController::class,'getCategoryInfoWithAttributes'])->name('get.category.info.with.attributes');

    Route::post('category/get-category-attributes',[CategoryController::class,'getCategoryAttributes'])->name('getCategoryAttributes');

    Route::resource('attribute',\App\Http\Controllers\AttributeController::class);

    Route::post('attribute/is-attribute-slug-exists',[AttributeController::class,'isAttributeSlugExists'])->name('is.attribute.slug.exists');

    Route::post('attribute/is-attribute-value-exists',[AttributeController::class,'isAttributeValueExists'])->name('is.attribute.value.exists');

    Route::post('attribute/get-attribute-info-with-values',[AttributeController::class,'show'])->name('get.attribute.info.with.values');

    Route::post('attribute/update-attribute-name',[AttributeController::class,'update'])->name('update_attribute_name');

    Route::post('attribute/get-attributes-with-values',[AttributeController::class,'getAttributesWithValues'])->name('get.attributes.with.values');

    Route::resource('attributeValue',AttributeValueController::class);

    Route::resource('product',ProductController::class);

    Route::post('product/get-product-attributes',[ProductController::class,'getProductAttributesByProductId'])->name('get.product.attributes');

    Route::get('product/get-product-variants/{product_id}',[ProductController::class,'getProductVariants'])->name('get.product.variants');

    Route::get('save-image-for-variants/{product_id?}',[ProductController::class,'saveImageForProductAndImages'])->name('save.image.for.product.and.variants');

    Route::resource('variant',\App\Http\Controllers\VariantController::class);

    Route::get('yayında-olmayan-urunler',[\App\Http\Controllers\VariantController::class,'notPublishedVariants'])->name('not_published_variants');


    Route::post('variant/update-is-sold',[\App\Http\Controllers\VariantController::class,'updateIsSold'])->name('update.variant.isSold');

    Route::post('variant/update-is-published',[\App\Http\Controllers\VariantController::class,'updateIsPublished'])->name('update.variant.isPublished');

    Route::match(['GET','DELETE'],'delete-variant-image/{image_id}',[\App\Http\Controllers\VariantController::class,'deleteImage'])->name('delete.variant.media');

    Route::match(['get','post'],'upload-variant-image/{variant_id}',[\App\Http\Controllers\VariantController::class,'uploadImage'])->name('upload.variant.image');

    Route::resource('role',\App\Http\Controllers\RoleController::class);

    Route::resource('permission',\App\Http\Controllers\PermissionController::class);

    Route::resource('user',\App\Http\Controllers\UserController::class);

    Route::resource('shop',\App\Http\Controllers\ShopController::class);

    Route::resource('order',\App\Http\Controllers\OrderController::class);

    Route::get('site-settings',[\App\Http\Controllers\SiteSettingController::class,'index'])->name('site_setting.index');

    Route::post('site-settings-update/{setting_id}',[\App\Http\Controllers\SiteSettingController::class,'update'])->name('update.site_setting');

    Route::resource('whole_sale',App\Http\Controllers\WholeSaleController::class);


    Route::resource('contact',\App\Http\Controllers\ContactController::class);

    Route::resource('faq',\App\Http\Controllers\FaqController::class);

    Route::get('site-yorumlari',[\App\Http\Controllers\SiteRatingController::class,'index'])->name('site_rating.index');

    Route::get('site-yorum-onay-guncelle/{comment_id}/{is_published}',[\App\Http\Controllers\SiteRatingController::class,'updateIsPublished'])->name('update.is.published');

});


/**
 * Herkese Açık Kısımlar
 */
Route::get('/',[\App\Http\Controllers\IndexController::class,'index'])->name('index');

Route::post('/',[\App\Http\Controllers\IndexController::class,'filterIndexVariants'])->name('filter.index.variants');

Route::get('/shoping/{category_id}',[\App\Http\Controllers\IndexController::class,'shop'])->name('shopping');


Route::post('/variant-quick-view',[\App\Http\Controllers\IndexController::class,'variantQuickView'])->name('get.variant.detail');


Route::get('/dukkan-urunleri/{shop_id}',[\App\Http\Controllers\IndexController::class,'getShopVariants'])->name('shop.variants');

Route::view('iletisim','frondend.contact')->name('contact');

Route::post('iletisim-yolla',[\App\Http\Controllers\IndexController::class,'storeContactRequest'])->name('store.contact.request');


/*
 * Sepet İşlemleri
 */

Route::post('/add-item-to-cart',[\App\Http\Controllers\CartController::class,'addItem'])->name('add.Item');

Route::post('/remove-item-from-cart',[\App\Http\Controllers\CartController::class,'deleteItem'])->name('delete.Item');

Route::post('/get-cart-total',[\App\Http\Controllers\CartController::class,'getCartTotal'])->name('get.cart.total');

Route::post('/update-cart',[\App\Http\Controllers\CartController::class,'updateCart'])->name('update.cart');

Route::get('checkout',[\App\Http\Controllers\CheckoutController::class,'index'])->name('checkout');

Route::post('/placeOrder',[\App\Http\Controllers\PlaceOrderController::class,'placeOrder'])->name('place.order');


Route::get('siparis-detay/{order_id}',[\App\Http\Controllers\ProfileController::class,'orderDetail'])->name('order.detail');

Route::get('urun-cesitleri/{product_id}',[\App\Http\Controllers\IndexController::class,'getProductVariants'])->name('get.variant.from.product');

Route::post('contact-store',[\App\Http\Controllers\IndexController::class,'getProductVariants'])->name('contact.store');

Route::get('Ortaklarımız',[\App\Http\Controllers\IndexController::class,'getAllPartners'])->name('get.all.partners');

Route::get('sikca-sorulan-sorular',[\App\Http\Controllers\IndexController::class,'getFaqs'])->name('faqs');

Route::view('hakkımızda','frondend.aboutUs')->name('about');

Route::get('toptan-satis-urunleri',[\App\Http\Controllers\IndexController::class,'getWholeSales'])->name('get.whole_sales');

Route::post('yorum-kaydet',[\App\Http\Controllers\IndexController::class,'storeSiteComment'])->name('store.site.rating');

Route::get('site-yorumları',[\App\Http\Controllers\IndexController::class,'getSiteComments'])->name('get.site.ratings');

Route::post('get-district-by-province-id',[\App\Http\Controllers\IndexController::class,'getDistrictByProvinceId'])->name('get.district.by.province.id');

Route::post('urun-filtrele',[\App\Http\Controllers\IndexController::class,'filterVariantByAttribute'])->name('filter.by.attribute');
/*
 * Giriş Yapanlara ÖZEL ROUTELAR
 */

Route::get('profilim',[\App\Http\Controllers\ProfileController::class,'index'])->name('profile')->middleware('auth');


Auth::routes();



Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');
