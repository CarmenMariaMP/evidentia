<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Evidence extends Model
{

    protected $table="evidences";

    protected $fillable = [
        'id', 'title', 'description', 'hours', 'user_id', 'comittee_id', 'points_to', 'status', 'stamp', 'rand'
    ];

    public function proofs()
    {
        return $this->hasMany('App\Models\Proof');
    }

    public function user()
    {
        return $this->belongsTo('App\Models\User');
    }

    public function comittee()
    {
        return $this->belongsTo('App\Models\Comittee');
    }

    public function reason_rejection()
    {
        return $this->hasOne('App\Models\ReasonRejection');
    }

    /**
     * @return mixed
     * Evidence Flow
     */

    // lista las evidencias ANTERIORES a esta
    public function previous_evidences()
    {
        $evidence_previous = Evidence::find($this->points_to);

        // si es null, es que el flujo solo contiene una evidencia
        if($evidence_previous == null){
            $evidences = collect();
            $evidences->push($this);
            return $evidences;
        }else{
            return $this->previous_evidences_p($evidence_previous,collect());
        }

    }

    private function previous_evidences_p($evidence,$collection)
    {

        $collection->push($evidence);

        if($evidence->points_to == null){
            return $collection;
        }else{
            $evidence_previous = Evidence::find($evidence->points_to);
            return $this->previous_evidences_p($evidence_previous,$collection);
        }
    }

    // lista las evidendes POSTERIORES a esta
    public function later_evidences()
    {
        $points_me = Evidence::where('points_to',$this->id)->first();

        // si es null, es que el flujo solo contiene una evidencia
        if($points_me == null){
            $evidences = collect();
            $evidences->push($this);
            return $evidences;
        }else{
            return $this->later_evidences_p($points_me,collect());
        }

    }

    private function later_evidences_p($evidence,$collection)
    {
        $collection->push($evidence);

        if($evidence->last)
            return $collection;
        else {
            $points_me = Evidence::where('points_to',$evidence->id)->first();
            return $this->later_evidences_p($points_me,$collection);
        }
    }

    // lista el flujo total de ediciones de evidencias, desde la primera edición a la última
    public function flow_evidences(){
        $previous_evidences = $this->previous_evidences();
        $later_evidences = $this->later_evidences();
        return $previous_evidences->concat($later_evidences)->push($this)->unique()->sortByDesc('created_at');
    }

    // obtiene la evidencia que va a la cabeza del flujo de ediciones
    public function find_header_evidence()
    {
        return $this->find_header_evidence_p($this);
    }

    private function find_header_evidence_p($evidence)
    {
        if($evidence->last)
            return $evidence;
        else {
            $points_me = Evidence::where('points_to',$evidence->id)->first();
            return $this->find_header_evidence_p($points_me);
        }
    }

    public static function all_evidences() {
        return Evidence::where('status','=', '?')->orderByDesc('updated_at')->get();
    }

    public static function evidences_not_draft() {
        return Evidence::where('status','!=', 'DRAFT')->orderByDesc('updated_at')->get();
    }

    public static function get_evidences_count() {
        return Evidence::count();
    }
    public static function get_evidences_by_group($comittee_id) {
        $result = Evidence::select('comittee_id', Evidence::raw('count(*) as total'))->where('comittee_id' ,'=', $comittee_id)->groupBy('comittee_id')
        ->get();
        if(count($result) == 0){
            $result = array(0 => array('comittee_id'=> $comittee_id, 'total' => 0));
        }
        return $result;
    }
    public static function get_evidences_by_status(){
        $result = array();
        array_push($result, array('Borrador' => count(EVIDENCE::evidences_draft())));
        array_push($result, array('Pendientes de aceptación' => count(EVIDENCE::evidences_pending())));
        array_push($result, array('Aceptadas' => count(EVIDENCE::evidences_accepted())));
        array_push($result, array('Rechazadas' => count(EVIDENCE::evidences_rejected())));
        return $result;
    }

    public static function evidences_draft() {
        return Evidence::where('status','=', 'DRAFT')->where('points_to','=',null)->orderByDesc('updated_at')->get();
    }

    public static function evidences_pending() {
        return Evidence::where('status','=', 'PENDING')->orderByDesc('updated_at')->get();
    }

    public static function evidences_accepted() {
        return Evidence::where('status','=', 'ACCEPTED')->orderByDesc('updated_at')->get();
    }

    public static function evidences_rejected() {
        return Evidence::where('status','=', 'REJECTED')->orderByDesc('updated_at')->get();
    }

    public function integrity()
    {
        return $this->stamp == \Stamp::get_stamp_evidence($this);
    }

}
