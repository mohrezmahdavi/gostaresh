<?php

namespace App\Http\Controllers\Admin\Gostaresh;

use App\Exports\Gostaresh\TuitionIncome\ListExport;
use App\Http\Controllers\Controller;
use App\Http\Requests\Gostaresh\TuitionIncome\TuitionIncomeRequest;
use App\Models\Index\AverageTuitionIncome;
use Illuminate\Http\Response;
use Illuminate\Support\Facades\Auth;
use Maatwebsite\Excel\Facades\Excel;
use PDF;


// Table 50 Controller
class TuitionIncomeController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return Response
     */
    public function index()
    {
        $this->authorize("view-any-AverageTuitionIncome");

        $query = AverageTuitionIncome::whereRequestsQuery();

        $filterColumnsCheckBoxes = AverageTuitionIncome::$filterColumnsCheckBoxes;

        $yearSelectedList = $this->yearSelectedList(clone $query);

        $query = filterByOwnProvince($query);

        $tuitionIncome = $query->orderBy('id', 'desc')->paginate(20);

        return view('admin.gostaresh.tuition-income.list.list', compact('tuitionIncome'
            , 'yearSelectedList', 'filterColumnsCheckBoxes'
        ));
    }

    private function yearSelectedList($query)
    {
        return $query->select('year')->distinct()->pluck('year');
    }

    // ****************** Export ******************
    private function getRevenueChangesRecords()
    {
        return AverageTuitionIncome::whereRequestsQuery()->orderBy('id', 'desc')->get();
    }

    public function listExcelExport()
    {
        $tuitionIncomes = $this->getRevenueChangesRecords();
        return Excel::download(new ListExport($tuitionIncomes), 'invoices.xlsx');
    }

    public function listPDFExport()
    {
        $tuitionIncomes = $this->getRevenueChangesRecords();
        $pdfFile = PDF::loadView('admin.gostaresh.tuition-income.list.pdf', compact('tuitionIncomes'));
        return $pdfFile->download('export-pdf.pdf');
    }

    public function listPrintExport()
    {
        $tuitionIncomes = $this->getRevenueChangesRecords();
        return view('admin.gostaresh.tuition-income.list.pdf', compact('tuitionIncomes'));
    }
    // ****************** End Export ******************

    /**
     * Show the form for creating a new resource.
     *
     * @return Response
     */
    public function create()
    {
        $this->authorize("create-any-AverageTuitionIncome");

        return view('admin.gostaresh.tuition-income.create.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param TuitionIncomeRequest $request
     * @return Response
     */
    public function store(TuitionIncomeRequest $request)
    {
        $this->authorize("create-any-AverageTuitionIncome");

        AverageTuitionIncome::create(array_merge(['user_id' => Auth::id()], $request->validated()));
        return redirect()->back()->with('success', __('titles.success_store'));
    }

    /**
     * Display the specified resource.
     *
     * @param AverageTuitionIncome $tuitionIncome
     * @return void
     */
    public function show(AverageTuitionIncome $tuitionIncome)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param AverageTuitionIncome $tuitionIncome
     * @return Response
     */
    public function edit(AverageTuitionIncome $tuitionIncome)
    {
        $this->authorize("edit-any-AverageTuitionIncome");

        return view(
            'admin.gostaresh.tuition-income.edit.edit', compact('tuitionIncome'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param TuitionIncomeRequest $request
     * @param AverageTuitionIncome $tuitionIncome
     * @return Response
     */
    public function update(TuitionIncomeRequest $request, AverageTuitionIncome $tuitionIncome)
    {
        $this->authorize("edit-any-AverageTuitionIncome");

        $tuitionIncome->update($request->validated());

        return back()->with('success', __('titles.success_update'));
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param AverageTuitionIncome $tuitionIncome
     * @return Response
     */
    public function destroy(AverageTuitionIncome $tuitionIncome)
    {
        $this->authorize("delete-any-AverageTuitionIncome");

        $tuitionIncome->delete();
        return back()->with('success', __('titles.success_delete'));
    }
}
