<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link href="https://fonts.googleapis.com/css2?family=Nunito:wght@400;600;700&display=swap" rel="stylesheet">
    <link rel="stylesheet" href="https://www.w3schools.com/w3css/4/w3.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">

    <title>Main Page</title>
    <style>
        @media screen and (max-width: 768px) {
            .w3-container {
                width: 100%;
            }
        }
        @media screen and (min-width: 768px) {
            .w3-container {
                width: 700px;
                margin: 0 auto;
            }
        }
    </style>

</head>

<body>
    @if (session('save'))
    <script>
        alert("Success");
    </script>
    @endif
    @if (session('error'))
    <script>
        alert("Failed");
    </script>
    @endif

    <header class="w3-center w3-padding-large w3-indigo">
        <h2>Subjects List</h2>
    </header>
    <div>
        <button class="w3-button w3-round w3-right w3-indigo w3-margin" onclick="document.getElementById('newitem').style.display= 'block';return false;">New Subject</button>
    </div>

    <div class="w3-padding" style='max-width:600px;margin:auto'>
        <table class="w3-table w3-striped w3-bordered">
            <thead>
                <th>No</th>
                <th>ID</th>
                <th>Title</th>
                <th>Description</th>
                <th>Price</th>
                <th>Total Learning Hours</th>
            </thead>
            @foreach ($listProducts as $listItem)
            <tr>
                <td>{{ $loop->iteration }}</td>
                <td>{{ $listItem->id}}</td>
                <td>{{ $listItem->subject_title}}</td>
                <td>{{ $listItem->subject_description}}</td>
                <td>{{ $listItem->subject_price}}</td>
                <td>{{ $listItem->subject_totalhour}}</td>
                <td>
                    <div class="w3-cell">
                        <form method="post" action="{{route('markDelete',$listItem->id)}}" accept-charset="UTF-8" onsubmit="return confirm('Delete?');">
                            {{csrf_field()}}
                            <button class="w3-button w3-round w3-block" type="submit">
                                <i class="fa fa-trash"> </i></button>
                        </form>
                    </div>
                    <div class="w3-cell">
                        <button class="w3-button w3-round w3-block" onclick="document.getElementById('{{$loop->iteration}}').style.display='block';return false;"><i class="fa fa-pencil-square-o"> </i>
                        </button>
                    </div>
                    <div id="{{$loop->iteration}}" class="w3-modal w3-animate-opacity">
                        <div class="w3-modal-content w3-round" style="width:500px">
                            <header class="w3-row w3-blue"> <span onclick="document.getElementById('{{$loop->iteration}}').style.display='none'" class="w3-button w3-display-topright w3-small">&times;</span>
                                <h4 class="w3-margin-left">Update Subject Form</h4>
                            </header>
                            <div class="w3-padding">
                                <form method="post" action="{{route('markUpdate',$listItem->id)}}">
                                    {{csrf_field()}}
                                    <p><input class="w3-input w3-round w3-border" type="text" name="sjtitle" placeholder="Title" value ="{{ $listItem->subject_title}}"></p>
                                    <p><input class="w3-input w3-round w3-border" type="text" name="sjdesc" placeholder="Description" value ="{{ $listItem->subject_description}}"></p>
                                    <p><input class="w3-input w3-round w3-border" type="number" name="sjprice" placeholder="Price" step="any" value ="{{ $listItem->subject_price}}"></p>
                                    <p><input class="w3-input w3-round w3-border" type="text" name="sjtotalhour" placeholder="Total Learning Hour" value ="{{ $listItem->subject_totalhour}}"></p>
                                    </textarea></p>
                                    <button class="w3-button w3-blue w3-round" type="submit">Update</button>
                                </form>
                            </div>
                        </div>
                    </div>

                </td>
            </tr>
            @endforeach


        </table>
    </div>
    <footer class="w3-footer w3-center w3-blue">My Tutor</footer>

    <div id="newitem" class="w3-modal w3-animate-opacity">
        <div class="w3-modal-content w3-round" style="width:500px">
            <header class="w3-row w3-blue"> <span onclick="document.getElementById
     ('newitem').style.display='none'" class="w3-button w3-display-topright w3-small">&times;</span>
                <h4 class="w3-margin-left">New Subject Form</h4>
            </header>
            <div class="w3-padding">
                <form method="post" action="{{route('saveproduct')}}">
                    {{csrf_field()}}
                    <p><input class="w3-input w3-round w3-border" type="text" name="sjtitle" placeholder="Title"></p>
                    <p><input class="w3-input w3-round w3-border" type="text" name="sjdesc" placeholder="Description"></p>
                    <p><input class="w3-input w3-round w3-border" type="number" name="sjprice" placeholder="Price" step="any"></p>
                    <p><input class="w3-input w3-round w3-border" type="number" name="sjtotalhour" placeholder="Total Learning Hours"></p>
                    </textarea></p>
                    <button class="w3-button w3-blue w3-round" type="submit">Insert</button>
                </form>
            </div>
        </div>
    </div>

</body>

</html>