<?php

namespace App\Http\Controllers;

use App\Disponibilidade;
use Illuminate\Http\Request;

use App\Http\Requests;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Session;
use Illuminate\Support\Facades\Validator;
use MaddHatter\LaravelFullcalendar\Calendar;

class AdminDisponibilidadeController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $user_id = Auth::user()->id;
        $disponibilidades = Disponibilidade::where('user_id',$user_id)->get();
        $disp_lista = [];
        foreach($disponibilidades as $key => $disponibilidade){
            $disp_lista[] = Calendar::event(
                "Disponivel",
                true,
                new \DateTime($disponibilidade->inicio),
                new \DateTime($disponibilidade->final .' +1 day'),
                $disponibilidade->id
            );
        }
        $calendar_details = \Calendar::addEvents($disp_lista);
//        return $disp_lista;
        return view('admin.calendario.index', compact('calendar_details'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
//        $validator = Validator::make($request->all(), [
//            'user_id'=>'required',
//            'inicio'=>'required',
//            'final'=>'required',
//        ]);
//        if($validator->fails()){
//            Session::flash('adminCalendarioFailMessage','Algo falhou!');
//            return redirect(route('admin.calendario.index'));
//        }
        $input = $request->all();
        $input['user_id'] = Auth::user()->id;
        Disponibilidade::create($input);
        Session::flash('adminCalendarioSuccessMessage','Disponibilidade agendada com sucesso!');
        return redirect(route('admin.calendario.index'));
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
    }
}
