<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Audit;

class AuditController extends Controller
{
    public function index()
    {
        $audits = Audit::latest()->get(); 
        
        return view('audits.index', compact('audits'));
    }
}
