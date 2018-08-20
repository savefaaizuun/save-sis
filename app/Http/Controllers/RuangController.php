<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Yajra\DataTables\Datatables;
use Illuminate\Support\Facades\DB;

use App\Ruang;

class RuangController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        return view('master/ruangan');
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
            'kode_ruang' => $request['kode_ruang'],
            'nama_ruang' => $request['nama_ruang']
        ];

        return Ruang::create($data);
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
        $ruang = Ruang::find($id);
        // dd($ruang);
        return $ruang;
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
        $ruang = Ruang::find($id);
        $ruang->kode_ruang = $request['kode_ruang'];
        $ruang->nama_ruang = $request['nama_ruang'];
        $ruang->update();

        return $ruang;
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

    public function apiMasterRuang(Request $request)
    {
        
        DB::statement(DB::raw('set @rownum=0'));

        $data = Ruang::get(['sis_master_ruangan.*', 
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
