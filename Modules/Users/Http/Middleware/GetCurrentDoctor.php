<?php

namespace Modules\Users\Http\Middleware;

use Closure;
use Illuminate\Http\Request;
use Illuminate\Session\SessionManager as Session;
use Illuminate\Support\Facades\Auth;
use Modules\Users\Entities\Doctors;

class GetCurrentDoctor
{

    protected $session;

    /**
     * Init new object.
     *
     * @param   Session $session
     *
     * @return  void
     */
    public function __construct(Session $session)
    {
        $this->session = $session;
    }

    /**
     * Handle an incoming request.
     *
     * @param Request $request
     * @param Closure $next
     * @return mixed
     */
    public function handle(Request $request, Closure $next)
    {
        $doctor_id = null;

        if (Auth::id()){
            $doctor = Doctors::where('user_id', Auth::id())->first();
            $doctor_id = $doctor ? $doctor->id : null;
        }

        $this->session->put('current_doctor', $doctor_id);

        return $next($request);
    }
}
