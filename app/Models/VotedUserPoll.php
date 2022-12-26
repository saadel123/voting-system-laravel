<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class VotedUserPoll extends Model
{
    use HasFactory;
    protected $table = 'voted_user_polls';
    protected $fillable = [
        'poll_id',
        'user_id',
        'poll_answer_id',
    ];
    public function user()
    {
        return $this->belongsTo(User::class, 'user_id');
    }
    public function poll()
    {
        return $this->belongsTo(Poll::class, 'poll_id');
    }
    public function poll_answer()
    {
        return $this->belongsTo(PollAnswer::class, 'poll_answer_id');
    }
}
