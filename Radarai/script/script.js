$(document).ready(function(){

    $('#limitSelect').on('change', function() {
        var url_string = window.location.href;
        var url = new URL(url_string);
        var params = url.searchParams;
        params.set("limit", this.value);       

        window.location.search = params.toString();
    });

    $('#dateCB').on('change', function() {
        if (this.checked == true) {
            $("#dateInterval1").prop('disabled', false);
            $("#dateInterval2").prop('disabled', false);
            $("#dateSearch").prop('disabled', true);
         } else {
             $("#dateInterval1").prop('disabled', true);
             $("#dateInterval2").prop('disabled', true);
             $("#dateSearch").prop('disabled', false);
         }
    });
    $('#timeCB').on('change', function() {
        if (this.checked == true) {
            $("#timeInterval1").prop('disabled', false);
            $("#timeInterval2").prop('disabled', false);
            $("#timeSearch").prop('disabled', true);
         } else {
             $("#timeInterval1").prop('disabled', true);
             $("#timeInterval2").prop('disabled', true);
             $("#timeSearch").prop('disabled', false);
         }
    });
    $('#distanceCB').on('change', function() {
        if (this.checked == true) {
            $("#distanceInterval1").prop('disabled', false);
            $("#distanceInterval2").prop('disabled', false);
            $("#distanceSearch").prop('disabled', true);
         } else {
             $("#distanceInterval1").prop('disabled', true);
             $("#distanceInterval2").prop('disabled', true);
             $("#distanceSearch").prop('disabled', false);
         }
    });
    $('#speedCB').on('change', function() {
        if (this.checked == true) {
           $("#speedInterval1").prop('disabled', false);
           $("#speedInterval2").prop('disabled', false);
           $("#speedSearch").prop('disabled', true);
        } else {
            $("#speedInterval1").prop('disabled', true);
            $("#speedInterval2").prop('disabled', true);
            $("#speedSearch").prop('disabled', false);
        }
    });
    $('#filter').on('click', function() {
        $('#searchForm').removeClass('hidden');
    });
    $('#hide').on('click', function() {
        $('#searchForm').addClass('hidden');
    });
    $('#clean').on('click', function() {
        var url_string = window.location.href;
        var url = new URL(url_string);
        var params = url.searchParams;
        params.delete("date");
        params.delete("time");
        params.delete("speed");
        params.delete("distance");
        params.delete("number");
        params.delete("search");
        params.delete("dateInterval[0]");
        params.delete("timeInterval[0]");
        params.delete("speedInterval[0]");
        params.delete("distanceInterval[0]");
        params.delete("dateInterval[1]");
        params.delete("timeInterval[1]");
        params.delete("speedInterval[1]");
        params.delete("distanceInterval[1]");
        window.location.search = params.toString();
    });       

    var url_string = window.location.href;
    var url = new URL(url_string);
    if(url.searchParams.has('search')) {
        $('#searchForm').removeClass('hidden');
    }
    if(url.searchParams.has('dateInterval[0]')) {
        $("#dateInterval1").prop('disabled', false);
        $("#dateInterval2").prop('disabled', false);
        $("#dateSearch").prop('disabled', true);
    }
    if(url.searchParams.has('timeInterval[0]')) {
        $("#timeInterval1").prop('disabled', false);
        $("#timeInterval2").prop('disabled', false);
        $("#timeSearch").prop('disabled', true);
    }
    if(url.searchParams.has('distanceInterval[0]')) {
        $("#distanceInterval1").prop('disabled', false);
        $("#distanceInterval2").prop('disabled', false);
        $("#distanceSearch").prop('disabled', true);
    }
    if(url.searchParams.has('speedInterval[0]')) {
        $("#speedInterval1").prop('disabled', false);
        $("#speedInterval2").prop('disabled', false);
        $("#speedSearch").prop('disabled', true);
    }   
    console.log(url.searchParams.has('speedInterval[]'));
    console.log(url.searchParams.has('speedInterval[0]'));
    console.log(url.searchParams.has('speedInterval[1]'));

});