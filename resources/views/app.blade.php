<!doctype html>
<html lang="{{ app()->getLocale() }}">
<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.1.3/css/bootstrap.min.css"
          integrity="sha384-MCw98/SFnGE8fJT3GXwEOngsV7Zt27NXFoaoApmYm81iuXoPkFOJwJ8ERdknLPMO" crossorigin="anonymous">
    <link href="https://cdnjs.cloudflare.com/ajax/libs/select2/4.0.6-rc.0/css/select2.min.css" rel="stylesheet" />

    <title>Jeka/@yield('title')</title>

</head>
<body>


<div class="container">

        @yield('content')

</div>

<script src="https://code.jquery.com/jquery-3.3.1.slim.min.js"
        integrity="sha384-q8i/X+965DzO0rT7abK41JStQIAqVgRVzpbzo5smXKp4YfRvH+8abtTE1Pi6jizo"
        crossorigin="anonymous"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.3/umd/popper.min.js"
        integrity="sha384-ZMP7rVo3mIykV+2+9J3UJ46jBk0WLaUAdn689aCwoqbBJiSnjAK/l8WvCWPIPm49"
        crossorigin="anonymous"></script>
<script src="https://stackpath.bootstrapcdn.com/bootstrap/4.1.3/js/bootstrap.min.js"
        integrity="sha384-ChfqqxuZUCnJSK3+MXmPNIyE6ZbWh2IMqE241rYiqJxyMiZ6OW/JmZQ5stwEULTy"
        crossorigin="anonymous"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/select2/4.0.6-rc.0/js/select2.min.js"></script>

<script>
    $(document).ready(function() {

       $('#tags').select2({
        placeholder:"Выбирите тэг",
        tags: true
       });

       function uploadIndicator(el){
            let arr = [];
            let upload = el[0];
            let label = el.parent().children('.custom-file-label');
           if(upload.files.length !== 0){
               for( let i = 0; i < (upload.files.length); i++ ) {
                         arr.push(" " + upload.files[i].name);
                         if( upload.files[i].type !== 'image/jpeg' && upload.files[i].type !== 'image/png'){
                            label.html(' Загружаемые файлы должны быть в формате jpeg или png.');
                            label.addClass('text-danger');
                            label.removeClass('text-success');
                            return false;
                         }
                    }
               label.html(arr + ' - в очереди на загрузку ' + el[0].files.length + ' файл(-a|ов).');
               label.addClass('text-success');
               label.removeClass('text-danger');
               return arr;
            }
            return false;
        }

        uploadIndicator($('#images'));

       $('#images').change(function(e) {
            uploadIndicator($(this));
       });

    });

</script>

</body>
</html>
