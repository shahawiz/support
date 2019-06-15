<!DOCTYPE html>
<html lang="en-US">
<head>
    <meta charset="utf-8">
</head>
        <body>
        <h3>{{$site_name}} - ContactUs Request</h3>
            <br>
            <p>
                    <br>
                </p>
                <table>
                    <tbody>
                        <tr>
                            <td><b>Name</b></td>
                            <td>
                                {{$fname}}&nbsp;{{$lname}}
                            </td>
                        </tr>
                        <tr>
                            <td><b>Email</b></td>
                            <td>
                                {{$email}}
                            </td>
                        </tr>
                        <tr>
                            <td><b>Phone</b></td>
                            <td>
                                {{$phone}}
                            </td>
                        </tr>
                        <tr>
                            <td><b>Message</b></td>
                            <td>
                                {{$messageContent}}
                            </td>
                        </tr>
                    </tbody>
                </table>
                <p>
                    <br>
                </p>
        </body>
        </html>
