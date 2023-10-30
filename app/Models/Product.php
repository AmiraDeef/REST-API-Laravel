<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

/**
 * @method static create(array $all)
 * @method static find(string $id)
 */
class Product extends Model
{
    use HasFactory;
    protected $fillable=[
        'name','slug','description','price'
    ];
}
