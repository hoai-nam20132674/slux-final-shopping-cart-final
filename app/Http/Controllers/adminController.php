<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Http\Requests;
use App\Http\Controllers\Controller;
use Illuminate\Contracts\View\View;
use App\Categories;
use App\Blogs;
use App\Products;
use App\Products_Images;
use App\Menu_Header;
use App\Menu_Footer;
use App\Menu_Sidebar;
use App\Products_Repair;
use App\Systems;
use App\Order;
use App\Custumer_Register;
use App\Nokia_Error;
use App\Vertu_Error;
use App\User;
use App\Slides_Header;
use App\Http\Requests\addCategorieRequest;
use App\Http\Requests\editCategorieRequest;
use App\Http\Requests\editBlogRequest;
use App\Http\Requests\editProductRequest;
use App\Http\Requests\addBlogRequest;
use App\Http\Requests\addProductRequest;
use App\Http\Requests\addProductRepairRequest;
use App\Http\Requests\editProductRepairRequest;
use App\Http\Requests\addUserRequest;
use App\Http\Requests\editUserRequest;
use App\Http\Requests\addSlideRequest;
use App\Http\Requests\editSlideRequest;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Auth;
use Input;

class adminController extends Controller
{
    
    public function index(){
        $countBlogs = Blogs::select()->count();
        $categories = Categories::select()->get();
        return View('frontEndAdmin.page-content.index',['countBlogs'=>$countBlogs]);
    }

    //Categories Controller
    public function getListCategories(){
        $countBlogs = Blogs::select()->count();
        $Categories =new Categories;
        $getListCategories = $Categories->getListCategories();
    	return View('frontEndAdmin.page-content.listCategories',['getListCategories'=>$getListCategories,'countBlogs'=>$countBlogs]);
    }
    public function deleteCategorie($id,$parent_id){
        $Categories =new Categories;
        $Categories->deleteCategorie($id,$parent_id);
        return redirect()->back()->with(['flash_level'=>'success','flash_message'=>'Xóa danh mục thành công']);
    }
    public function addCategorie(){
        $countBlogs = Blogs::select()->count();
        $cate = new Categories;
        $categories =$cate->getListCategories();
        return View('frontEndAdmin.page-content.addCategorie',['categories'=>$categories,'countBlogs'=>$countBlogs]);
    }
    public function postAddCategorie(addCategorieRequest $request){
        $cate =new Categories;
        $cate->addCategorie($request);
        return redirect('admin/getListCategories')->with(['flash_level'=>'success','flash_message'=>'Thêm danh mục thành công']);
    }
    
    public function editCategorie($id, $parent_id){
        $countBlogs = Blogs::select()->count();
        $categorie = Categories::where('id',$id)->get();
        $categories = Categories::select()->get();
        $parent = Categories::where('id',$parent_id)->get();
        return View('frontEndAdmin.page-content.editCategorie',['categorie'=>$categorie,'categories'=>$categories,'parent'=>$parent,'countBlogs'=>$countBlogs]);
    }
    public function postEditCategorie(editCategorieRequest $request, $id){
        $cate =new Categories;
        $cate->editCategorie($request,$id);
        return redirect('admin/getListCategories')->with(['flash_level'=>'success','flash_message'=>'Sửa danh mục thành công']);
    }

    //Blog Controller

    public function getListBlogs(){
        $countBlogs = Blogs::select()->count();
        $blogs = Blogs::select()->orderBy('created_at','DESC')->get();
        return View('frontEndAdmin.page-content.listBlogs',['blogs'=>$blogs,'countBlogs'=>$countBlogs]);
    }
    public function addBlog(){
        $countBlogs = Blogs::select()->count();
        $categories = Categories::select()->get();
        return View('frontEndAdmin.page-content.addBlog',['categories'=>$categories,'countBlogs'=>$countBlogs]);
    }
    public function postAddBlog(addBlogRequest $request){
        if($request->categorie_id ==0){
            return redirect('admin/getListBlogs')->with(['flash_level'=>'danger','flash_message'=>'Thêm tin tức không thành công']);
        }
        $blog =new Blogs;
        $blog->addBlog($request);
        return redirect('admin/getListBlogs')->with(['flash_level'=>'success','flash_message'=>'Thêm tin tức thành công']);
    }
    public function deleteBlog($id){
        $blog =new Blogs;
        $blog->deleteBlog($id);
        return redirect('admin/getListBlogs')->with(['flash_level'=>'success','flash_message'=>'Xóa tin tức thành công']);
    }
    public function editBlog($id, $categorie_id){
        $countBlogs = Blogs::select()->count();
        $blog = Blogs::where('id',$id)->get();
        $categorie = Categories::where('id',$categorie_id)->get();
        $categories = Categories::select()->get();
        return View('frontEndAdmin.page-content.editBlog',['categorie'=>$categorie,'categories'=>$categories,'blog'=>$blog,'countBlogs'=>$countBlogs]);
    }

