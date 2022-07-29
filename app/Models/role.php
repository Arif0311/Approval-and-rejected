<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class role extends Model
{
    use HasFactory;
    protected $table = 'roles';
    public $timestamps = false;
    protected $fillable = [
        'role_id',
        'role_name'
    ];

    public function User(){
        return $this->hasMany(User::class);
    }
    public function document(){
    	return $this->belongsTo(document::class);
    }
}
