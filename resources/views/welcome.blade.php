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
                <th scope="col">Product Name</th>
                <th scope="col">Category Name</th>
               
              </tr>
            </thead>
            <tbody id="data">
                {{-- @foreach ($products as $product) --}}
                
              

              {{-- @endforeach --}}
            </tbody>
          </table>
        </div>

    

<div class="dropdown btn-group">
  <button class="btn btn-secondary dropdown-toggle" type="button" id="dropdownMenuButton1" data-bs-toggle="dropdown" aria-expanded="false">
   User List
  </button>
  
    
  
  <ul class="dropdown-menu" aria-labelledby="dropdownMenuButton1" id="userDopdown">
    @foreach ($users as $item)
    <li>
      <span class="dropdown-item" id="{{$item->id}}" >{{$item->name}}</span>
    </li>
    <div id="data">
      <span ></span>
    </div>
    
    @endforeach
  </ul>
 
</div>

<div class="dropdown btn-group">
  <button class="btn btn-secondary dropdown-toggle" type="button" id="dropdownMenuButton1" data-bs-toggle="dropdown" aria-expanded="false">
   Category List
  </button>
  
    
  
  <ul class="dropdown-menu" aria-labelledby="dropdownMenuButton1" id="categoryDopdown">
    
  </ul>
 
</div>

<div class="dropdown btn-group">
  <button class="btn btn-secondary dropdown-toggle" type="button" id="dropdownMenuButton1" data-bs-toggle="dropdown" aria-expanded="false">
   Product List
  </button>
  
    
  
  <ul class="dropdown-menu" aria-labelledby="dropdownMenuButton1" id="productDopdown">
    
  </ul>
 
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

function onClick(id) {
        console.log(id);
         let url = "{{route('productBycategory')}}"+"?id="+id;
        $.ajax({
              // url:"{{route('productBycategory')}}",
              // url = "{{route('productBycategory')}}"+"?id="+id;
              url:url,
              method:'GET',
              data:{id:id},
              success:function(res){
                  let str = '';
                  res.data.forEach(el =>{
                    str+=`<li>
                            <span class="dropdown-item" id="pro_${el.id}">${el.name}</span>
                          </li>`
                  })
                  $('#productDopdown').html(str);
              }
          });
      }

      function onUserClick(id) {
        console.log(id);
        $.ajax({
              url:"{{route('categoryByUser')}}",
              method:'GET',
              data:{id:id},
              success:function(res){
                  let str = '';
                  res.data.forEach(el =>{
                    str+=`<li onclick="onClick(${el.id})">
                            <span class="dropdown-item" id="cat_${el.id}">${el.name}</span>
                          </li>`
                  })
                  $('#categoryDopdown').html(str);
              }
          });
      }

    

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
                                    <td> ${p.cat_name} </td>
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

            $('#userDopdown').on('click',function(e){
                e.preventDefault();
                let userId = e.target.id;
                onUserClick(userId)

            })

            $('#productDopdown').on('click',function(e){
                e.preventDefault();
                let CatId = e.target.id;
                onClick(CatId)

            })
        });
    </script> 
  </body>
</html>