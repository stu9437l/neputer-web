<?php

namespace Neputer\Services;


use Carbon\Carbon;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Neputer\Entities\Fact;
use Neputer\Entities\Topic;
use Neputer\Entities\Writer;
use Neputer\Traits\FileUploadTrait;

/**
 * Class WriterService
 * @package Neputer\Services
 */
class WriterService extends BaseService
{
    use FileUploadTrait;
    /**
     * The Writer instance
     *
     * @var $model
     */
    protected $model;
    protected $image_name=null;
    protected $folder_path;
    protected $folder;
    protected $topic_status;
    protected $all_topics = ['all-topics' => 'All Topics'];
    protected $image_dimensions;

    /**
     * WriterService constructor.
     * @param Writer $writer
     */
    public function __construct(Writer $writer)
    {
        $this->model = $writer;
        $this->folder = config('neputer.assets.panel_image_folders.writerpanel');
        $this->folder_path = public_path('assets/admin/images' . DIRECTORY_SEPARATOR . 'post');
        $this->topic_status = array_merge(DB::table('topic_status')->select('slug','title')->pluck('title','slug')->toArray(),$this->all_topics);
        $this->image_dimensions = config('neputer.image-dimensions.post');

    }

    public function getSearchData(Request $request,$topic_status)
    {

        $topics = Topic::select('topic.id as topic_id', 'topic.slug', 'topic.title' , 'topic.topic_status', 'topic.status',
            'topic.paid', 'topic.picked_date', 'topic.submitted_date',
            'category.title as category_title', 'topic.updated_at',
            DB::raw("CASE 
                          WHEN writing_rates.category_name_overwrite IS NULL THEN category.title 
                          ELSE writing_rates.category_name_overwrite 
                      END as category_name
                      "),
            'writing_rates.word_count_type', 'writing_rates.min_word_count', 'writing_rates.max_word_count',
            'writing_rates.standard_rate', 'writing_rates.category_name_overwrite',
            'writer_rates.id', 'writer_rates.rate_overwrite', 'writer_rates.effective_from_date', 'writer_rates.status'
        )
            ->join('writing_rates', 'writing_rates.id','=','topic.writing_rates_id')
            ->leftJoin('writer_rates', 'writing_rates.id', '=', 'writer_rates.writing_rates_id')
            ->join('category', 'category.id','=','writing_rates.category_id')
            ->join('users', 'users.id','=','topic.user_id')
            ->TopicStatus()
            ->where('topic.user_id', auth()->user()->id)
            ->orderBy('topic.approved_date', 'desc')
            ->where(function ($query) use ($request, $topic_status) {

                if ($topic_status != 'all') {
                        $query->where('topic.topic_status', $topic_status);
                }
            })
            ->get();

        return $topics;
    }

    public function updateWriter(Request $request,$model)
    {
        $data = [];
        $increment = 1;
        $user = '';
        if ($request->has('submit')) {

            $model->topic_status  = 'submitted';
            if($model->published)
            {
                $model->task_done_status = 'submit-a-published-topic';
            }else{
                $model->task_done_status = $model->task_done_status=='send-rewrite-a-topic'?'rewrite-and-submit-topic':'submit-a-topic';
            }

        } elseif ($request->has('save-as-draft')) {

            $model->topic_status  = 'draft';
            $model->task_done_status = $model->published?'draft-a-published-topic':'draft-a-topic';

        }


        if($model->published)
        {
            $this->_uploadImage($request,'update',$model->new_image);
            $this->uploadImageThumbs($request,'update',$model->new_image);

            $model->new_summary             = $request->get('summary');
            $model->new_details             = $request->get('details');
            $model->new_message_from_writer = $request->get('message_from_writer');
            $model->new_updated_by          = auth()->user()->id;
            $model->save();
            $model->update(['new_image'=>$this->image_name]);

        }else{

            $this->_uploadImage($request,'update',$model->image);
            $this->uploadImageThumbs($request,'update',$model->new_image);


            $model->summary             = $request->get('summary');
            $model->details             = $request->get('details');
            $model->message_from_writer = $request->get('message_from_writer');
            $model->updated_by          = auth()->user()->id;
            $model->words               = $request->get('words');
            $model->alt_text               = $request->get('alt_text');
            $model->caption               = $request->get('caption');
             $model->image_title                = $request->get('image_title');
             $model->description                = $request->get('description');
            $model->submitted_date          = Carbon::now();
            $model->save();
            $model->update(['image'=>$this->image_name]);
        }

        if($request->has('value'))
        {
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

    }

    public function getTopicStatusCount()
    {
        $data = [];

        foreach ($this->topic_status as $key => $value) {

            $data[$key.'_count'] = Topic::select('topic.id')->TopicStatus()
//                ->join('users', 'users.id','=','topic.user_id')
                ->where('topic.user_id', auth()->user()->id)
                ->where(
                    function ($query) use ($key) {

                        if($key != 'all-topics') {

                            $query->where('topic_status', $key);

                        }

                    })
                ->count();
        }

        return $data;

    }

}
