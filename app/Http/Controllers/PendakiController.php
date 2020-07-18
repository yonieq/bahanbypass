<?php

namespace App\Http\Controllers;

use App\DataTables\PendakiDataTable;
use Illuminate\Http\Request;
use App\Http\Requests\CreatePendakiRequest;
use App\Http\Requests\UpdatePendakiRequest;
use App\Repositories\PendakiRepository;
use Flash;
use App\Http\Controllers\AppBaseController;
use Response;
use Storage;

class PendakiController extends AppBaseController
{
    /** @var  PendakiRepository */
    private $pendakiRepository;

    public function __construct(PendakiRepository $pendakiRepo)
    {
        $this->pendakiRepository = $pendakiRepo;
    }

    /**
     * Display a listing of the Pendaki.
     *
     * @param PendakiDataTable $pendakiDataTable
     * @return Response
     */
    public function index(PendakiDataTable $pendakiDataTable)
    {
        return $pendakiDataTable->render('pendakis.index');
    }

    /**
     * Show the form for creating a new Pendaki.
     *
     * @return Response
     */
    public function create()
    {
        return view('pendakis.create');
    }

    /**
     * Store a newly created Pendaki in storage.
     *
     * @param CreatePendakiRequest $request
     *
     * @return Response
     */
    public function store(Request $request)
    {
        $rules = [
            'nama' => 'required',
            'alamat' => 'required',
            'regu_id' => 'required',
            'tanggal_mendaki' => 'required',
            'foto' => 'required|mimes:jpg,jpeg,png,gif|max:500',
            'file' => 'required|mimes:pdf|max:500',
        ];

        $message = [
            'reuired' => 'Bidang :attribute tidak boleh kosong',
            'mimes' => 'File yang di unggah harus berformat :values',
            'max' => 'File yang diunggah maksimal 500KB'
        ];

        $this->validate($request, $rules, $message);

        $foto = $request->file('foto')->store('gambar_pendaki');
        $file = $request->file('file')->store('pdf_pendaki');

        $pendaki = $this->pendakiRepository->create([
            'nama' => $request->nama,
            'alamat' => $request->alamat,
            'regu_id' => $request->regu_id,
            'tanggal_mendaki' => $request->tanggal_mendaki,
            'foto' => $foto,
            'file' => $file
        ]);

        Flash::success('Pendaki saved successfully.');

        return redirect(route('pendakis.index'));
    }

    

    /**
     * Display the specified Pendaki.
     *
     * @param  int $id
     *
     * @return Response
     */
    public function show($id)
    {
        $pendaki = $this->pendakiRepository->find($id);

        if (empty($pendaki)) {
            Flash::error('Pendaki not found');

            return redirect(route('pendakis.index'));
        }

        return view('pendakis.show')->with('pendaki', $pendaki);
    }

    /**
     * Show the form for editing the specified Pendaki.
     *
     * @param  int $id
     *
     * @return Response
     */
    public function edit($id)
    {
        $pendaki = $this->pendakiRepository->find($id);

        if (empty($pendaki)) {
            Flash::error('Pendaki not found');

            return redirect(route('pendakis.index'));
        }

        return view('pendakis.edit')->with('pendaki', $pendaki);
    }

    /**
     * Update the specified Pendaki in storage.
     *
     * @param  int              $id
     * @param UpdatePendakiRequest $request
     *
     * @return Response
     */
    public function update($id, Request $request)
    {
        $rules = [
            'nama' => 'required',
            'alamat' => 'required',
            'regu_id' => 'required',
            'tanggal_mendaki' => 'required',
            'foto' => 'mimes:jpg,jpeg,png,gif|max:500',
            'file' => 'mimes:pdf|max:500',
        ];

        $message = [
            'reuired' => 'Bidang :attribute tidak boleh kosong',
            'mimes' => 'File yang di unggah harus berformat :values',
            'max' => 'File yang diunggah maksimal 500KB'
        ];

        $this->validate($request, $rules, $message);

        $pendaki = $this->pendakiRepository->find($id);

        $foto = $pendaki->foto;
        $file = $pendaki->file;

        if (empty($pendaki)) {
            Flash::error('Pendaki not found');

            return redirect(route('pendakis.index'));
        }

        if($request->foto){
            $foto = $request->file('foto')->store('gambar_pendaki');
            $foto_path = $pendaki->foto;
            if(Storage::exists($foto_path)){
                Storage::delete($foto_path);
            }
        }

        if($request->file){
            $file = $request->file('file')->store('pdf_pendaki');
            $file_path = $pendaki->file;
            if(Storage::exists($file_path)){
                Storage::delete($file_path);
            }
        }
        

        $pendaki->update([
            'nama' => $request->nama,
            'alamat' => $request->alamat,
            'regu_id' => $request->regu_id,
            'tanggal_mendaki' => $request->tanggal_mendaki,
            'foto' => $foto,
            'file' => $file
        ]);

        Flash::success('Pendaki updated successfully.');

        return redirect(route('pendakis.index'));
    }

    /**
     * Remove the specified Pendaki from storage.
     *
     * @param  int $id
     *
     * @return Response
     */
    public function destroy($id)
    {
        $pendaki = $this->pendakiRepository->find($id);
        $foto = $pendaki->foto;
        $file = $pendaki->file;

        if(Storage::exists($foto)){
            Storage::delete($foto);
        }

        if(Storage::exists($file)){
            Storage::delete($file);
        }

        if (empty($pendaki)) {
            Flash::error('Pendaki not found');

            return redirect(route('pendakis.index'));
        }

        $this->pendakiRepository->delete($id);

        Flash::success('Pendaki deleted successfully.');

        return redirect(route('pendakis.index'));
    }


}
