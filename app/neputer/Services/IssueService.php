<?php

namespace Neputer\Services;

use Illuminate\Http\Request;
use Neputer\Entities\Issue;
use Neputer\Entities\Topic;

/**
 * Class IssueService
 * @package Neputer\Services
 */
class IssueService extends BaseService
{

    /**
     * The Issue instance
     *
     * @var $model
     */
    protected $model;

    /**
     * IssueService constructor.
     * @param Issue $issue
     */
    public function __construct(Issue $issue)
    {
        $this->model = $issue;
    }

    public function assignWriter(Request $request, $topic_id = null,$user_id = null)
    {
        $topic = Topic::findOrFail($topic_id ?? $request->get('issue_id'));
        $topic->user_id = $request->get('users_id') ?? auth()->user()->id;

        if ($user_id) {
            $topic->user_id = $user_id;
            $topic->task_done_status = 'assign-a-topic';

        } else {
            $topic->user_id = $request->get('users_id') ?? auth()->user()->id;
            $topic->task_done_status = $request->get('users_id') ? 'assign-a-topic' : 'pick-a-topic';

        }

        $topic->topic_status = 'assigned';
        $topic->save();
    }

    public function getPickedTopicCount()
    {
       $data = Topic::where('user_id', auth()->user()->id)->whereIn('topic_status', ['assigned','draft','rewrite','submitted'])->count();
       return $data;
    }

}
