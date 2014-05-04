var xmlhttp;

function ajaxPostCallManip( str, url, toDoFunc )
    {   
        if( window.XMLHttpRequest )
        {         // For modern browsers
        xmlhttp = new XMLHttpRequest;
    	}
        else
        {                    // For old browsers
        xmlhttp = new ActiveXOBject("Microsoft.XMLHttp");
        }

        xmlhttp.onreadystatechange=toDoFunc;
        xmlhttp.open("POST", url, true);
        xmlhttp.setRequestHeader("Content-type","application/x-www-form-urlencoded");
        xmlhttp.send(str);
        console.log(str);
    }



function check_login()
    {
    	console.log("entra al check");
        // Construct the POST variables [username, password]
        var postStr = "username=" + document.getElementById("username").value+ "&" 
            + "password=" + document.getElementById("password").value;


        // Call the general purpose AJAX Handler Function
        ajaxPostCallManip(postStr, "index.php", function()  
        // toDoFunc to be performed when server response is ready
        {
        if( xmlhttp.readyState == 4 && xmlhttp.status == 200 )
        {
        	console.log("holas"); 
        	console.log(xmlhttp.responseText);
        /*  
            alert(xmlhttp.responseText);        
            switch(xmlhttp.responseText)
            {
                case "1":
                $('#login_err').css({'color':'green','display':'block'})
                                       .html('Successful Login');                   
                break;

            case "2":
                    $('#login_err').css({'color':'red','display':'block'})
                                       .html('incorrect username/password')
                break;

            case "3":
                $('#login_err').css({'color':'red','display':'block'})
                                       .html('please fill in all fields')
                break;
            }*/

        }
        });
    }

function check_register()
{
	console.log("entra check register");
	var post_check_email = "email=" + document.getElementById("email").value;
	ajaxPostCallManip(post_check_email, "index.php", function()  
        // toDoFunc to be performed when server response is ready
        {
        if( xmlhttp.readyState == 4 && xmlhttp.status == 200 )
        {
        	console.log("comprobacion con exito del email"); 
        	console.log(xmlhttp.responseText);
        

        }
        });

}

