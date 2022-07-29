<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class document extends Model
{
    use HasFactory;
    protected $table = 'documents';
    protected $fillable = [
        'document_no',
        'document_subject',
        'status',
        'remark',
        'update_by',
        'created_by'
    ];
    public function Document(){
        return $this->hasMany(User::class);
    }
    public function documentDetai(){
    	return $this->belongsTo(document_detail::class);
    }
}
