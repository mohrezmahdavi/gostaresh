<?php

use App\Http\Controllers\Admin\Gostaresh\GraduatesOfHigherEducationController;
use App\Http\Controllers\Admin\Gostaresh\GraduateStatusAnalysisController;
use App\Http\Controllers\Admin\Gostaresh\ResearchOutputStatusAnalysisController;
use App\Http\Controllers\Admin\Gostaresh\TeachersStatusAnalysisController;
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

require __DIR__ . '/auth.php';



Route::group(['middleware' => ['auth'], 'prefix' => 'admin'], function () {
    Route::get('/', [App\Http\Controllers\Admin\Index\IndexController::class, 'index'])->name('admin.index');

    Route::get('/profile', [\App\Http\Controllers\Admin\Profile\ShowProfileController::class, 'show'])->name('admin.profile.edit');
    Route::post('/profile', [\App\Http\Controllers\Admin\Profile\UpdateProfileController::class, 'update'])->name('admin.profile.update');

    // Users
    Route::get('/users/list', [\App\Http\Controllers\Admin\User\ListController::class, 'list'])->name('admin.users.list');
    Route::get('/user/create', [\App\Http\Controllers\Admin\User\CreateController::class, 'create'])->name('admin.user.create');
    Route::post('/user/create', [\App\Http\Controllers\Admin\User\StoreController::class, 'store'])->name('admin.user.store');
    Route::get('/user/edit/{user}', [\App\Http\Controllers\Admin\User\EditController::class, 'edit'])->name('admin.user.edit');
    Route::post('/user/edit/{user}', [\App\Http\Controllers\Admin\User\UpdateController::class, 'update'])->name('admin.user.update');
    Route::get('/user/delete/{user}', [\App\Http\Controllers\Admin\User\DeleteController::class, 'delete'])->name('admin.user.delete');

    // Table 1 Route
    Route::resource('demographic/changes/city', App\Http\Controllers\Admin\Gostaresh\DemographicChangesOfCityController::class)->names('demographic.changes.city')->parameters([
        'city' => 'demographicChangesOfCity'
    ]);
    // Table 2 Route
    Route::resource('geographical/location/unit', App\Http\Controllers\Admin\Gostaresh\GeographicalLocationOfUnitController::class)->names('geographical.location.unit')->parameters([
        'unit' => 'geographicalLocationOfUnit'
    ]);

    // Table 3 Route
    Route::resource('number/student/population', App\Http\Controllers\Admin\Gostaresh\NumberStudentPopulationController::class)->names('number.student.population')->parameters([
        'population' => 'numberStudentPopulation'
    ]);

    // Table 4 Route
    Route::resource('growth/rate/student/population', App\Http\Controllers\Admin\Gostaresh\GrowthRateStudentPopulationController::class)->names('growth.rate.student.population')->parameters([
        'population' => 'growthRateStudentPopulation'
    ]);

    // Table 5 Route
    Route::resource('gdp/city', App\Http\Controllers\Admin\Gostaresh\GDPCityController::class)->names('gdp.city')->parameters([
        'city' => 'gdpCity'
    ]);

    // Table 6 Route
    Route::resource('gdp/part', App\Http\Controllers\Admin\Gostaresh\GDPPartController::class)->names('gdp.part')->parameters([
        'part' => 'gdpPart'
    ]);

    // Table 7 Route
    Route::resource('number/of/research/project', App\Http\Controllers\Admin\Gostaresh\NumberOfResearchProjectController::class)->names('number.of.research.project')->parameters([
        'project' => 'numberOfResearchProject'
    ]);

    // Table 8 Route
    Route::resource('payment/randd/department', App\Http\Controllers\Admin\Gostaresh\PaymentRAndDDepartmentController::class)->names('payment.r.and.d.department')->parameters([
        'department' => 'paymentRAndDDepartment'
    ]);

    // Table 9 Route
    Route::resource('industrial/expenditure/research', App\Http\Controllers\Admin\Gostaresh\IndustrialExpenditureResearchController::class)->names('industrial.expenditure.research')->parameters([
        'research' => 'industrialExpenditureResearch'
    ]);

    // Table 10 Route
    Route::resource('economic/participation/rate', App\Http\Controllers\Admin\Gostaresh\EconomicParticipationRateController::class)->names('economic.participation.rate')->parameters([
        'rate' => 'economicParticipationRate'
    ]);

    // Table 11 Route
    Route::resource('unemployment/rate', App\Http\Controllers\Admin\Gostaresh\UnemploymentRateController::class)->names('unemployment.rate')->parameters([
        'rate' => 'unemploymentRate'
    ]);

    // Table 12 Route
    Route::resource('employment/of/provincial', App\Http\Controllers\Admin\Gostaresh\EmploymentOfProvincialController::class)->names('employment.of.provincial')->parameters([
        'provincial' => 'employmentOfProvincial'
    ]);

    // Table 13 Route
    Route::resource('multiple/deprivation/index/of/city', App\Http\Controllers\Admin\Gostaresh\MultipleDeprivationIndexOfCityController::class)->names('multiple.deprivation.index.of.city')->parameters([
        'city' => 'multipleDeprivationIndexOfCity'
    ]);

    // Table 14 Route
    Route::resource('poverty/of/provincial/city', App\Http\Controllers\Admin\Gostaresh\PovertyOfProvincialCityController::class)->names('poverty.of.provincial.city')->parameters([
        'city' => 'povertyOfProvincialCity'
    ]);
    
    // Table 15 Route
    Route::resource('academic/major/educational', App\Http\Controllers\Admin\Gostaresh\AcademicMajorEducationalController::class)->names('academic.major.educational')->parameters([
        'educational' => 'academicMajorEducational'
    ]);

    // Table 16,17 Route
    Route::resource('number/of/students/status/analysis', App\Http\Controllers\Admin\Gostaresh\NumberOfStudentsStatusAnalysisController::class)->names('number.of.students.status.analysis')->parameters([
        'analysis' => 'numberOfStudentsStatusAnalysis'
    ]);

    
    // Table 32 Route
    Route::resource('graduates-of-higher-education', GraduatesOfHigherEducationController::class)->names('graduates-of-higher-education');

    // Table 33 Route
    Route::resource('graduate-status-analyses', GraduateStatusAnalysisController::class)->names('graduate-status-analyses');

    // Table 34 Route
    Route::resource('teachers-status-analyses', TeachersStatusAnalysisController::class)->names('teachers-status-analyses');

    // Table 35 Route
    Route::resource('research-output-status-analyses', ResearchOutputStatusAnalysisController::class)->names('research-output-status-analyses');
});
