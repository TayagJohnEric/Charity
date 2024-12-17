<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Donor extends Model
{
    use HasFactory;

    protected $table = "donors";

    protected $fillable = ['name', 'email', 'contact_info'];

    public function donations()
    {
        return $this->hasMany(Donation::class);
    }
}