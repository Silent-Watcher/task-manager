<!DOCTYPE html>
<html lang="en" >
<head>
  <meta charset="UTF-8">
  <title><?= SITE_TITLE ; ?></title>
  <link rel='stylesheet' href='https://pro.fontawesome.com/releases/v5.10.0/css/all.css' integrity='sha384-AYmEC3Yw5cVb3ZcuHtOA93w35dYTsvhLPVnYs9eStHfGJvOvKxVfELGroGkvsg+p' crossorigin='anonymous'/>
  <link rel="stylesheet" href="<?= BASE_URL;?>/assets/css/style.css">
</head>
<body>
<!-- partial:index.partial.html -->
<div class="page">
  <div class="pageHeader">
    <div class="title">Dashboard</div>
    <div class="userPanel"><i class="fa fa-chevron-down"></i><span class="username">John Doe </span><img src="https://s3.amazonaws.com/uifaces/faces/twitter/kolage/73.jpg" width="40" height="40"/></div>
  </div>
  <div class="main">
    <div class="nav">
      <div class="searchbox">
        <div><i class="fa fa-search"></i>
          <input type="search" placeholder="Search"/>
        </div>
      </div>
      <div class="menu">
        <div class="title">Navigation</div>
        <ul class = "folderList">

        <!-- get folders from the database -->
        <a href="?FolderId=<?= isset($_GET["folderId"]) ?? null;?>"><li class="<?= isset($_GET["folderId"])? null :"active"?>"><i class="fa fa-folder"></i>All</li></a>
        <?php foreach($folders as $key=>$value):?>
        <a class=""  href="?folderId=<?=$value->id?>">
          <li class="folder <?= (isset($_GET["folderId"]) and $value->id == $_GET["folderId"] ) ? "active": null ;?>">
            <i class="fa fa-folder"> <?=$value->folderName;?></i>
            <a onclick="return confirm('Are you sure to delete <?=$value->folderName;?> folder ? ')" class="trash"href="?deleteFolderId=<?=$value->id?>"><i class="fas fa-trash"></i></a>
          </li>
        </a>
        <?php endforeach;?>
        <!-- get folders from the database -->
        </ul>
        <div class="makeFolderWrap" >
          <input class="newfolderINP" type="text" placeholder="make new folder ...">
          <button class="addNewFolder"><i class="fas fa-plus"></i></button>
        </div>
      </div>
    </div>
    <div class="view">
      <div class="viewHeader">
        <div class="title">Manage Tasks</div>
        <div class="functions">
          <div class="button active">Add New Task</div>
          <div class="button">Completed</div>
          <div class="button inverz"><i class="fa fa-trash-o"></i></div>
        </div>
      </div>
      <div class="content">
        <div class="list">
          <div class="title">Tasks</div>
          <ul class="taskList">




          <?php foreach($tasks as $key=>$value):?>
            <li class="<?= ($value->is_done) ? "checked" : null ;?>">
              <i class="fa <?= ($value->is_done) ? "fa-check-square-o" : "fa-square-o" ;?> taskStat"></i><span><?= $value->taskName;?></span>
              <div class="info">
                <span>Created at <?=$value->created_at?></span> 
                <a onclick="return confirm('Are you sure to delete <?=$value->taskName;?> task ? ')" class="trash"href="?deleteTaskId=<?=$value->id?>"><i class="fas fa-trash"></i></a>
              </div>
            </li>
          <?php endforeach; ?>
          <!-- show tasks -->
            <!-- <li class="checked">
              <i class="fa fa-check-square-o taskStat"></i><span>Update team page</span>
              <div class="info">
                <span>Created at 25/04/2014</span> 
                <a onclick="return confirm('Are you sure to delete <?=$value->folderName;?> folder ? ')" class="trash"href="?deleteFolderId=<?=$value->id?>"><i class="fas fa-trash"></i></a>
              </div>
            </li>
            <li>
              <i class="fa fa-square-o taskStat"></i><span>Design a new logo</span>
              <div class="info">
               <span>Created at 10/04/2014</span>
               <a onclick="return confirm('Are you sure to delete <?=$value->folderName;?> folder ? ')" class="trash"href="?deleteFolderId=<?=$value->id?>"><i class="fas fa-trash"></i></a>
              </div>
            </li> -->
          <!-- show tasks -->

          </ul>
        </div>
    </div>
  </div>
</div>
<!-- partial -->
<script src='https://code.jquery.com/jquery-3.6.0.min.js' integrity='sha256-/xUj+3OJU5yExlq6GSYGSHk7tPXikynS7ogEvDej/m4=' crossorigin='anonymous'></script>
<script  src="<?= BASE_URL;?>/assets/js/script.js"></script>
</body>
</html>
