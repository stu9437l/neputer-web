<?php

namespace Neputer\Services;

use App\Helper\ViewHelper;
use Carbon\Carbon;
use http\Env\Request;
use Neputer\Entities\Ads;
use Neputer\Entities\AdSection;

/**
 * Class AdSectionService
 * @package Neputer\Services
 */
class AdSectionService extends BaseService
{

    public $ad_section_config;
    /**
     * The AdSection instance
     *
     * @var $model
     */
    protected $model;

    /**
     * AdSectionService constructor.
     * @param AdSection $adsection
     */
    public function __construct(AdSection $adsection)
    {
        $this->model = $adsection;
        $this->ad_section_config = config('neputer.page_ad_sections.page-group');
    }

    /**
     * @return array
     */

    public function getPageGroupList()
    {
        $data = [];
        foreach ($this->ad_section_config as $key => $page_group) {

            $data[$key] = $page_group['title'];

        }

        return $data;
    }

    public function adsReporting()
    {
        $data['ad_section_config'] = $this->ad_section_config;
        $data['ad_sections'] = $this->getPageGroupList();
        $data['ad_section_ad_count'] = [];
        foreach ($data['ad_sections'] as $ad_section_code => $ad_section_title) {
            $data['ad_section_ad_count'][$ad_section_code] = AdSection::where('section', 'like', $ad_section_code.'%')
                ->count();
        }

        $data['today'] = date('m/d/Y').' '.date('H:i');
        $data['total_ads'] = AdSection::count();
        $data['ads_expiring_today'] = \DB::select("SELECT count('id') as count FROM ad_placements 
              WHERE id NOT IN (
                SELECT id FROM ad_placements 
                WHERE end_date > NOW())");
        $data['ads_expiring_within_week'] = \DB::select("SELECT count('id') as ad_count FROM ad_placements WHERE end_date = DATE_ADD(CURDATE(), INTERVAL 5 DAY)");

        return $data;
    }

    public function make()
    {
        $data['today'] = ViewHelper::formatDate('m/d/Y', Carbon::today()->toDateString());
        $data['tomorrow'] = ViewHelper::formatDate('m/d/Y', Carbon::tomorrow()->toDateString());
        $data['start_time'] = '12:00 AM';
        $data['end_time'] = '12:00 PM';
        $data['page_group'] = $this->getPageGroupList();
        $data += $this->getPagesForPageGroup('home');
        $data += $this->getSectionsForPage('home:main-page');
        $data['ad-size'] = $this->ad_section_config['home']['page']['main-page']['sections']['Buttom-ad']['ad_dimension'];
        $data['ads'] = Ads::select('id', 'title')->orderBy('title')->get();

        return $data;
    }

    public function createAdPlacement(array $data)
    {
        $section = $this->getSectionKey($data);
        AdSection::create([
            'section' => $section,
            'advertisement_id' => $data['ad_id'],
            'created_by' => auth()->user()->id,
            'start_date'        => ViewHelper::formatDate('Y-m-d', $data['start_date']),
            'end_date'          => ViewHelper::formatDate('Y-m-d', $data['end_date']),
            'start_time'        => ViewHelper::formatDate('H:i:s', $data['start_time']),
            'end_time'          => ViewHelper::formatDate('H:i:s', $data['end_time']),
            'rank' => $this->getRank($section),
        ]);
    }

    public function updateAdPlacement(array $records)
    {
        $ids_not_to_remove = [];

        if (isset($records['ad_placement_id'])) {

            foreach ($records['ad_placement_id'] as $key => $ad_placement_id) {
                $data = [];

                $data['start_date'] = ViewHelper::formatDate('Y-m-d', $records['ad_placement_start_date'][$key]);
                $data['end_date'] = ViewHelper::formatDate('Y-m-d', $records['ad_placement_end_date'][$key]);
                $data['start_time'] = ViewHelper::formatDate('H:i:s', $records['ad_placement_start_time'][$key]);
                $data['end_time'] = ViewHelper::formatDate('H:i:s', $records['ad_placement_end_time'][$key]);
                $data['rank'] = $key + 1;

                $ids_not_to_remove[] = $ad_placement_id;
                $ad_placement = AdSection::find($ad_placement_id);
                $ad_placement->update($data);

            }

        }

        AdSection::where('section', $records['section'])->whereNotIn('id', $ids_not_to_remove)->delete();
    }

    protected function getPagesForPageGroup($pageGroup)
    {
        $data = [
            'pages' => []
        ];
        if (!$this->validateAdSectionPageGroup($pageGroup)) {
            return $data;
        }

        foreach ($this->ad_section_config as $page_group_key => $page_group) {
            if ($page_group_key == $pageGroup) {
                foreach ($page_group['page'] as $page_key => $page) {
                    $data['pages'][$page_key] = $page['title'];
                }
                break;
            }
        }

        return $data;
    }

    public function validateAdSectionPageGroup($page_group)
    {
        return array_key_exists($page_group, $this->ad_section_config);
    }

    protected function getSectionsForPage($page_path)
    {

        $data = [
            'sections' => []
        ];
        $tmp = explode(':', $page_path);

        foreach ($this->ad_section_config[$tmp[0]]['page'][$tmp[1]]['sections'] as $key => $section) {
            $data['sections'][$key] = $section['title'];
        }

        return $data;
    }

    protected function getSectionKey(array $request)
    {
        return $request['page_group'].':'.$request['page'].':'.$request['ad_section'];
    }

    protected function getRank($section)
    {
        if ($ad_section = AdSection::where('section', $section)->orderBy('rank', 'desc')->first()) {
            return $ad_section->rank + 1;
        }

        return 1;
    }

}
