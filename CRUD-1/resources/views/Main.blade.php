<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <link rel="stylesheet" href="{{ asset('task.css') }}">
    @yield('styles')
</head>

<body>
    <div class="tasks-container">
        <div class="card-containerBackground">
            {{-- card container --}}
            <div class="cardContainer">
                {{-- header --}}
                <div class="card-header">
                    @yield('editForm')
                    <p class='status'> @yield('createForm', 'Names')</p>
                    <a href="/create"><img class="icon" src="images/toDo.svg" alt=""></a>

                </div>
                {{-- task --}}
                @foreach ($tasks as $task)
                    <div class="task">
                        <div class="taskDetails">

                            {{ $task->Task_Name }}
                        </div>
                        <div class="opration-icons">

                            {{-- edit --}}

                            <a href="{{ route('tasks.edit', $task->id) }}"><img class="icon" src="images/edit.svg"
                                    alt=""></a>
                            {{-- history --}}
                            <a href=""><img class="icon" src="images/history.svg" alt=""></a>

                            {{-- delete --}}

                            <a href="{{ route('tasks.destroy', $task->id) }}"><img class="icon"
                                    src="images/delete.svg" alt=""></a>

                        </div>
                    </div>
                @endforeach
            </div>
        </div>
    </div>
</body>

</html>
