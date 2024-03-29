<script>
    var RunOnce = function() {
        RunOnce = function(){};
        $('#TeacherPassword').prop('type', 'password');
    }
</script>

<div id="department-modal" style="display: none;">
    <h2 id="department-modal-header" style="text-align:center;color:black;"></h2>
    <form class="ModalForm">
        <ul>
            <li class="FormSubmit">
                <button id="DepartmentSubmit">Add department</button>
            </li>
        </ul>
    </form>
</div>

<div class="Accounts Container">
    <h1 class="Important">- Edit an account -</h1>
    <?php
    if ($_SESSION['elevation'] != 3) {
        $category_header = 'Edit my account.';
    } else {
        $category_header = 'Complete control over account registration.';
    }
    ?>
    <div class="Important"><?php echo $category_header; ?></div>
    <div class="Content">
        <h2 style="text-align:center;">All fields except password fields are <u><i>required</i></u>.</h2>
        <form id="TeacherForm" class="StaticForm" enctype="multipart/form-data" autocomplete="off" onkeypress="return event.keyCode != 13;">
            <ul>
                <li class="FormField Split" style="<?php if ($_SESSION['elevation'] != 3) {echo 'display: none;';} ?>">
                    <label for="teacher">Teacher to edit</label>
                    <input type="text" id="TeacherIdentity" name="teacher" maxlength="255" placeholder="Type teachers code">
                </li>
                <?php if ($_SESSION['elevation'] == 3) { ?>
                <li class="FormField Blue Split">
                    <button id="TeacherLoad">Load teacher data</button>
                </li>
                <?php } ?>
                <li class="FormField Split FormFade">
                    <label for="teacher_code">Teacher code</label>
                    <input id="TeacherCode" type="text" name="teacher_code" maxlength="4" placeholder="Type teacher code">
                </li>
                <li class="FormField Split FormFade">
                    <label for="name">Teacher name</label>
                    <input id="TeacherName" type="text" name="name" maxlength="255" placeholder="Type new name">
                </li>
                <li class="FormField Split FormFade">
                    <label for="password">Teacher password</label>
                    <input id="TeacherPassword" onfocus="RunOnce();" type="text" name="password" maxlength="255" placeholder="Type new password">
                </li>
                <li class="FormField Split FormFade">
                    <label for="password_confirm">Confirm password</label>
                    <input id="TeacherPConfirm" onfocus="RunOnce();" type="text" name="password_confirm" maxlength="255" placeholder="Confirm password">
                </li>
                <li class="FormField Split FormFade">
                    <label for="email">Teacher email</label>
                    <input id="TeacherEmail" type="email" name="email" maxlength="255" placeholder="Type new email">
                </li>
                <li class="FormField Split FormFade">
                    <label for="department">Teacher department</label>
                    <input id="TeacherDepartment" type="text" name="department" maxlength="255" placeholder="Type new department">
                </li>
                <li class="FormField Full FormFade">
                    <label>Teacher subject</label>
                    <input id="TeacherSubject" type="text" name="subject_id" maxlength="255" placeholder="Type teachers subject">
                </li>
                <?php if ($_SESSION['elevation'] == 3) { ?>
                <li class="FormField Full FormFade">
                    <label for="elevation">Teacher elevation</label>
                    <div class="radio">
                        <input id="teacher" class="TeacherElevation" name="elevation" type="radio" value=0>
                        <label for="teacher" class="radio-label">Teacher</label>
                    </div>
                    <div class="radio">
                        <input id="tic" class="TeacherElevation" name="elevation" type="radio" value=1>
                        <label for="tic" class="radio-label">Teacher in charge</label>
                    </div>
                    <div class="radio">
                        <input id="hol" class="TeacherElevation" name="elevation" type="radio" value=2>
                        <label for="hol" class="radio-label">Head of learning</label>
                    </div>
                    <div class="radio">
                        <input id="sysadmin" class="TeacherElevation" name="elevation" type="radio" value=3>
                        <label for="sysadmin" class="radio-label">Systems admin</label>
                    </div>
                </li>
                <?php } ?>
                <li class="FormSubmit FormFade">
                    <button id="TeacherUpdate">Apply changes</button>
                </li>
            </ul>
        </form>
    </div>
</div>
<script src="./js/accounts.js"></script>
<?php if ($_SESSION['elevation'] == 3) { ?>
<script>GetTeacher('all');</script>
<?php } else { ?>
<script>GetTeacher(<?php echo $_SESSION['userid']; ?>);</script>
<?php } ?>