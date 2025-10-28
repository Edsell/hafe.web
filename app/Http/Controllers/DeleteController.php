<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use DB;

class DeleteController extends Controller
{
    public function MassDelete($id, $TableName)
    {
        try {

        DB::table($TableName)->where('id', $id)->delete();

        return redirect()->back()->with('success', 'The selected record was deleted successfully');

    } catch (\Exception $e) {

        return redirect()->back()->with('error', 'Something went wrong. Please try again.');
    }


    }



    public function MassDeleteAll(Request $request, $TableName)
    {
    // Validate allowed tables (IMPORTANT for security)
    $allowedTables = ['patients', 'users', 'doctors'];
    if (!in_array($TableName, $allowedTables)) {
        abort(403, 'Unauthorized table operation.');
    }

    $ids = $request->input('ids'); // 'ids' comes from the checkbox names: name="ids[]"

    if (!$ids || empty($ids)) {
        return redirect()->back()->with('error', 'No records selected for deletion.');
    }

    // Mass delete
    try {
    DB::table($TableName)->whereIn('id', $ids)->delete();


        return redirect()->back()->with('success', 'The selected records were deleted successfully');

    } catch (\Exception $e) {

        return redirect()->back()->with('error', 'Something went wrong. Please try again.');
    }

    }

    public function MassStatus(Request $request)
    {
        try {
            $id = $request->input('id');
            $table = $request->input('table');

            $record = DB::table($table)->where('id', $id)->first();

            if (!$record) {
                return redirect()->back()->with('error', 'Record not found.');
            }

            $newStatus = $record->status ? false : true;

            DB::table($table)
                ->where('id', $id)
                ->update(['status' => $newStatus]);

            return redirect()->back()->with('success', 'The status was updated successfully.');

        } catch (\Exception $e) {
            return redirect()->back()->with('error', 'Something went wrong. Please try again.');
        }
    }




}
