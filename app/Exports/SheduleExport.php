<?php

namespace App\Exports;

use Illuminate\Contracts\View\View;
use Maatwebsite\Excel\Concerns\FromView;

class SheduleExport implements FromView
{

    public $data;

    public function __construct($data)
    {
        $this->data = $data;
    }
    /**
    * @return \Illuminate\Support\Collection
    */
    public function view() : view
    {
        return view('exports.shedules', [
            'shedules' => $this->data
        ]);
    }
}
