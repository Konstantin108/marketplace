<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class TestJsonOrder extends Model
{
    use HasFactory;

    /**
     * @var string
     */
    protected $table = "test_json_order";
    protected $guarded = [];
    protected $casts = [];
    protected $fillable = [
        'json_data'
    ];
}
