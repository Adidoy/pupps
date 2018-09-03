<?php
namespace App;

use DB;
use Carbon;
use Illuminate\Database\Eloquent\Model;

class SectorSignatories extends Model{

	protected $table = 'autr_sectorsignatories';
	protected $primaryKey = 'id';
	protected $fillable = [
		'sector',
		'nameofhead',
		'nameofassistant', 
	];
	public $timestamps = true;

	public function rules(){
		return array(
			'Sector' => 'required|int',
			'Name of Head' => 'required|max:150',
            'Name of Assistant' => 'required|max:150',
		);
	}

	public function updateRules(){
		$code = $this->code;
		return array(
			//'Code' => 'required|max:10|unique:offices,code,'.$code.',code',
			'Sector Name' => 'required|max:75',
			//'Description' => 'max:200'
		);
	}

	public function Signatories(){
		return $this -> belongsTo('App\Sector', 'sector', 'id');
	}
}
