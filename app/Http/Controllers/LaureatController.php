<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\laureat;
class LaureatController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return IlluminateHttpResponse
     */
    public function __construct()
    {
        $this->$this->middleware('auth');
    }
    public function home(){
        return view('vueApp');
    }

    public function index()
    {
        return laureat::orderBy('id','DESC')->get();

    }

    /**
     * Show the form for creating a new resource.
     *
     * @return IlluminateHttpResponse
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  IlluminateHttpRequest  $request
     * @return IlluminateHttpResponse
     */
    public function store(Request $request)
    {
        $this->validate($request, [
            'nom' => 'required',
            'prenom' => 'required',
            'email' => 'required|email|unique:laureats',
            'cne' => 'required|numeric',
            'cin' => 'required',
            'telephone' =>'required|numeric',
            'nationalite' => 'required',
            'promo' => 'required',
            'pays' => 'required',
            'ville' => 'required',


        ]);
        \Log::info($request->all());
        $exploded=explode(',',$request->image);
        $decoded=base64_decode($exploded[1]);
        if(str_contains($exploded[0],'jpeg')){
            $exte='png';
        }else{
            $exte='jpg';
        }
        $filename=str_random().'.'.$exte;
        $path=public_path().'/'.$filename;
        file_put_contents($path,$decoded);


        $create = laureat::create($request->except('image')+[
                'image'=>$filename]);
        return response()->json(['status' => 'success','msg'=>'post created successfully']);

    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return IlluminateHttpResponse
     */
    public function show($id)
    {
        return laureat::find($id);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return IlluminateHttpResponse
     */
    public function edit($id)
    {
        return laureat::find($id);

    }

    /**
     * Update the specified resource in storage.
     *
     * @param  IlluminateHttpRequest  $request
     * @param  int  $id
     * @return IlluminateHttpResponse
     */
    public function update(Request $request, $id)
    {
        $this->validate($request, [
            'nom' => 'required',
            'prenom' => 'required',
            'email' => 'required',
            'cne' => 'required',
            'promo' => 'required',
        ]);
        \Log::info($request->all());
        $exploded=explode(',',$request->image);
        $decoded=base64_decode($exploded[1]);
        if(str_contains($exploded[0],'jpeg')){
            $exte='png';
        }else{
            $exte='jpg';
        }
        $filename=str_random().'.'.$exte;
        $path=public_path().'/'.$filename;
        file_put_contents($path,$decoded);

        $post = laureat::find($id);
        if($post->count()){
            $post->update($request->except('image')+[
                    'image'=>$filename
                ]);
            return response()->json(['statur'=>'success','msg'=>'Post updated successfully']);
        } else {
            return response()->json(['statur'=>'error','msg'=>'error in updating post']);
        }
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return IlluminateHttpResponse
     */
    public function destroy($id)
    {
        $post = laureat::find($id);
        if($post->count()){
            $post->delete();
            return response()->json(['statur'=>'success','msg'=>'Post deleted successfully']);
        } else {
            return response()->json(['statur'=>'error','msg'=>'error in deleting post']);
        }
    }
}