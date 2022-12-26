<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Poll extends Model
{
    use HasFactory;
    protected $table = 'polls';
    protected $fillable = [
        'title',
        'description',
    ];

    public function poll_answers()
    {
        return $this->hasMany(PollAnswer::class, 'poll_id');
    }
    public function voted_user_polls()
    {
        return $this->hasMany(VotedUserPoll::class, 'poll_id');
    }

    public function isAuthUserVotedPoll(){
        return $this->voted_user_polls()->where('user_id',  auth()->id())->exists();
     }

    // public function user()
    // {
    //     return $this->belongsTo(User::class, 'user_id');
    // }

}
