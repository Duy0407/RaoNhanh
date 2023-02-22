function edit_list(a) {
    $('.list_danhmuc').toggleClass('list_danhmuc-hidden')
    $(a).toggleClass('rotate_icon')
}
// ------------Validate-----------------

// -----------------------------

// $("#register_buy_enterprise").validate({
//     rules: {
//         "Email": {
//             required: true,
//         },
//         "password": {
//             required: true
//         },
//         "repassword": {
//             required: true
//         },
//         "Hoten": {
//             required: true
//         },
//         "Phone": {
//             required: true
//         },
//         "cccd":{
//             required:true
//         },
//         "dataLicens":{
//             required:true
//         },
//         "name_shop":{
//             required:true
//         },
//         "cate_shop":{
//             required:true
//         },
//         "phone_shop":{
//             required:true
//         },
//         "city_shop":{
//             required:true
//         }
//         ,
//         "address_shop":{
//             required:true
//         }
//         ,
//         "giayPhepShop[]":{
//             required:true
//         }
//         ,
//         "captcha":{
//             required:true
//         }


//     },
//     messages: {
//         "Email": {
//             required: "Trường này bắt buộc phải nhập",
//         },
//         "password": {
//             required: "Trường này bắt buộc phải nhập"
//         },
//         "repassword": {
//             required: "Trường này bắt buộc phải nhập"
//         },
//         "Hoten": {
//             required: "Trường này bắt buộc phải nhập"
//         },
//         "Phone": {
//             required: "Trường này bắt buộc phải nhập"
//         },
//         "cccd": {
//             required: "Trường này bắt buộc phải nhập"
//         },
//         "dataLicens": {
//             required: "Trường này bắt buộc phải nhập"
//         },
//         "name_shop": {
//             required: "Trường này bắt buộc phải nhập"
//         },
//         "cate_shop": {
//             required: "Trường này bắt buộc phải nhập"
//         }
//         ,
//         "phone_shop": {
//             required: "Trường này bắt buộc phải nhập"
//         }
//         ,
//         "city_shop": {
//             required: "Trường này bắt buộc phải nhập"
//         }
//         ,
//         "address_shop": {
//             required: "Trường này bắt buộc phải nhập"
//         },
//         "giayPhepShop[]": {
//             required: "Trường này bắt buộc phải nhập"
//         }
//         ,
//         "captcha": {
//             required: "Trường này bắt buộc phải nhập"
//         }
//     },
//     errorPlacement: function(label, element) {
//         if (element.hasClass('web-select2')) {
//             label.insertAfter(element.next('.select2-container')).addClass('mt-2 text-danger');
//             select2label = label
//         } else {
//             label.addClass('mt-2 text-danger');
//             label.insertAfter(element);
//         }
//     },
//     highlight: function(element) {
//         $(element).addClass('khung_do')
//         $(element).addClass('form-control-danger')
//     },
//     success: function(label, element) {
//         $(element).removeClass('khung_do')
//         $(element).removeClass('form-control-danger')
//         label.remove();
//     },
//     submitHandler : function(form) {
//         if ($('#regis_step1').is(":visible")) {
//             current_fs = $('#regis_step1');
//             next_fs = $('#regis_step2');
//         } else if ($('#regis_step2').is(":visible")) {
//             current_fs = $('#regis_step2');
//             next_fs = $('#regis_step3');
//         }
//         next_fs.show();
//         current_fs.hide();
//         return false;


//     }
// })

// $(".select_option").on("select2:close", function(e) {
//     $(this).valid();
// });
// -------------------------------
// $('.btn_reg2').click(function () {
//     if ($('#company_information').is(":visible")) {
//         current_fs = $('#company_information');
//         next_fs = $('#account_information');
//     } else if ($('#personal_information').is(":visible")) {
//         current_fs = $('#personal_information');
//         next_fs = $('#company_information');
//     }
//     next_fs.show();
//     current_fs.hide();
//     return false;
// });