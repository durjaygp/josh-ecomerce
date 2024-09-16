<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class SupportMessage extends Model
{
    use HasFactory;

    protected $fillable = ['message', 'files', 'user_id', 'support_id'];

    public function user()
    {
        return $this->belongsTo(User::class,'user_id');
    }

}
