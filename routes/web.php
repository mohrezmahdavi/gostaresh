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
    Route::resource('number/of/registrants/status/analysis', App\Http\Controllers\Admin\Gostaresh\NumberOfRegistrantsStatusAnalysisController::class)->names('number.of.registrants.status.analysis')->parameters([
        'analysis' => 'numberOfRegistrant'
    ]);

    // Table 21 Route
    Route::resource('annual/growth/rate/of/student/enrollment', App\Http\Controllers\Admin\Gostaresh\AnnualGrowthRateOfStudentEnrollmentController::class)->names('annual.growth.rate.of.student.enrollment')->parameters([
        'enrollment' => 'annualGrthRateOfStdnEnrollment'
    ]);

    // Table 22 Route
    Route::resource('average/test/score/of/the/first/thirty/percent/of/admitted', App\Http\Controllers\Admin\Gostaresh\AverageTestScoreOfTheFirstThirtyPercentOfAdmittedController::class)->names('average.test.score.of.the.first.thirty.percent.of.admitted')->parameters([
        'admitted' => 'avgTstScrOfFrtThrtPrntOfAdmitted'
    ]);

    // Table 23 Route
    Route::resource('average/test/score/of/the/last/five/percent/of/admitted', App\Http\Controllers\Admin\Gostaresh\AverageTestScoreOfTheLastFivePercentOfAdmittedController::class)->names('average.test.score.of.the.last.five.percent.of.admitted')->parameters([
        'admitted' => 'avgTstScOfLastFivePctOfAdmitted'
    ]);

    // Table 24 Route
    Route::resource('student/admission/capacity', App\Http\Controllers\Admin\Gostaresh\StudentAdmissionCapacityController::class)->names('student.admission.capacity')->parameters([
        'capacity' => 'studentAdmissionCapacity'
    ]);

    // Table 25 Route
    Route::resource('status/analysis/of/the/number/of/fields/of/study', App\Http\Controllers\Admin\Gostaresh\StatusAnalysisOfTheNumberOfFieldsOfStudyController::class)->names('status.analysis.of.the.number.of.fields.of.study')->parameters([
        'study' => 'stsAnlysOfTheNumOfFieldsOfStudy'
    ]);

    // Table 26, 27 Route
    Route::resource('number/of/non/medical/fields/of/study', App\Http\Controllers\Admin\Gostaresh\NumberOfNonMedicalFieldsOfStudyController::class)->names('number.of.non.medical.fields.of.study')->parameters([
        'study' => 'numberOfNonMedicalFieldsOfStudy'
    ]);

    // Table 28 Route
    Route::resource('status/analysis/of/the/number/of/course', App\Http\Controllers\Admin\Gostaresh\StatusAnalysisOfTheNumberOfCoursesController::class)->names('status.analysis.of.the.number.of.course')->parameters([
        'course' => 'statusAnalysisOfTheNumOfCourse'
    ]);

    // Table 29 Route
    Route::resource('number/of/international/course', App\Http\Controllers\Admin\Gostaresh\NumberOfInternationalCourseController::class)->names('number.of.international.course')->parameters([
        'course' => 'numberOfInternationalCourse'
    ]);

    // Table 30 Route
    Route::resource('international/student/growth/rate', App\Http\Controllers\Admin\Gostaresh\InternationalStudentGrowthRateController::class)->names('international.student.growth.rate')->parameters([
        'rate' => 'internationalStudentGrowthRate'
    ]);

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
