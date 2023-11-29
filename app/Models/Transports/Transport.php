<?php
 
namespace App\Models\Transports;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\Relations\HasOne;
use Illuminate\Database\Eloquent\SoftDeletes;

class Transport extends Model
{
    use SoftDeletes;
    protected $table = 'cv.trucks';

    protected $fillable = [
        'unit_number',
        'year',
        'notes',
    ];

    public function truckSubUnits(): BelongsTo
    {
        return $this->BelongsTo(TransportSubunit::class, 'unit_number', 'main_truck');
    }
}