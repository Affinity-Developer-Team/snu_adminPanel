var dashb = document.getElementById("dashb");
var gallery1 = document.getElementById("galle");
var stu = document.getElementById("stu");
var data = document.getElementById("data");
var prof = document.getElementById("prof");

function dash() {
  dashb.className = "col-10 position-absolute d-block";
  gallery1.className = "d-none";
  stu.className = "d-none";
  data.className = "d-none";
  prof.className = "d-none";
}

function gallery_show() {
  dashb.className = "d-none";
  gallery1.className = "col-10 position-absolute d-block";
  stu.className = "d-none";
  data.className = "d-none";
  prof.className = "d-none";
}
function student_show() {
  dashb.className = "d-none";
  gallery1.className = "d-none";
  stu.className = "col-10 position-absolute d-block";
  data.className = "d-none";
  prof.className = "d-none";
}

function database_show() {
  dashb.className = "d-none";
  gallery1.className = "d-none";
  stu.className = "d-none";
  data.className = "col-10  position-absolute d-block";
  prof.className = "d-none";
}
function profile_show() {
  dashb.className = "d-none";
  gallery1.className = "d-none";
  stu.className = "d-none";
  data.className = "d-none";
  prof.className = "col-10  position-absolute d-block";
}

function login() {
  var error = document.getElementById("erroshow");
  var email = document.getElementById("uname");
  var pw = document.getElementById("pw");

  var fo = new FormData();

  fo.append("e", email.value);
  fo.append("p", pw.value);

  var re = new XMLHttpRequest();
  re.onreadystatechange = function () {
    if (re.readyState == 4 && re.status == 200) {
      var res = re.responseText;
      if (res == "success") {
        window.location = "index.php";
      } else {
        error.className =
          "alert alert-danger align-content-center mt-3 ps-0 pt-0 m-0 d-block";
        error.innerHTML = res;
      }
    }
  };
  re.open("POST", "loginProcess.php", true);
  re.send(fo);
}
function logout() {
  var req = new XMLHttpRequest();

  req.onreadystatechange = function () {
    if (req.readyState == 4 && req.status == 200) {
      res = req.responseText;
      if (res == "success") {
        window.location.reload();
      } else {
        alert(res);
      }
    }
  };

  req.open("POST", "logoutProcess.php", true);
  req.send();
}

function submit2() {
  var br = document.getElementById("branchoptions");
  var user = document.getElementById("users");
  var funame = document.getElementById("funame");
  var marks = document.getElementById("marks");
  var date = document.getElementById("date");
  var intime = document.getElementById("intime");
  var outtime = document.getElementById("outtime");

  var form = new FormData();

  form.append("funame", funame.value);
  form.append("marks", marks.value);
  form.append("date", date.value);
  form.append("intime", intime.value);
  form.append("outtime", outtime.value);
  form.append("br", br.value);
  form.append("users", user.value);

  var req2 = new XMLHttpRequest();

  req2.onreadystatechange = function () {
    if (req2.readyState == 4 && req2.status == 200) {
      res2 = req2.responseText;
      if (res2 == "success") {
        $("#dtab").load(location.href + " #dtab");
        funame.value = "";
        marks.value = "";
        date.value = "";
        intime.value = "";
        outtime.value = "";
      } else {
        alert(res2);
      }
    }
  };
  req2.open("POST", "submitProcess.php", true);
  req2.send(form);
}
function hidealert() {
  var error = document.getElementById("erroshow");
  error.className =
    "d-none";
  error.innerHTML = "";
}
