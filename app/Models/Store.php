<?php

namespace App\Models;

use Vinkla\Hashids\Facades\Hashids;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class Store extends Model
{
    use HasFactory;
    // use \RecursiveRelationships\Traits\HasRecursiveRelationships; //it is needed to use Recurseve Relations

    //https://github.com/paxha/laravel-recursive-relationships

    // protected $with = ['items'];

    //code example
    //https://laraveldaily.com/eloquent-recursive-hasmany-relationship-with-unlimited-subcategories/

    protected $fillable = [
        'name',
        'description',
        'user_id'
    ];


    public function stores()
    {
        return $this->hasMany(Store::class, 'parent_id');
    }

    public function childrenStores()
    {
        return $this->hasMany(Store::class, 'parent_id')->with('stores','items');
        // return $this->hasMany(Store::class, 'parent_id');
    }

    public function user()
    {
        return $this->belongsTo(User::class);
    }

    public function items()
    {
        return $this->hasMany(Item::class);
    }
    // public function photos()
    // {
    //     return $this->hasManyThrough(Photo::class, Item::class);
    // }

    //https://stackoverflow.com/questions/45997680/laravel-get-all-parents-of-category
    public function parent()
    {
        //without('items') to disable eager loading
        return $this->belongsTo(Store::class, 'parent_id');
        // return $this->belongsTo(Store::class, 'parent_id');
    }

    public function getParentsAttribute()
    {
        $parents = collect([]);

        $parent = $this->parent;

        while(!is_null($parent)) {
            $parents->push($parent);
            $parent = $parent->parent;
        }

        return $parents->reverse();
    }

    public function getParentsNames() {
        if($this->parent) {
            return $this->parent->getParentsNames(). " > " . $this->name;
        } else {
            return $this->name;
        }
    }
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
