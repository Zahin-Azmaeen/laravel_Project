<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <title>jQuery Add / Remove Table Rows</title>
    <style>
        table {
            width: 100%;
            margin: 20px 0;
            border-collapse: collapse;
        }

        table,
        th,
        td {
            border: 1px solid #cdcdcd;
        }

        table th,
        table td {
            padding: 5px;
            text-align: left;
        }
    </style>

</head>

<body>
    <form action="{{ route('savedata') }}" method="POST">
        @csrf
        <select name="category" id="category">
            <option disabled hidden selected>-- Select category --</option>
            @foreach ($category as $cat)
                <option value="{{ $cat->category_id }}">{{ $cat->category_name }}</option>
            @endforeach
        </select>
        <input type="text" id="subcategory" placeholder="Subcategory">
        <input type="button" class="add-row" value="Add Row">
    
    <table id="myTable">
        <thead>
            <tr>
                <th>Category</th>
                <th>Subcategory</th>
                <th>Action</th>
            </tr>
        </thead>
        <tbody>

        </tbody>
    </table>

    <button type="submit" class="submit" id="submit">Submit</button>
</form>
</body>

</html>


<script src="https://code.jquery.com/jquery-1.12.4.min.js"></script>
<script>
    $(document).ready(function() {
        $(".add-row").click(function() {
            // var category = $("#category").val();
            var id = $("#category option:selected").val();
            var category = $("#category option:selected").text();
            var subcategory = $("#subcategory").val();

            if(category != "" && subcategory != ""){
                var markup = "<tr><td><input type='hidden' name='category[]' value="+id+">" + category + "</td><td><input type='hidden' name='subcategory[]' value="+subcategory+">" + subcategory +
                "</td><td><button class='btn_row_delete' id='deletebtn' onclick='deleteRow(this);'>Delete</button></td></tr>";
            $("#subcategory").val('').trigger('change');
            // $("#category").val('').trigger('change');
            $("table tbody").append(markup);
            }else{
                alert("Cannot be null");
            }
            
        });
        $(document).on('click', ".btn_row_delete", function(e) {
            var r = $(this).closest('tr').remove();
        });

    });
    
    
</script>
