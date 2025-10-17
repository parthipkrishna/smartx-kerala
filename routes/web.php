<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\RazorpayWebhookController;
use App\Http\Controllers\dashboard\admin\AdminTrainingController;
use App\Http\Controllers\dashboard\admin\AdminHomeController;
use App\Http\Controllers\dashboard\admin\AdminGalleryController;
use App\Http\Controllers\dashboard\admin\AdminResultController;
use App\Http\Controllers\dashboard\admin\AdminPlacementController;
use App\Http\Controllers\dashboard\admin\AdminCourseController;
use App\Http\Controllers\dashboard\admin\AdminStudentController;
use App\Http\Controllers\dashboard\admin\AdminMarklistController;
use App\Http\Controllers\dashboard\admin\AdminCertificateController;

use App\Http\Controllers\dashboard\admin\AuthController;
use App\Http\Controllers\dashboard\admin\HomeController;
use App\Http\Controllers\dashboard\admin\UserController;
use App\Http\Controllers\dashboard\admin\CategoryController;
use App\Http\Controllers\dashboard\admin\ProductController;
use App\Http\Controllers\dashboard\admin\BrandController;
use App\Http\Controllers\dashboard\admin\ReviewController;
use App\Http\Controllers\dashboard\admin\TaxController;
use App\Http\Controllers\dashboard\admin\VendorController;
use App\Http\Controllers\dashboard\admin\SellerController;
use App\Http\Controllers\dashboard\admin\OrderController;
use App\Http\Controllers\dashboard\admin\ShippingZoneController;
use App\Http\Controllers\dashboard\admin\ShippingVendorController;
use App\Http\Controllers\dashboard\admin\ShippingChargeController;
use App\Http\Controllers\dashboard\admin\ShippingPromotionController;
use App\Http\Controllers\dashboard\admin\OfferController;
use App\Http\Controllers\dashboard\admin\CouponController;
use App\Http\Controllers\dashboard\admin\NotificationController;
use App\Http\Controllers\dashboard\admin\FaqController;
use App\Http\Controllers\dashboard\admin\StockReportController;
use App\Http\Controllers\dashboard\admin\SaleReportController;
use App\Http\Controllers\dashboard\admin\InvoiceController;

use App\Http\Controllers\web\IndexController;
use App\Http\Controllers\web\AboutController;
use App\Http\Controllers\web\CourseController;
use App\Http\Controllers\web\GalleryController;
use App\Http\Controllers\web\ContactController;
use App\Http\Controllers\web\PlacementController;
use App\Http\Controllers\web\ResultController;
use App\Http\Controllers\web\TrainingController;

use App\Http\Controllers\student\StudentController;

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
// Route::post('/razorpay/webhook', [RazorpayWebhookController::class, 'handle']);

//web
Route::get('/', [IndexController::class, 'index'])->name('index');
Route::get('/about', [AboutController::class, 'index'])->name('about');
Route::get('/courses/{id}', [CourseController::class, 'index'])->name('courses');
Route::get('/course.view/{id}', [CourseController::class, 'courseView'])->name('course.view/{id}');

Route::get('/gallery', [GalleryController::class, 'index'])->name('gallery');
Route::get('/contact', [ContactController::class, 'index'])->name('contact');
Route::post('/contact-us', [ContactController::class, 'store'])->name('contact-us.store');
Route::get('/placements-cells', [PlacementController::class, 'index'])->name('placements');
Route::get('/results', [ResultController::class, 'index'])->name('results');
Route::get('/traning-centers', [TrainingController::class, 'index'])->name('training-centers');

//STUDENT
//student-auth
Route::get('/student-login', [StudentController::class, 'index'])->name('student-login');
Route::post('/student-login', [StudentController::class, 'studentLogin'])->name('student-login.submit');
Route::get('/student-dashboard',[StudentController::class,'studentDashboard'])->name('student-dashboard');
Route::get('/student-home', [StudentController::class, 'studentHome'])->name('student-home');

//student-dashboard
Route::get('/student-certificate/{student_id}', [StudentController::class, 'show'])->name('student-certificate');
Route::get('/student-marklist/{student_id}', [StudentController::class, 'showMarklist'])->name('student-marklist');
Route::get('/student-profile/{student_id}',[StudentController::class,'profile'])->name('student-profile');
Route::post('/update-profile/{id}', [StudentController::class, 'update'])->name('profile.update/{id}');

