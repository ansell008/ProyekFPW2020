@foreach ($allKota as $item)
    @if ($item->negara_id == $idNegara)
        <option value="{{$item->kota_id}}">{{$item->kota_nama}}</option>
    @endif
@endforeach




