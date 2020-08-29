$(document).ready(function () {
    // Define function to load dashboard
    var td = new Date();
    td = td.toLocaleDateString();
    console.log(td);
    $('#today-date').append(td);
    function displayDashboard() {
        $.ajax({
            url: 'users/all-foliage.json',
            type: 'GET',
            dataType: 'JSON',
            cache: false,
            error: function (data) {
                console.log(data);
            },
            success: function (data) {
                $.each(data, function (index, value) {
                    // list out variables
                    // console.log(index, value);
                    var pt = value.pt;
                    var pnn = value.pnn;
                    var pv = value.pv;
                    var plantid = index;
                    var img = value.img;
                    var lwd = value.lwd;
                    var nwd = value.nwd
                    // console.log(plantid);
                    var lwdDate = new Date(lwd);
                    var lwdUD = lwdDate.setHours(0, 0, 0, 0);//date ob
                    // console.log(lwdUD);
                    var nwdDate = new Date(nwd);
                    var nwdUD = nwdDate.setHours(0, 0, 0, 0);//date ob
                    // console.log('nwd' + nwdUD);
                    var todayDate = new Date();
                    var todayUD = todayDate.setHours(0, 0, 0, 0);
                    // console.log(todayDate);

                    if ((lwdUD < todayUD || lwd == "") && nwdUD == todayUD) {
                        $('#todayDisplay').append(
                            '<div class="dl check" id="' + plantid + '"></div>');
                        $('#' + plantid + '').append(
                            `<form method="POST" enctype="multipart/form-data">
                            <input type="hidden" name="plantid" value="${plantid}">
                            <input type="hidden" name="pnn" value="${pnn}">
                            <input type="hidden" name="ontime" value=false>
                            <input type="submit" name="submit" value="Water ${pnn}" onclick="waterThisNow()" class="odbtn">
                        </form>
                            `
                        );
                    } else if (lwdUD == todayUD) { //then this is completed today
                        $('#todayCompletedDisplay').append('<div class="dl" id="' + plantid + '"></div>');
                        $('#' + plantid + '').append(
                            `<div class="done-today">${pnn}</div>`
                        );
                    } else if (nwdUD < todayUD) { //then this is past due
                        $('#pastDueDisplay').append('<div class="dl check" id="' + plantid + '"></div>');
                        $('#' + plantid + '').append(
                        `<form method="POST" enctype="multipart/form-data">
                                <input type="hidden" name="plantid" value="${plantid}">
                                <input type="hidden" name="pnn" value="${pnn}">
                                <input type="hidden" name="ontime" value=false>
                                <input type="submit" name="submit" value="Water ${pnn}" onclick="waterThisNow()" class="odbtn past-due-btn">
                            </form>`
                        );
                    } else if ((lwdUD <= todayUD || lwd == '') && nwdUD > todayUD) {
                        //upcoming plants to water / have watered already
                        $('#upcomingDisplay').append('<div class="dl" id="' + plantid + '"></div>');
                        $('#' + plantid + '').append(
                            `<div>${pnn} |
                                    Next Watering Date:
                                        <span class="des-out"> ${nwd}</span></div>`
                        );
                    };
                    waterThisNow();
                })
            } //end of success call
        });//end of ajax displaydashboard
    }
    displayDashboard();

    function waterThisNow() {
        $('form').submit(function (e) {
            $('.dl').remove();
            var nowtime = new Date();
            var formData = new FormData($(this)[0]);
            formData.append('ts', nowtime);
            $.ajax({
                url: 'dh-done-dash.php',
                type: 'POST',
                data: formData,
                cache: false,
                contentType: false,
                processData: false,
                success: function () {
                    console.log('ajax complete');
                    displayDashboard();
                }
            });//end of ajax call */
            e.preventDefault();
            e.stopImmediatePropagation();
            e.stopPropagation();
        });
    }//end of checkbox function
})

