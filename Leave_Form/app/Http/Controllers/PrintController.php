<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Employees;
use PDF;

// printing the forms
class PrintController extends Controller
{

    public function printform($id)
    {
        $leave_form = Employees::find($id);
        $data = [
            'Form' => $leave_form,
        ];

        $html = view("print.form", $data)->render();
        return PDF::loadHTML($html, "utf-8")->setPaper("long", "portrait")->stream();
    }
}