Route::post('student-logout',[StudentController::class,'logout'])->name('student-logout');

//ADMIN-DASHBOARD
//dashboard-auth
Route::get('/admin', [AuthController::class, 'loginPage'])->name('/admin');
Route::post('/admin-login', [AuthController::class, 'Login'])->name('/admin-login');
Route::get('/app-dashboard',[AuthController::class,'dashboard'])->middleware('isAdmin')->name('app-dashboard');
Route::get('/signup', [AuthController::class, 'Signup'])->name('/signup');
Route::post('admin-logout',[AuthController::class,'logout'])->name('admin-logout')->middleware('isAdmin');

//home
Route::get('/dashboard', [HomeController::class, 'home'])->name('/home');
// Route::get('/analytics', [HomeController::class, 'analytics'])->name('/analytics');
Route::get('/admin-profile',[HomeController::class,'adminProfile'])->name('admin-profile')->middleware('isAdmin');
Route::post('/update-adminprofile/{id}', [HomeController::class, 'adminUpdate'])->name('adminprofile.update/{id}');

//users
Route::get('/add-users', [UserController::class, 'create'])->name('users.add')->middleware('isAdmin');
Route::get('/users', [UserController::class, 'index'])->name('users.show')->middleware('isAdmin');
Route::post('/add-users', [UserController::class, 'store'])->name('user.store')->middleware('isAdmin');
Route::post('/update-users/{id}', [UserController::class, 'update'])->name('user.update/{id}')->middleware('isAdmin');
Route::post('/delete-users/{id}', [UserController::class, 'destroy'])->name('user.delete/{id}')->middleware('isAdmin');

//marklists
Route::get('/marklists', [AdminMarklistController::class, 'index'])->name('marklists.show')->middleware('isAdmin');
Route::get('/add-marklist', [AdminMarklistController::class, 'create'])->name('marklist.add')->middleware('isAdmin');
Route::post('/add-marklist', [AdminMarklistController::class, 'store'])->name('marklist.store')->middleware('isAdmin');
Route::get('/view-marklist/{id}', [AdminMarklistController::class, 'view'])->name('marklist.view/{id}')->middleware('isAdmin');
Route::post('/update-marklist/{id}', [AdminMarklistController::class, 'update'])->name('marklist.update/{id}')->middleware('isAdmin');
Route::post('/delete-marklist/{id}', [AdminMarklistController::class, 'destroy'])->name('marklist.delete/{id}')->middleware('isAdmin');
Route::get('/marklists-theme', [AdminMarklistController::class, 'theme'])->name('marklist.theme')->middleware('isAdmin');
Route::post('/marklists-import', [AdminMarklistController::class, 'import'])->name('marklist.import')->middleware('isAdmin');

//certificates
Route::get('/certificates', [AdminCertificateController::class, 'index'])->name('certificates.show')->middleware('isAdmin');
Route::get('/add-certificate', [AdminCertificateController::class, 'create'])->name('certificate.add')->middleware('isAdmin');
Route::post('/add-certificate', [AdminCertificateController::class, 'store'])->name('certificate.store')->middleware('isAdmin');
Route::get('/view-certificate/{id}', [AdminCertificateController::class, 'view'])->name('certificate.view/{id}')->middleware('isAdmin');
Route::post('/update-certificate/{id}', [AdminCertificateController::class, 'update'])->name('certificate.update/{id}')->middleware('isAdmin');
Route::post('/delete-certificate/{id}', [AdminCertificateController::class, 'destroy'])->name('certificate.delete/{id}')->middleware('isAdmin');
Route::get('/certificates-theme', [AdminCertificateController::class, 'theme'])->name('certificate.theme')->middleware('isAdmin');
Route::post('/certificates-import', [AdminCertificateController::class, 'import'])->name('certificate.import')->middleware('isAdmin');
Route::post('/certificate/print', [AdminCertificateController::class, 'print'])->name('certificate.print')->middleware('isAdmin');
Route::post('/certificate/update-printed-status', [AdminCertificateController::class, 'updatePrintedStatus'])->middleware('isAdmin');

//students
Route::get('/add-students', [AdminStudentController::class, 'create'])->name('students.add')->middleware('isAdmin');
Route::get('/students', [AdminStudentController::class, 'index'])->name('students.show')->middleware('isAdmin');
Route::post('/add-students', [AdminStudentController::class, 'store'])->name('student.store')->middleware('isAdmin');
Route::post('/update-students/{id}', [AdminStudentController::class, 'update'])->name('student.update/{id}')->middleware('isAdmin');
Route::post('/delete-students/{id}', [AdminStudentController::class, 'destroy'])->name('student.delete/{id}')->middleware('isAdmin');


