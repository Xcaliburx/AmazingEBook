<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;

class Account extends Authenticatable
{
    use HasFactory, Notifiable;

    protected $table = 'accounts';
    protected $primaryKey = 'account_id';
    public $incrementing = false;

    protected $fillable = [
        'account_id', 'role_id', 'gender_id', 'first_name', 'middle_name', 'last_name', 'email','password',
        'display_picture_link', 'delete_flag', 'modified_at', 'modified_by'
    ];

    protected $hidden = [
        'password',
        'remember_token',
    ];

}
