<?php

namespace App\Http\Controllers;

use App\Action;
use App\Behavior;
use App\InnerState;
use App\Insight;
use App\Journal;
use App\Mindset;
use App\Outcome;
use App\Result;
use App\Situation;
use App\Thought;
use App\User;
use Illuminate\Http\Request;

use App\Http\Requests;
use Illuminate\Support\Facades\URL;

class JournalController extends Controller
{
    /**
     * @var Action
     */
    private $action;
    /**
     * @var Behavior
     */
    private $behavior;
    /**
     * @var InnerState
     */
    private $innerState;
    /**
     * @var Insight
     */
    private $insight;
    /**
     * @var Journal
     */
    private $journal;
    /**
     * @var Mindset
     */
    private $mindset;
    /**
     * @var Outcome
     */
    private $outcome;
    /**
     * @var Result
     */
    private $result;
    /**
     * @var Situation
     */
    private $situation;
    /**
     * @var Thought
     */
    private $thought;
    /**
     * @var User
     */
    private $user;

    /**
     * JournalController constructor.
     * @param Action $action
     * @param Behavior $behavior
     * @param InnerState $innerState
     * @param Insight $insight
     * @param Journal $journal
     * @param Mindset $mindset
     * @param Outcome $outcome
     * @param Result $result
     * @param Situation $situation
     * @param Thought $thought
     * @param User $user
     */
    public function __construct(Action $action, Behavior $behavior, InnerState $innerState, Insight $insight, Journal $journal, Mindset $mindset, Outcome $outcome, Result $result, Situation $situation, Thought $thought, User $user)
    {
        $this->action = $action;
        $this->behavior = $behavior;
        $this->innerState = $innerState;
        $this->insight = $insight;
        $this->journal = $journal;
        $this->mindset = $mindset;
        $this->outcome = $outcome;
        $this->result = $result;
        $this->situation = $situation;
        $this->thought = $thought;
        $this->user = $user;
    }

    public function index()
    {
        return view('pages.index');
    }

    public function create()
    {
        $journal = new Journal;
        $journal->user_id = 1;
        $journal->save();
        return response()->json(['url' => URL::to($journal->id.'/situation')]);
    }

    public function situation($id)
    {
        $journal = $this->journal->find($id);
    }
}
