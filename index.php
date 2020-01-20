    <!-- Required meta tags -->
    <!doctype html>
    <html lang="en">

    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
        <title>Postcode Finder</title>

        <!-- Bootstrap CSS -->
        <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.4.1/css/bootstrap.min.css" integrity="sha384-Vkoo8x4CGsO3+Hhxv8T/Q5PaXtkKtu6ug5TOeNV6gBiFeWPGFN9MuhOf23Q9Ifjh" crossorigin="anonymous">

        <title>Hello, world!</title>
    </head>

    <body>
        <div class="container">
            <h1>Postcode Finder</h1>
            <p>Enter a street address to get the postcode.</p>
            <div id="message"></div>
            <form>
                <div class="form-group">
                    <label for="address">Address</label>
                    <input type="text" class="form-control" id="address" placeholder="Enter partial address" aria-describedby="emailHelp">
                </div>
                <button class="btn btn-primary" id="find-postcode">Submit</button>
            </form>
        </div>

        <!-- Optional JavaScript -->
        <!-- jQuery first, then Popper.js, then Bootstrap JS -->
        <script src="https://code.jquery.com/jquery-3.4.1.slim.min.js" integrity="sha384-J6qa4849blE2+poT4WnyKhv5vZF5SrPo0iEjwBvKU7imGFAV0wwj1yYfoRSJoZ+n" crossorigin="anonymous"></script>
        <script src="https://cdn.jsdelivr.net/npm/popper.js@1.16.0/dist/umd/popper.min.js" integrity="sha384-Q6E9RHvbIyZFJoft+2mJbHaEWldlvI9IOYy5n3zV9zzTtmI3UksdQRVvoxMfooAo" crossorigin="anonymous"></script>
        <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.4.1/js/bootstrap.min.js" integrity="sha384-wfSDF2E50Y2D1uUdj0O3uMBJnjuUD4Ih7YwaYd1iqfktj0Uod8GCExl3Og8ifwB6" crossorigin="anonymous"></script>

        <script type="text/javascript">
            $("#find-postcode").click(function(e) {
                e.preventDefault();
                $.ajax({
                    url: "https://maps.googleapis.com/maps/api/geocode/json?address=" + encodeURIComponent($("#address").val()) + "&key=YOUR_API_KEY",
                    type: "GET",
                    success: function(data) {
                        if (data["status"] != "OK") {
                            $("#message").html('<div class="alert alert-warning" role="alert">Postcode could not be found - please try again.</div>');
                        } else {
                            $.each(data["results"][0]["address_components"], function(key, value) {
                                if (value["types"][0] == "postal_code") {
                                    $("#message").html('<div class="alert alert-success" role="alert"><strong>Postcode found!</strong> The postcode is ' + value["long_name"] + '.</div>');
                                }
                            })
                        }
                    }
                })
            })
        </script>
    </body>

    </html>