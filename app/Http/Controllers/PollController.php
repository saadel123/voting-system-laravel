<?php
// https://codeshack.io/poll-voting-system-php-mysql/
namespace App\Http\Controllers;

use App\Models\Poll;
use Illuminate\Http\Request;
use RealRashid\SweetAlert\Facades\Alert;


class PollController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {

        $polls = Poll::with('poll_answers')->orderBy('created_at', 'DESC')->get();
        return view('welcome')->with(['polls' => $polls]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $request->validate([
            'answers.0' => 'required',
            'title' => 'required'
        ]);
        $poll = Poll::create([
            "title" => $request->title,
            "description" => $request->description,
        ]);
        foreach ($request->answers as  $answer) {
            if (!empty($answer)) {
                $poll->poll_answers()->create([
                    "votes" => $request->votes,
                    "title" => $answer,
                    "poll_id" => $poll->id,
                ]);
            }
        }
        // $answers = isset($request->answers) ? explode(PHP_EOL, $request->answers) : '';
        // foreach($answers as $answer) {
        //     // If the answer is empty there is no need to insert
        //     if (empty($answer)) continue;
        //     // Add answer to the "poll_answers" table
        //     $poll->poll_answers()->create([
        //         "votes" => $request->votes,
        //         "title" => $answer,
        //         "poll_id" => $poll->id,
        //     ]);
        // }
        Alert::success('Congrats', 'You\'re poll has Successfully Added');

        return redirect()->back();
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $poll = Poll::whereId($id)->with('poll_answers')->first();

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
        return view('vote', ['poll' => $poll, 'total_votes' => $total_votes]);

        //dd($poll)
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
    public function update(Request $request, $id)
    {
        //
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
