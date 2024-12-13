<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Audit;

class AuditController extends Controller
{

    
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
            // Fetch the latest audit records and paginate the results, showing 10 per page
            $audits = Audit::latest()->paginate(10);

        return view('audits.index', compact('audits'));
    }
}
