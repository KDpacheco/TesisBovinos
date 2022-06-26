<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Redirect;
use App\User;


class UserController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth');
    }

    public function index(Request $request)
    {
        if(request()->ajax())
        {
            $user = User::get();
            return datatables()
            ->of($user)
            ->addColumn('pdf', function($pdf){
                return '<a href="' . route('muerte.individual', $pdf->id) . '">
                <button class="btn btn-danger btn-sm" data-toggle="tooltip" data-placement="top"
                    title="Informe del parto"><i class="mdi mdi-file-pdf"></i>
                </button></a>
                <a href="' . route('muertes.edit', $pdf->id) . '">
                <button class="btn btn-info btn-sm" data-toggle="tooltip" data-placement="top"
                        title="editar"><i class="ti-pencil"></i>
                    </button></a>';
            })
            ->rawColumns(['pdf'])
            ->make(true);
        }
        
        return view('usuarios.index');
    }

    public function create()
    {
        return view("usuarios.register");
    }
}
