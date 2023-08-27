<?php

namespace App\Exports;

use App\LibCompras;
use App\Contribuyentes;
use Illuminate\Contracts\View\View;
use Maatwebsite\Excel\Concerns\FromView;
use Maatwebsite\Excel\Concerns\Exportable;

class libcomprasExport implements FromView
{
	
    public function view(): View
    {
        return view('export.libcompras', ['libcompras' => Libcompras::all(),'contribuyentes' => Contribuyentes::all()
    ]);
    }
}
