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
            return $this->getData($directions);
        }
        return view('Direction.index2');
    }

    public function getAllDirections(Request $request)
    {
        $offset = $request->offset ?? 0;
        $limit = $request->limit ?? 10;
        $sort = $request->sort ?? 'id';
        $order = $request->order ?? 'asc';
        $directions = Direction::select(['id', 'name', 'description'])->get();
        $total = Direction::all()->count();
        
        return response()->json(['directions' => $directions,'total'=>$total]);  
    }

    public function all ()
    {
        $directions = Direction::select(['id', 'name', 'description'])->get();

        $valid_directions = [];
        foreach ($directions as $id => $direction) {
            $valid_tags[] = ['id' => $direction->id, 'text' => $direction->name];
            $valid_directions[] = ['id' => $direction->id, 'text' => $direction->name];
        }
        array_unshift($valid_directions, "");
        return response()->json($valid_directions);
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
    public function update(Request $request, Direction $direction)
    {
        $direction = Direction::where('id','=', $direction->id)->first();
        $direction->name = $request->name;
        $direction->description = $request->description;
        $direction->save();
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy(Direction $direction)
    {
        $direction = Direction::find($direction->id);
        $direction->delete();
        return '';
    }
}
