<?php

use App\Http\Controllers\Admin\Gostaresh\AmountOfFacilitiesController;
use App\Http\Controllers\Admin\Gostaresh\AssetProductivityController;
use App\Http\Controllers\Admin\Gostaresh\CostChangesTrendsController;
use App\Http\Controllers\Admin\Gostaresh\CostOfMajorsController;
use App\Http\Controllers\Admin\Gostaresh\CreditAndAssetController;
use App\Http\Controllers\Admin\Gostaresh\CulturalIndicatorsController;
use App\Http\Controllers\Admin\Gostaresh\EmployeeProfileController;
use App\Http\Controllers\Admin\Gostaresh\GraduatesOfHigherEducationController;
use App\Http\Controllers\Admin\Gostaresh\GraduateStatusAnalysisController;
use App\Http\Controllers\Admin\Gostaresh\InnovationInfrastructureController;
use App\Http\Controllers\Admin\Gostaresh\InternationalResearchStatusAnalysisController;
use App\Http\Controllers\Admin\Gostaresh\InternationalTechnologyController;
use App\Http\Controllers\Admin\Gostaresh\OrganizationalCultureController;
use App\Http\Controllers\Admin\Gostaresh\PercapitaRevenueController;
use App\Http\Controllers\Admin\Gostaresh\PercapitaStatusAnalysesController;
use App\Http\Controllers\Admin\Gostaresh\ResearchOutputStatusAnalysisController;
use App\Http\Controllers\Admin\Gostaresh\RevenueChangesController;
use App\Http\Controllers\Admin\Gostaresh\RevenueStatusAnalysesController;
use App\Http\Controllers\Admin\Gostaresh\RoadmapDesiredController;
use App\Http\Controllers\Admin\Gostaresh\SocialHealthController;
use App\Http\Controllers\Admin\Gostaresh\TeachersStatusAnalysisController;
use App\Http\Controllers\Admin\Gostaresh\TechnologicalProductController;
use App\Http\Controllers\Admin\Gostaresh\TuitionIncomeController;
use App\Http\Controllers\Admin\Gostaresh\UnitsGeneralStatusController;
use App\Http\Controllers\Admin\Gostaresh\UniversityCostsController;
use App\Http\Controllers\Admin\Profile\ShowProfileController;
use App\Http\Controllers\Admin\Profile\UpdateProfileController;
use App\Http\Controllers\Admin\Security\RoleController;
use App\Http\Controllers\Admin\User\CreateController;
use App\Http\Controllers\Admin\User\DeleteController;
use App\Http\Controllers\Admin\User\EditController;
use App\Http\Controllers\Admin\User\ListController;
use App\Http\Controllers\Admin\User\LogsController;
use App\Http\Controllers\Admin\User\StoreController;
use App\Http\Controllers\Admin\User\UpdateController;
use App\Http\Controllers\Admin\Zone\ZoneController;
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

    Route::get('/profile', [ShowProfileController::class, 'show'])->name('admin.profile.edit');
    Route::post('/profile', [UpdateProfileController::class, 'update'])->name('admin.profile.update');

    // Users
    Route::get('/users/list', [ListController::class, 'list'])->name('admin.users.list');
    Route::get('/user/create', [CreateController::class, 'create'])->name('admin.user.create');
    Route::post('/user/create', [StoreController::class, 'store'])->name('admin.user.store');
    Route::get('/user/edit/{user}', [EditController::class, 'edit'])->name('admin.user.edit');
    Route::post('/user/edit/{user}', [UpdateController::class, 'update'])->name('admin.user.update');
    Route::get('/user/delete/{user}', [DeleteController::class, 'delete'])->name('admin.user.delete');
    Route::get("/user/logs/{user}", [LogsController::class, "authenticationLogs"])->name("admin.user.logs");

    //roles
    Route::get("role/{role}/user/list", [RoleController::class, "roleUsers"])->name("admin.role.users.list");
    Route::delete("role/{role}/user/{user}/remove", [RoleController::class, "removeUserFromRole"])->name("admin.role.user.remove");
    Route::get("role/{role}/users/add", [RoleController::class, "addUserToRoleList"])->name("admin.role.user.add.list");
    Route::post("role/{role}/users/add/{user}", [RoleController::class, "addUserToRole"])->name("admin.role.user.add");
    Route::resource("role", RoleController::class)->names("admin.role");

    //Zone
    Route::get('/zones/create', [ZoneController::class, 'create'])->name('admin.zone.create');
    Route::post('/zones', [ZoneController::class, 'store'])->name('admin.zone.store');

    // Table 1 Route
    Route::resource('demographic/changes/city', App\Http\Controllers\Admin\Gostaresh\DemographicChangesOfCityController::class)->names('demographic.changes.city')->parameters([
        'city' => 'demographicChangesOfCity'
    ]);
    Route::get('demographic/changes/city/list/excel', [App\Http\Controllers\Admin\Gostaresh\DemographicChangesOfCityController::class, 'listExcelExport'])->name('demographic.changes.city.list.excel');
    Route::get('demographic/changes/city/list/pdf', [App\Http\Controllers\Admin\Gostaresh\DemographicChangesOfCityController::class, 'listPDFExport'])->name('demographic.changes.city.list.pdf');
    Route::get('demographic/changes/city/list/print', [App\Http\Controllers\Admin\Gostaresh\DemographicChangesOfCityController::class, 'listPrintExport'])->name('demographic.changes.city.list.print');

    // Table 2 Route
    Route::resource('geographical/location/unit', App\Http\Controllers\Admin\Gostaresh\GeographicalLocationOfUnitController::class)->names('geographical.location.unit')->parameters([
        'unit' => 'geographicalLocationOfUnit'
    ]);
    Route::get('geographical/location/unit/list/excel', [App\Http\Controllers\Admin\Gostaresh\GeographicalLocationOfUnitController::class, 'listExcelExport'])->name('geographical.location.unit.list.excel');
    Route::get('geographical/location/unit/list/pdf', [App\Http\Controllers\Admin\Gostaresh\GeographicalLocationOfUnitController::class, 'listPDFExport'])->name('geographical.location.unit.list.pdf');
    Route::get('geographical/location/unit/list/print', [App\Http\Controllers\Admin\Gostaresh\GeographicalLocationOfUnitController::class, 'listPrintExport'])->name('geographical.location.unit.list.print');

    // Table 3 Route
    Route::resource('number/student/population', App\Http\Controllers\Admin\Gostaresh\NumberStudentPopulationController::class)->names('number.student.population')->parameters([
        'population' => 'numberStudentPopulation'
    ]);
    Route::get('number/student/population/list/excel', [App\Http\Controllers\Admin\Gostaresh\NumberStudentPopulationController::class, 'listExcelExport'])->name('number.student.population.list.excel');
    Route::get('number/student/population/list/pdf', [App\Http\Controllers\Admin\Gostaresh\NumberStudentPopulationController::class, 'listPDFExport'])->name('number.student.population.list.pdf');
    Route::get('number/student/population/list/print', [App\Http\Controllers\Admin\Gostaresh\NumberStudentPopulationController::class, 'listPrintExport'])->name('number.student.population.list.print');

    // Table 4 Route
    Route::resource('growth/rate/student/population', App\Http\Controllers\Admin\Gostaresh\GrowthRateStudentPopulationController::class)->names('growth.rate.student.population')->parameters([
        'population' => 'growthRateStudentPopulation'
    ]);
    Route::get('growth/rate/student/population/list/excel', [App\Http\Controllers\Admin\Gostaresh\GrowthRateStudentPopulationController::class, 'listExcelExport'])->name('growth.rate.student.population.list.excel');
    Route::get('growth/rate/student/population/list/pdf', [App\Http\Controllers\Admin\Gostaresh\GrowthRateStudentPopulationController::class, 'listPDFExport'])->name('growth.rate.student.population.list.pdf');
    Route::get('growth/rate/student/population/list/print', [App\Http\Controllers\Admin\Gostaresh\GrowthRateStudentPopulationController::class, 'listPrintExport'])->name('growth.rate.student.population.list.print');

    // Table 5 Route
    Route::resource('gdp/city', App\Http\Controllers\Admin\Gostaresh\GDPCityController::class)->names('gdp.city')->parameters([
        'city' => 'gdpCity'
    ]);
    Route::get('gdp/city/list/excel', [App\Http\Controllers\Admin\Gostaresh\GDPCityController::class, 'listExcelExport'])->name('gdp.city.list.excel');
    Route::get('gdp/city/list/pdf', [App\Http\Controllers\Admin\Gostaresh\GDPCityController::class, 'listPDFExport'])->name('gdp.city.list.pdf');
    Route::get('gdp/city/list/print', [App\Http\Controllers\Admin\Gostaresh\GDPCityController::class, 'listPrintExport'])->name('gdp.city.list.print');


    // Table 6 Route
    Route::resource('gdp/part', App\Http\Controllers\Admin\Gostaresh\GDPPartController::class)->names('gdp.part')->parameters([
        'part' => 'gdpPart'
    ]);
    Route::get('gdp/part/list/excel', [App\Http\Controllers\Admin\Gostaresh\GDPPartController::class, 'listExcelExport'])->name('gdp.part.list.excel');
    Route::get('gdp/part/list/pdf', [App\Http\Controllers\Admin\Gostaresh\GDPPartController::class, 'listPDFExport'])->name('gdp.part.list.pdf');
    Route::get('gdp/part/list/print', [App\Http\Controllers\Admin\Gostaresh\GDPPartController::class, 'listPrintExport'])->name('gdp.part.list.print');

    // Table 7 Route
    Route::resource('number/of/research/project', App\Http\Controllers\Admin\Gostaresh\NumberOfResearchProjectController::class)->names('number.of.research.project')->parameters([
        'project' => 'numberOfResearchProject'
    ]);
    Route::get('number/of/research/project/list/excel', [App\Http\Controllers\Admin\Gostaresh\NumberOfResearchProjectController::class, 'listExcelExport'])->name('number.of.research.project.list.excel');
    Route::get('number/of/research/project/list/pdf', [App\Http\Controllers\Admin\Gostaresh\NumberOfResearchProjectController::class, 'listPDFExport'])->name('number.of.research.project.list.pdf');
    Route::get('number/of/research/project/list/print', [App\Http\Controllers\Admin\Gostaresh\NumberOfResearchProjectController::class, 'listPrintExport'])->name('number.of.research.project.list.print');

    // Table 8 Route
    Route::resource('payment/randd/department', App\Http\Controllers\Admin\Gostaresh\PaymentRAndDDepartmentController::class)->names('payment.r.and.d.department')->parameters([
        'department' => 'paymentRAndDDepartment'
    ]);
    Route::get('payment/randd/department/list/excel', [App\Http\Controllers\Admin\Gostaresh\PaymentRAndDDepartmentController::class, 'listExcelExport'])->name('payment.r.and.d.department.list.excel');
    Route::get('payment/randd/department/list/pdf', [App\Http\Controllers\Admin\Gostaresh\PaymentRAndDDepartmentController::class, 'listPDFExport'])->name('payment.r.and.d.department.list.pdf');
    Route::get('payment/randd/department/list/print', [App\Http\Controllers\Admin\Gostaresh\PaymentRAndDDepartmentController::class, 'listPrintExport'])->name('payment.r.and.d.department.list.print');

    // Table 9 Route
    Route::resource('industrial/expenditure/research', App\Http\Controllers\Admin\Gostaresh\IndustrialExpenditureResearchController::class)->names('industrial.expenditure.research')->parameters([
        'research' => 'industrialExpenditureResearch'
    ]);
    Route::get('industrial/expenditure/research/list/excel', [App\Http\Controllers\Admin\Gostaresh\IndustrialExpenditureResearchController::class, 'listExcelExport'])->name('industrial.expenditure.research.list.excel');
    Route::get('industrial/expenditure/research/list/pdf', [App\Http\Controllers\Admin\Gostaresh\IndustrialExpenditureResearchController::class, 'listPDFExport'])->name('industrial.expenditure.research.list.pdf');
    Route::get('industrial/expenditure/research/list/print', [App\Http\Controllers\Admin\Gostaresh\IndustrialExpenditureResearchController::class, 'listPrintExport'])->name('industrial.expenditure.research.list.print');

    // Table 10 Route
    Route::resource('economic/participation/rate', App\Http\Controllers\Admin\Gostaresh\EconomicParticipationRateController::class)->names('economic.participation.rate')->parameters([
        'rate' => 'economicParticipationRate'
    ]);
    Route::get('economic/participation/rate/list/excel', [App\Http\Controllers\Admin\Gostaresh\EconomicParticipationRateController::class, 'listExcelExport'])->name('economic.participation.rate.list.excel');
    Route::get('economic/participation/rate/list/pdf', [App\Http\Controllers\Admin\Gostaresh\EconomicParticipationRateController::class, 'listPDFExport'])->name('economic.participation.rate.list.pdf');
    Route::get('economic/participation/rate/list/print', [App\Http\Controllers\Admin\Gostaresh\EconomicParticipationRateController::class, 'listPrintExport'])->name('economic.participation.rate.list.print');

    // Table 11 Route
    Route::resource('unemployment/rate', App\Http\Controllers\Admin\Gostaresh\UnemploymentRateController::class)->names('unemployment.rate')->parameters([
        'rate' => 'unemploymentRate'
    ]);
    Route::get('unemployment/rate/list/excel', [App\Http\Controllers\Admin\Gostaresh\UnemploymentRateController::class, 'listExcelExport'])->name('unemployment.rate.list.excel');
    Route::get('unemployment/rate/list/pdf', [App\Http\Controllers\Admin\Gostaresh\UnemploymentRateController::class, 'listPDFExport'])->name('unemployment.rate.list.pdf');
    Route::get('unemployment/rate/list/print', [App\Http\Controllers\Admin\Gostaresh\UnemploymentRateController::class, 'listPrintExport'])->name('unemployment.rate.list.print');

    // Table 12 Route
    Route::resource('employment/of/provincial', App\Http\Controllers\Admin\Gostaresh\EmploymentOfProvincialController::class)->names('employment.of.provincial')->parameters([
        'provincial' => 'employmentOfProvincial'
    ]);
    Route::get('employment/of/provincial/list/excel', [App\Http\Controllers\Admin\Gostaresh\EmploymentOfProvincialController::class, 'listExcelExport'])->name('employment.of.provincial.list.excel');
    Route::get('employment/of/provincial/list/pdf', [App\Http\Controllers\Admin\Gostaresh\EmploymentOfProvincialController::class, 'listPDFExport'])->name('employment.of.provincial.list.pdf');
    Route::get('employment/of/provincial/list/print', [App\Http\Controllers\Admin\Gostaresh\EmploymentOfProvincialController::class, 'listPrintExport'])->name('employment.of.provincial.list.print');

    // Table 13 Route
    Route::resource('multiple/deprivation/index/of/city', App\Http\Controllers\Admin\Gostaresh\MultipleDeprivationIndexOfCityController::class)->names('multiple.deprivation.index.of.city')->parameters([
        'city' => 'multipleDeprivationIndexOfCity'
    ]);
    Route::get('multiple/deprivation/index/of/city/list/excel', [App\Http\Controllers\Admin\Gostaresh\MultipleDeprivationIndexOfCityController::class, 'listExcelExport'])->name('multiple.deprivation.index.of.city.list.excel');
    Route::get('multiple/deprivation/index/of/city/list/pdf', [App\Http\Controllers\Admin\Gostaresh\MultipleDeprivationIndexOfCityController::class, 'listPDFExport'])->name('multiple.deprivation.index.of.city.list.pdf');
    Route::get('multiple/deprivation/index/of/city/list/print', [App\Http\Controllers\Admin\Gostaresh\MultipleDeprivationIndexOfCityController::class, 'listPrintExport'])->name('multiple.deprivation.index.of.city.list.print');

    // Table 14 Route
    Route::resource('poverty/of/provincial/city', App\Http\Controllers\Admin\Gostaresh\PovertyOfProvincialCityController::class)->names('poverty.of.provincial.city')->parameters([
        'city' => 'povertyOfProvincialCity'
    ]);
    Route::get('poverty/of/provincial/city/list/excel', [App\Http\Controllers\Admin\Gostaresh\PovertyOfProvincialCityController::class, 'listExcelExport'])->name('poverty.of.provincial.city.list.excel');
    Route::get('poverty/of/provincial/city/list/pdf', [App\Http\Controllers\Admin\Gostaresh\PovertyOfProvincialCityController::class, 'listPDFExport'])->name('poverty.of.provincial.city.list.pdf');
    Route::get('poverty/of/provincial/city/list/print', [App\Http\Controllers\Admin\Gostaresh\PovertyOfProvincialCityController::class, 'listPrintExport'])->name('poverty.of.provincial.city.list.print');

    // Table 15 Route
    Route::resource('academic/major/educational', App\Http\Controllers\Admin\Gostaresh\AcademicMajorEducationalController::class)->names('academic.major.educational')->parameters([
        'educational' => 'academicMajorEducational'
    ]);
    Route::get('academic/major/educational/list/excel', [App\Http\Controllers\Admin\Gostaresh\AcademicMajorEducationalController::class, 'listExcelExport'])->name('academic.major.educational.list.excel');
    Route::get('academic/major/educational/list/pdf', [App\Http\Controllers\Admin\Gostaresh\AcademicMajorEducationalController::class, 'listPDFExport'])->name('academic.major.educational.list.pdf');
    Route::get('academic/major/educational/list/print', [App\Http\Controllers\Admin\Gostaresh\AcademicMajorEducationalController::class, 'listPrintExport'])->name('academic.major.educational.list.print');

    // Table 16,17 Route
    Route::resource('number/of/students/status/analysis', App\Http\Controllers\Admin\Gostaresh\NumberOfStudentsStatusAnalysisController::class)->names('number.of.students.status.analysis')->parameters([
        'analysis' => 'numberOfStudentsStatusAnalysis'
    ]);
    Route::get('number/of/students/status/analysis/list/excel', [App\Http\Controllers\Admin\Gostaresh\NumberOfStudentsStatusAnalysisController::class, 'listExcelExport'])->name('number.of.students.status.analysis.list.excel');
    Route::get('number/of/students/status/analysis/list/pdf', [App\Http\Controllers\Admin\Gostaresh\NumberOfStudentsStatusAnalysisController::class, 'listPDFExport'])->name('number.of.students.status.analysis.list.pdf');
    Route::get('number/of/students/status/analysis/list/print', [App\Http\Controllers\Admin\Gostaresh\NumberOfStudentsStatusAnalysisController::class, 'listPrintExport'])->name('number.of.students.status.analysis.list.print');

    // Table 18 Route
    Route::resource('number/of/volunteers/status/analysis', App\Http\Controllers\Admin\Gostaresh\NumberOfVolunteersStatusAnalysisController::class)->names('number.of.volunteers.status.analysis')->parameters([
        'analysis' => 'numberOfVolunteersStatusAnalysis'
    ]);
    Route::get('number/of/volunteers/status/analysis/list/excel', [App\Http\Controllers\Admin\Gostaresh\NumberOfVolunteersStatusAnalysisController::class, 'listExcelExport'])->name('number.of.volunteers.status.analysis.list.excel');
    Route::get('number/of/volunteers/status/analysis/list/pdf', [App\Http\Controllers\Admin\Gostaresh\NumberOfVolunteersStatusAnalysisController::class, 'listPDFExport'])->name('number.of.volunteers.status.analysis.list.pdf');
    Route::get('number/of/volunteers/status/analysis/list/print', [App\Http\Controllers\Admin\Gostaresh\NumberOfVolunteersStatusAnalysisController::class, 'listPrintExport'])->name('number.of.volunteers.status.analysis.list.print');

    // Table 19 Route
    Route::resource('number/of/admissions/status/analysis', App\Http\Controllers\Admin\Gostaresh\NumberOfAdmissionsStatusAnalysisController::class)->names('number.of.admissions.status.analysis')->parameters([
        'analysis' => 'numberOfAdmissionsStatusAnalysis'
    ]);
    Route::get('number/of/admissions/status/analysis/list/excel', [App\Http\Controllers\Admin\Gostaresh\NumberOfAdmissionsStatusAnalysisController::class, 'listExcelExport'])->name('number.of.admissions.status.analysis.list.excel');
    Route::get('number/of/admissions/status/analysis/list/pdf', [App\Http\Controllers\Admin\Gostaresh\NumberOfAdmissionsStatusAnalysisController::class, 'listPDFExport'])->name('number.of.admissions.status.analysis.list.pdf');
    Route::get('number/of/admissions/status/analysis/list/print', [App\Http\Controllers\Admin\Gostaresh\NumberOfAdmissionsStatusAnalysisController::class, 'listPrintExport'])->name('number.of.admissions.status.analysis.list.print');

    // Table 20 Route
    Route::resource('number/of/registrants/status/analysis', App\Http\Controllers\Admin\Gostaresh\NumberOfRegistrantsStatusAnalysisController::class)->names('number.of.registrants.status.analysis')->parameters([
        'analysis' => 'numberOfRegistrant'
    ]);
    Route::get('number/of/registrants/status/analysis/list/excel', [App\Http\Controllers\Admin\Gostaresh\NumberOfRegistrantsStatusAnalysisController::class, 'listExcelExport'])->name('number.of.registrants.status.analysis.list.excel');
    Route::get('number/of/registrants/status/analysis/list/pdf', [App\Http\Controllers\Admin\Gostaresh\NumberOfRegistrantsStatusAnalysisController::class, 'listPDFExport'])->name('number.of.registrants.status.analysis.list.pdf');
    Route::get('number/of/registrants/status/analysis/list/print', [App\Http\Controllers\Admin\Gostaresh\NumberOfRegistrantsStatusAnalysisController::class, 'listPrintExport'])->name('number.of.registrants.status.analysis.list.print');

    // Table 21 Route
    Route::resource('annual/growth/rate/of/student/enrollment', App\Http\Controllers\Admin\Gostaresh\AnnualGrowthRateOfStudentEnrollmentController::class)->names('annual.growth.rate.of.student.enrollment')->parameters([
        'enrollment' => 'annualGrthRateOfStdnEnrollment'
    ]);
    Route::get('annual/growth/rate/of/student/enrollment/list/excel', [App\Http\Controllers\Admin\Gostaresh\AnnualGrowthRateOfStudentEnrollmentController::class, 'listExcelExport'])->name('annual.growth.rate.of.student.enrollment.list.excel');
    Route::get('annual/growth/rate/of/student/enrollment/list/pdf', [App\Http\Controllers\Admin\Gostaresh\AnnualGrowthRateOfStudentEnrollmentController::class, 'listPDFExport'])->name('annual.growth.rate.of.student.enrollment.list.pdf');
    Route::get('annual/growth/rate/of/student/enrollment/list/print', [App\Http\Controllers\Admin\Gostaresh\AnnualGrowthRateOfStudentEnrollmentController::class, 'listPrintExport'])->name('annual.growth.rate.of.student.enrollment.list.print');

    // Table 22 Route
    Route::resource('average/test/score/of/the/first/thirty/percent/of/admitted', App\Http\Controllers\Admin\Gostaresh\AverageTestScoreOfTheFirstThirtyPercentOfAdmittedController::class)->names('average.test.score.of.the.first.thirty.percent.of.admitted')->parameters([
        'admitted' => 'avgTstScrOfFrtThrtPrntOfAdmitted'
    ]);
    Route::get('average/test/score/of/the/first/thirty/percent/of/admitted/list/excel', [App\Http\Controllers\Admin\Gostaresh\AverageTestScoreOfTheFirstThirtyPercentOfAdmittedController::class, 'listExcelExport'])->name('average.test.score.of.the.first.thirty.percent.of.admitted.list.excel');
    Route::get('average/test/score/of/the/first/thirty/percent/of/admitted/list/pdf', [App\Http\Controllers\Admin\Gostaresh\AverageTestScoreOfTheFirstThirtyPercentOfAdmittedController::class, 'listPDFExport'])->name('average.test.score.of.the.first.thirty.percent.of.admitted.list.pdf');
    Route::get('average/test/score/of/the/first/thirty/percent/of/admitted/list/print', [App\Http\Controllers\Admin\Gostaresh\AverageTestScoreOfTheFirstThirtyPercentOfAdmittedController::class, 'listPrintExport'])->name('average.test.score.of.the.first.thirty.percent.of.admitted.list.print');

    // Table 23 Route
    Route::resource('average/test/score/of/the/last/five/percent/of/admitted', App\Http\Controllers\Admin\Gostaresh\AverageTestScoreOfTheLastFivePercentOfAdmittedController::class)->names('average.test.score.of.the.last.five.percent.of.admitted')->parameters([
        'admitted' => 'avgTstScOfLastFivePctOfAdmitted'
    ]);
    Route::get('average/test/score/of/the/last/five/percent/of/admitted/list/excel', [App\Http\Controllers\Admin\Gostaresh\AverageTestScoreOfTheLastFivePercentOfAdmittedController::class, 'listExcelExport'])->name('average.test.score.of.the.last.five.percent.of.admitted.list.excel');
    Route::get('average/test/score/of/the/last/five/percent/of/admitted/list/pdf', [App\Http\Controllers\Admin\Gostaresh\AverageTestScoreOfTheLastFivePercentOfAdmittedController::class, 'listPDFExport'])->name('average.test.score.of.the.last.five.percent.of.admitted.list.pdf');
    Route::get('average/test/score/of/the/last/five/percent/of/admitted/list/print', [App\Http\Controllers\Admin\Gostaresh\AverageTestScoreOfTheLastFivePercentOfAdmittedController::class, 'listPrintExport'])->name('average.test.score.of.the.last.five.percent.of.admitted.list.print');

    // Table 24 Route
    Route::resource('student/admission/capacity', App\Http\Controllers\Admin\Gostaresh\StudentAdmissionCapacityController::class)->names('student.admission.capacity')->parameters([
        'capacity' => 'studentAdmissionCapacity'
    ]);
    Route::get('student/admission/capacity/list/excel', [App\Http\Controllers\Admin\Gostaresh\StudentAdmissionCapacityController::class, 'listExcelExport'])->name('student.admission.capacity.list.excel');
    Route::get('student/admission/capacity/list/pdf', [App\Http\Controllers\Admin\Gostaresh\StudentAdmissionCapacityController::class, 'listPDFExport'])->name('student.admission.capacity.list.pdf');
    Route::get('student/admission/capacity/list/print', [App\Http\Controllers\Admin\Gostaresh\StudentAdmissionCapacityController::class, 'listPrintExport'])->name('student.admission.capacity.list.print');

    // Table 25 Route
    Route::resource('status/analysis/of/the/number/of/fields/of/study', App\Http\Controllers\Admin\Gostaresh\StatusAnalysisOfTheNumberOfFieldsOfStudyController::class)->names('status.analysis.of.the.number.of.fields.of.study')->parameters([
        'study' => 'stsAnlysOfTheNumOfFieldsOfStudy'
    ]);
    Route::get('status/analysis/of/the/number/of/fields/of/study/list/excel', [App\Http\Controllers\Admin\Gostaresh\StatusAnalysisOfTheNumberOfFieldsOfStudyController::class, 'listExcelExport'])->name('status.analysis.of.the.number.of.fields.of.study.list.excel');
    Route::get('status/analysis/of/the/number/of/fields/of/study/list/pdf', [App\Http\Controllers\Admin\Gostaresh\StatusAnalysisOfTheNumberOfFieldsOfStudyController::class, 'listPDFExport'])->name('status.analysis.of.the.number.of.fields.of.study.list.pdf');
    Route::get('status/analysis/of/the/number/of/fields/of/study/list/print', [App\Http\Controllers\Admin\Gostaresh\StatusAnalysisOfTheNumberOfFieldsOfStudyController::class, 'listPrintExport'])->name('status.analysis.of.the.number.of.fields.of.study.list.print');

    // Table 26, 27 Route
    Route::resource('number/of/non/medical/fields/of/study', App\Http\Controllers\Admin\Gostaresh\NumberOfNonMedicalFieldsOfStudyController::class)->names('number.of.non.medical.fields.of.study')->parameters([
        'study' => 'numberOfNonMedicalFieldsOfStudy'
    ]);
    Route::get('number/of/non/medical/fields/of/study/list/excel', [App\Http\Controllers\Admin\Gostaresh\NumberOfNonMedicalFieldsOfStudyController::class, 'listExcelExport'])->name('number.of.non.medical.fields.of.study.list.excel');
    Route::get('number/of/non/medical/fields/of/study/list/pdf', [App\Http\Controllers\Admin\Gostaresh\NumberOfNonMedicalFieldsOfStudyController::class, 'listPDFExport'])->name('number.of.non.medical.fields.of.study.list.pdf');
    Route::get('number/of/non/medical/fields/of/study/list/print', [App\Http\Controllers\Admin\Gostaresh\NumberOfNonMedicalFieldsOfStudyController::class, 'listPrintExport'])->name('number.of.non.medical.fields.of.study.list.print');

    // Table 28 Route
    Route::resource('status/analysis/of/the/number/of/course', App\Http\Controllers\Admin\Gostaresh\StatusAnalysisOfTheNumberOfCoursesController::class)->names('status.analysis.of.the.number.of.course')->parameters([
        'course' => 'statusAnalysisOfTheNumOfCourse'
    ]);
    Route::get('status/analysis/of/the/number/of/course/list/excel', [App\Http\Controllers\Admin\Gostaresh\StatusAnalysisOfTheNumberOfCoursesController::class, 'listExcelExport'])->name('status.analysis.of.the.number.of.course.list.excel');
    Route::get('status/analysis/of/the/number/of/course/list/pdf', [App\Http\Controllers\Admin\Gostaresh\StatusAnalysisOfTheNumberOfCoursesController::class, 'listPDFExport'])->name('status.analysis.of.the.number.of.course.list.pdf');
    Route::get('status/analysis/of/the/number/of/course/list/print', [App\Http\Controllers\Admin\Gostaresh\StatusAnalysisOfTheNumberOfCoursesController::class, 'listPrintExport'])->name('status.analysis.of.the.number.of.course.list.print');

    // Table 29 Route
    Route::resource('number/of/international/course', App\Http\Controllers\Admin\Gostaresh\NumberOfInternationalCourseController::class)->names('number.of.international.course')->parameters([
        'course' => 'numberOfInternationalCourse'
    ]);
    Route::get('number/of/international/course/list/excel', [App\Http\Controllers\Admin\Gostaresh\NumberOfInternationalCourseController::class, 'listExcelExport'])->name('number.of.international.course.list.excel');
    Route::get('number/of/international/course/list/pdf', [App\Http\Controllers\Admin\Gostaresh\NumberOfInternationalCourseController::class, 'listPDFExport'])->name('number.of.international.course.list.pdf');
    Route::get('number/of/international/course/list/print', [App\Http\Controllers\Admin\Gostaresh\NumberOfInternationalCourseController::class, 'listPrintExport'])->name('number.of.international.course.list.print');

    // Table 30 Route
    Route::resource('international/student/growth/rate', App\Http\Controllers\Admin\Gostaresh\InternationalStudentGrowthRateController::class)->names('international.student.growth.rate')->parameters([
        'rate' => 'internationalStudentGrowthRate'
    ]);
    Route::get('international/student/growth/rate/list/excel', [App\Http\Controllers\Admin\Gostaresh\InternationalStudentGrowthRateController::class, 'listExcelExport'])->name('international.student.growth.rate.list.excel');
    Route::get('international/student/growth/rate/list/pdf', [App\Http\Controllers\Admin\Gostaresh\InternationalStudentGrowthRateController::class, 'listPDFExport'])->name('international.student.growth.rate.list.pdf');
    Route::get('international/student/growth/rate/list/print', [App\Http\Controllers\Admin\Gostaresh\InternationalStudentGrowthRateController::class, 'listPrintExport'])->name('international.student.growth.rate.list.print');

    // Table 31 Route
    Route::resource('status/analysis/of/the/number/of/curricula', App\Http\Controllers\Admin\Gostaresh\StatusAnalysisOfTheNumberOfCurriculaController::class)->names('status.analysis.of.the.number.of.curricula')->parameters([
        'curricula' => 'stsAnalysisOfTheNumOfCurricula'
    ]);
    Route::get('status/analysis/of/the/number/of/curricula/list/excel', [App\Http\Controllers\Admin\Gostaresh\StatusAnalysisOfTheNumberOfCurriculaController::class, 'listExcelExport'])->name('status.analysis.of.the.number.of.curricula.list.excel');
    Route::get('status/analysis/of/the/number/of/curricula/list/pdf', [App\Http\Controllers\Admin\Gostaresh\StatusAnalysisOfTheNumberOfCurriculaController::class, 'listPDFExport'])->name('status.analysis.of.the.number.of.curricula.list.pdf');
    Route::get('status/analysis/of/the/number/of/curricula/list/print', [App\Http\Controllers\Admin\Gostaresh\StatusAnalysisOfTheNumberOfCurriculaController::class, 'listPrintExport'])->name('status.analysis.of.the.number.of.curricula.list.print');

    // Table 32 Route
    Route::resource('graduates-of-higher-education', GraduatesOfHigherEducationController::class)->names('graduates-of-higher-education');
    Route::get('graduates-of-higher-education/list/excel', [App\Http\Controllers\Admin\Gostaresh\GraduatesOfHigherEducationController::class, 'listExcelExport'])->name('graduates.of.higher.education.list.excel');
    Route::get('graduates-of-higher-education/list/pdf', [App\Http\Controllers\Admin\Gostaresh\GraduatesOfHigherEducationController::class, 'listPDFExport'])->name('graduates.of.higher.education.list.pdf');
    Route::get('graduates-of-higher-education/list/print', [App\Http\Controllers\Admin\Gostaresh\GraduatesOfHigherEducationController::class, 'listPrintExport'])->name('graduates.of.higher.education.list.print');

    // Table 33 Route
    Route::resource('graduate-status-analyses', GraduateStatusAnalysisController::class)->names('graduate-status-analyses');
    Route::get('graduate-status-analyses/list/excel', [App\Http\Controllers\Admin\Gostaresh\GraduateStatusAnalysisController::class, 'listExcelExport'])->name('graduate-status-analyses.list.excel');
    Route::get('graduate-status-analyses/list/pdf', [App\Http\Controllers\Admin\Gostaresh\GraduateStatusAnalysisController::class, 'listPDFExport'])->name('graduate-status-analyses.list.pdf');
    Route::get('graduate-status-analyses/list/print', [App\Http\Controllers\Admin\Gostaresh\GraduateStatusAnalysisController::class, 'listPrintExport'])->name('graduate-status-analyses.list.print');

    // Table 34 Route
    Route::resource('teachers-status-analyses', TeachersStatusAnalysisController::class)->names('teachers-status-analyses');
    Route::get('teachers-status-analyses/list/excel', [App\Http\Controllers\Admin\Gostaresh\TeachersStatusAnalysisController::class, 'listExcelExport'])->name('teachers-status-analyses.list.excel');
    Route::get('teachers-status-analyses/list/pdf', [App\Http\Controllers\Admin\Gostaresh\TeachersStatusAnalysisController::class, 'listPDFExport'])->name('teachers-status-analyses.list.pdf');
    Route::get('teachers-status-analyses/list/print', [App\Http\Controllers\Admin\Gostaresh\TeachersStatusAnalysisController::class, 'listPrintExport'])->name('teachers-status-analyses.list.print');

    // Table 35 Route
    Route::resource('research-output-status-analyses', ResearchOutputStatusAnalysisController::class)->names('research-output-status-analyses');
    Route::get('research-output-status-analyses/list/excel', [App\Http\Controllers\Admin\Gostaresh\ResearchOutputStatusAnalysisController::class, 'listExcelExport'])->name('research-output-status-analyses.list.excel');
    Route::get('research-output-status-analyses/list/pdf', [App\Http\Controllers\Admin\Gostaresh\ResearchOutputStatusAnalysisController::class, 'listPDFExport'])->name('research-output-status-analyses.list.pdf');
    Route::get('research-output-status-analyses/list/print', [App\Http\Controllers\Admin\Gostaresh\ResearchOutputStatusAnalysisController::class, 'listPrintExport'])->name('research-output-status-analyses.list.print');

    // Table 36,37 Route
    Route::resource('international-research', InternationalResearchStatusAnalysisController::class)->names('international-research');
    Route::get('international-research/list/excel', [App\Http\Controllers\Admin\Gostaresh\InternationalResearchStatusAnalysisController::class, 'listExcelExport'])->name('international-research.list.excel');
    Route::get('international-research/list/pdf', [App\Http\Controllers\Admin\Gostaresh\InternationalResearchStatusAnalysisController::class, 'listPDFExport'])->name('international-research.list.pdf');
    Route::get('international-research/list/print', [App\Http\Controllers\Admin\Gostaresh\InternationalResearchStatusAnalysisController::class, 'listPrintExport'])->name('international-research.list.print');

    // Table 38 Route
    Route::resource('amount-of-facilities', AmountOfFacilitiesController::class)->names('amount-of-facilities');
    Route::get('amount-of-facilities/list/excel', [App\Http\Controllers\Admin\Gostaresh\AmountOfFacilitiesController::class, 'listExcelExport'])->name('amount-of-facilities.list.excel');
    Route::get('amount-of-facilities/list/pdf', [App\Http\Controllers\Admin\Gostaresh\AmountOfFacilitiesController::class, 'listPDFExport'])->name('amount-of-facilities.list.pdf');
    Route::get('amount-of-facilities/list/print', [App\Http\Controllers\Admin\Gostaresh\AmountOfFacilitiesController::class, 'listPrintExport'])->name('amount-of-facilities.list.print');

    // Table 39 Route
    Route::resource('innovation-infrastructures', InnovationInfrastructureController::class)->names('innovation-infrastructures');
    Route::get('innovation-infrastructures/list/excel', [App\Http\Controllers\Admin\Gostaresh\InnovationInfrastructureController::class, 'listExcelExport'])->name('innovation-infrastructures.list.excel');
    Route::get('innovation-infrastructures/list/pdf', [App\Http\Controllers\Admin\Gostaresh\InnovationInfrastructureController::class, 'listPDFExport'])->name('innovation-infrastructures.list.pdf');
    Route::get('innovation-infrastructures/list/print', [App\Http\Controllers\Admin\Gostaresh\InnovationInfrastructureController::class, 'listPrintExport'])->name('innovation-infrastructures.list.print');

    // Table 40 Route
    Route::resource('technological-product', TechnologicalProductController::class)->names('technological-product');
    Route::get('technological-product/list/excel', [App\Http\Controllers\Admin\Gostaresh\TechnologicalProductController::class, 'listExcelExport'])->name('technological-product.list.excel');
    Route::get('technological-product/list/pdf', [App\Http\Controllers\Admin\Gostaresh\TechnologicalProductController::class, 'listPDFExport'])->name('technological-product.list.pdf');
    Route::get('technological-product/list/print', [App\Http\Controllers\Admin\Gostaresh\TechnologicalProductController::class, 'listPrintExport'])->name('technological-product.list.print');

    // Table 41 Route
    Route::resource('international-technology', InternationalTechnologyController::class)->names('international-technology');
    Route::get('international-technology/list/excel', [App\Http\Controllers\Admin\Gostaresh\InternationalTechnologyController::class, 'listExcelExport'])->name('international-technology.list.excel');
    Route::get('international-technology/list/pdf', [App\Http\Controllers\Admin\Gostaresh\InternationalTechnologyController::class, 'listPDFExport'])->name('international-technology.list.pdf');
    Route::get('international-technology/list/print', [App\Http\Controllers\Admin\Gostaresh\InternationalTechnologyController::class, 'listPrintExport'])->name('international-technology.list.print');

    // Table 42 Route
    Route::resource('cultural-indicators', CulturalIndicatorsController::class)->names('cultural-indicators');
    Route::get('cultural-indicators/list/excel', [App\Http\Controllers\Admin\Gostaresh\CulturalIndicatorsController::class, 'listExcelExport'])->name('cultural-indicators.list.excel');
    Route::get('cultural-indicators/list/pdf', [App\Http\Controllers\Admin\Gostaresh\CulturalIndicatorsController::class, 'listPDFExport'])->name('cultural-indicators.list.pdf');
    Route::get('cultural-indicators/list/print', [App\Http\Controllers\Admin\Gostaresh\CulturalIndicatorsController::class, 'listPrintExport'])->name('cultural-indicators.list.print');

    // Table 43 Route
    Route::resource('social-health', SocialHealthController::class)->names('social-health');
    Route::get('social-health/list/excel', [App\Http\Controllers\Admin\Gostaresh\SocialHealthController::class, 'listExcelExport'])->name('social-health.list.excel');
    Route::get('social-health/list/pdf', [App\Http\Controllers\Admin\Gostaresh\SocialHealthController::class, 'listPDFExport'])->name('social-health.list.pdf');
    Route::get('social-health/list/print', [App\Http\Controllers\Admin\Gostaresh\SocialHealthController::class, 'listPrintExport'])->name('social-health.list.print');

    // Table 44 Route
    Route::resource('organizational-culture', OrganizationalCultureController::class)->names('organizational-culture');
    Route::get('organizational-culture/list/excel', [App\Http\Controllers\Admin\Gostaresh\OrganizationalCultureController::class, 'listExcelExport'])->name('organizational-culture.list.excel');
    Route::get('organizational-culture/list/pdf', [App\Http\Controllers\Admin\Gostaresh\OrganizationalCultureController::class, 'listPDFExport'])->name('organizational-culture.list.pdf');
    Route::get('organizational-culture/list/print', [App\Http\Controllers\Admin\Gostaresh\OrganizationalCultureController::class, 'listPrintExport'])->name('organizational-culture.list.print');

    // Table 45 Route
    Route::resource('employee-profile', EmployeeProfileController::class)->names('employee-profile');
    Route::get('employee-profile/list/excel', [App\Http\Controllers\Admin\Gostaresh\EmployeeProfileController::class, 'listExcelExport'])->name('employee-profile.list.excel');
    Route::get('employee-profile/list/pdf', [App\Http\Controllers\Admin\Gostaresh\EmployeeProfileController::class, 'listPDFExport'])->name('employee-profile.list.pdf');
    Route::get('employee-profile/list/print', [App\Http\Controllers\Admin\Gostaresh\EmployeeProfileController::class, 'listPrintExport'])->name('employee-profile.list.print');

    // Table 46 Route
    Route::resource('percapita-status-analyses', PercapitaStatusAnalysesController::class)->names('percapita-status-analyses');
    Route::get('percapita-status-analyses/list/excel', [App\Http\Controllers\Admin\Gostaresh\PercapitaStatusAnalysesController::class, 'listExcelExport'])->name('percapita-status-analyses.list.excel');
    Route::get('percapita-status-analyses/list/pdf', [App\Http\Controllers\Admin\Gostaresh\PercapitaStatusAnalysesController::class, 'listPDFExport'])->name('percapita-status-analyses.list.pdf');
    Route::get('percapita-status-analyses/list/print', [App\Http\Controllers\Admin\Gostaresh\PercapitaStatusAnalysesController::class, 'listPrintExport'])->name('percapita-status-analyses.list.print');

    // Table 47 Route
    Route::resource('asset-productivity', AssetProductivityController::class)->names('asset-productivity');
    Route::get('asset-productivity/list/excel', [App\Http\Controllers\Admin\Gostaresh\AssetProductivityController::class, 'listExcelExport'])->name('asset-productivity.list.excel');
    Route::get('asset-productivity/list/pdf', [App\Http\Controllers\Admin\Gostaresh\AssetProductivityController::class, 'listPDFExport'])->name('asset-productivity.list.pdf');
    Route::get('asset-productivity/list/print', [App\Http\Controllers\Admin\Gostaresh\AssetProductivityController::class, 'listPrintExport'])->name('asset-productivity.list.print');

    // Table 48 Route
    Route::resource('revenue-status-analyses', RevenueStatusAnalysesController::class)->names('revenue-status-analyses');
    Route::get('revenue-status-analyses/list/excel', [App\Http\Controllers\Admin\Gostaresh\RevenueStatusAnalysesController::class, 'listExcelExport'])->name('revenue-status-analyses.list.excel');
    Route::get('revenue-status-analyses/list/pdf', [App\Http\Controllers\Admin\Gostaresh\RevenueStatusAnalysesController::class, 'listPDFExport'])->name('revenue-status-analyses.list.pdf');
    Route::get('revenue-status-analyses/list/print', [App\Http\Controllers\Admin\Gostaresh\RevenueStatusAnalysesController::class, 'listPrintExport'])->name('revenue-status-analyses.list.print');

    // Table 49 Route
    Route::resource('revenue-changes', RevenueChangesController::class)->names('revenue-changes');
    Route::get('revenue-changes/list/excel', [App\Http\Controllers\Admin\Gostaresh\RevenueChangesController::class, 'listExcelExport'])->name('revenue-changes.list.excel');
    Route::get('revenue-changes/list/pdf', [App\Http\Controllers\Admin\Gostaresh\RevenueChangesController::class, 'listPDFExport'])->name('revenue-changes.list.pdf');
    Route::get('revenue-changes/list/print', [App\Http\Controllers\Admin\Gostaresh\RevenueChangesController::class, 'listPrintExport'])->name('revenue-changes.list.print');

    // Table 50 Route
    Route::resource('tuition-income', TuitionIncomeController::class)->names('tuition-income');
    Route::get('tuition-income/list/excel', [App\Http\Controllers\Admin\Gostaresh\TuitionIncomeController::class, 'listExcelExport'])->name('tuition-income.list.excel');
    Route::get('tuition-income/list/pdf', [App\Http\Controllers\Admin\Gostaresh\TuitionIncomeController::class, 'listPDFExport'])->name('tuition-income.list.pdf');
    Route::get('tuition-income/list/print', [App\Http\Controllers\Admin\Gostaresh\TuitionIncomeController::class, 'listPrintExport'])->name('tuition-income.list.print');

    // Table 51 Route
    Route::resource('percapita-revenue', PercapitaRevenueController::class)->names('percapita-revenue');
    Route::get('percapita-revenue/list/excel', [App\Http\Controllers\Admin\Gostaresh\PercapitaRevenueController::class, 'listExcelExport'])->name('percapita-revenue.list.excel');
    Route::get('percapita-revenue/list/pdf', [App\Http\Controllers\Admin\Gostaresh\PercapitaRevenueController::class, 'listPDFExport'])->name('percapita-revenue.list.pdf');
    Route::get('percapita-revenue/list/print', [App\Http\Controllers\Admin\Gostaresh\PercapitaRevenueController::class, 'listPrintExport'])->name('percapita-revenue.list.print');

    // Table 52,53 Route
    Route::resource('university-costs', UniversityCostsController::class)->names('university-costs');
    Route::get('university-costs/list/excel', [App\Http\Controllers\Admin\Gostaresh\UniversityCostsController::class, 'listExcelExport'])->name('university-costs.list.excel');
    Route::get('university-costs/list/pdf', [App\Http\Controllers\Admin\Gostaresh\UniversityCostsController::class, 'listPDFExport'])->name('university-costs.list.pdf');
    Route::get('university-costs/list/print', [App\Http\Controllers\Admin\Gostaresh\UniversityCostsController::class, 'listPrintExport'])->name('university-costs.list.print');


    // Table 53 Route
    Route::resource('university-costs-per-unit', App\Http\Controllers\Admin\Gostaresh\UniversityCostsPerUnitController::class)->names('university-costs-per-unit');
    Route::get('university-costs-per-unit/list/excel', [App\Http\Controllers\Admin\Gostaresh\UniversityCostsPerUnitController::class, 'listExcelExport'])->name('university-costs-per-unit.list.excel');
    Route::get('university-costs-per-unit/list/pdf', [App\Http\Controllers\Admin\Gostaresh\UniversityCostsPerUnitController::class, 'listPDFExport'])->name('university-costs-per-unit.list.pdf');
    Route::get('university-costs-per-unit/list/print', [App\Http\Controllers\Admin\Gostaresh\UniversityCostsPerUnitController::class, 'listPrintExport'])->name('university-costs-per-unit.list.print');

    // Table 54 Route
    Route::resource('cost-changes-trends', CostChangesTrendsController::class)->names('cost-changes-trends');
    Route::get('cost-changes-trends/list/excel', [App\Http\Controllers\Admin\Gostaresh\CostChangesTrendsController::class, 'listExcelExport'])->name('cost-changes-trends.list.excel');
    Route::get('cost-changes-trends/list/pdf', [App\Http\Controllers\Admin\Gostaresh\CostChangesTrendsController::class, 'listPDFExport'])->name('cost-changes-trends.list.pdf');
    Route::get('cost-changes-trends/list/print', [App\Http\Controllers\Admin\Gostaresh\CostChangesTrendsController::class, 'listPrintExport'])->name('cost-changes-trends.list.print');

    // Table 55 Route
    Route::resource('cost-of-majors', CostOfMajorsController::class)->names('cost-of-majors');
    Route::get('cost-of-majors/list/excel', [App\Http\Controllers\Admin\Gostaresh\CostOfMajorsController::class, 'listExcelExport'])->name('cost-of-majors.list.excel');
    Route::get('cost-of-majors/list/pdf', [App\Http\Controllers\Admin\Gostaresh\CostOfMajorsController::class, 'listPDFExport'])->name('cost-of-majors.list.pdf');
    Route::get('cost-of-majors/list/print', [App\Http\Controllers\Admin\Gostaresh\CostOfMajorsController::class, 'listPrintExport'])->name('cost-of-majors.list.print');

    // Table 56 Route
    Route::resource('credit-and-asset', CreditAndAssetController::class)->names('credit-and-asset');
    Route::get('credit-and-asset/list/excel', [App\Http\Controllers\Admin\Gostaresh\CreditAndAssetController::class, 'listExcelExport'])->name('credit-and-asset.list.excel');
    Route::get('credit-and-asset/list/pdf', [App\Http\Controllers\Admin\Gostaresh\CreditAndAssetController::class, 'listPDFExport'])->name('credit-and-asset.list.pdf');
    Route::get('credit-and-asset/list/print', [App\Http\Controllers\Admin\Gostaresh\CreditAndAssetController::class, 'listPrintExport'])->name('credit-and-asset.list.print');

    // Table 57 Route
    Route::resource('units-general-status', UnitsGeneralStatusController::class)->names('units-general-status');
    Route::get('units-general-status/list/excel', [App\Http\Controllers\Admin\Gostaresh\UnitsGeneralStatusController::class, 'listExcelExport'])->name('units-general-status.list.excel');
    Route::get('units-general-status/list/pdf', [App\Http\Controllers\Admin\Gostaresh\UnitsGeneralStatusController::class, 'listPDFExport'])->name('units-general-status.list.pdf');
    Route::get('units-general-status/list/print', [App\Http\Controllers\Admin\Gostaresh\UnitsGeneralStatusController::class, 'listPrintExport'])->name('units-general-status.list.print');

    // Table 58 Route
    Route::resource('roadmap-desired', RoadmapDesiredController::class)->names('roadmap-desired');
    Route::get('roadmap-desired/list/excel', [App\Http\Controllers\Admin\Gostaresh\RoadmapDesiredController::class, 'listExcelExport'])->name('roadmap-desired.list.excel');
    Route::get('roadmap-desired/list/pdf', [App\Http\Controllers\Admin\Gostaresh\RoadmapDesiredController::class, 'listPDFExport'])->name('roadmap-desired.list.pdf');
    Route::get('roadmap-desired/list/print', [App\Http\Controllers\Admin\Gostaresh\RoadmapDesiredController::class, 'listPrintExport'])->name('roadmap-desired.list.print');
});
