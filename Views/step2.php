<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="./css/style.css">
    <title>QuoteManager - step1</title>
</head>

<body>
    <nav class="navbar navbar-dark bg-dark">
        <div class="container-fluid">
            <span class="navbar-text">
                STEP 2 ON 3
            </span>
            <label for="customRange2" class="form-label">Example range</label>
            <button type="button" class="btn btn-warning text-dark btn-sm">Dashboard</button>
        </div>
    </nav>

    <div class="progress">
        <div class="progress-bar progress-bar-striped progress-bar-animated bg-warning text-black" role="progressbar"
            aria-valuenow="33" aria-valuemin="0" aria-valuemax="100" style="width:67%">67%</div>
    </div>

    <div class="container-fluid">
        <form action="" method="post">
            <div class="container-fluid text-center">
                <div class="input-group mb-3">
                    <label class="input-group-text" for="inputGroupSelectCT">Containers</label>
                    <select class="form-select" id="inputGroupSelectCT">
                        <option selected>Select a container</option>
                        <option value="40FR" name="40FR">40FR</option>
                        <option value="20FR" name="20FR">20FR</option>
                        <option value="40HC" name="40HC">40HC</option>
                        <option value="20GP" name="20GP">20GP</option>
                    </select>
                    <button type="button" name="valid" class="btn btn-warning">add</button>
                </div>
            </div>

            <table>
                <thead>Container</thead>
                <tr>
                    <th>Crate Name</th>
                    <th>Length</th>
                    <th>Width</th>
                    <th>Height</th>
                    <th>Weight</th>
                    <th>Volume</th>
                </tr>
                <tr>
                    <td><input type="text" name="" id=""></td>
                    <td><input type="text" name="" id=""></td>
                    <td><input type="text" name="" id=""></td>
                    <td><input type="text" name="" id=""></td>
                    <td><input type="text" name="" id=""></td>
                    <td><input type="text" name="" id=""></td>
                </tr>
                <tr>
                    <td><input type="text" name="" id=""></td>
                    <td><input type="text" name="" id=""></td>
                    <td><input type="text" name="" id=""></td>
                    <td><input type="text" name="" id=""></td>
                    <td><input type="text" name="" id=""></td>
                    <td><input type="text" name="" id=""></td>
                </tr>
                <tr>
                    <td><input type="text" name="" id=""></td>
                    <td><input type="text" name="" id=""></td>
                    <td><input type="text" name="" id=""></td>
                    <td><input type="text" name="" id=""></td>
                    <td><input type="text" name="" id=""></td>
                    <td><input type="text" name="" id=""></td>
                </tr>
                

            </table>

            <!-- <div class="container-fluid">
                <div class="row">
                    <div class="col col-md-2 ">
                        <label for="crate">Crate#</label>
                    </div>
                    <div class="col col-md-2 ">
                        <label for="length">Length</label>
                    </div>
                    <div class="col col-md-2 ">
                        <label for="width">Width</label>
                    </div>
                    <div class="col col-md-2 ">
                        <label for="height">height</label>
                    </div>
                    <div class="col col-md-2 ">
                        <label for="gw">Gross Weight</label>
                    </div>

                </div>
            </div> -->
            <!-- <div class="container-fluid">
                <div class="row">
                    <div class="col col-md-2">
                        <input type="text" name="" id="crate">
                    </div>
                    <div class="col col-md-2">
                        <input type="text" name="" id="length">
                    </div>
                    <div class="col col-md-2">
                        <input type="text" name="" id="width">
                    </div>
                    <div class="col col-md-2">
                        <input type="text" name="" id="height">
                    </div>
                    <div class="col col-md-2">
                        <input type="text" name="" id="gw">
                    </div>
                    <div class="col col-md-1">
                        <button type="button" class="btn btn-primary">+</button>
                    </div>
                </div>
        </form> -->
        <div class="container-fluid text-center">
            <!-- <button type="button" class="btn btn-success">Save as draft</button> -->
            <button type="button" class="btn btn-secondary">Back</button>
            <button type="button" class="btn btn-primary">Next</button>
        </div>
        <div>
            <label for=""></label>
        </div>
    </div>


    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.1/dist/css/bootstrap.min.css" rel="stylesheet"
        integrity="sha384-+0n0xVW2eSR5OomGNYDnhzAbDsOXxcvSN1TPprVMTNDbiYZCxYbOOl7+AMvyTG2x" crossorigin="anonymous">
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.1/dist/js/bootstrap.bundle.min.js"
        integrity="sha384-gtEjrD/SeCtmISkJkNUaaKMoLD0//ElJ19smozuHV6z3Iehds+3Ulb9Bn9Plx0x4" crossorigin="anonymous">
    </script>
</body>

</html>