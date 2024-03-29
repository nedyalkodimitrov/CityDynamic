<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class CompanyEmployee extends Model
{
    use HasFactory;

    public function getCompany()
    {
        return $this->belongsTo(Company::class, "company", "id");
    }
}
