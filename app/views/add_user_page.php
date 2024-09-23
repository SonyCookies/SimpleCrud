<?php
defined('PREVENT_DIRECT_ACCESS') or exit('No direct script access allowed');
?>

<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Add User</title>
  <style>
    html {
      margin: 20px;
    }

    body {
      font-size: 15px;
      font-family: Tahoma, sans-serif;
      color: #888;
      background-color: #f4f4f4;
    }

    .header {
      font-size: 30px;
      background-color: #2980B9;
      color: #ffffff;
      padding: 15px;
      text-align: center;
    }

    .main {
      color: #000000;
      background-color: #ffffff;
      padding: 30px;
      max-width: 600px;
      margin: 20px auto;
      box-shadow: 0 0 10px rgba(0, 0, 0, 0.1);
    }

    .form-group {
      margin-bottom: 15px;
    }

    label {
      display: block;
      margin-bottom: 5px;
      color: #333;
    }

    input,
    select,
    textarea {
      width: 100%;
      padding: 10px;
      margin: 5px 0 10px 0;
      display: inline-block;
      border: 1px solid #ccc;
      border-radius: 4px;
      box-sizing: border-box;
    }

    .submit-btn {
      background-color: #2ecc71;
      color: white;
      padding: 10px 15px;
      border: none;
      border-radius: 5px;
      cursor: pointer;
    }

    .submit-btn:hover {
      background-color: #27ae60;
    }

    .footer {
      font-family: 'Courier New', monospace;
      color: #000000;
      background-color: #ffffff;
      padding: 5px;
      text-align: center;
      border-top: solid 1px #2980B9;
    }
  </style>
</head>

<body>
  <div class="header">
    <h1>Add New User</h1>
  </div>

  <div class="main">
    <form id="addUserForm" action="/user/create" method="post">
      <div class="form-group">
        <label for="sps_last_name">Last Name</label>
        <input type="text" id="sps_last_name" name="sps_last_name" required>
      </div>

      <div class="form-group">
        <label for="sps_first_name">First Name</label>
        <input type="text" id="sps_first_name" name="sps_first_name" required>
      </div>

      <div class="form-group">
        <label for="sps_email">Email</label>
        <input type="email" id="sps_email" name="sps_email" required>
      </div>

      <div class="form-group">
        <label for="sps_gender">Gender</label>
        <select id="sps_gender" name="sps_gender" required>
          <option value="">Select Gender</option>
          <option value="Male">Male</option>
          <option value="Female">Female</option>
          <option value="Other">Other</option>
        </select>
      </div>
      <div class="form-group">
        <label for="sps_address">Address</label>
        <textarea id="sps_address" name="sps_address" rows="3" required></textarea>
      </div>

      <button type="submit" class="submit-btn">Add User</button>
      <a href="" class="submit-btn">Cancel</a>
    </form>
  </div>

  <div class="footer">
    <p>&copy; 2024 Add User</p>
  </div>
</body>

</html>