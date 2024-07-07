<?php

namespace Modules\Channel\Model;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\Relations\HasMany;
use Modules\Guild\Model\Guild;
use Modules\Message\Model\Message;

class Channel extends Model
{
    use HasFactory;
    protected $fillable = [
        'name',
        'guild_id',
    ];

    public function guild(): BelongsTo
    {
        return $this->belongsTo(Guild::class);
    }

    public function messages(): HasMany
    {
        return $this->hasMany(Message::class);
    }
}
