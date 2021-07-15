<html>

<head></head>
<body>
    <table border="0" cellspacing="0" cellpadding="0" width="100%" style="width:100.0%">
        <tbody>
        <tr>
        <td style="padding:0in 0in 0in 0in">
        <p class="MsoNormal"><u></u>&nbsp;<u></u></p>
        <div align="center">
        <table border="0" cellspacing="0" cellpadding="0" style="max-width:562.5pt;border-collapse:collapse">
        <tbody>
        <tr>
        <td style="padding:0in 0in 0in 0in">
        <table border="0" cellspacing="0" cellpadding="0" width="100%" style="width:100.0%">
        <tbody>
        <tr>
        <td style="padding:4.2pt 4.2pt 4.2pt 4.2pt">
        <p class="MsoNormal"><img width="91" height="40" style="width:.95in;height:.4166in" id="m_2960976890440223410_x0000_i1028" src="{{asset('reservation_emails')}}/main-logo.png" class="CToWUd"><u></u><u></u></p>
        </td>
        <td width="70%" style="width:70.0%;padding:4.2pt 4.2pt 4.2pt 4.2pt"></td>
        </tr>
        </tbody>
        </table>
        </td>
        </tr>
        <tr>
        <td style="padding:0in 0in 0in 0in">
        <div class="MsoNormal" align="center" style="text-align:center">
        <hr size="1" width="100%" align="center">
        </div>
        <table border="0" cellspacing="0" cellpadding="0" width="100%" style="width:100.0%">
        <tbody>
        <tr>
        <td style="padding:12.0pt 12.0pt 12.0pt 12.0pt">
        <p class="MsoNormal"><b>Dear Team,</b> <br>
        <br>
        Please call back to following customer. <br>
        Name: <span>{{$render_data['request']->name}}</span> <br>
        Email: <a href="mailto:{{$render_data['request']->email}}" target="_blank">{{$render_data['request']->email}}</a> <br>
        Phone: {{$render_data['request']->phone}} <br>
        Referer Page: <a href="{{env('WEB_URL')}}/water-sports/{{$render_data['request']->waterSport->slug}}" target="_blank">{{env('WEB_URL')}}/water-sports/{{$render_data['request']->waterSport->slug}}</a><br>
        Thank You, <u></u><u></u></p>
        </td>
        </tr>
        </tbody>
        </table>
        <div class="MsoNormal" align="center" style="text-align:center">
        <hr size="1" width="100%" align="center">
        </div>
        <table border="0" cellspacing="0" cellpadding="0" width="100%" style="width:100.0%">
        <tbody>
        <tr>
        <td style="padding:12.0pt 12.0pt 12.0pt 12.0pt">
        <p class="MsoNormal"><i><span style="font-size:7.5pt">This is a System generated email. Please find the information and perform necessary actions.</span></i>
        <u></u><u></u></p>
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