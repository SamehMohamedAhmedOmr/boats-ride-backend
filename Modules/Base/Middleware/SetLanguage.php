<?php

namespace Modules\Base\Middleware;

use Closure;
use Illuminate\Foundation\Application as App;
use Illuminate\Http\Request;
use Illuminate\Session\SessionManager as Session;

class SetLanguage
{
    protected $app;
    protected $session;

    /**
     * Init new object.
     *
     * @param   App $app
     * @param   Session $session
     *
     * @return  void
     */
    public function __construct(App $app, Session $session)
    {
        $this->app = $app;
        $this->session = $session;
    }

    /**
     * Handle an incoming request.
     *
     * @param  Request  $request
     * @param Closure $next
     * @return mixed
     */
    public function handle($request, Closure $next)
    {
        $acceptLanguage = $request->header('Accept-Language');
        $default = false;

        if (in_array($acceptLanguage, config('base.supported_languages'))){
            $locale = $acceptLanguage;
        }
        else{
            $locale =  config('base.default_language');
            $default = true;
        }

        $this->app->setLocale($locale);
        $this->session->put('locale', ($default) ? 'all' : $locale);

        return $next($request);
    }
}
