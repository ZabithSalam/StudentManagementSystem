<?php

namespace App\Http\Controllers;

use App\Models\User;
use App\Models\Marks;
use Illuminate\Http\Request;
use App\Models\AssignSubject;
use Barryvdh\DomPDF\Facade\Pdf;

class PdfGeneratorController extends Controller
{
    public function subjectpdfGenerate(){

        $pdf = Pdf::loadView('pdf.enrolled-subjects');
        return $pdf->download('enrolled-subjects.pdf');

    }
    public function markspdfGenerate(User $user){

        $marks = Marks::latest()->get();

        $pdf = Pdf::loadView('pdf.marks',[
            'marks' => $marks,
            'user' => $user
        ]);
        return $pdf->download('marks.pdf');

    }
}
