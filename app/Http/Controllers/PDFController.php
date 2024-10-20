<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\User;
use Barryvdh\DomPDF\Facade\Pdf;
use Illuminate\Support\Facades\Mail;

class PDFController extends Controller
{
    public function generatePDF()
    {

        $users = User::get();

        $data = [
            'title' => 'Datos de usuarios',
            'date' => date('m/d/Y'),
            'users' => $users
        ];
        $pdf = PDF::loadView('myPDF', $data);
        $pdfOutput = $pdf->output();
        Mail::send('emails.contactanos', [], function ($message) use ($pdfOutput) {
            $message->to('a23arapacmun@inspedralbes.cat')
                ->subject('Datos de Usuarios PDF')
                ->attachData($pdfOutput, 'documento.pdf', [
                    'mime' => 'application/pdf',
                ]);
        });

        return $pdf->stream('documento.pdf');
    }
}
