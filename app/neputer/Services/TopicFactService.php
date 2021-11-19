<?php

namespace Neputer\Services;

use Neputer\Entities\TopicFact;

/**
 * Class TopicFactService
 * @package Neputer\Services
 */
class TopicFactService extends BaseService
{

    /**
     * The TopicFact instance
     *
     * @var $model
     */
    protected $model;

    /**
     * TopicFactService constructor.
     * @param TopicFact $topicfact
     */
    public function __construct(TopicFact $topicfact)
    {
        $this->model = $topicfact;
    }

    public function getSearchData($request, $topic_id)
    {
        $records = TopicFact::select('f.title', 'fact_topic.id', 'fact_topic.value', 'fact_topic.status',
            'fact_topic.search', 'fact_topic.status')
            ->join('facts as f', 'f.id', '=', 'fact_topic.facts_id')
            ->where('fact_topic.topics_id', $topic_id)
            ->orderBy('fact_topic.order_by')
            ->get();

        return $records;
    }

}
