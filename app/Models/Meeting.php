<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Meeting extends Model
{
    protected $table = "meeting";

    protected $fillable = [
      'id','title','datetime','place','type','modality','hours'
    ];

    public function users()
    {
        return $this->belongsToMany('App\Models\User');
    }

    public function comittee()
    {
        return $this->belongsTo('App\Models\Comittee');
    }

    public function meeting_minutes()
    {
        return $this->hasOne('App\Models\MeetingMinutes');
    }
    public static function get_meeting_by_comite($comittee_id)
    {
        $result = Meeting::select('comittee_id', Meeting::raw('count(*) as total'))->where('comittee_id', '=', $comittee_id)->groupBy('comittee_id')
            ->get();

            if(count($result) == 0){
                $result = array(0 => array('comittee_id'=> $comittee_id, 'total' => 0));
            }
            return $result;
    }
}
