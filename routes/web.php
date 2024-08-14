<?php

use App\Models\AlumniJobs;
use App\Models\User;
use Spatie\Permission\Models\Role;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\JobController;
use App\Http\Controllers\RoleController;
use App\Http\Controllers\UserController;
use Spatie\Permission\Models\Permission;
use App\Http\Controllers\PermissionController;
use App\Http\Controllers\PortfolioController;
use App\Http\Controllers\JobApplicationController;



    Route::get('permissions/{permissionId}/delete', [PermissionController::class, 'destroy']);
    Route::resource('permissions', PermissionController::class);
    Route::get('jobs/{jobId}/delete', [JobController::class, 'destroy']);

    Route::get('/user/dashboard', [AdminController::class, 'dashboard'])->name('user.dashboard');




    Route::get('users/{userId}/delete', [UserController::class, 'destroy']);

  Route::get('/jobs', [JobController::class, 'index']);

    Route::resource('portfolios', PortfolioController::class);
    
    
    // Route::post('/jobs/{job}/apply', [JobApplicationController::class, 'apply'])->name('jobs.apply');
    // Route::get('/applications', [JobApplicationController::class, 'viewApplications'])->name('applications.index');

    Route::resource('roles', RoleController::class);
    Route::get('roles/{roleId}/delete', [RoleController::class, 'destroy']);
    Route::get('roles/{roleId}/give-permissions', [RoleController::class, 'addPermissionToRole']);
    Route::put('roles/{roleId}/give-permissions', [RoleController::class, 'givePermissionToRole']);
    Route::put('/users/{id}', [UserController::class, 'update'])->name('users.update');
Route::get('/users/{id}', [UserController::class, 'show'])->name('users.show');

    // ALUMNI JOBS
    Route::get('jobs/{jobId}/view', function($id){
        $job = AlumniJobs::findOrFail($id);
        $title = $job->job_title;
        $name = $job->job_name;
        $qualification = $job->job_qualification;
        $amount = $job->job_amount;
        $description = $job->job_description;
        return view('role-permission.jobs.alumni-job-view', ['title' => $title, 
         'name' => $name,
        'description' => $description,
        'qualification'=> $qualification,
        'amount'=> $amount]);
       

    });

Route::resource('users', UserController::class);


Route::get('/', function () {
    return view('welcome');
});

Route::post('/logout', function () {
    Auth::logout();
    return redirect('/login'); // Redirect to home or any other route after logout
});
Route::get('/dashboard', function () {
    $job = AlumniJobs::all();
    $userCount = User::count();
    $permission = Permission::count();
    $jobs = AlumniJobs::count();
    $roles = Role::count();

    return view('dashboard', [
        'user'=> $userCount,
        'permission'=>$permission,
        'role'=> $roles,
        'jobs'=> $jobs,
        'job'=> $job
       
    ]);
})->middleware(['auth', 'verified'])->name('dashboard');

// Additional routes as needed
Route::get('/jobs', [JobApplicationController::class, 'showJobPage'])->name('jobs.list');
Route::post('/jobs/{job}/apply', [JobApplicationController::class, 'apply'])->name('jobs.apply');

require __DIR__.'/auth.php';
