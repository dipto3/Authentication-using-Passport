<!doctype html>
<html lang="en">
  <head>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="csrf-token" content="{{ csrf_token() }}">
    <!-- Bootstrap CSS -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">

    <title>Hello, world!</title>
  </head>
  <body>
    <div class="container">
        
       
        <div class="table-data">
            <label for="">Search</label>
            <input type="text" name="search" id="search" class="mb-3 form-control"  placeholder="Search...">
        <table class="table">
            <thead>
              <tr>
                <th scope="col">id</th>
                <th scope="col">Name</th>
                <th scope="col">Category ID</th>
               
              </tr>
            </thead>
            <tbody id="data">
                {{-- @foreach ($products as $product) --}}
                
              

              {{-- @endforeach --}}
            </tbody>
          </table>
        </div>
    </div>

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-MrcW6ZMFYlzcLA8Nl+NtUVF0sA7MsXsP1UyJoMp4YLEuNSfAP+JcXn/tWtIaxVXM" crossorigin="anonymous"></script>

    <script src="https://code.jquery.com/jquery-3.6.4.min.js" integrity="sha256-oP6HI9z1XaZNBrJURtCoUT5SUnxFr8s3BzRl+cbzUq8=" crossorigin="anonymous"></script>
    <script>
        $.ajaxSetup({
    headers: {
        'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
    }
    });
    </script>
    <script>

        function callSearch(search_string){
            $.ajax({
                url:"{{route('search')}}",
                method:'GET',
                data:{search_string:search_string},
                success:function(res){
                    let str = ''
                    res.products.forEach(p => {
                        str += `<tr>
                                    <th scope="row"> ${p.id} </th>
                                    <td class="col"> ${p.name}</td>
                                    <td> ${p.cat_id} </td>
                                </tr>`
                    });
                    $('#data').html(str);
                }
            });
        }


        $(document).ready(function(){
            callSearch('');
            $(document).on('keyup',function(e){
                e.preventDefault();
                let search_string = $('#search').val();

                callSearch(search_string);
            })
        });
    </script> 
  </body>
</html>