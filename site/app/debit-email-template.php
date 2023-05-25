<!DOCTYPE html>
<html>
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title></title>
</head>
    <body style="color: #fff; font-size: 16px; text-decoration: none; font-family: 'Helvetica Neue', Helvetica, Arial, sans-serif; background-color: #efefef;">
        
        <div id="wrapper" style="max-width: 600px; margin: auto auto; padding: 20px;">
            
            <div id="logo">
                <center><h1 style="margin: 0px;"><a href="{SITE_ADDR}" target="_blank"><img style="max-height: 75px;" src="javascript:void(0);"></a></h1></center>
            </div>
                
            <div id="content" style="font-size: 16px; padding: 25px; background-color: #fff;
                -webkit-border-radius: 10px; border-radius: 10px; -khtml-border-radius: 10px;
                border-color: #055c2d; border-width: 4px 1px; border-style: solid;">

                <h1 style="font-size: 22px; color:#000"><center>Debit Alert</center></h1>

                <p style="color:#000">  
                    Debit:{FROM_ACC}
                    <br>
                    To: {TO_NAME}
                    <br>
                    Amount:${AMOUNT}
                    <br>                    
                    Date: {DATE}
                    <br>
                    Desc: {DESC}
                    <br>
                    BAL: {S_BAL}
                </p>                               
            </div>
        </div>
    </body>
</html>