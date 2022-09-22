<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Laravel Custom Login Registration</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.1/dist/css/bootstrap.min.css" rel="stylesheet">
</head>

<body>

    <label for="division">Choose Division:</label>
    <select name="division" id="division">
        @foreach ($divisions as $division)
        <option value="{{ $division->division_id }}">{{ $division->division_name }}</option>
        @endforeach

    </select>
    <br><br>
    <label for="district">Choose District:</label>
    <select name="district" id="district">


    </select>
    <br><br>

    <label for="thana">Thana</label>
    <input type="thana" id="thana" name="thana">
    <br><br>
    <button type="submit" id="submit">Submit</button>
</body>
<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
<script>
    $(document).ready(function() {

        /*------------------------------------------
        --------------------------------------------
        Country Dropdown Change Event
        --------------------------------------------
        --------------------------------------------*/
        $('#division').on('change', function() {
            var iddivision = this.value;


            $.ajax({
                url: "{{url('/dropdistricts')}}",
                type: "POST",
                data: {
                    division_id: iddivision,
                    _token: '{{csrf_token()}}'
                },
                dataType: 'json',
                success: function(result) {
                    $('#district').html('<option value="">-- Select State --</option>');
                    $.each(result.district, function(key, value) {
                        $("#district").append('<option value="' + value
                            .district_id + '">' + value.district_name + '</option>');
                    });
                }
            });
        });

        $("#submit").on('click', function() {
            var division = $('#division').val();
            var district = $('#district').val();
            var thana = $('#thana').val();


            $.ajax({
                url: "{{url('/add')}}",
                method: 'get',
                data: {
                    division: division,
                    district: district,
                    thana: thana,
                },
                success: function(result) {
                    $('.alert').show();
                    $('.alert').html(result.success);
                    //$('#tbcat').append(result.row);
                }
            });
        });


    });
</script>

</html>