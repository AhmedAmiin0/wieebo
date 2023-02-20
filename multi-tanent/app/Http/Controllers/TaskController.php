<?php

namespace App\Http\Controllers;

use App\Jobs\ImportTasks;
use App\Models\Task;
use Illuminate\Contracts\View\View;
use Illuminate\Http\Request;
use Spatie\SimpleExcel\SimpleExcelReader;



class TaskController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index(): View
    {
        $tasks = Task::paginate(50);
        return view('dashboard', compact('tasks'));
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        try {
            Task::create([
                'title' => $request->title,
                'description' => $request->description,
            ]);
            return redirect()->route('tasks.index')->with('success', 'Task created successfully');
        } catch (\Exception $e) {
            return redirect()->back()->with('error', $e->getMessage());
        }
    }
    public function importFromXlsx(Request $request)
    {
        try {

            // $data =  SimpleExcelReader::create($request->file('xlsx'), 'xlsx');
            $reader = SimpleExcelReader::create($request->file('xlsx'), 'xlsx')
            ->getRows();
            // read the file and chunk it into 1000 rows
            $chunks = array_chunk($reader->toArray(), 1000);
            foreach ($chunks as $chunk) {
                ImportTasks::dispatch($chunk);
            }
            return redirect()->route('tasks.index')->with('info', 'Task Are Being Imported');
        } catch (\Exception $e) {
            return redirect()->back()->with('error', $e->getMessage());
        }
    }


    /**
     * Remove the specified resource from storage.
     */
    public function destroy(task $task)
    {
        $task->delete();
        return redirect()->route('tasks.index');
    }
}
