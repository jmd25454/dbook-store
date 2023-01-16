<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Casts\Attribute;

class Customer extends Model
{
    use HasFactory;

    protected $fillable = ['name', 'email'];

    protected function email(): Attribute {
        return new Attribute(
            get: fn($value) => !filter_var($value, FILTER_VALIDATE_EMAIL) ? '-' : $value,
        );
    }

    public function phones(){
        return $this->hasMany(Telefone::class);
    }
}
