<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Http\Requests;
use Yajra\DataTables\Datatables;
use Illuminate\Support\Facades\DB;

use App\Kelas;
use App\Prodi;  

class KelasController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $atribut  = array('title' => 'Data Kelas' );
        $prodi = Prodi::all();
        // print_r($prodi);die;

        return view('master.kelas', ['list_prodi' => $prodi]);
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
            'kode_kelas' => $request['kode_kelas'],
            'nama_kelas' => $request['nama_kelas'],
            'kode_prodi' => $request['kode_prodi'],
            'tingkat' => $request['tingkat']
        ];

        return Kelas::create($data);
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
        $kelas = Kelas::find($id);
        return $kelas;
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
        $kelas = Kelas::find($id);
        $kelas->kode_kelas = $request['kode_kelas'];
        $kelas->nama_kelas = $request['nama_kelas'];
        $kelas->kode_prodi = $request['kode_prodi'];
        $kelas->tingkat = $request['tingkat'];
        $kelas->update();

        return $kelas;
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        Kelas::destroy($id);
    }

    public function apiMasterKelas(Request $request)
    {
        
        DB::statement(DB::raw('set @rownum=0'));

        $data = Kelas::get(['sis_master_kelas.*', 
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
                        ->addIndexColumn()
                        ->make(true);
    } 
}