    public function postEditBlog(editBlogRequest $request, $id){
        $blog =new Blogs;
        $blog->editBlog($request,$id);
        return redirect('admin/getListBlogs')->with(['flash_level'=>'success','flash_message'=>'Sửa tin tức thành công']);
    }


    //Product Controller

    public function getListProducts(){
        $countBlogs = Blogs::select()->count();
        $products = Products::select()->orderBy('created_at','DESC')->get();
        return View('frontEndAdmin.page-content.listProducts',['products'=>$products,'countBlogs'=>$countBlogs]);
    }
    public function addProduct(){
        $countBlogs = Blogs::select()->count();
        $categories = Categories::select()->get();
        return View('frontEndAdmin.page-content.addProduct',['categories'=>$categories,'countBlogs'=>$countBlogs]);
    }
    public function postAddProduct(addProductRequest $request){
        $product = new Products;
        $product ->addProduct($request);
        return redirect('admin/getListProducts')->with(['flash_level'=>'success','flash_message'=>'Thêm sản phẩm thành công']);
    }
    public function deleteProduct($id){
        $product = new Products;
        $product->deleteProduct($id);
        return redirect('admin/getListProducts')->with(['flash_level'=>'success','flash_message'=>'Xóa sản phẩm thành công']);

    }
    public function editProduct($id, $categorie_id){
        $countBlogs = Blogs::select()->count();
        $product = Products::where('id',$id)->get();
        $categorie = Categories::where('id',$categorie_id)->get()->first();
        $categories =Categories::select()->get();
        $product_images = Products_Images::where('product_id',$id)->get();
        return View('frontEndAdmin.page-content.editProduct',['categorie'=>$categorie,'categories'=>$categories,'product'=>$product,'countBlogs'=>$countBlogs,'product_images'=>$product_images]);
    }
    public function postEditProduct(editProductRequest $request, $id){
        $product = new Products;
        $product->editProduct($request,$id);
        return redirect('admin/getListProducts')->with(['flash_level'=>'success','flash_message'=>'Sửa sản phẩm thành công']);
    }

    //Edit Menu Controller
    public function editMenu(){
        $countBlogs = Blogs::select()->count();
        $categories = Categories::select()->get();
        return View('frontEndAdmin.page-content.menu',['countBlogs'=>$countBlogs,'categories'=>$categories]);
    }
    public function postEditMenuHeader(Request $request){
        $menu_header = new Menu_Header;
        $menu_header->editMenu($request);
        return redirect('admin/editMenu')->with(['flash_level'=>'success','flash_message'=>'Sửa menu thành công']);
    }
    public function postEditMenuFooter(Request $request){
        $menu_footer =new Menu_Footer;
        $menu_footer->editMenu($request);
        return redirect('admin/editMenu')->with(['flash_level'=>'success','flash_message'=>'Sửa menu thành công']);
    }
    public function postEditMenuSidebar(Request $request){
        $menu_sidebar =new Menu_Sidebar;
        $menu_sidebar->editMenu($request);
        return redirect('admin/editMenu')->with(['flash_level'=>'success','flash_message'=>'Sửa menu thành công']);
    }


    // Product Repair Controller
    public function getListProductsRepair(){
        $countBlogs = Blogs::select()->count();
        $products_repair = Products_Repair::select()->orderBy('created_at','DESC')->get();
        return View('frontEndAdmin.page-content.listProductRepair',['products_repair'=>$products_repair,'countBlogs'=>$countBlogs]);
    }
    public function addProductRepair(){
        $countBlogs = Blogs::select()->count();
        return View('frontEndAdmin.page-content.addProductRepair',['countBlogs'=>$countBlogs]);
    }
    public function postAddProductRepair(addProductRepairRequest $request){
        $product_repair =new Products_Repair;
        $product_repair->addProductRepair($request);
        return redirect('admin/getListProductsRepair')->with(['flash_level'=>'success','flash_message'=>'Thêm khác hàng thành công']);
    }

