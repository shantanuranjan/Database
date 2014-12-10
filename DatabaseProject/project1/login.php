<?php
session_name("project");
session_start();
?>
<html>
    <head>
         <meta name="viewport" content="width=device-width, initial-scale=1.0">
         <link rel="stylesheet" type="text/css" href="./css/bootstrap.css" />
         <link rel="stylesheet" type="text/css" href="./css/project.css" />
         <script type="text/javascript" src="//code.jquery.com/jquery-1.11.0.min.js"></script>
         <script type="text/javascript" src="./js/login.js"></script>
    </head>
    <body>
        <div class="pagewrapper">
                        <div class="allshadow centered">
                            <div class="login active change_table">
                            <table class="table table-bordered">
                                <thead>
                                   <tr>
                                      <th colspan="2" class="text_label1"><h3>Login</h3></th>
                                   </tr>
                                   <tr><th colspan="2" ><span id="errortext"></span></th></tr>
                                </thead>
                                <tbody>
                                   <tr>
                                      <td>Username: </td>
                                      <td><div class="col-sm-12">
                                                <input type="text" class="form-control" id="username"  placeholder="username" >
                                          </div>
                                      </td>
                                   </tr>
                                   <tr>
                                      <td>Password: </td>
                                      <td>
                                        <div class="col-sm-12">
                                                <input type="password" class="form-control" id="password"  placeholder="********"  >
                                        </div>
                                      </td>
                                   </tr>
                                   <tr>
                                    <tr>
                                      <td colspan="2"> 
                                            <div class="col-sm-12">
                                                Login as : 
                                                <label class="checkbox-inline">
                                                    <input type="radio" name="radiooption" id="user" value="user" checked> User
                                                </label>
                                                <label class="checkbox-inline">
                                                    <input type="radio" name="radiooption" id="artist" value="artist"> Artist
                                                </label>
                                            </div>
                                      </td>
                                   </tr>
                                    <tr>
                                        <th colspan="2">
                                            <button type="button" class="btn btn-primary btn-grey" id="login" style="width: 100%">
                                                Login
                                            </button>
                                        </th>
                                    </tr>
                                    <tr>
                                        <th colspan="2">
                                            <span class="special_char">Not registered yet? </span><span id="switch_reg"><a href="javascript:void(0)">click here</a></span>
                                        </th>
                                    </tr>
                                </tbody>
                            </table>
                            </div>
                            
                            
                            <div class="register inactive change_table">
                            <table class="table table-bordered">
                                <thead>
                                   <tr>
                                      <th colspan="2" class="text_label1" ><h3>Register</h3></th>
                                   </tr>
                                   <tr>
                                                                  <th colspan="2"><span id="errortext1"></span></th>
                                                           </tr>
                                </thead>
                                <tbody>
                                   <tr>
                                      <td>Username: </td>
                                      <td><div class="col-sm-12">
                                                <input type="text" class="form-control" id="reg_username"  placeholder="username" >
                                          </div>
                                      </td>
                                   </tr>
                                                           <tr>
                                      <td>Email: </td>
                                      <td><div class="col-sm-12">
                                                <input type="text" class="form-control" id="reg_email"  placeholder="asb@asb.com" >
                                          </div>
                                      </td>
                                   </tr>
                                   <tr>
                                      <td>Password: </td>
                                      <td>
                                        <div class="col-sm-12">
                                                <input type="password" class="form-control" id="reg_password"  placeholder="********"  >
                                        </div>
                                      </td>
                                   </tr>
                                   <tr>
                                      <td>Repeat Password: </td>
                                      <td>
                                        <div class="col-sm-12">
                                                <input type="password" class="form-control" id="reg_repeat_password"  placeholder="********"  >
                                        </div>
                                      </td>
                                   </tr>
                                   <tr>
                                    <tr>
                                      <td colspan="2"> 
                                            <div class="col-sm-12">
                                                Register as : 
                                                <label class="checkbox-inline">
                                                    <input type="radio" name="reg_radiooption" id="user" value="user" checked> User
                                                </label>
                                                <label class="checkbox-inline">
                                                    <input type="radio" name="reg_radiooption" id="artist" value="artist"> Artist
                                                </label>
                                            </div>
                                      </td>
                                   </tr>
                                    <tr>
                                        <th colspan="2">
                                            <button type="button" class="btn btn-primary btn-grey" id="register" style="width: 100%">
                                                Register
                                            </button>
                                        </th>
                                    </tr>
                                    <tr>
                                        <th colspan="2">
                                            <span class="special_char">Already registered ? </span><span id="switch_login"><a href="javascript:void(0)">click here</a></span>
                                        </th>
                                    </tr>
                                </tbody>
                            </table>
                            </div>
                            <div class="clearfix"></div>
                    </div>
    </div>
    </body>
</html>