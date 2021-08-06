// theme change
$('#themes').change(function () {
  debugger
  $("#stylesheet").attr({ href: $('#themes').find(":selected").val() });
});
// theme change end
// session expire
var interval;
$(document).on('mousemove', function () {
  clearInterval(interval);
  var coutdown = 5 * 60,
    $timer = $('.timer'); // After 5 minutes session expired  (mouse button click code)
  $timer.text(coutdown);
  interval = setInterval(function () {
    $timer.text(--coutdown);
    if (coutdown === 0) {
      alert("Session expired User successfully logout.");
      window.location = "login.html";
    }
  }, 1000);
}).mousemove();
var interval;
$(document).on('keydown', function () {
  clearInterval(interval);
  var coutdown = 5 * 60, $timer = $('.timer'); // After 5 minutes session expired (keyboard button press code)
  $timer.text(coutdown);
  interval = setInterval(function () {
    $timer.text(--coutdown);
    if (coutdown === 0) {
      alert("Session expired User successfully logout.");
      window.location = "login.html";
    }
  }, 1000);
}).mousemove();
// session expire end
// fill address
function filladdress() {
  debugger
  alert();
  if (filladdress.checked == true) {
    alert();
    var p_Country = document.getElementById("p_Country").value;
    var p_city = document.getElementById("p_city").value;
    var p_state = document.getElementById("p_state").value;
    var p_Street = document.getElementById("p_Street").value;
    var p_postalcode = document.getElementById("p_postalcode").value;


    var v_country = p_Country;
    var v_city = p_city;
    var v_state = p_state;
    var v_Street = p_Street;
    var v_postalcode = p_postalcode;

    document.getElementById("p_Country").value = v_country;
    document.getElementById("p_city").value = v_city;
    document.getElementById("p_state").value = v_state;
    document.getElementById("p_Street").value = v_Street;
    document.getElementById("p_postalcode").value = v_postalcode;
  }
  else if (filladdress.checked == false) {
    document.getElementById("p_Country").value = '';
    document.getElementById("p_city").value = '';
    document.getElementById("p_state").value = '';
    document.getElementById("p_Street").value = '';
    document.getElementById("p_postalcode").value = '';
  }
}
//end fill address
$(".toggle-password").click(function () {

  $(this).toggleClass("fa-eye fa-eye-slash");
  var input = $($(this).attr("toggle"));
  if (input.attr("type") == "password") {
    input.attr("type", "text");
  } else {
    input.attr("type", "password");
  }
});
$(document).ready(function () {
  $(".addDep").class(function () {
    $("#depart").show();
  });
})
$(document).ready(function () {
  $("#editemp").click(function () {
    $("#prifix").css("display", "block");
    $("#firstname").css("display", "block");
    $("#lastname").css("display", "block");
    $("#email").css("display", "block");
    $("#firstlabel").css("display", "none");
    $("#lastlabel").css("display", "none");
    $("#emaillabel").css("display", "none");
    $("#prifixlabel").css("display", "none");
  });
  $("#cancelprifix").click(function () {
    $("#prifixlabel").css("display", "block");
    $("#prifix").css("display", "none");
  })
  $("#cancelfirst").click(function () {
    $("#firstlabel").css("display", "block");
    $("#firstname").css("display", "none");
  })
  $("#cancellast").click(function () {
    $("#lastlabel").css("display", "block");
    $("#lastname").css("display", "none");
  })
  $("#cancelemail").click(function () {
    $("#emaillabel").css("display", "block");
    $("#email").css("display", "none");
  })
  // casual leave edit
  $("#cl_edit").click(function () {
    $("#add_cl").css("display", "block");
    $("#cl_label").css("display", "none");
  })
  $("#cancel_edit").click(function () {
    $("#add_cl").css("display", "none");
    $("#cl_label").css("display", "block");
  })
  //end casual leave edit
  // start working hr
  $("#s").click(function () {
    $("#sunday").toggle();
    $("#s").toggleClass("active_day");
  });
  $("#m").click(function () {
    $("#monday").toggle();
    $("#m").toggleClass("active_day");
  });
  $("#t").click(function () {
    $("#tuesday").toggle();
    $("#t").toggleClass("active_day");
  })
  $("#w").click(function () {
    $("#wednesday").toggle();
    $("#w").toggleClass("active_day");
  })
  $("#th").click(function () {
    $("#thursday").toggle();
    $("#th").toggleClass("active_day");
  })
  $("#f").click(function () {
    $("#friday").toggle();
    $("#f").toggleClass("active_day");
  })
  $("#sat").click(function () {
    $("#saturday").toggle();
    $("#sat").toggleClass("active_day");
  })
  // start working hr end

  // select time from 
  $(".time_from input").click(function (e) {
    $(this).select();
    $(this).next(".intime_dropdown").css("display", "block");
    $(".outTime_dropdown").hide();
    e.stopPropagation();
  })
  $(".time_to input").click(function (e) {
    $(this).select();
    $(this).next(".outTime_dropdown").css("display", "block");
    // $(".outTime_dropdown").show();
    $(".intime_dropdown").hide();
    e.stopPropagation();
  });
  $(".outTime_dropdown").click(function (e) {
    e.stopPropagation();
  })


  // get time from calender and append in table
  $(".fc-day-number").on("click", function () {
    var a = $(this).attr("data-date");
    var leavetype = '<select class="form-control"><option>Select</option><option>Halfday</option><option>Fullday</option></select> ';
    var leavetime = '<select class="form-control"><option>Select</option><option>First Half</option><option>Second Half</option></select>';
    var action = '<i class="mdi mdi-close text-danger delete-row"></i>';
    var appendDate = "<tr><td>" + a + "</td><td>" + leavetype + "</td><td>" + leavetime + "</td><td class='text-center'>" + action + "</td></tr>"
    $("table#appendDate tbody").append(appendDate);
  });
  // end get time from calender and append in table


  // delete row of table
  $("table#appendDate tbody").on("click", ".delete-row", function () {
    $(this).parent().parent().remove();
  });
  // end delete row of table


  $(".outTime_dropdown ul li").on("click", function () {
    alert();
    debugger
    var selectedvalue = $(this).text();
    var a = $(".time_to input").attr("value");
    a = $(this).text();
    console.log(a);
    (".outTime_dropdown").hide();
  });
});
$("body").click(function (e) {
  $(".outTime_dropdown").hide();
  $(".intime_dropdown").hide();
})

