<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;
use Symfony\Component\HttpFoundation\Response;
use Illuminate\Support\Facades\Log;

class LogRequests
{
    /**
     * Handle an incoming request.
     *
     * @param  \Closure(\Illuminate\Http\Request): (\Symfony\Component\HttpFoundation\Response)  $next
     */
    public function handle(Request $request, Closure $next): Response
    {
        $data = [
            'url' => $request->url(),
            'fullUrl' => $request->fullUrl(),
            'method' => $request->method(),
            'ip' => $request->ip(),
            'headers' => $request->headers->all(),
            'body' => $request->all(),
        ];

        // dd($data);
        Log::info('Solicitud recibida: ', $data);

        return $next($request);
    }

    public function terminate(Request $request, Response $response): void
    {
        Log::info('Respuesta enviada: ', [
            'status' => $response->getStatusCode(),
            'content' => $response->getContent(),
            // 'headers' => $response->headers->all(),
            // 'body' => $response->getContent(),
        ]);
    }
}
