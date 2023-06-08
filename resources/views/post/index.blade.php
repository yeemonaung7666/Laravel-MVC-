<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=, initial-scale=1.0">
    <title>Index page</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-KK94CHFLLe+nY2dmCWGMq91rCGa5gtU4mk92HdvYe+M/SXH301p5ILy+dN9+nJOZ" crossorigin="anonymous">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.0/css/all.min.css" integrity="sha512-iecdLmaskl7CVkqkXNQ/ZH/XLlvWZOJyj7Yy7tcenmpD1ypASozpmT/E0iPtmFIB46ZmdtAc9eNBvH0H/ZpiBw==" crossorigin="anonymous" referrerpolicy="no-referrer" />
    <style>
        body{
            padding: 100px;
        }
    </style>
</head>

<body>
    <div class="container">
        <div class="row">
            <div class="col-md-2"></div>
            <div class="col-md-8">
                <h1>Posts List</h1>
                <div class="row">
                    <div class="col-md-10"></div>
                    <div class="col-md-2">
                        <a href="{{route('posts.create')}}" class="btn btn-primary btn-sm mb-2">
                            <!-- url('/posts/create') -->
                        <i class="fa fa-plus-circle"></i> Add New</a>
                    </div>
                </div>
                @if(Session('successAlert'))
                <div class="alert alert-success">
                    {{Session('successAlert')}}
                </div>
                @endif
                <table class="table table-bordered table-hover">
                <tr>
                    <th>NO.</th>
                    <th>Title</th>
                    <th>Content</th>
                    <th>Action</th>
                </tr>
                <?php $id=1;?>
                    @foreach($posts as $p)
                    <tr>
                    <td>{{$id}}</td>
                    <td>{{$p->title}}</td>
                    <td>{{$p->content}}</td>
                    <td>
                        <form action="{{ url('posts/'.$p->id)}}" method="post">
                            @csrf
                            @method('DELETE')
                            <a class="btn btn-success btn-sm" href="{{route('posts.edit',$p->id)}}">
                                <!-- url('/posts/'.$p->id.'/edit') -->
                                <i class="fa fa-edit"></i> Edit</a>
                            <button type="submit" class="btn btn-danger btn-sm" onclick="return confirm('Are you sure you want to delete?')">
                                <i class="fa fa-trash"></i> Delete</button>
                        </form>
                        
                    </td>
                    </tr>
                    <?php $id++;?>
                    @endforeach
                
                </table>
                <div class="d-flex justify-content-center">
                    {{ $posts->links() }}
                </div>
                
            </div>
            
            <div class="col-md-2"></div>
        </div>
    </div>

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha3/dist/js/bootstrap.bundle.min.js" integrity="sha384-ENjdO4Dr2bkBIFxQpeoTz1HIcje39Wm4jDKdf19U8gI4ddQ3GYNS7NTKfAdVQSZe" crossorigin="anonymous"></script>
</body>
</html>