<?php
// header imported
require_once 'assets/php/header.php';

?>
<div class="container">
    <div class="row">
        <div class="col-lg-12">
            <?php if ($verified == 'Not Verified'): ?>
                <div class="alert alert-danger alert-dismissible text-center mt-2 m-0">
                    <button type="button" class="close" data-dismiss="alert" >&times; </button>
                    <strong>You haven't verified your email,we sent you a link to verify your email</strong>
                </div>
            <?php endif;?>
            <h4 class="text-center text-primary mt-2">Write your Notes here</h4>
        </div>
    </div>
    <div class="card border-primary">
        <h5 class="card-header bg-primary d-flex justify-content-between">
            <span class="text-light lead align-self-center">All Notes </span>
            <a href="#"  class="btn btn-light" data-toggle="modal" data-target="#addNewModal">
                <i class="fa fa-plus-circle fa-lg"></i> &nbsp; AddNew
        </a>
        </h5>
        <div class="card-body">
            <div class="table-responsive " id="showNote">
            <!-- <table class="table table-striped table-center">
                <thead>
                    <tr>
                        <th>#</th>
                        <th>Title</th>
                        <th>Note</th>
                        <th>Action</th>
                    </tr>
                </thead>
                <tbody>
                    <tr>
                        <td>1</td>
                        <td>Web design </td>
                        <td> Lorem ipsum dolor sit amet consectetur adipisicing elit. Provident, similique. Totam rerum aperiam temporibus quae? </td>
                        <td>
                            <a href="#" class="text-success infoBtn" title="viewDetail"><i class="fas fa-circle-info fa-lg"></i> </a> &nbsp;
                            <a href="#" class="text-primary editBtn" title="Edit" ><i class="fas fa-edit fa-lg" data-toggle="modal" data-target="#editNewModal"></i> </a> &nbsp;
                            <a href="#" class="text-danger deleteBtn" title="Delete"><i class="fas fa-trash-alt fa-lg"></i> </a> &nbsp;
                        </td>
                    </tr>
                </tbody>
            </table> -->
            </div>
        </div>
    </div>
</div>
<!-- Start Add new modal Notes -->
<div class="modal fade" id="addNewModal">
    <div class="modal-dialog modal-dialog-centered" >
        <div class="modal-content">
            <div class="modal-header bg-success">
                <h4 class="modal-title text-light">Add Notes </h4>
                <button type="button" class="close text-light" data-dismiss="modal">&times; </button>
            </div>
            <div class="modal-body">
                <form action="#" method="post" id="add_note_form" class="px-3">
                    <div class="form-group">
                        <input type="text" name="title" class="form-control form-control-lg" placeholder="Enter title" required>
                    </div>
                    <div class="form-group">
                        <textarea name="note" class="form-control form-control-lg" placeholder="add your notes here..." rows="6" required>
                        </textarea>
                    </div>
                    <div class="form-group">
                        <input type="submit" name="add_note" id="addNoteBtn" value="Add note" class="btn btn-success btn-block btn-lg">
                    </div>

                </form>
            </div>
        </div>
    </div>
</div>
<!--  End Add new modal Notes -->

<!-- Start Edit modal Notes -->
<div class="modal fade" id="editNewModal">
    <input type="hidden" name="id" id="id">
    <div class="modal-dialog modal-dialog-centered" >
        <div class="modal-content">
            <div class="modal-header bg-info">
                <h4 class="modal-title text-light">Edit Notes </h4>
                <button type="button" class="close text-light" data-dismiss="modal">&times; </button>
            </div>
            <div class="modal-body">
                <form action="#" method="post" id="edit_note_form" class="px-3">
                    <div class="form-group">
                        <input type="text" name="title" id="title" class="form-control form-control-lg" placeholder="Enter title" required>
                    </div>
                    <div class="form-group">
                        <textarea name="note" id="note" class="form-control form-control-lg" placeholder="add your notes here..." rows="6" required>
                        </textarea>
                    </div>
                    <div class="form-group">
                        <input type="submit" name="edit_note" id="editNoteBtn" value="Update note" class="btn btn-info btn-block btn-lg">
                    </div>

                </form>
            </div>
        </div>
    </div>
</div>
<!-- End Edit modal Notes -->

    <?=basename($_SERVER['PHP_SELF']);?>


    <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.6.0/jquery.min.js" integrity="sha512-894YE6QWD5I59HgZOGReFYm4dnWc1Qt5NtvYSaNcOP+u1T9qYdvdihz0PPSiiqn/+/3e7Jo4EaG7TubfWGUrMQ==" crossorigin="anonymous" referrerpolicy="no-referrer"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/twitter-bootstrap/4.6.1/js/bootstrap.bundle.min.js" integrity="sha512-mULnawDVcCnsk9a4aG1QLZZ6rcce/jSzEGqUkeOLy0b6q0+T6syHrxlsAGH7ZVoqC93Pd0lBqd6WguPWih7VHA==" crossorigin="anonymous" referrerpolicy="no-referrer"></script>
