var getLength = 1;
var dataKategori = {}
var dataBarang = {}
var getAllData = []

$( document ).ready(function() {       
    getLength = $('#lengthRow').val();

    getKategori()

    $('#btnAdd').click(function(){
        htmlBarang()
    })
})

function getKategori () {
    $.ajax({
        type: 'GET',
        url: baseUrl+'api/getKategori',
        success: function(res) {
            dataKategori = JSON.parse(res)
            
            getBarangEdit();
        },
        error: function(xhr) { // if error occured
            console.log(xhr)
        },
    })
}

function getBarang(row) {
    let id = $('#kategori'+row).val();

    $.ajax({
        type: 'POST',
        url: baseUrl+'api/getBarang',
        data: {id:id},
        beforeSend: function() {

        },
        success: function(res) {
            dataBarang = JSON.parse(res)
            let html = ""
            html += "<option value=''>Pilih Barang</option>"
            for (const key in dataBarang) {
                if (dataBarang.hasOwnProperty(key)) {
                    const element = dataBarang[key];
                    html += "<option value='"+element['id_barang']+"|"+element['harga']+"'>"+element['code']+" - "+element['n_barang']+" / Rp "+convertRibuan(element['harga'])+" ("+element['brand']+")</option>"
                }
            }
            $('#barang'+row).html(html)
        },
        error: function(xhr) { // if error occured
            console.log(xhr)
        },
    })
}

function getBarangEdit() {
    let idpen = $('#id_penawaran').val();
    $.ajax({
        type: 'POST',
        url: baseUrl+'api/getBarangReply',
        data: {id:idpen},
        beforeSend: function() {

        },
        success: function(res) {
            getAllData = JSON.parse(res)
            getLength = getAllData.length

            htmlBarangEdit()
        },
        error: function(xhr) { // if error occured
            console.log(xhr)
        },
    })
    
}

function htmlBarang () {
    getLength = parseInt(getLength) + 1;
    $('#lengthRow').val(getLength);

    let html = "";
    html += "<div class='row mt-3' id='baris"+getLength+"'>"
        html += "<div class='col-2'>"
            html +="<select class='form-control' id='kategori"+getLength+"' name='kategori[]' onchange='getBarang("+getLength+")' >"
                html += "<option value=''>Pilih Kategori</option>"
                for (const key in dataKategori) {
                    if (dataKategori.hasOwnProperty(key)) {
                        const element = dataKategori[key];
                        html += "<option value='"+element['id_kategori']+"'>"+element['n_kategori']+"</option>"
                    }
                }
            html += "</select>"
        html += "</div>"
        html += "<div class='col-3'>"
            html +="<select class='form-control' id='barang"+getLength+"' name='barang[]' onchange='setHarga("+getLength+")' required >"
                html += "<option value=''>Pilih Barang</option>"
            html += "</select>"
        html += "</div>"
        html += "<div class='col-1'>"
        html += "<input class='form-control' name='idbarang[]' type='hidden' id='idbarang"+getLength+"'>"
        html += "<input class='form-control' name='qty[]' type='number' id='qty"+getLength+"' onchange='setHarga("+getLength+")' onkeyup='setHarga("+getLength+")' value='1'>"
        html += "</div>"
        html += "<div class='col-1'>"
            html += "<input class='form-control hargadiskon' type='hidden' name='hargaDiskon[]' readonly id='hargaDiskon"+getLength+"' value='0'>"
            html += "<input class='form-control' name='diskon[]' type='number' id='diskon"+getLength+"' onchange='setHarga("+getLength+")' onkeyup='setHarga("+getLength+")' value='0'>"
        html += "</div>"
        html += "<div class='col-2'>"
            html += "<b><span id='textHarganett"+getLength+"'></span></b>"
            html += "<input class='form-control' name='nett[]' type='hidden' readonly id='harganett"+getLength+"' value='0'>"
        html += "</div>"
        html += "<div class='col-2'>"
            html += "<b><span id='textTotalBarang"+getLength+"'></span></b>"
            html += "<input class='form-control hargaTotalBarang' name='total[]' type='hidden' readonly id='totalBarang"+getLength+"' value='0'>"
        html += "</div>"
        html += "<div class='col-1'>"
            html += "<span style='cursor:pointer' class='btn btn-sm btn-danger' onclick='hapusRow("+getLength+")'><i class='fas fa-times'></i></span>"
        html += "</div>"
    html += "</div>"

    $('#rowBarang').append(html)
    return html;
}

