<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class document_detail extends Model
{
    use HasFactory;
    protected $table = 'document_details';
    public $timestamps = false;
    protected $fillable = [
        'document_no',
        'nama_nasabah',
        'amount'
    ];
    public function documentDetaill(){
        return $this->hasMany(document::class);
    }
}
