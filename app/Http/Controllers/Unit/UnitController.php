<?php

namespace Siscor\Http\Controllers\Unit;

use Illuminate\Http\Request;
use Siscor\Direction;
use Siscor\Http\Controllers\Controller;
use Siscor\Unit;
use Yajra\DataTables\DataTables;

class UnitController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(Request $request)
    {

        if ($request->ajax()) {
            $units = Unit::select(['id', 'name', 'description'])->get();
            return $this->getData( $units);
        }
        return view('Unit.index');
    }

    protected function getData($data)
    {
        return DataTables::of($data)
            ->addColumn('action', function($unit){
                return '<a href="#" class="btn btn-xs btn-primary edit" id="'.$unit->id.'">
                            <i class="fa fa-edit"></i> Edit</a>
                            <a href="#" class="btn btn-xs btn-primary delete" id="'.$unit->id.'">
                            <i class="fa fa-remove"></i> Eliminar</a>';
            })
            ->toJson();
    }

    public function all()
    {
        $units = Unit::select(['id', 'name', 'description'])->get();
        $valid_units = [];
        foreach ($units as $id => $unit) {
            $valid_units[] = ['id' => $unit->id, 'text' => $unit->name];
        }
        array_unshift($valid_units, "");
        return response()->json($valid_units);
    }
    
    public function unitsDirection( $idDirection)
    {
        $direction = Direction::find($idDirection);
        $units = $direction->units;
        return response()->json($units);
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
        $unit = new Unit();
        $unit->name = $request->name;
        $unit->description = $request->description;
        $unit->direction_id = $request->direction;
        $unit->save();
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
        $unit = Unit::findOrFail($id);
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
        $unit = Unit::find($request->id);
        $unit->name = $request->name;
        $unit->description = $request->description;
        $unit->direction_id = $request->direction;
        $unit->save();
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
        $res = Unit::find($id)->delete();
        return response()->json('succes');
    }
}
