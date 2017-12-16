<?php

namespace Bantenprov\Workflow\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class History extends Model
{

    protected $table = 'historys';
    public $timestamps = true;

    use SoftDeletes;

    protected $dates = ['deleted_at'];
    protected $fillable = array('content_id', 'workflow_id', 'from_state', 'to_state', 'user_id');
    protected $visible = array('user_id');

    public function getApiKeys()
    {
        return $this->belongsTo('App\ApiKeys', 'content_id', 'id');
    }

    public function getWorkflow()
    {
        return $this->belongsTo('Bantenprov\Workflow\Models\WorkflowModel', 'workflow_id', 'id');
    }

    public function getStateFrom()
    {
        return $this->belongsTo('Bantenprov\Workflow\Models\WorkflowState', 'from_state', 'id');
    }

    public function getStateTo()
    {
        return $this->belongsTo('Bantenprov\Workflow\Models\WorkflowState', 'to_state', 'id');
    }

    public function getUserName()
    {
        return $this->belongsTo('App\User','user_id','id');
    }    

}
