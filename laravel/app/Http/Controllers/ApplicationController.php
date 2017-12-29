<?php

namespace App\Http\Controllers;

use App\Application;
use App\Training;
use Illuminate\Http\Request;

class ApplicationController extends Controller
{
    
    
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $applications = Application::where('status', 'pending')
            ->paginate(5);
        
        $trainings = Training::where('archive',1)
            ->paginate(5);
        return view('applications', compact('applications', 'trainings'));
    }
    
    public function profile()
    {
        $applications = Application::All();
        return view('profile', compact('applications'));
    }
    
    
    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $application = new Application([
            'training_id' => $request->get('training_id'),
            'user_id' => $request->get('user_id'),
            'manager_id' => $request->get('manager_id'),
            'status' => 'Pending',
        ]);

        $application->save();
        return redirect('profile');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Application  $application
     * @return \Illuminate\Http\Response
     */
    public function show(Application $application)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Application  $application
     * @return \Illuminate\Http\Response
     */
    public function edit(Application $application)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Application  $application
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        $application = Application::find($id);
        $application->status = $request->get('post');
        $application->save();

        return redirect('/applications');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Application  $application
     * @return \Illuminate\Http\Response
     */
    public function destroy(Application $application)
    {
        //
    }
}
