@extends('layouts.default')
@section('title', 'Breweries - Birre Laravel')
@section('content')
<div class="container">
    <table id="mytable" class="display">
        <thead>
            <tr>
                <th>Id</th>
                <th>Name</th>
                <th>Type</th>
                <th>Address</th>
                <th>City</th>
                <th>State Province</th>
                <th>Postal Code</th>
                <th>Country</th>
                <th>Longitude</th>
                <th>Latitude</th>
                <th>Phone</th>
                <th>Website</th>
                <th>State</th>
                <th>Street</th>
            </tr>
        </thead>
        <tbody></tbody>
        <tfoot>
            <tr>
                <th>Id</th>
                <th>Name</th>
                <th>Type</th>
                <th>Address</th>
                <th>City</th>
                <th>State Province</th>
                <th>Postal Code</th>
                <th>Country</th>
                <th>Longitude</th>
                <th>Latitude</th>
                <th>Phone</th>
                <th>Website</th>
                <th>State</th>
                <th>Street</th>
            </tr>
        </tfoot>
    </table>
    <div id="pagination-controls"></div>
    <div id="error-message" class="alert alert-danger d-none" role="alert"></div>
</div>
<link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css" integrity="sha384-1BmE4kWBq78iYhFldvKuhfTAU6auU8tT94WrHftjDbrCEXSU1oBoqyl2QvZ6jIW3" crossorigin="anonymous">
<script src="https://code.jquery.com/jquery-3.6.0.min.js" integrity="sha256-/xUj+3OJU5yExlq6GSYGSHk7tPXikynS7ogEvDej/m4=" crossorigin="anonymous"></script>
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-ka7Sk0Gln4gmtz2MlQnikT1wXgYsOg+OMhuP+IlRH9sENBO0LRn5q+8nbTov4+1p" crossorigin="anonymous"></script>
<link rel="stylesheet" type="text/css" href="https://cdn.datatables.net/1.11.5/css/jquery.dataTables.min.css">
<script type="text/javascript" src="https://cdn.datatables.net/1.11.5/js/jquery.dataTables.min.js"></script>
<script type="text/javascript" src="https://cdn.datatables.net/server-side/js/dataTables.serverSide.min.js"></script>

<script>
$(document).ready(function() {
    populateDataTable();
});

function populateDataTable() {

    var table = $('#mytable').DataTable({
        processing: true,
        serverSide: true,
        ajax: function (data, callback, settings) {
            // Prepare data to send to the server (e.g., page number, sort information)
            var requestData = {
                draw: data.draw,
                length: data.length,
                start: data.start,
                // Add sorting information (optional)
                order: data.order,
                // Add search information (optional)
                search: data.search.search,
                // Additional custom filtering parameters (optional)
            };

            $.ajax({
                url: '/api/breweries', // Replace with your API endpoint URL
                type: 'POST', // Adjust if your API expects a different method
                dataType: 'json',
                data: requestData,
                header: {'Authorization': localStorage.getItem('token')},
                success: function (response) {
                    callback({
                        draw: response.draw,
                        recordsTotal: response.recordsTotal,
                        recordsFiltered: response.recordsFiltered,
                        data: response.data // Replace with the actual data property name in your response
                    });
                },
                error: function (jqXHR, textStatus, errorThrown) {
                    console.error("Error fetching data:", textStatus, errorThrown);
                    // Handle error (e.g., display an error message)
                }
            });
        },
        columns: [
            { data: 'id' },
            { data: 'name' },
            { data: 'brewery_type' },
            { data: 'address_1' },
            { data: 'city' },
            { data: 'state_province' },
            { data: 'postal_code' },
            { data: 'country' },
            { data: 'longitude' },
            { data: 'latitude' },
            { data: 'phone' },
            { data: 'website_url' },
            { data: 'state' },
            { data: 'street'},
        ]
    });
}
</script>
@stop
