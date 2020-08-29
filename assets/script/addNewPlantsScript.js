$(document).ready(function(){
    $('#anf.add-btn').on('click', function () {
        // $('#anf.add-btn').hide();
        console.log('toggled');
        $('#f-form').slideToggle();
        $('#anf.add-btn').hide();
        $.ajax({
            url: 'inc/plant-list.json',
            type: 'GET',
            dataType: 'JSON',
            cache: false,
            error: function (data) {
                console.log(data);
            },
            success: function (data) {
                var dl = $('#fList');
                var fl = data.Foliage.uid;
                var flid;
                for (flid in fl) {
                    var pv = fl[flid].pv;
                    var sn = fl[flid].sn;
                    var opt = `<option value="${pv}" id="${flid}" data-sn="${sn}">AKA ${sn}</option>`;
                    dl.append(opt);
                }
            } //end of success
        });//end ajax
        $('input:radio').click(function () {
        if ($(this).val() != 'yes') {
            $('#yw').css('display', 'none');
            $('#nw').css('display', 'block');
        } else {
            $('#yw').css('display', 'block');
            $('#nw').css('display', 'none');
        }
    });

    });
});