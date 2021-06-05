<?php

namespace App\Http\Middleware;

use Illuminate\Http\Middleware\TrustHosts as Middleware;

class TrustHosts extends Middleware
{
    /**
     * Get the host patterns that should be trusted.
     *
     * @return array
     */
    public function hosts()
    {
        return [
            '163.172.8.204',
            '62.210.203.134',
            'beinhealthapi.panarab-media.com', 
            $this->allSubdomainsOfApplicationUrl(),
        ];
    }
}
