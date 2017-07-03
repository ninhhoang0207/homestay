var map;
check_place = 1; //Nếu = 0 thì không tìm thấy địa chỉ không cho lưu.
map = new google.maps.Map(document.getElementById('map-canvas'), {
  center: {lat: 21.0031177, lng: 105.82014079999999},
  zoom: 15
});
var marker = new google.maps.Marker({
    position : {lat: 21.0031177, lng: 105.82014079999999},
    draggable : true,
    map:map,
});
console.log(marker.position.lat());

var input = document.getElementById('address');
var searchBox = new google.maps.places.SearchBox(input);
google.maps.event.addListener(searchBox,'places_changed',function(){
var places = searchBox.getPlaces();
    if(places[0].geometry != null){
        var bounds = new google.maps.LatLngBounds();
        bounds.extend(places[0].geometry.location);
        console.log(places[0].geometry.location.lat()+":"+places[0].geometry.location.lng());
        marker.setPosition(places[0].geometry.location);
        map.fitBounds(bounds);
        map.setZoom(15);
        check_place = 1;
    }else{
        check_place = 0;
        alert('{{Lang::get('val.sai_dia_chi')}}');
    }
});

google.maps.event.addListener(marker,'position_changed',function(){
    var lat = marker.position.lat();
    var lng = marker.position.lng();
    $('#lat').val(lat);
    $('#lng').val(lng);
});

$('#register-form').on('submit',function(){
    if(check_place == 1)
        return true;
    else
        alert('{{Lang::get('val.sai_dia_chi')}}');
    return false;
});


$('#register-form').validate({
    rules: {
        name : "required",
        address : "required",
        room_numb : "required",
        phone : "required",

    },

    messages: {
        name : "{{Lang::get('val.message')}}",
        address : "{{Lang::get('val.message')}}",
        room_numb : "{{Lang::get('val.message')}}",
        phone : "{{Lang::get('val.message')}}",
    }
});

Dropzone.options.dz = {
        url : '{{route("hotel.uploadImg")}}',
        maxFilesize: 2, // MB
        addRemoveLinks: true,
        acceptedFiles : 'image/jpeg, images/jpg, image/png',
        init : function(){
            var fileList = new Array;
            var fileList_count = 0;
            var thisDropzone = this;
            this.on("removedfile", function(file) {
                //Kiem tra xem file anh da xoa da co tu truoc hay chua
                $.ajax({
                    type: 'POST',
                    url: '{{route("hotel.deleteImg")}}',
                    // data: {name: file.serverFileName, _token: $('input[name = "_token"]').val()},
                    data : {id: $('#id').val(), _token: $('input[name = "_token"]').val(), name: file.serverFileName}
                }).done(function(data){
                    if(data == -1){//file nay la file chua duoc luu truoc do
                        var index = fileList.indexOf(file);//tim vi tri file nay luu trong mang fileList
                        delete fileList[index];//Xoa file 
                        var img_info_id = "img_info"+index;
                        $("#"+img_info_id).val('');//Xoa gia tri luu tam thoi o form di
                    }else{//Neu la file da duoc luu truoc do thi tao 1 input moi luu gia tri tam thoi
                        var img_info_id = "img_info"+fileList_count;
                        var hidden_data = '<input name = "img_info[]" type="hidden" value="' + (-$('#id').val()) +","+file.serverFileName+'" id="'+img_info_id+'" />';
                        $('#register-form').append(hidden_data);
                    }
                });
            } );
            this.on("success", function(file, serverFileName) {
                //doi ten anh
                var name = file.previewElement.querySelector("[data-dz-name]");
                name.dataset.dzName = serverFileName;
                name.innerHTML = serverFileName;
                file.serverFileName = serverFileName;
                //Them vao list anh luu
                fileList[++fileList_count] = file;
                //Them the div de luu thong tin anh
                var img_info_id = "img_info"+fileList_count;
                var hidden_data = '<input name = "img_info[]" type="hidden" value="' + 0 +","+file.serverFileName+'" id="'+img_info_id+'" />';
                $('#register-form').append(hidden_data);
            } );

            this.on("sending", function(file, xhr, formData){
                formData.append("_token", "{{ csrf_token() }}");
            });

        }//Init function
};//Dropzoen

Dropzone.options.dz1 = {
        url : '{{route("hotel.uploadImg")}}',
        maxFilesize: 2, // MB
        addRemoveLinks: true,
        acceptedFiles : 'image/jpeg, images/jpg, image/png',
        init : function(){
            var fileList = new Array;
            var fileList_count = 0;
            var thisDropzone = this;
            this.on("removedfile", function(file) {
                //Kiem tra xem file anh da xoa da co tu truoc hay chua
                $.ajax({
                    type: 'POST',
                    url: '{{route("hotel.deleteImg")}}',
                    // data: {name: file.serverFileName, _token: $('input[name = "_token"]').val()},
                    data : {id: $('#id').val(), _token: $('input[name = "_token"]').val(), name: file.serverFileName}
                }).done(function(data){
                    if(data == -1){//file nay la file chua duoc luu truoc do
                        var index = fileList.indexOf(file);//tim vi tri file nay luu trong mang fileList
                        delete fileList[index];//Xoa file 
                        var img_info_id = "img_info"+index;
                        $("#"+img_info_id).val('');//Xoa gia tri luu tam thoi o form di
                    }else{//Neu la file da duoc luu truoc do thi tao 1 input moi luu gia tri tam thoi
                        var img_info_id = "img_info"+fileList_count;
                        var hidden_data = '<input name = "img_info[]" type="hidden" value="' + (-$('#id').val()) +","+file.serverFileName+'" id="'+img_info_id+'" />';
                        $('#register-form').append(hidden_data);
                    }
                });
            } );
            this.on("success", function(file, serverFileName) {
                //doi ten anh
                var name = file.previewElement.querySelector("[data-dz-name]");
                name.dataset.dzName = serverFileName;
                name.innerHTML = serverFileName;
                file.serverFileName = serverFileName;
                //Them vao list anh luu
                fileList[++fileList_count] = file;
                //Them the div de luu thong tin anh
                var img_info_id = "img_info"+fileList_count;
                var hidden_data = '<input name = "img_info[]" type="hidden" value="' + 0 +","+file.serverFileName+'" id="'+img_info_id+'" />';
                $('#register-form').append(hidden_data);
            } );

            this.on("sending", function(file, xhr, formData){
                formData.append("_token", "{{ csrf_token() }}");
            });

        }//Init function
};//Dropzoen