<?php /** @noinspection ForgottenDebugOutputInspection */

/**
 * Created by PhpStorm
 * User: rafaelcardoso
 * Date: 10/01/21
 * Time: 18:53
 */
Route::group(['prefix' => '/caches'], function () {
    // http://localhost/caches/set-cache
    Route::get('/set-cache', function () {
        Cache::put('nome-1', 'rafão'); // key-value
        Cache::put('nome-2', 'rafão_10seg', 10); // com tempo de expiraçãp, em segundos
        Cache::put('nome-3', 'rafão_45seg', now()->addSeconds(45));
        Cache::driver('file')->put('nome-4', 'rafão_file'); // em outro driver
        Cache::set('nome-5', 'rafão_set'); // set() é um alias para put()
        Cache::set('nome-6', ['rafão_set']); // qlqr coisa seriavalble

        return 'oi';
    });

    // http://localhost/caches/get-cache
    Route::get('/get-cache', function () {
        return [
            'nome-1' => Cache::get('nome-1'),
            'nome-2' => Cache::get('nome-2', 'ja expirou OU nao existe'), // valor padrao
            'nome-3' => Cache::get('nome-3'),
            'nome-4' => Cache::driver('file')->get('nome-4'),
            'nome-5' => Cache::get('nome-5'),
            'nome-6' => Cache::get('nome-6'),
            // default pode ser uma função, mas so retorna valor default, nao cacheia nada
            'banks'  => Cache::get('banks', function () {
                return \App\Models\Bank::all()->toArray();
            }),
        ];
    });

    // http://localhost/caches/check-key
    Route::get('/check-key', function () {
        Cache::put('incrementando', 1);
        if (Cache::has('incrementando')) {
            Cache::increment('incrementando', 19);
        }
        Cache::put('decrementando', 25);
        if (Cache::has('decrementando')) {
            Cache::decrement('decrementando', 10);
        }

        dd(
            Cache::has('nome-2'),
            Cache::get('incrementando'),
            Cache::get('decrementando')
        );
    });

    // http://localhost/caches/remember
    Route::get('/remember', function () {
        // Se ainda nao existe/Valido, entao cacheia COM validade. Por fim, retorna do cache
        return Cache::remember('banks', 10, function () {
            return [
                'when'  => now(),
                'banks' => \App\Models\Bank::all()->toArray()
            ];
        });
    });

    // http://localhost/caches/remember-forever
    Route::get('/remember-forever', function () {
        // Se ainda nao existe, entao cacheia SEM validade. Por fim, retorna do cache
        return Cache::rememberForever('banks', function () {
            return [
                'when'  => now(),
                'banks' => \App\Models\Bank::all()->toArray()
            ];
        });
    });

    // http://localhost/caches/pull
    Route::get('/pull', function () {
        Cache::put('key-pull', 'pullado');
        return [
            // pull retorna o valor e delete do cache
            'pull' => Cache::pull('key-pull'),
            'get'  => Cache::get('pull'),
        ];
    });

    // http://localhost/caches/forget
    Route::get('/forget', function () {
        Cache::put('forget', 'forgetado');
        $forget = Cache::get('forget');
        // delete do cache
        Cache::forget('forget');
        return [
            'get_before' => $forget,
            'get_after'  => Cache::get('forget'),
        ];
    });

    // http://localhost/caches/flush
    Route::get('/flush', function () {
        Cache::put('k1', 'v1');
        Cache::put('k2', 'v2');
        Cache::put('k3', 'v3');
        Cache::put('k4', 'v4');
        Cache::put('k5', 'v5');

        // delete ALL caches
        Cache::flush();

        return [
            'k1' => Cache::get('k1'),
            'k2' => Cache::get('k2'),
            'k3' => Cache::get('k3'),
            'k4' => Cache::get('k4'),
            'k5' => Cache::get('k5'),
        ];
    });

    // http://localhost/caches/forever
    Route::get('/forever', function () {
        // put com validade ilimitada
        return [
            'forever' => Cache::forever('key-forever', 'value'),
            'get'     => Cache::get('key-forever', 'value'),
        ];
    });

    // http://localhost/caches/add
    Route::get('/add', function () {
        // Somente pode add uma vez, somente apos forget poder add again
        return [
            'add1'   => Cache::add('key-add', 'value', 1440),
            'add2'   => Cache::add('key-add', 'value', 1440),
            'forget' => Cache::forget('key-add'),
            'add3'   => Cache::add('key-add', 'value', 1440),
        ];
    });
});
