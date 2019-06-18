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

Route::get('/', function () {
    return view('welcome');
});


/**
 * 主页
 */
Route::get("admin/welcome","Admin\IndexController@welcome");


/**
 * lixinyuan
 */
//管理员列表
Route::get('admin/list',"Admin\AdminController@list");
//管理员添加
Route::get('admin/add',"Admin\AdminController@add");
//管理员删除
Route::get('admin/del',"Admin\AdminController@del");
//管理员修改
Route::get('admin/update',"Admin\AdminController@update");
//管理员是否启用
Route::get('admin/statuses',"Admin\AdminController@statuses");

/**
 * Jiaxinchen
 */
Route::get('admin','Admin\IndexController@index')->middleware('admin.login');
//登录界面
Route::get("admin/login","Admin\LoginController@login");
//后台登录功能
Route::post("admin/login","Admin\LoginController@login");
//后台退出（注销）
Route::get("admin/loginout","Admin\LoginController@loginOut");
//后台添加菜单
Route::get("admin/addmenus","Admin\MenusController@add")->middleware('admin.login');
//后台添加菜单执行
Route::post("admin/addmenus","Admin\MenusController@add");
//后台菜单展示
Route::get("admin/showmenus","Admin\MenusController@show");
//菜单展示 条件查询提交
Route::post("admin/showmenus","Admin\MenusController@show");
//删除菜单
Route::get("admin/deletemenus","Admin\MenusController@delete");
//商品评论审核 展示
Route::get("admin/showcomments","Admin\CommentsController@show")->middleware('admin.login');
Route::post("admin/showcomments","Admin\CommentsController@show")->middleware('admin.login');
//删除商品的评论
Route::get('admin/deletecomments',"Admin\CommentsController@delete")->middleware('admin.login');
//回复商品的评论
Route::get("admin/replycomm","Admin\CommentsController@reply")->middleware('admin.login');
Route::post("admin/replycomm","Admin\CommentsController@reply")->middleware('admin.login');
//查询商品分类
Route::get("admin/showcate","Admin\CateController@show")->middleware("admin.login");
//添加商品分类
Route::get("admin/addcate","Admin\CateController@add")->middleware("admin.login");
Route::post("admin/addcate","Admin\CateController@add")->middleware("admin.login");
//删除商品分类
Route::get("admin/deletecate","Admin\CateController@delete")->middleware("admin.login");



/**
 * yangyongmao
 */
//商品详情页
Route::get('goods/goodsInfo', 'Admin\GoodsController@goodsInfo');
//商品修改
Route::post('goods/goodsUpdGoods', 'Admin\GoodsController@goodsUpdGoods');
//商品添加页面
Route::any('goods/goodsInsert', 'Admin\GoodsController@goodsInsert');
//商品执行添加
Route::any('goods/doInsert', 'Admin\GoodsController@doInsert');
//商品展示
Route::any('goods/index','Admin\GoodsController@index');
//商品批删
Route::get('goods/goodsDelAll','Admin\GoodsController@goodsDelAll');
//商品单删
Route::get('goods/goodsDelOne','Admin\GoodsController@goodsDelOne');
//商品修改上下架状态
Route::get('goods/goodsUpdSale','Admin\GoodsController@goodsUpdSale');
//分类添加属性
Route::any('/attribute/attrInsert', 'Admin\AttributeController@attrInsert');
//分类 属性 列表
Route::get('/attribute/catAttr', 'Admin\AttributeController@catAttr');
//分类 属性 批删
Route::get('/attribute/attrDelAll', 'Admin\AttributeController@attrDelAll');
//分类 属性 单删
Route::get('/attribute/attrDelOne', 'Admin\AttributeController@attrDelOne');
//分类 属性 修改
Route::get('/attribute/attrUpd', 'Admin\AttributeController@attrUpd');

/**
 * caoyuefeng
 */
Route::any('admin/orderList',"Admin\OrderController@orderList");
Route::any('admin/orderDel',"Admin\OrderController@orderDel");
Route::any('admin/orderDelall',"Admin\OrderController@orderDelall");
Route::any('admin/orderDesc',"Admin\OrderController@orderDesc");
//用户意见
Route::any("admin/opinionList","Admin\OpinionController@opinionList");