"Use Strict"
var usname = document.getElementById("user_id");
var psword = document.getElementById("p_word");
var stat;
var regex=/((?=.*\d)(?=.*[a-z])(?=.*[A-Z]).{8,})/;
function validate(){
	var fname=document.getElementById("ffname");
	var lname=document.getElementById("flname");
	var uname=document.getElementById("funame");
	var pword=document.getElementById("fpword");
	var pwordcon=document.getElementById("fconfirm");
	if(fname.value==''){
		fname.className="cl_redit";
		alert("Please enter a first name !");
		fname.classList.remove("cl_redit");
		return false;
	}
	if(lname.value==''){
		lname.className="cl_redit";
		alert("Please enter a last name !");
		lname.classList.remove("cl_redit");
		return false;
	}
	if(uname.value==''){
		uname.className="cl_redit";
		alert("Please enter a username !");
		uname.classList.remove("cl_redit");
		return false;
	}
	if(!(regex.test(pword.value))){
		pword.className="cl_redit";
        alert("The password is not valid");
        pword.classList.remove("cl_redit");
        return false;
	}
	if(pword.value==''){
		pword.className="cl_redit";
		alert("Please enter a password !");
		pword.classList.remove("cl_redit");
		return false;
	}
	if (pwordcon.value !== pword.value){
		pwordcon.className="cl_redit";
		alert("Passwords fo not match !");
		pwordcon.classList.remove("cl_redit");
		return false;
	}
	new Ajax.Request("register.php",
        {
            method: "GET",
            parameters: 'fsssname='+fname.value+'&lsssname='+lname.value+'&usssname='+uname.value+'&psssword='+pwordcon.value,
            onSuccess: function handler(ajax){
                document.open();
                document.write(ajax.responseText);
                document.close();

            }
        }
    );
}
$(document).ready(function(){
    $("#close").click(function(){
        $("#register").hide();
        $("#close").hide();
    });
    $("#open").click(function(){
        $("#register").show();
        $("#close").show();
    });
    $("#view").click(function(){
        $("#div1").load("viewUsers.php");
        $("#div1").show();
        $("#hideu").show();
    });
    $("#hideu").click(function(){
        $("#div1").hide();
         $("#hideu").hide();
    });
     $("#admin").click(function(){
        $("#main").load("loginAdmin.html");
    });
     $("#user").click(function(){
        $("#main").load("loginUser.html");
    });
     $("#home").click(function(){
        $("#homescreen").load("index.html");
    });
     $("#adhome").click(function(){
        $("#adminhome").load("AdminHome.html");
    });
     $("#homeuu").click(function(){
        $("#userhome").load("UserHome.html");
});
});

function inner(){
		stat=usname.value
		if (usname.value==''){
			usname.className="cl_redit";
			alert("Please enter a username !");
			usname.classList.remove("cl_redit");
			return false;
		}
		if (psword.value==''){
			psword.className="cl_redit";
	        alert("Please enter a password");
	        psword.classList.remove("cl_redit");
	        return false;
		}
		if(!(regex.test(psword.value))){
			psword.className="cl_redit";
	        alert("The password is not valid");
	        psword.classList.remove("cl_redit");
        	return false;
		}
		return true;
}
function validSub() {
	var result= inner();
	if (result==false){
		return false;
	}
	new Ajax.Request("loginAdmin.php",
        {
            method: "GET",
            parameters: 'uname='+usname.value+'&pword='+psword.value,
            onSuccess: function handler(ajax){
                document.open();
                document.write(ajax.responseText);
                document.close();

            }
        }
    );
}
function bvalidSub(){
	result= inner();
	if (result==false){
		return false;
	}
	new Ajax.Request("loginUser.php",
        {
            method: "GET",
            parameters: 'ussname='+usname.value+'&pssword='+psword.value,
            onSuccess: function handler(ajax){
                document.open();
                document.write(ajax.responseText);
                document.close();

            }
        }
    );
}
function logout(){
    new Ajax.Request("logout.php",
        {
            method: "GET",
            onSuccess: function handler(ajax){
                document.open();
                document.write(ajax.responseText);
                document.close();
            }
        }
    );
}
function sendMsg(){
	var subject=document.getElementById("msubj");
	var sender=document.getElementById("msend");
	var recp=document.getElementById("mrecp");
	var body=document.getElementById("mbody");
	new Ajax.Request("message.php",
        {
            method: "GET",
            parameters: 'mmsubj='+subject.value+'&mmsend='+sender.value+'&mmrecp='+recp.value+'&mmbody='+body.value,
            onSuccess: function handler(ajax){
                document.open();
                document.write(ajax.responseText);
                document.close();
            }
        }
    );
}