<?php

namespace App\Http\Controllers;

use Illuminate\Support\Facades\Lang;

class LocaleController extends Controller
{
    protected $previousRequest;
    protected $locale;

    public function switch($locale)
    {
        $this->previousRequest = \request()->create(url()->previous());
        $this->locale = $locale;

        $segments = $this->previousRequest->segments();

        if (array_key_exists($this->locale, config('locales.languages')))
        {
            $segments[0] = $this->locale;

            $newRoute = $this->translateRouteSegments($segments);

            return redirect()->to($this->buildNewRoute($newRoute));

        }
    }

    protected function translateRouteSegments($segments)
    {
        $translatedSegments = collect();

        foreach ($segments as $segment) {
            if ($key = array_search($segment, Lang::get('routes')))
            {
                $translatedSegments->push(__('routes.'. $key, [], $this->locale));
            }else{
                $translatedSegments->push($segment);
            }
        }
        return $translatedSegments;
    }

    protected function buildNewRoute($newRoute)
    {
        $redirectUrl = implode('/', $newRoute->toArray());

        $queryBag = $this->previousRequest->query();
        $redirectUrl .= count($queryBag) ? '?' .http_build_query($queryBag) : '';

        return $redirectUrl;
    }
}
