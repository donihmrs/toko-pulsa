$(document).on('ready',function() {
    $(".check").on('click',function(){
        $('.methodePay').hide()

        $(".check").each(function(i,o){
            if($(this).is(":checked")){
                if ( i == 0) {
                    $('#pilihBank').show()
                } else if(i == 1){
                    $('#pilihVa').show()
                }
                else {
                    $('#pilihOvo').show()
                }
            }
        });
    });

    $('#kembaliDataPenerima').on('click',function(){
        $('.allDatas').hide()
        $('#dataPenerima').show()
        $("#metodePembayaranDiv").css("display","none")
        $("#totalPembayaranDiv").css("display","none")
    })

    $('#cekMethodePembayaran').on('click',function(){
        $('.allDatas').hide()
        $('#methodePembayaran').show()
    })

    $('.cekBiaya').on('click',function(){
        if ($('#hasilKurir').html().match(/    /gi)) {
            checkBiaya()
        }
    })

    $('#provinsiTujuan').change(function(){
        var id = $(this).find(":selected").val()
        var provinces = $(this).find(":selected").html()
        var kotas = "";
        var html = "";

        $.ajax({
            url: docRoot+"api/kota",
            dataType: 'json',
            type: 'POST',
            data: {id : id},
            beforeSend:function(){
              $("#loadingDiv").css("display","block")  
            },
            complete:function(){
                $("#loadingDiv").css("display","none")  
            },
            success: function(result){
                for(var i in  result){
                    if(result[i]['status']['code'] == 200){
                        for(var j in result[i]['results']){
                            if(j == 0){
                                kotas = result[i]['results'][j]['city_name']
                            }
                            html += '<option value="'+result[i]['results'][j]['city_id']+'">'+result[i]['results'][j]['type']+" "+result[i]['results'][j]['city_name']+'</option>'
                        }
                    } else {
                        html = '<option value="">Data Not Found</option>'
                    }
                }
                
                $('#kotaTujuan').html(html)
                $('#provinces').val(provinces)
                $('#kotas').val(kotas)

                checkBiaya()
            }
        });
    })
    
    $('#kotaTujuan').change(function(){
        checkBiaya()
    })

    $('#kurir').change(function(){
        checkBiaya()
    })
})

function checkBiaya() {
    $('.allDatas').hide()
    $('#loader').show()
    $('#methodeKurir').show()
    var destination = $('#kotaTujuan').find(":selected").val()
    var weight = parseInt($('#berat').val())
    var courier = $('#kurir').find(":selected").val()
    var html = "";
    var ongkos = "";
    var jenisService =""

    $('#hasilKurir').html("")

    $.ajax({
        url: docRoot+"api/cost",
        dataType: 'json',
        type: 'POST',
        data: {
            destination : destination,
            weight : weight,
            courier : courier
        },
        beforeSend:function(){
            $("#loadingDiv").css("display","block")  
            $('#btnConfirm').css("display","none")
        },
        complete:function(){
            $("#loadingDiv").css("display","none")  
        },
        success: function(res){
            result = res['rajaongkir']
            html +=
                    '<div class="span12 text-center">';
                    if(result['status']['code'] == 200){
                        html +=
                                '<h5 id="resultName">'+result['results'][0]['name']+'</h5>';
                        jenisService += result['results'][0]['name'];

                        for(let i in result['results'][0]['costs']){
                            html +=
                            '<div class="form-check mb-2">'
                                if(i == 0 ){
                                    html +=
                                    '<input class="form-check-input ongkos" type="radio" data-service="'+result['results'][0]['costs'][i]['service']+'" name="ongkos" id="ongkos'+i+'" value="'+result['results'][0]['costs'][i]['cost'][0]['value']+'" checked>'
                                    $('#serviceKurir').val(result['results'][0]['costs'][i]['service'])
                                } else {
                                    html +=
                                    '<input class="form-check-input ongkos" type="radio" data-service="'+result['results'][0]['costs'][i]['service']+'" name="ongkos" id="ongkos'+i+'" value="'+result['results'][0]['costs'][i]['cost'][0]['value']+'">'
                                }

                                html +=
                                '<label style="display:inline-block;margin-left:15px" class="form-check-label ml-2" for="ongkos'+i+'">'+
                                    '<b>'+result['results'][0]['costs'][i]['service']+'</b>'
                                        if(i == 0){
                                            jenisService +=" "+result['results'][0]['costs'][i]['service']
                                            ongkos = result['results'][0]['costs'][i]['cost'][0]['value'];
                                        }
                                        html +=
                                        ' - RP.<span>'+result['results'][0]['costs'][i]['cost'][0]['value']+'</span> - '+result['results'][0]['costs'][i]['cost'][0]['etd']+' Hari';
                                    html +=
                                '</label>'+
                            '</div>'

                            var totalKeseluruhan = parseInt(ongkos) + parseInt($('#totalBelanja').val())
                            
                            $('#ongkosKirim').html("Ongkos Kirim : "+ribuan(ongkos))
                            $('#totalSeluruhPembayaran').html("Total yang harus dibayarkan : "+ribuan(totalKeseluruhan))
                            $('#totalPembayaran').val(totalKeseluruhan)
                            $("#totalPembayaranDiv").css("display","block")
                        }
                    } else {
                        jenisService = "";
                        ongkos = 0;
                    }

                    html += 
                    '</div>';

            if (destination == 0) {
                error = ""
                error += "<div class='span12 text-center'>";
                error += "<h5>Pastikan kota tujuan sudah terpilih, Mohon isi tujuan provinsi dan kota</h5>"
                error += "</div>"

                $("#errorCheckout").html(error)

                $('#btnConfirm').css("display","none")
            } else {
                $("#metodePembayaranDiv").css("display","block")
                $('#btnConfirm').css("display","block")
                $("#errorCheckout").html("")
            }

            $('#hasilKurir').html(html)

            $('.ongkos').click(function(){
                checkOngkir($(this).val(),$(this).attr('data-service'))
            })
        },
        error: function(err){

            error = ""
            error += "<div class='span12 text-center'>";
            error += "<h5>Pastikan kota tujuan sudah terpilih, Mohon isi tujuan provinsi dan kota</h5>"
            error += "</div>"

            $("#errorCheckout").html(error)
        }
    });
}

function ribuan(bilangan) {
    var	reverse = bilangan.toString().split('').reverse().join(''),
	ribuan 	= reverse.match(/\d{1,3}/g);
    ribuan	= ribuan.join('.').split('').reverse().join('');
    
    return ribuan;
}

function checkOngkir(val,kurir) {
    var totalKeseluruhan = parseInt(val) + parseInt($('#totalBelanja').val())
                            
    $('#ongkosKirim').html("Ongkos Kirim : "+ribuan(val))
    $('#totalSeluruhPembayaran').html("Total yang harus dibayarkan : "+ribuan(totalKeseluruhan))
    $('#totalPembayaran').val(totalKeseluruhan)
    $('#serviceKurir').val(kurir)
}