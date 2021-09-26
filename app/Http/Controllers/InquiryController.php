<?php

namespace App\Http\Controllers;

use Illuminate\Support\Facades\Mail;

use App\Http\Requests\InquiryRequest;
use App\Http\Resources\NewInquiry as NewInquiryResource;
use App\Mail\NewInquiry;
use App\Models\Inquiry;

class InquiryController extends Controller
{
    public function __invoke(InquiryRequest $request)
    {
        $inquiry = new Inquiry();
        $inquiry->fill($request->only($inquiry->getFillable()));
        $inquiry->save();

        // Queue the email
        Mail::to(config('app.contact_form_email'))->send(
            new NewInquiry($inquiry)
        );

        return response(new NewInquiryResource($inquiry), 201);
    }
}