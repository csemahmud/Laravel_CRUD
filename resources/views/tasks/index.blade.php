<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">

        <title>Task</title>

        <!-- Fonts -->
        <link href="https://fonts.googleapis.com/css?family=Nunito:200,600" rel="stylesheet">

        <!-- Styles -->
        <style>
            html, body {
                background-color: #fff;
                color: #636b6f;
                font-family: 'Nunito', sans-serif;
                font-weight: 200;
                height: 100vh;
                margin: 0;
            }

            .full-height {
                height: 100vh;
            }

            .flex-center {
                align-items: center;
                display: flex;
                justify-content: center;
            }

            .position-ref {
                position: relative;
            }

            .top-right {
                position: absolute;
                right: 10px;
                top: 18px;
            }

            .content {
                text-align: center;
            }

            .title {
                font-size: 84px;
            }

            .links > a {
                color: #636b6f;
                padding: 0 25px;
                font-size: 13px;
                font-weight: 600;
                letter-spacing: .1rem;
                text-decoration: none;
                text-transform: uppercase;
            }

            .m-b-md {
                margin-bottom: 30px;
            }
        </style>
    </head>
    <body>
        <div class="flex-center position-ref full-height">
            @if (Route::has('login'))
                <div class="top-right links">
                    @auth
                        <a href="{{ url('/home') }}">Home</a>
                    @else
                        <a href="{{ route('login') }}">Login</a>

                        @if (Route::has('register'))
                            <a href="{{ route('register') }}">Register</a>
                        @endif
                    @endauth
                </div>
            @endif

            <div class="content">
                <div class="row">
                    <div class="col-md-10 col-md=offset-1">

                        @if(Session::has('message'))
                            <div class="alert alert success">
                                {{Session::get('message')}}
                            </div>
                        @endif

                        <div class="panel panel-default">
                            <div class="panel-heading">Tasks</div>

                            <div class="panel-body">
                                
                                <table class="table">
                                    <tr>
                                        <th>Title</th>
                                        <th>Body</th>
                                        <th>Action</th>
                                    </tr>
                                    @foreach($tasks as $task)
                                        <tr>
                                            <td>
                                                {{link_to_route('task.show', $task->title, [$task->id], ['class' => 'btn btn-primary']) }}
                                            </td>
                                            <td>
                                                
                                                {!! Form::open(array('route' => ['task.destroy', $task->id], 'method'=>'DELETE')) !!}
                                                    {{link_to_route('task.edit', 'Edit', [$task->id], ['class' => 'btn btn-primary']) }}
                                                    |
                                                    {!! Form::button('Delete', ['type'=>'submit', 'class' => 'btn btn-danger']) !!}
                                                {!! Form::close() !!}
                                            </td>
                                        </tr>
                                    @endforeach
                                </table>
                                {{link_to_route('task.create', 'Add New Task', null, ['class' => 'btn btn-success']) }}
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </body>
</html>