<!-- font awesome -->
<script src="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0-beta3/js/all.min.js" integrity="sha512-fzff82+8pzHnwA1mQ0dzz9/E0B+ZRizq08yZfya66INZBz86qKTCt9MLU0NCNIgaMJCgeyhujhasnFUsYMsi0Q==" crossorigin="anonymous" referrerpolicy="no-referrer"></script>
<script type="text/javascript" src="https://cdn.datatables.net/v/dt/dt-1.11.4/datatables.min.js"></script>
<script src="//cdn.jsdelivr.net/npm/sweetalert2@11"></script>


<script>
$(document).ready(function(){

    // Ajax for adding notes
    $('#addNoteBtn').click(function(e){
                if($('#add_note_form')[0].checkValidity()){
                e.preventDefault();
                $('#addNoteBtn').val('please wait...');
                $.ajax({
                url: 'assets/php/process.php',
                method:'Post',
                data:$('#add_note_form').serialize() +'&action=add_note',
                success: function(response){
                    // console.log(response);
                    Swal.fire({
                        title:"Note added successfully",
                        type:'success',
                    })

                    //$('#addNoteBtn').val('Add new note');
                    $('#add_note_form')[0].reset();
                    $('#addNewModal').modal('hide');
                    displayAllNotes();
                }
                })
            }
        })


    // Ajax for adding notes
    $('#addNoteBtn').click(function(e){
                if($('#add_note_form')[0].checkValidity()){
                e.preventDefault();
                $('#addNoteBtn').val('please wait...');
                $.ajax({
                url: 'assets/php/process.php',
                method:'Post',
                data:$('#add_note_form').serialize() +'&action=add_note',
                success: function(response){
                    // console.log(response);
                    Swal.fire({
                        title:"Note added successfully",
                        type:'success',
                    })

                    //$('#addNoteBtn').val('Add new note');
                    $('#add_note_form')[0].reset();
                    $('#addNewModal').modal('hide');
                    displayAllNotes();
                }
                })
            }
        })

        // end of add note ajax

$("body").on('click','.editBtn',function(e){
    e.preventDefault();
    edit_id = $(this).attr('id');
    // console.log($edit_Id);
    $.ajax({
        url: 'assets/php/process.php',
        method:'Post',
        data:{edit_id:edit_id},
        success: function(response){
            data = JSON.parse(response);
            $("#id").val(data.id);
            $("#title").val(data.title);
            $("#note").val(data.note);
            // console.log(response);
        }
    })
})

//update note Ajax
$("#editNoteBtn").click(function(e){

if($('#edit_note_form')[0].checkValidity()){

    e.preventDefault();

//    $('#editNoteBtn').val("please wait...");
    $.ajax({
    url: 'assets/php/process.php',
    method:'post',
    data:$('#edit_note_form').serialize()+'&action=update_note',
    success: function(response){
        // console.log(response);
        Swal.fire({
                    title:"Note updated successfully",
                    type:'success',
                })
        // $('#editNoteBtn').val("Update note");
        $("#edit_note_form")[0].reset();
        $("#editNewModal").modal('hide');
        displayAllNotes();
    }
})

}
})

 //Delete note ajax request

 $('body').on('click','.deleteBtn',function(e){
            e.preventDefault();
            del_id = $(this).attr('id');

                Swal.fire({
                    title: 'Are you sure?',
                    text: "You won't be able to revert this!",
                    type: 'warning',
                    showCancelButton: true,
                    confirmButtonColor: '#3085d6',
                    cancelButtonColor: '#d33',
                    confirmButtonText: 'Yes, delete it!'
                    }).then((result) => {
                    if (result.isConfirmed) {
                        $.ajax({
                            url: 'assets/php/process.php',
                            method:'post',
                            body:{del_id:del_id},
                            success: function(response){
                                Swal.fire(
                                    'Deleted!',
                                    'Note deleted successfully.',
                                    'success'
                        )
                        displayAllNotes();
                    }
                })
            }
        })
 })


 //start of display all notes function

 displayAllNotes();
    function displayAllNotes(){
        $.ajax({
                url: 'assets/php/process.php',
                method:'post',
                data:{action:'display_notes'},
                success: function(response){
                    $("#showNote").html(response);
                    $('.table').DataTable({
                        order:[0,'desc']
                    });
                }
            })
    }

 })

</script>

</body>
</html>