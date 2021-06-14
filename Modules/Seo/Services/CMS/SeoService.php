<?php

namespace Modules\Seo\Services\CMS;

use Illuminate\Database\Eloquent\Model;
use Modules\Seo\Repositories\SeoRepository;
use Modules\Base\Services\Classes\LaravelServiceClass;
use Illuminate\Database\Eloquent\ModelNotFoundException;

class SeoService extends LaravelServiceClass
{
    private $seo_repo;

    public function __construct(
        SeoRepository $seo_repo
    ) {
        $this->seo_repo = $seo_repo;
    }

    public function storeSeo(array $data, int $seoable_id, string $seoable_type)
    {
        return  $this->seo_repo->create($data + compact('seoable_id', 'seoable_type'));
    }

    public function updateSeo(array $data, int $seoable_id, string $seoable_type)
    {
        try {
            $this->seo_repo->update('', $data + compact('seoable_id', 'seoable_type'), compact('seoable_id', 'seoable_type'), null);
        } catch (ModelNotFoundException $ex) {
            $this->seo_repo->create($data + compact('seoable_id', 'seoable_type'));
        }
    }

    public function deleteSeo(int $seoable_id, string $seoable_type)
    {
        $this->seo_repo->delete('', compact('seoable_id', 'seoable_type'), null);
    }
}
