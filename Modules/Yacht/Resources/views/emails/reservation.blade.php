<html>

    <body>

        <div style="padding:0;margin:0;background-color:#ffffff;font-size:14px;font-family:Arial,Helvetica">
        
            <table border="0" cellpadding="0" cellspacing="0" width="100%">
                <tbody><tr>
                    <td>
                                
                        <br>
                        <table width="750" border="0" bgcolor="#fff" align="center" cellpadding="15" cellspacing="0" style="border:2px dashed #999;border-collapse:collapse">
                            <tbody>
                                
                                <tr>
                                    <td>
    
                                        <table width="100%" height="40" border="0" cellspacing="0" style="margin-bottom:10px">
                                            <tbody><tr>
                                                <td> <img src="{{asset('reservation_emails')}}/main-logo.png" height="40" style="height:40px" class="CToWUd"> </td>
                                                <td width="50%" align="right" style="font-size:14px">
                                                    
                                                    <a href="https://asfaryacht.com/yacht-rental" style="color:#999;text-decoration:none" rel="noreferrer" target="_blank" data-saferedirecturl="https://www.google.com/url?q=https://asfaryacht.com/yacht-rental&amp;source=gmail&amp;ust=1625562291482000&amp;usg=AFQjCNHzr_CB85OtUwRk7ujaENtrNzNfeg">YACHTS</a>  &nbsp; | &nbsp;  
                                                    <a href="https://asfaryacht.com/offers" style="color:#999;text-decoration:none" rel="noreferrer" target="_blank" data-saferedirecturl="https://www.google.com/url?q=https://asfaryacht.com/offers&amp;source=gmail&amp;ust=1625562291482000&amp;usg=AFQjCNEVbKJFqOnFf56E2Y87XSIyx7_9EA">OFFERS</a>  &nbsp; |  &nbsp; 
                                                    <a href="https://asfaryacht.com/services" style="color:#999;text-decoration:none" rel="noreferrer" target="_blank" data-saferedirecturl="https://www.google.com/url?q=https://asfaryacht.com/services&amp;source=gmail&amp;ust=1625562291482000&amp;usg=AFQjCNEDEUm-PNyt15iEsHTxvjGrDT7LNg">SERVICES</a>  &nbsp; |  &nbsp; 
                                                    <a href="https://asfaryacht.com/contact-us" style="color:#999;text-decoration:none" rel="noreferrer" target="_blank" data-saferedirecturl="https://www.google.com/url?q=https://asfaryacht.com/contact-us&amp;source=gmail&amp;ust=1625562291482000&amp;usg=AFQjCNFb-Ze8hRJzlIRBUlUQDL0Xi8W_Og">CONTACT</a>   &nbsp;  &nbsp;
                                                    
                                                </td>
                                            </tr>
                                        </tbody></table>
    
                                        
                                        <table width="100%" border="0" cellpadding="0" cellspacing="0"> 		
                                            <tbody><tr>
                                                <td bgcolor="#11CCE9" style="padding:10px 15px">
                                                    <h2 style="color:#fff;text-align:center;font-size:16px;margin:0;padding:0">YACHT BOOKING VOUCHER</h2>
                                                </td>
                                            </tr>	
                                        </tbody></table>
                                        
                                        <br>
    
                                        
                                        
                                           
                                          
                                        <div style="background-color:#fff4d5;border:1px solid #fbcc82;padding:15px;border-radius:7px;color:#d46e20">Thank you <b>{{$render_data['trip']->title}}. {{$render_data['trip']->name}}</b> for chartering with Boats Ride Yachts, Your reservation has been made successfully, the payment is not yet received, Once it is received &amp; verified we will confirm your booking along with sending the confirmation email.</div>                                                            
                                        
                                        
                                        <br>
                                        
                                        <table border="0" width="100%" cellpadding="0" cellspacing="0">
                                            <tbody><tr valign="top">
                                                <td width="270">
    
                                                    
                                                    <div style="margin-right:15px;background-color:#defcff;padding:15px">                                                    
                                                                                                            <img src="{{asset('reservation_emails')}}/yacht.gif" height="30" style="height:30px" class="CToWUd">
                                                                                                            <p style="color:#00afca;line-height:1.4">
                                                            Vessel name: <b>{{$render_data['trip']->yacht->name}}</b> <br> 
                                                            Vessel size: <b>{{$render_data['trip']->yacht->size}} Feet</b>  <br> 
                                                            Duration: <b>{{$render_data['trip']->trip_duration}}h </b> <br> 
    
                                                                                                                    Booking Status: <strong style="color:orange">{{$render_data['trip']->getStatusName()}}</strong>
                                                                                                                </p>
                                                    </div>
                                                    
    
                                                </td>
                                                <td>
                                                    
                                                    <table border="1" cellpadding="7" cellspacing="0" width="100%" align="left" style="border:1px solid #cedfe4">
                                                        <tbody><tr> 
                                                                <td>  Booking Number:</td> <td><b>{{$render_data['trip']->booking_number}}</b></td>
                                                            </tr>
                                                            <tr> 
                                                                <td>  Trip ID:</td> <td><b>{{$render_data['trip']->id}}</b></td>
                                                            </tr>
                                                            
                                                                                                                </tbody>
                                                    </table>
                                                    
    
                                                </td>
                                            </tr>
                                        </tbody></table>
                                        <br>
                                        
                                        <table width="100%" border="0" cellpadding="0" cellspacing="0" style="margin-bottom:10px"> 		
                                            <tbody><tr>
                                                <td bgcolor="#11CCE9" style="padding:10px 15px">
                                                    <h2 style="color:#fff;font-size:16px;margin:0;padding:0">CUSTOMER DETAILS</h2>
                                                </td>
                                            </tr>	
                                        </tbody></table>
                                        
    
                                        
                                        <table width="100%" border="1" cellpadding="7" cellspacing="0" style="border:1px solid #cedfe4">
                                            <tbody><tr>
                                                <th>Name</th>
                                                <th>Phone</th>
                                                <th>E-mail</th>
                                            </tr>
                                            <tr>
                                                <td>{{$render_data['trip']->title}} {{$render_data['trip']->name}}</td>
                                                <td>{{$render_data['trip']->phone}}</td>
                                                <td><a href="mailto:{{$render_data['trip']->email}}" rel="noreferrer" target="_blank">{{$render_data['trip']->email}}</a></td>
                                            </tr>
                                        </tbody></table>
                                        
                                        
                                        <br>
                                        <table width="100%" border="0" cellpadding="0" cellspacing="0" style="margin-bottom:10px"> 		
                                            <tbody><tr>
                                                <td bgcolor="#11CCE9" style="padding:10px 15px">
                                                    <h2 style="color:#fff;font-size:16px;margin:0;padding:0"> BOOKING DETAILS</h2>
                                                </td>
                                            </tr>	
                                        </tbody></table>
                                        <table border="1" cellpadding="7" cellspacing="0" width="100%" align="left" style="margin-bottom:15px;border:1px solid #cedfe4;line-height:1.4">
                                            <tbody>
                                                <tr>
                                                    <th>Vessel</th>
                                                    <th> Start Date/Time</th>
                                                    <th> Finish Date/Time</th>
                                                    <th> Duration</th>
                                                    <th> Guests</th>
                                                    <th> Price</th>
                                                </tr>
                                                <tr>
                                                    <td>{{$render_data['trip']->yacht->name}}</td>
                                                    <td>{{\Carbon\Carbon::parse($render_data['trip']->start_date)->format('D')}}, {{\Carbon\Carbon::parse($render_data['trip']->start_date)->format('d-m-Y')}} <br> <span style="background-color:#11cce9;border-radius:4px;color:#fff;padding:2px 7px">{{$render_data['trip']->start_hour}}</span></td>
                                                    <td>{{ \Carbon\Carbon::parse($render_data['trip']->end_date)->format('D')}}, {{\Carbon\Carbon::parse($render_data['trip']->end_date)->format('d-m-Y')}} <br> <span style="background-color:#11cce9;border-radius:4px;color:#fff;padding:2px 7px">{{$render_data['trip']->end_hour}}</span></td>
                                                    <td> {{$render_data['trip']->trip_duration}}h </td>
                                                    <td>Upto {{$render_data['trip']->yacht->number_of_people}} only</td>
                                                    <td width="100"> <strong>AED {{(double) $render_data['trip']->total_price}}</strong> </td>
                                                </tr>
                                            </tbody>
                                        </table>
    
    
                                        
                                        <table border="0" width="100%" cellpadding="0" cellspacing="0">
                                            <tbody><tr valign="top">
                                                <td width="350" style="padding-right:10px">     
                                                    <div>
                                                        <img src="{{$render_data['trip']->yacht->images->count() ? $render_data['trip']->yacht->images->first()->image_url : '#' }}" width="100%" height="200" class="CToWUd a6T" tabindex="0"><div class="a6S" dir="ltr" style="opacity: 0.01; left: 419px; top: 1281px;"><div id=":rs" class="T-I J-J5-Ji aQv T-I-ax7 L3 a5q" role="button" tabindex="0" aria-label="Download attachment " data-tooltip-class="a1V" data-tooltip="Download"><div class="akn"><div class="aSK J-J5-Ji aYr"></div></div></div></div>
                                                    </div>
                                                    <br>
                                                    <div>
                                                        
                                                        <table width="100%" border="0" cellpadding="0" cellspacing="0" style="margin-bottom:10px"> 		
                                                            <tbody><tr>
                                                                <td bgcolor="#11CCE9" style="padding:10px 15px">
                                                                    <h2 style="color:#fff;font-size:16px;margin:0;padding:0">MEET &amp; GREET POINT</h2>
                                                                </td>
                                                            </tr>	
                                                        </tbody></table>
                                                        
    
                                                        <p>{{$render_data['trip']->name}}: {!! $render_data['trip']->what_expect_description !!}
                                                        </p>
                                                        {{-- <div id="m_-1757351091086838996m_5930464513775716706m_1846324454999606905google_map">
                                                            <a href="https://www.google.com/maps/?q=25.0688313,55.1322055" rel="noreferrer" target="_blank" data-saferedirecturl="https://www.google.com/url?q=https://www.google.com/maps/?q%3D25.0688313,55.1322055&amp;source=gmail&amp;ust=1625562291482000&amp;usg=AFQjCNG93xNpN-hY0h7EnljD7fAzZS8omg"><img src="https://ci5.googleusercontent.com/proxy/a8LfF11CfcqPUvuLfIzU77AzHff3Ctf5m5o3KPYPJ1KW1yTQpKzYpcawW0A-zK3clKdXN-E6yQjHClnyWQllAUnbxNhd9Vwr33W93MasU3YUjCjzB2OuNKgTMzswN3H7vx4_knsTBaZkRZZ-kzbY6h-Mo4OdFV_k-FWr9-wFwTiz4J9LnB9JZutNZSNaSwJxUeX7iyb6jAKtteG28s-CxQ_69ld6tzb-Vr9YaqQjmwBNwIcBT8pfsyBVeHcDLdQNXUAD6RGqp8EknLbTUAzSPSuxeAMa0AM=s0-d-e1-ft#https://maps.googleapis.com/maps/api/staticmap?center=25.0688313,55.1322055&amp;zoom=15&amp;scale=1&amp;size=350x200&amp;maptype=roadmap&amp;format=png&amp;visual_refresh=true&amp;key=AIzaSyB2TTp06a2OdMefZEIf5CiptNrzv3DZtXo" alt="Google Map" class="CToWUd"></a>
                                                        </div> --}}
                                                        
                                                    </div><br> 
                                                </td>
                                                <td>
                                                                                                    
                                                    
                                                    <table border="1" cellpadding="7" cellspacing="0" width="100%" style="margin-bottom:15px;border:1px solid #cedfe4">
                                                        
                                                        <tbody><tr>
                                                            <td> Sub Total: </td>
                                                            <td> AED {{ ((double) $render_data['trip']->total_price) - ((double)$render_data['trip']->discount)}} </td>
                                                        </tr>
                                                                                                                                                                
                                                        <tr>
                                                            <td> DISCOUNT: </td>
                                                            <td>AED {{(double) $render_data['trip']->discount}}</td>
                                                        </tr>
                                                                                                            
                                                                                                                                                            </tbody></table>  
    
                                                    
                                                    <table border="0" bgcolor="#eee" width="100%" cellpadding="7" cellspacing="0" style="margin-bottom:15px">
                                                        <tbody><tr> 
                                                            <td> <b style="color:#ec6f23">Grand Total <small> (Incl. Other Changes)</small>:</b> </td> <td width="100"><b style="color:#ec6f23">AED {{(double)$render_data['trip']->total_price}}</b></td>
                                                        </tr>
                                                    </tbody></table>                                                
                                                    <table border="1" bgcolor="#eee" width="100%" cellpadding="7" cellspacing="0" align="left" style="margin-bottom:15px">
                                                        <tbody><tr> 
                                                            <td> <b style="color:green">Total Amount Paid:</b> <b style="color:green">AED 0.00</b></td>
                                                                                                                                                                            <td> <b style="color:red">Pending Balance:</b> <b style="color:red">AED {{(double)$render_data['trip']->total_price}}</b></td>
                                                                                                                </tr>
                                                    </tbody></table>
                                                    
    
                                                                                                    <br>
                                                    <p style="color:#113f6d;font-weight:bold">To confirm Your Booking, Make Payment <br> (minimum AED {{(double) $render_data['trip']->minimum_Advance_Payment}} from total amount)</p>
                                                    <p><a href="https://asfaryacht.com/booking-payment/UVVaVU1qUlpNREl5TVVaWk5qUk5Wdz09" style="color:#fff;text-decoration:none;padding:10px 20px;background-color:#ec6f23;display:inline-block;border-radius:5px" rel="noreferrer" target="_blank" data-saferedirecturl="https://www.google.com/url?q=https://asfaryacht.com/booking-payment/UVVaVU1qUlpNREl5TVVaWk5qUk5Wdz09&amp;source=gmail&amp;ust=1625562291482000&amp;usg=AFQjCNHgzpUb1YesBVp4-JzI3zpPvzcPWQ">Make Payment and confirm</a></p>
                                                      
                                                    <br>
    
    
                                                                                                                                                      
                                                </td>
                                            </tr>
                                        </tbody></table>
                                                                                                               
                                        
                                        <table width="100%" border="0" cellpadding="0" cellspacing="0" style="margin-bottom:10px"> 		
                                            <tbody><tr>
                                                <td bgcolor="#11CCE9" style="padding:10px 15px">
                                                    <h2 style="color:#fff;font-size:16px;margin:0;padding:0">IMPORTANT TIPS FOR YOUR TRIP!</h2>
                                                </td>
                                            </tr>	
                                        </tbody></table>
                                        
                                        <table width="100%" border="0" cellpadding="0" cellspacing="0" style="margin-bottom:10px"> 		
                                            <tbody><tr>
                                                <td>                      
                                                    <ul>       
                                                        <li>Time adjustment will not be made due to late arrival and refund request will not be accommodated.</li>
                                                        <li>For people with motion sickness/seasickness or think may have please be advised to take motion sickness pills at least 30 minutes - 1 hour before the trip.</li>
                                                        <li>Bring your valid voucher and present upon arrival.</li>
                                                        <li>Each passenger must present a valid Identification Card(Labor Card,Emirates ID, Passport ID, VISA &amp; Driving License) as per coast guard policy.</li>
                                                        <li>Please come 10-15 minutes early before your trip.</li>
                                                    </ul>
                                                </td>
                                            </tr>	
                                        </tbody></table>
                                        <br>
                                        
                                                                            
                                        
                                                                            
                                        <table width="100%" border="0" cellpadding="0" cellspacing="0" style="margin-bottom:10px"> 		
                                            <tbody><tr>
                                                <td bgcolor="#11CCE9" style="padding:10px 15px">
                                                    <h2 style="color:#fff;font-size:16px;margin:0;padding:0">CANCELLATION POLICY</h2>
                                                </td>
                                            </tr>	
                                        </tbody></table>
                                        
                                        
                                        <table width="100%" border="0" cellpadding="7" cellspacing="0">
    
                                            <tbody><tr>
                                                <td>
                                                    <div style="padding:0px">    <ul>       
                                                            <li>Changes to the reservation is subject to the availability (additional charges may applied)</li>
                                                            <li>Cancellation outside 72 hours from trip time: You will be charged 30% of trip cost.</li>
                                                            <li>Cancellation within 72 Hours from trip time: You will be charged 50% of trip cost.</li>
                                                            <li>Cancellation within 36 Hours from trip time: You will be charged 80% of trip cost.</li>
                                                            <li>Cancellation within 24 Hours from trip time: You will be charged 100% of trip cost. </li>
                                                        </ul>
                                                    </div>
                                                    <small style="font-size:10px">We may cancel your reservation due to the event beyond our control such as bad weather ( No Sailing Permit), mechanical failure, coast guard restrictions, and enforcement of new laws. Asfar Yacht will provide alternatives within the charter budget or Full Refund will be processed.</small></td>
    
                                            </tr>
                                        </tbody></table>
                                        
                                        <hr style="border:0;border:1px solid #ddd;height:0;margin:0;margin-bottom:15px;margin-top:30px">
                                        
                                        <table border="0" width="100%" cellspacing="0">
                                            <tbody><tr>
                                                <td style="padding-right:15px">
                                                    <h4 style="margin-top:0;margin-bottom:7px">Dear dfgf rgrg</h4> 
                                                    <p>Visit our website today and check all latest yachts and offers. Now booking your yacht online in 3 simple steps!</p>
                                                    <a href="https://asfaryacht.com" style="color:#ec6f23" rel="noreferrer" target="_blank" data-saferedirecturl="https://www.google.com/url?q=https://asfaryacht.com&amp;source=gmail&amp;ust=1625562291483000&amp;usg=AFQjCNFABbnXmFMp47CNSi48lj2WssOuXw">Go to Asfaryacht.com</a>
                                                </td>
                                                <td width="350">
                                                    <a href="#m_-1757351091086838996_m_5930464513775716706_m_1846324454999606905_" rel="noreferrer"><img src="https://ci5.googleusercontent.com/proxy/7ea5JBOFcuUvrO4yGhsEwdan9MSZtwKz3Fm4_PHSxROMTWtu3gvRhX6Z9KQMVl2q0rmBQODa1a0tVG8QMCO6njjjnbk71Q=s0-d-e1-ft#https://asfaryacht.com/assets/images/email/apps.jpg" style="max-width:100%" class="CToWUd"></a>
                                                </td>
                                            </tr>
                                        </tbody></table> 
                                                                            <hr style="border:0;border:1px solid #ddd;height:0;margin:0;margin-bottom:15px;margin-top:15px">
    
                            <center>
                                <a href="https://asfaryacht.com/booking/voucher/UVVaVU1qUlpNREl5TVVaWk5qUk5Wdz09" style="color:#fff;text-decoration:none;padding:10px 20px;background-color:#ec6f23;display:inline-block;border-radius:5px" rel="noreferrer" target="_blank" data-saferedirecturl="https://www.google.com/url?q=https://asfaryacht.com/booking/voucher/UVVaVU1qUlpNREl5TVVaWk5qUk5Wdz09&amp;source=gmail&amp;ust=1625562291483000&amp;usg=AFQjCNH3mFw23QoQvQjsUcJ6N88ZJ8ChIQ">View voucher on website  </a> 
                            </center>
    
                            <hr style="border:0;border:1px solid #ddd;height:0;margin:0;margin-bottom:15px;margin-top:15px">
    
    
                            
                            <table border="0" width="100%" cellpadding="15" cellspacing="0">
                                <tbody><tr>
                                    <td>
                                        <p align="center" style="color:#999;font-size:13px;padding:0 30px">
                                            <img src="{{asset('reservation_emails')}}/main-logo.png" height="60" class="CToWUd"> <br> 
                                            We would like to hear from you. For any questions, suggestions or comments please contact us at:
                                            Customer Service Team - Email: <a href="mailto:support@asfaryacht.com" rel="noreferrer" target="_blank">support@asfaryacht.com</a> or call us within the UAE at 800 ASFAR(27327) or internationally at +971 4 2555143 our team is available 24/7.
                                            <br><br>
                                            <a href="https://www.facebook.com/asfaryachtcharter/" rel="noreferrer" target="_blank" data-saferedirecturl="https://www.google.com/url?q=https://www.facebook.com/asfaryachtcharter/&amp;source=gmail&amp;ust=1625562291483000&amp;usg=AFQjCNGK9FS3PVPCg8xhyjCgwigdotg0sQ"><img src="{{asset('reservation_emails')}}/fb.png" class="CToWUd"></a>
                                            <a href="https://twitter.com/AsfarYacht" rel="noreferrer" target="_blank" data-saferedirecturl="https://www.google.com/url?q=https://twitter.com/AsfarYacht&amp;source=gmail&amp;ust=1625562291483000&amp;usg=AFQjCNE2A3zAjbcG3zPPVSsozhiPOEuUew"><img src="{{asset('reservation_emails')}}/twiter.png" class="CToWUd"></a>
                                            <a href="https://www.instagram.com/asfaryachts/" rel="noreferrer" target="_blank" data-saferedirecturl="https://www.google.com/url?q=https://www.instagram.com/asfaryachts/&amp;source=gmail&amp;ust=1625562291483000&amp;usg=AFQjCNFm3Y3jPJvn09Q0CEycLJE_YCffdA"><img src="{{asset('reservation_emails')}}/insta.png" class="CToWUd"></a>
                                            <br><br>
                                            Boats Ride © copyright 2008 -2018                                                    
                                        </p>
                                    </td>
                                </tr>
                            </tbody></table> 
                    </td>
                </tr>
                
            </tbody>
        </table>
        <br><br><br><br>
            
    </td>
    </tr>
    </tbody></table><div class="yj6qo"></div><div class="adL">
    
    </div></div>
    </body>
</html>