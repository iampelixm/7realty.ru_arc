<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\SiteSetting;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Schema;
use Spatie\MediaLibrary\MediaCollections\Models\Media;

class SiteSettingController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $settings = SiteSetting::all();
        //$thesettings = (object)SiteSetting::all()->pluck('value', 'name')->all();
        return view('admin.site_settings.index', compact('settings'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $setting = new SiteSetting;
        return view('admin.site_settings.item', compact('setting'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $valid = $request->validate(
            [
                'name' => 'required|string',
                'caption' => 'required|string'
            ]
        );
        if (!$valid) return back()->withInput();

        $record = new SiteSetting;
        $fields = Schema::getColumnListing($record->getTable());

        foreach ($fields as $field) {
            $record->$field = $request->input($field);
        }
        $record->save();

        return redirect(route('admin.sitesettings.show', $record));
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\SiteSetting  $siteSetting
     * @return \Illuminate\Http\Response
     */
    public function show(SiteSetting $sitesetting)
    {
        $setting = $sitesetting;
        return view('admin.site_settings.item', compact('setting'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\SiteSetting  $siteSetting
     * @return \Illuminate\Http\Response
     */
    public function edit(SiteSetting $sitesetting)
    {
        $setting = $sitesetting;
        return view('admin.site_settings.item', compact('setting'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\SiteSetting  $siteSetting
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, SiteSetting $sitesetting)
    {
        $valid = $request->validate(
            [
                'name' => 'required|string',
                'caption' => 'required|string'
            ]
        );
        if (!$valid) return back()->withInput();

        $record = $sitesetting;
        $fields = Schema::getColumnListing($record->getTable());

        foreach ($fields as $field) {
            $record->$field = $request->input($field);
        }
        $record->save();

        return redirect(route('admin.sitesettings.show', $record));
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\SiteSetting  $siteSetting
     * @return \Illuminate\Http\Response
     */
    public function destroy(SiteSetting $sitesetting)
    {
        $sitesetting->delete();
        return redirect(route('admin.sitesettings.index'));
    }

    public function mainPageBannerIndex()
    {
        $banner_model = SiteSetting::firstOrCreate(['name' => 'mainpage_show_banner']);
        $banner_model->addMediaCollection('MainPageBanner')
            ->singleFile();
        $items = $banner_model->getMedia('MainPageBanner');
        return view('admin.site_settings.mainpagebanner', compact('items'));
    }

    public function mainPageBannerUpload(Request $request)
    {
        if ($request->image) {
            //$path = 'site/mainpage/slider';
            //$photo = $request->image;
            //$uploaded_path = 'storage/' . $photo->store($path, 'public');
            $banner_model = SiteSetting::firstOrCreate(['name' => 'mainpage_show_banner']);

            $banner_model->addMediaFromRequest('image')
                ->withResponsiveImages()
                ->toMediaCollection('MainPageBanner');
        }
        return redirect(route('admin.sitesettings.mainpagebanner'));
    }
}
