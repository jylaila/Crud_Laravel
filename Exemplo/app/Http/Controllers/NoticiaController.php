<?php

namespace App\Http\Controllers;

use App\Models\Noticia;
use App\User;
use Illuminate\Http\Request;

class NoticiaController extends Controller
{
   private $objNoticia;
   private $objUser;

   public function __construct()
   {
       $this->objNoticia = new Noticia();
       $this->objUser = new User();

   }

    public function index()
    {
       $noticia = $this->objNoticia->all()->sortBy("id");
       return view ('index', compact('noticia'));

    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $users=$this->objUser->all();
        return view('create', compact('users'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
       $cad = $this->objNoticia->create([
           'titulo'=>$request->titulo,
           'noticia'=>$request->noticia,
           'imagem'=>$request->imagem,
           'user_id'=>$request->user_id,
       ]);

       if($cad)
       {
           return redirect('noticia');
       }
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Noticia  $noticia
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $noticia = $this->objNoticia->find($id);
        return view('index', compact('noticia'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Noticia  $noticia
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $noticia = $this->objNoticia->find($id);
        $users = $this->objUser->all();
        return view('create', compact('noticia', 'users'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Noticia  $noticia
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        $this->objNoticia->where(['id'=>$id])->update([
            'titulo'=>$request->titulo,
           'noticia'=>$request->noticia,
           'imagem'=>$request->imagem,
           'user_id'=>$request->user_id,
        ]);
        return redirect('noticia');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Noticia  $noticia
     * @return \Illuminate\Http\Response
     */
    public function destroy(Request $noticia, $id)
    {
        $del = $this->objNoticia->destroy($id);
        return ($del)?"Sim":"Não";
    }
}
