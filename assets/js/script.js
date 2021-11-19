$.noConflict();
jQuery(document).ready(function ($) {
  var addFBtn = $(".addNewFolder");
  var input = $(".newfolderINP");
  // add folder
  addFBtn.click(function () {
    $(".fa-plus").addClass(" anim");
    $.ajax({
      type: "post",
      url: "process/ajax_handler.php",
      data: { action: "addFolder", folderName: input.val() },
      success: (response) => {
        if (response == 0) {
          Swal.fire({
            title: 'Error!',
            text: 'the folder name should have at least 3 letters!!',
            icon: 'error',
            confirmButtonText: 'Cool',
            timer:3000
          })
          // alert("the folder name should have at least 3 letters!!");
        } else {
          
          $(".folderList").append(
            '<a href="?folderId=' +
              response +
              '"><li class="folder"><i class="fa fa-folder"> ' +
              input.val() +
              '</i><a onclick="return confirm(`Are you sure to delete ' +
              input.val() +
              ' folder ?`)" class="trash"href="?deleteFolderId=' +
              response +
              '"><i class="fas fa-trash"></i></a></li></a>'
          );
        }
        $(".fa-plus").removeClass(" anim");
      },
      error: (response) => {
        console.log(response);
      },
    });
  });
  // add folder

  // add new tasks
  $(".addTaskInp").keypress(function (e) {
    if (e.which === 13) {
      
      $.ajax({
        type: "post",
        url: "process/ajax_handler.php",
        data: {
          action: "addTask",
          taskName: $(this).val(),
          folderId: $(".php-activeFold").attr("data-activeFolder"),
        },
          success: function (response) {
            if (response == 0) {
              alert("your task has no name !");
              // Swal.fire({
              //   title: 'Error!',
              //   allowEnterKey:false,
              //   text: 'the folder name should have at least 3 letters!!',
              //   icon: 'error',
              //   confirmButtonText: 'Cool'
              // })
            }
      
            location.reload() 
        },
        error: (response) => {
          console.log(response);
        },
      });
    }
   
  });
  // add new tasks


});

