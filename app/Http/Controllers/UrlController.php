<?php


namespace App\Http\Controllers;


use App\Http\Helper\Functions;
use App\Models\Url;
use http\Env\Response;
use Illuminate\Http\Request;


class UrlController extends Controller
{
    use Functions;
    public function index()
    {
        return Url::all();

    }

    public function store(Request $request)
    {
        //Gera um cógido para cada URL
        $codigo = $this->geraCodigo(6);

        return response()
            ->json(
                Url::create(["url"=>$request->url,"codigo" => $codigo]),
                201
            );
    }

    private function buscaUrl($codigo)
    {
        //Busca a url pelo código dela
       $url = Url::where(['codigo'=> $codigo])->get();

       if($url == []){
           return "www.google.com";
       }
       return $url[0]['url'];
    }

    public function go(Request $request)
    {
        $codigo = $request->codigo;
       $url = $this->buscaUrl($codigo);

        return redirect($url, 302);
    }


}
