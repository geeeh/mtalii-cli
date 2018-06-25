<?php

namespace App\Http\Controllers;

use App\Experiences;
use Illuminate\Http\Request;
use Carbon\Carbon;
use App\Events;
use Mailgun\Mailgun;
use Mailgun\Messages\Exceptions\MissingRequiredMIMEParameters;

class HomeController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        // $this->middleware('auth');
    }

    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $latestExperiences = Experiences::orderBy('created_at', 'desc')
            ->limit(8)
            ->get();
        return view('home', ['upcomingEvents'=>$this->fetchUpcomingEvents(), 'experiences'=>$latestExperiences]);
    }

    /**
     * Head to customer care page.
     */
    public function plan()
    {
        return view('plan');
    }

    /**
     * Head to about page.
     */
    public function about()
    {
        return view('about');
    }

    /**
     * Search events by name or date.
     */
    public function searchEvents(Request $request)
    {
        $nameKey = $request->input('name');
        $dateKey = $request->input('date');
        $searchedEvents = Events::where('location', $nameKey)
//        ->orWhereIn('activities', $dateKey)
        ->orWhere('date', $dateKey)
        ->get();

        return view('events', ['searchedEvents' => $searchedEvents]);
    }

    /**
     * Add a new experience
     * @param Request $request
     * @return \Illuminate\Http\RedirectResponse|\Illuminate\Routing\Redirector
     */
    public function addExperience(Request $request)
    {
        $experience = new Experiences();
        $experience->name = $request->input("name");
        $experience->link = $request->input("link");
        $image = $request->file("image");
        $filename = uniqid(8).'.'.$image->getClientOriginalExtension();
        $folderName = "uploads/";
        $destinationPath = $this->publicPath($folderName);
        $image->move($destinationPath, $filename);

        $experience->image = $folderName.$filename;
        $experience->save();
        return redirect('home');
    }

    /**
     * Fetching the next eight upcoming events.
     * @return collections - upcoming events.
     */
    private function fetchUpcomingEvents()
    {
        $today = Carbon::now();
        $upcomingEvents = Events::where('date', '>', $today)
        ->orderBy('date', 'asc')
        ->limit(8)
        ->get();
        return $upcomingEvents;
    }

    public function sendRequests(Request $request)
    {
        $name = $request->input('name');
        $email =  $request->input('email');
        $phone =  $request->input('phone');
        $message = "I am Interested in this event: ". $name . "\n phone: ". $phone ."\n Email: ". $email;
        $data[] = $request->input("email");
        $mgClient = new Mailgun(getenv('MAILGUN_SECRET'), new \Http\Adapter\Guzzle6\Client());
        $domain = getenv("MAILGUN_DOMAIN");
        try {
            $mgClient->sendMessage($domain, array(
                'from' => 'no-reply@mtalii.co.ke',
                'to' => getenv('ADMIN_EMAIL'),
                'subject' => 'Hello',
                'text' => $message
            ));
        } catch (MissingRequiredMIMEParameters $e) {
        }
        return redirect('home');
    }

}
