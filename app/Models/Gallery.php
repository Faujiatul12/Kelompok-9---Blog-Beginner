<?php
namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Gallery extends Model
{
    use HasFactory;

    protected $fillable = [
        'judul', 'deskripsi', 'gambar', 'kota', 'kategori'
    ];
    protected $table = 'galeri';

    public static function budayaTari()
    {
        return self::where('category', 'budaya-tari')->get();
    }
}

