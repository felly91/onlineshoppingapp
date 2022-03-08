<!DOCTYPE HTML>
<html>
<head>
<link rel="stylesheet" type="text/css" href="style.css" />

  <title>Register Form</title>
</head>
<body>
<div class="form-wrapper">
 <form action="INSUSR.php" method="POST">
  <table>
   <tr>
   <td>User id :</td>
    <td><input type="text" name="user_id" required></td>
    </tr>
    <tr>
    <td>Name :</td>
    <td><input type="text" name="username" required></td>
   </tr>
   <tr>
    <td>Password :</td>
    <td><input type="password" name="password" required></td>
   </tr>
   <tr>
    <td>Gender :</td>
    <td>
     <input type="radio" name="gender" value="m" required>Male
     <input type="radio" name="gender" value="f" required>Female
    </td>
   </tr>
   <tr>
    <td>Email :</td>
    <td><input type="email" name="email" required></td>
   </tr> 
   <tr>
    <td>Phone no :</td>
    <td>
     <select name="phoneCode" required>
      <option selected hidden value="">Select Code</option>
      <option value="254">+254</option>
      <option value="255">+255</option>
      <option value="256">+256</option>
      <option value="257">+257</option>
      <option value="258">+258</option>
      <option value="259">+259</option>
     </select>
     <input type="phone" name="phone" required>
    </td>
   </tr>
   <tr>
   <center><td><input type="submit" value="Submit"></td></center>
   </tr>
  </table>
 </form>
 </div>
</body>
</html>