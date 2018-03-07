<?php

namespace Bantenprov\TindakPidanaPolda\Http\Controllers;

/* Require */
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Bantenprov\BudgetAbsorption\Facades\TindakPidanaPoldaFacade;

/* Models */
use Bantenprov\TindakPidanaPolda\Models\Bantenprov\TindakPidanaPolda\TindakPidanaPolda;

/* Etc */
use Validator;

/**
 * The TindakPidanaPoldaController class.
 *
 * @package Bantenprov\TindakPidanaPolda
 * @author  bantenprov <developer.bantenprov@gmail.com>
 */
class TindakPidanaPoldaController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct(TindakPidanaPolda $tindak_pidana_polda)
    {
        $this->tindak_pidana_polda = $tindak_pidana_polda;
    }

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(Request $request)
    {
        if (request()->has('sort')) {
            list($sortCol, $sortDir) = explode('|', request()->sort);

            $query = $this->tindak_pidana_polda->orderBy($sortCol, $sortDir);
        } else {
            $query = $this->tindak_pidana_polda->orderBy('id', 'asc');
        }

        if ($request->exists('filter')) {
            $query->where(function($q) use($request) {
                $value = "%{$request->filter}%";
                $q->where('label', 'like', $value)
                    ->orWhere('description', 'like', $value);
            });
        }

        $perPage = request()->has('per_page') ? (int) request()->per_page : null;
        $response = $query->paginate($perPage);

        return response()->json($response)
            ->header('Access-Control-Allow-Origin', '*')
            ->header('Access-Control-Allow-Methods', 'GET');
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $tindak_pidana_polda = $this->tindak_pidana_polda;

        $response['tindak_pidana_polda'] = $tindak_pidana_polda;
        $response['status'] = true;

        return response()->json($tindak_pidana_polda);
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\TindakPidanaPolda  $tindak_pidana_polda
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $tindak_pidana_polda = $this->tindak_pidana_polda;

        $validator = Validator::make($request->all(), [
            'label' => 'required|max:16|unique:tindak_pidana_poldas,label',
            'description' => 'max:255',
        ]);

        if($validator->fails()){
            $check = $tindak_pidana_polda->where('label',$request->label)->whereNull('deleted_at')->count();

            if ($check > 0) {
                $response['message'] = 'Failed, label ' . $request->label . ' already exists';
            } else {
                $tindak_pidana_polda->label = $request->input('label');
                $tindak_pidana_polda->description = $request->input('description');
                $tindak_pidana_polda->save();

                $response['message'] = 'success';
            }
        } else {
            $tindak_pidana_polda->label = $request->input('label');
            $tindak_pidana_polda->description = $request->input('description');
            $tindak_pidana_polda->save();

            $response['message'] = 'success';
        }

        $response['status'] = true;

        return response()->json($response);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $tindak_pidana_polda = $this->tindak_pidana_polda->findOrFail($id);

        $response['tindak_pidana_polda'] = $tindak_pidana_polda;
        $response['status'] = true;

        return response()->json($response);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\TindakPidanaPolda  $tindak_pidana_polda
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $tindak_pidana_polda = $this->tindak_pidana_polda->findOrFail($id);

        $response['tindak_pidana_polda'] = $tindak_pidana_polda;
        $response['status'] = true;

        return response()->json($response);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\TindakPidanaPolda  $tindak_pidana_polda
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        $tindak_pidana_polda = $this->tindak_pidana_polda->findOrFail($id);

        if ($request->input('old_label') == $request->input('label'))
        {
            $validator = Validator::make($request->all(), [
                'label' => 'required|max:16',
                'description' => 'max:255',
            ]);
        } else {
            $validator = Validator::make($request->all(), [
                'label' => 'required|max:16|unique:tindak_pidana_poldas,label',
                'description' => 'max:255',
            ]);
        }

        if ($validator->fails()) {
            $check = $tindak_pidana_polda->where('label',$request->label)->whereNull('deleted_at')->count();

            if ($check > 0) {
                $response['message'] = 'Failed, label ' . $request->label . ' already exists';
            } else {
                $tindak_pidana_polda->label = $request->input('label');
                $tindak_pidana_polda->description = $request->input('description');
                $tindak_pidana_polda->save();

                $response['message'] = 'success';
            }
        } else {
            $tindak_pidana_polda->label = $request->input('label');
            $tindak_pidana_polda->description = $request->input('description');
            $tindak_pidana_polda->save();

            $response['message'] = 'success';
        }

        $response['status'] = true;

        return response()->json($response);
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\TindakPidanaPolda  $tindak_pidana_polda
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $tindak_pidana_polda = $this->tindak_pidana_polda->findOrFail($id);

        if ($tindak_pidana_polda->delete()) {
            $response['status'] = true;
        } else {
            $response['status'] = false;
        }

        return json_encode($response);
    }
}
