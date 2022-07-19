<?php

namespace App\Http\Controllers\Admin\Zone;

use App\Http\Controllers\Controller;
use App\Models\County;
use App\Models\Province;
use Illuminate\Http\Request;

class ZoneController extends Controller
{
    public function create(Request $request)
    {
        $provinces = Province::all();

        if (isset($request->province_id))
            $counties = County::where('province_id', $request->province_id)->get();
        else
            $counties = County::where('province_id', $provinces[0]->id)->get();

        return view('admin.zone.zone', compact('provinces', 'counties'));
    }

    public function store(Request $request)
    {
        $array = $request->except('province_id','_token');

        if(!in_array(1,$array))
            return back()->with('success','مناطق از عدد یک باید شروع شود');

        foreach ($array as $key => $value)
        {
            for ($i=1;$i<$value;$i++)
            {
                if (!in_array($i,$array))
                    return back()->with('success','ترتیب مناطق به درستی وارد نشده است.');
            }
        }

        $county_ids = array_keys($array);

        $counties = County::whereIn('id',$county_ids)->get();

        foreach ($counties as $county)
        {
            if (array_key_exists($county->id,$array))
            {
                $county->update([
                   'zone' => $array[$county->id]
                ]);
            }
        }
        return back()->with('success','مناطق استان با موفقیت اضافه شد.');
    }
}