//roles
Route::get('/roles', [UserController::class, 'role'])->name('users.roles')->middleware('isAdmin');

//HOME
//quick-links
Route::get('/admin-home', [AdminHomeController::class, 'index'])->name('admin-home')->middleware('isAdmin');
Route::get('/add-quick-links', [AdminHomeController::class, 'create'])->name('quick-link.add')->middleware('isAdmin');
Route::post('/add-quick-links', [AdminHomeController::class, 'store'])->name('quick-link.store')->middleware('isAdmin');
Route::post('/update-quick-links/{id}', [AdminHomeController::class, 'update'])->name('quick-link.update/{id}')->middleware('isAdmin');
Route::post('/delete-quick-links/{id}', [AdminHomeController::class, 'destroy'])->name('quick-link.delete/{id}')->middleware('isAdmin');

//course
Route::get('/course', [AdminCourseController::class, 'index'])->name('course-list')->middleware('isAdmin');
Route::get('/add-course', [AdminCourseController::class, 'create'])->name('course.add')->middleware('isAdmin');
Route::post('/add-course', [AdminCourseController::class, 'store'])->name('course.store')->middleware('isAdmin');
Route::post('/update-course/{id}', [AdminCourseController::class, 'update'])->name('course.update/{id}')->middleware('isAdmin');
// Route::post('/delete-course/{id}', [AdminCourseController::class, 'destroy'])->name('course.delete/{id}')->middleware('isAdmin');
Route::delete('/delete-course/{id}', [AdminCourseController::class, 'destroy'])->name('course.delete')->middleware('isAdmin');

//training centers
Route::get('/training-centers', [AdminTrainingController::class, 'index'])->name('training-center')->middleware('isAdmin');
Route::get('/add-training-centers', [AdminTrainingController::class, 'addIndex'])->name('training-center.add')->middleware('isAdmin');
Route::post('/add-training-centers', [AdminTrainingController::class, 'store'])->name('training-center.store')->middleware('isAdmin');
Route::post('/update-training-centers/{id}', [AdminTrainingController::class, 'update'])->name('training-center.update/{id}')->middleware('isAdmin');
Route::post('/delete-training-centers/{id}', [AdminTrainingController::class, 'destroy'])->name('training-center.delete/{id}')->middleware('isAdmin');

//placcement cells
Route::get('/placement-cells', [AdminPlacementController::class, 'index'])->name('placement-cell')->middleware('isAdmin');
Route::get('/add-placement-cells', [AdminPlacementController::class, 'addIndex'])->name('placement-cell.add')->middleware('isAdmin');
Route::post('/add-placement-cells', [AdminPlacementController::class, 'store'])->name('placement-cell.store')->middleware('isAdmin');
Route::post('/update-placement-cells/{id}', [AdminPlacementController::class, 'update'])->name('placement-cell.update/{id}')->middleware('isAdmin');
Route::post('/delete-placement-cells/{id}', [AdminPlacementController::class, 'destroy'])->name('placement-cell.delete/{id}')->middleware('isAdmin');


//gallery
Route::get('/admin-gallery', [AdminGalleryController::class, 'index'])->name('admin-gallery')->middleware('isAdmin');
Route::get('/add-gallery', [AdminGalleryController::class, 'create'])->name('gallery.add')->middleware('isAdmin');
Route::post('/add-gallery', [AdminGalleryController::class, 'store'])->name('gallery.store')->middleware('isAdmin');
Route::post('/update-gallery/{id}', [AdminGalleryController::class, 'update'])->name('gallery.update/{id}')->middleware('isAdmin');
Route::post('/delete-gallery/{id}', [AdminGalleryController::class, 'destroy'])->name('gallery.delete/{id}')->middleware('isAdmin');

//result
Route::get('/result', [AdminResultController::class, 'index'])->name('result')->middleware('isAdmin');
Route::get('/add-result', [AdminResultController::class, 'create'])->name('result.add')->middleware('isAdmin');
Route::post('/add-result', [AdminResultController::class, 'store'])->name('result.store')->middleware('isAdmin');
Route::post('/update-results/{id}', [AdminResultController::class, 'update'])->name('result.update/{id}')->middleware('isAdmin');
Route::post('/delete-results/{id}', [AdminResultController::class, 'destroy'])->name('result.delete/{id}')->middleware('isAdmin');

