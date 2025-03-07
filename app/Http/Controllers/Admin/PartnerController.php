<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Http\Requests\PartnerRequest;
use App\Http\Requests\PartnerUpdateRequest;
use App\Models\Partner;
use App\Repositories\PartnersRepository;
use Illuminate\Http\Request;

class PartnerController extends Controller
{
    protected $partnersRepository;

    public function __construct(PartnersRepository $partnersRepository)
    {
        $this->partnersRepository = $partnersRepository;
    }
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $partners = Partner::with('localizations')->get();
        return view('admin.partner.index',compact('partners'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('admin.partner.create');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(PartnerRequest $request)
    {
        $this->partnersRepository->create($request->all());
        return redirect()->route('admin.partners.index');
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
        $partner = Partner::where('partners.id', $id)->with(['localizations'])->get();
        return view('admin.partner.edit',['partner' => $partner[0]]);
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(PartnerUpdateRequest $request, string $id)
    {
        $this->partnersRepository->update($request->all());
        return redirect()->route('admin.partners.index');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        $this->partnersRepository->destroy($id);
        return redirect()->route('admin.partners.index');
    }
}
