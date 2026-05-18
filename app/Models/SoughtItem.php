<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\Relations\BelongsToMany;

class SoughtItem extends Model
{
    /** @use HasFactory<\Database\Factories\SoughtItemFactory> */
    use HasFactory;
    public function user(): BelongsTo
    {
        return $this->belongsTo(User::class);
    }
    public function founditems(): BelongsToMany
    {
        return $this->belongsToMany(FoundItem::class);
    }
    protected $fillable = [
        'name',
        'description',
        'foundState',
    ];
    protected $attributes = array(
      'foundState' => false
    );
}
