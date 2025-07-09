<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Workers extends Model
{
    use HasFactory;

    protected $fillable = [
        'name',
        'last_name',
        'extension',
        'management_id'
    ];

        public function management(){
        
        return $this->belongsTo(Management::class, 'management_id');
        
    }
}
