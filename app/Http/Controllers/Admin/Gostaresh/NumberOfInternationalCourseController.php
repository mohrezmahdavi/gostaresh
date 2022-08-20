<?php

namespace App\Http\Controllers\Admin\Gostaresh;

use App\Exports\Gostaresh\NumberOfInternationalCourse\ListExport;
use App\Http\Controllers\Controller;
use App\Http\Requests\Gostaresh\NumberOfInternationalCourse\NumberOfInternationalCourseRequest;
use App\Models\Index\NumberOfInternationalCourse;
use Illuminate\Http\Response;
use Illuminate\Support\Facades\Auth;
use Maatwebsite\Excel\Facades\Excel;
use PDF;

// Table 29 Controller
class NumberOfInternationalCourseController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return Response
     */
    public function index()
    {
        $this->authorize("view-any-NumberOfInternationalCourse");

        $query = NumberOfInternationalCourse::whereRequestsQuery();

        $filterColumnsCheckBoxes = NumberOfInternationalCourse::$filterColumnsCheckBoxes;

        $yearSelectedList = $this->yearSelectedList(clone $query);

        $numberOfInternationalCourses = $query->orderBy('id', 'desc')->paginate(20);

        return view('admin.gostaresh.number-of-international-course.list.list', compact('numberOfInternationalCourses', 'filterColumnsCheckBoxes', 'yearSelectedList'));
    }

    private function yearSelectedList($query)
    {
        return $query->select('year')->distinct()->pluck('year');
    }

    private function getNumberOfInternationalCourseRecords()
    {
        return NumberOfInternationalCourse::whereRequestsQuery()->orderBy('id', 'desc')->get();
    }

    public function listExcelExport()
    {
        $numberOfInternationalCourses = $this->getNumberOfInternationalCourseRecords();
        return Excel::download(new ListExport($numberOfInternationalCourses), 'invoices.xlsx');
    }

    public function listPDFExport()
    {
        $filterColumnsCheckBoxes = NumberOfInternationalCourse::$filterColumnsCheckBoxes;
        $numberOfInternationalCourses = $this->getNumberOfInternationalCourseRecords();
        $pdfFile = PDF::loadView('admin.gostaresh.number-of-international-course.list.pdf', compact('numberOfInternationalCourses', 'filterColumnsCheckBoxes'));
        return $pdfFile->download('export-pdf.pdf');
    }

    public function listPrintExport()
    {
        $filterColumnsCheckBoxes = NumberOfInternationalCourse::$filterColumnsCheckBoxes;
        $numberOfInternationalCourses = $this->getNumberOfInternationalCourseRecords();
        return view('admin.gostaresh.number-of-international-course.list.pdf', compact('numberOfInternationalCourses', 'filterColumnsCheckBoxes'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return Response
     */
    public function create()
    {
        $this->authorize("create-any-NumberOfInternationalCourse");

        return view('admin.gostaresh.number-of-international-course.create.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param NumberOfInternationalCourseRequest $request
     * @return Response
     */
    public function store(NumberOfInternationalCourseRequest $request)
    {
        $this->authorize("create-any-NumberOfInternationalCourse");

        NumberOfInternationalCourse::create(array_merge(['user_id' => Auth::id()], $request->validated()));

        return back()->with('success', __('titles.success_store'));
    }

    /**
     * Display the specified resource.
     *
     * @param int $id
     * @return Response
     */
    public function show(NumberOfInternationalCourse $numberOfInternationalCourse)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param int $id
     * @return Response
     */
    public function edit(NumberOfInternationalCourse $numberOfInternationalCourse)
    {
        $this->authorize("edit-any-NumberOfInternationalCourse");

        return view(
            'admin.gostaresh.number-of-international-course.edit.edit', compact('numberOfInternationalCourse'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param NumberOfInternationalCourseRequest $request
     * @param int $id
     * @return Response
     */
    public function update(NumberOfInternationalCourseRequest $request, NumberOfInternationalCourse $numberOfInternationalCourse)
    {
        $this->authorize("edit-any-NumberOfInternationalCourse");
        $numberOfInternationalCourse->update($request->validated());

        return back()->with('success', __('titles.success_update'));
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param int $id
     * @return Response
     */
    public function destroy(NumberOfInternationalCourse $numberOfInternationalCourse)
    {
        $this->authorize("delete-any-NumberOfInternationalCourse");
        $numberOfInternationalCourse->delete();
        return back()->with('success', __('titles.success_delete'));
    }
}
