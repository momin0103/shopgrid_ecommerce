<?php

namespace App\Http\Controllers;

use App\Models\Brand;
use App\Models\Unit;
use Illuminate\Http\Request;

class UnitController extends Controller
{
    protected $unit;
    public $units;

    public function index()
    {
        return view('admin.unit.add');
    }

    public function create(Request $request)
    {
       Unit:: newUnit($request);
        return redirect('/add-unit')->with('message', 'Unit info create successfully');
    }

    public function manage()
    {
        $this->units = Unit::orderBy('id', 'desc')->get();
        return view('admin.unit.manage', ['units' => $this->units]);
    }

    public function edit($id)
    {
        $this->unit = Unit::find($id);
        return view('admin.unit.edit', ['unit' => $this->unit]);
    }

    public function update(Request $request, $id)
    {
        Unit::updateUnit($request, $id);
        return redirect('/manage-unit')->with('message','Unit info update successfully');
    }

    public function delete($id)
    {
        Unit::deleteUnit($id);
        return redirect('/manage-unit')->with('message','Unit info delete successfully');
    }
}
