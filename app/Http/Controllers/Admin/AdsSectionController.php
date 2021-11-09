<?php

namespace App\Http\Controllers\Admin;

use App\Http\Requests\MenuSection\EditFormValidation;
use App\Model\Ads;
use App\Model\AdsSection;
use Carbon\Carbon;
use Illuminate\Http\Request;
class AdsSectionController extends BaseController
{
    protected $model;
    protected $base_route = 'admin.ads-section';
    protected $view_path = 'admin.ads_section';
    protected $panel = 'Ads Section';
    protected $now;

    public function __construct()
    {
        $this->model = new AdsSection();
        $currentDate = Carbon::now();
        $this->now = $currentDate->toDateString();
    }

    public function index(Request $request)
    {

        $data = [];
        $data['rows'] = $this->model
            ->select(
                'id', 'created_at','updated_at','title','slug','hint')
            ->get();
        return view(parent::loadDefaultViewPath($this->view_path.'.index'), compact('data'));
    }

    public function edit(Request $request, $id)
    {

        $data = [];
        $data['row'] = $this->model->find($id);
        $now = $this->now;
        if (!$data['row']) {
            $request->session()->flash('error_message', 'Invalid request.');
            return redirect()->route($this->base_route.'.index');
        }
        $data['ads_section_ads'] = $data['row']->ads()->select('ads.id','start_date','end_date')->orderBy('rank')->get();
        $data['ads'] = ['0' => 'Select Ad'] + Ads::orderBy('title')->pluck('title', 'id')->toArray();
        return view(parent::loadDefaultViewPath($this->view_path.'.edit'), compact('data', 'now'));
    }

    public function update(EditFormValidation $request, $id)
    {

        $data = [];
        $data['row'] = $this->model->find($id);
        if (!$data['row']) {
            $request->session()->flash('error_message', 'Invalid request.');
            return redirect()->route($this->base_route.'.index');
        }
        $data['row']->update($request->except(['_token', '_method', 'id']));

        // update pages
        $data['row']->ads()->sync([]);
        $ads_ids = $request->get('ad');
      /*  dd($ads_ids);*/
        $start_dates = $request->get('start_date');
        $end_dates = $request->get('end_date');

        if($ads_ids) {
            $ads_data = [];
            foreach ($ads_ids as $key => $ads_id) {
                if ($ads_id && !array_key_exists($ads_id, $ads_data)) {
                    $ads_data[$ads_id] = [
                        'rank' => $key + 1,
                        'created_at' => Carbon::now(),
                        'updated_at' => Carbon::now(),
                        'start_date' =>  $start_dates[$key],
                        'end_date' =>  $end_dates[$key],
                    ];
                }
            }
            $data['row']->ads()->sync($ads_data);
        }
        $request->session()->flash('success_message', $this->panel.' updated successfully.');
        return parent::requestRedirect($request, $id);
    }

    public function loadAdHtml()
    {
        $response = [];
        $response['html'] = view($this->view_path.'.edit.ad_row', [
            'ads' => ['0' => 'Select Ad'] + Ads::orderBy('title', 'asc')->select('id', 'title')->pluck('title', 'id')->toArray()
        ])->render();

        return response()->json($response);
    }
}
