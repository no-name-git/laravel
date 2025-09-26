<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;
use App\Models\User;

class IsAdmin
{
    /**
     * Handle an incoming request.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \Closure(\Illuminate\Http\Request): (\Illuminate\Http\Response|\Illuminate\Http\RedirectResponse)  $next
     * @return \Illuminate\Http\Response|\Illuminate\Http\RedirectResponse
     */
    public function handle(Request $request, Closure $next)
    {
        if(auth()->user()->admin !== User::ROLE_ADMIN){
            return redirect()->back();            
        }
        return $next($request);
        //частично понял как это работает 
        //если СКОРЕЕ ВСЕГО auth это миделвар у которого мы спрашиваем юзер 
        // с полем "admin" не имеет и тут уже дергаем из модели константу
        //то мы запос возвращяем туда откуда о пришел, а если все соответствует то
        //миделвеир пропускает запрос
        
    }
}
