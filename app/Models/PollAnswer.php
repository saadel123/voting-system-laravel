<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class PollAnswer extends Model
{
    use HasFactory;
    protected $table = 'poll_answers';
    protected $fillable = [
        'poll_id',
        'title',
        'votes',
    ];
    public function poll()
    {
        return $this->belongsTo(Poll::class, 'poll_id');
    }
    public function voted_user_polls()
    {
        return $this->hasMany(VotedUserPoll::class, 'poll_id');
    }

}
