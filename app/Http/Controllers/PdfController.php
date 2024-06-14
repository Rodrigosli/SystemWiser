<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Cadastros\Cliente;
use PDF;

class PdfController extends Controller
{
    public function geraPdf()
    {
       $Env= Cliente::all();
       $pdf = PDF::loadView('emails.teste',['Teste'=>"Rodrigo"]);
       return $pdf->setPaper('a4')->stream('nome_pdf.pdf');

    }
}
