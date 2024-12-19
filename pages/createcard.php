<!DOCTYPE html>
<html lang="en">
<head>
      <meta charset="UTF-8">
      <meta http-equiv="X-UA-Compatible" content="IE=edge">
      <meta name="viewport" content="width=device-width, initial-scale=1.0, user-scalable = no">
      <link rel="stylesheet" href="../assets/css/home.css">
      <link rel="stylesheet" href="../assets/css/loader.css">
      <script src = "../assets/js/jquery.min.js"></script>
      <title>Create|Card</title>
</head>
<body class="cc-body">
      <div class="create-card">
                              <div class="first-content">
                                    <ul>
                                          <li id="FPli" class="active" onclick="frontpage()">
                                                <div class="text">Frontpage</div>
                                          </li>
                                          <li id="IPli" onclick="insidepage()">
                                                <div class="text">Inisdepage</div>
                                          </li>
                                          <li id="BPli" onclick="backpage()">
                                                <div class="text">Backpage</div>
                                          </li>
                                    </ul>
                              </div>
                              <div class="second-content">
                                    <div class="card-view-wrapper active" id="frontpage">
                                          <div class="card-view-front">
                                                <div class="img" id="cardf-image">
                                                      <img src="../assets/img/card1.png" id="dImage" alt="">
                                                    <a href="#?choosedesign=open">
                                                      <div class="changecardD" id="chD">
                                                            <button type="button">Change Design</button>
                                                      </div>
                                                    </a>
                                                </div>
                                          </div>
                                          <div class="change-c-design-wrapper" id="chD-wrapper">
                                                <div class="change-cd">
                                                      <div class="header">
                                                         <a href="#?choosedesgin=close">
                                                            <div class="back" id="closechd">
                                                                  <div class="svg">
                                                                              <?xml version="1.0" encoding="utf-8"?><!-- Uploaded to: SVG Repo, www.svgrepo.com, Generator: SVG Repo Mixer Tools -->
                                                                              <svg viewBox="0 0 24 24" fill="none" xmlns="http://www.w3.org/2000/svg">
                                                                              <path fill-rule="evenodd" clip-rule="evenodd" d="M3.67937 12C3.67937 7.41291 7.39792 3.69435 11.985 3.69435C13.3309 3.69435 14.5997 4.01384 15.722 4.58034C16.5399 4.99318 17.2807 5.53762 17.9164 6.18608C18.2451 6.52131 18.7832 6.52666 19.1185 6.19803C19.4537 5.8694 19.459 5.33123 19.1304 4.996C18.3657 4.21594 17.4739 3.56033 16.488 3.06271C15.1336 2.37904 13.603 1.99435 11.985 1.99435C6.45904 1.99435 1.97937 6.47402 1.97937 12C1.97937 17.5259 6.45904 22.0056 11.985 22.0056C13.603 22.0056 15.1336 21.6209 16.488 20.9372C17.3327 20.5109 18.1083 19.9686 18.794 19.3314C19.138 19.0119 19.1577 18.4741 18.8382 18.1302C18.5186 17.7862 17.9808 17.7665 17.6369 18.086C17.0669 18.6156 16.4227 19.0659 15.722 19.4196C14.5997 19.9861 13.3309 20.3056 11.985 20.3056C7.39792 20.3056 3.67937 16.587 3.67937 12ZM17.6555 14.1456L18.9512 12.85H13.6788C13.2093 12.85 12.8288 12.4694 12.8288 12C12.8288 11.5305 13.2093 11.15 13.6788 11.15H18.9512L17.6555 9.8543C17.3236 9.52236 17.3236 8.98417 17.6555 8.65222C17.9875 8.32028 18.5257 8.32028 18.8576 8.65222L21.2806 11.0752C21.7913 11.5859 21.7913 12.414 21.2806 12.9247L18.8576 15.3477C18.5257 15.6796 17.9875 15.6796 17.6555 15.3477C17.3236 15.0157 17.3236 14.4775 17.6555 14.1456Z" fill="#1C1C1C"/>
                                                                              </svg>
                                                                  </div>
                                                                  <div class="text">Back</div>
                                                            </div>
                                                          </a>
                                                         
                                                            <div class="title">
                                                                  <p>Choose a Design</p>
                                                            </div>
                                                      </div>
                                                      <div class="body">
                                                            <ul>
                                                                  <li onchange="displayImg(this,'dImage')"><img src="../assets/img/EcardExT.png" style="width: 100%;height: 100%;"></li>
                                                                  <li></li>
                                                                  <li></li>
                                                                  <li></li>
                                                            </ul>
                                                      </div>
                                                      <div class="upload-mineD">
                                                                  <button><p>Upload a Design</p></button>
                                                      </div>
                                                </div>
                                          </div>
                                    </div>

                                    <div class="card-view-wrapper" id="insidepage">
                                          <div class="card-view-inside">
                                                <div class="writewish"><p id="pmessage"></p></div>
                                                      <div class="write-wish-btn">
                                                       <button id="Swrite">Write a wish</button>
                                                      </div>
                                                      
                                                
                                          </div>
                                    <div class="start-writing-modal" id="SW-wrapper-modal">
                                          <div class="start-writing" id="SW-wrapper"><textarea id="message">Happy Birthday Ugo, Wishing you a prosperous year ahead in JESUS NAME.</textarea></div>
                                    </div>
                                    </div>

                                    <div class="card-view-wrapper" id="backpage">
                                          <div class="card-view-back">
                                                <div class="image">
                                                      <!-- image-soure -->
                                                      <!-- <a href="https://www.freepik.com/free-vector/boy-with-red-nose-blue-background_24553255.htm?query=party%20popper%20animation#from_view=detail_alsolike">Image by brgfx</a> on Freepik -->
                                                      <img src="../assets/img/boy.jpg" alt="">
                                                </div>
                                          </div>
                                    </div>
                              </div>
                              <div class="third-content">
                              <!-- <input type="file" id="image"> -->
                              <?php 
                                    if(isset($_GET['closeccard'])) {
                                    if($_GET['closeccard'] == 'close') {
                                    ?>
                                          <script>window.location.href="home.php";</script>
                              <?php
                                    }
                                    }
                              ?>
                              <div class="content">
                                    <a href="?closeccard=close"><div class="cancel"><p>Discard</p></div></a>
                                    <div class="upload-card"><button type="button">Upload</button></div>
                              </div>
                              </div>
      </div>
   <?php include("../includes/footpage.php");?>
</body>
</html>