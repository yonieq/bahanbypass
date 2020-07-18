<?php

namespace App\Http\Controllers;

use App\DataTables\ReguDataTable;
use Illuminate\Http\Request;
use App\Repositories\ReguRepository;
use Flash;
use App\Http\Controllers\AppBaseController;
use Response;
use Storage;

class ReguController extends AppBaseController
{
    /** @var  ReguRepository */
    private $reguRepository;

    public function __construct(ReguRepository $reguRepo)
    {
        $this->reguRepository = $reguRepo;
    }

    /**
     * Display a listing of the Regu.
     *
     * @param ReguDataTable $reguDataTable
     * @return Response
     */
    public function index(ReguDataTable $reguDataTable)
    {
        return $reguDataTable->render('regus.index');
    }

    /**
     * Show the form for creating a new Regu.
     *
     * @return Response
     */
    public function create()
    {
        return view('regus.create');
    }

    /**
     * Store a newly created Regu in storage.
     *
     * @param CreateReguRequest $request
     *
     * @return Response
     */
    public function store(Request $request)
    {
        $rules = [
            'regu' => 'required',
            'jumlah_anggota' => 'required',
            'foto' => 'required|mimes:jpg,jpeg,png,gif|max:500',
            'file' => 'required|mimes:pdf|max:500',
        ];

        $message = [
            'required' => 'Bidang :attribute tidak boleh kosong!',
            'mimes' => 'File yang diunggah harus berformat :values',
            'max' => 'File yang diunggah maksimal 500KB'
        ];

        $this->validate($request, $rules, $message);

        $foto = $request->file('foto')->store('gambar_regu');
        $file = $request->file('file')->store('pdf_regu');

        $regu = $this->reguRepository->create([
            'regu' => $request->regu,
            'jumlah_anggota' => $request->jumlah_anggota,
            'jalur_id' => $request->jalur_id,
            'foto' => $foto,
            'file' => $file
        ]);

        Flash::success('Regu saved successfully.');

        return redirect(route('regus.index'));
    }

    /**
     * Display the specified Regu.
     *
     * @param  int $id
     *
     * @return Response
     */
    public function show($id)
    {
        $regu = $this->reguRepository->find($id);

        if (empty($regu)) {
            Flash::error('Regu not found');

            return redirect(route('regus.index'));
        }

        return view('regus.show')->with('regu', $regu);
    }

    /**
     * Show the form for editing the specified Regu.
     *
     * @param  int $id
     *
     * @return Response
     */
    public function edit($id)
    {
        $regu = $this->reguRepository->find($id);

        if (empty($regu)) {
            Flash::error('Regu not found');

            return redirect(route('regus.index'));
        }

        return view('regus.edit')->with('regu', $regu);
    }

    /**
     * Update the specified Regu in storage.
     *
     * @param  int              $id
     * @param UpdateReguRequest $request
     *
     * @return Response
     */
    public function update($id, Request $request)
    {
        $rules = [
            'regu' => 'required',
            'jumlah_anggota' => 'required',
            'foto' => 'mimes:jpg,jpeg,png,gif|max:500',
            'file' => 'mimes:pdf|max:500',
        ];

        $message = [
            'required' => 'Bidang :attribute tidak boleh kosong!',
            'mimes' => 'File yang diunggah harus berformat :values',
            'max' => 'File yang diunggah maksimal 500KB'
        ];

        $this->validate($request, $rules, $message);

        $regu = $this->reguRepository->find($id);

        if (empty($regu)) {
            Flash::error('Regu not found');

            return redirect(route('regus.index'));
        }

        $foto = $regu->foto;
        $file = $regu->file;

        if($request->foto){
            $foto = $request->file('foto')->store('gambar_regu');
            $foto_path = $regu->foto;
            if(Storage::exists($foto_path)){
                Storage::delete($foto_path);
            }
        }

        if($request->file){
            $file = $request->file('file')->store('pdf_regu');
            $file_path = $regu->file;
            if(Storage::exists($file_path)){
                Storage::delete($file_path);
            }
        }

        $regu->update([
            'regu' => $request->regu,
            'jumlah_anggota' => $request->jumlah_anggota,
            'jalur_id' => $request->jalur_id,
            'foto' => $foto,
            'file' => $file
        ]);

        Flash::success('Regu updated successfully.');

        return redirect(route('regus.index'));
    }

    /**
     * Remove the specified Regu from storage.
     *
     * @param  int $id
     *
     * @return Response
     */
    public function destroy($id)
    {
        $regu = $this->reguRepository->find($id);

        if (empty($regu)) {
            Flash::error('Regu not found');

            return redirect(route('regus.index'));
        }

        $foto = $regu->foto;
        $file = $regu->file;

        if(Storage::exists($foto)){
            Storage::delete($foto);
        }

        if(Storage::exists($file)){
            Storage::delete($file);
        }
        $this->reguRepository->delete($id);

        Flash::success('Regu deleted successfully.');

        return redirect(route('regus.index'));
    }
}
