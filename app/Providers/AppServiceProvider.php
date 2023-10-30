<?php

namespace App\Providers;



use Illuminate\Routing\ResponseFactory;
use Illuminate\Support\ServiceProvider;

class AppServiceProvider extends ServiceProvider
{
    /**
     * Register any application services.
     *
     * @return void
     */
    public function register()
    {
        // Create custom json success and errors responses with data, message, errors and code.

        ResponseFactory::macro('successResponse', function ($data = [], $message = null, int $code = 200, $headers = []){
            $response = [
                'success' => true,
                'data' => $data,
                'message' => $message,
            ];
            return response()->json($response, $code, $headers);
        });

        ResponseFactory::macro('errorResponse', function ($errors = [], string $message = null, int $code = 400){
            $response = [
                'success' => false,
                'data' => null,
                'errors' => $errors,
                'message' => $message,
            ];
            return response()->json($response, $code);
        });
    }

    /**
     * Bootstrap any application services.
     *
     * @return void
     */
    public function boot()
    {
        //
    }
}
