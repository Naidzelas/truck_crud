<?php

namespace App\Http\Controllers\Transports;

use App\Models\Transports\Transport;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Carbon;

class TransportController extends Controller
{
    protected string $model = Transport::class;

    public function index(Request $request, Transport $transport)
    {
        $trucks = $transport::with('truckSubUnits')->get();

        return view('transports.index', compact([
            'request',
            'trucks'
        ]));
    }
    public function create(Request $request, Transport $transport)
    {
        if (
            $request->year < 1900
            || $request->year > Carbon::now()->add(5, 'days')->year) 
        {
            return redirect('transports')->with('error', 'Wrong date');
        }

        $validated = $this->validate($request, [
            'unit_number' => 'required|string',
            'year' => 'required|int',
        ]);

        $transport->fill($validated)->save();
        return view('transports.index');

    }
    public function update(Request $request, Transport $transport)
    {
        $this->validate($request, [
            'unit_number' => 'required|string',
            'year' => 'required|int',
            'notes' => 'text',
        ]);

        $transport->fill($request->validated())->save();
        return view('transports.index');

    }
    public function store(Request $request, Transport $transport)
    {
        return view('transports.index');
    }

    public function destroy(Request $request, Transport $transport)
    {
        $transport->delete();
    }
}