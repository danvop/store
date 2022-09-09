<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Photo extends Model
{
    use HasFactory;

    public function Item()
    {
        return $this->belongsTo(Item::class);
    }

    public function GetName()
    {
        $extension = explode('/', $this->path);

        return end($extension);
    }
}
