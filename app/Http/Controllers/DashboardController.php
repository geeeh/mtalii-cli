<?php

namespace App\Http\Controllers;
use App\Company;
use App\Events;
use App\Profile;
use App\User;
use Illuminate\Http\Request;
use Lava;
use Carbon\Carbon;
use Illuminate\Support\Facades\Auth;

class DashboardController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
         $this->middleware('auth');
    }

    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $finances = Lava::DataTable();

        $now = Carbon::now();
        $startDate = Carbon::now()->subYear();

        $finances->addDateColumn('month')
            ->addNumberColumn('users')
            ->addNumberColumn('Companies');

        for ($date = $startDate; $date->lte(Carbon::now()); $date->addMonth()) {
            $users = User::whereMonth('created_at', $date->month)
                ->whereYear('created_at', $date->year) -> count();
            $companies = Company::whereMonth('created_at', $date->month)
                ->whereYear('created_at', $date->year) -> count();
            $finances->addRow([$date->toDateTimeString(), $users, $companies]);
        }

        Lava::ColumnChart('Finances', $finances, [
            'title' => 'Company Performance',
            'titleTextStyle' => [
                'color'    => '#eb6b2c',
                'fontSize' => 14,
                'fontFamily'=> ['Kievit_book', 'sansSerif'],
            ]
        ]);

    $this->setupDoughnut();
    $this->setUpAreachart();


        return view('dashboard.dashhome');
    }

    private function setupDoughnut()
    {

        $eventsCount = Lava::DataTable();

        $luxuryEvents = Events::where('package', 'luxury')
            ->count();
        $mixedEvents = Events::where('package', 'mixed')
            ->count();
        $budgetEvents= Events::where('package', 'budget')
            ->count();
        $eventsCount->addStringColumn('Events per package')
            ->addNumberColumn('Percent')
            ->addRow(['Luxury', $luxuryEvents])
            ->addRow(['Mixed', $mixedEvents])
            ->addRow(['Budget', $budgetEvents]);

        Lava::DonutChart('IMDB', $eventsCount, [
            'title' => 'Events per package'
        ]);

    }


    private function setUpAreachart()
    {

        $events = Lava::DataTable();

        $now = Carbon::now();
        $startDate = Carbon::now()->subYear();

        $events->addDateColumn('Date')
            ->addNumberColumn('Luxury package')
            ->addNumberColumn('Mixed package')
            ->addNumberColumn('Budget package');

        for ($date = $startDate; $date->lte(Carbon::now()); $date->addMonth()) {
            $luxuryEvents = Events::where('package', 'luxury')
            ->whereMonth('created_at', $date->month)
                ->whereYear('created_at', $date->year) -> count();

            $mixedEvents = Events::where('package', 'luxury')
                ->whereMonth('created_at', $date->month)
                ->whereYear('created_at', $date->year) -> count();

            $budgetEvents = Events::where('package', 'luxury')
                ->whereMonth('created_at', $date->month)
                ->whereYear('created_at', $date->year) -> count();

            $events->addRow([$date->toDateTimeString(),  $luxuryEvents, $mixedEvents, $budgetEvents]);
        }


        Lava::LineChart('Temps', $events, [
            'title' => 'users per package every month'
        ]);
    }


    public function userProfile()
    {
        $details = Profile::where('user',  Auth::user()->id)
            ->get();
        dd($details->name);
        return view('dashboard.profile', ['profile'=> Auth::user(), 'details'=>$details]);
    }

    public function createUserProfile(Request $request)
    {
        $userProfile = new Profile();
        $userProfile->name =  Auth::user()->name;
        $userProfile->package = $request->input('package');
        $userProfile->user = Auth::user()->id;

        $image = $request->file('image');
        $filename = uniqid(8).'.'.$image->getClientOriginalExtension();
        $folderName = "uploads/";
        $destinationPath = $this->publicPath($folderName);
        $image->move($destinationPath, $filename);
        $userProfile->photoUrl = $folderName.$filename;
        $userProfile->save();

        return redirect('profile');

    }

}
