<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.0.0/dist/css/bootstrap.min.css" integrity="sha384-Gn5384xqQ1aoWXA+058RXPxPg6fy4IWvTNh0E263XmFcJlSAwiGgFAW/dAiS6JXm" crossorigin="anonymous">
    <title>Laravel Audit Viewer</title>
        <style>

        header {
            display: flex;
            justify-content: space-between;
            text-align: center;
            align-items: center;
            padding: 20px 10px;
        }
        .logo {
            text-align: left;
            line-height: 5px;
        }
        h1 {
            font-size: 25px;
        }
        form {
        }
        label {
            margin-right: 10px;
        }
        input {
            border-radius: .2rem;
        }
   
 
        th, td {
            padding: 8px;
            text-align: left; 
            border-bottom: 1px solid #ddd;
            list-style: none;
        }
        th {
            background-color: #191a39;
            color: #ffff;
        }
        td {
            max-width: 400px;
            overflow-x: scroll;
            font-size: 15px;
        }
        thead tr {
            font-size: 14px;
        }
        .box {
            width: 90%;
            margin: 0 auto;
        }
        ::-webkit-scrollbar {
            width: 0;
        }
        svg {
            width: 10px;
        }
        nav {
            display: flex;
            align-items: center;
            justify-content: center;
        }
        nav div:first-child {
            display: none;
        }   
    </style>
</head>
<body>
    <header class="box">
        <div class="logo" >
            <h1>Laravel Audit Viewer</h1>
        </div>
        <form class="form-inline my-2 my-lg-0">
            <div class="form-group mr-2">
                <select class="form-control" name="field">
                    <option value="created_at">Date</option>
                    <option value="user_id">Edited by</option>
                    <option value="auditable_id">Id Edited</option>
                    <option value="auditable_type">Model</option>
                    <option value="old_values">Old Values</option>
                    <option value="new_values">New Values</option>
                </select>
            </div>
            <div class="form-group mr-2">
                <input name="search" class="form-control" type="search" placeholder="Search" aria-label="Search" value="{{$search ?? ''}}">
            </div>
            <button class="btn btn-outline-success my-2 my-sm-0" type="submit">Search</button>
        </form>
    </header>
    <div class="box mb-5">
        <table class="table table-striped">
          <thead>
            <tr>
              <th scope="col">Date</th>
              <th scope="col">Edited by:</th>
              <th scope="col">id edited</th>
              <th scope="col">Model</th>
              <th scope="col">Event</th>
              <th scope="col">Old Data</th>
              <th scope="col">New Data</th>
            </tr>
          </thead>
          <tbody>
            <p class="text-right">Showing {{ $audits->count() }} of {{ $count }} results.</p>

                    @foreach ($audits as $audit)
                        <tr>
                            <td>{{ $audit->created_at }}</td>
                            <td>{{ $audit->user_id }}</td>
                            <td>{{ $audit->auditable_id }}</td>
                            <td>{{ $audit->auditable_type }}</td>
                            <td>{{ $audit->event }}</td>
                            <td>
                                @foreach ($audit->old_values as $key => $value)
                                    <li>{{ $key }} : {{$value}}</li>
                                @endforeach
                            </td>
                            <td>
                                @foreach ($audit->new_values as $key => $value)
                                    <li>{{ $key }} : {{$value}}</li>
                                @endforeach
                            </td>
                        </tr>
                    @endforeach
                </tbody>
        </table>
         {{$audits->links()}}
    </div>    
</body>
</html>