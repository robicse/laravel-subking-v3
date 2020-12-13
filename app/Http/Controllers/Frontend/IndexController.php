<?php

namespace App\Http\Controllers\Frontend;

use App\BlogPost;
use App\Career;
use App\EmailClub;
use App\Feedback;
use App\Product;
use App\Service;
use App\ShopLocation;
use App\Slider;
use Brian2694\Toastr\Facades\Toastr;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Session;

class
 IndexController extends Controller
{
    public function Index()
    {
       return view('frontend.index');
    }

    public function nearestShp(Request $request)
    {
        $lat=$request->lat;
        $lng=$request->lng;

        $vendors=ShopLocation::whereBetween('lat',[$lat-0.07,$lat+0.07])->whereBetween('lng',[$lng-0.07,$lng+0.07])->get();
        return response()->json(['success'=> true, 'response'=>$vendors]);
    }
    public function nearestShpSearch(Request $request)
    {
        //return response()->json(['success'=> true, 'response'=>'ami achi']);
        $lat=$request->lat;
        $lng=$request->lng;
        $vendors=ShopLocation::whereBetween('lat',[$lat-0.07,$lat+0.07])->whereBetween('lng',[$lng-0.07,$lng+0.07])->get();
        return response()->json(['success'=> true, 'response'=>$vendors,'sLat'=>$lat, 'sLng'=>$lng]);
    }

    public function pickedOrDelivered(Request $request)
    {
        $id = $request->id;
        $pickedOrDeliveredValue = $request->pickedOrDeliveredValue;
        $shopLocationInfo = ShopLocation::find($id);
        $location_title = $shopLocationInfo->location_title;
        $address = $shopLocationInfo->address;
        $phn_no = $shopLocationInfo->phn_no;
        $lat = $shopLocationInfo->lat;
        $lng = $shopLocationInfo->lng;
        $open_close_time = $shopLocationInfo->open_close_time;
        $pick_up = $shopLocationInfo->pick_up;
        $delivery = $shopLocationInfo->delivery;

        // set value in session start
        Session::put('rid',$id);
        Session::put('rpickedOrDeliveredValue',$pickedOrDeliveredValue);
        if(!empty($location_title)){
            Session::put('location_title',$location_title);
        }
        if(!empty($address)){
            Session::put('address',$address);
        }
        if(!empty($phn_no)){
            Session::put('phn_no',$phn_no);
        }
        if(!empty($lat)){
            Session::put('lat',$lat);
        }
        if(!empty($lng)){
            Session::put('lng',$lng);
        }
        if(!empty($open_close_time)){
            Session::put('open_close_time',$open_close_time);
        }
        if(!empty($pick_up)){
            Session::put('pick_up',$pick_up);
        }
        if(!empty($delivery)){
            Session::put('delivery',$delivery);
        }
        // dd(Session::all());
        // set value in session end


        return response()->json(['success'=> true, 'response'=>'done']);
    }

    public function emailClub(Request $request){
        //dd($request->all());

        $email_club = new EmailClub();
        $email_club->email=$request->email;
        $email_club->country=$request->country;
        $email_club->save();

        Toastr::success('You are successfully added in Email Club.');
        return redirect()->back();
    }

    public function menuFront(){
        return view('frontend.pages.menu_front');
    }

    public function franchise()
    {
        return view('frontend.pages.franchise');
    }

    public function franchiseStore(Request $request)
    {
        //dd($request->all());

        //$to = 'robeul.starit@gmail.com';
        //$to = 'hello@subking.com';
        $to = 'alexparera.starit@gmail.com';

        $subject = 'Subking-franchise';
        $from = 'staritd@host14.registrar-servers.com';

        // To send HTML mail, the Content-type header must be set
        $headers  = 'MIME-Version: 1.0' . "\r\n";
        $headers .= 'Content-type: text/html; charset=iso-8859-1' . "\r\n";

        // Create email headers
        $headers .= 'From: '.$from."\r\n".
            'Reply-To: '.$from."\r\n" .
            'X-Mailer: PHP/' . phpversion();

        // Compose a simple HTML email message
        $message = '<html><body>';
        $message .= '<h1 style="color:#f40;">Hello!</h1>';
        $message .= '<p style="color:#080;font-size:18px;">First Name : '.$request->first_name.'</p>';
        $message .= '<p style="color:#080;font-size:18px;">Last Name : '.$request->last_name.'</p>';
        $message .= '<p style="color:#080;font-size:18px;">Email : '.$request->email.'</p>';
        $message .= '<p style="color:#080;font-size:18px;">Phone : '.$request->phone.'</p>';
        $message .= '<p style="color:#080;font-size:18px;">Markets of Interest : '.$request->markets_of_interest.'</p>';
        $message .= '<p style="color:#080;font-size:18px;">Restaurant Experience : '.$request->restaurant_experience.'</p>';
        $message .= '<p style="color:#080;font-size:18px;">Liquid Capital Available : '.$request->liquid_capital_available.'</p>';
        $message .= '<p style="color:#080;font-size:18px;">Net Worth : '.$request->net_worth.'</p>';
        $message .= '<p style="color:#080;font-size:18px;">Store_visit : '.$request->store_visit.'</p>';
        $message .= '<p style="color:#080;font-size:18px;">Online Research : '.$request->online_research.'</p>';
        $message .= '<p style="color:#080;font-size:18px;">Digital Ad : '.$request->digital_ad.'</p>';
        $message .= '<p style="color:#080;font-size:18px;">Print Ad : '.$request->print_ad.'</p>';
        $message .= '<p style="color:#080;font-size:18px;">Trade Show : '.$request->trade_show.'</p>';
        $message .= '<p style="color:#080;font-size:18px;">Radio Tv : '.$request->radio_tv.'</p>';
        $message .= '<p style="color:#080;font-size:18px;">Press Media : '.$request->press_media.'</p>';
        $message .= '<p style="color:#080;font-size:18px;">Other : '.$request->other.'</p>';
        $message .= '<p style="color:#080;font-size:18px;">Additional Comments Optional : '.$request->additional_comments_optional.'</p>';
        $message .= '</body></html>';

        // Sending email
        if(mail($to, $subject, $message, $headers)){
            //echo 'Your mail has been sent successfully.';
            Toastr::success('You are successfully send.');
            return redirect()->back();
        } else{
            //echo 'Unable to send email. Please try again.';
            Toastr::warning('Something went wrong, please contact with administrator.');
            return redirect()->back();
        }
    }

    public function contact()
    {
        return view('frontend.pages.contact');
    }

    public function contactStore(Request $request)
    {
        //dd($request->all());

        //$to = 'robeul.starit@gmail.com';
        //$to = 'hello@subking.com';
        $to = 'alexparera.starit@gmail.com';

        $subject = 'Subking-franchise';
        $from = 'staritd@host14.registrar-servers.com';

        // To send HTML mail, the Content-type header must be set
        $headers  = 'MIME-Version: 1.0' . "\r\n";
        $headers .= 'Content-type: text/html; charset=iso-8859-1' . "\r\n";

        // Create email headers
        $headers .= 'From: '.$from."\r\n".
            'Reply-To: '.$from."\r\n" .
            'X-Mailer: PHP/' . phpversion();

        // Compose a simple HTML email message
        $message = '<html><body>';
        $message .= '<h1 style="color:#f40;">Hello!</h1>';
        $message .= '<p style="color:#080;font-size:18px;">CC Location : '.$request->cc_location.'</p>';
        $message .= '<p style="color:#080;font-size:18px;">Date of Visit : '.$request->date_of_visit.'</p>';
        $message .= '<p style="color:#080;font-size:18px;">Approximate time of Visit : '.$request->approximate_time_of_visit.'</p>';
        $message .= '<p style="color:#080;font-size:18px;">Check Number : '.$request->check_number.'</p>';
        $message .= '<p style="color:#080;font-size:18px;">Email : '.$request->email.'</p>';
        $message .= '<p style="color:#080;font-size:18px;">Confirm Email : '.$request->confirm_email.'</p>';
        $message .= '<p style="color:#080;font-size:18px;">Email : '.$request->email.'</p>';
        $message .= '<p style="color:#080;font-size:18px;">Phone : '.$request->phone.'</p>';
        $message .= '<p style="color:#080;font-size:18px;">Zip Code : '.$request->zip_code.'</p>';
        $message .= '<p style="color:#080;font-size:18px;">First Name : '.$request->first_name.'</p>';
        $message .= '<p style="color:#080;font-size:18px;">Last Name : '.$request->last_name.'</p>';
        $message .= '<p style="color:#080;font-size:18px;">Order Type : '.$request->order_type.'</p>';
        $message .= '<p style="color:#080;font-size:18px;">Payment Type : '.$request->payment_type.'</p>';
        $message .= '<p style="color:#080;font-size:18px;">Comments Optional : '.$request->additional_comments_optional.'</p>';
        $message .= '<p style="color:#080;font-size:18px;">Return : '.$request->return.'</p>';
        $message .= '<p style="color:#080;font-size:18px;">Dined Time : '.$request->dined_time.'</p>';
        $message .= '</body></html>';

        // Sending email
        if(mail($to, $subject, $message, $headers)){
            //echo 'Your mail has been sent successfully.';
            Toastr::success('You are successfully send.');
            return redirect()->back();
        } else{
            //echo 'Unable to send email. Please try again.';
            Toastr::warning('Something went wrong, please contact with administrator.');
            return redirect()->back();
        }
    }
    public function Faq()
    {
        return view('frontend.pages.faq');
    }
    public function rewards()
    {
        return view('frontend.pages.rewards');
    }
    public function career()
    {
        $careers = Career::all();
        return view('frontend.pages.career', compact('careers'));
    }
    public function careerDetail($id)
    {
        $career = Career::find($id);
        return view('frontend.pages.career_detail', compact('career'));
    }
}
