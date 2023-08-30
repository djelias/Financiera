<?php



namespace App\Http\Controllers;

use Illuminate\Http\Request;

use PDF;



class PruebaController extends Controller

{

    /**

     * Display a listing of the resource.

     *

     * @return \Illuminate\Http\Response

     */

    public function generatePDF()

    {

        $data = ['title' => 'Esta es una página de Prueba'];

        $pdf = PDF::loadView('myPDF', $data);



        return $pdf->stream('hdtuto.pdf');

    }

}