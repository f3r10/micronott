var xmlhttp;
var time;
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

function retweet(nickname,user, time, url,idPost)
{
	console.log(document.getElementById(idPost));
	document.getElementById(idPost).style.display = "";
	 var postStr = "userCompa=" + nickname+ "&" + "user=" + user + "&" + "post=" + time + "&" + "value=" + 1;
	 ajaxPostCallManip(postStr, url + "ajax", function()  
        // toDoFunc to be performed when server response is ready
        {
        if( xmlhttp.readyState == 4 && xmlhttp.status == 200 )
        {   
            console.log(xmlhttp.responseText);
            if(xmlhttp.responseText=="registro exitoso")
            {
            	console.log(idPost);
            	console.log(document.getElementById(idPost));
            	document.getElementById(idPost).style.display = "";
            }	
        	

        }
        });

}