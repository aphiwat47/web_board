<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
//use Illuminate\Notifications\Notifiable;

class Post extends Model
{
    use HasFactory ;

     /**
     * The attributes that are mass assignable.
     *
     * @var array<int, string>
     */
    protected $fillable = [
        'name',
        'email',
        'password',
        'is_admin',
        'path_pic_profile',
        'path_image',
        'first_name',
        'last_name',
        'date_of_birth',
    ];

}
