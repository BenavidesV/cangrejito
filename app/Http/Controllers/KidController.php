<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Kid;
use Auth;
use Validator;

class KidController extends Controller
{
    protected $kid;

    public function __construct(Kid $kid){
    $this->$kid = $kid;

    }

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
    //  $kids = Kid::where('user_id','=',Auth::user()->id)->get();
    //  return view('kids.index',compact('tasks',$kids));
    return view('kids.index');
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
         return view('kids.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
      $validator = Validator::make($request->all(), [
      'name'=>'required|string|min:2|max:35',
      'identification'=>'required|number|max:10',
      'age'=>'required|number',
      'gender'=>'required',
  ]);

  $kid = new Kid;

  if ($validator->fails()) {
    return redirect('kids/create')
                ->withErrors($validator)
                ->withInput();
    }

    $kid->name = $request->name;
    $kid->name = $request->name;
    $kid->identification = $request->identification;
    $kid->age = $request->age;
    $kid->relationship = $request->relationship;
    $kid->ethnicity = $request->ethnicity;
    $kid->gender = $request->gender;
    $kid->user_id = Auth::user()->id;
    $kid->save();
    return redirect('kids');

    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
      $kid = Kid::find($id);
     return View('kids.show',compact('kid',$kid));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $kid = Kid::find($id);
        return view('kids.edit',compact('kid',$kid));
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
      $kid = Kid::find($id);

      $validator = Validator::make($request->all(), [
      'name'=>'required|string|min:2|max:35',
      'identification'=>'required|number|max:10',
      'age'=>'required|number',
      'gender'=>'required',
    ]);
      if ($validator->fails()) {
    return redirect('kids/create')
                ->withErrors($validator)
                ->withInput();
        }

    $kid->name = $request->name;
    $kid->name = $request->name;
    $kid->identification = $request->identification;
    $kid->age = $request->age;
    $kid->relationship = $request->relationship;
    $kid->ethnicity = $request->ethnicity;
    $kid->gender = $request->gender;
    $kid->save();
    return redirect('kids');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
      Kid::find($id)->delete();
      return redirect()->route('kids.index')->with('success','Kid deleted successfully');
    }
}
