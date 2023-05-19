<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class category extends Model
{

    protected $table = "category";


    public function showForm()
{
    $categories = category::all();

    return view('nama', compact('categories'));
}
    public function products()
    {
        return $this->hasMany(Produk::class);
    }
}