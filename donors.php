<?php 
 require("header.php");
?>
<div class="content-wrapper">
    <div class="row banner">
        <div class="col-12 col-md-10 offset-md-1">
            <header>
                <h1>Plasma Donors</h1>
            </header>
        </div>
    </div>

    <div class="row">
        <div class="col-12 col-md-10 offset-md-1">

            <div class="donor filters mb-4">
                <h6 class="float-left mr-3 mt-2">Filters:</h6> 
                <div class="btn-group mx-2">
                    <button type="button" class="btn btn-secondary dropdown-toggle" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                        Blood Type
                    </button>
                    <div class="dropdown-menu">
                        <a class="dropdown-item" href="#">All</a>
                        <a class="dropdown-item" href="#">A+</a>
                        <a class="dropdown-item" href="#">A-</a>
                        <a class="dropdown-item" href="#">B+</a>
                        <a class="dropdown-item" href="#">B-</a>
                        <a class="dropdown-item" href="#">AB+</a>
                        <a class="dropdown-item" href="#">AB-</a>
                        <a class="dropdown-item" href="#">O+</a>
                        <a class="dropdown-item" href="#">O-</a>
                    </div>
                </div>
            </div>

            <div class="table-responsive">
                <table class="table table-striped">
                    <thead>
                        <tr>
                            <th scope="col">#</th>
                            <th scope="col">Name</th>
                            <th scope="col">Blood Group</th>
                            <th scope="col">Location</th>
                            <th scope="col">Contact</th>
                        </tr>
                    </thead>
                    <tbody>
                        <tr>
                            <th scope="row">1</th>
                            <td>Mark</td>
                            <td>A-</td>
                            <td>@mdo</td>
                            <td>Otto</td>
                        </tr>
                        <tr>
                            <th scope="row">2</th>
                            <td>Jacob</td>
                            <td>B+</td>
                            <td>@fat</td>
                            <td>Otto</td>
                        </tr>
                        <tr>
                            <th scope="row">3</th>
                            <td>Larry</td>
                            <td>B+</td>
                            <td>@twitter</td>
                            <td>Otto</td>
                        </tr>
                        <tr>
                            <th scope="row">1</th>
                            <td>Mark</td>
                            <td>Otto</td>
                            <td>@mdo</td>
                            <td>Otto</td>
                        </tr>
                        <tr>
                            <th scope="row">2</th>
                            <td>Jacob</td>
                            <td>O-</td>
                            <td>Pune</td>
                            <td>Otto</td>
                        </tr>
                        <tr>
                            <th scope="row">3</th>
                            <td>Larry</td>
                            <td>O+</td>
                            <td>Mumbai</td>
                            <td>Otto</td>
                        </tr>
                        <tr>
                            <th scope="row">1</th>
                            <td>Mark</td>
                            <td>O+</td>
                            <td>Mumbai</td>
                            <td>Otto</td>
                        </tr>
                        <tr>
                            <th scope="row">2</th>
                            <td>Jacob</td>
                            <td>Thornton</td>
                            <td>Pune</td>
                            <td>Otto</td>
                        </tr>
                        <tr>
                            <th scope="row">3</th>
                            <td>Larry</td>
                            <td>the Bird</td>
                            <td>Pune</td>
                            <td>Otto</td>
                        </tr>
                    </tbody>
                </table>
            </div>
        </div>
    </div>

    <div class="row py-5 mt-5">
        <div class="col-12 col-md-10 offset-1">
            <hr>
            <h2>
                Disclaimer
            </h2>
            <p>
                The information mentioned above is only to help people in need of plasma find suitable donors. Our agenda is only to help them aggregate all information at one place as much as possible.
            </p>
            <p>
                Please use the intended contact inforamtion with care and caution and please don't misuse them in any form.
            </p>
            <p>
                If you are someone who has recovered from Covid, then please consider donating your blood at the nearest blood bank or help others by registering yourself as a donor and help others find you via covisource. <a href="/">Click here</a> to register yourself as a donor.
             </p>
        </div>
    </div>
</div>
<?php 
 require("footer.php");
?>