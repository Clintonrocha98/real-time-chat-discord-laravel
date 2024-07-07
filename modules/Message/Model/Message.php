<?php

namespace Modules\Message\Model;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Modules\User\Model\User;
use Modules\Channel\Model\Channel;

class Message extends Model
{
    use HasFactory;

    protected $fillable = [
        'content',
        'user_id',
        'channel_id',
    ];

    public function user(): BelongsTo
    {
        return $this->belongsTo(User::class);
    }

    public function channel(): BelongsTo
    {
        return $this->belongsTo(Channel::class);
    }
}
