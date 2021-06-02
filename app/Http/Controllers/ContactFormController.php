<?php

namespace App\Http\Controllers;

use App\Models\ContactForm;
use Illuminate\Http\Request;

class ContactFormController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $responses = ContactForm::orderBy('id', 'desc')->get();

        return view('contactform.index', compact('responses'));
    }

    public function updatestatus(Request $request)
    {
        $response = ContactForm::find($request->r_id);

        if ($request->status == 0) {
            $response->status = 1;
        } else {
            $response->status = 0;
        }
        $response->update();
        return redirect()->back();
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
        $request->validate([
            'name' => 'required',
            'phone' => 'required|digits:10',
            'message' => 'required',
            'category' => 'required',
        ]);

        $contactForm = new ContactForm();
        $contactForm->name = $request->name;
        $contactForm->phone = $request->phone;
        $contactForm->category = $request->category;
        $contactForm->message = $request->message;
        $contactForm->submitted_by = $request->user_id;
        $contactForm->status = '0';

        // dd($contactForm);
        $contactForm->save();
        return redirect()->back()->with('contactmessage', 'Your Response Submitted Successfully');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\ContactForm  $contactForm
     * @return \Illuminate\Http\Response
     */
    public function show(ContactForm $contactForm)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\ContactForm  $contactForm
     * @return \Illuminate\Http\Response
     */
    public function edit(ContactForm $contactForm)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\ContactForm  $contactForm
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, ContactForm $contactForm)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\ContactForm  $contactForm
     * @return \Illuminate\Http\Response
     */
    public function destroy(ContactForm $contactForm)
    {
        //
    }
}
