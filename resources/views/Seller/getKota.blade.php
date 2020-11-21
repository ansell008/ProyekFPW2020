@php
    $ctr = 0;
@endphp
@foreach ($allKota as $item)
@if ($item->negara_id == $idNegara)
    @php
        if($ctr == 0){
            $current = $item->kota_nama;
        }
        $ctr++;
    @endphp
@endif
@endforeach


<select style="display: none;" name="kota">
    @if ($ctr == 0)
        <option value=""></option>
    @else
        @foreach ($allKota as $item)
            @if ($item->negara_id == $idNegara)
                <option value="{{$item->kota_id}}">{{$item->kota_nama}}</option>
            @endif
        @endforeach
    @endif

</select>
<div class="nice-select" tabindex="0">
    @if ($ctr == 0)
    <span class="current"></span>
    <ul class="list">
        <li data-value="" class="option"></li>
    </ul>
    @else
        <span class="current">
            {{$current}}
        </span>
        <ul class="list">
            @foreach ($allKota as $item)
                @if ($item->negara_id == $idNegara)
                <li data-value="{{$item->kota_id}}" class="option">{{$item->kota_nama}}</li>
                @endif
            @endforeach
        </ul>
    @endif

</div>




