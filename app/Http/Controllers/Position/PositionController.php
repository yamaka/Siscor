<?php

namespace Siscor\Http\Controllers\Position;

use Illuminate\Http\Request;
use Siscor\Http\Controllers\Controller;
use Siscor\Position;
use Siscor\Unit;
use Yajra\DataTables\DataTables;

class PositionController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(Request $request)
    {
        if ($request->ajax()) {
            $positions = Position::select(['id', 'name', 'description'])->get();
            return $this->getData( $positions);
        }
        return view('Position.index');
    }

    protected function getData($data)
    {
        return DataTables::of($data)
            ->addColumn('action', function($position){
                return '<a href="#" class="btn btn-xs btn-primary edit" id="'.$position->id.'">
                            <i class="fa fa-edit"></i> Edit</a>
                            <a href="#" class="btn btn-xs btn-primary delete" id="'.$position->id.'">
                            <i class="fa fa-remove"></i> Eliminar</a>';
            })
            ->toJson();
    }

    public function all(Request $request)
    {
        $positions = Position::unitidIs($request->unit_id)->get();
        // $positions = Position::select(['id', 'name', 'description'])->get();
        $valid_positions = [];
        foreach ($positions as $id => $position) {
            $valid_positions[] = ['id' => $position->id, 'text' => $position->name];
        }
        array_unshift($valid_positions, "");
        return response()->json($valid_positions);
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

        $position = new Position();
        $position->name = $request->name;
        $position->description = $request->description;
        $position->unit_id = $request->unit;
        $direction = Unit::find($request->unit)->Direction->id;
        $position->direction_id = $direction;
        $position->save();
        return redirect()->route('Unit.index');
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
        $unit = Position::find($id);
        return response()->json($unit);
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



        $position = Position::find($id);
        $position->name = $request->name;
        $position->description = $request->description;
        $position->unit_id = $request->unit;
        $direction = Unit::find($request->unit)->Direction->id;
        $position->direction_id = $direction;
        $position->update();
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
        $res = Unit::findOrFail($id)->delete();
        return response()->json('succes');
    }
}
