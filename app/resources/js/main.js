
const handleCreateAction = (firstname, lastname, course) => {
    let obj = {
      firstname: firstname,
      lastname: lastname,
      course: course,
      isbool: true
    };
    console.log(obj);
    clientRequest(obj).then((repo) => {
        const data = JSON.parse(repo)
        if (data.status === 'success') {
            location.reload()
        }
    })
  }

  const handleUpdateAction = (id, firstname, lastname, course) => {
      let object = {
        id: id,
        firstname: firstname,
        lastname: lastname,
        course: course,
        userUpdate: true
      }
      console.log(object)
      clientRequest(object).then((repo) => {
        const data = JSON.parse(repo)
        if (data.status === 'success') {
            location.reload()
        }
    })
  }

  const handleDeleteAction = (id) => {
    let object = {
      id: id,
      userDel: true
    }
    console.log(object)
      clientRequest(object).then((repo) => {
        const data = JSON.parse(repo)
        if (data.status === 'success') {
            location.reload()
        }
    })
  }

  const clientRequest = (object) => {
    const promise = new Promise((resolve) => {
        $.post("app/Helper/helper.php", object, (response) => {
            resolve(response)
        })
    })
    return promise;
  }

  $("document").ready(() => {
    fetchData().then((res) => {
        const data = JSON.parse(res);
        const message = data.message;
        if(data.status == 404){
          $("#tableData").append(`
              <tr>
                  <td colspan="5" class="text-center fs-6 fw-lighter">${message}</td>
              </tr>
          `);
        }else{
          let number = 1;
          data.forEach(({id, firstname, lastname, course}) => {
              $("#tableData").append(`
                  <tr>
                      <td>${number++}</td>
                      <td>${firstname}</td>
                      <td>${lastname}</td>
                      <td>${course}</td>
                      <td>
                        <button type="button" class="btn btn-success btn-sm" data-bs-toggle="modal" data-bs-target="#crudModal" onclick="updateModalContent('update', '${id}', '${firstname}', '${lastname}', '${course}')">
                            edit
                        </button>     
                        <button type="button" class="btn btn-danger btn-sm" data-bs-toggle="modal" data-bs-target="#crudModal" onclick="updateModalContent('delete', '${id}')">
                            delete
                        </button> 
                      </td>
                  </tr>
              `)                
          });
        }
    })
  })


  const fetchData = () => {
    const promise = new Promise((resolve) => {
        $.get("app/Helper/helper.php?fetchTrigger=true", (response) => {
            resolve(response);
        })
    })
    return promise;
  }
