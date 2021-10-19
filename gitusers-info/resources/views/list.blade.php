@extends('app')

<!DOCTYPE html>
<html>
<head>
    <title></title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.0-beta3/dist/css/bootstrap.min.css" rel="stylesheet">
</head>

<body>

        <div id="gitusers_list">
            
             @foreach($list as $value)
                <div>
                  <h6>Name: {{$value->name}}</h6>
                  <p>Login: {{$value->login}}</p>
                  @if(isset($value->company))
                  <p>Company: {{$value->company}} </p>
                    @else 
                   <p> Company: none</p>
                @endif
                  <p>Followers: {{$value->followers}}</p>
                  <p>Repositories: {{$value->public_repos}}</p> 
                 
                     @if ($value->followers!=0)
                     
                   <p>  Average followers: {{round($value->followers / $value->public_repos)}} </p>
                     @else 
                   <p>  Average followers: 0 </p>
                @endif
                </div>
            @endforeach
        </div>

</body>


<script src="https://code.jquery.com/jquery-3.5.1.min.js"></script>
<script>
    var i = 0;
    $("#addRemoveIp").click(function () {
      
        ++i;
      if (i<=9){
        $("#multiForm").append('<tr><td><input type="text" name="multiInput['+i+'][username]" class="form-control" /></td><td><button type="button" class="remove-item btn btn-danger">Delete</button></td></tr>');
        }
    });
    $(document).on('click', '.remove-item', function () {
        if (i>1){
        $(this).parents('tr').remove();
            }
    });

 
</script>

 
</html>