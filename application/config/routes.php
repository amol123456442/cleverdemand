<?php
defined('BASEPATH') OR exit('No direct script access allowed');

/*
| -------------------------------------------------------------------------
| URI ROUTING
| -------------------------------------------------------------------------
| This file lets you re-map URI requests to specific controller functions.
|
| Typically there is a one-to-one relationship between a URL string
| and its corresponding controller class/method. The segments in a
| URL normally follow this pattern:
|
|	example.com/class/method/id/
|
| In some instances, however, you may want to remap this relationship
| so that a different class/function is called than the one
| corresponding to the URL.
|
| Please see the user guide for complete details:
|
|	https://codeigniter.com/userguide3/general/routing.html
|
| -------------------------------------------------------------------------
| RESERVED ROUTES
| -------------------------------------------------------------------------
|
| There are three reserved routes:
|
|	$route['default_controller'] = 'welcome';
|
| This route indicates which controller class should be loaded if the
| URI contains no data. In the above example, the "welcome" class
| would be loaded.
|
|	$route['404_override'] = 'errors/page_missing';
|
| This route will tell the Router which controller/method to use if those
| provided in the URL cannot be matched to a valid route.
|
|	$route['translate_uri_dashes'] = FALSE;
|
| This is not exactly a route, but allows you to automatically route
| controller and method names that contain dashes. '-' isn't a valid
| class or method name character, so it requires translation.
| When you set this option to TRUE, it will replace ALL dashes in the
| controller and method URI segments.
|
| Examples:	my-controller/index	-> my_controller/index
|		my-controller/my-method	-> my_controller/my_method
*/
$route['default_controller'] = 'welcome';
$route['404_override'] = '';
$route['translate_uri_dashes'] = FALSE;
$route['contact'] = 'contact/index';
// news
$route['news'] = 'news/index';
$route['news/(:num)'] = 'news/view/$1';
// Interviews
$route['interviews'] = 'InterviewController/index';
$route['interviews/view/(:any)'] = 'InterviewController/view/$1';

$route['contact/submit'] = 'contact/submit';
// authentication
$route['login'] = 'auth/login';
$route['auth/login'] = 'auth/login';
$route['auth/register'] = 'auth/register';
$route['auth/authenticate'] = 'auth/authenticate';
$route['authenticate'] = 'auth/authenticate';
$route['auth/save_register'] = 'auth/save_register';
$route['auth/logout'] = 'auth/logout';


$route['createpost'] = 'CreateNewsPostController/createpost';
$route['createnewspost/store'] = 'CreateNewsPostController/store';
$route['createnewspost/update/(:num)'] = 'CreateNewsPostController/update/$1';
$route['createnewspost/delete/(:num)'] = 'CreateNewsPostController/delete/$1';
$route['allposts'] = 'CreateNewsPostController/allposts';

// press release
// Press Release Routes
$route['createpressrelease'] = 'CreatePressReleaseController/createpressrelease';
$route['pressrelease/store'] = 'CreatePressReleaseController/store';
$route['pressrelease/update/(:num)'] = 'CreatePressReleaseController/update/$1';
$route['pressrelease/delete/(:num)'] = 'CreatePressReleaseController/delete/$1';
$route['allpressreleases'] = 'CreatePressReleaseController/allpressreleases';

$route['pressrelease'] = 'pressrelease/index';
$route['pressrelease/(:any)'] = 'pressrelease/view/$1';

// Main page -> maps to index()
$route['createarticles'] = 'CreateArticlesController/index';

// Store new article
$route['createarticles/store'] = 'CreateArticlesController/store';

// Update
$route['createarticles/update/(:num)'] = 'CreateArticlesController/update/$1';

// Delete
$route['createarticles/delete/(:num)'] = 'CreateArticlesController/delete/$1';

// All articles
$route['allarticles'] = 'CreateArticlesController/allpressreleases';


$route['articles'] = 'articles/index';
$route['articles/(:any)'] = 'articles/view/$1';

$route['resources'] = 'resources/index';


// Interviews
$route['interviews/create'] = 'CreateInterviewController/index';
$route['interviews/store'] = 'CreateInterviewController/store';
$route['interviews/edit/(:num)'] = 'CreateInterviewController/edit/$1';
$route['interviews/update/(:num)'] = 'CreateInterviewController/update/$1';