//contact
Route::get('/contact-us', [AdminHomeController::class, 'contactIndex'])->name('contact-us')->middleware('isAdmin');

//products
//category
Route::get('/categories', [CategoryController::class, 'index'])->name('product.category');
Route::get('/add-categories', [CategoryController::class, 'addIndex'])->name('product.category.add');
Route::get('/edit-categories', [CategoryController::class, 'editIndex'])->name('product.category.edit');

//sub category
Route::get('/subcategories', [CategoryController::class, 'subIndex'])->name('product.subcategory');
Route::get('/add-subcategories', [CategoryController::class, 'addSubIndex'])->name('product.subcategory.add');
Route::get('/edit-subcategories', [CategoryController::class, 'editSubIndex'])->name('product.subcategory.edit');

//product
Route::get('/product', [ProductController::class, 'index'])->name('product.index');
Route::get('/product-detail', [ProductController::class, 'show'])->name('product.product.details');
Route::get('/add-products', [ProductController::class, 'create'])->name('product.product.add');
Route::get('/edit-products', [ProductController::class, 'update'])->name('product.product.edit');

//brands
Route::get('/brands', [BrandController::class, 'index'])->name('product.brands');
Route::get('/add-brands', [BrandController::class, 'create'])->name('product.brand.add');
Route::get('/edit-brands', [BrandController::class, 'update'])->name('product.brand.edit');

//review
Route::get('/reviews', [ReviewController::class, 'index'])->name('product.reviews');
 
//tax-classes
Route::get('/tax-classes', [TaxController::class, 'index'])->name('product.tax-classes');
Route::get('/add-tax-classes', [TaxController::class, 'create'])->name('product.tax-classes-add');
Route::get('/edit-tax-classes', [TaxController::class, 'edit'])->name('product.tax-classes-edit');

//tax-rates
Route::get('/tax-rates', [TaxController::class, 'rateIndex'])->name('product.tax-rates');
Route::get('/add-tax-rates', [TaxController::class, 'rateCreate'])->name('product.tax-rates-add');
Route::get('/edit-tax-rates', [TaxController::class, 'rateEdit'])->name('product.tax-rates-edit');

//vendor
Route::get('/vendors', [VendorController::class, 'index'])->name('vendors');
Route::get('/add-vendors', [VendorController::class, 'create'])->name('vendors-add');
 
//seller
Route::get('/sellers', [SellerController::class, 'index'])->name('sellers');
Route::get('/add-sellers', [SellerController::class, 'create'])->name('sellers-add');
 
//order
Route::get('/orders', [OrderController::class, 'index'])->name('order.index'); // orders/
// Route::get('/{id}', [OrderController::class, 'show'])->name('order.details'); // orders/{id}
Route::get('/placed', [OrderController::class, 'placedOrder'])->name('order.placed'); // orders/placed
Route::get('/processed', [OrderController::class, 'processedOrder'])->name('order.processed'); // orders/processed
Route::get('/canceled', [OrderController::class, 'canceledOrder'])->name('order.canceled'); // orders/canceled

//shipping
Route::get('/shipping-zones', [ShippingZoneController::class, 'index'])->name('shipping.zone');
Route::get('/shipping-vendors', [ShippingVendorController::class, 'index'])->name('shipping.vendor');
Route::get('/shipping-charges', [ShippingChargeController::class, 'index'])->name('shipping.charge');
Route::get('/shipping-promotions', [ShippingPromotionController::class, 'index'])->name('shipping.promotion');

Route::get('/offers', [OfferController::class, 'index'])->name('offer');
 
Route::get('/coupons', [CouponController::class, 'index'])->name('coupon');
 
Route::get('/notifications', [NotificationController::class, 'index'])->name('notification');
 
Route::get('/faqs', [FaqController::class, 'index'])->name('faq');
 
//report
Route::get('/report-stock', [StockReportController::class, 'index'])->name('report.stock');
Route::get('/report-sales', [SaleReportController::class, 'index'])->name('report.sale');
 
//invoice
Route::get('/invoice-design', [InvoiceController::class, 'index'])->name('invoice.design');
Route::get('/invoice-settings', [InvoiceController::class, 'settingIndex'])->name('invoice.setting');
