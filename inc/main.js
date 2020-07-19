$(document).ready(function(){
    $(document).on('submit', '#course_form' ,function(e) {
       e.preventDefault();

       var formData = new FormData(document.getElementById("course_form")),
         course_title = $("#course_title").val(),
         course_code = $("#course_code").val(),
         faculty = $("#course_faculty").val(),
         department = $("#department").val(),
         session = $("#session").val(),
         level = $("#level").val(),
         lectturer = $("#lecturer").val(),
         venue = $("#venue").val(),
         credit_unit = $("#credit_unit").val(),
         truth = true;

          if (course_title == "") {
            alert("Course Title Required");
            truth = false;
            return;
        }

        if (course_code == "") {
            alert("Course Code Required");
            truth = false;
            return;
        }

        if (venue == "") {
            alert("Venue Required");
            truth = false;
            return;
        }

        if (credit_unit == "") {
            alert("Add Credit Unit");
            truth = false;
            return;
        }

        if (truth) {
            $.ajax({
            url: 'core.php',
            type: 'post',
            data: formData,
            cache: false,
            contentType: false,
            processData: false,
            success: function(data) {
                 console.log(data)
            if (data === 'true') {
               alert("Course Added Successfully");
               $('#course_form').trigger('reset');
               window.location.href = "courses.php";
           } else {
               alert("Something went wrong");
               console.log("No")
           }
         }
        });
}

        

    });

    $(document).on('click', '.edit_course', function(e) {
      var course_id = $(this).attr('id');
      
      $.ajax({
        url:"fetch.php",
        method:"POST",
        data:{course_id: course_id},
        dataType:"json",
        success:function(data) {
          $('#course_title').val(data.course_title);
          $('#course_code').val(data.course_code);
          $('#lecturer').val(data.lecturer);
          $('#faculty').val(data.faculty);
          $('#department').val(data.department);
          $('#level').val(data.level);
          $('#session').val(data.session);
          $('#venue').val(data.venue);
          $('#unit').val(data.unit);
          $('#course_id').val(data.id);
          $('#modal_form_vertical').modal('show');

        }
      });
    });

    $(document).on('submit', '#edit_form', function(e) {
        e.preventDefault();
        var course_id = $(this).attr('id');
        $.ajax({
            url:"updating_course.php",
            method: "POST",
            data: $('#edit_form').serialize(),
            success: function(data) {
                console.log(data);
                $('#modal_form_vertical').modal('hide');
                sessionStorage.reloadAfterPageLoad = true;
                 setTimeout(function() {
                   window.location.reload();
                 }, 5000);
                  if (sessionStorage.reloadAfterPageLoad) {
                        $('#alert').html('<button type="button" class="close" data-dismiss="alert"><span>&times;</span></button><span class="font-weight-bold">Note! Course successfully updated.</span>').show().delay(5000).fadeOut();
                       }   
            }
        });
    });

    $(document).on('click', '.delete_course', function(e) {
       var courseId = $(this).attr('id');

       $.ajax({
        url: 'delete.php',
        method:'post',
        data: {courseId:courseId},
        beforeSend: function() {
          confirm("Are you Sure ?");
        },
        success: function(data) {
          console.log(data);
           $('#tr_'+courseId).hide(500);
           $('#alert').html('<button type="button" class="close" data-dismiss="alert"><span>&times;</span></button><span class="font-weight-bold">Note! Course successfully deleted.</span>').show().delay(5000).fadeOut();
           setTimeout(function () {
              window.location.reload();
            },5000); 
        }
       });
    });

    $(document).on('submit', '#venue_form', function(e) {
      e.preventDefault();
        venue_name = $('#venue_name').val();
        venue_code = $('#venue_code').val();
        venue_location = $('#venue_location').val();
        truth = true;

        if (venue_code == '' ) {
          alert('Venue Name Required');
          truth = false;
        }

        if (venue_code == '') {
           alert('Venue Code Required');
          truth = false;
        }

        if (truth) {
          $.ajax({
            url:"add_venues.php",
            method:"Post",
            data: $('#venue_form').serialize(),
            success: function(data) {
              if (data == 'true') {
               $('#venue_form').trigger('reset');
               window.location.href = "venues.php";
              }
              alert("Venu Added Successfully");
            }
          });
        }
    });

     $(document).on('click', '.edit_venue', function(e) {
      var venue_id = $(this).attr('id');
      
      $.ajax({
        url:"fetch.php",
        method:"POST",
        data:{venue_id: venue_id},
        dataType:"json",
        success:function(data) {
          $('#venue_name').val(data.name);
          $('#venue_code').val(data.code);
          $('#venue_location').val(data.location);
          $('#venue_id').val(data.id);
          $('#modal_form_vertical').modal('show');

        }
      });
    });

    $(document).on('submit', '#edit_venue', function(e) {
        e.preventDefault();
        var venue_id = $(this).attr('id');
        $.ajax({
            url:"updating_course.php",
            method: "POST",
            data: $('#edit_venue').serialize(),
            success: function(data) {
                // console.log(data);
                $('#modal_form_vertical').modal('hide');
                sessionStorage.reloadAfterPageLoad = true;
                 setTimeout(function() {
                   window.location.reload();
                 }, 5000);
                  if (sessionStorage.reloadAfterPageLoad) {
                        $('#alert').html('<button type="button" class="close" data-dismiss="alert"><span>&times;</span></button><span class="font-weight-bold">Note! Venue successfully updated.</span>').show().delay(5000).fadeOut();
                       }   
            }
        });
    });

    $(document).on('click', '.delete_venue', function(e) {
       var venueId = $(this).attr('id');

       $.ajax({
        url: 'delete.php',
        method:'post',
        data: {venueId:venueId},
        beforeSend: function() {
          confirm("Are you Sure ?");
        },
        success: function(data) {
          console.log(data);
           $('#vu_'+venueId).hide(500);
           $('#alert').html('<button type="button" class="close" data-dismiss="alert"><span>&times;</span></button><span class="font-weight-bold">Note! Venue successfully deleted.</span>').show().delay(5000).fadeOut(); 
            setTimeout(function () {
              window.location.reload();
            },5000);
           }
       });
    });

    $(document).on('submit','#class_reps_form', function(e) {
      e.preventDefault();
      firstname = $('#firstname').val();
      lastname = $('#lastname').val();
      index = $('#index').val();
      email = $('#email').val();
      phoneNo = $('#phoneNo').val();
      gender = $('input[name="gender"]:checked').val();
      faculty = $('#faculty').val();
      department = $('#department').val();
      course = $('#course').val();
      session = $('#session').val();
      level = $('#level').val();
      password = $('#password').val();
      cpassword = $('#cpassword').val();
      truth = true;

      if (firstname == '') {
        alert("First name is required");
        truth = false;
      }

      if (lastname == '') {
        alert("Last name is required");
        truth = false;
      }

      if (email == '') {
        alert("Email is required");
        truth = false;
      }

      if (phoneNo == '') {
        alert("Phone is required");
        truth = false;
      }

      if (password == '') {
        alert("password is required");
        truth = false;
      }

      if (cpassword == '') {
        alert("Confirm password is required");
        truth = false;
      }

      if (password !== cpassword) {
        $('.pass_error').html('<strong>Password does not match</strong>');
      }

      if (truth) {
        $.ajax({
          url: 'addClassReps.php',
          method: 'Post',
          data: $('#class_reps_form').serialize(),
          success: function (data) {
           if (data == 'true') {
               $('#class_reps_form').trigger('reset');
               window.location.href = "class_reps.php";
               alert("Class rep Added Successfully");
              }
              
          }
        });
      }

      // alert(cpassword)
    });

       $(document).on('click', '.edit_reps', function(e) {
        var reps_id = $(this).attr('id');
    
      $.ajax({
        url:"fetch.php",
        method:"POST",
        data:{reps_id: reps_id},
        dataType:"json",
        success:function(data) {
          $('#first_name').val(data.firstname);
          $('#last_name').val(data.lastname);
          $('#email').val(data.email);
          $('#index').val(data.indexNo);
          $('#phoneno').val(data.phoneno);
          $('#faculty').val(data.faculty);
          $('#department').val(data.department);
          $('#level').val(data.level);
          $('#session').val(data.session);
          $('#course').val(data.course);
          $('#reps_id').val(data.id);
          $('#modal_form_vertical').modal('show');
        }
      });
    });

      $(document).on('submit', '#edit_Classreps', function(e) {
        e.preventDefault();
        var reps_id = $(this).attr('id');
        $.ajax({
            url:"updating_course.php",
            method: "POST",
            data: $('#edit_Classreps').serialize(),
            success: function(data) {
                // console.log(data);
                $('#modal_form_vertical').modal('hide');
                setTimeout(function() {
                  alert("updated Successfully");
                window.location.reload(); 
                }, 2000);
            }
        });
    });

     $(document).on('click', '.delete_reps', function(e) {
     var repsId = $(this).attr('id');

     $.ajax({
      url: 'delete.php',
      method:'post',
      data: {repsId:repsId},
      beforeSend: function() {
        confirm("Are you Sure?");
      },
      success: function(data) {
        console.log(data);
         $('#rep_'+repsId).hide(500); 
         window.location.reload();
            alert("Class Rep. Successfully Deleted");
         }
     });
  });

  $(document).on('submit','#add_lec', function(e) {
      e.preventDefault();
      firstname = $('#firstname').val();
      lasttname = $('#lastname').val();
      email = $('#email').val();
      phoneNo = $('#phoneNo').val();
      gender = $('input[name="gender"]:checked').val();
      status = $('#status').val();
      department = $('#department').val();
      truth = true;

      if (firstname == '') {
        alert("First name is required");
        truth = false;
      }

      if (lastname == '') {
        alert("Last name is required");
        truth = false;
      }

      if (email == '') {
        alert("Email is required");
        truth = false;
      }

      if (phoneNo == '') {
        alert("Phone is required");
        truth = false;
      }

      if (truth) {
        $.ajax({
          url: 'add_lec.php',
          method: 'Post',
          data: $('#add_lec').serialize(),
          success: function (data) {
            if (data == 'true') {
               $('#add_lec').trigger('reset');
              alert("Lecturer Added Successfully");
               window.location.href = 'lectuers.php';
            }
           }
        });
      }
    });   
   

      $(document).on('click', '.edit_lec', function(e) {
      var lec_id = $(this).attr('id');
    
      $.ajax({
        url:"fetch.php",
        method:"POST",
        data:{lec_id: lec_id},
        dataType:"json",
        success:function(data) {
          $('#title').val(data.title);
          $('#first_name').val(data.firstname);
          $('#last_name').val(data.lastname);
          $('#email').val(data.email);
          $('#gender').val(data.gender);
          $('#phoneno').val(data.phone_no);
          $('#department').val(data.department);
          $('#status').val(data.status);
          $('#lec_id').val(data.id);
          $('#modal_form_vertical').modal('show');
        }
      });
    });

      $(document).on('submit', '#edit_lec', function(e) {
        e.preventDefault();
        var lec_id = $(this).attr('id');
        $.ajax({
            url:"updating_course.php",
            method: "POST",
            data: $('#edit_lec').serialize(),
            success: function(data) {
                // console.log(data);
                $('#modal_form_vertical').modal('hide');
                setTimeout(function() {
                  alert("updated Successfully");
                window.location.reload(); 
                }, 2000);
            }
        });
    });

    $(document).on('click', '.delete_lec', function(e) {
     var lecId = $(this).attr('id');

     $.ajax({
      url: 'delete.php',
      method:'post',
      data: {lecId:lecId},
      beforeSend: function() {
        confirm("Are you Sure?");
      },
      success: function(data) {
        console.log(data);
         $('#rep_'+lecId).hide(500); 
         window.location.reload();
            alert("Lecturer Successfully Deleted");
         }
     });
  });

    $(document).on('submit', '#edit_profile', function(e) {
        e.preventDefault();
        password = $('#password').val();
        cpassword = $('#cpassword').val();
        truth = true;

        if (password !== cpassword) {
          alert('password does not match');
          truth = false;
        }
        if (truth) {
          var pro_id = $('#pro_id').val();
          $.ajax({
              url:"updating_course.php",
              method: "POST",
              data: $('#edit_profile').serialize(),
              success: function(data) {
                  setTimeout(function() {
                    alert("updated Successfully");
                  window.location.reload(); 
                  }, 2000);
              }
          });
        }
    });
});