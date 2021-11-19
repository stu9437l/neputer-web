<?php

namespace Neputer\Services;

use App\Helper\ConfigHelper;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Neputer\Entities\Topic;
use Neputer\Utils\Acl\Entities\User;

/**
 * Class TopicService
 * @package Neputer\Services
 */
class TopicService extends BaseService
{

    /**
     * The Topic instance
     *
     * @var $model
     */
    protected $model;

    /**
     * TopicService constructor.
     * @param Topic $topic
     */
    public function __construct(Topic $topic)
    {
        $this->model = $topic;
    }


    public function getSearchData(Request $request,$type)
    {
        $topics = Topic::select(DB::raw("
                       CASE
                           WHEN writing_rates.category_name_overwrite IS NULL THEN category.title
                           ELSE writing_rates.category_name_overwrite
                       END as category_name"
        ), 'writing_rates.word_count_type', 'writing_rates.min_word_count', 'writing_rates.max_word_count',
            'topic.id', 'writing_rates.category_name_overwrite','topic.title','topic.created_at','topic.topic_status','topic.topic')
            ->join('writing_rates', 'writing_rates.id', '=', 'topic.writing_rates_id')
            ->join('category', 'category.id', '=', 'writing_rates.category_id')
            ->where(function ($query) use ($type){
                if($type == 'topic')
                {
                    $query->where('topic.topic_status',null);
                }elseif ($type == 'issue')
                {
                    $query->where('topic.topic_status',$type);
                }
            })
            ->where(function($query) use ($request){
                if($topic=$request->get('topic')){
                    $query->where('topic.topic','like','%'.$topic.'%');
                }
                if($title=$request->get('title')){
                    $query->where('topic.title','like','%'.$title.'%');
                }
                if($writing_rate=$request->get('category')){
                    $query->where('writing_rates.id', $writing_rate);
                }
            })
            ->get();
        return $topics;
    }

    public function createTopic(array $request)
    {
        if($request['user_id'])
        {
            $user = User::find($request['user_id']);
            $post_count = Topic::where('user_id',$user->id)->whereIn('topic_status',['assigned','draft','submitted','rewrite'])->count();
            $check_limit = $user->picked_limit > $post_count;
        }

        if($request['user_id']?$check_limit:true){
            if(array_key_exists('make_issue',$request))
            {
                $task_done_status = $request['user_id']?'assign-a-topic':'make-an-issue';
                $topic_status = $request['user_id']?'assigned':'issue';
            }else{
                $task_done_status = 'create-a-topic';
                $topic_status = null;
            }

            $topic = $this->model->create([
                'user_id'               => $request['user_id'],
                'writing_rates_id'       => $request['writing_rates_id'],
                'title'                  => $request['title'],
                'slug'                   => $request['slug'],
                'topic'                  => $request['topic'],
                'seo_title'              => $request['seo_title'],
                'seo_description'        => $request['seo_description'],
                'task_done_status'       => $task_done_status,
                'topic_status'           => $topic_status,
                'words'                  => $request['words'],
                'created_by'             => auth()->user()->id,
                'message_to_writer'      => $request['message'],
            ]);

            return $topic;
        }
         return false;
    }


    public function updateTopic(array $request,$model)
    {
        $topic_status = null;
        if($request['user_id']){
            $user = User::find($request['user_id']);
            $post_count = Topic::where('user_id',$request['user_id'])->whereIn('topic_status',['assigned','draft','submitted','rewrite'])->count();
            $check_limit = $user->picked_limit > $post_count;
        }

        if($request['user_id']?$check_limit:true){
            if(array_key_exists('make_issue',$request)) {
                $task_status = 'make-an-issue';
                $topic_status = $request['user_id']?'assigned':'issue';
            }else{
                if ($model->title != null && $request['title']) {
                    if ($request['title'] == $model->title && $request['topic'] != $model->topic){
                        $task_status = 'modify-a-topic';

                    } elseif ($request['title'] != $model->title){
                        if($request['topic'] != $model->topic)
                        {
                            $task_status = 'modify-a-topic';
                        }else
                        {
                            $task_status = 'modify-the-title';
                        }

                    }else{
                        $task_status = 'review-a-title';
                    }

                }else{
                    if($model->title == null && $request['title'])
                        $task_status = 'make-a-title';
                    elseif($model->title != null && $request['title'] == null)
                        $task_status = 'modify-the-title';
                    else
                        $task_status = 'review-a-title';
                }
            }


            $topic = $model->update([
                'user_id'               => $request['user_id'],
                'writing_rates_id'       => $request['writing_rates_id'],
                'title'                  => $request['title'],
                'slug'                   => $request['slug'],
                'topic'                  => $request['topic'],
                'seo_title'              => $request['seo_title'],
                'seo_description'        => $request['seo_description'],
                'task_done_status'       => $task_status,
                'topic_status'           => $topic_status,
                'words'                  => $request['words'],
                'updated_by'             => auth()->user()->id,
                'message_to_writer'      => $request['message'],
            ]);

            return $topic;
        }

        return false;

    }

}
