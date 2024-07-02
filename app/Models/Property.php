<?php

namespace App\Models;
use Illuminate\Support\Str;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsToMany;
use Illuminate\Database\Eloquent\Builder;
use Illuminate\Database\Eloquent\SoftDeletes;

class Property extends Model
{
    use HasFactory;
   // use SoftDeletes;
    protected $fillable=[
        'title',
        'description',
         'surface',
        'rooms',
         'bedrooms',
         'floor',
         'price',
         'city',
         'address',
         'postal_code',
         'sold',

    ];
    //pour ajouter la relation Many to many
    public function options():BelongsToMany
    {
        return $this->belongsToMany(Option::class);
    }
    public function getSlug(): string
    {
        return Str::slug($this->title);
    }
    // en utilisant les scopes
    /*
    public function scopeAvailable(Builder $builder):Builder
    {
        return $builder->where('sold',false);
    }
    public function scopeRecent(Builder $builder):Builder
    {
        return $builder->orderBy('created_at','desc');
    }*/
    
}
