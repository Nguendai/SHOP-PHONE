$(document).ready(function () {
    $('#check_name').hide();
    $('#name').change(function () {
        var name = $('#name').val();
        // console.log(name);
        $.ajax({
            url: "ajax/checkName.php",
            data: {
                name: name,

            },
            dataType: 'text',
            type: 'POST',
            success: function (response) {
                if (response == "bitrung") {
                    $('#check_name').html('Ten đã tồn tại')
                    $('#check_name').css('color', 'red');
                    $('#check_name').show()
                } else {
                    $('#check_name').html('<i class="fa fa-check" aria-hidden="true"></i>');
                    $('#check_name').css('color', '#36912e');
                    $('#check_name').show();
                }
            }
        });

    });
});

function changeImg(input) {
    //Nếu như tồn thuộc tính file, đồng nghĩa người dùng đã chọn file mới
    if (input.files && input.files[0]) {
        var reader = new FileReader();
        //Sự kiện file đã được load vào website
        reader.onload = function (e) {
            //Thay đổi đường dẫn ảnh
            $('#avatar').attr('src', e.target.result);
        }
        reader.readAsDataURL(input.files[0]);
    }
}
$(document).ready(function () {
    $('#avatar').click(function () {
        $('#img').click();
    });
});