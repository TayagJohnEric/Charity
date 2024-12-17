<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Campaign extends Model
{
    use HasFactory;
    
    protected $table = "campaigns";

    protected $fillable = ['title', 'description', 'start_date', 'end_date', 'goal_amount'];

    public function donations()
    {
        return $this->hasMany(Donation::class);
    }
}
