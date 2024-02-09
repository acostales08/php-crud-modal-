// Function to update modal content based on operation
function updateModalContent(action, id, firstname, lastname, course) {
  var modalTitle = $('#crudModal .modal-title');
  var modalBody = $('#crudModal .modal-body');
  var actionButton = $('#crudActionButton');

  switch (action) {
    case 'create':
      modalTitle.html("CREATE USER");
      modalBody.load('app/components/Form/createUser.php');
      actionButton.text('Create');
      actionButton.removeClass().addClass('btn btn-primary');
      actionButton.off('click').on('click', function() {
        // Retrieve input values
        let firstname = document.getElementById("txtfirstname").value;
        let lastname = document.getElementById("txtlastname").value;
        let course = document.getElementById("txtcourse").value;

        // Call handleCreateAction with input values
        handleCreateAction(firstname, lastname, course);
      });
      break;

    case 'update':
      modalTitle.html(firstname);
      modalBody.load('app/components/Form/createUser.php', function() {
        $('#txtfirstname').val(firstname);
        $('#txtlastname').val(lastname);
        $('#txtcourse').val(course);
      });
      actionButton.text('Update');
      actionButton.removeClass().addClass('btn btn-success');
      actionButton.off('click').on('click', function() {
        let updatedId = id;
        let updatedFirstname = document.getElementById("txtfirstname").value;
        let updatedLastname = document.getElementById("txtlastname").value;
        let updatedCourse = document.getElementById("txtcourse").value;
        handleUpdateAction(updatedId, updatedFirstname, updatedLastname, updatedCourse);
      });
      break;

    case 'delete':
      modalTitle.html("DELETE USER");
      modalBody.html('Are you sure you want to delete this user');
      actionButton.text('Delete');
      actionButton.removeClass().addClass('btn btn-danger');
      actionButton.off('click').on('click', function() {
        let updatedId = id;
        handleDeleteAction(updatedId); 
      });
      break;

    default:
      modalBody.html('Invalid operation.');
  }
}
