<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\JsonResponse;

class CorsMiddleware
{
    /**
     * Handle an incoming request.
     *
     * @param \Illuminate\Http\Request $request
     * @param \Closure                 $next
     *
     * @return mixed
     */
    public function handle($request, Closure $next)
    {
        // TODO: Should check whether route has been registered
        if ($this->isPreflightRequest($request)) {
            $response = $this->createEmptyResponse();
        } else {    
            $response = $next($request);
        }

        return $this->addCorsHeaders($request, $response);
    }

    /**
     * Determine if request is a preflight request.
     *
     * @param \Illuminate\Http\Request $request
     *
     * @return bool
     */
    protected function isPreflightRequest($request)
    {
        //dd($request->isMethod('OPTIONS'));
        return $request->isMethod('OPTIONS');
    }

    /**
     * Create empty response for preflight request.
     *
     * @return \Illuminate\Http\Response
     */
    protected function createEmptyResponse()
    {  
        $headers = [ 'Content-Type' => 'application/json; charset=utf-8' ];
        return new JsonResponse(null, 204, $headers, JSON_UNESCAPED_UNICODE);
    }

    /**
     * Add CORS headers.
     *
     * @param \Illuminate\Http\Request  $request
     * @param \Illuminate\Http\Response $response
     */
    protected function addCorsHeaders($request, $response)
    {
        // if(strpos($request->getPathInfo(), '/company/document/')!==FALSE){
        //     return $response;
        // }
        
        foreach ([
            'Access-Control-Allow-Origin' => '*',
            'Access-Control-Max-Age' => (60 * 60 * 24),
            'Access-Control-Allow-Headers' => $request->header('Access-Control-Request-Headers'),
            'Access-Control-Allow-Methods' => $request->header('Access-Control-Request-Methods')
                ?: 'GET, HEAD, POST, PUT, PATCH, DELETE, OPTIONS',
            'Access-Control-Allow-Credentials' => 'true',
        ] as $header => $value) {
            $response->headers->set($header, $value);
        }


        return $response;
    }
}
