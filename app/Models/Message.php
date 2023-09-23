<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Message extends Model
{
    use HasFactory, SoftDeletes;

    protected $fillable = [
        'conversation_id', 'user_id', 'body', 'type',
    ];

    public function conversation()
    {
        return $this->belongsTo(Conversation::class);
    }

    // this relation represent the user that sent the message.
    public function user()
    {
        return $this->belongsTo(User::class)
            ->withDefault([
                'name' => __('User'),
            ]);
    }

    public function recipients()
    {
        return $this->belongsToMany(User::class, 'recipients')
            ->withPivot([
                'deleted_at', 'read_at',
            ]);
    }
}
