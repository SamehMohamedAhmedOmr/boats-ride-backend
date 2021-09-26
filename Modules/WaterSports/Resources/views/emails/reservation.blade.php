<html>
    <head>

    </head>


    <body>

        <table border="0" cellspacing="0" cellpadding="0" width="100%" style="width:100.0%">
            <tbody>
            <tr>
            <td style="padding:0in 0in 0in 0in">
            <p class="MsoNormal"><u></u>&nbsp;<u></u></p>
            <div align="center">
            <table border="1" cellspacing="0" cellpadding="0" width="750" style="width:562.5pt;border-collapse:collapse;border:none">
            <tbody>
            <tr>
            <td style="border:dashed #999999 1.5pt;padding:9.0pt 9.0pt 9.0pt 9.0pt">
            <table border="0" cellspacing="0" cellpadding="0" width="100%" style="width:100.0%">
            <tbody>
            <tr>
            <td style="padding:.75pt .75pt .75pt .75pt">
            <p class="MsoNormal" style="margin-bottom:7.5pt"><img width="91" height="40" style="width:.95in;height:.4166in" id="m_716496154292371633_x0000_i1040" src="{{asset('reservation_emails')}}/main-logo.png" class="CToWUd"><u></u><u></u></p>
            </td>
            <td width="50%" style="width:50.0%;padding:.75pt .75pt .75pt .75pt">
            <p class="MsoNormal" align="right" style="margin-bottom:7.5pt;text-align:right"><span style="font-size:10.5pt"><a href="{{env('WEB_URL')}}/yachts" target="_blank"><span style="color:#C62127;text-decoration:none">YACHTS</span></a> &nbsp; | &nbsp;
            <a href="{{env('WEB_URL')}}/offers" target="_blank"><span style="color:#C62127;text-decoration:none">OFFERS</span></a> &nbsp; | &nbsp;
            <a href="{{env('WEB_URL')}}/services" target="_blank"><span style="color:#C62127;text-decoration:none">SERVICES</span></a> &nbsp; | &nbsp;
            <a href="{{env('WEB_URL')}}/contact" target="_blank"><span style="color:#C62127;text-decoration:none">CONTACT</span></a> &nbsp; &nbsp;
            <u></u><u></u></span></p>
            </td>
            </tr>
            </tbody>
            </table>
            <p class="MsoNormal"><span style="display:none"><u></u>&nbsp;<u></u></span></p>
            <table border="0" cellspacing="0" cellpadding="0" width="100%" style="width:100.0%">
            <tbody>
            <tr>
            <td style="background:#051137;padding:0.1in 0in 0.1in 0in">
            <h2 align="center" style="margin:0in;text-align:center"><span style="font-size:12.0pt;color:white">WATERSPORT BOOKING VOUCHER<u></u><u></u></span></h2>
            </td>
            </tr>
            </tbody>
            </table>
            <p class="MsoNormal"><br>
            <br>
            <u></u><u></u></p>
            <div style="border:solid #3fd947 1.0pt;padding:11.0pt 11.0pt 11.0pt 11.0pt;border-radius:7px">
            <p class="MsoNormal" style="background:#c8e5bc"><span style="color:#009207">Thank you
            <b>{{$render_data['trip']->title}}. {{$render_data['trip']->name}}</b> for booking with Boats Ride. Below are the confirmed details of your trip booking and sent to your email. We are excited to welcome you on board.
            <u></u><u></u></span></p>
            </div>
            <p class="MsoNormal"><br>
            <br>
            <u></u><u></u></p>
            <table border="0" cellspacing="0" cellpadding="0" width="100%" style="width:100.0%">
            <tbody>
            <tr>
            <td width="270" valign="top" style="width:202.5pt;padding:0in 0in 0in 0in">
            <div style="margin-right:11.25pt">
            <p class="MsoNormal" style="background:#defcff"><span style="color:black"><img border="0" width="56" height="30" style="width:.5833in;height:.3083in" id="m_716496154292371633_x0000_i1039" src="{{asset('reservation_emails')}}/yacht.gif" class="CToWUd"></span><u></u><u></u></p>
            <p style="background:#defcff"><span style="color:#00afca">Watersport Name: <b>{{$render_data['trip']->name}}</b>
            <br>
            Duration: <b>{{$render_data['trip']->trip_duration}} h</b> <br>
            Booking Status: </span><strong><span style="font-family:&quot;Calibri&quot;,sans-serif;color:green">{{$render_data['trip']->getStatusName()}}</span></strong><span style="color:#00afca">
            <u></u><u></u></span></p>
            </div>
            </td>
            <td valign="top" style="padding:0in 0in 0in 0in">
            <table border="1" cellspacing="0" cellpadding="0" align="left" width="100%" style="width:100.0%;border:solid #cedfe4 1.0pt">
            <tbody>
            <tr>
            <td style="padding:4.2pt 4.2pt 4.2pt 4.2pt">
            <p class="MsoNormal">Booking Number:<u></u><u></u></p>
            </td>
            <td style="padding:4.2pt 4.2pt 4.2pt 4.2pt">
            <p class="MsoNormal"><b>{{$render_data['trip']->booking_number}}</b><u></u><u></u></p>
            </td>
            </tr>
            <tr>
            <td style="padding:4.2pt 4.2pt 4.2pt 4.2pt">
            <p class="MsoNormal">Trip ID:<u></u><u></u></p>
            </td>
            <td style="padding:4.2pt 4.2pt 4.2pt 4.2pt">
            <p class="MsoNormal"><b>{{$render_data['trip']->id}}</b><u></u><u></u></p>
            </td>
            </tr>
            </tbody>
            </table>
            </td>
            </tr>
            </tbody>
            </table>
            <p class="MsoNormal"><br>
            <br>
            <u></u><u></u></p>
            <table border="0" cellspacing="0" cellpadding="0" width="100%" style="width:100.0%">
            <tbody>
            <tr>
            <td style="background:#051137;padding:7.5pt 11.25pt 7.5pt 11.25pt">
            <h2 style="margin:0in"><span style="font-size:12.0pt;color:white">CUSTOMER DETAILS<u></u><u></u></span></h2>
            </td>
            </tr>
            </tbody>
            </table>
            <p class="MsoNormal"><span style="display:none"><u></u>&nbsp;<u></u></span></p>
            <table border="1" cellspacing="0" cellpadding="0" width="100%" style="width:100.0%;border:solid #cedfe4 1.0pt">
            <tbody>
            <tr>
            <td style="padding:4.2pt 4.2pt 4.2pt 4.2pt">
            <p class="MsoNormal" align="center" style="text-align:center"><b>Name<u></u><u></u></b></p>
            </td>
            <td style="padding:4.2pt 4.2pt 4.2pt 4.2pt">
            <p class="MsoNormal" align="center" style="text-align:center"><b>Phone<u></u><u></u></b></p>
            </td>
            <td style="padding:4.2pt 4.2pt 4.2pt 4.2pt">
            <p class="MsoNormal" align="center" style="text-align:center"><b>E-mail<u></u><u></u></b></p>
            </td>
            </tr>
            <tr>
            <td style="padding:4.2pt 4.2pt 4.2pt 4.2pt">
            <p class="MsoNormal">{{$render_data['trip']->title}} {{$render_data['trip']->name}}<u></u><u></u></p>
            </td>
            <td style="padding:4.2pt 4.2pt 4.2pt 4.2pt">
            <p class="MsoNormal">{{$render_data['trip']->phone}}<u></u><u></u></p>
            </td>
            <td style="padding:4.2pt 4.2pt 4.2pt 4.2pt">
            <p class="MsoNormal"><a href="mailto:{{$render_data['trip']->email}} target="_blank">{{$render_data['trip']->email}}</a><u></u><u></u></p>
            </td>
            </tr>
            </tbody>
            </table>
            <p class="MsoNormal"><u></u>&nbsp;<u></u></p>
            <table border="0" cellspacing="0" cellpadding="0" width="100%" style="width:100.0%">
            <tbody>
            <tr>
            <td style="background:#051137;padding:7.5pt 11.25pt 7.5pt 11.25pt">
            <h2 style="margin:0in"><span style="font-size:12.0pt;color:white">BOOKING DETAILS<u></u><u></u></span></h2>
            </td>
            </tr>
            </tbody>
            </table>
            <table border="1" cellspacing="0" cellpadding="0" align="left" width="100%" style="width:100.0%;border:solid #cedfe4 1.0pt;margin-bottom:9.0pt">
            <tbody>
            <tr>
            <td style="padding:4.2pt 4.2pt 4.2pt 4.2pt">
            <p class="MsoNormal" align="center" style="text-align:center"><b>Water Sport Name<u></u><u></u></b></p>
            </td>
            <td style="padding:4.2pt 4.2pt 4.2pt 4.2pt">
            <p class="MsoNormal" align="center" style="text-align:center"><b>Date/Time<u></u><u></u></b></p>
            </td>
            <td style="padding:4.2pt 4.2pt 4.2pt 4.2pt">
            <p class="MsoNormal" align="center" style="text-align:center"><b>Duration<u></u><u></u></b></p>
            </td>
            <td style="padding:4.2pt 4.2pt 4.2pt 4.2pt">
            <p class="MsoNormal" align="center" style="text-align:center"><b>Guests<u></u><u></u></b></p>
            </td>
            <td style="padding:4.2pt 4.2pt 4.2pt 4.2pt">
            <p class="MsoNormal" align="center" style="text-align:center"><b>Price<u></u><u></u></b></p>
            </td>
            </tr>
            <tr>
            <td style="padding:4.2pt 4.2pt 4.2pt 4.2pt">
            <p class="MsoNormal">{{$render_data['trip']->waterSport->name}}<u></u><u></u></p>
            </td>
            <td style="padding:4.2pt 4.2pt 4.2pt 4.2pt">
            <p class="MsoNormal">{{\Carbon\Carbon::parse($render_data['trip']->start_date)->format('D')}}, {{\Carbon\Carbon::parse($render_data['trip']->start_date)->format('d-m-Y')}}  <br>
            <span style="color:white;background:#051137">{{$render_data['trip']->start_hour}} - {{$render_data['trip']->end_hour}}</span><u></u><u></u></p>
            </td>
            <td style="padding:4.2pt 4.2pt 4.2pt 4.2pt">
            <p class="MsoNormal">{{$render_data['trip']->trip_duration}}h <u></u><u></u></p>
            </td>
            <td style="padding:4.2pt 4.2pt 4.2pt 4.2pt">
            <p class="MsoNormal">Upto {{$render_data['trip']->number_of_people}} only<u></u><u></u></p>
            </td>
            <td width="100" style="width:75.0pt;padding:4.2pt 4.2pt 4.2pt 4.2pt">
            <p class="MsoNormal"><strong><span style="font-family:&quot;Calibri&quot;,sans-serif">AED {{$render_data['trip']->total_price}}</span></strong>
            <u></u><u></u></p>
            </td>
            </tr>
            </tbody>
            </table>
            <table border="0" cellspacing="0" cellpadding="0" width="100%" style="width:100.0%">
            <tbody>
            <tr>
            <td width="350" valign="top" style="width:262.5pt;padding:0in 7.5pt 0in 0in">
            <div>
            <p class="MsoNormal"><img border="0" width="100%" id="m_716496154292371633_x0000_i1038" src="{{$render_data['trip']->waterSport->images->count() ? $render_data['trip']->waterSport->images->first()->image_url : '#' }}" class="CToWUd a6T" tabindex="0"><div class="a6S" dir="ltr" style="opacity: 0.01; left: 416px; top: 1104.94px;"><div id=":p4" class="T-I J-J5-Ji aQv T-I-ax7 L3 a5q" role="button" tabindex="0" aria-label="Download attachment " data-tooltip-class="a1V" data-tooltip="Download"><div class="akn"><div class="aSK J-J5-Ji aYr"></div></div></div></div><u></u><u></u></p>
            </div>
            <p class="MsoNormal"><u></u>&nbsp;<u></u></p>
            <div>
            <table border="0" cellspacing="0" cellpadding="0" width="100%" style="width:100.0%">
            <tbody>
            <tr>
            <td style="background:#051137;padding:7.5pt 11.25pt 7.5pt 11.25pt">
            <h2 style="margin:0in"><span style="font-size:12.0pt;color:white">MEET &amp; GREET POINT<u></u><u></u></span></h2>
            </td>
            </tr>
            </tbody>
            </table>
            <p>{{$render_data['trip']->name}} : {{$render_data['trip']->waterSport->location}}
            <u></u><u></u></p>
            <!-- <div id="m_716496154292371633google_map">
            <p class="MsoNormal"><a href="https://www.google.com/maps/?q=25.1723725,55.2135744" target="_blank" data-saferedirecturl="https://www.google.com/url?q=https://www.google.com/maps/?q%3D25.1723725,55.2135744&amp;source=gmail&amp;ust=1626004508572000&amp;usg=AFQjCNH_s_pvSmkw2hjdyCTrrMlKKKaHbw"><span style="text-decoration:none"><img border="0" width="350" height="200" style="width:3.65in;height:2.0833in" id="m_716496154292371633_x0000_i1037" src="https://ci3.googleusercontent.com/proxy/2V9h2sTL93QXZJ8JUezZEw5a2-zNH1tYpstYbmzvCV38oiln-mISMgDPQZPa8WpP9SJFH7Bzog0GXXpflBCOoIOcj8OMzZ2RHMjbc_RxQd5ynNMWxsclLpqBGw8UndRZo1io3fE84jTBQNkaaPRRk6gOHnIJkgfqnGNvYv9bY2Q6HVv_vIW6Y02zGCc8LsW9k3aEEa9H2Wxda3702MWNeBrsQdwAsu3ql116f1gKq_acryjntUuE-HX4Z6qIWUmWQBrS1o7eDlLUS7m-0V4A_S2JBFceREQ=s0-d-e1-ft#https://maps.googleapis.com/maps/api/staticmap?center=25.1723725,55.2135744&amp;zoom=15&amp;scale=1&amp;size=350x200&amp;maptype=roadmap&amp;format=png&amp;visual_refresh=true&amp;key=AIzaSyB2TTp06a2OdMefZEIf5CiptNrzv3DZtXo" alt="Google Map" class="CToWUd"></span></a><u></u><u></u></p>
            </div> -->
            </div>
            </td>
            <td valign="top" style="padding:0in 0in 0in 0in">
            <table border="1" cellspacing="0" cellpadding="0" width="100%" style="width:100.0%;border:solid #cedfe4 1.0pt">
            <tbody>
            <tr>
            <td style="padding:4.2pt 4.2pt 4.2pt 4.2pt">
            <p class="MsoNormal" style="margin-bottom:11.25pt">Total: <u></u><u></u></p>
            </td>
            <td style="padding:4.2pt 4.2pt 4.2pt 4.2pt">
            <p class="MsoNormal" style="margin-bottom:11.25pt">AED {{$render_data['trip']->total_price}}<u></u><u></u></p>
            </td>
            </tr>
            <tr>
            <td style="padding:4.2pt 4.2pt 4.2pt 4.2pt">
            <p class="MsoNormal" style="margin-bottom:11.25pt">Discount: <u></u><u></u></p>
            </td>
            <td style="padding:4.2pt 4.2pt 4.2pt 4.2pt">
            <p class="MsoNormal" style="margin-bottom:11.25pt">AED -{{$render_data['trip']->discount}}<u></u><u></u></p>
            </td>
            </tr>
            </tbody>
            </table>
            <p class="MsoNormal"><u></u>&nbsp;<u></u></p>
            <table border="0" cellspacing="0" cellpadding="0" width="100%" style="width:100.0%">
            <tbody>
            <tr>
            <td style="padding:4.2pt 4.2pt 4.2pt 4.2pt">
            <p class="MsoNormal" style="margin-bottom:11.25pt"><b><span style="color:#ec6f23">Grand Total
            </span></b><b><span style="font-size:7.5pt;color:#ec6f23"></span></b><b><span style="color:#ec6f23">:</span></b>
            <u></u><u></u></p>
            </td>
            <td width="100" style="width:75.0pt;padding:4.2pt 4.2pt 4.2pt 4.2pt">
            <p class="MsoNormal" style="margin-bottom:11.25pt"><b><span style="color:#ec6f23">AED {{$render_data['trip']->total_price}}</span></b><u></u><u></u></p>
            </td>
            </tr>
            </tbody>
            </table>
            <table border="1" cellspacing="0" cellpadding="0" align="left" width="100%" style="width:100.0%;border:outset #ec6f23 1.0pt;margin-bottom:9.0pt">
            <tbody>
            <tr>
            <td style="border:inset #ec6f23 1.0pt;padding:4.2pt 4.2pt 4.2pt 4.2pt">
            <p class="MsoNormal"><b><span style="color:green">Total Amount Paid:</span></b> <b>
            <span style="color:green">AED 0.00</span></b><u></u><u></u></p>
            </td>
            <td style="border:inset #ec6f23 1.0pt;padding:4.2pt 4.2pt 4.2pt 4.2pt">
            <p class="MsoNormal"><b><span style="color:red">Pending Balance:</span></b> <b><span style="color:red">AED {{$render_data['trip']->total_price}}</span></b><u></u><u></u></p>
            </td>
            </tr>
            </tbody>
            </table>
            <p class="MsoNormal"><u></u>&nbsp;<u></u></p>
            <p><b><span style="color:#113f6d">To confirm Your Booking, Make Payment <br>
            (minimum AED 0.00 from total amount)<u></u><u></u></span></b></p>
            <p><a href="https://asfaryacht.com/water-sport/booking-payment/UVVaVU1EZFhNRGN5TVRGR05rdFBTQT09" target="_blank" data-saferedirecturl="https://www.google.com/url?q=https://asfaryacht.com/water-sport/booking-payment/UVVaVU1EZFhNRGN5TVRGR05rdFBTQT09&amp;source=gmail&amp;ust=1626004508572000&amp;usg=AFQjCNFmJd8GQO06WjyWUPhUmGwY5jCr5w"><span style="color:white;background:#ec6f23;text-decoration:none">Make Payment and confirm</span></a><u></u><u></u></p>
            </td>
            </tr>
            </tbody>
            </table>
            <p class="MsoNormal"><span style="display:none"><u></u>&nbsp;<u></u></span></p>
            <table border="0" cellspacing="0" cellpadding="0" width="100%" style="width:100.0%">
            <tbody>
            <tr>
            <td style="background:#051137;padding:7.5pt 11.25pt 7.5pt 11.25pt">
            <h2 style="margin:0in"><span style="font-size:12.0pt;color:white">IMPORTANT TIPS FOR YOUR TRIP!<u></u><u></u></span></h2>
            </td>
            </tr>
            </tbody>
            </table>
            <p class="MsoNormal"><span style="display:none"><u></u>&nbsp;<u></u></span></p>
            <table border="0" cellspacing="0" cellpadding="0" width="100%" style="width:100.0%">
            <tbody>
            <tr>
            <td style="padding:0in 0in 0in 0in">
            <ul type="disc">
            <li class="MsoNormal">
            Time adjustment will not be made due to late arrival and refund request will not be accommodated.<u></u><u></u></li><li class="MsoNormal">
            For people with motion sickness/seasickness or think may have please be advised to take motion sickness pills at least 30 minutes - 1 hour before the trip.<u></u><u></u></li><li class="MsoNormal">
            Bring your valid voucher and present upon arrival.<u></u><u></u></li><li class="MsoNormal">
            Each passenger must present a valid Identification Card(Labor Card,Emirates ID, Passport ID, VISA &amp; Driving License) as per coast guard policy.<u></u><u></u></li><li class="MsoNormal">
            Please come 10-15 minutes early before your trip.<u></u><u></u></li></ul>
            </td>
            </tr>
            </tbody>
            </table>
            <p class="MsoNormal"><span style="display:none"><u></u>&nbsp;<u></u></span></p>
            <table border="0" cellspacing="0" cellpadding="0" width="100%" style="width:100.0%">
            <tbody>
            <tr>
            <td style="background:#051137;padding:7.5pt 11.25pt 7.5pt 11.25pt">
            <h2 style="margin:0in"><span style="font-size:12.0pt;color:white">CANCELLATION POLICY<u></u><u></u></span></h2>
            </td>
            </tr>
            </tbody>
            </table>
            <p class="MsoNormal"><span style="display:none"><u></u>&nbsp;<u></u></span></p>
            <table border="0" cellspacing="0" cellpadding="0" width="100%" style="width:100.0%">
            <tbody>
            <tr>
            <td style="padding:4.2pt 4.2pt 4.2pt 4.2pt">
            <div>
            <ul type="disc">
            <li class="MsoNormal">
            Changes to the reservation is subject to the availability (additional charges may applied)<u></u><u></u></li><li class="MsoNormal">
            Cancellation outside 72 hours from trip time: You will be charged 30% of trip cost.<u></u><u></u></li><li class="MsoNormal">
            Cancellation within 72 Hours from trip time: You will be charged 50% of trip cost.<u></u><u></u></li><li class="MsoNormal">
            Cancellation within 36 Hours from trip time: You will be charged 80% of trip cost.<u></u><u></u></li><li class="MsoNormal">
            Cancellation within 24 Hours from trip time: You will be charged 100% of trip cost.
            <u></u><u></u></li></ul>
            </div>
            <p class="MsoNormal"><span style="font-size:7.5pt">We may cancel your reservation due to the event beyond our control such as bad weather ( No Sailing Permit), mechanical failure, coast guard restrictions, and enforcement of new laws. Asfar Yacht will provide
             alternatives within the charter budget or Full Refund will be processed.</span><u></u><u></u></p>
            </td>
            </tr>
            </tbody>
            </table>
            <div class="MsoNormal" align="center" style="margin-right:0in;margin-bottom:11.25pt;margin-left:0in;text-align:center">
            <hr size="0" width="100%" align="center">
            </div>
           
            <p class="MsoNormal" align="center" style="margin-right:0in;margin-bottom:11.25pt;margin-left:0in;text-align:center">
            <a href="https://asfaryacht.com/water-sport/booking/voucher/UVVaVU1EZFhNRGN5TVRGR05rdFBTQT09" target="_blank" data-saferedirecturl="https://www.google.com/url?q=https://asfaryacht.com/water-sport/booking/voucher/UVVaVU1EZFhNRGN5TVRGR05rdFBTQT09&amp;source=gmail&amp;ust=1626004508572000&amp;usg=AFQjCNF_qNyhYOCvLQINElhH-rKKUwisiQ"><span style="color:white;background:#ec6f23;text-decoration:none">View voucher on website
            </span></a><u></u><u></u></p>
            <div class="MsoNormal" align="center" style="margin-right:0in;margin-bottom:11.25pt;margin-left:0in;text-align:center">
            <hr size="0" width="100%" align="center">
            </div>
            <table border="0" cellspacing="0" cellpadding="0" width="100%" style="width:100.0%">
            <tbody>
            <tr>
            <td style="padding:9.0pt 9.0pt 9.0pt 9.0pt">
            <p align="center" style="text-align:center"><span style="font-size:10.0pt;color:#999999"><img border="0" width="136" height="60" style="width:1.4166in;height:.625in" id="m_716496154292371633_x0000_i1035" src="{{asset('reservation_emails')}}/main-logo.png" class="CToWUd"></span><span style="font-size:10.0pt;color:#999999"><br>
            {{-- We would like to hear from you. For any questions, suggestions or comments please contact us at: Customer Service Team - Email:
            <a href="mailto:support@asfaryacht.com" target="_blank">support@asfaryacht.com</a> or call us within the UAE at 800 ASFAR(27327) or internationally at +971 4 2555143 our team is available 24/7. --}}
            <br>
            <br>
            </span><a href="https://www.facebook.com/" target="_blank" ><span style="font-size:10.0pt;text-decoration:none"><img border="0" width="24" height="24" style="width:.25in;height:.25in" id="m_716496154292371633_x0000_i1034" src="{{asset('reservation_emails')}}/fb.png" class="CToWUd"></span></a><a href="https://twitter.com/AsfarYacht" target="_blank"><span style="font-size:10.0pt;text-decoration:none"><img border="0" width="24" height="24" style="width:.25in;height:.25in" id="m_716496154292371633_x0000_i1033" src="{{asset('reservation_emails')}}/twiter.png" class="CToWUd"></span></a><a href="https://www.instagram.com/" target="_blank" ><span style="font-size:10.0pt;text-decoration:none"><img border="0" width="24" height="24" style="width:.25in;height:.25in" id="m_716496154292371633_x0000_i1032" src="{{asset('reservation_emails')}}/insta.png" class="CToWUd"></span></a><span style="font-size:10.0pt;color:#999999"><br>
            <br>
            Boats Ride LLC © copyright 2021 <u></u><u></u></span></p>
            </td>
            </tr>
            </tbody>
            </table>
            </td>
            </tr>
            </tbody>
            </table>
            </div>
            <p class="MsoNormal"><br>
            <br>
            <br>
            <br>
            <br>
            <u></u><u></u></p>
            </td>
            </tr>
            </tbody>
            </table>
    </body>
</html>