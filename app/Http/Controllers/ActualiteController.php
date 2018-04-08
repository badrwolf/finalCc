<?php

namespace App\Http\Controllers;

use App\Actualite;
use Illuminate\Http\Request;

class ActualiteController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function __construct()
    {
        $this->$this->middleware('auth');
    }
    public function home(){
        return view('ActVue');
    }



    public function index()
    {
        return Actualite::orderBy('id','DESC')->get();

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
    {//validation
       /* $act=new Actualite();
        $expl=explode(',',$request->image);
        $decode=base64_decode($expl[1]);
        if(str_contains($expl[0])){
            $exte='png';
        }else{
            $exte='jpg';
        }
        $currenttime=Carbon::now()->timestamp;
        $filename=$currenttime.'.'.$exte;
        $filepath=public_path().'/'.$filename;
        file_put_contents($filepath,$decode);*/
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


        $create = Actualite::create($request->except('image')+[
            'image'=>$filename
            ]);
      //  $create->image=$filename;

        return response()->json(['status' => 'success','msg'=>'post created successfully']);


    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        return Actualite::find($id);

    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        return Actualite::find($id);

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




        $act = Actualite::find($id);
        if($act->count()){
            $act->update($request->except('image')+[
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
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $post = Actualite::find($id);
        if($post->count()){
            $post->delete();
            return response()->json(['statur'=>'success','msg'=>'Post deleted successfully']);
        } else {
            return response()->json(['statur'=>'error','msg'=>'error in deleting post']);
        }
    }
}
