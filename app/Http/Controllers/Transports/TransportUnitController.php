<?php

namespace App\Http\Controllers\Transports;

use App\Models\Transports\TransportSubunit;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class TransportSubunitController extends Controller
{
    protected string $model = TransportSubunit::class;

    public function index(Request $request)
    { 
        return view('transports.index');
    }
    public function create(Request $request, TransportSubunit $transportSubunit)
    {
        $validated = $this->validate($request, [
            'main_truck' => 'required|string',
            'subunit' => 'required|string',
            'start_date' => 'required|date',
            'end_date' => 'required|date',
        ]);

        $transportSubunit->fill($validated)->save();
        return view('transports.index');

    }
    public function update(Request $request, TransportSubunit $transportSubunit)
    {
        $this->validate($request, [
            'main_truck' => 'string',
            'subunit' => 'string',
            'start_date' => 'datetime',
            'end_date' => 'datetime',
        ]);
       
        $transportSubunit->fill($request->validated())->save();
        return view('transports.index');

    }
    public function store(Request $request, TransportSubunit $transportSubunit)
    {
        return view('transports.index');
    }
}