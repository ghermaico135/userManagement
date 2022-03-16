<?php

require_once 'session.class.php';

// Handling add notes ajax

if (isset($_POST['action']) && $_POST['action'] == 'add_note') {
    // print_r($_POST);
    $title = $cuser->test_input($_POST['title']);
    $note = $cuser->test_input($_POST['note']);

    $cuser->add_new_notes($cid, $title, $note);
}

//Handling Display notes

if (isset($_POST['action']) && $_POST['action'] == 'display_notes') {
    $output = "";
    $notes = $cuser->get_notes($cid);
    // print_r($notes);

    if ($notes) {
        $output .= '<table class="table table-striped table-center">
        <thead>
            <tr>
                <th>#</th>
                <th>Title</th>
                <th>Note</th>
                <th>Action</th>
            </tr>
        </thead>
        <tbody>
';
        foreach ($notes as $row) {
            $output .= '<tr>
            <td>' . $row['id'] . '</td>
            <td>' . $row['title'] . ' </td>
            <td> ' . substr($row['note'], 0, 75) . '... </td>
            <td>
                <a href="#" class="text-success infoBtn" id="' . $row['id'] . '"  title="viewDetail"><i class="fas fa-circle-info fa-lg"></i> </a> &nbsp;
                <a href="#" class="text-primary editBtn" id="' . $row['id'] . '"  title="Edit" ><i class="fas fa-edit fa-lg" data-toggle="modal" data-target="#editNewModal"></i> </a> &nbsp;
                <a href="#" class="text-danger deleteBtn"  id="' . $row['id'] . '"  title="Delete"><i class="fas fa-trash-alt fa-lg"></i> </a> &nbsp;
            </td>
        </tr>
            ';
        }

        $output .= `</tbody></table>`;
        echo $output;
    } else {
        echo '<h3 class="text-center text-secondary">: You have not written any text ,Write you first note first! </h3>';
    }

}

//Handling edit ajax

if (isset($_POST['edit_id'])) {
    $id = $_POST['edit_id'];
    // print_r($_POST);

    $rows = $cuser->edit_note($id);
    echo json_encode($rows);
}

//handling update ajax request

if (isset($_POST['action']) && $_POST['action'] == 'update_note') {
    print_r($_POST);
    $id = $cuser->test_input($_POST['id']);
    $title = $cuser->test_input($_POST['title']);
    $note = $cuser->test_input($_POST['note']);

    $cuser->update_note($id, $title, $note);

}

// Delete note

if (isset($_POST['del_id'])) {
    $id = $_POST['del_id'];

    $cuser->delete_note($id);
}

// Handling info ajax requested

if (isset($_POST['info_id'])) {
    $id = $_POST['info_id'];
    $row = $cuser->edit_note($id);
    echo json_encode($row);
}
