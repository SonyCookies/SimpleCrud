<?php
defined('PREVENT_DIRECT_ACCESS') or exit('No direct script access allowed');
?>
<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Users List</title>

  <link rel="stylesheet" href="output.css">
  <style>
    html {
      margin: 20px;
    }

    body {
      font-size: 15px;
      font-family: Tahoma, sans-serif;
      color: #888;
      box-shadow: rgba(0, 0, 0, 0.16) 0px 10px 36px 0px, rgba(0, 0, 0, 0.06) 0px 0px 0px 1px;
      background-color: #f4f4f4;
    }

    .header {
      font-size: 30px;
      background-color: #2980B9;
      color: #ffffff;
      padding: 15px;
      display: flex;
      justify-content: space-between;
      align-items: center;
    }

    .add-user-btn {
      padding: 10px 15px;
      background-color: #2ecc71;
      color: white;
      border: none;
      border-radius: 5px;
      cursor: pointer;
      font-size: 14px;
    }

    .add-user-btn a {
      text-decoration: none;
      color: white;
    }

    .main {
      color: #000000;
      background-color: #ffffff;
      padding: 30px;
    }

    .user-list {
      list-style: none;
      padding: 0;
      margin: 20px 0;
    }

    .user-list li {
      background-color: #eee;
      margin-bottom: 10px;
      padding: 10px;
      border-radius: 5px;
      display: flex;
      justify-content: space-between;
      align-items: center;
    }

    .user-info {
      flex-grow: 1;
    }

    .user-actions {
      display: flex;
    }

    .user-actions a {
      padding: 8px 12px;
      margin-left: 5px;
      border-radius: 3px;
      color: white;
      text-decoration: none;
      display: inline-block;
      transition: background-color 0.3s ease;
    }

    .edit-btn {
      background-color: #f39c12;
    }

    .edit-btn:hover {
      background-color: #e67e22;
    }

    .delete-btn {
      background-color: #e74c3c;
    }

    .delete-btn:hover {
      background-color: #c0392b;
    }

    .footer {
      font-family: 'Courier New', monospace;
      color: #000000;
      background-color: #ffffff;
      padding: 5px;
      text-align: center;
      border-top: solid 1px #2980B9;
    }

    /* Modal Styles */
    .modal {
      display: none;
      position: fixed;
      top: 0;
      left: 0;
      width: 100%;
      height: 100%;
      background-color: rgba(0, 0, 0, 0.5);
      justify-content: center;
      align-items: center;
    }

    .modal-content {
      background-color: white;
      padding: 20px;
      border-radius: 5px;
      text-align: center;
      width: 300px;
    }

    .modal-content h3 {
      margin-bottom: 20px;
    }

    .modal-buttons {
      display: flex;
      justify-content: space-between;
    }

    .modal-buttons button {
      padding: 10px 20px;
      border: none;
      border-radius: 5px;
      cursor: pointer;
      font-size: 14px;
    }

    .modal-buttons .cancel-btn {
      background-color: #95a5a6;
      color: white;
    }

    .modal-buttons .confirm-btn {
      background-color: #e74c3c;
      color: white;
    }

    .modal-buttons .confirm-btn:hover {
      background-color: #c0392b;
    }

    .modal-buttons .cancel-btn:hover {
      background-color: #7f8c8d;
    }
  </style>

  <link rel="stylesheet" type="text/css" href="https://cdn.datatables.net/1.11.5/css/jquery.dataTables.min.css">
  <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
  <script type="text/javascript" src="https://cdn.datatables.net/1.11.5/js/jquery.dataTables.min.js"></script>
</head>

<body>
  <div class="header">
    <h1>Users</h1>
    <button class="add-user-btn"><a href="/user/create">Add User</a></button>
  </div>

  <div class="main">
    <table id="userTable" class="display">
      <thead>
        <tr>
          <th>First Name</th>
          <th>Last Name</th>
          <th>Email</th>
          <th>Gender</th>
          <th>Address</th>
          <th>Action</th>
        </tr>
      </thead>
      <tbody>
        <?php if (!empty($users)) : ?>
          <?php foreach ($users as $user) : ?>
            <tr>
              <td><?php echo $user['sps_first_name']; ?></td>
              <td><?php echo $user['sps_last_name']; ?></td>
              <td><?php echo $user['sps_email']; ?></td>
              <td><?php echo $user['sps_gender']; ?></td>
              <td><?php echo $user['sps_address']; ?></td>
              <td class="user-actions">
                <a class="edit-btn" href="/user/edit/<?php echo $user['id'] ?>">Edit</a>
                <a class="delete-btn" href="#" onclick="openModal(<?php echo $user['id'] ?>)">Delete</a>
              </td>
            </tr>
          <?php endforeach; ?>
        <?php else : ?>
          <tr>
            <td colspan="7">No users found</td>
          </tr>
        <?php endif; ?>
      </tbody>
    </table>
  </div>

  <div class="footer">
    <p>&copy; 2024 User List</p>
  </div>

  <div class="modal" id="deleteModal">
    <div class="modal-content">
      <h3>Confirm Delete</h3>
      <p>Are you sure you want to delete this user?</p>
      <div class="modal-buttons">
        <button class="cancel-btn" onclick="closeModal()">Cancel</button>
        <button class="confirm-btn" id="confirmDeleteBtn">Delete</button>
      </div>
    </div>
  </div>

  <script>
    $(document).ready(function() {
      $('#userTable').DataTable();
    });

    let userIdToDelete = null;

    function openModal(userId) {
      userIdToDelete = userId;
      $('#deleteModal').css('display', 'flex');
    }

    function closeModal() {
      $('#deleteModal').css('display', 'none');
      userIdToDelete = null;
    }

    $('#confirmDeleteBtn').click(function() {
      if (userIdToDelete) {
        window.location.href = '/user/delete/' + userIdToDelete;
      }
    });
  </script>
</body>

</html>