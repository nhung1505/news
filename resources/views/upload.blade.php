<!doctype html>
<html lang="{{ app()->getLocale() }}">
    <head>
        <meta charset="utf-8">
        <meta http-equiv="X-UA-Compatible" content="IE=edge">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <title>Laravel</title>
        <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/css/bootstrap.min.css">
        <script src="https://code.jquery.com/jquery-3.3.1.min.js"></script>
    </head>
    <body>
        <div class="container" style="margin-top: 20px">
            <form enctype='multipart/form-data'>
                <div class="row form-group">
                    <label class="control-lable col-sm-3">Choose File</label>
                    <div class="col-sm-9 form-group">
                        <input type="file" name="file" id="file" class="form-control">
                    </div>
                </div>
                <div class="row form-group">
                    <label class="col-sm-3"></label>
                    <div class="col-sm-9 form-group">
                        <button type="button" class="btn btn-primary" onclick="uploadFile()">Upload file</button>
                    </div>
                </div>
            </form>
        </div>
        <script type="text/javascript">
            function uploadFile() {
                var f = document.getElementById('file');
                var file = f.files[0];
                var size = file.size;
                var sliceSize = 256000;
                var num = Math.floor(size/sliceSize) + 1;
                var start = 0;
                var stt = 0;

                setTimeout(loop, 1);

                function loop() {
                    stt++;
                    var end = start + sliceSize;
        
                    if (size - end < 0) {
                        end = size;
                    }
        
                    var s = slice(file, start, end);

                    send(s, stt, num, file.name, start, end);

                    if (end < size) {
                        start += sliceSize;
                        setTimeout(loop, 100);
                    }
                }
            }



            function send(piece, stt, num, name, start, end) {
                var formdata = new FormData();
                var xhr = new XMLHttpRequest();

                xhr.open('POST', '/upload', true);

                formdata.append('stt', stt);
                formdata.append('num', num);
                formdata.append('name', name);
                formdata.append('start', start);
                formdata.append('end', end);
                formdata.append('file', piece);

                xhr.send(formdata);
            }

            function slice(file, start, end) {
                var slice = file.mozSlice ? file.mozSlice :
                file.webkitSlice ? file.webkitSlice :
                file.slice ? file.slice : noop;
  
                return slice.bind(file)(start, end);
            }

            function noop() {
              
            }
        </script>
    </body>
</html>
