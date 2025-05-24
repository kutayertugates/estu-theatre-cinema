<?php

use App\Core\Router;


use App\Controllers\MainController;
use App\Controllers\MembershipController;
use App\Controllers\PeriodController;
use App\Controllers\RolesController;
use App\Controllers\EventsController;
use App\Controllers\GalleryController;
use App\Controllers\AgreementsController;
use App\Controllers\DepartmentController;
use App\Controllers\UnitsController;


$router = new Router();

# Main
$router->get('/login', [MainController::class, 'login']);
$router->post('/login/form', [MainController::class, 'login_form']);
$router->get('/', [MainController::class, 'Dashboard']);


# Period
$router->get('/period', [PeriodController::class, 'index']);
$router->post('/period/add', [PeriodController::class, 'add']);
$router->get('/period/change/{period_id}', [PeriodController::class, 'change']);



# Membership
$router->get('/membership/all', [MembershipController::class, 'All']);
$router->get('/membership/pending-applications', [MembershipController::class, 'Pending']);
$router->get('/membership/edit/{user_id}', [MembershipController::class, 'Edit']);
$router->post('/membership/edituser', [MembershipController::class, 'EditUser']);
$router->get('/membership/delete/{user_id}', [MembershipController::class, 'Delete']);
$router->get('/membership/unaccept/{id}', [MembershipController::class, 'UnAccept']);
$router->get('/membership/accept/{id}', [MembershipController::class, 'Accept']);



# Roles
$router->get('/roles', [RolesController::class, 'index']);
$router->get('/role/add', [RolesController::class, 'Add']);
$router->post('/role/add-role', [RolesController::class, 'Add_Role']);
$router->get('/role/authorization', [RolesController::class, 'Authorization']);
$router->post('/role/Authorize', [RolesController::class, 'Authorize']);

# Event
$router->get('/event/all', [EventsController::class, 'All']);
$router->get('/event/create', [EventsController::class, 'Create']);
$router->post('/event/add', [EventsController::class, 'Add']);
$router->get('/event/delete/{event_id}', [EventsController::class, 'Delete']);
$router->get('/event/edit/{event_id}', [EventsController::class, 'Edit']);
$router->post('/event/editpost', [EventsController::class, 'EditPost']);
$router->get('/event/application/{event_id}', [EventsController::class, 'Event_Applications']);
$router->get('/event/application/accept/{event_id}/{event_app_id}', [EventsController::class, 'AcceptApplication']);
$router->get('/event/application/unaccept/{event_id}/{event_app_id}', [EventsController::class, 'UnAcceptApplication']);


# Gallery
$router->get('/gallery/all', [GalleryController::class, 'All']);
$router->get('/gallery/get/{image_name}', [GalleryController::class, 'GetImage']);
$router->get('/gallery/upload', [GalleryController::class, 'Upload']);
$router->post('/gallery/add', [GalleryController::class, 'Add']);
$router->get('/gallery/delete/{image_id}', [GalleryController::class, 'Delete']);

# Agreements
$router->get('/agreements', [AgreementsController::class, 'Main']);
$router->post('/agreements/add', [AgreementsController::class, 'Add']);
$router->get('/agreements/delete/{agreement_id}', [AgreementsController::class, 'Delete']);


# Departments
$router->get('/departments', [DepartmentController::class, 'Main']);
$router->get('/departments/edit/{department_id}', [DepartmentController::class, 'Edit']);
$router->post('/departments/editdepartment', [DepartmentController::class, 'EditDepartment']);
$router->get('/departments/delete/{department_id}', [DepartmentController::class, 'Delete']);

# Units
$router->get('/units/all', [UnitsController::class, 'All']);
$router->get('/units/edit/{unit_id}', [UnitsController::class, 'Edit']);
$router->post('/units/editunits', [UnitsController::class, 'EditUnits']);
$router->get('/units/delete/{unit_id}', [UnitsController::class, 'Delete']);