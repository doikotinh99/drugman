<tr>
    <td>1.</td>
    <td>
        <div class="form-group">
            <select required name="product[]" class="form-control select2 product" style="width: 100%;">
                @foreach ($product as $item)
                    <option value="{{ $item->id }}">{{ $item->name }}</option>
                @endforeach
            </select>
        </div>
    </td>
    <td>
        <div class="form-group">
            <input type="number" class="form-control" name="count[]" id="count">
        </div>
    </td>
</tr>
<script>
    $('.select2').select2()
</script>
