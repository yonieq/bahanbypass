<?php

namespace App\Http\Controllers;

use App\DataTables\PerlengkapanDataTable;
use Illuminate\Http\Request;
use App\Repositories\PerlengkapanRepository;
use Flash;
use App\Http\Controllers\AppBaseController;
use Response;
use Storage;

class PerlengkapanController extends AppBaseController
{
    /** @var  PerlengkapanRepository */
    private $perlengkapanRepository;

    public function __construct(PerlengkapanRepository $perlengkapanRepo)
    {
        $this->perlengkapanRepository = $perlengkapanRepo;
    }

    /**
     * Display a listing of the Perlengkapan.
     *
     * @param PerlengkapanDataTable $perlengkapanDataTable
     * @return Response
     */
    public function index(PerlengkapanDataTable $perlengkapanDataTable)
    {
        return $perlengkapanDataTable->render('perlengkapans.index');
    }

    /**
     * Show the form for creating a new Perlengkapan.
     *
     * @return Response
     */
    public function create()
    {
        return view('perlengkapans.create');
    }

    /**
     * Store a newly created Perlengkapan in storage.
     *
     * @param CreatePerlengkapanRequest $request
     *
     * @return Response
     */
    public function store(Request $request)
    {
        $rules = [
            'navigasi' => 'required',
            'foto' => 'required|mimes:jpg,jpeg,png,gif|max:500',
            'file' => 'required|mimes:pdf|max:500'
        ];

        $message = [
            'required' => 'Bidang :attribute tidak boleh kosong!',
            'mimes' => 'Bidang :attribute harus berformat :values',
            'max' => 'File yang di unggah maksimal 500KB'
        ];

        $this->validate($request, $rules, $message);

        $foto = $request->file('foto')->store('gambar_perlengkapan');
        $file = $request->file('file')->store('pdf_perlengkapan');

        $perlengkapan = $this->perlengkapanRepository->create([
            'regu_id' => $request->regu_id,
            'navigasi' => $request->navigasi,
            'foto' => $foto,
            'file' => $file
        ]);

        Flash::success('Perlengkapan saved successfully.');

        return redirect(route('perlengkapans.index'));
    }

    /**
     * Display the specified Perlengkapan.
     *
     * @param  int $id
     *
     * @return Response
     */
    public function show($id)
    {
        $perlengkapan = $this->perlengkapanRepository->find($id);

        if (empty($perlengkapan)) {
            Flash::error('Perlengkapan not found');

            return redirect(route('perlengkapans.index'));
        }

        return view('perlengkapans.show')->with('perlengkapan', $perlengkapan);
    }

    /**
     * Show the form for editing the specified Perlengkapan.
     *
     * @param  int $id
     *
     * @return Response
     */
    public function edit($id)
    {
        $perlengkapan = $this->perlengkapanRepository->find($id);

        if (empty($perlengkapan)) {
            Flash::error('Perlengkapan not found');

            return redirect(route('perlengkapans.index'));
        }

        return view('perlengkapans.edit')->with('perlengkapan', $perlengkapan);
    }

    /**
     * Update the specified Perlengkapan in storage.
     *
     * @param  int              $id
     * @param UpdatePerlengkapanRequest $request
     *
     * @return Response
     */
    public function update($id, Request $request)
    {
        $rules = [
            'navigasi' => 'required',
            'foto' => 'mimes:jpg,jpeg,png,gif|max:500',
            'file' => 'mimes:pdf|max:500'
        ];

        $message = [
            'required' => 'Bidang :attribute tidak boleh kosong!',
            'mimes' => 'Bidang :attribute harus berformat :values',
            'max' => 'File yang di unggah maksimal 500KB'
        ];

        $this->validate($request, $rules, $message);

        $perlengkapan = $this->perlengkapanRepository->find($id);

        $foto = $perlengkapan->foto;
        $file = $perlengkapan->file;

        if (empty($perlengkapan)) {
            Flash::error('Perlengkapan not found');

            return redirect(route('perlengkapans.index'));
        }

        if($request->foto){
            $foto = $request->file('foto')->store('gambar_perlengkapan');
            $foto_path = $perlengkapan->foto;
            if(Storage::exists($foto_path)){
                Storage::delete($foto_path);
            }
        }

        if($request->file){
            $file = $request->file('file')->store('pdf_perlengkapan');
            $file_path = $perlengkapan->file;
            if(Storage::exists($file_path)){
                Storage::delete($file_path);
            }
        }

        $perlengkapan->update([
            'regu_id' => $request->regu_id,
            'navigasi' => $request->navigasi,
            'foto' => $foto,
            'file' => $file
        ]);

        Flash::success('Perlengkapan updated successfully.');

        return redirect(route('perlengkapans.index'));
    }

    /**
     * Remove the specified Perlengkapan from storage.
     *
     * @param  int $id
     *
     * @return Response
     */
    public function destroy($id)
    {
        $perlengkapan = $this->perlengkapanRepository->find($id);

        if (empty($perlengkapan)) {
            Flash::error('Perlengkapan not found');

            return redirect(route('perlengkapans.index'));
        }

        $foto = $perlengkapan->foto;
        $file = $perlengkapan->file;

        if(Storage::exists($foto)){
            Storage::delete($foto);
        }

        if(Storage::exists($file)){
            Storage::delete($file);
        }

        $this->perlengkapanRepository->delete($id);

        Flash::success('Perlengkapan deleted successfully.');

        return redirect(route('perlengkapans.index'));
    }
}
