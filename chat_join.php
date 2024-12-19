<!DOCTYPE html>
<html lang="en">
<head>
      <meta charset="UTF-8">
      <meta name="viewport" content="width=device-width, initial-scale=1.0">
      <meta http-equiv="refresh" content="">
      <title>Chat_join</title>
      <style>
            @import url('https://fonts.googleapis.com/css2?family=Poppins:wght@310&display=swap');
            * {
                  padding: 0;
                  margin: 0;
                  box-sizing: border-box;
            }
            body {
                  background-color: rgba(239 239 239);
                  height: 100vh;
                  font-family: 'poppins', sans-serif;
            }
            .wrapper {
                  height: 100%;
                  width: 100%;
                  display: flex;
                  justify-content: center;
                  align-items: center;
            }

            .login_box {
                  height: 80%;
                  width: 30%;
                  background-color: #fff;
                  border-radius: 30px;
            }
            .login_box .head {
                  height: 20%;
                  width: 100%;
                  /* background-color: red; */
                  display: flex;
                  justify-content: center;
                  align-items: center;
                  flex-direction: column;
                  padding-top: 60px;
            }

            .login_box .head p {
                  margin-bottom: 2px;
            }

            .login_box .head p:nth-child(1) {
                  font-size: 2.3rem;
                  font-weight: 600;
                  color: #111;
            }
            .login_box .head p:nth-child(2) {
                  font-size: 1.06vw;
                  font-weight: 200;
                  color: grey;
                  padding: 10px 50px 0px 80px;
                  /* background-color: green; */
            }
            .login_box .body {
                  height: 80%;
                  width: 100%;
                  /* background-color: green; */
                  display: flex;
                  justify-content: center;
                  align-items: center;
                  flex-direction: column;
            }

            .login_box .body form {
                  height: 100%;
                  width: 100%;
                  display: flex;
                  justify-content: center;
                  align-items: center;
                  flex-direction: column;
            }

            .login_box .body .input {
                  height: auto;
                  width: 70%;
            }

            .login_box .body .input input {
                  padding: 20px 15px;
                  width: 100%;
                  border-radius: 13px;
                  background-color: rgba(248 248 248);
                  border: none;
                  outline: none;
                  margin-bottom: 30px;
                  font-size: 1.02rem;
            }
            .login_box .body .input button {
                  padding: 20px 20px;
                  width: 100%;
                  background-color: green;
                  border: none;
                  outline: none;
                  border-radius: 33px;
                  color: #fff;
                  font-size: 1.02rem;
                  cursor: pointer;
            }
      </style>
</head>
<body>
      <?php
            if(isset($_POST['join'])) {
                  session_start();
                  require("db/members.php");
                  $objMem = new mem;
                  $objMem->setName($_POST['name']);
                  $objMem->setEmail($_POST['email']);
                  $objMem->setLoginStatus(1);
                  $objMem->setLastLogin(date('Y-m-d h:i:s'));
                  $memberData = $objMem->getMemByEmail();
                  if(is_array($memberData) && count($memberData) > 0)
                  {
                        $objMem->setId($memberData['id']);
                        if($objMem->updateLoginStatus())
                        {
                              echo "Member login";
                              $_SESSION['member'][$memberData['id']] = $memberData;
                              header("location: chatroom.php");
                        }
                        else
                        {
                              echo "Failed to login";
                        }
                  }
                  else
                  {
                        if($objMem->save())
                        {
                              $lastId = $objMem->dbConn->lastInsertedId();
                              $objMem->setId($lastId);
                              $_SESSION['member'][$memberData['id']] =(array) $objMem;
                              echo "Saved..";
                              header("location: chatroom.php");
                        }
                        else
                        {
                              echo "Not saved..";
                        }
                  }

            }
      ?>
      <div class="wrapper">
            <div class="login_box">
                  <div class="head">
                        <p>Join chat room</p>
                        <p>Login to join chat room, and enjoy true connection with loved ones - J promises.</p>
                  </div>
                  <div class="body">
                        <form action="" autocomplete="off" method="post">
                              <div class="input">
                                    <input type="text" name="name" placeholder="Name" autocomplete="off">
                              </div>
                              <div class="input">
                                    <input type="email" name="email" placeholder="Email" autocomplete="off">
                              </div>
                              <div class="input">
                                    <button type="submit" name="join">Join chat room</button>
                              </div>
                        </form>
                  </div>
                  <div class="foot"></div>
            </div>

      </div>
</body>
</html>