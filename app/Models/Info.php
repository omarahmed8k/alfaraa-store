<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Info extends Model
{
    use HasFactory;
   
 protected $fillable = [
   'whatsapp', 'facebook','instagram','snapchat','phone','email','address','image'
                       ];
}
