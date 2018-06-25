<?php

namespace App\Http\Controllers;

use App\Category;
use App\Company;
use App\Events;
use Carbon\Carbon;
use Illuminate\Database\Eloquent\Collection;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class EventController extends Controller
{
    public function __construct()
    {
        $this->middleware(
            'auth', [
                'only'=>[
                    'create',
                    'delete',
                    'fetchAllEventsByCurrentUserCompanies',

                ]
            ]
        );
    }
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        return view('events', ['searchedEvents'=> $this->fetchUpcomingEvents()]);
    }

    /**
     * Fetch all upcoming events.
     * @return mixed - events
     */
    private function fetchUpcomingEvents()
    {
        $today = Carbon::now();
        $events = Events::where('date', '>=', $today )
            ->orderBy('date', 'asc')
            ->get();
        return $events;
    }

    /**
     * Fetch all events by the current user.
     * @return \Illuminate\Contracts\View\Factory|\Illuminate\View\View
     */
    public function fetchAllEventsByCurrentUserCompanies()
    {
        $result = new Collection();
        $companies = $this->getUserCompanies();
        foreach ($companies as $company) {
            $events = Events::where('company_id', $company->id)
                ->orderBy('date', 'asc')
                ->get();

            $collections = $result->merge($events);
            $result = $collections;
        }

            return view('dashboard.dashevents', ['events'=> $result, 'companies'=> $companies]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @param Request $request - incoming payload
     * @return \Illuminate\Http\Response
     */
    public function create(Request $request)
    {
        $event = new Events();
        $activities = json_encode(explode(",", $request->input("activities")));
        $location = $request->input("location");
        $event->name = $request->input("name");
        $event->location = $location;
        $event->cost = $request->input("cost");
        $event->date = $request->input("date");
        $event->activities = $activities;
        $event->company_id = $request->input("company");
        $event->package = $request->input("package");
        $event->description = $request->input("description");
        $image = $request->file('image');
        $filename = uniqid(8).'.'.$image->getClientOriginalExtension();
        $folderName = "uploads/";
        $destinationPath = $this->publicPath($folderName);
        $image->move($destinationPath, $filename);

        $event->image = $folderName.$filename;
        $event->save();

        $this->addNewCategories($location, json_decode($activities));

        return redirect("dashevents");
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param $location
     * @param $activities
     * @return void
     */
    private function addNewCategories($location, $activities)
    {
        Category::firstOrCreate(['name' => $location], ['type' => 'location']);

        foreach ($activities as $activity) {
                Category::firstOrCreate(['name'=>$activity], ['type'=> 'activity']);
        }

    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
    }

    /**
     * Get all companies belonging to current user.
     * @return mixed
     */
    private function getUserCompanies()
    {
        $userId = Auth::user()->id;
        return Company::where('user', $userId)->get();
    }
}
