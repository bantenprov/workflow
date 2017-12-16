<?php namespace Bantenprov\Workflow\Http\Controllers;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Bantenprov\Workflow\Facades\Workflow;
use Bantenprov\Workflow\Models\WorkflowModel;
use Bantenprov\Workflow\Models\WorkflowTransition;
use Bantenprov\Workflow\Models\WorkflowState;
use That0n3guy\Transliteration;

/**
 * The WorkflowController class.
 *
 * @package Bantenprov\Workflow
 * @author  bantenprov <developer.bantenprov@gmail.com>
 */
class WorkflowController extends Controller
{
    public function demo()
    {
        return Workflow::welcome();
    }

    public function index()
    {
        $workflows = WorkflowModel::paginate(10);
        return view('workflow.workflow.index',compact('workflows'));
    }

    public function create()
    {
      $dir = base_path('/app');
      $files = scandir($dir);

      $models = array();
      $namespace = 'App\\';
      foreach($files as $file) {
        // skip current and parent folder entries and non-php files
        if (preg_match("/.php/",$file)){
      		$models[] = $namespace . preg_replace("/.php/", "", $file);
      	}
      }
      return view('workflow.workflow.create',compact('models'));
    }

    public function store(Request $request)
    {
        $name = \Transliteration::clean_filename(strtolower($request->label));
        $label = $request->label;
        $content_type = $request->content_type;

        try
        {
            WorkflowModel::create([
                            'name' => $name,
                            'label' => $label,
                            'content_type' => $content_type
                ]);
        }
        catch(\Illuminate\Database\QueryException $e){
            // do what you want here with $e->getMessage();
            return redirect()->route('workflow')->with('message', 'Error');
        }

        return redirect()->route('workflow')->with('message', 'Add data success');
    }

    public function show($id)
    {
        //
    }

    public function edit($id)
    {
        $dir = base_path('/app');
        $files = scandir($dir);

        $models = array();
        $namespace = 'App\\';
        foreach($files as $file) {
          // skip current and parent folder entries and non-php files
          if (preg_match("/.php/",$file)){
        		$models[] = $namespace . preg_replace("/.php/", "", $file);
        	}
        }
        $workflow = WorkflowModel::where('id',$id)->first();

        return view('workflow.workflow.edit',compact('workflow','models'));
    }

    public function update(Request $request, $id)
    {
        $name = \Transliteration::clean_filename(strtolower($request->label));
        $label = $request->label;
        $content_type = $request->content_type;

        try
        {
          WorkflowModel::where('id',$id)->update(['label' => $label, 'name' => $name, 'content_type' => $content_type]);
        }
        catch(\Illuminate\Database\QueryException $e){
            // do what you want here with $e->getMessage();
            return redirect()->route('workflow')->with('message', 'Error');
        }

        return redirect()->route('workflow')->with('message', 'Update data success');
    }
}
