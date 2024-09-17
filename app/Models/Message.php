<?php

namespace App\Models;
use Illuminate\Database\Eloquent\Relations\HasMany;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Message extends Model
{
    use HasFactory;
    public $fillable=['name','message','email','phone',];
    public static function countAllMessages(){
        $data = Message::count(); // Using Eloquent ORM
        return $data;
    }
}
