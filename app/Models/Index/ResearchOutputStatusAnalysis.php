<?php

namespace App\Models\Index;

use App\Models\City;
use App\Models\Country;
use App\Models\County;
use App\Models\Province;
use App\Models\RuralDistrict;
use Facades\Verta;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

// Table 35 Model
class ResearchOutputStatusAnalysis extends Model
{
    use HasFactory, SoftDeletes;

    protected $guarded = [];

    protected $table = "gostaresh_research_output_status_analyses";

    public function country()
    {
        return $this->belongsTo(Country::class, 'country_id');
    }

    public function province()
    {
        return $this->belongsTo(Province::class, 'province_id');
    }

    public function county()
    {
        return $this->belongsTo(County::class, 'county_id');
    }

    public function city()
    {
        return $this->belongsTo(City::class, 'city_id');
    }

    public function ruralDistrict()
    {
        return $this->belongsTo(RuralDistrict::class, 'rural_district_id');
    }

    public function scopeWhereRequestsQuery($query)
    {
        if (request()->province_id)
            $query->where('province_id', request()->province_id);

        if (request()->county_id)
            $query->where('county_id', request()->county_id);

        if (request()->city_id)
            $query->where('city_id', request()->city_id);

        if (request()->rural_district_id)
            $query->where('rural_district_id', request()->rural_district_id);

        if (request()->input('start_date')) {
            $startDateJ = Verta::instance(request()->input('start_date'));
            $startMonth = (int)$startDateJ->format('n');
            $startYear = (int)$startDateJ->format('Y');
            $query->where('year', '>', $startYear)->orWhere(function ($query) use ($startYear, $startMonth) {
                $query->where('year', $startYear)->where('month', '>', $startMonth);
            });
        }

        if (request()->input('end_date')) {
            $endDateJ = Verta::instance(request()->input('end_date'));
            $endMonth = (int)$endDateJ->format('n');
            $endYear = (int)$endDateJ->format('Y');
            $query->where('year', '<=', $endYear)->orWhere(function ($query) use ($endYear, $endMonth) {
                $query->where('year', $endYear)->where('month', '<=', $endMonth);
            });
        }

        if (request()->year) {
            $query->where('year', request()->year);
        }

        $query = filterByOwnProvince($query);

        return $query;
    }

    public static $numeric_fields = [
        "number_of_valid_scientific_articles",
        "number_of_valid_books",
        "number_of_authored_books",
        "number_of_internal_inventions",
        "number_of_international_inventions",
        "number_of_theses",
        "number_of_research_dissertations",
        "number_of_compiled_dissertations",
        "number_of_invented_dissertations",
        "number_of_product_dissertations",
        "number_of_completed_research_projects",
        "number_of_theorizing_chairs",
        "number_of_memoranda_of_understanding",
        "amount_of_national_contracts_concluded",
        "amount_of_local_contracts_concluded",
        "number_of_scientific_journals",
        "number_of_R&D_research",
        "number_of_innovative_ideas",
    ];

    public static $filterColumnsCheckBoxes = [
        "unit"                                   => "واحد",
        "number_of_valid_scientific_articles"    => "تعداد مقالات معتبر علمی",
        "number_of_valid_books"                  => "تعداد کتب معتبر",
        "number_of_authored_books"               => "تعداد کتب تالیفی",
        "number_of_internal_inventions"          => "تعداد اختراعات ثبت شده داخلی",
        "number_of_international_inventions"     => "تعداد اختراعات ثبت شده بین المللی",
        "number_of_theses"                       => "تعداد پایان نامه ها",
        "number_of_research_dissertations"       => "تعداد پایان نامه های منجر به مقاله علمی-پژوهشی",
        "number_of_compiled_dissertations"       => "تعداد پایان نامه های تدوین شده بر اساس نظام موضوعات برنامه های علمی دانشگاه",
        "number_of_invented_dissertations"       => "تعداد پایان نامه های منجر به ثبت اختراع",
        "number_of_product_dissertations"        => "تعداد پایان نامه های منجر به محصول",
        "number_of_completed_research_projects"  => "تعداد طرح های تحقیقاتی خاتمه یافته",
        "number_of_theorizing_chairs"            => "تعداد کرسی های نظریه پردازی برگزار شده توسط اساتید واحد دانشگاهی",
        "number_of_memoranda_of_understanding"   => "تعداد تفاهمنامه ها با صنایع و سازمان‌های محلی/ملی",
        "amount_of_national_contracts_concluded" => "مبلغ قراردهای منعقد شده با صنایع و سازمان‌های ملی",
        "amount_of_local_contracts_concluded"    => "مبلغ قراردهای منعقد شده با صنایع و سازمان‌های محلی",
        "number_of_scientific_journals"          => "تعداد مجلات علمی",
        "number_of_R&D_research"                 => "تعداد پژوهش های معطوف به R &D",
        "number_of_innovative_ideas"             => "تعداد طرح ها و ایده های فناورانه و نوآورانه تجاری سازی شده",
    ];
}
