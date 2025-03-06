<?php
#{{--#---------------------------------------------------🙏🔱देवा श्री गणेशा 🔱🙏---------------------------”--}}
namespace App\Http\Controllers;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Imports\ProductsImport;
use Excel, Log, Exception;
class ExcelProductSheet extends Controller
{
    public function import(Request $request)
    {
        $request->validate([
            'file' => 'required|mimes:xlsx'
        ]);

        try {
            Excel::import(new ProductsImport, $request->file('file'));

            if (session()->has('error')) {
                return redirect()->back()->with('error', session('error'));
            }

            return redirect()->back()->with('success', 'Products imported successfully.');
        } catch (Exception $e) {
            Log::error("Excel Import Error: " . $e->getMessage()); // Log error
            return redirect()->back()->with('error', 'Error: ' . $e->getMessage()); // Show error
        }
    }

}
