<?php

namespace App\Http\Controllers;

use App\Models\Poll;
use App\Models\PollAnswer;
use App\Models\VotedUserPoll;
use Illuminate\Http\Request;
use RealRashid\SweetAlert\Facades\Alert;


class PollAnswerController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        if (isset($id)) {
            $poll = Poll::whereId($id)->with('poll_answers')->first();
            $total_votes = 0;
            foreach ($poll->poll_answers  as $poll_answer) {
                // Every poll answers votes will be added to total votes
                $total_votes += $poll_answer->votes;
            }
        } else {
            exit('No poll ID specified.');
        }
        return view('result', ['poll' => $poll, 'total_votes' => $total_votes]);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update($id)
    {
        if (!empty(request('user_id'))) {
            // $user_id = request('user_id');
            // $poll_voted = VotedUserPoll::find($user_id);
            // $poll_answer_id =
            $poll = PollAnswer::find($id);
            $poll->votes = $poll->votes + 1;
            $poll->save();
            $poll_id = $poll->poll_id;
            VotedUserPoll::create([
                "poll_id" => $poll_id,
                "user_id" => request('user_id'),
                "poll_answer_id" => $poll->id,
            ]);
            // $poll->voted_user_polls()->create([]);
            Alert::success('Congrats', 'You\'ve Successfully Registered');
            return response()->json(['success' => 'Data added successefully'], 200);
        } else {
            Alert::warning('Error', 'You should be authetifacted in order to poll your opinion');
            return response()->json(['danger' => 'Data not added '], 400);
        }


        // $poll = PollAnswer::findOrFail($id);
        // // $modifier_poll_answer = $request->all();
        // // $poll_answer['votes'] = $poll_answer['votes'] + 1;

        // $poll->update([
        //     "votes" => (int) "votes" + 1,
        // ]);
        // $poll->poll_answers->update(['votes' => $poll->poll_answer['votes'] + 1]);
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
    }
}
