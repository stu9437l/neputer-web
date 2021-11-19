<?php

namespace Neputer\Entities;

use App\Helper\AppHelper;
use Carbon\Carbon;
use Illuminate\Database\Eloquent\SoftDeletes;
use Neputer\Entities\BaseModel as Model;
use Neputer\Traits\HistoryTrait;

class Topic extends Model
{
    use HistoryTrait, SoftDeletes;
    
    protected $table = 'topic';

    protected $casts = [
        'content_type' => 'array',
    ];
    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'created_by','updated_by','user_id','writing_rates_id','title','topic','image',
        'slug','summary','details','words','seo_title','seo_description','message_to_writer','message_from_writer','choose_for_word_male',
        'choose_for_word_female','choose_for_word_child','topic_status','content_type','status','paid','show_writer','picked_date','submitted_date',
        'approved_date','page_view_count','like','task_done_status','keyword_suggestion','new_summary','new_details','new_message_from_writer','published',
        'new_image','new_updated_by','old_slug','redirect-code','has_redirect','alt_text','caption','image_title','description','keywords',
    ];

//    protected $dates = ['approved_date'];

    /**
     * Scope a query to include Topic Status except null.
     *
     * @return \Illuminate\Database\Eloquent\Builder
     */
    public function scopeTopicStatus($query)
    {
        return $query->where('topic.topic_status','!=',null);
    }

//    public function history()
//    {
//        return $this->belongsToMany(History::class)->withTimestamps();
//    }

//    public function getCreatedAtAttribute(){
//
//        return Carbon::createFromTimeStamp(strtotime($this->attributes['created_at']) )->diffForHumans();    }

    public function getCreatedAtAttribute() {
        return date('m/d/Y', strtotime($this->attributes['created_at']));
    }

    public function getUpdatedAtAttribute() {
        return date('m/d/Y', strtotime($this->attributes['updated_at']));
    }


    public function facts()
    {
        return $this->belongsToMany(Fact::class, 'fact_topic', 'topics_id', 'facts_id')->withTimestamps();
    }


}
