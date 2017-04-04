function xoasanpham() {
    var conf = confirm("Bạn có muốn xóa không");
    return conf;

}
var id_cate = 0// gan id
//ham lay id
function my_cate(id, cate_name) {
    $('#cate_name2').val(cate_name);
    $('#add_cate').css({'opacity': '0', 'visibility': 'hidden'});
    $('#edit_cate').css({'opacity': '1', 'visibility': 'visible'});
    id_cate = id;
}

$(document).ready(function () {
    var check_erro = true;
    $('#cate_name2').focusout(function () {
        var cate_name2 = $('#cate_name2').val();
        $.ajax({
            url: "ajax/checkCate.php",
            data: {cate_name: cate_name2},
            dataType: 'text',
            type: 'POST',
            success: function (response) {
                if (response == "bitrung") {
                    console.log(response);
                    $('#form_a').addClass('has-error');
                    $('#form_a').addClass('has-feedback');
                    $('#form_a').append('<span class="glyphicon glyphicon-remove form-control-feedback" aria-hidden="true"></span>');
                    $('#form_a').removeClass('has-success');
                    $('.glyphicon-ok').remove();
                    // $('#check_cate').show();
                    check_erro = true;
                } else {
                    check_erro = false;
                    $('#form_a').addClass('has-success');
                    $('#form_a').addClass('has-feedback');
                    $('#form_a').append('<span class="glyphicon glyphicon-ok form-control-feedback" aria-hidden="true"></span>');
                    $('#form_a').removeClass('has-error');
                    $('.glyphicon-remove').remove()
                    // $('#check_cate').hide();
                }

            }
        });
    });

    $('#add_cate').click(function () {
        var cate_name2 = $.trim($('#cate_name2').val());

        if (cate_name2 == "") {
            $('#form_a').addClass('has-error');
            $('#form_a').addClass('has-feedback');
            $('#form_a').append('<span class="glyphicon glyphicon-remove form-control-feedback" aria-hidden="true"></span>');
            $('#form_a').removeClass('has-success');
            $('.glyphicon-ok').remove();
        } else {
            var cate_name2 = $('#cate_name2').val();
            $.ajax({
                url: "ajax/add_cate.php",
                data: {cate_name1: cate_name2},
                dataType: 'text',
                type: 'POST',
                success: function (response1) {
                    // console.log(response1);
                    if (response1 == "123") {
                        $('#form_a').addClass('has-error');
                        $('#form_a').addClass('has-feedback');
                        $('#form_a').append('<span class="glyphicon glyphicon-remove form-control-feedback" aria-hidden="true"></span>');
                        $('#form_a').removeClass('has-success');
                        $('.glyphicon-ok').remove();
                        $('#check_cate').show();
                        check_erro = true;
                    } else {
                        console.log(response1);
                        $('#result').html(response1);
                        alert("thêm thanh công");
                        $('#cate_name2').val('');
                    }
                }
            });

        }
    });
    $('#edit_cate').click(function () {
        var cate_name = $.trim($('#cate_name2').val());
        if (cate_name == "") {
            $('#form_a').addClass('has-error');
            $('#form_a').addClass('has-feedback');
            $('#form_a').append('<span class="glyphicon glyphicon-remove form-control-feedback" aria-hidden="true"></span>');
            $('#form_a').removeClass('has-success');
            $('.glyphicon-ok').remove();
        } else {
            var cate_name = $('#cate_name2').val();
            $.ajax({
                url: "ajax/edit_cate.php",
                data: {cate_name: cate_name, id_cate: id_cate},
                dataType: 'text',
                type: 'POST',
                success: function (response) {
                    if (response == "trung") {
                        $('#form_a').addClass('has-error');
                        $('#form_a').addClass('has-feedback');
                        $('#form_a').append('<span class="glyphicon glyphicon-remove form-control-feedback" aria-hidden="true"></span>');
                        $('#form_a').removeClass('has-success');
                        $('.glyphicon-ok').remove();
                        $('#check_cate').show();
                        check_erro = true;
                    } else {
                        console.log(response);
                        $('#result').html(response);
                        alert(" Sua thanh công");
                        $('#cate_name2').val('');
                    }
                }
            });
        }
    });

})
