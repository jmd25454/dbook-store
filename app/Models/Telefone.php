<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Casts\Attribute;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Telefone extends Model
{
    use HasFactory;

    protected $fillable = ['phone_number'];


    protected function phoneNumber(): Attribute {
        return new Attribute(
            get: fn($value) => preg_replace('/([0-9]{2})([0-9]{4,5})([0-9]{4})/i', '($1) $2-$3', $value),
        );
    }
}
