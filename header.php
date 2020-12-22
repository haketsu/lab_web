<?php
session_start();

echo'
<nav class="navbar navbar-expand-md navbar-dark bg-dark fixed-top">
  <a class="navbar-brand" href="index.php">School name</a>
  <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarsExampleDefault" aria-controls="navbarsExampleDefault" aria-expanded="false" aria-label="Toggle navigation">
    <span class="navbar-toggler-icon"></span>
  </button>

  <div class="collapse navbar-collapse" id="navbarsExampleDefault" >
    <ul class="navbar-nav mr-auto">
      <li class="nav-item active">
        <a class="nav-link" href="students.php">Журнал Успеваемости <span class="sr-only">(current)</span></a>

      </li>   
      <li class="nav-item active">
        <a class="nav-link" href="testsafetyrequest.php">Защита запросов<span class="sr-only">(current)</span></a>
      </li>
    </ul>
    ';



if(isset($_SESSION['id'])){
    echo '<div class="form-inline mt-2 mt-md-0">
        <input class="form-inline mt-2 mt-md-0 form-control mr-sm-2"  name="search"   type="text" placeholder="Search" aria-label="Search">
        <button class="btn btn-outline-success my-2 my-sm-0" id="searchbutton" type="submit">Search</button>
      </div>
      <a class="nav-link" style="color:#ffffff">'.$_SESSION['id'].'<span class="sr-only">(current)</span></a>';
    echo '
    <form action="singout.php" class="form-inline my-2 my-lg-0">
      <button class="btn btn-secondary my-2 my-sm-0" type="submit">
      Sign Out
      </button>
    </form>';
    }
else
{
    echo '
    <form action="authorization.php" class="form-inline my-2 my-lg-0">
      <button class="btn btn-secondary my-2 my-sm-0" style="margin-left:10px; " type="submit">
      Sign in
      </button>
    </form>';
}
    echo '
  </div>
  </nav>'
  ?>
<script src="/laba/js/ajax/search.js"></script>