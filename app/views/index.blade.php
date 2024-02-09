<?php include('app/components/modal/modal.php')?>
<div class="container">
    <div class="row p-4">
        <h3 class="text-center text-danger">sample php-crud operation</h3>
    </div>
    <div class="row">
        <div class="col-md-3 p-0">
        <button type="button" class="btn btn-primary" data-bs-toggle="modal" data-bs-target="#crudModal" onclick="updateModalContent('create')">
             Create User
        </button>          
        </div>
        <div class="card p-2 mt-2">
            <div class="card-body">
                <table class="table table-striped">
                    <thead>
                        <tr>
                        <th scope="col">#</th>
                        <th scope="col">Firstname</th>
                        <th scope="col">Lastname</th>
                        <th scope="col">course</th>
                        <th scope="col">action</th>
                        </tr>
                    </thead>
                    <tbody id="tableData">
                    </tbody>
                </table>
            </div>
        </div>
    </div>
</div>