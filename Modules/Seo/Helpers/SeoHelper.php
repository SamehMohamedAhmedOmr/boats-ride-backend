<?php
namespace Modules\Seo\Helpers;

class SeoHelper
{
    public function validationRules()
    {
        return [
            'seo.title.*'=>'array|size:2',
            'seo.title.en'=>'string',
            'seo.title.ar'=>'string',
            'seo.description.*'=>'array|size:2',
            'seo.description.en'=>'string',
            'seo.description.ar'=>'string',
            'seo.keywords.*'=>'array|size:2',
            'seo.keywords.en'=>'array',
            'seo.keywords.ar'=>'array',
            'seo.keywords.en.*'=>'string',
            'seo.keywords.ar.*'=>'string',
        ];
    }
}
