<?php

namespace Neputer\Services;

use App\Helper\AppHelper;
use function GuzzleHttp\Promise\all;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Neputer\Entities\Fact;
use Neputer\Entities\Post;
use Neputer\Entities\Topic;
use Neputer\Traits\FileUploadTrait;

/**
 * Class PostService
 * @package Neputer\Services
 */
class PostService extends BaseService
{
    use FileUploadTrait;
    /**
     * The Post instance
     *
     * @var $model
     */
    protected $model;
    protected $image_name=null;
    protected $folder_path;
    protected $folder;
    protected $image_dimensions;
    /**
     * PostService constructor.
     * @param Post $post
     */
    public function __construct(Post $post)
    {
        $this->model = $post;
        $this->folder = config('neputer.assets.panel_image_folders.post');
        $this->folder_path = public_path('assets/admin/images' . DIRECTORY_SEPARATOR . $this->folder);
        $this->image_dimensions = config('neputer.image-dimensions.post');
    }

    public function getSearchData(Request $request)
    {
//        dd($request->all());
        $approved_date = '';
        if($request->get('published_date')){
            $approved_date = date('Y-m-d', strtotime($request->get('published_date')));
        }

        $topics = Topic::select(DB::raw("
                       CASE
                           WHEN writing_rates.category_name_overwrite IS NULL THEN category.title
                           ELSE writing_rates.category_name_overwrite
                       END as category_name"
        ), 'writing_rates.word_count_type', 'writing_rates.min_word_count', 'writing_rates.max_word_count','users.name',
            'topic.id', 'writing_rates.category_name_overwrite','topic.title','topic.created_at','topic.updated_at','topic.topic_status','topic.topic')
            ->join('writing_rates', 'writing_rates.id', '=', 'topic.writing_rates_id')
            ->join('category', 'category.id', '=', 'writing_rates.category_id')
            ->join('users','users.id','=','topic.user_id')
            ->orderBy('topic.updated_at','desc')
            ->where([
                ['topic.topic_status','<>',null],
                ['topic.topic_status','<>','issue']
            ])
            ->where(function($query) use ($request,$approved_date){
                if($topic=$request->get('topic')){
                    $query->where('topic.topic','like','%'.$topic.'%');
                }
                if($title=$request->get('title')){
                    $query->where('topic.title','like','%'.$title.'%');
                }
                if($writer=$request->get('writer')){
                    $query->where('users.id',$writer);
                }
                if($post_status=$request->get('post_status')){
                    $query->where('topic.topic_status',$post_status);
                }
                if($writing_rate=$request->get('category')){
                    $query->where('writing_rates.id', $writing_rate);
                }
                if($approved_date){
                    $query->where('topic.approved_date','like',$approved_date.'%');
                }

                if ($request->get('published_date_from') && $request->get('published_date_to')) {
                    $query->whereBetween('topic.approved_date', [
                        AppHelper::formatDate('Y-m-d', $request->get('published_date_from')),
                        AppHelper::formatDate('Y-m-d', $request->get('published_date_to'))
                    ]);
                } else {
                    if ($request->get('published_date_from')) {
                        $query->where('topic.approved_date', '>=', AppHelper::formatDate('Y-m-d', $request->get('published_date_from')));
                    }
                    if ($request->get('published_date_to')) {
                        $query->where('topic.approved_date', '<=', AppHelper::formatDate('Y-m-d', $request->get('published_date_to')));
                    }
                }
            })
            ->get();

        return $topics;
    }

    public function updatePost(Request $request,$model)
    {
//        dd($request->all());
        $increment = 1;
        $data = [];
        $this->_uploadImage($request,'update',$model->image);
        $this->uploadImageThumbs($request,'update',$model->image);

        if($request->has('value')){
            foreach($request->get('value') as $fact_id => $val) {

                if (Fact::find($fact_id)) {

                    if($model->facts()->count()){
                        $user = 'updated_by';
                        $model->facts()->sync([]);
                    }else{
                        $user = 'created_by';
                    }
                    $data[$fact_id] = [
                        $user => auth()->user()->id,
                        'value' => $val,
                        'order_by' => $increment++,
                        'status' => 1
                    ];

                }
            }
        }

        $model->facts()->sync($data);

        $model->update([
            'user_id'               => $request->get('user_id'),
            'writing_rates_id'       => $request->get('writing_rates_id'),
            'title'                  => $request->get('title'),
            'topic'                  => $request->get('topic'),
            'slug'                   => $request->has('enable_url')?$request->get('slug'):$model->slug,
            'seo_title'              => $request->get('seo_title'),
            'image'                  => $this->image_name,
            'seo_description'        => $request->get('seo_description'),
            'message_to_writer'      => $request->get('message_to_writer'),
            'keyword_suggestion'     => $request->get('keyword_suggestion'),
            'content_type'           => $request->get('content_type'),
            'topic_status'           => $request->get('topic_status'),
            'task_done_status'       => 'submit-a-post-topic',
            'words'                  => $request->get('words'),
            'updated_by'             => auth()->user()->id,
            'paid'                   =>  $request->has('paid')?$request->get('paid'):$model->paid,
            'show_writer'            => $request->has('show_writer')?$request->get('show_writer'):$model->show_writer,
            'keywords'               => $request->has('keywords')?$request->get('keywords'):$model->keywords,
            'has_redirect'           => ($model->topic_status == 'approved' && $request->has('slug'))?1:0,
            'old_slug'               => ($model->topic_status == 'approved' && $request->has('slug'))?$model->slug:null,
            'redirect-code'          => ($model->topic_status == 'approved' && $request->has('slug'))?$request->get('redirect_code'):null,
            'summary'                => $request->get('summary')?:'',
            'details'                => $request->get('details')?:'',
            'message_from_writer'    => $request->get('message_from_writer')?:'',
            'alt_text'               => $request->get('alt_text'),
            'caption'               => $request->get('caption'),
            'image_title'               => $request->get('image_title'),
            'description'               => $request->get('description'),

        ]);

    }

}
