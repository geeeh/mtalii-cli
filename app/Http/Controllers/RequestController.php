<?php

namespace App\Http\Controllers;

use App\HelpRequests;
use Illuminate\Http\Request;
use Mailgun\Mailgun;


class RequestController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //
    }

    /**
     * Create and send request.
     *
     * @param Request $request
     *
     * @return \Illuminate\Http\JsonResponse
     * @throws \Mailgun\Messages\Exceptions\MissingRequiredMIMEParameters
     */
    public function create(Request $request)
    {

        $helpRequest = new HelpRequests();
        $sender = $request->input("email");
        $description = $request->input("description");
        $phone = $request->input("phone");
        $helpRequest->email = $sender;
        $helpRequest->phone = $phone;
        $helpRequest->location = $request->input("location");
        $helpRequest->description = $description;
        $helpRequest->save();

        $message = "I need help planning a trip Description: ". $description . "\n phone: ". $phone;
        $data[] = $request->input("email");

        $mgClient = new Mailgun(getenv('MAILGUN_SECRET'));
        $domain = getenv("MAILGUN_DOMAIN");
        $result = $mgClient->sendMessage($domain, array(
            'from'    => $sender,
            'to'      => getenv("MAIL_USERNAME"),
            'subject' => 'Hello',
            'text'    => $message
        ));

        return redirect('plan', ['result' => $result]);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        //
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
}
