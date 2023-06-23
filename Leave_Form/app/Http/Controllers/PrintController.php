<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Employees;
use App\Models\DivisionChief;
use PDF;

// printing the forms
class PrintController extends Controller
{

    public function printform($id)
    {   
        $leave_form = Employees::find($id);


        //dagdagan ng data
        $data = [
            'Form' => $leave_form,
        ];

        $html = view("print.form", $data)->render();
        return PDF::loadHTML($html, "utf-8")->setPaper("legal", "portrait")->stream();
    }

    public function printformDC($id)
    {   
        $leave_form_division = DivisionChief::find($id);


        //dagdagan ng data
        $data = [
            'Form' => $leave_form_division,
        ];

        $html = view("print.form", $data)->render();
        return PDF::loadHTML($html, "utf-8")->setPaper("legal", "portrait")->stream();
    }
}
