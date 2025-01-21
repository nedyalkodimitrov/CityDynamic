<?php

namespace App\Http\Controllers\Companies;

use App\Http\Controllers\Controller;
use App\Http\Services\MediaService;
use Illuminate\Http\Request;

class InformationController extends Controller
{
    public function showInformation()
    {
        $user = \Auth::user();
        $company = $user->getCompany();

        return view('companies.pages.information', [
            'company' => $company,
        ]);
    }

    public function saveInformation(Request $request)
    {
        $user = \Auth::user();
        $company = $user->getCompany();

        if ($request->hasFile('image')) {
            $image = $request->file('image');
            $imagePath = MediaService::saveImage($image);

            $company->profile_photo = $imagePath;
        }

        //        $company->founded_at = $request->foundedAt;
        $company->description = $request->description;
        $company->contact_email = $request->contactEmail;
        $company->contact_phone = $request->contactPhone;
        $company->contact_address = $request->contactAddress;
        $company->save();

        return redirect()->back()->with('success', 'Company information saved successfully.');
    }
}
