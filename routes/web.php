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

    // Table 18 Route
    Route::resource('number/of/volunteers/status/analysis', App\Http\Controllers\Admin\Gostaresh\NumberOfVolunteersStatusAnalysisController::class)->names('number.of.volunteers.status.analysis')->parameters([
        'analysis' => 'numberOfVolunteersStatusAnalysis'
    ]);

    // Table 19 Route
    Route::resource('number/of/admissions/status/analysis', App\Http\Controllers\Admin\Gostaresh\NumberOfAdmissionsStatusAnalysisController::class)->names('number.of.admissions.status.analysis')->parameters([
        'analysis' => 'numberOfAdmissionsStatusAnalysis'
    ]);

    // Table 20 Route
    Route::resource('number/of/admissions/status/analysis', App\Http\Controllers\Admin\Gostaresh\NumberOfAdmissionsStatusAnalysisController::class)->names('number.of.admissions.status.analysis')->parameters([
        'analysis' => 'numberOfAdmissionsStatusAnalysis'
    ]);

    // Table 21 Route
    Route::resource('annual/growth/rate/of/student/enrollment', App\Http\Controllers\Admin\Gostaresh\AnnualGrowthRateOfStudentEnrollmentController::class)->names('annual.growth.rate.of.student.enrollment')->parameters([
        'enrollment' => 'annualGrowthRateOfStudentEnrollment'
    ]);

    // Table 22 Route
    Route::resource('average/test/score/of/the/first/thirty/percent/of/admitted', App\Http\Controllers\Admin\Gostaresh\AverageTestScoreOfTheFirstThirtyPercentOfAdmittedController::class)->names('average.test.score.of.the.first.thirty.percent.of.admitted')->parameters([
        'admitted' => 'averageTestScoreOfTheFirstThirtyPercentOfAdmitted'
    ]);

    // Table 23 Route
    Route::resource('average/test/score/of/the/last/five/percent/of/admitted', App\Http\Controllers\Admin\Gostaresh\AverageTestScoreOfTheLastFivePercentOfAdmittedController::class)->names('average.test.score.of.the.last.five.percent.of.admitted')->parameters([
        'admitted' => 'averageTestScoreOfTheLastFivePercentOfAdmitted'
    ]);

    // Table 24 Route
    Route::resource('student/admission/capacity', App\Http\Controllers\Admin\Gostaresh\StudentAdmissionCapacityController::class)->names('student.admission.capacity')->parameters([
        'admitted' => 'studentAdmissionCapacity'
    ]);

    // Table 25 Route
    Route::resource('status/analysis/of/the/number/of/fields/of/study', App\Http\Controllers\Admin\Gostaresh\StatusAnalysisOfTheNumberOfFieldsOfStudyController::class)->names('status.analysis.of.the.number.of.fields.of.study')->parameters([
        'study' => 'statusAnalysisOfTheNumberOfFieldsOfStudy'
    ]);

    // Table 26, 27 Route
    Route::resource('number/of/non/medical/fields/of/study', App\Http\Controllers\Admin\Gostaresh\NumberOfNonMedicalFieldsOfStudyController::class)->names('number.of.non.medical.fields.of.study')->parameters([
        'study' => 'numberOfNonMedicalFieldsOfStudy'
    ]);

    // Table 28 Route
    Route::resource('status/analysis/of/the/number/of/course', App\Http\Controllers\Admin\Gostaresh\StatusAnalysisOfTheNumberOfCoursesController::class)->names('status.analysis.of.the.number.of.course')->parameters([
        'course' => 'statusAnalysisOfTheNumberOfCourse'
    ]);

    // Table 29 Route
    Route::resource('number/of/international/course', App\Http\Controllers\Admin\Gostaresh\NumberOfInternationalCourseController::class)->names('number.of.international.course')->parameters([
        'course' => 'numberOfInternationalCourse'
    ]);

    

    // Table 32 Route
    Route::resource('graduates-of-higher-education', GraduatesOfHigherEducationController::class)->names('graduates-of-higher-education');

    // Table 33 Route
    Route::resource('graduate-status-analyses', GraduateStatusAnalysisController::class)->names('graduate-status-analyses');

    // Table 34 Route
    Route::resource('teachers-status-analyses', TeachersStatusAnalysisController::class)->names('teachers-status-analyses');

    // Table 35 Route
    Route::resource('research-output-status-analyses', ResearchOutputStatusAnalysisController::class)->names('research-output-status-analyses');

    // Table 36,37 Route
    Route::resource('international-research', InternationalResearchStatusAnalysisController::class)->names('international-research');

    // Table 38 Route
    Route::resource('amount-of-facilities', AmountOfFacilitiesController::class)->names('amount-of-facilities');

    // Table 39 Route
    Route::resource('innovation-infrastructures', InnovationInfrastructureController::class)->names('innovation-infrastructures');

    // Table 40 Route
    Route::resource('technological-product', TechnologicalProductController::class)->names('technological-product');

    // Table 41 Route
    Route::resource('international-technology', InternationalTechnologyController::class)->names('international-technology');

    // Table 42 Route
    Route::resource('cultural-indicators', CulturalIndicatorsController::class)->names('cultural-indicators');

    // Table 43 Route
    Route::resource('social-health', SocialHealthController::class)->names('social-health');

    // Table 44 Route
    Route::resource('organizational-culture', OrganizationalCultureController::class)->names('organizational-culture');

    // Table 45 Route
    Route::resource('employee-profile', EmployeeProfileController::class)->names('employee-profile');

    // Table 46 Route
    Route::resource('percapita-status-analyses', PercapitaStatusAnalysesController::class)->names('percapita-status-analyses');

    // Table 47 Route
    Route::resource('asset-productivity', AssetProductivityController::class)->names('asset-productivity');

    // Table 48 Route
    Route::resource('revenue-status-analyses', RevenueStatusAnalysesController::class)->names('revenue-status-analyses');

    // Table 49 Route
    Route::resource('revenue-changes', RevenueChangesController::class)->names('revenue-changes');

    // Table 50 Route
    Route::resource('tuition-income', TuitionIncomeController::class)->names('tuition-income');

    // Table 51 Route
    Route::resource('percapita-revenue', PercapitaRevenueController::class)->names('percapita-revenue');

    // Table 52,53 Route
    Route::resource('university-costs', UniversityCostsController::class)->names('university-costs');

    // Table 54 Route
    Route::resource('cost-changes-trends', CostChangesTrendsController::class)->names('cost-changes-trends');

    // Table 55 Route
    Route::resource('cost-of-majors', CostOfMajorsController::class)->names('cost-of-majors');

    // Table 56 Route
    Route::resource('credit-and-asset', CreditAndAssetController::class)->names('credit-and-asset');

    // Table 57 Route
    Route::resource('units-general-status', UnitsGeneralStatusController::class)->names('units-general-status');

    // Table 58 Route
    Route::resource('roadmap-desired', RoadmapDesiredController::class)->names('roadmap-desired');
});