    public function deleteProductRepair($id){
        $product = new Products_Repair;
        $product->deleteProductRepair($id);
        return redirect('admin/getListProductsRepair')->with(['flash_level'=>'success','flash_message'=>'Xóa khách hàng thành công']);
    }
    public function editProductRepair($id){
        $product_repair = Products_Repair::where('id',$id)->get();
        $countBlogs = Blogs::select()->count();
        return View('frontEndAdmin.page-content.editProductRepair',['product_repair'=>$product_repair,'countBlogs'=>$countBlogs]);
    }
    public function postEditProductRepair(editProductRepairRequest $request, $id){
        $product_repair=new Products_Repair;
        $product_repair->editProductRepair($request,$id);
        return redirect('admin/getListProductsRepair')->with(['flash_level'=>'success','flash_message'=>'Sửa thông tin khách hàng thành công']);
    }

    public function review($id){
        $custumer = Custumer_Register::where('id',$id)->first();
        $custumer->status =1;
        $custumer->save();
    }
    public function unreview($id){
        $custumer = Custumer_Register::where('id',$id)->first();
        $custumer->status =0;
        $custumer->save();
    }

    // Order Controller
    public function getListOrders(){
        $countBlogs = Blogs::select()->count();
        $orders = Order::orderBy('created_at','DESC')->get();

        return View('frontEndAdmin.page-content.listOrder',['countBlogs'=>$countBlogs,'orders'=>$orders]);
    }
    public function deleteOrder($id){
        $order = new Order;
        $order->deleteOrder($id);
        return redirect()->route('getListOrders')->with(['flash_level'=>'success','flash_message'=>'Xóa đơn hàng thành công']);
    }
    // End Order Controll


    // Edit Seo
    public function editSystems(){
        $countBlogs = Blogs::select()->count();
        $systems = Systems::get();
        return View('frontEndAdmin.page-content.systems',['countBlogs'=>$countBlogs,'systems'=>$systems]);
    }
    public function postEditSystems(Request $request){
        $system = new Systems;
        $system->editSystems($request);
        return redirect()->route('editSystems')->with(['flash_level'=>'success','flash_message'=>'Sửa thông tin thành công']);
    }
    // End edit seo

    public function getListCustumerRegister(){
        $countBlogs = Blogs::select()->count();
        $custumer_registers = Custumer_Register::select()->orderBy('created_at','DESC')->get();
        return View('frontEndAdmin.page-content.listCustumerRegister',['countBlogs'=>$countBlogs,'custumer_registers'=>$custumer_registers]);
    }

    //Dịch vụ controller
    public function getListNokiaError(){
        $countBlogs = Blogs::select()->count();
        $errors = Nokia_Error::orderBy('created_at','DESC')->get();
        return View('frontEndAdmin.page-content.listNokiaError',['countBlogs'=>$countBlogs,'errors'=>$errors]);
    }
    public function addNokiaError(){
        $countBlogs = Blogs::select()->count();
        return View('frontEndAdmin.page-content.addNokiaError',['countBlogs'=>$countBlogs]);
    }
    public function postAddNokiaError(Request $request){
        $error = new Nokia_Error;
        $error->addNokiaError($request);
        return redirect()->route('getListNokiaError')->with(['flash_level'=>'success','flash_message'=>'Thêm dịch vụ thành công']);
    }
    public function editNokiaError($id){
        $nokia_errors = Nokia_Error::where('id',$id)->get()->first();
        $countBlogs = Blogs::select()->count();
        return View('frontEndAdmin.page-content.editNokiaError',['countBlogs'=>$countBlogs,'nokia_errors'=>$nokia_errors]);
    }
    public function postEditNokiaError(Request $request, $id){
        $error = new Nokia_Error;
        $error->editNokiaError($request, $id);
        return redirect()->route('getListNokiaError')->with(['flash_level'=>'success','flash_message'=>'Sửa dịch vụ thành công']);
    }
    public function deleteNokiaError($id){
        $error = new Nokia_Error;
        $error->deleteNokiaError($id);
        return redirect()->route('getListNokiaError')->with(['flash_level'=>'success','flash_message'=>'Xóas dịch vụ thành công']);
    }

