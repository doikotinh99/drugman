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
    })

    $("#AddressCity").change((e) => {
        $id = e.currentTarget.value
        $.get('/address/district/' + $id, (data) => {
            $html = ''
            data.map((e) => {
                $html += '<option value="' + e.id + '">' + e.name + '</option>'

            })
            $("#AddressDistrict").html($html)
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
        $.get('/product/view', (data) => {
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