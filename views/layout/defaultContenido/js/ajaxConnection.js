var xmlhttp;

function ajaxPostCallManip(str,url,toDoFunc) {   
        if(window.XMLHttpRequest){         // For modern browsers
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
        //console.log(str);
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

function check_withAjax(value_check_ajax,url)
{
	var post_check_email = value_check_ajax +"=" + document.getElementById(value_check_ajax).value;
	ajaxPostCallManip(post_check_email, url+"registro", function()  
        // toDoFunc to be performed when server response is ready
        {
        if( xmlhttp.readyState == 4 && xmlhttp.status == 200 )
        {   
            //console.log(xmlhttp.responseText);	
        	if(xmlhttp.responseText=="usuario ya registrado")
            {

                document.getElementById(value_check_ajax).style.border="solid 1px red";
            }

            else if (xmlhttp.responseText=="usuario no registrado")
            {
                document.getElementById(value_check_ajax).style.border="solid 1px green";
            }

        }
        });

}

function check_register(value_check_ajax)
{

    var value_for_database= value_check_ajax.name;
    check_withAjax(value_for_database);
}

