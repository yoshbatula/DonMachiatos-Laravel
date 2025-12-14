<?php
namespace App\Models;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Carts extends Model
{
    use HasFactory;

    protected $table = '_carts';
    protected $primaryKey = 'CartID';
    public $incrementing = true; 
    
    public $timestamps = true; 

    protected $fillable = [
        'productID',
        'productPrice',
        'productSize',
        'productName',
        'productQuantity',
        'productImage',
        'productMood',
        'productSugar',
    ];
    
    protected $casts = [
        'productPrice' => 'decimal:2',
        'productQuantity' => 'integer',
    ];
}