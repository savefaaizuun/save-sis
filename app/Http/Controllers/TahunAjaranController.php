<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Yajra\DataTables\Datatables;
use Illuminate\Support\Facades\DB;

use App\TahunAjaran;

class TahunAjaranController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        return view('konfigurasi/tahun_ajaran');
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
        // print_r($request);die;
        $is_aktif = ($request['is_aktif'] == 'on' ? '1' : '0');
        $data = [
            'tahun_akademik' => $request['tahun_akademik'],
            'semester' => $request['semester'],
            'is_aktif' => $is_aktif
        ];

        return TahunAjaran::create($data);
        // return DB::table('sis_konfig_tahun_akademik')->insert($data);
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
        $tahun_ajar = TahunAjaran::find($id);
        return $tahun_ajar;
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
        $tahun_ajar = TahunAjaran::find($id);
        $tahun_ajar->tahun_akademik = $request['tahun_akademik'];
        $tahun_ajar->semester = $request['semester'];
        $tahun_ajar->update();

        return $tahun_ajar;
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        TahunAjaran::destroy($id);
    }

    public function apiTahunAjaran(){
        // $tahun_ajar = TahunAjaran::all();
        $tahun_ajar = DB::table('sis_konfig_tahun_akademik')->get();
        // print_r($tahun_ajar);die;
        // dd($tahun_ajar);die;

        return Datatables::of($tahun_ajar)
            ->addColumn('action', function($tahun_ajar){
                return '<a href="#" class="btn btn-info btn-xs"><i class="glyphicon glyphicon-eye-open"></i> Show</a> '.
                    '<a onclick="editForm('.$tahun_ajar->id.')" class="btn btn-primary btn-xs"><i class="glyphicon glyphicon-edit"></i> Edit</a> '.
                    '<a onclick="deleteData('.$tahun_ajar->id.')" class="btn btn-danger btn-xs"><i class="glyphicon glyphicon-trash"></i> Delete</a>';
                })
            
            ->editColumn('is_aktif', function($tahun_ajar) {
                $status = ($tahun_ajar->is_aktif == '1' ? '<button class="btn btn-primary btn-xs"><i class="fa fa-check"></i> Aktif</button> ' : '<button class="btn btn-danger btn-xs"><i class="fa fa-times"></i> Tidak Aktif</button>');
                // return $tahun_ajar->is_aktif ? '<i class="fa fa-check" aria-hidden="true"></i>' : '<i class="fa fa-times" aria-hidden="true"></i>';
                return $status;
                })
            ->rawColumns(['is_aktif', 'action' ])
            // ->rawColumns(['action'])
            ->make(true);
    }    
}
