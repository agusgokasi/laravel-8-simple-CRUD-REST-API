<?php
namespace App\Http\Controllers\API;
use App\Http\Controllers\Controller;
use App\Models\Job;
use Illuminate\Http\Request;
use Validator;
use Auth;
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
    return response()->json([
    "success" => true,
    "message" => "Job List",
    "data" => $jobs
    ]);
  }
/**
* Store a newly created resource in storage.
*
* @param  \Illuminate\Http\Request  $request
* @return \Illuminate\Http\Response
*/
public function store(Request $request)
  {
    $input = $request->all();
    $validator = Validator::make($input, [
    'status' => 'required',
    'position' => 'required'
    ]);
      if($validator->fails()){
      return $this->sendError('Validation Error.', $validator->errors());       
      }
    // $job = Job::create($input);
    $job = Job::create([
        'status' => $request->status,
        'position' => $request->position,
        'user_id' => Auth::user()->id
    ]);
    return response()->json([
    "success" => true,
    "message" => "Job created successfully.",
    "data" => $job
    ]);
  } 
/**
* Display the specified resource.
*
* @param  int  $id
* @return \Illuminate\Http\Response
*/
public function show($id)
  {
    $job = Job::find($id);
    if (!$job) {
    return response()->json('Job not found.');
    }
    return response()->json([
    "success" => true,
    "message" => "Job retrieved successfully.",
    "data" => $job
    ]);
  }
/**
* Update the specified resource in storage.
*
* @param  \Illuminate\Http\Request  $request
* @param  int  $id
* @return \Illuminate\Http\Response
*/
public function update(Request $request, Job $job)
  {
    $input = $request->all();
    $validator = Validator::make($input, [
    'status' => 'required',
    'position' => 'required'
    ]);
      if($validator->fails()){
      return $this->sendError('Validation Error.', $validator->errors());       
      }
    $job->status = $input['status'];
    $job->position = $input['position'];
    $job->user_id = Auth::user()->id;
    $job->save();
    return response()->json([
    "success" => true,
    "message" => "Job updated successfully.",
    "data" => $job
    ]);
  }
/**
* Remove the specified resource from storage.
*
* @param  int  $id
* @return \Illuminate\Http\Response
*/
public function destroy(Job $job)
  {
    $job->delete();
    return response()->json([
    "success" => true,
    "message" => "Job deleted successfully.",
    "data" => $job
    ]);
  }
}