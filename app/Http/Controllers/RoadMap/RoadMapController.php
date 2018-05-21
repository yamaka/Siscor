<?php

namespace Siscor\Http\Controllers\RoadMap;

use Illuminate\Http\Request;
use Siscor\Action;
use Siscor\Http\Controllers\Controller;
use Siscor\Roadmap;
use Siscor\Direction;
use Siscor\Sequence;
use Siscor\Unit;
use Siscor\Position;
use Siscor\User;

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

       $roadmap_ids = Sequence::where('remitter_user_id', Auth::user()->id)
                            //->where('remitter_user_id', 2)
                            ->where('derivated', false)
                            ->select('roadmap_id')
                            ->groupBy('roadmap_id')
                            ->get()->toArray();

        $roadmaps = Roadmap::select(['id', 'status', 'reason', 'description'])->whereIn('id', $roadmap_ids)->get();
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

    public function Sequence_by_Roadmap(Request $request)
    {
        $sequences = Sequence::where('roadmap_id', $request['id'])->select('id','roadmap_id', 'action_id', 'remitter_user_id', 'receiver_user_id', 'derivated', 'order', 'user_created_id', 'created_at', 'updated_at')->orderBy('id','asc')->get();
        return Datatables::of($sequences)
        ->editColumn('direction', function($sequence){
            $user = User::where('id', $sequence->remitter_user_id)->first();
            $positionUser = Position::where('id', $user->position_id)->first();
            $directionUser = Direction::where('id', $positionUser->direction_id)->first();
            return ($directionUser->name);
        })
        ->editColumn('position', function($sequence) {
            $user = User::where('id', $sequence->remitter_user_id)->first();
            $positionUser = Position::where('id', $user->position_id)->first();
            return ($positionUser->name);
        })
        ->editColumn('unit', function($sequence) {
            $user = User::where('id', $sequence->remitter_user_id)->first();
            $positionUser = Position::where('id', $user->position_id)->first();
            $unitUser = Unit::where('id', $positionUser->unit_id)->first();
            return ($unitUser->name);
        })
        ->editColumn('nameRoadmap', function($sequence) {
            $roadmap = RoadMap::where('id', $sequence->roadmap_id)->first();
            return ($roadmap->reason);
        })
        ->make(true);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {

        $directions = Direction::pluck('name', 'id');
        $positions = Position::pluck('name', 'id');
        $units = Unit::pluck('name', 'id');
        $actions = Action::pluck('name', 'id');
        $users = User::pluck('name', "id");
        $directionsFormat = [];
        $positionsFormat = [];
        $unitsFormat = [];
        $actionsFormat = [];
        $usersFormat = [];

        $i = 0;
        foreach($directions as $key => $direction){
            $directionsFormat[$i] = array("value" => $key, "text" => $direction);
            $i++;
        }

        $i = 0;
        foreach($positions as $key => $position){
            $positionsFormat[$i] = array("value" => $key, "text" => $position);
            $i++;
        }

        $i = 0;
        foreach( $units as $key => $unit){
            $unitsFormat[$i] = array("value" => $key, "text" => $unit);
            $i++;
        }


        $i = 0;
        foreach( $actions as $key => $action){
            $actionsFormat[$i] = array("value" => $key, "text" => $action);
            $i++;
        }


        $i = 0;
        foreach( $users as $key => $user){
            $usersFormat[$i] = array("value" => $key, "text" => $user);
            $i++;
        }
        return view('RoadMap.createVue')->with([
            'directions' => $directionsFormat,
            'units' => $unitsFormat,
            'positions' => $positionsFormat,
            'users' => $usersFormat,
            'actions' => $actionsFormat
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
       /*  dd(json_decode($request->getContent(), true)); */
        /* dd($request->input('direction_id')["value"]); */
        $user = Auth::user();
        $position = $user->Position;
        $unit = $position->unit;
        $direction = $position->direction;
//        new road map code default
        $roadmap = new Roadmap();
        $roadmap->direction_id = $direction->id;
        $roadmap->user_created_id = $user->id;
        $roadmap->user_modified_id = $user->id;
        $roadmap->reason = $request->input('reason');
        $roadmap->description = $request->input('description');
        $roadmap->status = 'inicializado';
        $roadmap->code_direction = 1;
        $roadmap->save();
//        first derived default created road map in sequence
        $sequence = new Sequence();
        $sequence->roadmap_id =  $roadmap->id;
        $sequence->remitter_user_id = Auth::user()->id;
        $sequence->receiver_user_id = $request->input('receiver')["value"];
        $sequence->action_id = $request->input('action')["value"];
        $sequence->derivated = true;
        $sequence->order = 1;
        $sequence->user_created_id = Auth::user()->id;
        $sequence->user_modified_id = Auth::user()->id;
        $sequence->save();

        $sequence = new Sequence();
        $sequence->roadmap_id =  $roadmap->id;
        $sequence->remitter_user_id = $request->input('receiver')["value"];
        $sequence->receiver_user_id = null;
        $sequence->derivated = false;
        $sequence->order = 2;
        $sequence->user_created_id = Auth::user()->id;
        $sequence->user_modified_id = Auth::user()->id;
        $sequence->save();

    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $user = Auth::user();
        $position = $user->Position;
        $unit = $position->unit;
        $direction = $position->direction;
        $roadmap = Roadmap::where('id','=',$id)->first();
        $sequence = Sequence::Where('roadmap_id', $id )->get();

        $directions = Direction::pluck('name', 'id');
        $positions = Position::pluck('name', 'id');
        $units = Unit::pluck('name', 'id');
        $actions = Action::pluck('name', 'id');
        $users = User::pluck('name', "id");
        $directionsFormat = [];
        $positionsFormat = [];
        $unitsFormat = [];
        $actionsFormat = [];
        $usersFormat = [];

        $i = 0;
        foreach($directions as $key => $dir){
            $directionsFormat[$i] = array("value" => $key, "text" => $dir);
            $i++;
        }

        $i = 0;
        foreach($positions as $key => $pos){
            $positionsFormat[$i] = array("value" => $key, "text" => $pos);
            $i++;
        }

        $i = 0;
        foreach( $units as $key => $uni){
            $unitsFormat[$i] = array("value" => $key, "text" => $uni);
            $i++;
        }

        $i = 0;
        foreach( $actions as $key => $act){
            $actionsFormat[$i] = array("value" => $key, "text" => $act);
            $i++;
        }

        $i = 0;
        foreach( $users as $key => $us){
            $usersFormat[$i] = array("value" => $key, "text" => $us);
            $i++;
        }    
        
        return view('RoadMap.view', compact('roadmap', 'sequence', 'direction','directionsFormat', 'positionsFormat', 'unitsFormat', 'actionsFormat','usersFormat'));
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

    public function derive(Request $request)
    {

        $user = Auth::user();
        $position = $user->Position;
        $unit = $position->unit;
        $direction = $position->direction;
        $roadmap = Roadmap::find($request->input('roadmap_id'));
        $roadmap->user_modified_id = $user->id;
        $roadmap->status = 'proceso'; // here is custom for the user
        $roadmap->save();
        $order = 0;
        $sequence = Sequence::where('roadmap_id', $request->input('roadmap_id'))
                            ->where('remitter_user_id', Auth::user()->id)
                            //->where('remitter_user_id', 2)
                            ->where('derivated', false)
                            ->first();
        
        $sequence->receiver_user_id = $request->input('receiver')["value"];
        $sequence->derivated = true;
        $sequence->user_modified_id = Auth::user()->id;
        $sequence->action_id = $request->input('action')["value"];
        $sequence->save();

        $order = $sequence->order;
        $sequence = new Sequence();
        $sequence->roadmap_id =  $request->input('roadmap_id');
        $sequence->remitter_user_id = $request->input('receiver')["value"];
        $sequence->receiver_user_id = null;
        $sequence->derivated = false;
        $sequence->order = ++$order;
        $sequence->user_created_id = Auth::user()->id;
        $sequence->user_modified_id = Auth::user()->id;
        $sequence->save();
    }
}
