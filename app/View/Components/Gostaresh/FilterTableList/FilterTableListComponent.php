<?php

namespace App\View\Components\Gostaresh\FilterTableList;

use Illuminate\View\Component;
use function view;

class FilterTableListComponent extends Component
{
    /**
     * Create a new component instance.
     *
     * @return void
     */
    public function __construct(public $yearSelectedList, public $filterColumnsCheckBoxes = [])
    {
        //
    }

    /**
     * Get the view / contents that represent the component.
     *
     * @return \Illuminate\Contracts\View\View|\Closure|string
     */
    public function render()
    {
        return view('components.gostaresh.filter-table-list.filter-table-list-component');
    }
}
