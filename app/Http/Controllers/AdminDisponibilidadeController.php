<?php

namespace App\Http\Controllers;

use App\Disponibilidade;
use Carbon\Carbon;
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
                false,
                new \DateTime($disponibilidade->inicio),
                new \DateTime($disponibilidade->final),
                $disponibilidade->id,
                [
//                    'color' => '#ff0000',
                    'url' => route('admin.calendario.show',$disponibilidade->id),
//                    'eventClick' => 'click_test()',
                ]
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
        $input = $request->all();
        $inicio_exp = explode('-',$input['inicio']);
        $hora_exp = explode(':',$input['hora']);
        $hora_inicio = Carbon::create($inicio_exp[0],$inicio_exp[1],$inicio_exp[2],$hora_exp[0],$hora_exp[1],0,'America/Sao_Paulo');
        $hora_final = Carbon::create($inicio_exp[0],$inicio_exp[1],$inicio_exp[2],$hora_exp[0]+1,$hora_exp[1],0,'America/Sao_Paulo');
        $input['inicio'] = $hora_inicio;
//        $hora_cadastro->addHour();
        $input['final'] = $hora_final;
        $input['user_id'] = Auth::user()->id;
//        return $input;
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
        $user_id = Auth::user()->id;
        $disponibilidades = Disponibilidade::where('user_id',$user_id)->get();
        $disp_lista = [];
        foreach($disponibilidades as $key => $disponibilidade){
            $disp_lista[] = Calendar::event(
                "Disponivel",
                false,
                new \DateTime($disponibilidade->inicio),
                new \DateTime($disponibilidade->final),
                $disponibilidade->id,
                [
//                    'color' => '#ff0000',
                    'url' => route('admin.calendario.show',$disponibilidade->id),
//                    'eventClick' => 'click_test()',
                ]
            );
        }
        $calendar_details = \Calendar::addEvents($disp_lista);
        $evento = Disponibilidade::findOrFail($id);
        return view('admin.calendario.index', compact('calendar_details','evento'));
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
        $input = $request->all();
        $inicio_exp = explode('-',$input['inicio']);
        $hora_exp = explode(':',$input['hora']);
        $hora_inicio = Carbon::create($inicio_exp[0],$inicio_exp[1],$inicio_exp[2],$hora_exp[0],$hora_exp[1],0,'America/Sao_Paulo');
        $hora_final = Carbon::create($inicio_exp[0],$inicio_exp[1],$inicio_exp[2],$hora_exp[0]+1,$hora_exp[1],0,'America/Sao_Paulo');
        $input['inicio'] = $hora_inicio;
        $input['final'] = $hora_final;
        $input['user_id'] = Auth::user()->id;
//        return $input;
        Disponibilidade::findOrFail($id)->update($input);
        Session::flash('adminCalendarioSuccessMessage','Disponibilidade atualizada com sucesso!');
        return redirect(route('admin.calendario.index'));
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $disponibilidade = Disponibilidade::findOrFail($id);
        if($disponibilidade->marcado){
            Session::flash('adminCalendarioFailMessage','Favor, desmarcar o agendamento existente primeiro!');
            return redirect(route('admin.calendario.index'));
        }
        $disponibilidade->delete();
        Session::flash('adminCalendarioSuccessMessage','Disponibilidade removida com sucesso!');
        return redirect(route('admin.calendario.index'));
    }
}
