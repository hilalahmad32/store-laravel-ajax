<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Order extends Model
{
    use HasFactory;

    public function models()
    {
      return  $this->belongsTo(ModelAndBrand::class,'model_id');
    }
    public function brands()
    {
      return  $this->belongsTo(ModelAndBrand::class,'brand_id');
    }
}
