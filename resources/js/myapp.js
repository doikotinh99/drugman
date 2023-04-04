$(document).ready(function () {
    $('.btn-delete-class').click((e) => {
        $check = confirm('Xác nhận xóa!!!!');
        if ($check) {
            $id = e.currentTarget.dataset.id
            $class = e.currentTarget.dataset.class
            $path = '/' + $class + '/destroy/' + $id
            $.get($path, (data) => {
                if (data === 'deleted') {
                    $(document).Toasts('create', {
                        class: 'bg-danger',
                        title: 'Toast Title',
                        subtitle: 'Subtitle',
                        body: 'Lorem ipsum dolor sit amet, consetetur sadipscing elitr.'
                    })
                    setTimeout(() => {
                        location.reload();
                    }, 500)
                } else {
                    alert("không thể thực hiện")
                }
            })
        }
    })
    $.get('/address/city', (data) => {
        $html = ''
        data.map((e) => {
            $html += '<option value="' + e.id + '">' + e.name + '</option>'
        })
        $("#AddressCity").html($html)
        $.get('/address/district/' + $("#AddressCity option")[0].value, (data) => {
            $html = ''
            data.map((e) => {
                $html += '<option value="' + e.id + '">' + e.name + '</option>'
            })
            $("#AddressDistrict").html($html)
            $.get('/address/ward/' + $("#AddressDistrict option")[0].value, (data) => {
                $html = ''
                data.map((e) => {
                    $html += '<option value="' + e.id + '">' + e.name + '</option>'
    
                })
                $("#AddressWard").html($html)
            })
        })
    })

    $("#AddressCity").change((e) => {
        $id = e.currentTarget.value
        $.get('/address/district/' + $id, (data) => {
            $html = ''
            data.map((e) => {
                $html += '<option value="' + e.id + '">' + e.name + '</option>'
            })
            $("#AddressDistrict").html($html)
            $.get('/address/ward/' + $("#AddressDistrict option")[0].value, (data) => {
                $html = ''
                data.map((e) => {
                    $html += '<option value="' + e.id + '">' + e.name + '</option>'
    
                })
                $("#AddressWard").html($html)
            })
        })
    })

    $("#AddressDistrict").change((e) => {
        $id = e.currentTarget.value
        $.get('/address/ward/' + $id, (data) => {
            $html = ''
            data.map((e) => {
                $html += '<option value="' + e.id + '">' + e.name + '</option>'

            })
            $("#AddressWard").html($html)
        })
    })

    $.get('/product/get', (data) => {
        $html = '<option value=""></option>'
        data.map((e) => {
            $html += '<option value="' + e.id + '">' + e.name + '</option>'
        })
        $(".product").html($html)
    })
    $('.btnAdd').click(() => {
        console.log($("#tableModalInsertOrder tbody")[0].children)
        $stt = $("#tableModalInsertOrder tbody")[0].children.length
        $.get('/product/view', {stt : Number($stt) - 1}, (data) => {
            
            
            $("#tableModalInsertOrder tbody").append(data)
        })
    })
})

function getProduct() {
    $.get('/product/get', (data) => {
        $html = ''
        data.map((e) => {
            $html += '<option value="' + e.id + '">' + e.name + '</option>'
        })
        $(".product").html($html)
    })
}