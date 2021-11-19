<?php

namespace Neputer\Composers;

use Illuminate\View\View;
use Neputer\Services\WriterService;

/**
 * Class CountTopicStatusViewComposer
 * @package Neputer\Composers
 */
class CountTopicStatusViewComposer
{

    /**
     * The WriterService instance
     * @var $writerService
     */
    protected $writerService;

    /**
     * CountTopicStatusViewComposer constructor.
     * @param WriterService $writerService
     */
    public function __construct(WriterService $writerService)
    {
        $this->writerService = $writerService;
    }

    /**
     * Bind data to the view.
     *
     * @param  View  $view
     * @return void
     */
    public function compose(View $view)
    {
        $view->with('topic_status_count', $this->writerService->getTopicStatusCount());
    }

}
