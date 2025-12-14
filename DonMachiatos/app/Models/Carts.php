<?php
namespace App\Models;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Carts extends Model
{
    use HasFactory;

    protected $table = '_carts';
    protected $primaryKey = 'CartID';
    public $incrementing = true; // If CartID is auto-incrementing
    
    // Add this if your table doesn't have timestamps
    public $timestamps = true; // Set to false if you don't have created_at/updated_at columns

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
    
    // Cast to proper types
    protected $casts = [
        'productPrice' => 'decimal:2',
        'productQuantity' => 'integer',
    ];
}