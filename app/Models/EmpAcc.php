<?php
namespace App\Models;

use Illuminate\Foundation\Auth\EmpAcc as Authenticatable;
use Illuminate\Notifications\Notifiable;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class EmpAcc extends Authenticatable
{
    use HasFactory, Notifiable;

    // Specify the table name
    protected $table = 'emp_acc';

    protected $primaryKey = 'empid';
    public $incrementing = false; // Since empid is not auto-incrementing
    protected $keyType = 'string'; // Since empid is a string

    protected $fillable = [
        'empid',
        'empuser',
        'empmail',
        'emppass',
    ];

    protected $hidden = [
        'emppass',
        'remember_token',
    ];

    protected $casts = [
        'email_verified_at' => 'datetime',
    ];

    public function setPasswordAttribute($value)
    {
        $this->attributes['emppass'] = bcrypt($value);
    }
    
    public function getAuthPassword()
    {
        return $this->emppass;
    }
}