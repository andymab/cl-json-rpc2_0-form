<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class FormController extends Controller
{

    private function put_server($metod,$data,$return=1)
    {
        $url = 'http://127.0.0.1:8000/api/v1/endpoint'; // url, на который отправляется запрос
        $post_data = [
            'jsonrpc' => '2.0',
            'method' => 'FormProcedure@' . $metod,
            'params'=> $data,
            'id' => $return,
        ];
        $headers = ['Content-Type: application/json'];
        $data_json = json_encode($post_data);
        $curl = curl_init();
        curl_setopt($curl, CURLOPT_HTTPHEADER, $headers);
        curl_setopt($curl, CURLOPT_RETURNTRANSFER, 1);
        curl_setopt($curl, CURLOPT_VERBOSE, 1);
        curl_setopt($curl, CURLOPT_POSTFIELDS, $data_json);
        curl_setopt($curl, CURLOPT_URL, $url);
        curl_setopt($curl, CURLOPT_POST, true); // true - означает, что отправляется POST запрос
        return  curl_exec($curl);
    }

    /**
     * Display a listing of the resource.
     * 
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $forms = json_decode($this->put_server('getforms',[]));
        return view('form.index', compact('forms'));
    }

    /**
     * Show the form for creating a new resource.
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function create(Request $request)
    {
        $forms = json_decode($this->put_server('getform',['form_id'=>$request->id]))->result;
      //  dd(json_decode($forms->model));
        return view('form.create', compact('forms'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request,$id)
    {
        $this->put_server('storeformdata',['form_uid'=>$request->id,'formdata'=>$request->form],0);
        return redirect(route('form.index'))->with('success', 'Форма успешно обновлена');
    }

    /**
     * Display the specified resource.
     *
     * @param int $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $form =  $this->get_server('getforms',$id);
        return view('form.show', compact('form'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        return view('form.edit', compact('form'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param int $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
      $form = [];
        return redirect(route('form.show', compact('form')))->with('success', 'Форма успешно обновлена');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
      ///  $form->delete();
        return redirect(route('form.index'))->with('success', 'Форма успешно удалена');
    }
}
