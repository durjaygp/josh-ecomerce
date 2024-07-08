<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class PageController extends Controller
{
    public function about(){
        return view('frontEnd.pages.about');
    }

    public function newPatient(){
        return view('frontEnd.pages.new_patient');
    }

    public function contact(){
        return view('frontEnd.pages.contact');
    }

    public function cerec(){
        return view('frontEnd.pages.cerec');
    }

    public function dentalCheck(){
        return view('frontEnd.pages.dental_check');
    }

    public function dentalCrowns(){
        return view('frontEnd.pages.dental_check');
    }


    public function allImplants(){
        return view('frontEnd.pages.all_implants');
    }

    public function zoomTeeth(){
        return view('frontEnd.pages.zoom_teeth');
    }

    public function wisdomTeeth(){
        return view('frontEnd.pages.wisdom_teeth');
    }

    public function extractionTeeth(){
        return view('frontEnd.pages.wisdom_extraction');
    }

    public function bridgesDental(){
        return view('frontEnd.pages.bridges_dental');
    }

    public function dentures(){
        return view('frontEnd.pages.dentures');
    }

    public function emergencyDentist(){
        return view('frontEnd.pages.emergency_dentist');
    }

    public function laserDentistry(){
        return view('frontEnd.pages.laser_dentistry');
    }

    public function rootTreatment(){
        return view('frontEnd.pages.root_treatment');
    }

    public function fullMouth(){
        return view('frontEnd.pages.full_mouth');
    }

    public function invisalign(){
        return view('frontEnd.pages.invisalign');
    }

    public function teethWhitening(){
        return view('frontEnd.pages.teeth_whitening');
    }

    public function smileMakeover(){
        return view('frontEnd.pages.smile_makeover');
    }

    public function dentalImplants(){
        return view('frontEnd.pages.dental_implants');
    }

    public function generalDentistry(){
        return view('frontEnd.pages.general_dentistry');
    }

    public function dentalSurgery(){
        return view('frontEnd.pages.dental_surgery');
    }

    public function cosmeticDentistry(){
        return view('frontEnd.pages.cosmetic_dentistry');
    }


}
