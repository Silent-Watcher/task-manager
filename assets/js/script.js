$(document).ready(function () {
  var addFBtn = $(".addNewFolder");
  var input = $(".newfolderINP");
  // add folder
  addFBtn.click(function () {
    $.ajax({
      type: "post",
      url: "process/ajax_handler.php",
      data: { action: "addFolder", folderName: input.val() },
      success: (response) => {
        $(".folderList").append(
          '<a href="?folderId=' +
            response +
            '"><li class="folder"><i class="fa fa-folder"> '+input.val()+'</i><a onclick="return confirm(`Are you sure to delete '+input.val()+' folder ?`)" class="trash"href="?deleteFolderId=' +
            response +
            '"><i class="fas fa-trash"></i></a></li></a>'
        );
      },
      error: (response) => {
        console.log(response);
      },
    });
  });
  // add folder

});
