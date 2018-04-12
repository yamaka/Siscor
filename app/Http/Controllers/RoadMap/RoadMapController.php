<?php

namespace Siscor\Http\Controllers\RoadMap;

use Illuminate\Http\Request;
use Siscor\Http\Controllers\Controller;
use Siscor\Roadmap;
use Siscor\Direction;
use Siscor\Unit;
use Siscor\Position;
use Yajra\DataTables\DataTables;

use Auth;

class RoadMapController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(Request $request)
    {
        return view('RoadMap.index');
    }

    public function Data (Request $request)
    {
        $roadmaps = Roadmap::select(['id', 'status', 'reason', 'description'])->get();
        return Datatables::of($roadmaps)        
        ->addColumn('status', function($roadmap) {
            return '<span class="label label-warning">'.$roadmap->status.'</span>';
        })
        ->addColumn('action', function ($roadmap) { return
            '<div class="btn-group" style="margin:-3px 0;">
                <a href="RoadMap/'.$roadmap->id.'" class="btn btn-primary btn-raised btn-sm">&nbsp;&nbsp;<i class="glyphicon glyphicon-eye-open"></i>&nbsp;&nbsp;</a>
            </div>';})
        ->rawColumns(['status' => 'status','action' => 'action'])
        ->make(true);
    }
    // Nota:  va ser recibidos, cuando en la tabla de secuencias el campo derivado este en false
    //        y el id receptor sea igual al usuario que esta logueado
    //        y enviados cuando el camṕo derivado de la misma tabla sea true

    public function getAllRoadmaps(Request $request)
    {
        $offset = $request->offset ?? 0;
        $limit = $request->limit ?? 10;
        $sort = $request->sort ?? 'id';
        $order = $request->order ?? 'asc';
        $roadmaps = Roadmap::select(['id', 'status', 'reason', 'description'])->get();
        $total = Roadmap::all()->count();        
        return response()->json(['roadmaps' => $roadmaps,'total'=>$total]);  
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {

        $directions = Direction::pluck('name', 'id');
        $units = Unit::pluck('name', 'id');
        $positions = Position::pluck('name', 'id');

        return view('RoadMap.create')->with([
            'directions' => $directions,
            'units' => $units,
            'positions' => $positions
        ]);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        
        $user = Auth::user();

        $position = $user->Position;
        $unit = $position->unit;
        $direction = $position->direction;
        $roadmap = new Roadmap();
        $roadmap->direction_id = $direction->id;
        $roadmap->user_created_id = $user->id;
        $roadmap->user_modified_id = $user->id;
        $roadmap->reason = $request->reason;
        $roadmap->description = $request->description;
        $roadmap->status = 'inicializado';





    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $roadmap = Roadmap::where('id','=',$id)->first();
        
        return view('RoadMap.view', compact('roadmap'));
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
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
    }
}
