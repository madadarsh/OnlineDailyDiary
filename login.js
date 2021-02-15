function check(){
    var valid=true;
    if(document.form1.u_email.value==""){
        alert("Email can't be empty");
        valid=false;
    }
    var p=document.form1.u_pass.value;
    if(p.length<8){
        alert('Password must contain minimum 8 characters');
        valid=false;
    }
    return valid;
}
function check2(){
    var valid=true;
    if(document.form2.p_name.value==""){
        alert("Name can't be empty");
        valid=false;
    }
	if(document.form2.u_name.value==""){
        alert("User Name can't be empty");
        valid=false;
    }
    if(document.form2.u_email.value==""){
        alert("Email can't be empty");
        valid=false;
    }
    var p=document.form2.u_pass.value;
    if(p.length<8){
        alert('Password must contain minimum 8 characters');
        valid=false;
    }
    return valid;
}