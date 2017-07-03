<!DOCTYPE html>
<html lang="en">

  <head>
    <meta http-equiv="Content-Type" content="text/html; charset=UTF-8">
    <!-- Meta, title, CSS, favicons, etc. -->
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <title>Gentelella Alela! | </title>

    <!-- Bootstrap -->
    <link href="../vendors/bootstrap/dist/css/bootstrap.min.css" rel="stylesheet">
    <!-- Font Awesome -->
    <link href="../vendors/font-awesome/css/font-awesome.min.css" rel="stylesheet">
    <!-- NProgress -->
    <!-- Dropzone.js -->
    <link href="../vendors/dropzone/dist/min/dropzone.min.css" rel="stylesheet">

    <!-- Custom Theme Style -->
    <link href="../build/css/custom.min.css" rel="stylesheet">
  </head>

  <body class="nav-md">
    <div class="container body">
      <div class="main_container">

      <input type="hidden" value="{{time()}}" id="id" name="id">
        <!-- page content -->
        <div class="right_col" role="main">
          <div class="">
            <div class="page-title">
                <div class="title_left">
                    <h3>Form Upload </h3>
                </div>

         
            </div>

            <div class="clearfix"></div>

            <div class="row">
              <div class="col-md-12 col-sm-12 col-xs-12">
                <div class="x_panel">
                    <div class="x_title">
                        <h2>Dropzone multiple file uploader</h2>
                        <div class="clearfix"></div>
                    </div>
                  <div class="x_content">
                    <input type="text" name="img_name" class="form-control" />
                    <p>Drag multiple files to the box below for multi upload or click to select files. This is for demonstration purposes only, the files are not uploaded to any server.</p>
                    <form  id="dz" enctype="multipart/form-data" class="dropzone">
                    {{csrf_field()}}
                    </form>
                  </div>
                </div>
              </div>
            </div>
          </div>
        </div>
        <!-- /page content -->

        <!-- footer content -->
        <footer>
          <div class="pull-right">
            Gentelella - Bootstrap Admin Template by <a href="https://colorlib.com">Colorlib</a>
          </div>
          <div class="clearfix"></div>
        </footer>
        <!-- /footer content -->
      </div>
    </div>

    <!-- jQuery -->
    <script src="../vendors/jquery/dist/jquery.min.js"></script>
    <!-- Bootstrap -->
    <script src="../vendors/bootstrap/dist/js/bootstrap.min.js"></script>
     <!-- Dropzone -->
    <script src="../vendors/dropzone/dist/min/dropzone.min.js"></script>
    
    <!-- Custom Theme Scripts -->
    <script src="../build/js/custom.min.js"></script>
    <script type="text/javascript">
      Dropzone.options.dz = {
          url : '{{route("testPost")}}',
          maxFilesize: 2, // MB
          addRemoveLinks: true,
          acceptedFiles : 'image/jpeg, images/jpg, image/png',
          init : function(){
            var thisDropzone = this;
            this.on("removedfile", function(file) {
                console.log(file);
                $.ajax({
                    type: 'POST',
                    url: '{{route("imgDel")}}',
                    data: {name: file.serverFileName, _token: $('input[name = "_token"]').val()},
                });
            } );
            this.on("success", function(file, serverFileName) {
                var name = file.previewElement.querySelector("[data-dz-name]");
                name.dataset.dzName = serverFileName;
                name.innerHTML = serverFileName;
                file.serverFileName = serverFileName;
            } );

            $.ajax({
                url : '{{route("getImg")}}',
                type: 'GET',

            }).done(function(data){
                var mockFile = { name: data.name, size:100, accepted: true, serverFileName:data.name }; // use actual id server uses to identify the file (e.g. DB unique identifier)
                // var res = data.name;
                console.log(data.name[0].split('\\')[1]);
                thisDropzone.emit("addedfile", mockFile);
                thisDropzone.emit("success", mockFile);
                thisDropzone.emit("complete", mockFile);
                thisDropzone.files.push(mockFile);
                thisDropzone.createThumbnailFromUrl(mockFile, data.folder+data.name);
                var name = mockFile.previewElement.querySelector("[data-dz-name]");
                name.dataset.dzName = data.name;
                name.innerHTML = data.name;
                mockFile.serverFileName = data.name;
            });
            }
        };
    </script>
  </body>
</html>