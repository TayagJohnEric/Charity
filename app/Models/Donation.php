<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Donation extends Model
{
    use HasFactory;

    protected $table = "donations";

    protected $fillable = ['donor_id', 'campaign_id', 'amount', 'donation_date'];

    public function donor()
    {
        return $this->belongsTo(Donor::class);
    }

    public function campaign()
    {
        return $this->belongsTo(Campaign::class);
    }
}
