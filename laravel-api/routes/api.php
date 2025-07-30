<?php
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Response;

Route::get('/users', function () {
    $users = DB::select("SELECT id, name, email FROM users LIMIT 1000");
    return Response::json($users);
});
