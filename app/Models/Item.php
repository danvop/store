<?php

namespace App\Models;

use Vinkla\Hashids\Facades\Hashids;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class Item extends Model
{
    use HasFactory;

    protected $with = ['photos'];

    protected $fillable = [
        'name',
        'description',
        'store_id'
    ];


    public function store()
    {
        return $this->belongsTo(Store::class, 'store_id');
    }

    public function photos()
    {
        return $this->hasMany(Photo::class);
    }

    // public function user()
    // {
    //     return $this->belongsTo(User::class);
    // }

    // Add hashid attibute. Access by Store->hashid
    public function getHashidAttribute()
    {
        return Hashids::encode($this->attributes['id']);
    }
    //Add Route resolve binding by hashids
    public function resolveRouteBinding($value, $field = null)
    {
        return $this->findOrFail(Hashids::decode($value)[0]);
    }
}
