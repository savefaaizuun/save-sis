<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Yajra\DataTables\Datatables;
use Illuminate\Support\Facades\DB;

use App\Prodi;

class ProgramStudiController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        return view('master/program_studi');
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
        $data = [
            'kode_prodi' => $request['kode_prodi'],
            'nama_prodi' => $request['nama_prodi']
        ];

        return Prodi::create($data);
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
        $prodi = Prodi::find($id);
        return $prodi;
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
        $prodi = Prodi::find($id);
        $prodi->kode_prodi = $request['kode_prodi'];
        $prodi->nama_prodi = $request['nama_prodi'];
        $prodi->update();

        return $prodi;
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        Prodi::destroy($id);
    }

    public function apiMasterProdi(Request $request)
    {
        
        DB::statement(DB::raw('set @rownum=0'));

        $data = Prodi::get(['sis_master_prodi.*', 
                            DB::raw('@rownum  := @rownum  + 1 AS rownum')]);

        return Datatables::of($data)
                        ->addColumn('action', function($data){
                            return '<a href="#" class="btn btn-info btn-xs"><i class="glyphicon glyphicon-eye-open"></i> Show</a> '.
                                '<a onclick="editForm('.$data->id.')" class="btn btn-primary btn-xs"><i class="glyphicon glyphicon-edit"></i> Edit</a> '.
                                '<a onclick="deleteData('.$data->id.')" class="btn btn-danger btn-xs"><i class="glyphicon glyphicon-trash"></i> Delete</a>';
                            })
            
                        ->editColumn('is_aktif', function($data) {
                            $status = ($data->is_aktif == '1' ? '<button class="btn btn-primary btn-xs"><i class="fa fa-check"></i> Aktif</button> ' : '<button class="btn btn-danger btn-xs"><i class="fa fa-times"></i> Tidak Aktif</button>');
                            // return $tahun_ajar->is_aktif ? '<i class="fa fa-check" aria-hidden="true"></i>' : '<i class="fa fa-times" aria-hidden="true"></i>';
                            return $status;
                            })
                        ->rawColumns(['is_aktif', 'action' ])
                        ->addIndexColumn()
                        ->make(true);
    } 
}
