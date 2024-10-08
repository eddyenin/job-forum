<?php

namespace App\Http\Controllers;

use App\Http\Requests\StoreJobRequest;
use App\Http\Requests\UpdateJobRequest;
use App\Models\Job;
use App\Models\Tag;
use Illuminate\Support\Arr;
use Illuminate\Support\Facades\Auth;
use Illuminate\Validation\ValidationException;

class JobController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     */

    public function index()
    {
        $jobs = Job::latest()->get()->groupBy('featured');
        // $tag = Tag::where()

        return view('jobs.index',[
            'jobs'=>$jobs[0],
            'featuredJobs'=>$jobs[1],
            'tags'=>Tag::all()
        ]);
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {

        return view('jobs.create');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(StoreJobRequest $request)
    {
        $jobAttributes = $request->validated();

        $jobAttributes['featured'] = $request->has('featured');

        // if($jobAttributes->fails()){
        //     throw ValidationException::withMessages([]);
        // }

        $job = Auth::user()->employer->job()->create(Arr::except($jobAttributes, 'tags'));

        if($jobAttributes['tags'] ?? false){
           foreach (explode(',' , $jobAttributes['tags']) as $tag){
                $job->tag($tag);
           }
        }

        return redirect('/');

    }

    /**
     * Display the specified resource.
     */
    public function show(Job $job)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Job $job)
    {
       //dd($job);
        $jo = $job->where('title',$job->title)->first();
        //dd($jo);
        return view('jobs.edit',compact('jo'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(UpdateJobRequest $request, Job $job)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Job $job)
    {

    }
}
