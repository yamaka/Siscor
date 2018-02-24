<?php

namespace Siscor\Http\Controllers\Direction;

use Illuminate\Http\Request;
use Siscor\Direction;
use Siscor\Http\Controllers\Controller;
use Symfony\Component\Routing\Route;
use Yajra\DataTables\DataTables;

class DirectionController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(Request $request)
    {
        if ($request->ajax()) {
            $directions = Direction::select(['id', 'name', 'description'])->get();
            return $this->getData($request, $directions);
        }
        return view('Direction.index');
    }

    protected function getData(Request $request, $data)
    {
        return DataTables::of($data)
            ->addColumn('action', function($direction){
                return '<a href="#" class="btn btn-xs btn-primary edit" id="'.$direction->id.'">
                            <i class="fa fa-edit"></i> Edit</a>
                            <a href="#" class="btn btn-xs btn-primary delete" id="'.$direction->id.'">
                            <i class="fa fa-remove"></i> Eliminar</a>';
            })
            ->toJson();
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
        $direction = new Direction();
        $direction->fill($request->toArray());
        $direction->save();
        return redirect()->route('Direction.index');
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
        $direction = Direction::findOrFail($id);
            return response()->json($direction);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request)
    {

        $direction = Direction::findOrFail($request->id);
        $direction->fill($request->toArray());
        $direction->save();

        return response()->json("succes");

    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $res = Direction::findOrFail($id)->delete();
        return response()->json('succes');
    }
}
