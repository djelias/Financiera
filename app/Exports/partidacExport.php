<?php

namespace App\Exports;

use App\Partidac;
use Illuminate\Contracts\View\View;
use Maatwebsite\Excel\Concerns\FromView;
use Maatwebsite\Excel\Concerns\Exportable;

class partidacExport implements FromView
{
	
    public function view(): View
    {
        return view('export.partidac', ['partidac' => Partidac::all()
    ]);
    }
}
