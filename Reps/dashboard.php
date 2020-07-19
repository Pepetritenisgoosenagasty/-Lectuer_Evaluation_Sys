<?php
$pageTitle = 'Form';
include __DIR__ . './inc/header.php';

    $sql = 'SELECT * FROM venues';
    $stmt = $db->prepare($sql);
    $stmt->execute();
    $venues = $stmt->fetchAll();  

    $sql = 'SELECT * FROM lectuerers';
    $stmt = $db->prepare($sql);
    $stmt->execute();
    $lecs = $stmt->fetchAll(); 

    $sql = 'SELECT * FROM courses';
    $stmt = $db->prepare($sql);
    $stmt->execute();
    $courses = $stmt->fetchAll(); 

?>
<!-- Page content -->
<div class="page-content">
    <!-- Main content -->
    <div class="content-wrapper">
        <!-- Page header -->
        <div class="page-header page-header-light">
            <div class="page-header-content header-elements-md-inline">
                <div class="page-title d-flex">
                    <h4><i class="icon-arrow-left52 mr-5"></i> <span class="font-weight-semibold">ACCRA TECHNICAL UNIVERSITY</span> - QUALITY ASSURANCE LECTURES EVALUATION FORM</h4>
                    <h4 class="ml-5 text-uppercase"><?php echo  date("Y", strtotime("-1 year")) . "/" . date("Y")  ;  ?> Academic Year Second Semester</h4 class="">
                    <a href="#" class="header-elements-toggle text-default d-md-none"><i class="icon-more"></i></a>
                </div>
            </div>
        </div>
        <!-- /page header -->
        <!-- Content area -->
        <div class="content">
            <!-- Info alert -->
            <div class="alert alert-info bg-white alert-styled-left alert-arrow-left alert-dismissible">
                <button type="button" class="close" data-dismiss="alert"><span>&times;</span></button>
                <h6 class="alert-heading font-weight-semibold mb-1">Welcome <?= $_SESSION['user_email'] ?>, Carefully read the intsructions below. Thank You,</h6>
               Kindly fill the form below and provide accurate time per lecture <br> The fields with <code>*</code> means an input is required. <br> The forms cannot be edit once submited therefore class reps are entreated to provide valid and accurate input
            </div>
            <!-- /info alert -->
            <!-- Sidebar classes -->
            <div class="card">
                <div class="card-header header-elements-inline text-center">
                    <h5 class="card-title"></h5>
                    <div class="header-elements">
                        <div class="list-icons">
                            <a class="list-icons-item" data-action="collapse"></a>
                            <a class="list-icons-item" data-action="reload"></a>
                            <a class="list-icons-item" data-action="remove"></a>
                        </div>
                    </div>
                </div>
                <div class="card-body">
                    <div class="container">
                        <div class="row">
                           <div class="col-12">
                                <form id="results_form">
                                    <div class="row">
                                        <div class="col-4">
                                            <div class="form-group">
                                                <label for="session">ACADEMIC YEAR:</label>
                                                <input type="text" name="session" id="session" class="form-control" value="<?php echo  date("Y", strtotime("-1 year")) . "/" . date("Y")  ;  ?>" >
                                            </div>
                                        </div>
                                        <div class="col-4">
                                            <div class="form-group">
                                                <label for="semester">SEMESTER: <sup class="text-danger">*</sup></label>
                                                <select name="semester" id="semester" class="form-control">
                                                    <option value="">--  SELECT SEMESTER --</option>
                                                    <option value="FIRST SEMESTER">FIRST SEMESTER</option>
                                                    <option value="SECOND SEMESTER">SECOND SEMESTER</option>
                                                </select>
                                            </div>
                                        </div>
                                        <div class="col-4">
                                            <div class="form-group">
                                                <label for="faculty">FACULTY: <sup class="text-danger">*</sup></label>
                                                <select name="faculty" id="faculty" class="form-control">
                                                    <option value="">--  SELECT FACULTY --</option>
                                                    <option value="SCHOOL OF APPLIED SCIENCES">SCHOOL OF APPLIED SCIENCES</option>
                                                </select>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="row">
                                        <div class="col-6">
                                            <div class="form-group">
                                                <label for="department">DEPARTMENT: <sup class="text-danger">*</sup></label>
                                                <select name="department" id="department" class="form-control">
                                                    <option value="">--  SELECT DEPARTMENT --</option>
                                                    <option value="COMPUTER SCIENCE">COMPUTER SCIENCE</option>
                                                </select>
                                            </div>
                                        </div>
                                        <div class="col-6">
                                            <div class="form-group">
                                                <label for="course">COURSE TITLE: <sup class="text-danger">*</sup></label>
                                                <select name="course" id="course" class="form-control">
                                                    <option value="">--  SELECT COURSE --</option>
                                                     <?php foreach ($courses as $cos): ?>
                                                         <option value="<?= $cos->course_title ?>"><?= $cos->course_title ?></option>
                                                    <?php endforeach ?>
                                                </select>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="row">
                                        <div class="col-4">
                                            <div class="form-group">
                                                <label for="course_code">COURSE CODE: <sup class="text-danger">*</sup></label>
                                                 <select name="course_code" id="course_code" class="form-control">
                                                    <option value="">--  SELECT COURSE CODE --</option>
                                                     <?php foreach ($courses as $cos): ?>
                                                         <option value="<?= $cos->course_code ?>"><?= $cos->course_code ?></option>
                                                    <?php endforeach ?>
                                                   
                                                </select>
                                            </div>
                                        </div>
                                        <div class="col-4">
                                            <div class="form-group">
                                                <label for="venue"><strong>ASSIGNED VENUE: <sup class="text-danger">*</sup></strong></label>
                                                <select name="assigned_venue" id="venue" class="form-control">
                                                    <option value="">--  SELECT VENUE --</option>
                                                    <?php foreach ($venues as $venue): ?>
                                                         <option value="<?= $venue->code ?>"><?= $venue->name ?></option>
                                                    <?php endforeach ?>
                                                </select>
                                            </div>
                                        </div>
                                        <div class="col-4">
                                            <div class="form-group">
                                                <label for="semester">NEW VENUE: <sup class="text-danger">*</sup> <span class="text-danger">(If venue was changed for some reason)</span></label>
                                                <select name="new_venue" id="venue" class="form-control">
                                                    <option value="">--  SELECT NEW VENUE --</option>
                                                     <?php foreach ($venues as $venue): ?>
                                                         <option value="<?= $venue->code ?>"><?= $venue->name ?></option>
                                                    <?php endforeach ?>
                                                </select>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="row">
                                        <div class="col-4">
                                            <div class="form-group">
                                                <label for="programme">PROGRAMME: <sup class="text-danger">*</sup></label>
                                                <input type="text" class="form-control" placeholder="PROGRAMME" name="programme" value="Computer Science" id="programme">
                                            </div>
                                        </div>
                                        <div class="col-4">
                                            <div class="form-group">
                                                <label for="level">LEVEL: <sup class="text-danger">*</sup></label>
                                               <select name="level" id="level" class="form-control">
                                                    <option value="">--  SELECT LEVEL --</option>
                                                    <option value="100">100</option>
                                                    <option value="200">200</option>
                                                    <option value="300">300</option>
                                                </select>
                                            </div>
                                        </div>
                                         <div class="col-4">
                                            <div class="form-group">
                                                <label for="LEC">LECTURER: <sup class="text-danger">*</sup></label>
                                                <select name="lec" id="LEC" class="form-control">
                                                    <option value="">--  SELECT LECTURER --</option>
                                                     <?php foreach ($lecs as $lec): ?>
                                                         <option value="<?= $lec->title . ' ' . $lec->firstname . ' ' . $lec->lastname ?>"><?= $lec->title . ' ' . $lec->firstname . ' ' . $lec->lastname ?></option>
                                                    <?php endforeach ?>
                                                </select>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="row">
                                        <div class="col-4">
                                            <div class="form-group">
                                                <label for="date">DATE: <sup class="text-danger">*</sup></label>
                                                <input type="date" class="form-control" name="ldate" id="name">
                                            </div>
                                        </div>
                                        <div class="col-4">
                                            <div class="form-group">
                                                <label for="stime">START TIME: <sup class="text-danger">*</sup></label>
                                                <input type="time" class="form-control" name="stime">
                                            </div>
                                        </div>
                                         <div class="col-4">
                                            <div class="form-group">
                                                <label for="etime">END TIME: <sup class="text-danger">*</sup></label>
                                                <input type="time" class="form-control" name="etime" id="time">
                                            </div>
                                        </div>
                                    </div>
                                    <div class="row">
                                      <div class="col-12">
                                           <div class="form-group">
                                                <label for="">STATUS: <sup class="text-danger">*</sup></label>
                                                <select name="status" id="status" class="form-control">
                                                    <option value="">--  SELECT STATUS --</option>
                                                    <option value="Lectures Held">Lectures Held</option>
                                                    <option value="Lectures Postponed">Lectures Postponed</option>
                                                    <option value="Lectures was not Held">Lectures was not Held</option>
                                                </select>
                                            </div>
                                      </div>
                                    </div>
                                   <div class="row float-right">
                                       <div class="">
                                            <input type="submit" value="Submit" class="btn btn-info btn-block">
                                       </div>
                                   </div>
                            </form>
                           </div>
                        </div>
                        <div class="suc" style="display: none;">
                                <h4 class="text-success"><strong>Click to go back to form after your next class</strong></h4>
                                <a href="dashboard.php" class="btn btn-primary btn-lg">Back to Form</a>
                            </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <!-- /sidebar classes -->
</div>
<!-- /content area -->
<?php
include __DIR__.'./inc/footer.php'
?>

<script>
    $('#results_form').on('submit', function(e) {
        e.preventDefault();
        semester = $('#semester').val();
        faculty = $('#faculty').val();
        department = $('#department').val();
        course_title = $('#course_title').val();
        course_code = $('#course_code').val();
        programme = $('#programme').val();
        lecture = $('#lecture').val();
        date = $('#date').val();

        if (semester === '' || faculty === '' || department === '' || course_title === '' || lecture === '') {
            alert("All fields are required");
        } else {
            $.ajax({
                url: 'insert.php',
                method:'post',
                data: $('#results_form').serialize(),
                success: function (data) {
                    if (data == 'true') {             
                          alert("Form Submitted")
                                 $('#results_form').hide(1000);
                                 $('.suc').show();
                             
                    }
                }
            })
        }
    
      
    });

$("#programme").keydown((e)=>{
if(e.which > 47 && e.which < 58)
{
e.preventDefault();
}

if(e.which > 95 && e.which < 106)
{
e.preventDefault();
}
});

$("#session").keydown((e)=>{
if(e.which > 64 && e.which < 91)
{
e.preventDefault();
}
});
</script>