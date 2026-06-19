<?php

namespace App\Models;


use App\Http\Traits\Translatable;
use Illuminate\Support\Facades\DB;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Scope;
use Illuminate\Database\Eloquent\Builder;

class Template extends Model implements Scope
{

//    use Translatable;

    protected $casts = [
        'description' => 'object'
    ];

    public function apply(Builder $builder, Model $model)
    {
//        $builder->where('is_read', false);
    }

    public function scopeTemplateMedia()
    {
        try {
            DB::connection()->getPdo();
            $media = TemplateMedia::where('section_name', $this->section_name)->first();
            if (!$media) {
                return null;
            }
            return $media->description;
        } catch (\Exception $e) {

        }
    }

    public function scopeSetLang()
    {
        $lang = app()->getLocale();
        try {
            DB::connection()->getPdo();
            $languageId = Language::where('short_name', $lang)->first();
            $defaultLang = Language::first();
            if ($languageId) {
                return $this->where('language_id', $languageId->id);
            } else {
                return $this->where('language_id', $defaultLang->id);
            }

        } catch (\Exception $e) {

        }
    }

}
