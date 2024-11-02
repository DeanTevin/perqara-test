<?php

namespace App\Containers\AppSection\LoggingService\UI\WEB\Controllers;


use Illuminate\Http\Request;
use Illuminate\Routing\Controller;
use App\Containers\AppSection\LoggingService\Models\LoggingAuditing as Audit;
use Illuminate\Support\Facades\DB;



class AuditController extends Controller
{
    public function index(Request $request)
    {
        $search = $request->get('search');
        $field = $request->get('field');

        $audits = Audit::paginate(20);

        if ($field == 'user_id') {
            $audits = Audit::where('user_id', 'like', '%'.$search.'%')->paginate(20);
        } elseif ($field == 'auditable_type') {
            $audits = Audit::where('auditable_type', 'like', '%'.$search.'%')->paginate(20);
        } elseif ($field == 'auditable_id') {
            $audits = Audit::where('auditable_id', 'like', '%'.$search.'%')->paginate(20);
        } elseif ($field == 'created_at') {
            $audits = Audit::where('created_at', 'like', '%'.$search.'%')->paginate(20);
        } elseif ($field == 'old_values') {
            $audits = Audit::where('old_values', 'like', '%'.$search.'%')->paginate(20);
        } elseif ($field == 'new_values') {
            $audits = Audit::where('new_values', 'like', '%'.$search.'%')->paginate(20);
        }

        $audits->appends(['search' => $search, 'field' => $field]);
        $count = $audits->total();

        return view('appSection@loggingService::audits.index', compact('audits','count'));

    }
 


}