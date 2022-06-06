<?php
  
namespace App\Models;
  
use App\Models\Traits\HasHashedMediaTrait;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
  
class Test extends Model
{
    use HasFactory;
    use HasHashedMediaTrait;
  
    protected $fillable = [
        'name', 'detail'
    ];
}