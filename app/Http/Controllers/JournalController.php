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

    /**
     * @return \Illuminate\Contracts\View\Factory|\Illuminate\View\View
     */
    public function index()
    {
        return view('pages.index');
    }

    /**
     * @return \Illuminate\Http\JsonResponse
     */
    public function create()
    {
        $journal = new Journal;
        $journal->user_id = 1;
        $journal->save();
        return response()->json(URL::to($journal->id . '/situation'));
    }

    /**
     * @param $id
     * @return \Illuminate\Contracts\View\Factory|\Illuminate\View\View
     */
    public function situation($id)
    {
        $journal = $this->journal->find($id);
        if ($this->situation->where('journal_id', $journal->id)->first()) {
            $situation = $this->situation->find($id);
        } else {
            $situation = new Situation;
            $situation->journal_id = $journal->id;
            $situation->save();
        }
        return view('pages.situation', compact('situation', 'journal'));
    }

    /**
     * @param Request $request
     * @return \Illuminate\Http\JsonResponse
     */
    public function saveSituation(Request $request)
    {
        $input = $request->all();
        $situation = $this->situation->find($input['situation']);
        $situation->content = $input['content'];
        $situation->save();
        return response()->json(URL::to($situation->journal_id . '/results'));
    }

    /**
     * @param $id
     * @return \Illuminate\Contracts\View\Factory|\Illuminate\View\View
     */
    public function result($id)
    {
        $journal = $this->journal->find($id);
        if ($this->result->where('journal_id', $journal->id)->first()) {
            $result = $this->result->where('journal_id', $journal->id)->first();
        } else {
            $result = new Result;
            $result->journal_id = $journal->id;
            $result->save();
        }
        return view('pages.results', compact('result', 'journal'));
    }

    /**
     * @param Request $request
     * @return \Illuminate\Http\JsonResponse
     */
    public function saveResult(Request $request)
    {
        $input = $request->all();
        $result = $this->result->find($input['result']);
        $result->content = $input['content'];
        $result->save();
        return response()->json(URL::to($result->journal_id . '/reflection'));

    }

    /**
     * @param $id
     * @return \Illuminate\Contracts\View\Factory|\Illuminate\View\View
     */
    public function reflection($id)
    {
        $journal = $this->journal->find($id);
        if ($this->thought->where('journal_id', $journal->id)->first()) {
            $thought = $this->thought->where('journal_id', $journal->id)->first();
        } else {
            $thought = new Thought;
            $thought->journal_id = $journal->id;
            $thought->save();
        }
        if ($this->behavior->where('journal_id', $journal->id)->first()) {
            $behavior = $this->behavior->where('journal_id', $journal->id)->first();
        } else {
            $behavior = new Behavior;
            $behavior->journal_id = $journal->id;
            $behavior->save();
        }
        if ($this->innerState->where('journal_id', $journal->id)->first()) {
            $innerState = $this->innerState->where('journal_id', $journal->id)->first();
        } else {
            $innerState = new InnerState;
            $innerState->journal_id = $journal->id;
            $innerState->save();
        }
        if ($this->mindset->where('journal_id', $journal->id)->first()) {
            $mindset = $this->mindset->where('journal_id', $journal->id)->first();
        } else {
            $mindset = new Mindset;
            $mindset->journal_id = $journal->id;
            $mindset->save();
        }
        return view('pages.reflection', compact('thought', 'behavior', 'innerState', 'mindset', 'journal'));
    }

    /**
     * @param Request $request
     * @return \Illuminate\Http\JsonResponse
     */
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
        return response()->json(URL::to($thought->journal_id . '/insight'));
    }

    /**
     * @param $id
     * @return \Illuminate\Contracts\View\Factory|\Illuminate\View\View
     */
    public function insight($id)
    {
        $journal = $this->journal->find($id);
        if ($this->insight->where('journal_id', $journal->id)->first()) {
            $insight = $this->insight->where('journal_id', $journal->id)->first();
        } else {
            $insight = new Insight;
            $insight->journal_id = $journal->id;
            $insight->save();
        }
        return view('pages.insights', compact('insight', 'journal'));
    }

    /**
     * @param Request $request
     * @return \Illuminate\Http\JsonResponse
     */
    public function saveInsight(Request $request)
    {
        $input = $request->all();
        $insight = $this->insight->find($input['insight']);
        $insight->content = $input['content'];
        $insight->save();
        return response()->json(URL::to($insight->journal_id . '/outcome'));
    }

    /**
     * @param $id
     * @return \Illuminate\Contracts\View\Factory|\Illuminate\View\View
     */
    public function outcome($id)
    {
        $journal = $this->journal->find($id);
        if ($this->outcome->where('journal_id', $journal->id)->first()) {
            $outcome = $this->outcome->where('journal_id', $journal->id)->first();
        } else {
            $outcome = new Outcome;
            $outcome->journal_id = $journal->id;
            $outcome->save();
        }
        return view('pages.outcomes', compact('outcome', 'journal'));
    }

    /**
     * @param Request $request
     * @return \Illuminate\Http\JsonResponse
     */
    public function saveOutcome(Request $request)
    {
        $input = $request->all();
        $outcome = $this->outcome->find($input['outcome']);
        $outcome->content = $input['content'];
        $outcome->save();
        return response()->json(URL::to($outcome->journal_id . '/action'));
    }

    /**
     * @param $id
     * @return \Illuminate\Contracts\View\Factory|\Illuminate\View\View
     */
    public function action($id)
    {
        $journal = $this->journal->find($id);
        if ($this->action->where('journal_id', $journal->id)->first()) {
            $action = $this->action->where('journal_id', $journal->id)->first();
        } else {
            $action = new Action;
            $action->journal_id = $journal->id;
            $action->save();
        }
        return view('pages.actions', compact('action', 'journal'));
    }

    /**
     * @param Request $request
     * @return \Illuminate\Http\JsonResponse
     */
    public function saveAction(Request $request)
    {
        $input = $request->all();
        $action = $this->action->find($input['action']);
        $action->content = $input['content'];
        $action->save();
        return response()->json(URL::to($action->journal_id . '/complete'));
    }

    /**
     * @param $id
     * @return string
     */
    public function complete($id)
    {
        $journal = $this->journal->find($id);
        return 'complete';
    }
}
