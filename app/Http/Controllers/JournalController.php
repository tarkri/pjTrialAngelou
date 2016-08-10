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
        return response()->json(URL::to($journal->id.'/situation'));
    }

    public function situation($id)
    {
        $journal = $this->journal->find($id);
        if($this->situation->where('journal_id', $journal->id)->first()) {
            $situation = $this->situation->find($id);
        } else {
            $situation = new Situation;
            $situation->journal_id = $journal->id;
            $situation->save();
        }
        return view('pages.situation', compact('situation'));
    }

    public function saveSituation(Request $request)
    {
        $input = $request->all();
        $situation = $this->situation->find($input['situation']);
        $situation->content = $input['content'];
        $situation->save();
        return response()->json(URL::to($situation->journal_id.'/results'));
    }

    public function result($id)
    {
        $journal = $this->journal->find($id);
        if($this->result->where('journal_id', $journal->id)->first()) {
            $result = $this->result->find($id);
        } else {
            $result = new Result;
            $result->journal_id = $journal->id;
            $result->save();
        }
        return view('pages.results', compact('result'));
    }

    public function saveResult(Request $request)
    {
        $input = $request->all();
        $result = $this->result->find($input['result']);
        $result->content = $input['content'];
        $result->save();
        return response()->json(URL::to($result->journal_id.'/reflection'));
    }

    public function reflection($id)
    {
        $journal = $this->journal->find($id);
        if($this->though->where('journal_id', $journal->id)->first()) {
            $thought = $this->though->find($id);
        } else {
            $thought = new Thought;
            $thought->journal_id = $journal->id;
            $thought->save();
        }
        if($this->behavior->where('journal_id', $journal->id)->first()) {
            $behavior = $this->behavior->find($id);
        } else {
            $behavior = new Behavior;
            $behavior->journal_id = $journal->id;
            $behavior->save();
        }
        if($this->innerState->where('journal_id', $journal->id)->first()) {
            $innerState = $this->innerState->find($id);
        } else {
            $innerState = new InnerState;
            $innerState->journal_id = $journal->id;
            $innerState->save();
        }
        if($this->mindset->where('journal_id', $journal->id)->first()) {
            $mindset = $this->innerState->find($id);
        } else {
            $mindset = new Mindset;
            $mindset->journal_id = $journal->id;
            $mindset->save();
        }
        return view('pages.reflections', compact('thought', 'behavior', 'innerState', 'mindset'));
    }

    public function saveReflection(Request $request)
    {
        $input = $request->all();
        $thought = $this->thought->find($input['thought_id']);
        $thought->content = $input['thought_content'];
        $thought->save();
        $behavior = $this->behavior->find($input['behavior_id']);
        $behavior->content = $input['behavior_content'];
        $behavior->save();
        $innerState = $this->innerState->find($input['innerState_id']);
        $innerState->content = $input['innerState_content'];
        $innerState->save();
        $mindset = $this->mindset->find($input['mindset_id']);
        $mindset->content = $input['mindset_content'];
        $mindset->save();
        return response()->json(URL::to($thought->journal_id.'/insights'));
    }
}
