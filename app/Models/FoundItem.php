<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\Relations\BelongsToMany;

class FoundItem extends Model
{
    /** @use HasFactory<\Database\Factories\FoundItemFactory> */
    use HasFactory;

    public function user(): BelongsTo
    {
        return $this->belongsTo(User::class);
    }
    public function soughtitems(): BelongsToMany
    {
        return $this->belongsToMany(SoughtItem::class);
    }
    /**
     
     * The attributes that are mass assignable.
     *
     * @var array<int, string>
     */
    protected $fillable = [
        'name',
        'description',
        'foundState',
    ];
    protected $attributes = array(
      'foundState' => false
    );
}
