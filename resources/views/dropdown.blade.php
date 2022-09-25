<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Laravel Custom Login Registration</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.1/dist/css/bootstrap.min.css" rel="stylesheet">
    <script src="https://code.jquery.com/jquery-3.6.1.slim.js" integrity="sha256-tXm+sa1uzsbFnbXt8GJqsgi2Tw+m4BLGDof6eUPjbtk=" crossorigin="anonymous"></script>
</head>

<body>
    <div class="container p-4">
        <div class="row">
            <div class="col">
                <label for="division">Select Division:</label>
                <select name="division" id="division">
                    <option disabled hidden selected>-- Select Division --</option>
                    @foreach ($divisions as $division)
                    <option value="{{ $division->division_id }}">{{ $division->division_name }}</option>
                    @endforeach
                </select>
            </div>
            <div class="col">

                <label for="division">Division Selected:</label>
                <select name="division" id="selecttext">
                    <option disabled hidden selected>-- Select Division --</option>
                    @foreach ($divisions as $division)
                    <option value="{{ $division->division_id }}">{{ $division->division_name }}</option>
                    @endforeach
                </select>
            </div>
        </div>

        <div class="row my-5">
            <div class="col">
                <label for="district">Select District:</label>
                <select name="district" id="district">
                    <option disabled hidden selected>-- Select District --</option>
                </select>
            </div>
            <div class="col">

                <label for="district">Select District:</label>
                <select name="district" id="district2">
                    <option disabled hidden selected>-- Select District --</option>
                </select>
            </div>
        </div>

        <div class="row my-5">
            <div class="col">
                <label for="thana">Thana</label>
                <input type="text" id="thana" name="thana">
            </div>
            <div class="col">

                <label for="thana">Thana</label>
                <input type="text" id="thana2" name="thana2">
            </div>
        </div>

        <br><br>
        <button type="submit" id="submit" name="submit">Submit</button>
    </div>

</body>
<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
<script src="//cdn.jsdelivr.net/npm/sweetalert2@11"></script>
<script>
    $(document).ready(function() {
        $("#thana").bind('input', function() {
            var stt = $(this).val();
            $("#thana2").val(stt);
        });
        $("#division").change(function() {
            var d = $('#division').val();
            $('#selecttext').val(d).trigger('change');
        });
        $("#district").change(function() {
            var d1 = $('#district').val();
            $('#district2').val(d1);
        });
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
                    $('#district').html('<option disabled hidden selected>-- Select District --</option>');
                    $.each(result.district, function(key, value) {
                        $("#district").append('<option value="' + value
                            .district_id + '">' + value.district_name + '</option>');
                    });
                }
            });
        });

        $('#selecttext').on('change', function() {
            var idivision = this.value;


            $.ajax({
                url: "{{url('/dropdistricts')}}",
                type: "POST",
                data: {
                    division_id: idivision,
                    _token: '{{csrf_token()}}'
                },
                dataType: 'json',
                success: function(result) {
                    $('#district2').html('<option disabled hidden selected>-- Select District --</option>');
                    $.each(result.district, function(key, value) {
                        $("#district2").append('<option value="' + value
                            .district_id + '">' + value.district_name + '</option>');
                    });
                }
            });
        });
        // $('#division').on('change', function() {
        //     var idivision = this.value;


        //     $.ajax({
        //         url: "{{url('/dropdistricts')}}",
        //         type: "POST",
        //         data: {
        //             division_id: idivision,
        //             _token: '{{csrf_token()}}'
        //         },
        //         dataType: 'json',
        //         success: function(result) {
        //             $('#district2').html('<option disabled hidden selected>-- Select District --</option>');
        //             $.each(result.district, function(key, value) {
        //                 $("#district2").append('<option value="' + value
        //                     .district_id + '">' + value.district_name + '</option>');
        //             });
        //         }
        //     });
        // });




    });

    $('body').on('click', '#submit', function(e) {
        var division = $('#division').val();
        var district = $('#district').val();
        var thana = $('#thana').val();

        //alert(thana);
        $.ajax({

            url: '/save-data',
            method: 'post',
            data: {
                _token: '{{csrf_token()}}',
                division: division,
                district: district,
                thana: thana

            },
            success: function(result) {
                Swal.fire({
                    icon: 'success',
                    title: 'Data Inserted Successfully',
                    showConfirmButton: false,
                    timer: 1500
                })
                // $("#form_id").reset();
                $("#division").val("");
                $("#district").val("");
                $("#thana").val("");
            }
        })
        e.preventDefault();
    })
</script>

</html>