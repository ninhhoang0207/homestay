<div class="col-md-12 clear"> 
    <div id="list-type" class="proerty-th">
        @foreach ($data as $key => $value)
        <div class="col-sm-6 col-md-4 p0">
            <div class="box-two proerty-item">
                <div class="item-thumb">
                    <a href="{{route('html.detailHotel')}}?hotel_id={{$value->nn_id}}" ><img src="{{ asset($value->url_hinhanh) }}"></a>
                </div>

                <div class="item-entry overflow">
                    <h5><a href="{{route('html.detailHotel')}}?hotel_id={{$value->nn_id}}"> {{ str_limit($value->ten, $limit=18, $end='...') }} </a></h5>
                    <div class="dot-hr"></div>
                    <span class="pull-left"><b> Area :</b> {{ $value->dientich_phongdon }} m<sup>2</sup></span>
                    <span class="proerty-price pull-right"> $ {{ $value->phongdon_motgio }}.000</span>
                    <p style="display: none;">{{ str_limit($value->mota, $limit=150, $end='...')}}</p>
                    <div class="property-icon">
                        <?php foreach ($value->dichvu as $key1 => $value1): ?>
                            <img src="{{asset('images/'.$value1.'.png')}}" title="{{$ten_dichvu[$value1]}}">
                        <?php endforeach ?>
                    </div>
                </div>

            </div>
        </div> 
        @endforeach

    </div>
</div>

<div class="col-md-12"> 
    <div class="pull-right">
        {{ $data->links() }}
    </div>                
</div>

<script type="text/javascript">
    loadPage();
</script>