<?php

namespace App\Http\Controllers;

use App\DataTables\JalurDataTable;
use Illuminate\Http\Request;
use App\Repositories\JalurRepository;
use Flash;
use App\Http\Controllers\AppBaseController;
use Response;
use Storage;

class JalurController extends AppBaseController
{
    /** @var  JalurRepository */
    private $jalurRepository;

    public function __construct(JalurRepository $jalurRepo)
    {
        $this->jalurRepository = $jalurRepo;
    }

    /**
     * Display a listing of the Jalur.
     *
     * @param JalurDataTable $jalurDataTable
     * @return Response
     */
    public function index(JalurDataTable $jalurDataTable)
    {
        return $jalurDataTable->render('jalurs.index');
    }

    /**
     * Show the form for creating a new Jalur.
     *
     * @return Response
     */
    public function create()
    {
        return view('jalurs.create');
    }

    /**
     * Store a newly created Jalur in storage.
     *
     * @param CreateJalurRequest $request
     *
     * @return Response
     */
    public function store(Request $request)
    {
        $rules = [
            'nama' => 'required',
            'lokasi' => 'required',
            'estimasi' => 'required',
            'jumlah_pos' => 'required',
            'status' => 'required',
            'foto' => 'required|mimes:jpg,jpeg,gif,png|max:500',
            'file' => 'required|mimes:pdf|max:500'
        ];

        $message = [
            'required' => 'Bidang :attribute tidak boleh kosong!',
            'mimes' => 'Bidang :attribute harus :values',
            'max' => 'File yang diunggah maksimal 500KB'
        ];

        $this->validate($request, $rules, $message);

        $foto = $request->file('foto')->store('gambar_jalur');
        $file = $request->file('file')->store('pdf_jalur');

        $jalur = $this->jalurRepository->create([
            'nama' => $request->nama,
            'lokasi' => $request->lokasi,
            'estimasi' => $request->estimasi,
            'jumlah_pos' => $request->jumlah_pos,
            'status' => $request->status,
            'foto' => $foto,
            'file'=> $file
        ]);

        Flash::success('Jalur saved successfully.');

        return redirect(route('jalurs.index'));

        
    }

    /**
     * Display the specified Jalur.
     *
     * @param  int $id
     *
     * @return Response
     */
    public function show($id)
    {
        $jalur = $this->jalurRepository->find($id);

        if (empty($jalur)) {
            Flash::error('Jalur not found');

            return redirect(route('jalurs.index'));
        }

        return view('jalurs.show')->with('jalur', $jalur);
    }

    /**
     * Show the form for editing the specified Jalur.
     *
     * @param  int $id
     *
     * @return Response
     */
    public function edit($id)
    {
        $jalur = $this->jalurRepository->find($id);

        if (empty($jalur)) {
            Flash::error('Jalur not found');

            return redirect(route('jalurs.index'));
        }

        return view('jalurs.edit')->with('jalur', $jalur);
    }

    /**
     * Update the specified Jalur in storage.
     *
     * @param  int              $id
     * @param UpdateJalurRequest $request
     *
     * @return Response
     */
    public function update($id, Request $request)
    {
        $jalur = $this->jalurRepository->find($id);

        if (empty($jalur)) {
            Flash::error('Jalur not found');
            return redirect(route('jalurs.index'));
        }

        $rules = [
            'nama' => 'required',
            'lokasi' => 'required',
            'estimasi' => 'required',
            'jumlah_pos' => 'required',
            'status' => 'required',
            'foto' => 'mimes:jpg,jpeg,gif,png|max:500',
            'file' => 'mimes:pdf|max:500'
        ];

        $message = [
            'required' => 'Bidang :attribute tidak boleh kosong!',
            'mimes' => 'Bidang :attribute harus :values',
            'max' => 'File yang diunggah maksimal 500KB'
        ];

        $this->validate($request, $rules, $message);

        $foto = $jalur->foto;
        $file = $jalur->file;

        if($request->foto){
            $foto = $request->file('foto')->store('gambar_jalur');
            $foto_path = $jalur->foto;
            if(Storage::exists($foto_path)){
                Storage::delete($foto_path);
            }
        }

        if($request->file){
            $file = $request->file('file')->store('pdf_jalur');
            $file_path = $jalur->file;
            if(Storage::exists($file_path)){
                Storage::delete($file_path);
            }
        }

        $jalur->update([
            'nama' => $request->nama,
            'lokasi' => $request->lokasi,
            'estimasi' => $request->estimasi,
            'jumlah_pos' => $request->jumlah_pos,
            'status' => $request->status,
            'foto' => $foto,
            'file'=> $file
        ]);

        Flash::success('Jalur updated successfully.');

        return redirect(route('jalurs.index'));
    }

    /**
     * Remove the specified Jalur from storage.
     *
     * @param  int $id
     *
     * @return Response
     */
    public function destroy($id)
    {
        $jalur = $this->jalurRepository->find($id);

        if (empty($jalur)) {
            Flash::error('Jalur not found');

            return redirect(route('jalurs.index'));
        }

        $foto = $jalur->foto;
        $file = $jalur->file;

        if(Storage::exists($foto)){
            Storage::delete($foto);
        }

        if(Storage::exists($file)){
            Storage::delete($file);
        }

        $this->jalurRepository->delete($id);

        Flash::success('Jalur deleted successfully.');

        return redirect(route('jalurs.index'));
    }
}
