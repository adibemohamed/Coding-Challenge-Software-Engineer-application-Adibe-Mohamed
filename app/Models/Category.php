<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\Relations\BelongsToMany;

class Category extends Model
{
    use HasFactory;

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = ['name', 'parent_id'];


    /**
     * @return BelongsTo
     */
    public function parent(): BelongsTo
    {
        return $this->belongsTo(self::class, 'parent_id');
    }

    /**
     * 
     * @return BelongsTo
     */
    public function subcategories(): BelongsTo
    {
        return $this->belongsTo(self::class, 'parent_id', 'id');
    }

    /**
     * 
     * @return BelongsToMany
     */
    public function product(): BelongsToMany
    {
        return $this->belongsToMany(Product::class);
    }
}