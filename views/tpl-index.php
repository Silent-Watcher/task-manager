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
        <span class="php-activeFold" style="display:none;" data-activeFolder="<?=$_GET["folderId"];?>"></span>
        <!-- get folders from the database -->
        <ul class = "folderList">
          <a href="?folderId=<?= null;?>"><li class="<?= (!isset($_GET["folderId"]) || $_GET["folderId"] == null) ? "active":null ;?>"><i class="fa fa-folder"></i>All</li></a>
          <?php foreach($folders as $key=>$value):?>
          <a id="folderWrapp"  href="?folderId=<?=$value->id?>">
            <li class="folder <?= (isset($_GET["folderId"]) and $value->id == $_GET["folderId"] ) ? "active": null ;?>">
              <i class="fa fa-folder"> <?=$value->folderName;?></i>
              <a onclick="return confirm('Are you sure to delete <?=$value->folderName;?> folder ? ')" class="trash"href="?deleteFolderId=<?=$value->id?>"><i class="fas fa-trash"></i></a>
            </li>
          </a>
          <?php endforeach;?>
        </ul>
      <!-- get folders from the database -->

        <!-- make new folders -->
        <div class="makeFolderWrap" >
          <input class="newfolderINP" type="text" placeholder="make new folder ...">
          <button class="addNewFolder"><i class="fas fa-plus"></i></button>
        </div>
        <!-- make new folders -->

      </div>
    </div>
    <div class="view">
      <div class="viewHeader">
        <input style='display : <?= ($_GET["folderId"] == null) ? "none" :"initial" ;?>' type="text" name="addTask" class="addTaskInp" placeholder="Add new task ...">
        <div class="functions">
        </div>
      </div>
      <div class="content">
        <div class="list">
          <div class="title">Tasks</div>
          <ul class="taskList">

          <!-- show tasks -->
          <?php if(!empty($tasks)): ?>
          <?php foreach($tasks as $key=>$value):?>
            <li class="<?= ($value->is_done) ? "checked" : null ;?>">
              <a class="taskStat" href="?taskId=<?=$value->id?>"> <i class="fa <?= ($value->is_done) ? "fa-check-square-o" : "fa-square-o" ;?>"></i></a>
              <span><?= $value->taskName;?></span>
              <div class="info">
                <span>Created at <?=$value->created_at?></span> 
                <a onclick="return confirm('Are you sure to delete <?=$value->taskName;?> task ? ')" class="trash"href="?deleteTaskId=<?=$value->id?>"><i class="fas fa-trash"></i></a>
              </div>
            </li>
          <?php endforeach; ?>
          <?php else :?>
            <li>no task here</li>
          <?php endif; ?>
        <!-- show tasks -->

          </ul>
        </div>
    </div>
  </div>
</div>
<!-- partial -->
</body>
<script src='https://code.jquery.com/jquery-3.6.0.min.js' integrity='sha256-/xUj+3OJU5yExlq6GSYGSHk7tPXikynS7ogEvDej/m4=' crossorigin='anonymous'></script>
<script defer src="<?= BASE_URL;?>/assets/js/script.js"></script>
</html>
