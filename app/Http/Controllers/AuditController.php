<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Audit;

class AuditController extends Controller
{
    public function index()
    {
        // Fetch all audit logs
        $audits = Audit::latest()->get();  // You can adjust this to paginate or filter as needed
        
        return view('audits.index', compact('audits'));
    }
}
