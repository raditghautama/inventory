<?php

namespace App\Http\Controllers;

use App\Models\Employee;
use App\Models\Sell;
use Illuminate\Http\Request;

class ReportController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $sells = Sell::all();
        $employees = Employee::all();


        return view('pages.report.index', [
            'sells' => $sells,
            'employees' => $employees ,
            'title' => 'Transaction'
        ]);
    }

    public function filter(Request $request)
    {
        $employees = Employee::all();
        $items = Sell::whereMonth('tgl_sell', $request->bulan)
            ->whereYear('tgl_sell', $request->tahun)
            ->get();

            return view('pages.report.index', [
                'sells' => $items,
            'employees' => $employees ,
                'bulan' => $request->bulan,
                'tahun' => $request->tahun,
            ]);
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        //
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        //
    }
}
