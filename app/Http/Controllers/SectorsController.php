<?php
namespace App\Http\Controllers;

use App;
use Carbon;
use Session;
use Validator;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Input;

class SectorsController extends Controller {

	/**
	 * Display a listing of the resource.
	 *
	 * @return Response
	 */
	public function index(Request $request)
	{
		if($request->ajax())
		{
			$sectors = App\Sector::orderBy('id', 'asc')->get();
            return datatables($sectors)->toJson();
		}
		return view('maintenance.sectors.index')
			->with('title','Sectors');
	}


	/**
	 * Show the form for creating a new resource.
	 *
	 * @return Response
	 */
	public function create()
	{
		return view('maintenance.sectors.create')
			->with('title','Sector');
	}


	/**
	 * Store a newly created resource in storage.
	 *
	 * @return Response
	 */
	public function store()
	{

		$sectorCode = $this->sanitizeString(Input::get('code'));
        $sectorName = $this->sanitizeString(Input::get('sectorName'));
        $sectorHead = $this->sanitizeString(Input::get('sectorHead'));
        $sectorHeadPosition = $this->sanitizeString(Input::get('sectorHeadPosition'));
        $sectorAssistHead = $this->sanitizeString(Input::get('sectorAssistHead'));
		$sectorAssistHeadPosition = $this->sanitizeString(Input::get('sectorAssistHeadPosition'));

		$sector = new App\Sector;

		$validator = Validator::make([
			'Code' => $sectorCode,
			'Sector Name' => $sectorName,
            'Sector Head' => $sectorHead,
            'Sector Head Position' => $sectorHeadPosition,
            'Assist Head' => $sectorAssistHead,
            'Assist Head Position' => $sectorAssistHeadPosition
		],$sector->rules());

		if($validator->fails())
		{
			return redirect('maintenance/sectors/create')
				->withInput()
				->withErrors($validator);
		}
		
		$sector->sectorcode = $sectorCode;
		$sector->sectorname = $sectorName;
        $sector->sectorhead = $sectorHead;
        $sector->sectorheadposition = $sectorHeadPosition;
		$sector->assisthead = $sectorAssistHead;
        $sector->assistheadposition = $sectorAssistHeadPosition;
        $sector->purge_status = '0';
		$sector->save();

		$new_sector = App\Sector::orderBy('created_at', 'desc') -> first();
		$signatories = new App\SectorSignatories;

		$signatories->sector = $new_sector->id;
		$signatories->nameofhead = $sectorHead;
		$signatories->nameofassistant = $sectorAssistHead;
		$signatories->action_done = 'New Record';
		$signatories->save();

		\Alert::success('Sector added.')->flash();
		return redirect('maintenance/sectors');
	}

	/**
	 * Show the form for editing the specified resource.
	 *
	 * @param  int  $id
	 * @return Response
	 */
	public function edit($id)
	{
		$sector = App\Sector::find($id);

		if(count($sector) <= 0)
		{
			return view('errors.404');
		}

		return view("maintenance.sectors.update")
				->with('sector',$sector)
				->with('title','Edit :: Sectors');
	}

	/**
	 * Update the specified resource in storage.
	 *
	 * @param  int  $id
	 * @return Response
	 */
	public function update($id)
	{
		$sectorCode = $this->sanitizeString(Input::get('code'));
        $sectorName = $this->sanitizeString(Input::get('sectorName'));
        $sectorHead = $this->sanitizeString(Input::get('sectorHead'));
        $sectorHeadPosition = $this->sanitizeString(Input::get('sectorHeadPosition'));
        $sectorAssistHead = $this->sanitizeString(Input::get('sectorAssistHead'));
		$sectorAssistHeadPosition = $this->sanitizeString(Input::get('sectorAssistHeadPosition'));

		$sector = App\Sector::find($id);

		$validator = Validator::make([
			'Sector Name' => $sectorName,
			'Code' => $sectorCode
		],$sector->updateRules());

		if($validator->fails())
		{
			return redirect("maintenance/sectors/$id/edit")
				->withInput()
				->withErrors($validator);
		}

		$sector->sectorcode = $sectorCode;
		$sector->sectorname = $sectorName;
        $sector->sectorhead = $sectorHead;
        $sector->sectorheadposition = $sectorHeadPosition;
		$sector->assisthead = $sectorAssistHead;
		$sector->assistheadposition = $sectorAssistHeadPosition;
        $sector->purge_status = '0';
		$sector->save();

		$new_sector = App\Sector::orderBy('created_at', 'desc') -> first();
		$signatories = new App\SectorSignatories;

		$signatories->sector = $new_sector->id;
		$signatories->nameofhead = $sectorHead;
		$signatories->nameofassistant = $sectorAssistHead;
		$signatories->action_done = 'Record Update';
		$signatories->save();

		\Alert::success('Sector Information Updated')->flash();
		return redirect('maintenance/sectors');
	}


	/**
	 * Remove the specified resource from storage.
	 *
	 * @param  int  $id
	 * @return Response
	 */
	public function destroy(Request $request, $id)
	{
		if($request->ajax())
		{
			$sectors = App\Sector::find($id);
			$sectors->delete();
			return json_encode('success');
		}

		try
		{
			$sectors = App\Sector::find($id);
			$sectors->delete();
			\Alert::success('Sector Removed')->flash();
		} catch (Exception $e) {
			\Alert::error('Problem Encountered While Processing Your Data')->flash();
		}
		return redirect('maintenance/sectors/');
	}
}
