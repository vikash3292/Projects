   // searchable dropdown
        $(document).ready(function () {
            $('.js-example-basic-single').select2();
        });
// new password
function show_psd() {
  
  var a = document.getElementById("userpassword");
  var b = document.getElementById("eye");
  if (a.type == "password") {
    a.type = "text";
    b.className = 'fa fa-eye-slash field-icon';
  } else {
    a.type = "password";
    b.className = 'fa fa-eye field-icon';
  }
}
// confirm password
function cnf_psd() {
    debugger
  var c = document.getElementById("cpassword");
  var d = document.getElementById("cnf_eye");
  if (c.type == "password") {
    c.type = "text";
    d.className = 'fa fa-eye-slash field-icon';
  } else {
    c.type = "password";
    d.className = 'fa fa-eye field-icon';
  }
}
//login show password
function login_psd() {
  var e = document.getElementById("password");
  var f = document.getElementById("login_eye");
  if (e.type == "password") {
    e.type = "text";
    f.className = 'fa fa-eye-slash field-icon';
  } else {
    e.type = "password";
    f.className = 'fa fa-eye field-icon';
  }
}

// theme change
var Base_Url = $('#base_url').val();


$('#themes').change(function () {
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


// var interval;
// $(document).on('mousemove', function () {
//     debugger
//   clearInterval(interval);
//   var coutdown = 2 * 60,
//     $timer = $('.timer'); // After 5 minutes session expired  (mouse button click code)
//   $timer.text(coutdown);
//   interval = setInterval(function () {
//     $timer.text(--coutdown);
//     if (coutdown === 0) {
//      // alert("Session expired User successfully logout.");
//       //  window.location = Base_Url+"/logout";
//      $("#logout-form").submit();
//     }
//   }, 1000);
// }).mousemove();
// var interval;
// $(document).on('keydown', function () {
//   clearInterval(interval);
//   var coutdown = 2 * 60, $timer = $('.timer'); // After 5 minutes session expired (keyboard button press code)
//   $timer.text(coutdown);
//   interval = setInterval(function () {
//     $timer.text(--coutdown);
//     if (coutdown === 0) {
//       //alert("Session expired User successfully logout.");
//       $("#logout-form").submit();
//     }
//   }, 1000);
// }).mousemove();
// session expire end
// fill address
function filladdress() {
  debugger
  if ($("#customControlInline").is(":checked")) {
    var country = document.getElementById("country");
    var select_country = country.options[country.selectedIndex].text;
    var city = document.getElementById("city");
    var select_p_city = city.options[city.selectedIndex].text;
    var state = document.getElementById("state");
    var select_p_state = state.options[city.selectedIndex].text;
    var p_Street = document.getElementById("p_Street").value;
    var p_postalcode = document.getElementById("p_postalcode").value;

    if (select_country == "") {
      var v_country = "";
    }
    else {
      var v_country = select_country;
    }
    if (select_p_city == "") {
      var v_city = "";
    }
    else {
      var v_city = select_p_city;
    }
    if (select_p_state == "") {
      var v_state = "";
    }
    else {
      var v_state = select_p_state;
    }

    var v_city = select_p_city;
    var v_state = select_p_state;
    var v_Street = p_Street;
    var v_postalcode = p_postalcode;

    document.getElementById("c_Country").value = v_country;
    document.getElementById("c_city").value = v_city;
    document.getElementById("c_state").value = v_state;
    document.getElementById("c_Street").value = v_Street;
    document.getElementById("c_postalcode").value = v_postalcode;
  }
  else {
    document.getElementById("c_Country").value = '';
    document.getElementById("c_city").value = '';
    document.getElementById("c_state").value = '';
    document.getElementById("c_Street").value = '';
    document.getElementById("c_postalcode").value = '';
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
  });
  // personal info edit

  $("#personalinfoedit").on("click", function () {
    $(this).css("display", "none");
    $(".editpersonalinfo").css("display", "block");
    $("#personalinfo .myprofile_label").css("display", "none");
    $("#personalinfocancel").css("display", "block");
    $("#personalinfoupdate").css("display", "block");
    // $("#personalinfo").css("display", "none");
  });
  // personal info edit cancel

  $("#personalinfocancel").on("click", function () {
    debugger
    $(".editpersonalinfo").css("display", "none");
    $("#personalinfo .myprofile_label").css("display", "block");
    $("#personalinfocancel").css("display", "none");
    $("#personalinfoupdate").css("display", "none");
    $("#personalinfoedit").css("display", "block");
  });

  // get time from calender and append in table
  //$(".fc-day-number").on("click", function () {


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

$(document).ready(function(){
        $(".advance_setting").on("click", function(){
           
            $(".state_dist_wrapper").addClass("state_dis_cls");
        });
        $(".close_popup").on("click", function(){
           $(".state_dist_wrapper").removeClass("state_dis_cls"); 
        });
        $(".weekview").on("click", function () {
    $("#monthviewdiv").css("display", "none");
    $("#weekviewdiv").css("display", "block");
    $(".monthview").removeClass("text-primary");
    $(this).addClass("text-primary");
  });
  $(".monthview").on("click", function () {
    $("#monthviewdiv").css("display", "block");
    $("#weekviewdiv").css("display", "none");
    $(this).addClass("text-primary");
    $(".weekview").removeClass("text-primary");
    $(this).removeClass("text-dark");
  });
  
//   var toggler = document.getElementsByClassName("caret");
// var i;

// for (i = 0; i < toggler.length; i++) {
//   toggler[i].addEventListener("click", function() {
//     this.parentElement.querySelector(".nested").classList.toggle("active");
//     this.classList.toggle("caret-down");
//   });
// }
//     });
    $(document).on("click", ".relative", function () {
  $(".tableabsolute").css("display", "block");
  event.stopPropagation();
})
$('body').click(function () {
  $(".tableabsolute").css("display", "none");
})

$(document).ready(function () {
  // Add minus icon for collapse element which is open by default
  $(".collapse.show").each(function () {
    $(this).siblings(".card-header").find(".fa-angle-right").addClass("rotate");
  });

  // Toggle plus minus icon on show hide of collapse element
  $(".collapse").on('show.bs.collapse', function () {
    $(this).parent().find(".fa-angle-right").addClass("rotate");
  }).on('hide.bs.collapse', function () {
    $(this).parent().find(".fa-angle-right").removeClass("rotate");
  });
 
});
$(document).ready(function(){
    $('a[data-toggle="tab"]').on('show.bs.tab', function(e) {
        localStorage.setItem('activeTab', $(e.target).attr('href'));
    });
    var activeTab = localStorage.getItem('activeTab');
    if(activeTab){
        $('#rowTab a[href="' + activeTab + '"]').tab('show');
    }
});
