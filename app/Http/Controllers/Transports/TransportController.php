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
        $trucks = $transport::query()->get();

        return view("transports.index", compact('trucks'));
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
            'notes' => 'string',
        ]);

        $transport->fill($validated)->save();
        return redirect('transports');

    }
    public function update(Request $request, Transport $transport)
    {
        $this->validate($request, [
            'unit_number' => 'required|string',
            'year' => 'required|int',
            'notes' => 'text',
        ]);

        $transport->fill($request->validated())->save();
        return redirect('transports');

    }
    public function store(Request $request, Transport $transport)
    {
        return redirect('transports');
    }

    public function destroy(Request $request, Transport $transport)
    {
        $transport->delete();
    }
}