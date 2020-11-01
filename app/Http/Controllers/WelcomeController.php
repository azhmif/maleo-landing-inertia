<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Portofolio;
use App\Models\Profile;

use App\Models\FAQ;
use App\Models\WhyUs;
use App\Models\Kontak;
use App\Models\MemberArea;

use Session;

class WelcomeController extends Controller
{
    //
    public function index(){
        $data = Profile::all()->first();
        $portofolio = Portofolio::all();
        $faq = FAQ::all();
        $whyUs = WhyUs::all();
    
        // dd($portofolio);
        return view('welcome', ['data' => $data, 'portofolio' => $portofolio, 'faq' => $faq,'whyUs'=>$whyUs]);
    }
    public function kontak(Request $request){

        // dd($request->all());
        kontak::create($request->all());
  
        return redirect('/#contact')->with('success', 'Your message has been sent. Thank you!');
    }
    public function companyProfile(){
        $data = Profile::all()->first();

        return view ('company-profile', ['data' => $data]);
    }
    public function memberArea(){
        $data = Profile::all()->first();

        return view ('member-area', ['data' => $data]);
    }
    public function memberAreaStore(Request $request){
        MemberArea::create($request->all());
  
        return redirect('/member-area')->with('success', 'Berhasil Mendaftar, Admin kami akan menghubungi anda via phone/whatsapp. Terimakasih');
    }
    
    
}
