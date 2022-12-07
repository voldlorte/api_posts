<?php

namespace App\Http\Controllers;

use App\Models\api\Job;
use Illuminate\Http\Request;
use App\Http\Requests\StoreJobRequest;
use App\Http\Requests\UpdateJobRequest;

class JobController extends Controller
{
	/**
	 * Display a listing of the resource.
	 *
	 * @return \Illuminate\Http\Response
	 */
	public function index()
	{
		$jobs = Job::all();
		return response($jobs, 200);
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
	 * @param  \App\Http\Requests\StoreJobRequest  $request
	 * @return \Illuminate\Http\Response
	 */
	public function store(StoreJobRequest $request)
	{
		$data = $request->validate([
			"name"=> "required",
			"email"=> "required",
			"description"=> "required",
			"tags"=> "required",
			"img"=> "required"
		]);
		Job::create($data);
	}

	/**
	 * Display the specified resource.
	 *
	 * @param  \App\Models\api\Job  $job
	 * @return \Illuminate\Http\Response
	 */
	public function show($id)
	{
		return response(Job::findOrFail($id), 200);
	}
	/**
	 * Show the form for editing the specified resource.
	 *
	 * @param  \App\Models\api\Job  $job
	 * @return \Illuminate\Http\Response
	 */
	public function edit(Job $job)
	{
		//
	}

	/**
	 * Update the specified resource in storage.
	 *
	 * @param  \App\Http\Requests\UpdateJobRequest  $request
	 * @param  \App\Models\api\Job  $job
	 * @return \Illuminate\Http\Response
	 */
	public function update(UpdateJobRequest $request, $id)
	{
		$job = Job::findOrFail($id);
		$job->update($request->all());
		$job->save();
	}

	/**
	 * Remove the specified resource from storage.
	 *
	 * @param  \App\Models\api\Job  $job
	 * @return \Illuminate\Http\Response
	 */
	public function destroy($id)
	{
		Job::destroy($id);
	}
}