    public function getListVertuError(){
        $countBlogs = Blogs::select()->count();
        $errors = Vertu_Error::orderBy('created_at','DESC')->get();
        return View('frontEndAdmin.page-content.listVertuError',['countBlogs'=>$countBlogs,'errors'=>$errors]);
    }
    public function addVertuError(){
        $countBlogs = Blogs::select()->count();
        return View('frontEndAdmin.page-content.addVertuError',['countBlogs'=>$countBlogs]);
    }
    public function postAddVertuError(Request $request){
        $error = new Vertu_Error;
        $error->addVertuError($request);
        return redirect()->route('getListVertuError')->with(['flash_level'=>'success','flash_message'=>'Thêm dịch vụ thành công']);
    }
    public function editVertuError($id){
        $vertu_errors = Vertu_Error::where('id',$id)->get()->first();
        $countBlogs = Blogs::select()->count();
        return View('frontEndAdmin.page-content.editVertuError',['countBlogs'=>$countBlogs,'vertu_errors'=>$vertu_errors]);
    }
    public function postEditVertuError(Request $request, $id){
        $error = new Vertu_Error;
        $error->editVertuError($request, $id);
        return redirect()->route('getListVertuError')->with(['flash_level'=>'success','flash_message'=>'Sửa dịch vụ thành công']);
    }
    public function deleteVertuError($id){
        $error = new Vertu_Error;
        $error->deleteVertuError($id);
        return redirect()->route('getListNokiaError')->with(['flash_level'=>'success','flash_message'=>'Xóas dịch vụ thành công']);
    }

    // End dịch vụ

    // User

    public function getListUser(){
        $countBlogs = Blogs::select()->count();
        $users = User::get();
        return View('frontEndAdmin.page-content.listUser',['countBlogs'=>$countBlogs,'users'=>$users]);
    }
    public function addUser(){
        $countBlogs = Blogs::select()->count();
        return View('frontEndAdmin.page-content.addUser',['countBlogs'=>$countBlogs]);
    }
    public function postAddUser(addUserRequest $request){
        $user = new User;
        $user-> addUser($request);
        return redirect()->route('getListUser')->with(['flash_level'=>'success','flash_message'=>'Thêm thành viên thành công']);
    }
    public function editUser($id){
        $user = User::where('id',$id)->get()->first();
        $countBlogs = Blogs::select()->count();
        return View('frontEndAdmin.page-content.editUser',['countBlogs'=>$countBlogs,'user'=>$user]);
    }
    public function postEditUser(editUserRequest $request, $id){
        $user = new User;
        $user-> editUser($request,$id);
        return redirect()->route('getListUser')->with(['flash_level'=>'success','flash_message'=>'Sưa thông tin thành viên thành công']);
    }
    // End User
    
    // Slide Header

    public function getListSlideHeader(){
        $countBlogs = Blogs::select()->count();
        $slides = Slides_Header::get();
        return View('frontEndAdmin.page-content.listSlideHeader',['countBlogs'=>$countBlogs,'slides'=>$slides]);
    }
    public function addSlide(){
        $countBlogs = Blogs::select()->count();
        return View('frontEndAdmin.page-content.addSlide',['countBlogs'=>$countBlogs]);
    }
    public function postAddSlide(addSlideRequest $request){
        $slide = new Slides_Header;
        $slide-> addSlide($request);
        return redirect()->route('getListSlideHeader')->with(['flash_level'=>'success','flash_message'=>'Thêm slide thành công']);
    }
    public function editSlide($id){
        $countBlogs = Blogs::select()->count();
        $slide = Slides_Header::where('id',$id)->get()->first();
        return View('frontEndAdmin.page-content.editSlide',['countBlogs'=>$countBlogs,'slide'=>$slide]);
    }
    public function postEditSlide(editSlideRequest $request, $id){
        $slide = new Slides_Header;
        $slide->editSlide($request,$id);
        return redirect()->route('getListSlideHeader')->with(['flash_level'=>'success','flash_message'=>'Sửa slide thành công']);
    }
    // End Slide Header
    public function enableProduct($id){
        $product = new Products;
        $product->enableProduct($id);
    }
    public function disableProduct($id){
        $product = new Products;
        $product->disableProduct($id);
    }
    public function enableBlog($id){
        $product = new Blogs;
        $product->enableBlog($id);
    }
    public function disableBlog($id){
        $product = new Blogs;
        $product->disableBlog($id);
    }
}
