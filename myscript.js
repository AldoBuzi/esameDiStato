function CheckLogin(){
    //document.cookie = "sessioncook= ; path=/; expires = Thu, 01 Jan 1970 00:00:00 GMT";
    var x= getCookie("AutoLog")=== 'undefined'?"":getCookie("AutoLog");  
    var y= getCookie("sessioncook")=== 'undefined'?"":getCookie("sessioncook");  
    console.log(y);
    console.log(x);
    if(x==""&&y==""){
        window.location.href = "script/AccountManager.php";
    }
    //document.cookie = "sessioncook= ; expires = Thu, 01 Jan 1970 00:00:00 GMT";

}
function Login(email, password){
    var xmlhttp=new XMLHttpRequest();
  xmlhttp.onloadend=function() {
    if (xmlhttp.readyState==4 && xmlhttp.status==200) {
      document.getElementById("checkauth").innerHTML=this.responseText== "true"? "<img class='img-responsive h-auto fixed-center' style='margin: 0 auto;'  src='img/loading.gif' >": this.responseText;
      document.getElementById("checkauth").value= this.responseText;
 }
  }
  console.log(this.responseText);
  xmlhttp.addEventListener("loadend", CheckResult, false);
  var check= document.getElementById("check").checked? "true": "false";
  xmlhttp.open("GET","script/Login.php?email="+email+"&password="+password+"&check="+check,true);
  xmlhttp.send();
}
function CheckResult(){
    if(document.getElementById("checkauth").value=="true"){
        window.location.href = "http://192.168.1.250/Elaborato";
      }
}
function GetProfileInfo(){
  var xmlhttp=new XMLHttpRequest();
  xmlhttp.onloadend=function() {
    if (xmlhttp.readyState==4 && xmlhttp.status==200) {
      document.getElementById("profile").innerHTML=this.responseText;
 }
  }
  xmlhttp.open("GET","script/RecoverProfileInfo.php",true);
  xmlhttp.send();
}
function getCookie(cname) {
  var name = cname + "=";
  var decodedCookie = decodeURIComponent(document.cookie);
  var ca = decodedCookie.split(';');
  for(var i = 0; i <ca.length; i++) {
    var c = ca[i];
    while (c.charAt(0) == ' ') {
      c = c.substring(1);
    }
    if (c.indexOf(name) == 0) {
      return c.substring(name.length, c.length);
    }
  }
  return "";
}
function SendLogOut(){
  console.log(getCookie("sessioncookie"));
  document.cookie = "AutoLog= ; path=/; expires = Thu, 01 Jan 1970 00:00:00 GMT";
  document.cookie = "sessioncook= ; path=/; expires = Thu, 01 Jan 1970 00:00:00 GMT";
  console.log(getCookie("sessioncookie"));
  window.location.href = "http://localhost/Elaborato/Login.html";
  console.log(getCookie("sessioncookie"));
}
function CheckPasswordOnSign(){
  var fpass= document.getElementById("fpassword").value;
  var spass= document.getElementById("spassword").value;
  if(fpass==spass){
    document.getElementById("submit").setAttribute("onclick", "CreateOperaio()");
    document.getElementById("notcorrect").innerHTML= "Ottimo!"
  }
  else{
    document.getElementById("notcorrect").innerHTML= "Le password non corrispondono";
    document.getElementById("submit").setAttribute("onclick", "");
  }
}
function CreateOperaio(){
  var xmlhttp=new XMLHttpRequest();
  var allid = new Array("nome","cognome","nascita","luogo","email","CF","fpassword","SelectCantiere","SelectUtente");
  xmlhttp.onloadend=function() {
    if (xmlhttp.readyState==4 && xmlhttp.status==200) {
      document.getElementById("notcorrect").innerHTML=this.responseText;
 }
  }
  var url="script/CreateOp.php";
 for(var s=0;s<allid.length;s++){
  var sign= s==0?"?":"&";
  url= url+sign+allid[s]+"="+document.getElementById(allid[s]).value;
}
  xmlhttp.open("GET",url,true);
  xmlhttp.send();
}
function GetCantiere(x){
  var xmlhttp=new XMLHttpRequest();
  xmlhttp.onloadend=function() {
    if (xmlhttp.readyState==4 && xmlhttp.status==200) {
      document.getElementById("SelectCantiere").innerHTML=this.responseText;
 }
  }
  xmlhttp.open("GET","script/GetCantiere.php?index="+x,true);
  xmlhttp.send();
}
function ProfileMobileManager(index){
    var Keys= new Array("pills-home","pills-profile","pills-messages","pills-settings");
    var width = (window.innerWidth > 0) ? window.innerWidth : screen.width;
    if(width<560&&index==0){
      document.getElementById("items-table").style="visibility: visible; max-height: 100%; max-width: 100%;";
      document.getElementById("v-pills-tab").style="visibility: hidden; max-height: 0; max-width: 0;";
      document.getElementById("goback").style="visibility: visible; max-height: 100%; max-width: 100%;";

    }
    else if(index==1){
      document.getElementById("items-table").style="visibility: hidden; max-height: 0; max-width: 0;";
      document.getElementById("v-pills-tab").style="visibility: visible; max-height: 100%; max-width: 100%;";
      document.getElementById("goback").style="visibility: hidden; max-height: 0; max-width: 0;";
    }
}
function GetWorkerHrs(){
  var xmlhttp=new XMLHttpRequest();
  xmlhttp.onloadend=function() {
    if (xmlhttp.readyState==4 && xmlhttp.status==200) {
      document.getElementById("ResultTable").innerHTML=this.responseText;
 }
  }
  document.getElementById("ResultDiv").style= "display: block;";
  xmlhttp.open("GET","script/GetWorkerHrs.php?month="+document.getElementById("Month").value,true);
  xmlhttp.send();
}
function SearchWorkerCount(){
  var xmlhttp=new XMLHttpRequest();
  xmlhttp.onloadend=function() {
    if (xmlhttp.readyState==4 && xmlhttp.status==200) {
      document.getElementById("accordionExample").innerHTML=this.responseText;
 }
  }
  xmlhttp.open("GET","script/workercount.php?Cantiere="+document.getElementById("SelectCantiere").value,true);
  xmlhttp.send();
}
function GetDPI(){
  var xmlhttp=new XMLHttpRequest();
  xmlhttp.onloadend=function() {
    if (xmlhttp.readyState==4 && xmlhttp.status==200) {
      document.getElementById("SelectDPI").innerHTML=this.responseText;
 }
  }
  xmlhttp.open("GET","script/GetDPI.php",true);
  xmlhttp.send();
}
function GetDpiUsage(){
  var xmlhttp=new XMLHttpRequest();
  xmlhttp.onloadend=function() {
    if (xmlhttp.readyState==4 && xmlhttp.status==200) {
      document.getElementById("ResultTable").innerHTML=this.responseText;
 }
  }
  document.getElementById("ResultDiv").style= "display: block;";
  xmlhttp.open("GET","script/GetDpiUsage.php?dpi="+document.getElementById("SelectDPI").value,true);
  xmlhttp.send();
}
function RecoverPassword(){
  var xmlhttp=new XMLHttpRequest();
  var email= document.getElementById("email").value;
  xmlhttp.onloadend=function() {
    if (xmlhttp.readyState==4 && xmlhttp.status==200) {
      document.getElementById("PasswordDiv").innerHTML=this.responseText;
 }
  }
  xmlhttp.open("GET","script/PasswordRecover.php?email="+email,true);
  xmlhttp.send();
  setTimeout(function () {
    window.location.href = "http://localhost/Elaborato/Login.html";
  }, 10000);
  

}
function RedirectTimer(){
  window.location.href = "http://localhost/Elaborato/Login.html";
}
function GetWorkerType(){
  var xmlhttp=new XMLHttpRequest();
  var cf= document.getElementById("CF").value;
  var data= document.getElementById("data").value;
  xmlhttp.onloadend=function() {
    if (xmlhttp.readyState==4 && xmlhttp.status==200) {
      document.getElementById("ResultTable").innerHTML=this.responseText;
 }
  }
  document.getElementById("ResultDiv").style= "display: block;";
  xmlhttp.open("GET","script/SearchWorkType.php?cf="+cf+"&data="+data,true);
  xmlhttp.send();
}
function GetProfile(){
  var x= getCookie("AutoLog")=== 'undefined'?"":getCookie("AutoLog");  
    var y= getCookie("sessioncook")=== 'undefined'?"":getCookie("sessioncook");  
    console.log(y);
    console.log(x);
  var xmlhttp=new XMLHttpRequest();
  xmlhttp.onloadend=function() {
    if (xmlhttp.readyState==4 && xmlhttp.status==200) {
      document.getElementById("items-table").innerHTML=this.responseText;
 }
  }
  var s=getCookie("name");
  document.getElementById("title").innerHTML=s.replace("+"," ");
  xmlhttp.open("GET","script/ProfileSection.php?x="+x+"&y="+y,true);
  xmlhttp.send();
}
function SetNewPassword(){
  var x= getCookie("AutoLog")=== 'undefined'?"":getCookie("AutoLog");  
  var y= getCookie("sessioncook")=== 'undefined'?"":getCookie("sessioncook");  
  var opass= document.getElementById("opass").value
  var npass=document.getElementById("npass").value
  var xmlhttp=new XMLHttpRequest();
  xmlhttp.onloadend=function() {
    if (xmlhttp.readyState==4 && xmlhttp.status==200) {
      document.getElementById("PasswordResult").innerHTML=this.responseText;
 }
  }
  xmlhttp.open("GET","script/SetNewPassword.php?x="+x+"&y="+y+"&npass="+npass+"&opass="+opass,true);
  xmlhttp.send();
  setTimeout(function () {
    window.location.href = "http://localhost/Elaborato/Login.html";
  }, 10000);
}
function SetNewMail(){
  var x= getCookie("AutoLog")=== 'undefined'?"":getCookie("AutoLog");  
  var y= getCookie("sessioncook")=== 'undefined'?"":getCookie("sessioncook");  
  var epass= document.getElementById("epass").value
  var nmail=document.getElementById("nmail").value
  var xmlhttp=new XMLHttpRequest();
  xmlhttp.onloadend=function() {
    if (xmlhttp.readyState==4 && xmlhttp.status==200) {
      document.getElementById("MailResult").innerHTML=this.responseText;
 }
  }
  xmlhttp.open("GET","script/SetNewMail.php?x="+x+"&y="+y+"&nmail="+nmail+"&epass="+epass,true);
  xmlhttp.send();
  //setTimeout(function () {
  //  window.location.href = "http://localhost/Elaborato/Login.html";
  //}, 10000);
}
function DownloadData(){
  var xmlhttp=new XMLHttpRequest();
  var memail= document.getElementById("memail").value;
  var x= getCookie("AutoLog")=== 'undefined'?"":getCookie("AutoLog");  
  var y= getCookie("sessioncook")=== 'undefined'?"":getCookie("sessioncook");  
  xmlhttp.onloadend=function() {
    if (xmlhttp.readyState==4 && xmlhttp.status==200) {
      document.getElementById("DataResult").innerHTML=this.responseText;
 }
  }
  xmlhttp.open("GET","script/downloadData.php?memail="+memail+"&x="+x+"&y="+y,true);
  xmlhttp.send();
}
function OnOver(x){

  var mouseTarget= elementMouseIsOver =x;
  mouseTarget.className+="border border-3 border-primary";
}
function OnExit(x){
  var mouseTarget= elementMouseIsOver =x;
  if(x.id!="dont-fade"){
    mouseTarget.className="fade my-5 mx-2 shadow-lg ";
  }
  else {
    mouseTarget.className="my-5 mx-2 shadow-lg ";
  }
}