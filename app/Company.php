<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Company extends Model
{
    protected $table = 'companies';
    protected $primaryKey = 'id';

    protected $fillable = [
        'id',
        'name',
        'email',
        'logo',
        'website',
    ];

    public function employee()
    {
        return $this->hasMany(Employee::class);
    }
}
