<?php

define('ADMIN','admin');


route_get(ADMIN,'admin.index');
route_get(ADMIN.'/lang','controllers.admin.set_lang');
//Admin authenticate
route_get(ADMIN.'/login','admin.login');
route_post(ADMIN.'/do/login','controllers.admin.login');
route_get(ADMIN.'/logout','controllers.admin.logout');

//category crud
// c for create
// r for read
// u for update
// d for delete
route_get(ADMIN.'/categories','admin.categories.index');
route_get(ADMIN.'/categories/create','admin.categories.create');
route_post(ADMIN.'/categories/store','controllers.admin.categories.store');
route_get(ADMIN.'/categories/show','admin.categories.show');
route_get(ADMIN.'/categories/edit','admin.categories.edit');
route_post(ADMIN.'/categories/edit','controllers.admin.categories.update');
route_post(ADMIN.'/categories/delete','controllers.admin.categories.destroy');


//news crud
// c for create
// r for read
// u for update
// d for delete
route_get(ADMIN.'/news','admin.news.index');
route_get(ADMIN.'/news/create','admin.news.create');
route_post(ADMIN.'/news/store','controllers.admin.news.store');
route_get(ADMIN.'/news/show','admin.news.show');
route_get(ADMIN.'/news/edit','admin.news.edit');
route_post(ADMIN.'/news/edit','controllers.admin.news.update');
route_post(ADMIN.'/news/delete','controllers.admin.news.destroy');