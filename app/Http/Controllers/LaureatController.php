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
        $create = laureat::create($request->all());
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

        $post = laureat::find($id);
        if($post->count()){
            $post->update($request->all());
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