function htmlBarangEdit () {
    $('#lengthRow').val(getLength);
    let html = "";
    let baris = 1;
    for (var i = 0; i < getAllData.length ; i++) {
        html += "<div class='row mt-3' id='baris"+baris+"'>"
            html += "<div class='col-2'>"
                html +="<select class='form-control' id='kategori"+baris+"' name='kategori[]' onchange='getBarang("+baris+")' >"
                    html += "<option value=''>Pilih Kategori</option>"
                    for (const key in dataKategori) {
                        if (dataKategori.hasOwnProperty(key)) {
                            const element = dataKategori[key];
                            html += "<option value='"+element['id_kategori']+"' "+(getAllData[i].id_kategori == element['id_kategori'] ? 'selected' : '')+">"+element['n_kategori']+"</option>"
                        }
                    }
                html += "</select>"
            html += "</div>"
            html += "<div class='col-3'>"
                html +="<select class='form-control' id='barang"+baris+"' name='barang[]' onchange='setHarga("+baris+")' required >"
                    html += "<option value='"+getAllData[i].id_barang+"|"+getAllData[i].harga+"'>"+getAllData[i].code+" - "+getAllData[i].n_barang+" / Rp "+convertRibuan(getAllData[i].harga)+" ("+getAllData[i].brand+")</option>"
                html += "</select>"
            html += "</div>"
            html += "<div class='col-1'>"
            html += "<input class='form-control' value='"+getAllData[i].id_barang+"' name='idbarang[]' type='hidden' id='idbarang"+baris+"'>"
            html += "<input class='form-control' name='qty[]' type='number' id='qty"+baris+"' onchange='setHarga("+baris+")' onkeyup='setHarga("+baris+")' value='"+getAllData[i].qty+"'>"
            html += "</div>"
            html += "<div class='col-1'>"
                html += "<input class='form-control hargadiskon' type='hidden' name='hargaDiskon[]' readonly id='hargaDiskon"+baris+"' value='"+getAllData[i].harga_diskon+"'>"
                html += "<input class='form-control' name='diskon[]' type='number' id='diskon"+baris+"' onchange='setHarga("+baris+")' onkeyup='setHarga("+baris+")' value='"+getAllData[i].diskon+"'>"
            html += "</div>"
            html += "<div class='col-2'>"
                html += "<b><span id='textHarganett"+baris+"'>Rp. "+convertRibuan(getAllData[i].harga_nett)+"</span></b>"
                html += "<input class='form-control' name='nett[]' type='hidden' readonly id='harganett"+baris+"' value='"+getAllData[i].harga_nett+"'>"
            html += "</div>"
            html += "<div class='col-2'>"
                html += "<b><span id='textTotalBarang"+baris+"'>Rp. "+convertRibuan(getAllData[i].total_barang)+"</span></b>"
                html += "<input class='form-control hargaTotalBarang' name='total[]' type='hidden' readonly id='totalBarang"+baris+"' value='"+getAllData[i].total_barang+"'>"
            html += "</div>"
            html += "<div class='col-1'>"
                html += "<span style='cursor:pointer' class='btn btn-sm btn-danger' onclick='hapusRow("+baris+")'><i class='fas fa-times'></i></span>"
            html += "</div>"
        html += "</div>"
        baris++;
    }
    

    $('#rowBarang').html(html)
    return html;
}

function convertRibuan(angka){
    var reverse = angka.toString().split('').reverse().join(''),
    ribuan = reverse.match(/\d{1,3}/g);
    ribuan = ribuan.join('.').split('').reverse().join('');
    return ribuan;
}

function hapusRow(id) {
    let getLength = $('#lengthRow').val();

    if (getLength != 0) {
        $('#baris'+id).remove();
    }

    totalTransaksi()
}

function setHarga(row) {
    let harganett = 0
    let hitungDiskon = 0

    let hargaPl = $('#barang'+row).val();
    let splitHarga = hargaPl.split('|');

    let qty = $('#qty'+row).val();

    let idBarang = splitHarga[0]
    $('#idbarang'+row).val(idBarang)

    hargaPl = splitHarga[1]

    let diskon = $('#diskon'+row).val();

    if (diskon == 0) {
        harganett = hargaPl
    } else {
        hitungDiskon = hargaPl * diskon / 100
        harganett = hargaPl - hitungDiskon
    }
    
    $('#textHarganett'+row).text('Rp. '+convertRibuan(harganett))
    $('#harganett'+row).val(harganett)

    let total = harganett * qty

    let hitungDiskonTotal = hitungDiskon * qty
    $('#hargaDiskon'+row).val(hitungDiskonTotal)

    $('#textTotalBarang'+row).text('Rp. '+convertRibuan(total))
    $('#totalBarang'+row).val(total)

    totalTransaksi()
}

function totalTransaksi() {
    let dataHargaDiskon = $('.hargadiskon')
    let dataHargaBarang = $('.hargaTotalBarang')
    var totalDiskon = 0;
    var totalHargaBarang = 0;

    for (let i = 0; i < dataHargaDiskon.length;i++) {
        totalDiskon += parseInt(dataHargaDiskon[i].value)
    }

    for (let i = 0; i < dataHargaBarang.length;i++) {
        totalHargaBarang += parseInt(dataHargaBarang[i].value)
    }

    $('#totalDiskon').val(totalDiskon)
    $('#textTotalDiskon').text(convertRibuan(totalDiskon))

    $('#textTotalHarga').text(convertRibuan(totalHargaBarang))
    $('#totalHarga').val(totalHargaBarang)
}