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
        console.log(str);
    }





function check_withAjax()
{
	var post_check_email = "email=" + document.getElementById('email').value;
	ajaxPostCallManip(post_check_email, "http://localhost/mvc/register.php", function()  
        // toDoFunc to be performed when server response is ready
        {
        if( xmlhttp.readyState == 4 && xmlhttp.status == 200 )
        {   
            console.log(xmlhttp.responseText);	
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


